<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reason;

class AddReason extends Component
{

    public $reason_name,
        $reason_details;

    public function render()
    {
        return view('livewire.add-reason');
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

        Reason::create([
            'reason_name' => $this->reason_name,
            'reason_details' => $this->reason_details
        ]);

        session()->flash('message', 'Motiv adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_motive');

    }
}
