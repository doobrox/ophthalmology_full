<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListProcedures extends Component
{

    public function addProcedure(){
        return redirect()->to('add_procedura');
    }

    public function associationProcedures(){
        return redirect()->to('asociere_proceduri');
    }

    public function render()
    {
        return view('livewire.list-procedures');
    }
}
