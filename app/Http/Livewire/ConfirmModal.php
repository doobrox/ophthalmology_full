<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

use Illuminate\Support\Facades\DB;

class ConfirmModal extends ModalComponent
{

    public $lastDate;

    public function mount($lastDate)
    {
        $date = date_create($lastDate['visit_date']);
        $this->lastDate = date_format($date,"d-m-Y H:i");;
    }

    public function populateLastVisit(){
        $this->emit('populateLastVisit');
    }

    public function render()
    {
        return view('livewire.confirm-modal');
    }
}
