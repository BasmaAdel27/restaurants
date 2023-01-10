@can('admin.tables.show')
<a href="{{ route('admin.tables.show',$query->id) }}" class="btn btn-outline-info mr-2 p-2">@lang('show')</a>
@endcan
@can('admin.tables.edit')
<a href="{{ route('admin.tables.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>
@endcan

@can('admin.tables.destroy')
  <button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
          onclick="DeleteElement(this)">@lang('delete')</button>
  <form action="{{ route('admin.tables.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
    @csrf
  </form>
@endcan
