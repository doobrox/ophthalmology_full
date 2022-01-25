<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AllCrystallines extends ModalComponent
{
    use WithPagination;

    public $whatSelect;

    public function update(){

    }

    public function render()
    {
//        $allCrystallines = DB::table('crystallines')
//            ->where('id', '<', 16)
//            ->orderBy('id')
//            ->paginate(8);
        $allCrystallines = DB::table('crystallines')
            ->orderBy('id')
            ->paginate(6);

        return view('livewire.all-crystallines', ['allCrystallines' => $allCrystallines]);
    }

//    public static function modalMaxWidth(): string
//    {
//        return '7xl';
//    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public function showCrystallinesDetails($crystalline_id, $selectID)
    {
        $this->emit("openModal", "crystalline-details", ["crystallineDetailsID" => $crystalline_id, "whatSelect" =>$selectID ]);
    }

    public function showCrystallineMeasurements($crystalline_id, $selectID)
    {
        $this->emit("openModal", "crystalline-measurements", ["crystallineDetailsID" => $crystalline_id, "whatSelect" =>$selectID ]);
    }
}
