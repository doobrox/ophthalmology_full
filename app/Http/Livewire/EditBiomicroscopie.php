<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditBiomicroscopie extends Component
{

    public $biomicroscopieId;
    public $biomicroscopie_short_name,
        $biomicroscopie_name,
        $biomicroscopie_details;

    public function mount($id)
    {
        $this->biomicroscopieId = $id;
        $biomicroscopieInfo = DB::table('biomicroscopies')
            ->where('id', $this->biomicroscopieId )
            ->get();

        $this->biomicroscopie_short_name = $biomicroscopieInfo[0]->biomicroscopie_short_name;
        $this->biomicroscopie_name = $biomicroscopieInfo[0]->biomicroscopie_name;
        $this->biomicroscopie_details = $biomicroscopieInfo[0]->biomicroscopie_details;
    }

    public function render()
    {
        return view('livewire.edit-biomicroscopie', ['biomicroscopieId' => $this->biomicroscopieId]);
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

        DB::table('biomicroscopies')
            ->where('id', $this->biomicroscopieId)
            ->update([
                'biomicroscopie_short_name' => $this->biomicroscopie_short_name,
                'biomicroscopie_name' => $this->biomicroscopie_name,
                'biomicroscopie_details' => $this->biomicroscopie_details
            ]);

        session()->flash('message', 'Biomicroscopie editata cu success!');

        $this->resetInputFields();

        return redirect()->to('/lista_biomicroscopie');

    }
}
