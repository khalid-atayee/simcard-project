<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link" style="background: white;">
      <img src="{{asset('assets/tota logo2.jpg')}}" alt="{{config('app.name')}} Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light" style="color: black">{{config('app.name')}}</span>
    </a>

    @php
      $user = Auth::user();
    @endphp
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset($user->photo == null ? 'dist/img/Omidjan Zazai.jpeg' : $user->photo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('profile')}}" class="d-block">{{$user->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ session('menu') == 'Dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                @lang('layouts/partial/sidebar.Dashboard')
              </p>
            </a>
          </li>
          
          @php $configuration_tab = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Configuration' ? 'menu-open' : '' }}" id="configuration_tab">
            <a href="#" class="nav-link {{ session('menu') == 'Configuration' ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                @lang('layouts/partial/sidebar.Configuration')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('Branch'))
              @php $configuration_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('branch.index')}}" class="nav-link {{ session('sub-menu') == 'Branch' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Branch')</p>
                </a>
              </li>
              @endif
              {{-- @if (Auth::user()->hasAccessDomain('Package Size'))
              @php $configuration_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('package_size.index')}}" class="nav-link {{ session('sub-menu') == 'Package Size' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package Size</p>
                </a>
              </li>
              @endif --}}
              @if (Auth::user()->hasAccessDomain('Product Types'))
              @php $configuration_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('product_types.index')}}" class="nav-link {{ session('sub-menu') == 'Product Types' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Product_Types')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @php $purchase_tab = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Purchase' ? 'menu-open' : '' }}" id="purchase_tab">
            <a href="#" class="nav-link {{ session('menu') == 'Purchase' ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                @lang('layouts/partial/sidebar.Purchase')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('New Purchase'))
              @php $purchase_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('purchase.create')}}" class="nav-link {{ session('sub-menu') == 'New Purchase' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.New_Purchase')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Purchase'))
              @php $purchase_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('purchase.index')}}" class="nav-link {{ session('sub-menu') == 'Purchase' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Purchase')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Suplliers'))
              @php $purchase_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('suplliers.index')}}" class="nav-link {{ session('sub-menu') == 'Suplliers' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Suplliers')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @php $process_tab = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Process' ? 'menu-open' : '' }}" id="process_tab">
            <a href="#" class="nav-link {{ session('menu') == 'Process' ? 'active' : '' }}">
              <i class="nav-icon fas fa-atom"></i>
              <p>
                @lang('layouts/partial/sidebar.Process')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('Process For Self'))
              @php $process_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('process.index', 'for_self')}}" class="nav-link {{ session('sub-menu') == 'Process For Self' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Process_For_Self')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Process For Others'))
              @php $process_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('process.index', 'for_others')}}" class="nav-link {{ session('sub-menu') == 'Process For Others' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Process_For_Others')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Process Type'))
              @php $process_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('process_type.index')}}" class="nav-link {{ session('sub-menu') == 'Process Type' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Process_Type')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @php $sells_tab = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Sells' ? 'menu-open' : '' }}" id="sells_tab">
            <a href="#" class="nav-link {{ session('menu') == 'Sells' ? 'active' : '' }}">
              <i class="nav-icon fas fa-magic"></i>
              <p>
                @lang('layouts/partial/sidebar.Sells')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('New Sell'))
              @php $sells_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('sells.create')}}" class="nav-link {{ session('sub-menu') == 'New Sell' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.New_Sell')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('All Sells'))
              @php $sells_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('sells.index')}}" class="nav-link {{ session('sub-menu') == 'All Sells' ? 'active' : '' }} {{ session('edit-sell') == 'All Sells' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.All_Sells')</p>
                </a>
              </li>
              @php session()->flash('edit-sell', null); @endphp
              @endif
              @if (Auth::user()->hasAccessDomain('Customers'))
              @php $sells_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('customers.index')}}" class="nav-link {{ session('sub-menu') == 'Customers' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Customers')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @if (Auth::user()->hasAccessDomain('Product Distribution'))
          <li class="nav-item">
            <a href="{{route('product_transaction.index')}}" class="nav-link {{ session('menu') == 'Product Distribution' ? 'active' : '' }}">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                @lang('layouts/partial/sidebar.Product_Transaction')
              </p>
            </a>
          </li>
          @endif

          @if (Auth::user()->hasAccessDomain('Expences'))
          <li class="nav-item">
            <a href="{{route('expences.index')}}" class="nav-link {{ session('menu') == 'Expences' ? 'active' : '' }}">
              <i class="nav-icon fas fa-star"></i>
              <p>
                @lang('layouts/partial/sidebar.Expences')
              </p>
            </a>
          </li>
          @endif
          
          @php $shareholders = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Shareholders' ? 'menu-open' : '' }}" id="shareholders">
            <a href="#" class="nav-link {{ session('menu') == 'Shareholders' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                @lang('layouts/partial/sidebar.Shareholders')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('Shareholders'))
              @php $shareholders++; @endphp
              <li class="nav-item">
                <a href="{{route('shareholder-show')}}" class="nav-link {{ session('sub-menu') == 'Active Shareholders' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Active')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Shareholders'))
              @php $shareholders++; @endphp
              <li class="nav-item">
                <a href="{{route('disabled_shareholders')}}" class="nav-link {{ session('sub-menu') == 'Disabled Shareholders' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Disabled')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          
          @php $employee = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Employee' ? 'menu-open' : '' }}" id="employee">
            <a href="#" class="nav-link {{ session('menu') == 'Employee' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                @lang('layouts/partial/sidebar.Employee')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('Skilled Employee'))
              @php $employee++; @endphp
              <li class="nav-item">
                <a href="{{route('employee.index', 'skilled')}}" class="nav-link {{ session('sub-menu') == 'Skilled Employee' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Skilled_Employee')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Un-Skilled Employee'))
              @php $employee++; @endphp
              <li class="nav-item">
                <a href="{{route('employee.index', 'un-skilled')}}" class="nav-link {{ session('sub-menu') == 'Un-Skilled Employee' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Un_Skilled_Employee')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Employee Attendance'))
              @php $employee++; @endphp
              <li class="nav-item">
                <a href="{{route('employee.attendance')}}" class="nav-link {{ session('sub-menu') == 'Employee Attendance' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Employee_Attendance')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @php $reports = 0; @endphp
          <li class="nav-item {{ session('menu') == 'Reports' ? 'menu-open' : '' }}" id="reports">
            <a href="#" class="nav-link {{ session('menu') == 'Reports' ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                @lang('layouts/partial/sidebar.Reports')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('Reports'))
              @php $reports++; @endphp
              <li class="nav-item">
                <a href="{{route('reports.index')}}" class="nav-link {{ session('sub-menu') == 'Reports' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Reports')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Employee Reports'))
              @php $reports++; @endphp
              <li class="nav-item">
                <a href="{{route('reports.index')}}" class="nav-link {{ session('sub-menu') == 'Employee Reports' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Employee_Reports')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Expenses Reports'))
              @php $reports++; @endphp
              <li class="nav-item">
                <a href="{{route('reports.index')}}" class="nav-link {{ session('sub-menu') == 'Expenses Reports' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Expenses_Reports')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>

          @php $user_management_tab = 0; @endphp
          <li class="nav-item {{ session('menu') == 'User Management' ? 'menu-open' : '' }}" id="user_management_tab">
            <a href="#" class="nav-link {{ session('menu') == 'User Management' ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('layouts/partial/sidebar.User_Management')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (Auth::user()->hasAccessDomain('All Users'))
              @php $user_management_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('user-show')}}" class="nav-link {{ session('sub-menu') == 'All Users' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.All_Users')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('Register New User'))
              @php $user_management_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('create-user')}}" class="nav-link {{ session('sub-menu') == 'register' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.Register_New_User')</p>
                </a>
              </li>
              @endif
              @if (Auth::user()->hasAccessDomain('User Jobs'))
              @php $user_management_tab++; @endphp
              <li class="nav-item">
                <a href="{{route('user.jobs')}}" class="nav-link {{ session('sub-menu') == 'User Jobs' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('layouts/partial/sidebar.User_Jobs')</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    
  <script>
    var count_configuration_tab = parseInt("{{$configuration_tab}}");
    
    if(count_configuration_tab == 0){
      var configuration_tab = document.getElementById('configuration_tab');
      if (configuration_tab != null) {
        configuration_tab.outerHTML = "";
      }
    }
    
    var count_purchase_tab = parseInt("{{$purchase_tab}}");
    
    if(count_purchase_tab == 0){
      var purchase_tab = document.getElementById('purchase_tab');
      if (purchase_tab != null) {
        purchase_tab.outerHTML = "";
      }
    }
    
    var count_process_tab = parseInt("{{$process_tab}}");
    
    if(count_process_tab == 0){
      var process_tab = document.getElementById('process_tab');
      if (process_tab != null) {
        process_tab.outerHTML = "";
      }
    }
    
    var count_sells_tab = parseInt("{{$sells_tab}}");
    
    if(count_sells_tab == 0){
      var sells_tab = document.getElementById('sells_tab');
      if (sells_tab != null) {
        sells_tab.outerHTML = "";
      }
    }
    
    var count_shareholders = parseInt("{{$shareholders}}");
    
    if(count_shareholders == 0){
      var shareholders = document.getElementById('shareholders');
      if (shareholders != null) {
        shareholders.outerHTML = "";
      }
    }
    
    var count_employee = parseInt("{{$employee}}");
    
    if(count_employee == 0){
      var employee = document.getElementById('employee');
      if (employee != null) {
        employee.outerHTML = "";
      }
    }
    
    var count_reports = parseInt("{{$reports}}");
    
    if(count_reports == 0){
      var reports = document.getElementById('reports');
      if (reports != null) {
        reports.outerHTML = "";
      }
    }

    var count_user_management_tab = parseInt("{{$user_management_tab}}");
    
    if(count_user_management_tab == 0){
      var user_management_tab = document.getElementById('user_management_tab');
      if (user_management_tab != null) {
        user_management_tab.outerHTML = "";
      }
    }
  </script>