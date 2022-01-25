<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TreatmentScheme;

class AddTreatmentScheme extends Component
{

    public $treatment_scheme_name,
        $treatment_scheme_details;

    public function render()
    {
        return view('livewire.add-treatment-scheme');
    }

    private function resetInputFields(){

        $this->treatment_scheme_name = null;
        $this->treatment_scheme_details = null;

    }

    public function store()
    {

        $this->validate([
            'treatment_scheme_name' => 'required',
            'treatment_scheme_details' => 'required'
        ]);

        TreatmentScheme::create([
            'treatment_scheme_name' => $this->treatment_scheme_name,
            'treatment_scheme_details' => $this->treatment_scheme_details
        ]);

        session()->flash('message', 'Schema tratament adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_schema_tratamente');

    }
}