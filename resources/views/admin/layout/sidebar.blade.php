<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
{{--    @role('trainer')--}}
{{--    @can('restaurant.dashboard')--}}
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('restaurant.dashboard') }}">--}}
{{--          <i class="mdi mdi-home menu-icon"></i>--}}
{{--          <span class="menu-title">@lang('dashboard')</span>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--    @endcan--}}
{{--    @can('restaurant.tables.index')--}}

{{--    <li class="nav-item">--}}
{{--      <a class="nav-link" href="{{route('restaurant.tables.index')}}">--}}
{{--        <i class="mdi mdi-food-variant menu-icon"></i>--}}
{{--        <span class="menu-title">@lang('tables')</span>--}}
{{--      </a>--}}
{{--    </li>--}}
{{--    @endcan--}}
{{--    @endrole--}}

    @can('admin.dashboard')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">@lang('dashboard')</span>
      </a>
    </li>
    @endcan
    @can('admin.restaurants.index')
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.restaurants.index')}}">
        <i class="mdi mdi-receipt menu-icon"></i>
        <span class="menu-title">@lang('restaurants')</span>
      </a>
    </li>
    @endcan






  </ul>


</nav>
