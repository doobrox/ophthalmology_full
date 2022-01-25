<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditProcedure extends Component
{

    public $procedureId;
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

    public function mount($id)
    {
        $this->procedureId = $id;
        $procedureInfo = DB::table('procedures')
            ->where('id', $this->procedureId )
            ->get();

        $this->procedure_medical_name = $procedureInfo[0]->procedure_medical_name;
        $this->procedure_price = $procedureInfo[0]->procedure_price;
        $this->procedure_discount = $procedureInfo[0]->procedure_discount;
        $this->procedure_advance = $procedureInfo[0]->procedure_advance;
        $this->procedure_points = $procedureInfo[0]->procedure_points;
        $this->procedure_code = $procedureInfo[0]->procedure_code;
        $this->need_crystalline = $procedureInfo[0]->need_crystalline;
        $this->is_cas = $procedureInfo[0]->is_cas;
        $this->procedure_diagnostic = $procedureInfo[0]->procedure_diagnostic;
        $this->procedure_description = $procedureInfo[0]->procedure_description;
        $this->procedure_recommendation = $procedureInfo[0]->procedure_recommendation;
        $this->procedure_treatment = $procedureInfo[0]->procedure_treatment;
    }

    public function render()
    {
        return view('livewire.edit-procedure', ['procedureId' => $this->procedureId]);
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

        DB::table('procedures')
            ->where('id', $this->procedureId)
            ->update([
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
                'procedure_treatment' => $this->procedure_treatment
            ]);

        session()->flash('message', 'Procedura editata cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_proceduri');

    }

}