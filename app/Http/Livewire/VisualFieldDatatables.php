<?php

namespace App\Http\Livewire;

use App\Models\VisualField;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class VisualFieldDatatables extends LivewireDatatable
{
    public $model = VisualField::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('visual_field_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-visual-field-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}