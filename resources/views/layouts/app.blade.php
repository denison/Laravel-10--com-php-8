<x-laravel-ui-adminlte::adminlte-layout>
    <head>
        <style>
            /* Remove bullet from ajax notification */
            .alert-ajax {
                list-style-type: none;
                display: none;
            }
            .alert-ajax {
                list-style-type: none;
                display: none;
                /* margin-left: 15px;
                margin-right: 15px;
                margin-bottom: 15px; */
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
        <!-- Select2 v4.0.13 -->
        {{-- <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"> --}}
        

       
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css"> --}}
        @stack('css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                    class="img-circle elevation-2" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.1.0
                </div>
                <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    {{-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> --}}
    <!-- LoadingOverlay v2.1.7 -->
    <script src="{{ asset('js/loadingoverlay.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <!-- Select2 v4.0.13 -->
     {{-- <script src="{{ asset('js/select2.min.js') }}"></script> --}}
     
    

    <script type="text/javascript">
        
        // Loading overlay
        function showLoading() {
                $.LoadingOverlay("show", {
                    // image            : '',
                    imageColor       : '#ccc',
                    // text             : customText,
                    // textResizeFactor : 0.2,
                    // textColor        : '#fff',
                    background       : 'rgba(0, 0, 0, 0.5)',
                    fade             : [200, 200],
                });
            }
            function hideLoading() {
                $.LoadingOverlay("hide");
            }
    </script>
    @stack('scripts')
</x-laravel-ui-adminlte::adminlte-layout>
