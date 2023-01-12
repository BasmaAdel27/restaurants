@extends('restaurants.layout')
@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title')@lang('customers')@endsection
@section('content')
  <div class="container">

    <div class="card mt-5">
      <div class="card-header d-flex justify-content-between">
        <h2 class="mb-4">@lang('customers')</h2>
        <a href="{{ route('restaurant.customers.index') }}"
           class="btn btn-outline-dark btn-lg font-weight-bold">@lang('back')</a>
      </div>
      <div class="card-body table-responsive">
        <form action="{{ route('restaurant.customers.store') }}" method="post" enctype="multipart/form-data">@csrf
          <div class="row">
            <div class="form-group col-6">
              <label>@lang("first_name")</label>
              <input type="text" class="form-control" name='first_name' value="{{ old('first_name')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("last_name")</label>
              <input type="text" class="form-control" name='last_name' value="{{ old('last_name')}}">
            </div>

            <div class="form-group col-6">
              <label>@lang("birth_date")</label>
              <input type="date" class="form-control" name='birth_date' value="{{ old('birth_date')}}" >
            </div>
            <div class="form-group col-6">
              <label>@lang("phone")</label>
              <input type="text" class="form-control" name='phone' value="{{ old('phone')}}" placeholder="00966xxxxxxxxx">
            </div>

            <div class="form-group col-6">
              <label>@lang("email")</label>
              <input type="email" class="form-control" name='email'  value="{{old('email')}}">
            </div>
            <div class="form-group col-6">
              <label>@lang("address")</label>
              <input type="text" class="form-control" name='address'  value="{{old('address')}}">
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
