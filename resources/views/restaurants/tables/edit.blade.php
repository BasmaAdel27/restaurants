@extends('restaurants.layout')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('tables')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('tables')</h2>
        <a href="{{ route('restaurant.tables.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('restaurant.tables.update',$table) }}" method="post" >@csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("number")</label>
              <input type="number" class="form-control" name='number' value="{{ old('number',$table->number)}}" min="0">
            </div>
            <div class="form-group col-6">
              <label>@lang("table_name")</label>
              <input type="text" class="form-control" name='name' value="{{ old('name',$table->name)}}">
            </div>

            <div class="form-group col-6">
              <label>@lang('branches')</label>
              <select name="branch_id" id="branch" class="form-control">
                <option value="">@lang('select')</option>
                @foreach ($branches as $id => $name)
                  <option value="{{$id}}"   {{ old('branch_id',$table->branch_id) == $id ? 'selected' : '' }}>{{$name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-6">
              <label>@lang('sections')</label>
              <select name="section_id" id="section" class="form-control">
                <option value="">@lang('select')</option>
                @foreach ($sections as $id => $name)
                  <option value="{{$id}}"   {{ old('section_id',$table->section_id) == $id ? 'selected' : '' }}>{{$name}}</option>
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
