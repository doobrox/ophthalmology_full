<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListEyeBottom extends Component
{

    public function addEyeBottom(){
        return redirect()->to('add_fo');
    }

    public function render()
    {
        return view('livewire.list-eye-bottom');
    }
}
