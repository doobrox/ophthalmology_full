<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class CrystallineMeasurements extends ModalComponent
{
    public $crystallineDetailsID;

    public $whatSelect;

    public $camp1, $camp2, $camp3;

//    public static function modalMaxWidth(): string
//    {
//        return '7xl';
//    }

    public function mount($crystallineDetailsID, $whatSelect)
    {
        $this->crystallineDetailsID = $crystallineDetailsID;
        $this->whatSelect = $whatSelect;
//        dd($this);
    }

//    private function resetInputFields(){
//        $this->camp1 = '';
//        $this->camp2 = '';
//        $this->camp3 = '';
//    }

    protected $rules = [
        'camp1' => 'required',
        'camp2' => 'required',
        'camp3' => 'required'
    ];

//    public function store()
//    {
//
//        dd($this);
//        $validateDate = $this->validate();
//
//        foreach ($this->procedure as $key => $value) {
//            Procedure::create([
//                'fk_doctor_id' => 1,
//                'procedure' => $this->procedure[$key],
//                'procedure_code' => $this->procedure_code[$key],
//                'procedure_price' => $this->procedure_price[$key],
//                'procedure_discount' => isset($this->procedure_discount[$key]) ? $this->procedure_discount[$key] : NULL,
//                'procedure_advance' => isset($this->procedure_advance[$key]) ? $this->procedure_advance[$key] : NULL,
//                'procedure_points' => isset($this->procedure_points[$key]) ? $this->procedure_points[$key] : NULL
//            ]);
//        }
//
//        $this->resetInputFields();
//
//        session()->flash('message', 'Procedure Has Been Created Successfully.');
//    }

    public function finishCrystallineSelection()
    {
        $validateDate = $this->validate();
//        dd($this);
        $this->closeModalWithEvents([
            AddExpense::getName() => ['selectedCrystalline', [
                $this->crystallineDetailsID,
                $this->whatSelect,
                $this->camp1,
                $this->camp2,
                $this->camp3
            ]]
        ]);
        $this->forceClose()->closeModal();
//        $this->dispatchBrowserEvent('name-updated', ['newName' => $this->selectID]);
    }

    public function render()
    {
        $this->crystallineDetails = DB::table('crystallines')
            ->where('id', $this->crystallineDetailsID )
            ->get();
        return view('livewire.crystalline-measurements', ['crystallineDetails' => $this->crystallineDetails]);
    }
}