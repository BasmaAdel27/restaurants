<?php

namespace App\Http\Controllers\Restaurant;

use App\DataTables\Restaurant\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct(){
        $this->middleware('permission:restaurant.sections.index')->only(['index']);
        $this->middleware('permission:restaurant.sections.store')->only(['store']);
        $this->middleware('permission:restaurant.sections.update')->only(['update']);
        $this->middleware('permission:restaurant.sections.delete')->only(['delete']);

    }
    public function index(SectionDataTable $sectionDataTable)
    {
        return $sectionDataTable->render('restaurants.sections.index');
    }


    public function create()
    {
        return view('restaurants.sections.create');
    }


    public function store(SectionRequest $request,Section $section)
    {
        $data=$request->validated();
        $section->fill($data);
        $section->user_id=auth()->id();
        $section->save();
        return redirect()->route('restaurant.sections.index')->with('success',trans('created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Section $section)
    {
        return view('restaurants.sections.edit',compact('section'));
    }


    public function update(SectionRequest $request, Section $section)
    {
        $data=$request->validated();
        $section->fill($data)->save();

        return redirect()->route('restaurant.sections.index')->with('success',trans('updated_successfully'));
    }



    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('restaurant.sections.index')->with('success',trans('deleted_successfully'));

    }
}
