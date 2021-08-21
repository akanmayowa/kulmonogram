<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KUL</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    @can('is_admin')
    @if (auth()->check())
    @if(auth()->user()->is_admin == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('users.index')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
        </a>
    </li>
    @else
    @endif
    @endif
    @else
@endcan
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('products.index')}}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Items</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('customers.index')}}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Customer</span>
        </a>
    </li>



    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('orders.index')}}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Order</span>
        </a>
    </li>
        <hr class="sidebar-divider">


 <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('suppliers.index')}}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Supplier</span>
        </a>
    </li>
<hr class="sidebar-divider">


<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('reports.index')}}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Report</span>
    </a>
</li>





    @if (auth()->check())
    @if(auth()->user()->is_admin == 1)
    <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('setting.index')}}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Setting</span>
    </a>
</li>
    @else
    @endif
    @endif

    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('users.profile')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profile</span>
        </a>
    </li>
    
    
<hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>



