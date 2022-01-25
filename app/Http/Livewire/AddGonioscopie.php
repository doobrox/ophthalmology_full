<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gonioscopie;

class AddGonioscopie extends Component
{

    public $gonioscopie_name,
        $gonioscopie_details;

    public function render()
    {
        return view('livewire.add-gonioscopie');
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

        Gonioscopie::create([
            'gonioscopie_name' => $this->gonioscopie_name,
            'gonioscopie_details' => $this->gonioscopie_details
        ]);

        session()->flash('message', 'Gonioscopie adaugat cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_gonioscopie');

    }
}
