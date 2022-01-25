<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListTreatmentScheme extends Component
{

    public function addTreatmentScheme(){
        return redirect()->to('add_schema_tratament');
    }

    public function render()
    {
        return view('livewire.list-treatment-scheme');
    }
}
