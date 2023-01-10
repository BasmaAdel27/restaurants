@extends('admin.app')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('users')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('tables')</h2>
        <a href="{{ route('admin.tables.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('admin.tables.update',$table) }}" method="post" >@csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("number")</label>
              <input type="number" class="form-control" name='number' value="{{ old('number',$table->number)}}" min="0">
            </div>
            <div class="form-group col-6">
              <label>@lang("cost")</label>
              <input type="text" class="form-control" name='cost' value="{{ old('cost',$table->cost)}}">
            </div>

            <div class="form-group col-6">
              <label>@lang('user_name')</label>
              <select name="user_id" id="restaurant" class="form-control">
                <option value="">@lang('select')</option>
                @foreach ($restaurants as $id => $name)
                  <option value="{{$id}}"   {{ old('user_id',$table->user_id) == $id ? 'selected' : '' }}>{{$name}}</option>
                @endforeach
              </select>
            </div>


          </div>
          <div class="row">
            <div class="form-group col-6">
              <input type="submit" class="btn btn-dark" value="@lang('submit')">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
