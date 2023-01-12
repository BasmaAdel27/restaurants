<?php

namespace App\DataTables\Restaurant;

use App\Models\Section;use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SectionDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
              ->eloquent($query)
              ->editColumn('Action', function ($query) {
                  return view('restaurants.sections.datatable.action', compact('query'));
              })->rawColumns(['Action']);
    }


    public function query()
    {
        return Section::select('sections.*')->where('user_id',auth()->id())->newQuery();
    }


    public function html()
    {
        return $this->builder()
              ->columns($this->getColumns())
              ->minifiedAjax()
              ->dom('lBfrtip')
              ->orderBy(1)
              ->lengthMenu([7, 10, 25, 50, 75, 100])
              ->buttons(
                    Button::make('excel'),
              );
    }

    protected function getColumns()
    {
        return [
              Column::make('id')->title(trans('ID')),
              Column::make('name')->orderable(true)->title(trans('name')),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('updated_at')->title(trans('created_at')),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }
    protected function filename()
    {
        return 'Restaurant_Section_' . date('YmdHis');
    }
}
