<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AssociationProcedures extends Component
{

    public $select_doctor;

    public $type_one,
        $type_two,
        $type_three,
        $type_four,
        $type_five;

    public $checkboxes, $whatValue;

    public function render()
    {
        $doctors = DB::table('doctors')
            ->select('id', 'doctor_name_and_forename AS name')
            ->orderByDesc('id')
            ->get();

        return view('livewire.association-procedures', ['doctors' => $doctors]);
    }

    function checkOtherCheckboxes(){

        $this->checkboxes = [ $this->type_one, $this->type_two, $this->type_three, $this->type_four, $this->type_five ];

        $this->whatValue = 0;

        foreach ($this->checkboxes as $whatValue) {
            $this->whatValue = $this->whatValue + $whatValue;
        }

        if($this->whatValue == 0){
            $this->whatValue = null;
        }

    }

    protected function rules()
    {
        return [
             'select_doctor' => 'required'
        ];
    }

    public function updatedSelectDoctor()
    {
        if($this->select_doctor == false){
            $this->select_doctor = null;
            $this->whatValue = 0;
            $this->type_one = false;
            $this->type_two = false;
            $this->type_three = false;
            $this->type_four = false;
            $this->type_five = false;
        }
    }

    function updatedTypeOne() {

        $this->validate();

        if($this->type_one == false){
            $this->type_one = 0;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
        else {
            $this->type_one = 5;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
    }

    function updatedTypeTwo() {

        $this->validate();

        if($this->type_two == false){
            $this->type_two = 0;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
        else {
            $this->type_two = 15;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
    }

    function updatedTypeThree() {

        $this->validate();

        if($this->type_three == false){
            $this->type_three = 0;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
        else {
            $this->type_three = 25;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
    }

    function updatedTypeFour() {

        $this->validate();

        if($this->type_four == false){
            $this->type_four = 0;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
        else {
            $this->type_four = 35;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
    }

    function updatedTypeFive() {

        $this->validate();

        if($this->type_five == false){
            $this->type_five = 0;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
        else {
            $this->type_five = 50;
            $this->checkOtherCheckboxes();
            $this->emit('refreshLivewireDatatable', ['discount_value' => $this->whatValue]);
        }
    }

}