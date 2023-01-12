
@can('restaurant.customers.update')
<a href="{{ route('restaurant.customers.edit',$query->id) }}" class="btn btn-outline-success mr-2 p-2">@lang('edit')</a>
@endcan

@can('restaurant.customers.destroy')
  <button type="submit" class="btn btn-outline-danger mr-2 p-2 " form="DeleteForm"
          onclick="DeleteElement(this)">@lang('delete')</button>
  <form action="{{ route('restaurant.customers.destroy',$query->id) }}" id="DeleteForm" method="POST">@method('delete')
    @csrf
  </form>
@endcan
