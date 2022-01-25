<?php

namespace App\Http\Livewire;

use App\Models\Visit;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PatientVisitsDatatables extends LivewireDatatable
{
    public $model = Visit::class;
    public $visits_id = 0;
    public $fk_patient_id = 0;

    public function builder()
    {
        return Visit::query()
            ->leftJoin('procedures', 'procedures.id', 'visits.fk_select_procedure_type')
            ->where('fk_patient_id', $this->fk_patient_id)
            ->where('visits.id', '!=', $this->visits_id);
    }

    public function columns()
    {
        return [

            Column::name('id')->label('id')->hide(),
            DateColumn::raw('visit_date')->label('visit_date')->format('d-m-Y'),
            NumberColumn::name('consultation_form_number')->label('Nr. Vizita'),
            NumberColumn::name('procedures.procedure_medical_name')->label('Procedura')->searchable(),
            BooleanColumn::name('is_casmb')->label('is_casmb'),
            NumberColumn::name('visit_status')->label('Status'),
            NumberColumn::name('duration_between_exams')->label('Durata intre ex'),
            NumberColumn::name('duration_of_the_first_examination')->label('Durata prima ex'),
        ];
    }

    public function refreshLivewireDatatable($withParams){
        $this->visits_id = $withParams['visits_id'];
        $this->fk_patient_id = $withParams['fk_patient_id'];
        $this->builder();
    }

    public function cellClasses($row, $column)
    {
        return 'onMouseHoverClass';
    }

    public function rowAction($row)
    {
//        dd($row);
        return "window.open('/pdf/consultatie_copie/".$row->id."', '_blank', 'width=650, height=870')";
    }

}