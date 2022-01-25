<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Drug;

class AddDrug extends Component
{

    public $drug_name,
        $drug_details,
        $drug_schema;

    public function render()
    {
        return view('livewire.add-drug');
    }

    private function resetInputFields(){

        $this->drug_name = null;
        $this->drug_details = null;
        $this->drug_schema = null;

    }

    public function store()
    {

        $this->validate([
            'drug_name' => 'required',
            'drug_details' => 'required'
        ]);

        Drug::create([
            'drug_name' => $this->drug_name,
            'drug_details' => $this->drug_details,
            'drug_schema' => $this->drug_schema
        ]);

        session()->flash('message', 'Medicament adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_medicamente');

    }

}
