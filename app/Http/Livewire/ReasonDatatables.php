<?php

namespace App\Http\Livewire;

use App\Models\Reason;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ReasonDatatables extends LivewireDatatable
{
    public $model = Reason::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('reason_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-reason-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}