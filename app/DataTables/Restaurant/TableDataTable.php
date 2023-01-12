<?php

namespace App\DataTables\Restaurant;

use App\Models\RestTable;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TableDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
              ->eloquent($query)
              ->editColumn('branch.name', function ($query) {
                  return $query->branch->name;
              })->editColumn('section.name', function ($query) {
                  return $query->section->name;
              })->editColumn('created_at', function ($query) {
                  return Carbon::parse($query->created_at)->format('Y-m-d h:m:s A');
              })->editColumn('updated_at', function ($query) {
                  return Carbon::parse($query->updated_at)->format('Y-m-d h:m:s A');
              })->editColumn('has_paid', function ($query) {
                  return ($query->has_paid == 1) ? '<span class="btn btn-success">' . trans('yes') . "</span>" : '<span class="btn btn-danger">' . trans('no') . "</span>";
              })->editColumn('Action', function ($query) {
                  return view('restaurants.tables.datatable.action', compact('query'));
              })->rawColumns(['branch.name','section.name','has_paid','Action']);
    }


    public function query()
    {
        $tables= RestTable::select('rest_tables.*')->where('user_id',auth()->id())
              ->with(['branch','section'])->newQuery();
        if ($this->request()->get('date_from') && $this->request()->get('date_to')){
            return RestTable::select('rest_tables.*')->where('user_id',auth()->id())
                  ->with(['branch','section'])->
            whereBetween('created_at',[$this->request->date_from, $this->request->date_to])->newQuery();
        }
        else{
            return $tables;
        }
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
              Column::make('number')->orderable(true)->title(trans('number')),
              Column::make('name')->orderable(true)->title(trans('table_name')),
              Column::make('branch.name')->orderable(true)->title(trans('branch_name')),
              Column::make('section.name')->orderable(true)->title(trans('section_name')),
              Column::make('has_paid')->orderable(true)->title(trans('has_paid')),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('updated_at')->title(trans('created_at')),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }
    protected function filename()
    {
        return 'Restaurant_Table_' . date('YmdHis');
    }
}
