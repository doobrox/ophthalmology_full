<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListArticles extends Component
{

    public function addArticle(){
        return redirect()->to('add_articol');
    }

    public function render()
    {
        return view('livewire.list-articles');
    }
}
