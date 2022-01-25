<?php

namespace App\Http\Livewire;

use App\Models\Diagnostic;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DiagnosticDatatables extends LivewireDatatable
{
    public $model = Diagnostic::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('diagnostic_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-diagnostic-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}