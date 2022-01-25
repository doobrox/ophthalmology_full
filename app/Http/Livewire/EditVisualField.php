<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditVisualField extends Component
{

    public $visualFieldId;
    public $visual_field_name,
        $visual_field_details;

    public function mount($id)
    {
        $this->visualFieldId = $id;
        $visualFieldInfo = DB::table('visual_fields')
            ->where('id', $this->visualFieldId )
            ->get();

        $this->visual_field_name = $visualFieldInfo[0]->visual_field_name;
        $this->visual_field_details = $visualFieldInfo[0]->visual_field_details;
    }

    public function render()
    {
        return view('livewire.edit-visual-field', ['visualFieldId' => $this->visualFieldId]);
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

        DB::table('visual_fields')
            ->where('id', $this->visualFieldId)
            ->update([
                'visual_field_name' => $this->visual_field_name,
                'visual_field_details' => $this->visual_field_details
            ]);

        session()->flash('message', 'Camp vizual editat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_campuri_vizuale');

    }
}
