<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\VisualField;

class AddVisualField extends Component
{

    public $visual_field_name,
        $visual_field_details;

    public function render()
    {
        return view('livewire.add-visual-field');
    }

    private function resetInputFields(){

        $this->visual_field_name = null;
        $this->visual_field_details = null;

    }

    public function store()
    {

        $this->validate([
            'visual_field_name' => 'required',
            'visual_field_details' => 'required'
        ]);

        VisualField::create([
            'visual_field_name' => $this->visual_field_name,
            'visual_field_details' => $this->visual_field_details
        ]);

        session()->flash('message', 'Camp vizual adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_campuri_vizuale');

    }
}
