<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListGonioscopie extends Component
{

    public function addGonioscopie(){
        return redirect()->to('add_gonioscopie');
    }

    public function render()
    {
        return view('livewire.list-gonioscopie');
    }
}
