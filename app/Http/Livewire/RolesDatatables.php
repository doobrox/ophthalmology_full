<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use App\Models\Visit;
use App\Models\Patient;

class RolesDatatables extends LivewireDatatable
{

    //    TODO: trebuie facut cum trebuie tabelul pe modelul nostru de datatables ...

    public $model = Visit::class;
    public $paramsExtra = 0;

    public function builder()
    {
        return Visit::query()
            ->leftJoin('patients', 'patients.id', 'visits.fk_patient_id' )
            ->leftJoin('doctors', 'doctors.id', 'visits.fk_doctor_assigned_to_patient' )
            ->leftJoin('users', 'users.id', 'visits.user_who_input' )
            ->leftJoin('procedures', 'procedures.id', 'visits.fk_select_procedure_type' )
            ->whereDate('visit_date', '=', ($this->paramsExtra == 0 ? date("Y-m-d") : $this->paramsExtra));
        //
    }
    public function columns()
    {
        return [

//            Column::checkbox(),



            Column::name('id')->hide(),
            DateColumn::raw('patient_arrival_time')->label('Sosire / Covid')->format('H:i')->defaultSort('asc')->alignCenter(),
//            Column::name('fk_patient_id')->label('fk_patient_id')->filterable()->searchable()->link('user'),

//            Column::raw('CONCAT_WS(" ", patients.patient_name, patients.patient_forename) AS patient_name')->label('Nume')->linkEmitModal('add-observation-file')->searchable(),
            Column::raw('CONCAT_WS(" ", patients.patient_name, patients.patient_forename) AS patient_name')->label('Nume / Plata')->searchable(),
            NumberColumn::name('procedures.procedure_medical_name')->label('Procedura / PDF'),
            BooleanColumn::name('is_casmb')->label('CAS')->alignCenter(),
            Column::raw('CONCAT_WS(" ", doctors.doctor_name, doctors.doctor_forename) AS doctor_name')->label('Doctor'),
            NumberColumn::name('fk_doctor_casmb_assigned_to_patient')->label('Doctor CAS'),
            Column::name('visits.fk_patient_id')->label('ID / Edit')->searchable()->alignCenter(),

            //Column::raw('fk_patient_id AS patient_name')->label('patient_name')->linkEmitModal('add-observation-file'),
            //Column::raw('GROUP_CONCAT(planets.name SEPARATOR " | ") AS `Moon`'),


            NumberColumn::name('fk_patient_id as pay_patient')->label('pay_patient')->hide(),
//            DateColumn::raw('visit_date')->label('visit_date')->format('d-m-Y'),
            NumberColumn::name('consultation_form_number')->label('Nr. Vizita'),

//            NumberColumn::name('fk_doctor_assigned_to_patient')->label('Doctor'),




//            NumberColumn::name('fk_select_procedure_type')->label('procedure'),



//            Column::name('user_who_input')->label('user_who_input'),

            NumberColumn::name('users.name')->label('User'),


            NumberColumn::name('visit_status')->label('Status'),
            NumberColumn::name('duration_between_exams')->label('Intre ex'),
            NumberColumn::name('duration_of_the_first_examination')->label('Prima ex'),
//            Column::callback(['id', 'id'], function ($id) {
//                return view('components/datatable-patients-actions', ['id' => $id]);
//            })->unsortable()->label(''),
        ];
    }
//    public function rowClasses($row, $loop)
//    {
//        return 'divide-x divide-gray-100 text-sm text-gray-900 ' . ($this->rowIsSelected($row) ? 'bg-yellow-100' : ($row->{'id'} === 2 ? 'bg-red-500' : ($loop->even ? 'bg-gray-100' : 'bg-gray-50')));
//    }

    public function cellClasses($row, $column)
    {
        return 'onMouseHoverClass text-sm ' . ($this->rowIsSelected($row) ? ' text-gray-900' : ($row->{'id'} === 1 ? ' text-green-500' : ' text-gray-900')) . ($column['name'] == 'patient_arrival_time' && $row->patient_arrival_time == '23:12' ? ' text-yellow-500' : '');
    }
//    public function rowAction($row)
//    {
//        return "window.open('pacient_plata/".$row->pay_patient."', '_blank')";
//    }

    public function refreshLivewireDatatable($withParams){
        $this->paramsExtra = date("Y-m-d", strtotime($withParams));
        $this->builder();
    }


    public function getPlanetsProperty()
    {
        //return Planet::pluck('name');

        return Patient::pluck('patient_name');

    }

    public function cellAction($row, $column)
    {

        if($column['name'] == 'visits.fk_patient_id'){
            return "Livewire.emit('openModal', 'edit-observation-file', {'select_patient':'$row->pay_patient', 'row_id':'$row->id'})";
        } elseif ($column['name'] == 'patient_name'){
            return "window.open('pacient_plata/".$row->pay_patient."', '_blank')";
        } elseif ($column['name'] == 'patient_arrival_time'){
            return "window.open('/pdf/acord_pacient_covid19/".$row->pay_patient."', '_blank', 'width=650, height=870')";
        } elseif ($column['name'] == 'procedures.procedure_medical_name'){
            return "window.open('/pdf/consultatie/".$row->id."', '_blank', 'width=650, height=870')";
        }

    }

}
