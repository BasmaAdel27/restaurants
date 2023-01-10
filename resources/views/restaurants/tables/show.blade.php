@extends('admin.app')
@section('title') @lang('tables') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('tables')</h2>
      <a href="{{ route('admin.tables.index') }}" class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
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
          <label><strong>@lang("cost") :</strong></label>
          {{$table->cost}}
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
          <label><strong>@lang("user_name") :</strong></label>
         {{$table->user->getFullNameAttribute()}}
        </div>
        <div class="form-group col-6">
          <label><strong>@lang("qr_code") :</strong></label>
          <img src="{{asset($table->qr_code)}}" height="200px" width="200px">
        </div>




      </div>



    </div>

  </div>
  </div>

@endsection
