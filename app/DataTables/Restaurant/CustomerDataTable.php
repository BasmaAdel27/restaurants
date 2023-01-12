<?php

namespace App\DataTables\Restaurant;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
              ->editColumn('first_name', function ($query) {
                  return $query->first_name.' '.$query->last_name;
              }) ->editColumn('Action', function ($query) {
                  return view('restaurants.customers.datatable.action', compact('query'));
              })->rawColumns(['first_name','Action']);
    }


    public function query()
    {
       $customers= Customer::select('customers.*')->where('user_id',auth()->id())->newQuery();
        if ($this->request()->get('date_from') && $this->request()->get('date_to')){
            return Customer::select('customers.*')->where('user_id',auth()->id())->
            whereBetween('created_at',[$this->request->date_from, $this->request->date_to])->newQuery();
        }
        else{
            return $customers;
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
              Column::make('id')->title(trans('ID')),
              Column::make('first_name')->orderable(true)->title(trans('name')),
              Column::make('email')->orderable(true)->title(trans('email')),
              Column::make('phone')->orderable(true)->title(trans('phone')),
              Column::make('address')->orderable(true)->title(trans('address')),
              Column::make('birth_date')->title(trans('birth_date')),
              Column::make('created_at')->title(trans('created_at')),
              Column::make('Action')->title(trans('action'))->searchable(false)->orderable(false)
        ];
    }
    protected function filename()
    {
        return 'Restaurant_Customer_' . date('YmdHis');
    }
}
