<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditDiagnostic extends Component
{

    public $diagnosticId;
    public $diagnostic_name,
        $diagnostic_details;

    public function mount($id)
    {
        $this->diagnosticId = $id;
        $diagnosticsInfo = DB::table('diagnostics')
            ->where('id', $this->diagnosticId )
            ->get();

        $this->diagnostic_name = $diagnosticsInfo[0]->diagnostic_name;
        $this->diagnostic_details = $diagnosticsInfo[0]->diagnostic_details;
    }

    public function render()
    {
        return view('livewire.edit-diagnostic', ['diagnosticId' => $this->diagnosticId]);
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

        DB::table('diagnostics')
            ->where('id', $this->diagnosticId)
            ->update([
                'diagnostic_name' => $this->diagnostic_name,
                'diagnostic_details' => $this->diagnostic_details
            ]);

        session()->flash('message', 'Diagnostic editat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_diagnostice');

    }
}
