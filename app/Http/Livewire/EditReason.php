<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditReason extends Component
{

    public $reasonId;
    public $reason_name,
        $reason_details;

    public function mount($id)
    {
        $this->reasonId = $id;
        $reasonInfo = DB::table('reasons')
            ->where('id', $this->reasonId )
            ->get();

        $this->reason_name = $reasonInfo[0]->reason_name;
        $this->reason_details = $reasonInfo[0]->reason_details;
    }

    public function render()
    {
        return view('livewire.edit-reason', ['reasonId' => $this->reasonId]);
    }

    private function resetInputFields(){

        $this->reason_name = null;
        $this->reason_details = null;

    }

    public function store()
    {

        $this->validate([
            'reason_name' => 'required',
            'reason_details' => 'required'
        ]);

        DB::table('reasons')
            ->where('id', $this->reasonId)
            ->update([
                'reason_name' => $this->reason_name,
                'reason_details' => $this->reason_details
            ]);

        session()->flash('message', 'Motiv editat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_motive');

    }
}
