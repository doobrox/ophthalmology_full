<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AddExpense extends Component
{

    public $consultationId;
//    public $articles;

    public $procedure, $procedure_code, $procedure_price, $procedure_discount, $procedure_advance, $procedure_points, $need_crystalline, $is_cas, $procedure_discountFix, $procedure_total;
//    public $whatCrystalline;
    public $whatSelect;
    public $procedureCrystallineDetails;
    public $selectType = [ 0 => 'procedures'];

    public $updateMode = false;
    public $inputs = [ 0 => 0 ];
    public $i = 0;

    public $procedure_got_recipe;

    public function mount($id)
    {
        $this->consultationId = $id;
    }

    public function add($i, $selectType)
    {
//        dd($i + 1);
        $this->validate([
            'procedure.'.$i => 'required'
        ]);
        $nrI = $i + 1;
        $this->i = $nrI;
        array_push($this->inputs ,$nrI);
        array_push($this->selectType, $selectType);

        $this->dispatchBrowserEvent('reApplySelect2', ['whatSelect' => $nrI]);
    }

    public function remove($i)
    {
        if($i == 0){
            $this->inputs[0] = 0;
            $this->procedure = null;
            $this->procedure_code = null;
            $this->procedure_price = null;
            $this->procedure_discount = null;
            $this->procedure_advance = null;
            $this->procedure_points = null;
            $this->need_crystalline = null;
            $this->is_cas = null;
            $this->procedureCrystallineDetails = null;
            $this->procedure_discountFix = null;
            $this->procedure_total = null;
            $this->procedure_got_recipe = null;
        } else {
            unset($this->inputs[$i]);
            unset($this->procedure[$i]);
            unset($this->procedure_code[$i]);
            unset($this->procedure_price[$i]);
            unset($this->procedure_discount[$i]);
            unset($this->procedure_advance[$i]);
            unset($this->procedure_points[$i]);
            unset($this->need_crystalline[$i]);
            unset($this->is_cas[$i]);
            unset($this->procedureCrystallineDetails[$i]);
            unset($this->procedure_discountFix[$i]);
            unset($this->procedure_total[$i]);
            unset($this->procedure_got_recipe[$i]);

            unset($this->selectType[$i]);

//            $this->i =  $this->i - 1;
        }

//        unset($this->inputs[$i]);
//        $this->i--;
//        unset($this->procedure[$i+1]);
//        unset($this->procedure_code[$i+1]);
//        unset($this->procedure_price[$i+1]);
//        unset($this->procedure_discount[$i+1]);
//        unset($this->procedure_advance[$i+1]);
//        unset($this->procedure_points[$i+1]);
//        unset($this->need_crystalline[$i+1]);
//        unset($this->procedureCrystallineDetails[$i+1]);
//        unset($this->procedure_discountFix[$i+1]);
//        unset($this->procedure_total[$i+1]);
//        $this->i--;
//        unset($this->procedure[$i]);
//        unset($this->procedure_code[$i]);
//        unset($this->procedure_price[$i]);
//        unset($this->procedure_discount[$i]);
//        unset($this->procedure_advance[$i]);
//        unset($this->procedure_points[$i]);
//        unset($this->need_crystalline[$i]);
//        unset($this->is_cas[$i]);
//        unset($this->procedureCrystallineDetails[$i]);
//        unset($this->procedure_discountFix[$i]);
//        unset($this->procedure_total[$i]);
//        unset($this->procedure_got_recipe[$i]);
//        $this->dispatchBrowserEvent('emptySelect2', ['whatSelect' => $i]);
    }

    public function removeArticle($i, $whatArticle)
    {
        unset($this->procedure_got_recipe[$i][$whatArticle]);
    }

    private function resetInputFields(){
        $this->procedure = null;
        $this->procedure_code = null;
        $this->procedure_price = null;
        $this->procedure_discount = null;
        $this->procedure_advance = null;
        $this->procedure_points = null;
        $this->need_crystalline = null;
        $this->is_cas = null;
        $this->procedureCrystallineDetails = null;
        $this->procedure_discountFix = null;
        $this->procedure_total = null;
    }

    protected function rules()
    {
        $array = [];

        for ($i = 0; $i <= $this->i; $i++) {

            $array['procedure.' . $i] = 'required';
            $array['procedure_code.' . $i] = 'required';
            $array['procedure_price.' . $i ] = 'required';
        }

        return $array;
    }

    public function store()
    {

        dd($this);
        $validateDate = $this->validate();

//        foreach ($this->procedure as $key => $value) {
//            Procedure::create([
//                'fk_doctor_id' => 1,
//                'procedure' => $this->procedure[$key],
//                'procedure_code' => $this->procedure_code[$key],
//                'procedure_price' => $this->procedure_price[$key],
//                'procedure_discount' => isset($this->procedure_discount[$key]) ? $this->procedure_discount[$key] : NULL,
//                'procedure_advance' => isset($this->procedure_advance[$key]) ? $this->procedure_advance[$key] : NULL,
//                'procedure_points' => isset($this->procedure_points[$key]) ? $this->procedure_points[$key] : NULL,
//                'need_crystalline' => isset($this->need_crystalline[$key]) ? $this->need_crystalline[$key] : NULL
//            ]);
//        }

        $this->inputs = [];
        $this->i = 0;
        $this->resetInputFields();

        session()->flash('message', 'Procedure Has Been Created Successfully.');

    }

    public function render()
    {

        $this->procedures = DB::table('procedures')
            ->select('id', 'procedure_medical_name AS name')
            ->orderByDesc('id')
            ->get();

        $this->articles = DB::table('articles')
            ->select('id', 'article_name AS name')
            ->orderByDesc('id')
            ->get();

        return view('livewire.add-expense', ['consultationId' => $this->consultationId]);
    }

    public $listeners = [
        'selectedCrystalline' => 'setCrystalline',
    ];

    public function setCrystalline($crystallineDetailsID, $whatSelect, $camp1, $camp2, $camp3)
    {
//        $this->whatCrystalline = $crystallineDetailsID;
        $this->whatSelect = $whatSelect;
        $this->procedureCrystallineDetails[$whatSelect]['whatCrystalline'] = $crystallineDetailsID;
        $this->procedureCrystallineDetails[$whatSelect]['camp1'] = $camp1;
        $this->procedureCrystallineDetails[$whatSelect]['camp2'] = $camp2;
        $this->procedureCrystallineDetails[$whatSelect]['camp3'] = $camp3;
    }

    public function repetitiveText($whatKey, $whatId) {

        if($this->selectType[str_replace('procedure.','', $whatKey)] == 'articles'){
            $completeProcedureRow = DB::table('articles')
                ->where('id', $whatId)
                ->get();

            $this->procedure[str_replace('procedure.','', $whatKey)] = $whatId;

            $this->procedure_code[str_replace('procedure.','', $whatKey)] = number_format($completeProcedureRow[0]->article_code,2, '.', '');
            $this->procedure_price[str_replace('procedure.','', $whatKey)] = number_format($completeProcedureRow[0]->article_price,2, '.', '');
            $this->procedure_discount[str_replace('procedure.','', $whatKey)] = number_format($completeProcedureRow[0]->article_discount,2, '.', '');
//            $this->procedure_advance[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->article_advance;
//            $this->procedure_points[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->article_points;
//            $this->need_crystalline[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->need_crystalline;
//            $this->procedureCrystallineDetails[str_replace('procedure.','', $whatKey)] = null;
//            $this->procedure_discountFix[str_replace('procedure.','', $whatKey)] = null;
//            $this->procedure_total[str_replace('procedure.','', $whatKey)] = (($completeProcedureRow[0]->procedure_discount) ? ($completeProcedureRow[0]->procedure_price - (($completeProcedureRow[0]->procedure_discount / 100) * $completeProcedureRow[0]->procedure_price)) : $completeProcedureRow[0]->procedure_price );

        } else {

            $completeProcedureRow = DB::table('procedures')
                ->where('id', $whatId)
                ->get();

            $this->procedure[str_replace('procedure.','', $whatKey)] = $whatId;

            $this->procedure_code[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->procedure_code;
            $this->procedure_price[str_replace('procedure.','', $whatKey)] = number_format($completeProcedureRow[0]->procedure_price,2, '.', '');
            $this->procedure_discount[str_replace('procedure.','', $whatKey)] = number_format($completeProcedureRow[0]->procedure_discount, 2, '.', '');
            $this->procedure_advance[str_replace('procedure.','', $whatKey)] = number_format($completeProcedureRow[0]->procedure_advance, 2, '.', '');
            $this->procedure_points[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->procedure_points;
            $this->need_crystalline[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->need_crystalline;
            $this->is_cas[str_replace('procedure.','', $whatKey)] = $completeProcedureRow[0]->is_cas;
            $this->procedureCrystallineDetails[str_replace('procedure.','', $whatKey)] = null;
            $this->procedure_discountFix[str_replace('procedure.','', $whatKey)] = number_format(0, 2, '.', '');
            $this->procedure_total[str_replace('procedure.','', $whatKey)] = (($completeProcedureRow[0]->procedure_discount) ? (number_format($completeProcedureRow[0]->procedure_price,2, '.', '') - ((number_format($completeProcedureRow[0]->procedure_discount,2, '.', '') / 100) * number_format($completeProcedureRow[0]->procedure_price,2, '.', ''))) : number_format($completeProcedureRow[0]->procedure_price,2, '.', '') );

            $gotRecipe = DB::table('procedures_has_recipes')
                ->join('articles', 'procedures_has_recipes.fk_article_id', 'articles.id')
                ->where('fk_procedure_id', '=', $whatId)
                ->orderBy('order')
                ->get();

            $whoGotRecipe = json_decode($gotRecipe, true);

            if(isset($gotRecipe[0])){
                $this->procedure_got_recipe[str_replace('procedure.', '', $whatKey)] = $whoGotRecipe;
            } else {
                $this->procedure_got_recipe[str_replace('procedure.','', $whatKey)] = null;
            }

        }

    }

    public function updated($whatKey, $whatId)
    {
        if (strpos($whatKey, 'procedure.') !== 0) {
//            dd($whatKey);
        } else {
            $this->repetitiveText($whatKey, $whatId);
        }

        if(strpos($whatKey, 'procedure_discountFix.'.str_replace('procedure_discountFix.','', $whatKey)) !== 0){
//                dd('aaa');
        } else {
            if($this->procedure) {
//                $this->procedure_discount[str_replace('procedure_discountFix.', '', $whatKey)] = 0;
                $discountFix = $this->procedure_discountFix[str_replace('procedure_discountFix.', '', $whatKey)];
                $totalFix = $this->procedure_price[str_replace('procedure_discountFix.', '', $whatKey)];
                if ($discountFix == '' && $discountFix == null) {
                    $this->procedure_total[str_replace('procedure_discountFix.', '', $whatKey)] = $this->procedure_price[str_replace('procedure_discountFix.', '', $whatKey)];
                } else {
                    $discountCalc = $totalFix - $discountFix;
                    if ($discountCalc < 0) {
                        $this->procedure_total[str_replace('procedure_discountFix.', '', $whatKey)] = 0;
                    } else {
                        $this->procedure_total[str_replace('procedure_discountFix.', '', $whatKey)] = $discountCalc;

                        $this->procedure_discount[str_replace('procedure_discountFix.', '', $whatKey)] = number_format((($this->procedure_price[str_replace('procedure_discountFix.', '', $whatKey)] - $discountCalc) / $this->procedure_price[str_replace('procedure_discountFix.', '', $whatKey)]) * 100, 2);
                    }
                }
            }
        }

        if(strpos($whatKey, 'procedure_discount.'.str_replace('procedure_discount.','', $whatKey)) !== 0){
//                dd('aaa');
        } else {
            if($this->procedure){
//                $this->procedure_discountFix[str_replace('procedure_discount.','', $whatKey)] = 0;
                $discountPercent = number_format($this->procedure_discount[str_replace('procedure_discount.','', $whatKey)], 2, '.', '');
                $totalPercent = number_format($this->procedure_price[str_replace('procedure_discount.','', $whatKey)], 2, '.', '');
                if($discountPercent == '' && $discountPercent == null){
                    $this->procedure_total[str_replace('procedure_discount.','', $whatKey)] = number_format($this->procedure_price[str_replace('procedure_discount.','', $whatKey)], 2, '.', '');
                } else {
                    $count = ($discountPercent / 100) * $totalPercent;
                    $differencePercent = $totalPercent - $count;
                    $discountCalc = number_format($differencePercent,2, '.', '');
                    if($discountCalc < 0){
                        $this->procedure_total[str_replace('procedure_discount.','', $whatKey)] = 0;
                    } else {
                        $this->procedure_total[str_replace('procedure_discount.','', $whatKey)] = $discountCalc;

                        $this->procedure_discountFix[str_replace('procedure_discount.','', $whatKey)] = number_format($this->procedure_price[str_replace('procedure_discount.','', $whatKey)], 2, '.', '') - $discountCalc;
                    }
                }
            }
        }

    }

    public function dd(){
        dd($this);
}

}
