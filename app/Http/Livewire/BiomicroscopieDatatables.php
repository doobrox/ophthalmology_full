<?php

namespace App\Http\Livewire;

use App\Models\Biomicroscopie;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BiomicroscopieDatatables extends LivewireDatatable
{
    public $model = Biomicroscopie::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('biomicroscopie_short_name')->label('Nume scurt')->filterable()->searchable(),
            Column::name('biomicroscopie_name')->label('Nume')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-biomicroscopie-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}