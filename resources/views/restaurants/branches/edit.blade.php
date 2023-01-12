@extends('restaurants.layout')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('branches')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('branches')</h2>
        <a href="{{ route('restaurant.branches.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('restaurant.branches.update',$branch) }}" method="post" >@csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("name")</label>
              <input type="text" class="form-control" name='name' value="{{old('name',$branch->name)}}">
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
