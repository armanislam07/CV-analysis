
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CV Analysis | Starter</title>
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-iso.css') }}"> -->
  <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('css/multi.css') }}">

  <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    
  <!-- <link rel="stylesheet" href="{{ asset('css/app.css')}}"> -->
</head>
<body class="hold-transition sidebar-mini ">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('images/emon.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('images/emon.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('images/emon.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link" target="_blank">
      {{-- <img src="{{asset('images/AdvanceCode-Logo.png')}}" alt="Advance Code Ltd" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">CV Analysis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{Auth::user()->name}}</>
          <!-- Status -->
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          @can('isAdmin')
          <a href="{{route('admin.dashboard')}}" class="nav-link active">
            <i class="fa fa-tachometer"></i> 
            <span>Dashboard</span></a>
          @endcan
          @can('isCompany')
          <a href="{{route('company.dashboard')}}" class="nav-link active">
            <i class="fa fa-tachometer"></i> 
            <span>Dashboard</span></a>
          @endcan
          @can('isUser')
            <a href="{{route('home')}}" class="nav-link active">
            <i class="fa fa-tachometer"></i> 
            <span>Dashboard</span></a>
          @endcan
          </li>
        
        @can('isUser')
        <li class="nav-item">
          <a href="{{route('view.cv')}}" class="nav-link">
            <i class="fa fa-user"></i> 
            <span>View Resume</span></a>
        </li>
        <li class="nav-item">
          <a href="{{route('edit.cv')}}" class="nav-link">
            <i class="fa fa-user"></i> 
            <span>Edit Resume</span></a>
        </li>
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                Job Circuler
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('post.circuler.catagory')}}" class="nav-link">
                  <i class="fa fa-newspaper"></i> 
                  <span>All Circuler</span>
                </a>
              </li>              
              <li class="nav-item">
                <a href="{{ route('post.circuler.catagory.matched') }}" class="nav-link">
                  <i class="fa fa-user-newspaper"></i> 
                  <span>Matched Circuler</span>
                </a>
              </li>        
            </ul>
        </li>
        @endcan
        @can('isCompany')
        
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="fa fa-user"></i> 
            <span>Circuler Applyer</span></a>
        </li>
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-users"></i>
              <p>
                Company Profile
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('company.profile.view')}}" class="nav-link">
                  <i class="fa fa-users"></i> 
                  <span>View Profile</span>
                </a>
              </li>              
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-user-plus"></i> 
                  <span>Edit Profile</span>
                </a>
              </li>        
            </ul>
        </li>
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-briefcase"></i>
              <p>
               Job Circular
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                  <a href="{{ route('company.circular.view') }}" class="nav-link">
                    <i class="right fa fa-briefcase"></i>
                    <p>
                      All Job Circular
                    </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('company.circular') }}" class="nav-link">
                    <i class="right fa fa-briefcase"></i>
                    <p>
                      Add Job Circular
                    </p>
                  </a>
              </li>
              <!-- <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="right fa fa-briefcase"></i>
                    <p>
                      Apply Circular
                    </p>
                  </a>
              </li> -->        
            </ul>
        </li>
        
        @endcan

        @can('isAdmin')
          <li class="nav-item">
            <a href="{{route('admin.allusers')}}" class="nav-link">
              <i class="fa fa-user"></i> 
              <span>All Users</span></a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.allcomps')}}" class="nav-link">
              <i class="fa fa-user"></i> 
              <span>All Companys</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories') }}" class="nav-link">
              <i class="fa fa-user"></i> 
              <span>Categories</span></a>
          </li>
        @endcan
          <li class="nav-item">
             <a href="{{ route('logout') }}" class="nav-link"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
               <i class="fa fa-power-off text-red"></i>   <span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div> --}}


    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">CV Analysis</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script type="text/javascript" src="{{asset ('js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/msform.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jQuery-plugin-progressbar.js') }}" ></script>
<script type="text/javascript" src="{{asset('js/coustom.js')}}"></script>

<script>
$(".progress-bar1").loading();
     
</script>


</body>
</html>
