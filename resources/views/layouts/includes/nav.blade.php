<div class="header">
    <div class="header-left">
        <a href="{{ route('home') }}" class="logo">{{ config('app.name') }}
            <!-- <img src="assets/img/logo.svg" alt="Logo"> -->
        </a>
        <a href="{{ route('home') }}" class="logo logo-small">{{ config('app.name') }}
            <!-- <img src="assets/img/logo.svg" alt="Logo"> -->
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fas fa-bars"></i>
    </a>

    <div class="top-nav-search">
        <!-- <img class="img-fluid logo-dark mb-2" src="{{ asset('logo/logo5.jpeg') }}" alt="Logo"> -->
    </div>
    <div class="top-nav-search ml-5">
        <h5 style="margin-top: 18px; position: relative; width:360px">
            {{ \Carbon\Carbon::now()->timezone(Auth::user()->timezone)->format('D, M j, Y \a\t g:ia') }}
        </h5>
    </div>

    <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link notifications-item">
                <i class="fa fa-bell"></i> <span class="badge badge-pill">
                    <?php $notifications = auth()->user()->unreadNotifications; ?>
                    @if (isset($notifications))
                        {{ $notifications->count() ?? 0 }}
                    @else
                        0
                    @endif
                </span>
            </a>
        </li>

        <li class="nav-item dropdown has-arrow main-drop ml-md-3">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('avatar.png') }}" alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('my.profile') }}"><i class="feather-user"></i> Mon profil</a>
                <a class="dropdown-item" href="{{ route('change.password') }}"><i class="fa fa-lock"></i> Changer le mot de passe</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="feather-power"></i> Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
        </li>
    </ul>

</div>
