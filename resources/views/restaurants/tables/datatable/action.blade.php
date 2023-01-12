
@can('restaurant.tables.show')
<a href="{{ route('restaurant.tables.show',$query->id) }}" class="btn btn-outline-info mr-2 p-2">@lang('show')</a>
@endcan

@can('restaurant.tables.update')
<a href="{{ route('restaurant.tables.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>
@endcan

@can('restaurant.tables.destroy')
  <button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
          onclick="DeleteElement(this)">@lang('delete')</button>
  <form action="{{ route('restaurant.tables.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
    @csrf
  </form>
@endcan
