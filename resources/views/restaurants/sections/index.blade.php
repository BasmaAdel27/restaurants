@extends('restaurants.layout')
@section('title') @lang('sections') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('sections')</h2>
      @can('restaurant.sections.store')
        <a href="{{ route('restaurant.sections.create') }}"
           class="btn btn-outline-primary btn-lg font-weight-bold">@lang('add')</a>
      @endcan
    </div>
    <div class="card-body table-responsive">
      {!! $dataTable->table([
      'class' => 'table table-striped table-hover Main-List'
      ],true) !!}
    </div>
  </div>


@endsection

@section('scripts')

  {!! $dataTable->scripts() !!}
@endsection
