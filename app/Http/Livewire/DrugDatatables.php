<?php

namespace App\Http\Livewire;

use App\Models\Drug;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DrugDatatables extends LivewireDatatable
{
    public $model = Drug::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('drug_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-drug-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}