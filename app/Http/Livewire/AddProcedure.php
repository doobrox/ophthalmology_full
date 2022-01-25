<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Procedure;

class AddProcedure extends Component
{

    public $procedure_medical_name,
        $procedure_price,
        $procedure_discount,
        $procedure_advance,
        $procedure_points,
        $procedure_code,
        $need_crystalline,
        $is_cas,
        $procedure_diagnostic,
        $procedure_description,
        $procedure_recommendation,
        $procedure_treatment;

    public function render()
    {
        return view('livewire.add-procedure');
    }

    private function resetInputFields(){

        $this->procedure_medical_name = null;
        $this->procedure_price = null;
        $this->procedure_discount = null;
        $this->procedure_advance = null;
        $this->procedure_points = null;
        $this->procedure_code = null;
        $this->need_crystalline = null;
        $this->is_cas = null;
        $this->procedure_diagnostic = null;
        $this->procedure_description = null;
        $this->procedure_recommendation = null;
        $this->procedure_treatment = null;

    }

    public function store()
    {

        $this->validate([
            'procedure_medical_name' => 'required',
            'procedure_price' => 'required'
        ]);

        Procedure::create([
            'procedure_medical_name' => $this->procedure_medical_name,
            'procedure_price' => $this->procedure_price,
            'procedure_discount' => $this->procedure_discount,
            'procedure_advance' => $this->procedure_advance,
            'procedure_points' => $this->procedure_points,
            'procedure_code' => $this->procedure_code,
            'need_crystalline' => ($this->need_crystalline == null ? 0 : 1),
            'is_cas' => ($this->is_cas == null ? 0 : 1),
            'procedure_diagnostic' => $this->procedure_diagnostic,
            'procedure_description' => $this->procedure_description,
            'procedure_recommendation' => $this->procedure_recommendation,
            'procedure_treatment' => $this->procedure_treatment,
        ]);

        session()->flash('message', 'Procedura adaugata cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_proceduri');

    }
}
