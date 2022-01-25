<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Diagnostic;

class AddDiagnostic extends Component
{

    public $diagnostic_name,
        $diagnostic_details;

    public function render()
    {
        return view('livewire.add-diagnostic');
    }

    private function resetInputFields(){

        $this->diagnostic_name = null;
        $this->diagnostic_details = null;

    }

    public function store()
    {

        $this->validate([
            'diagnostic_name' => 'required',
            'diagnostic_details' => 'required'
        ]);

        Diagnostic::create([
            'diagnostic_name' => $this->diagnostic_name,
            'diagnostic_details' => $this->diagnostic_details
        ]);

        session()->flash('message', 'Diagnostic adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_diagnostice');

    }
}
