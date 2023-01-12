<?php

namespace App\Http\Controllers\Restaurant;

use App\DataTables\Restaurant\BranchDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class branchController extends Controller
{
    public function __construct(){
        $this->middleware('permission:restaurant.branches.index')->only(['index']);
        $this->middleware('permission:restaurant.branches.store')->only(['store']);
        $this->middleware('permission:restaurant.branches.update')->only(['update']);
        $this->middleware('permission:restaurant.branches.delete')->only(['delete']);

    }
    public function index(BranchDataTable $BranchDataTable)
    {
        return $BranchDataTable->render('restaurants.branches.index');
    }


    public function create()
    {
        return view('restaurants.branches.create');
    }


    public function store(BranchRequest $request,Branch $branch)
    {
        $data=$request->validated();
        $branch->fill($data);
        $branch->user_id=auth()->id();
        $branch->save();
        return redirect()->route('restaurant.branches.index')->with('success',trans('created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Branch $branch)
    {
        return view('restaurants.branches.edit',compact('branch'));
    }


    public function update(BranchRequest $request, Branch $branch)
    {
        $data=$request->validated();
        $branch->fill($data)->save();

        return redirect()->route('restaurant.branches.index')->with('success',trans('updated_successfully'));
    }



    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('restaurant.branches.index')->with('success',trans('deleted_successfully'));

    }
}
