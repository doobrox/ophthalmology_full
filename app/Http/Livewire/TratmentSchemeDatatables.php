<?php

namespace App\Http\Livewire;

use App\Models\TreatmentScheme;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TratmentSchemeDatatables extends LivewireDatatable
{
    public $model = TreatmentScheme::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('treatment_scheme_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-treatment-scheme-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}