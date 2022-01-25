<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditArticle extends Component
{

    public $articleId;
    public $article_name,
        $article_price,
        $article_discount,
        $article_code,
        $article_description;

    public function mount($id)
    {
        $this->articleId = $id;
        $articleInfo = DB::table('articles')
            ->where('id', $this->articleId )
            ->get();

        $this->article_name = $articleInfo[0]->article_name;
        $this->article_price = $articleInfo[0]->article_price;
        $this->article_discount = $articleInfo[0]->article_discount;
        $this->article_code = $articleInfo[0]->article_code;
        $this->article_description = $articleInfo[0]->article_description;
    }

    public function render()
    {
        return view('livewire.edit-article', ['articleId' => $this->articleId]);
    }

    private function resetInputFields(){

        $this->article_name = null;
        $this->article_price = null;
        $this->article_discount = null;
        $this->article_code = null;
        $this->article_description = null;

    }

    public function store()
    {

        $this->validate([
            'article_name' => 'required',
            'article_price' => 'required'
        ]);

        DB::table('articles')
            ->where('id', $this->articleId)
            ->update([
                'article_name' => $this->article_name,
                'article_price' => $this->article_price,
                'article_discount' => $this->article_discount,
                'article_code' => $this->article_code,
                'article_description' => $this->article_description
            ]);

        session()->flash('message', 'Articolul editat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_articole');

    }

}
