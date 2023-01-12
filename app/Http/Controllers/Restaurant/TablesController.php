<?php

namespace App\Http\Controllers\Restaurant;

use App\DataTables\Restaurant\TableDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\TableRequest;
use App\Models\Branch;
use App\Models\RestTable;
use App\Models\Section;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TablesController extends Controller
{
    public function __construct(){
        $this->middleware('permission:restaurant.tables.index')->only(['index']);
        $this->middleware('permission:restaurant.tables.store')->only(['store']);
        $this->middleware('permission:restaurant.tables.update')->only(['update']);
        $this->middleware('permission:restaurant.tables.delete')->only(['delete']);

    }
    public function index(TableDataTable $tableDataTable)
    {
        return $tableDataTable->render('restaurants.tables.index');
    }


    public function create()
    {
        $branches=Branch::where('user_id',auth()->id())->pluck('name','id');
        $sections=Section::where('user_id',auth()->id())->pluck('name','id');
        return view('restaurants.tables.create',compact('branches','sections'));
    }


    public function store(TableRequest $request,RestTable $table)
    {
        $data=$request->validated();
        $table->fill($data);
        $table->user_id=auth()->id();
        $table->save();
        $path='/qrCodes/'.time().'.svg';
        $qrCode=QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-9',public_path($path));
        $table->qr_code=$path;
        $table->save();
        return redirect()->route('restaurant.tables.qrCode',$table)->with('success',trans('created_successfully'));
    }

   public function qrCode(RestTable $table){

       return view('restaurants.tables.qrCode',compact('table'));
   }
    public function show(RestTable $table)
    {
        return view('restaurants.tables.show',compact('table'));
    }


    public function edit(RestTable $table)
    {
        $branches=Branch::where('user_id',auth()->id())->pluck('name','id');
        $sections=Section::where('user_id',auth()->id())->pluck('name','id');
        return view('restaurants.tables.edit',compact('branches','sections','table'));
    }


    public function update(TableRequest $request, RestTable $table)
    {
        $data=$request->validated();
        $table->fill($data)->save();

        return redirect()->route('restaurant.tables.index')->with('success',trans('updated_successfully'));
    }


    public function destroy(RestTable $table)
    {
        unlink(public_path($table->qr_code));
        $table->delete();
        return redirect()->route('restaurant.tables.index')->with('success',trans('deleted_successfully'));

    }
}
