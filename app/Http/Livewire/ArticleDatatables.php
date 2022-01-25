<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ArticleDatatables extends LivewireDatatable
{
    public $model = Article::class;

    public function columns()
    {
        return [

            Column::name('id')->hide()->defaultSort('desc'),
            Column::name('article_name')->label('Nume')->filterable()->searchable(),
            Column::name('article_code')->label('Cod')->alignRight()->filterable()->searchable(),
            Column::raw('FORMAT(article_price, 2) AS Pret')->alignRight()->filterable()->searchable(),
            Column::raw('FORMAT(article_discount, 2) AS Discount')->alignRight()->filterable()->searchable(),
            Column::callback(['id', 'id'], function ($id) {
                return view('components/datatable-article-actions', ['id' => $id]);
            })->unsortable()->label(''),
        ];
    }

}