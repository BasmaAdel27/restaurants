@extends('restaurants.layout')
@section('title')@lang('tables')@endsection
@section('styles')
 <style>
   .card .card-body {
     padding: 1.5rem 0;
   }
 </style>
@endsection
@section('content')
    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('QrCode_table')</h2>
        <a href="{{ route('restaurant.tables.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
    </div>
      <div class="card" style="width: 15rem;height:20rem;margin: auto;">
        <img src="{{asset($table->qr_code)}}" class="card-img-top" alt="..." id="print_this" >
        <div class="card-body">
          <form>
            <button type="button" class="btn btn-success m-2" id="print"
                    style="{{ (app()->getLocale() =='ar') ? 'left:0;' : 'right:0;' }}">@lang('print')</button>
          </form>
        </div>
      </div>

@endsection
