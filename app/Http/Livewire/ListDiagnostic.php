<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListDiagnostic extends Component
{

    public function addDiagnostic(){
        return redirect()->to('add_diagnostic');
    }

    public function render()
    {
        return view('livewire.list-diagnostic');
    }
}
