<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListDrug extends Component
{

    public function addDrug(){
        return redirect()->to('add_medicament');
    }

    public function render()
    {
        return view('livewire.list-drug');
    }
}
