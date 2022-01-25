<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Procedure;
use App\Models\ProceduresHasUsers;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Illuminate\Support\Facades\DB;

class ProcedureAssociationDatatables extends LivewireDatatable
{

    public $model = Procedure::class;
    public $paramsExtra = 0;

    public function builder()
    {
        if ($this->paramsExtra == 0) {
            return Procedure::query();
        } elseif (isset($this->paramsExtra['discount_value'])){
            return Procedure::query();
        } else {
            return Procedure::query()
                ->join('procedures_has_users', 'procedures.id', 'procedures_has_users.fk_user_id');
        }
    }

    public function columns()
    {
        return [
            Column::checkbox(),
            Column::name('procedure_medical_name')->label('Nume')->filterable()->searchable()->defaultSort('asc'),
            Column::raw('FORMAT(procedure_code, 2) AS Cod')->alignRight()->filterable()->searchable()->width('150px'),
            Column::raw('FORMAT(procedure_price, 2) AS Pret')->alignRight()->filterable()->searchable()->width('150px'),
            Column::raw('FORMAT(procedure_price, 2) AS Preferential')->alignRight()->filterable()->searchable()->width('150px'),
            Column::name('procedure_discount')->label('%')->editable()->width('150px'),

        ];
    }

    public function refreshLivewireDatatable($withParams){

        $this->paramsExtra = $withParams;
        $this->builder();
    }


//    public $checkboxAutoSave;

//    public function toggleCheckboxAutoSave($id, $procedure_price, $procedure_discount, $procedure_advance, $procedure_points){
//
//        $fk_user_id = 1;
//        $isExist = ProceduresForUsers::select("*")
//            ->where("fk_procedure_id", $id)
//            ->exists();
//
//        if ($isExist) {
//            ProceduresForUsers::where('fk_user_id',$fk_user_id)->where('fk_procedure_id',$id)->delete();
//        }else{
//            ProceduresForUsers::create([
//                'fk_procedure_id' => $id,
//                'fk_user_id' => $fk_user_id,
//                'procedure_price' => $procedure_price,
//                'procedure_discount' => $procedure_discount,
//                'procedure_advance' => $procedure_advance,
//                'procedure_points' => $procedure_points,
//            ]);
//        }
//    }
}