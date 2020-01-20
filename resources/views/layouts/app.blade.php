<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    {{-- include datatable --}}
    {{-- <script src="{{ asset('/DataTables/media/js/jquery-3.4.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/DataTables/media/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('/DataTables/media/css/dataTables.bootstrap.css') }}">

    {{-- include font awesome --}}
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.min.css') }}">
    {{-- include datepicker gijgo --}}
    <link rel="stylesheet" href="{{ asset('/libraries/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="navbar-brand" href="/kepegawaian">
                                {{ ('Daftar Pegawai') }}
                            </a>

                            <a class="navbar-brand" href="/dashboard">
                                {{ ('Dashboard') }}
                            </a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                {{-- <a href="{{ route('password.change') }}">Change Password</a> --}}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('password.change') }}">
                                        Change Password
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{-- isi halaman --}}
            @yield('content')
            @if (session('sukses'))
                <div class="flash-data" data-flashdata="{{ session('sukses') }}"></div>
            @endif
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    {{-- include script sweet alert --}}
    <script src="{{ asset('/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/myAlert.js') }}"></script>

    {{-- include libarary moment js  --}}
    <script src="{{ asset('/libraries/moment/moment.min.js') }}"></script>
    {{-- include datepicker Gijgo  --}}
    <script src="{{ asset('/libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- iclude custom js  --}}
    <script src="{{ asset('/js/datePicker.js') }}"></script>
    {{-- config myScript  --}}
    {{-- <script src="{{ asset('/js/myScript.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.all.js') }}"></script> --}}
    @yield('chart')

</body>
</html>

@yield('modal')
