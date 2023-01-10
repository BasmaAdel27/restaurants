@extends('admin.app')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('restaurants')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('restaurants')</h2>
        <a href="{{ route('admin.restaurants.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('admin.restaurants.update',$restaurant) }}" method="post" >@csrf
          @method('PUT')
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("name")</label>
              <input type="text" class="form-control" name='name' value="{{old('name',$restaurant->name)}}">
            </div>

            <div class="form-group col-6">
              <label>@lang("phone")</label>
              <input type="text" class="form-control" name='phone'value="{{old('phone',$restaurant->phone)}}">
            </div>

            <div class="form-group col-6">
              <label>@lang("email")</label>
              <input type="email" class="form-control" name='email' value="{{old('email',$restaurant->email)}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("address")</label>
              <input type="text" class="form-control" name='address' value="{{old('address',$restaurant->address)}}">
            </div>
            <div class="form-group col-6">
              <label>@lang('password')</label>
              <input type="password" class="form-control" placeholder="@lang('password')" name="password">
            </div>
            <div class="form-group col-6">
              <label>@lang('password_confirmation')</label>
              <input type="password" class="form-control" placeholder="@lang('password_confirmation')"
                     name="password_confirmation">
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
