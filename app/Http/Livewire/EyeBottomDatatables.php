<?php

namespace App\Http\Livewire;

use App\Models\EyeBottom;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EyeBottomDatatables extends LivewireDatatable
{
    public $model = EyeBottom::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('eye_bottom_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-eye-bottom-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}