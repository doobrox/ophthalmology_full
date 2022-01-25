<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListBiomicroscopie extends Component
{

    public function addBiomicroscopie(){
        return redirect()->to('add_biomicroscopie');
    }

    public function render()
    {
        return view('livewire.list-biomicroscopie');
    }
}