<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditTreatmentScheme extends Component
{

    public $treatmentSchemeId;
    public $treatment_scheme_name,
        $treatment_scheme_details;

    public function mount($id)
    {
        $this->treatmentSchemeId = $id;
        $treatmentSchemeInfo = DB::table('treatment_schemes')
            ->where('id', $this->treatmentSchemeId )
            ->get();

        $this->treatment_scheme_name = $treatmentSchemeInfo[0]->treatment_scheme_name;
        $this->treatment_scheme_details = $treatmentSchemeInfo[0]->treatment_scheme_details;
    }

    public function render()
    {
        return view('livewire.edit-treatment-scheme', ['treatmentSchemeId' => $this->treatmentSchemeId]);
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

        DB::table('treatment_schemes')
            ->where('id', $this->treatmentSchemeId)
            ->update([
                'treatment_scheme_name' => $this->treatment_scheme_name,
                'treatment_scheme_details' => $this->treatment_scheme_details
            ]);

        session()->flash('message', 'Schema tratament editata cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_schema_tratamente');

    }
}
