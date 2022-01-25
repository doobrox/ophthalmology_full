<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

use Illuminate\Support\Facades\DB;

class ConfirmModalGrayFields extends ModalComponent
{

    public function acceptGray(){
        $this->emit('acceptGray');
    }

    public function denyGray(){
        $this->emit('denyGray');
    }

    public function render()
    {
        return view('livewire.confirm-modal-gray-fields');
    }
}
