<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href=" {{ asset('/template/assets/index.html') }}"><img src=" {{ asset('template/assets/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
            </div>
        </form>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                {{-- jika user belum login  --}}
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

                {{-- jika user sudah login  --}}
                <li class="dropdown">
                    <a href=" {{ asset('/template/assets/#') }}" class="dropdown-toggle" data-toggle="dropdown"><img src=" {{ asset('template/assets/img/user.png') }}" class="img-circle" alt="Avatar"> <span> {{ Auth::user()->name }} </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        {{--  <li>
                            <a href="{{ route('password.change') }}"><i class="fas fa-unlock"></i><span>Ganti Password</span></a>
                        </li>  --}}
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt">
                             {{ __('Logout') }}
                            </i>
                         </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
                <ul class="navbar-nav ml-auto">
                    @endguest
                </ul>
            </ul>
        </div>
    </div>
</nav>
