
@can('restaurant.branches.update')
<a href="{{ route('restaurant.branches.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>
@endcan

@can('restaurant.branches.destroy')
  <button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
          onclick="DeleteElement(this)">@lang('delete')</button>
  <form action="{{ route('restaurant.branches.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
    @csrf
  </form>
@endcan
