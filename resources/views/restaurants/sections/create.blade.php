@extends('restaurants.layout')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('sections')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('sections')</h2>
        <a href="{{ route('restaurant.sections.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('restaurant.sections.store') }}" method="post" enctype="multipart/form-data">@csrf
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("name")</label>
              <input type="text" class="form-control" name='name' value="{{ old('name')}}">
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
