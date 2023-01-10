@extends('admin.app')
@section('title') @lang('restaurants') @endsection
@section('content')

  <div class="card mt-5">
    <div class="card-header d-flex justify-content-between">
      <h2 class="mb-4">@lang('restaurants')</h2>
      @can('admin.restaurants.create')
        <a href="{{ route('admin.restaurants.create') }}"
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
