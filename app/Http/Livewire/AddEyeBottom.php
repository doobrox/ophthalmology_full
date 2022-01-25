<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EyeBottom;

class AddEyeBottom extends Component
{

    public $eye_bottom_name,
        $eye_bottom_details;

    public function render()
    {
        return view('livewire.add-eye-bottom');
    }

    private function resetInputFields(){

        $this->eye_bottom_name = null;
        $this->eye_bottom_details = null;

    }

    public function store()
    {

        $this->validate([
            'eye_bottom_name' => 'required',
            'eye_bottom_details' => 'required'
        ]);

        EyeBottom::create([
            'eye_bottom_name' => $this->eye_bottom_name,
            'eye_bottom_details' => $this->eye_bottom_details
        ]);

        session()->flash('message', 'FO adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_fo');

    }

}
