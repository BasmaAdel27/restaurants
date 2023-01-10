<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('admin.restaurants.index');
    }


    public function create()
    {
        return view('admin.restaurants.create');
    }


    public function store(UserRequest $request ,User $restaurant)
    {
        $data=$request->validated();
        $restaurant->fill($data);
        $restaurant->user_type='restaurant';
        $restaurant->save();
        $restaurant->assignRole('restaurant');
        return redirect()->route('admin.restaurants.index')->with('success',trans('created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(User $restaurant)
    {
        return view('admin.restaurants.edit',compact('restaurant'));
    }


    public function update(UserRequest $request, User $restaurant)
    {
        $data=$request->validated();
        $restaurant->fill($data)->save();
        return redirect()->route('admin.restaurants.index')->with('success',trans('updated_successfully'));
    }


    public function destroy(User $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index')->with('success',trans('deleted_successfully'));

    }
}
