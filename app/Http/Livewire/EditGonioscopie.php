<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditGonioscopie extends Component
{

    public $gonioscipieId;
    public $gonioscopie_name,
        $gonioscopie_details;

    public function mount($id)
    {
        $this->gonioscipieId = $id;
        $gonioscopieInfo = DB::table('gonioscopies')
            ->where('id', $this->gonioscipieId )
            ->get();

        $this->gonioscopie_name = $gonioscopieInfo[0]->gonioscopie_name;
        $this->gonioscopie_details = $gonioscopieInfo[0]->gonioscopie_details;
    }

    public function render()
    {
        return view('livewire.edit-gonioscopie', ['gonioscipieId' => $this->gonioscipieId]);
    }

    private function resetInputFields(){

        $this->gonioscopie_name = null;
        $this->gonioscopie_details = null;

    }

    public function store()
    {

        $this->validate([
            'gonioscopie_name' => 'required',
            'gonioscopie_details' => 'required'
        ]);

        DB::table('gonioscopies')
            ->where('id', $this->gonioscipieId)
            ->update([
                'gonioscopie_name' => $this->gonioscopie_name,
                'gonioscopie_details' => $this->gonioscopie_details
            ]);

        session()->flash('message', 'Gonioscopie editata cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_gonioscopie');

    }
}
