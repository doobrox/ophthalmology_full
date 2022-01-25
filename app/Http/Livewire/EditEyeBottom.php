<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditEyeBottom extends Component
{

    public $eyeBottomId;
    public $eye_bottom_name,
        $eye_bottom_details;

    public function mount($id)
    {
        $this->eyeBottomId = $id;
        $eyeBottomInfo = DB::table('eye_bottoms')
            ->where('id', $this->eyeBottomId )
            ->get();

        $this->eye_bottom_name = $eyeBottomInfo[0]->eye_bottom_name;
        $this->eye_bottom_details = $eyeBottomInfo[0]->eye_bottom_details;
    }

    public function render()
    {
        return view('livewire.edit-eye-bottom', ['eyeBottomId' => $this->eyeBottomId]);
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

        DB::table('eye_bottoms')
            ->where('id', $this->eyeBottomId)
            ->update([
                'eye_bottom_name' => $this->eye_bottom_name,
                'eye_bottom_details' => $this->eye_bottom_details
            ]);

        session()->flash('message', 'FO editat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_fo');

    }
}
