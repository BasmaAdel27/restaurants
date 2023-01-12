@extends('restaurants.layout')
@section('title') @lang('branches') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('branches')</h2>
      @can('restaurant.branches.store')
        <a href="{{ route('restaurant.branches.create') }}"
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
