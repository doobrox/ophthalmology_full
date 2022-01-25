<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\ProceduresHasRecipe;

class AddRecipe extends Component
{

    public $procedureId;

    public $whatSelect;

    public $article,
        $articles,
        $article_code,
        $order,
        $article_price,
        $article_discount,
        $article_quantity;

    public $article_total_price,
        $article_total_discount;

    public $inputs = [ 0 => 0 ];
    public $i = 0;

    public function add($i)
    {

        $this->validate([
            'article.'.$i => 'required'
        ]);
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
        $this->dispatchBrowserEvent('reApplySelect2', ['whatSelect' => $i]);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        unset($this->article[$i]);
        unset($this->article_code[$i]);
        unset($this->order[$i]);
        unset($this->article_price[$i]);
        unset($this->article_discount[$i]);
        unset($this->article_quantity[$i]);
    }

    private function resetInputFields(){
        $this->article = null;
        $this->article_code = null;
        $this->order = null;
        $this->article_price = null;
        $this->article_discount = null;
        $this->article_quantity = null;
    }

    protected function rules()
    {
        $array = [];

        for ($i = 0; $i <= $this->i; $i++) {

            $array['article.' . $i] = 'required';
            $array['article_quantity.' . $i] = 'required';

        }

        return $array;
    }

    public function store()
    {

        $validateDate = $this->validate();

        foreach ($this->article as $key => $value) {
            DB::table('procedures_has_recipes')
                ->where('fk_procedure_id', $this->procedureId)
                ->delete();
        }

        foreach ($this->article as $key => $value) {
            ProceduresHasRecipe::create([
                'fk_procedure_id' => $this->procedureId,
                'fk_article_id' => $this->article[$key],
                'order' => $this->order[$key],
                'quantity' => $this->article_quantity[$key],
            ]);
        }

        session()->flash('message', 'Reteta modificata cu success!');

    }

    public function mount($id)
    {
        $this->procedureId = $id;
        $gotRecipe = DB::table('procedures_has_recipes')
            ->join('articles', 'procedures_has_recipes.fk_article_id', 'articles.id')
            ->where('fk_procedure_id', '=', $this->procedureId)
            ->orderBy('order')
            ->get();

        if(isset($gotRecipe[0])){
            $this->inputs = [];
            $this->article_total_price = 0;
            $this->article_total_discount = 0;
            foreach ($gotRecipe as $key => $value) {
                $this->i = $key;
                array_push($this->inputs ,$key);
                $this->article[$key] = strval($gotRecipe[$key]->fk_article_id);
                $this->article_code[$key] = $gotRecipe[$key]->article_code;
                $this->order[$key] = strval($gotRecipe[$key]->order);
                $this->article_price[$key] = number_format($gotRecipe[$key]->article_price,2, '.', '');
                $this->article_discount[$key] = number_format($gotRecipe[$key]->article_discount,2, '.', '');
                $this->article_quantity[$key] = $gotRecipe[$key]->quantity;
                $this->dispatchBrowserEvent('reApplySelect2', ['whatSelect' => $key]);

                $this->article_total_price = number_format($this->article_total_price + number_format($gotRecipe[$key]->article_price,2, '.', ''),2, '.', '');
                $this->article_total_discount = number_format($this->article_total_discount + number_format($gotRecipe[$key]->article_discount,2, '.', ''),2, '.', '');
            }
        }
    }

    public function render()
    {

        $this->articles = DB::table('articles')
            ->select('id', 'article_name AS name')
            ->orderByDesc('id')
            ->get();

        $procedure = DB::table('procedures')
            ->where('id', $this->procedureId)
            ->first();

        return view('livewire.add-recipe', ['procedure' => $procedure]);
    }

    public function repetitiveText($whatKey, $whatId) {

        $completeProcedureRow = DB::table('articles')
            ->where('id', $whatId)
            ->get();

        $this->article[str_replace('article.','', $whatKey)] = $whatId;
        $this->article_code[str_replace('article.','', $whatKey)] = $completeProcedureRow[0]->article_code;
        $this->order[str_replace('article.','', $whatKey)] = str_replace('article.','', $whatKey);
        $this->article_price[str_replace('article.','', $whatKey)] = number_format($completeProcedureRow[0]->article_price,2, '.', '');
        $this->article_discount[str_replace('article.','', $whatKey)] = number_format($completeProcedureRow[0]->article_discount,2, '.', '');
        $this->article_quantity[str_replace('article.','', $whatKey)] = 1;

        $this->article_total_price = number_format($this->article_total_price + number_format($completeProcedureRow[0]->article_price,2, '.', ''),2, '.', '');
        $this->article_total_discount = number_format($this->article_total_discount + number_format($completeProcedureRow[0]->article_discount,2, '.', ''),2, '.', '');
    }

    public function updated($whatKey, $whatId)
    {
        if (strpos($whatKey, 'article.') !== 0) {
//            dd($whatKey);
        } else {
            $this->repetitiveText($whatKey, $whatId);
        }

    }

}
