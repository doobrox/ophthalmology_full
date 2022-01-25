<?php

namespace App\Http\Livewire;

use App\Models\Procedure;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProcedureDatatables extends LivewireDatatable
{
    public $model = Procedure::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('procedure_medical_name')->label('Nume')->filterable()->searchable(),
            Column::name('procedure_code')->label('Cod')->alignRight()->filterable()->searchable(),
            Column::raw('FORMAT(procedure_price, 2) AS Pret')->alignRight()->filterable()->searchable(),
            Column::raw('FORMAT(procedure_discount, 2) AS Discount')->alignRight()->filterable()->searchable(),
//            Column::name('procedure_price')->label('Pret')->filterable()->searchable(),
//            Column::name('procedure_discount')->label('Discount')->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-procedure-actions', ['id' => $id]);
            })->unsortable()->label('')->width('250px'),
        ];
    }

}