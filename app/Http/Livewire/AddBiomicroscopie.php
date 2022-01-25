<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Biomicroscopie;

class AddBiomicroscopie extends Component
{

    public $biomicroscopie_short_name,
        $biomicroscopie_name,
        $biomicroscopie_details;

    public function render()
    {
        return view('livewire.add-biomicroscopie');
    }

    private function resetInputFields(){

        $this->biomicroscopie_short_name = null;
        $this->biomicroscopie_name = null;
        $this->biomicroscopie_details = null;

    }

    public function store()
    {

        $this->validate([
            'biomicroscopie_short_name' => 'required',
            'biomicroscopie_name' => 'required'
        ]);

        Biomicroscopie::create([
            'biomicroscopie_short_name' => $this->biomicroscopie_short_name,
            'biomicroscopie_name' => $this->biomicroscopie_name,
            'biomicroscopie_details' => $this->biomicroscopie_details
        ]);

        session()->flash('message', 'Biomicroscopie adaugata cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_biomicroscopie');

    }
}
