<?php

namespace App\Http\Livewire;

use App\Models\Gonioscopie;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class GonioscopieDatatables extends LivewireDatatable
{
    public $model = Gonioscopie::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('gonioscopie_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-gonioscopie-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}