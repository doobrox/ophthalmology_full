<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListReason extends Component
{

    public function addReason(){
        return redirect()->to('add_motiv');
    }

    public function render()
    {
        return view('livewire.list-reason');
    }
}
