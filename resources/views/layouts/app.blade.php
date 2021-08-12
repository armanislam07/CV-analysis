<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark navbar-expand-md fixed-top navbar-laravel">

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->CV Analysis
                </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.circuler.catagory')}}">Categories</a>
                        </li>
                        
                        
                    </ul>
                   
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item dropdown soca">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sign in <span class="b-or">or</span> Create Account
                            </a>
                            <ul class="dropdown-menu stop-propagation">
                                 <li class="login-form-n">
                                 
                                    <div class="cart-mbdj">
                                        <div class="cart-mbdj-l">
                                            <i class="fa fa-laptop"></i>
                                        </div>
                                        <div class="cart-mbdj-r">
                                            <div class="t-txt">My jobs</div>
                                            <div class="des-txt">Sign in or create your My jobs account to manage your profile</div>
                                            <div class="btn-wraper">
                                                <a href="{{ route('login') }}" class="btn slu-btn">Sign in</a>
                                                <a href="{{ route('register') }}" class="ca-btn slu-btn">Create Account</a>
                                            </div>
                                        </div>
                                     </div>
                                     
                                    <div class="cart-emp">
                                        <div class="cart-emp-l">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <div class="cart-emp-r">
                                            <div class="t-txt">Employers</div>
                                            <div class="des-txt">Sign in or create account to find the best candidates in the fastest way</div>
                                            <div class="btn-wraper">
                                                <a href="{{ route('company.login') }}" class="btn slu-btn">Sign in</a>
                                                <a href="{{ route('company.register') }}" class="ca-btn slu-btn">Create Account</a>
                                            </div>
                                        </div>    
                                    </div>
                                    
                                 </li>
                              </ul>
                        </li>
                        
                        
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
     <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
     <script src="{{ asset('js/mdb.min.js') }}" ></script>
     <script src="{{ asset('js/datatables.min.js') }}" ></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

     

<script>
        // Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>

 
    
</body>
</html>
