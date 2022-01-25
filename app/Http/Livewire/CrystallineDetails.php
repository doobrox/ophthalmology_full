<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class CrystallineDetails extends ModalComponent
{
    public $crystallineDetailsID;

    public $whatSelect;

//    public static function modalMaxWidth(): string
//    {
//        return '7xl';
//    }

    public function mount($crystallineDetailsID, $whatSelect)
    {
        $this->crystallineDetailsID = $crystallineDetailsID;
        $this->whatSelect = $whatSelect;
    }

    public function render()
    {
        $this->crystallineDetails = DB::table('crystallines')
            ->where('id', $this->crystallineDetailsID )
            ->get();
        return view('livewire.crystalline-details', ['crystallineDetails' => $this->crystallineDetails]);
    }

    public function showCrystallineMeasurements($crystalline_id, $selectID)
    {
        $this->emit("openModal", "crystalline-measurements", ["crystallineDetailsID" => $crystalline_id, "whatSelect" => $selectID]);
    }
}