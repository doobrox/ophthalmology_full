<?php

namespace App\Http\Livewire;

use App\Models\Visit;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AssistantDatatables extends LivewireDatatable
{
    public $model = Visit::class;
    public $paramsExtra = 0;

    public function builder()
    {
        return Visit::query()
            ->leftJoin('patients', 'patients.id', 'visits.fk_patient_id')
            ->leftJoin('procedures', 'procedures.id', 'visits.fk_select_procedure_type')
            ->leftJoin('doctors', 'doctors.id', 'visits.fk_doctor_assigned_to_patient' )
            ->leftJoin('users', 'users.id', 'visits.user_who_input' )
            ->whereDate('visit_date', '=', ($this->paramsExtra == 0 ? date("Y-m-d") : $this->paramsExtra));
    }
    public function columns()
    {
        return [

            Column::name('id')->label('id')->hide(),
            Column::raw('CONCAT_WS(" ", patients.patient_name, patients.patient_forename) AS patient_name')->label('Nume')->searchable(),
//            NumberColumn::name('consultation_form_number')->label('Nr. Vizita'),
            Column::raw('CONCAT_WS(" ", doctors.doctor_name, doctors.doctor_forename) AS doctor_name')->label('Doctor')->searchable(),
//            NumberColumn::name('fk_doctor_casmb_assigned_to_patient')->label('fk_doctor_casmb_assigned_to_patient'),
            NumberColumn::name('procedures.procedure_medical_name')->label('Procedura')->searchable(),
            BooleanColumn::name('is_casmb')->label('cas'),
            DateColumn::raw('patient_arrival_time')->label('Sosire')->format('H:i')->defaultSort('asc'),
            NumberColumn::name('visit_status')->label('Status'),

            BooleanColumn::name('keratometrie')->label('kerato'),
            BooleanColumn::name('refratometrie')->label('refrato'),
            BooleanColumn::name('optical_correction')->label('optica'),
            BooleanColumn::name('microscopie')->label('microscop'),
        ];
    }

    public function cellClasses($row, $column)
    {
        return 'onMouseHoverClass';
    }

    public function rowAction($row)
    {
        return "window.open('add_ochelari/".$row->id."', '_blank')";
    }

    public function refreshLivewireDatatable($withParams){
        $this->paramsExtra = date("Y-m-d", strtotime($withParams));
        $this->builder();
    }

}