@extends('admin.app')
@section('title') @lang('tables') @endsection
@section('content')
<div class="container">
  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('tables')</h2>
      <a href="{{ route('restaurant.tables.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
    </div>
    <div class="card-body">
      <p class="card-description">
        @lang('table_details')
      </p>
      <div class="row">
        <div class="form-group col-6">
          <label><strong>@lang("number") :</strong></label>
          {{$table->number}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("table_name") :</strong></label>
          {{$table->name}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("has_paid") :</strong></label>
          @if($table->has_paid == 0)
          @lang('no')
          @else
          @lang('yes')
          @endif
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("branch") :</strong></label>
         {{$table->branch->name}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("section") :</strong></label>
         {{$table->section->name}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("qr_code") :</strong></label>
          <div class="card" style="width: 15rem;height:20rem;margin: auto;">
            <img src="{{asset($table->qr_code)}}" class="card-img-top" alt="..." id="print_this" >
            <div class="card-body" style=" padding: 1.5rem 0;">
              <form>
                <button type="button" class="btn btn-success m-2" id="print"
                        style="{{ (app()->getLocale() =='ar') ? 'left:0;' : 'right:0;' }}">@lang('print')</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
  </div>

@endsection
