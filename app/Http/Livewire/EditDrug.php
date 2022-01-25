<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditDrug extends Component
{

    public $drugId;
    public $drug_name,
        $drug_details,
        $drug_schema;

    public function mount($id)
    {
        $this->drugId = $id;
        $drugInfo = DB::table('drugs')
            ->where('id', $this->drugId )
            ->get();

        $this->drug_name = $drugInfo[0]->drug_name;
        $this->drug_details = $drugInfo[0]->drug_details;
        $this->drug_schema = $drugInfo[0]->drug_schema;
    }

    public function render()
    {
        return view('livewire.edit-drug', ['drugId' => $this->drugId]);
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

        DB::table('drugs')
            ->where('id', $this->drugId)
            ->update([
                'drug_name' => $this->drug_name,
                'drug_details' => $this->drug_details,
                'drug_schema' => $this->drug_schema
            ]);

        session()->flash('message', 'Medicament editat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_medicamente');

    }
}
