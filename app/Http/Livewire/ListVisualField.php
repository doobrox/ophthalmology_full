<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListVisualField extends Component
{

    public function addVisualField(){
        return redirect()->to('add_camp_vizual');
    }

    public function render()
    {
        return view('livewire.list-visual-field');
    }
}
