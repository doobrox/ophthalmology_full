<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;

class AddArticle extends Component
{

    public $article_name,
        $article_price,
        $article_discount,
        $article_code,
        $article_description;

    public function render()
    {
        return view('livewire.add-article');
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

        Article::create([
            'article_name' => $this->article_name,
            'article_price' => $this->article_price,
            'article_discount' => $this->article_discount,
            'article_code' => $this->article_code,
            'article_description' => $this->article_description
        ]);

        session()->flash('message', 'Articolul adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_articole');

    }

}
