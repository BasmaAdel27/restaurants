<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @role('restaurant')
    @can('restaurant.dashboard')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('restaurant.dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">@lang('dashboard')</span>
        </a>
      </li>
    @endcan
    @can('restaurant.customers.index')
    <li class="nav-item">
      <a class="nav-link" href="{{route('restaurant.customers.index')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">@lang('customers')</span>
      </a>
    </li>
    @endcan
    @can('restaurant.branches.index')
    <li class="nav-item">
      <a class="nav-link" href="{{route('restaurant.branches.index')}}">
        <i class="mdi mdi-source-branch menu-icon"></i>
        <span class="menu-title">@lang('branches')</span>
      </a>
    </li>
    @endcan
    @can('restaurant.sections.index')
    <li class="nav-item">
      <a class="nav-link" href="{{route('restaurant.sections.index')}}">
        <i class="mdi mdi-package menu-icon"></i>
        <span class="menu-title">@lang('sections')</span>
      </a>
    </li>
    @endcan
    @endrole

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
