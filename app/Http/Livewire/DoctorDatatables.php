<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visit;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DoctorDatatables extends LivewireDatatable
{
    public $model = Visit::class;
    public $paramsExtra = 0;
//    public $complex = true;
//    public $hideable = 'select';

//    public function builder()
//    {
//        return Visit::query()
//            ->whereDate('visit_date', '=', date("Y-m-d"));
//    }
    public function builder()
    {
        return Visit::query()
            ->leftJoin('patients', 'patients.id', 'visits.fk_patient_id')
            ->leftJoin('procedures', 'procedures.id', 'visits.fk_select_procedure_type')
            ->whereDate('visit_date', '=', ($this->paramsExtra == 0 ? date("Y-m-d") : $this->paramsExtra));
    }
    public function columns()
    {
        return [

//            Column::checkbox(),

//            Column::callback(['id', 'id'], function ($id) {
//                return view('components/datatable-patients-actions', ['id' => $id]);
//            })->unsortable()->label('hidden-filterable-search'),

//            Column::name('id')->searchable()->hide(),
//            Column::callback('id', 'computeBedtime')
//                ->label('Go to bed')
//                ->hide(),
//            Column::name('fk_patient_id')->label('fk_patient_id')->filterable()->searchable()->link('user'),
            Column::name('id')->label('id')->hide(),
//            Column::name('fk_patient_id')->label('fk_patient_id')->searchable(),
//            Column::name('patients.patient_name')->label('Nume')->searchable(),
            Column::raw('CONCAT_WS(" ", patients.patient_name, patients.patient_forename) AS patient_name')->label('Nume / Consultatie')->searchable(),

//            Column::name('patients.patient_forename')->label('Prenume')->searchable(),
            NumberColumn::name('fk_patient_id as pay_patient')->label('pay_patient')->hide(),
//            DateColumn::raw('visit_date')->label('visit_date')->format('d-m-Y'),

//            NumberColumn::name('fk_doctor_assigned_to_patient')->label('fk_doctor_assigned_to_patient'),
//            NumberColumn::name('fk_doctor_casmb_assigned_to_patient')->label('fk_doctor_casmb_assigned_to_patient'),
            NumberColumn::name('procedures.procedure_medical_name')->label('Procedura / PDF')->searchable(),
            BooleanColumn::name('is_casmb')->label('CAS')->alignCenter(),
//            Column::name('user_who_input')->label('user_who_input'),
            DateColumn::raw('patient_arrival_time')->label('Sosire')->format('H:i')->defaultSort('asc')->alignCenter(),
            NumberColumn::name('visit_status')->label('Status'),
            NumberColumn::name('duration_between_exams')->label('Intre ex'),
            NumberColumn::name('duration_of_the_first_examination')->label('Prima ex'),

            BooleanColumn::name('keratometrie')->label('kerato')->alignCenter(),
            BooleanColumn::name('refratometrie')->label('refrato')->alignCenter(),
            BooleanColumn::name('optical_correction')->label('corectie')->alignCenter(),
            BooleanColumn::name('microscopie')->label('micros')->alignCenter(),
            NumberColumn::name('consultation_form_number')->label('Nr. Vizita'),
            Column::name('visits.fk_patient_id')->label('ID / Edit')->searchable()->alignCenter(),

        ];
    }
//    public function rowClasses($row, $loop)
//    {
//        return 'row-click this-row-id-'.$row->id.' divide-x divide-gray-100 text-sm text-gray-900 ' . ($this->rowIsSelected($row) ? 'bg-yellow-100' : ($row->{'id'} === 2 ? 'bg-red-500' : ($loop->even ? 'bg-gray-100' : 'bg-gray-50')));
//    }

    public function cellClasses($row, $column)
    {
        return 'onMouseHoverClass text-sm ' . ($this->rowIsSelected($row) ? ' text-gray-900' : ($row->{'id'} === 1 ? ' text-green-500' : ' text-gray-900')) . ($column['name'] == 'patient_arrival_time' && $row->patient_arrival_time == '23:12' ? ' text-yellow-500' : '') . ($column['name'] == 'id' ? ' what-id this-id-'.$row->id : '');
    }

//    public function rowAction($row)
//    {
//        return "window.open('add_consultatie/".$row->id."', '_blank')";
//    }

    public function cellAction($row, $column)
    {

        if($column['name'] == 'visits.fk_patient_id'){
            return "Livewire.emit('openModal', 'edit-observation-file', {'select_patient':'$row->pay_patient', 'row_id':'$row->id'})";
        } elseif ($column['name'] == 'procedures.procedure_medical_name'){
            return "window.open('/pdf/consultatie/".$row->id."', '_blank', 'width=650, height=870')";
        } else {
            return "window.open('add_consultatie/".$row->id."', '_blank')";
        }

    }

    public function refreshLivewireDatatable($withParams){
        $this->paramsExtra = date("Y-m-d", strtotime($withParams));
        $this->builder();
    }

}