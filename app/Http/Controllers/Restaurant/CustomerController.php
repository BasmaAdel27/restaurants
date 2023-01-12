<?php

namespace App\Http\Controllers\Restaurant;

use App\DataTables\Restaurant\CustomerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('permission:restaurant.customers.index')->only(['index']);
        $this->middleware('permission:restaurant.customers.store')->only(['store']);
        $this->middleware('permission:restaurant.customers.update')->only(['update']);
        $this->middleware('permission:restaurant.customers.delete')->only(['delete']);

    }

    public function index(CustomerDataTable $customerDataTable)
    {
       return $customerDataTable->render('restaurants.customers.index') ;
    }


    public function create()
    {
        return view('restaurants.customers.create');
    }


    public function store(CustomerRequest $request,Customer $customer)
    {
        $data=$request->validated();
        $customer->fill($data);
        $customer->user_id=auth()->id();
        $customer->save();
        return redirect()->route('restaurant.customers.index')->with('success',trans('created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Customer $customer)
    {
     return view('restaurants.customers.edit',compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $data=$request->validated();
        $customer->fill($data)->save();
        return redirect()->route('restaurant.customers.index')->with('success',trans('updated_successfully'));
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('restaurant.customers.index')->with('success',trans('deleted_successfully'));

    }
}
