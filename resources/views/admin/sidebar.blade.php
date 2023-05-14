<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        &nbsp; &nbsp; &nbsp;
        <a class="navbar-brand" href="{{url('/admindashboard')}}"><img src="images/squats-logo.png" style="color:white; width:50px"></a>
        <label class="logo"> SQUATS - Security System </label>
        </div>
        <ul class="nav">

            <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-light">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                  <li class="nav-item menu-items">
               <!-- Account Management -->
                <x-jet-responsive-nav-link class="fas fa fa-user fas-2x text-gray-400" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif
                </a>
            </li>

          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>

          @if (Auth::user()->usertype == "Admin")

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('admindashboard')}}">
              <span class="menu-icon">
                <i class="fas fa fa-share-square fas-2x"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item menu-items">
             <a class="nav-link" href="{{url('loginformation')}}">
              <span class="menu-icon">
                <i class="fas fa fa-book fas-2x"></i>
              </span>
              <span class="menu-title">Incident Logs</span>
            </a>
          </li>

          <li class="nav-item menu-items">
             <a class="nav-link" href="{{url('viewusers')}}">
              <span class="menu-icon">
                <i class="fas fa fa-users fas-2x"></i>
              </span>
              <span class="menu-title">User Management</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('expectedVisitor')}}">
              <span class="menu-icon">
                <i class="fas fa fa-table fas-2x"></i>
              </span>
              <span class="menu-title">Visitor Management</span>
            </a>
          </li>

          @endif

          @if (Auth::user()->usertype == "Staff")

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('staffresidentlist')}}">
              <span class="menu-icon">
                <i class="fas fa fa-table fas-2x"></i>
              </span>
              <span class="menu-title">Resident Qr Code</span>
            </a>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('scanQR')}}">
              <span class="menu-icon">
                <i class="fas fa fa-qrcode fas-2x"></i>
              </span>
              <span class="menu-title">QR Code Scanner</span>
            </a>
          </li>

          @endif

        </ul>
      </nav>

      <style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

    @import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);

    .fas-2x {
        font-size: 90px;
    }

    .main-menu {
        background: #212121;
        border-right: 1px solid #e5e5e5;
        position: absolute;
        top: 0;
        bottom: 0;
        height: 100%;
        left: 0;
        width: 60px;
        overflow: hidden;
        -webkit-transition: width .05s linear;
        transition: width .05s linear;
        -webkit-transform: translateZ(0) scale(1, 1);
        z-index: 1000;
    }

    .main-menu>ul {
        margin: 7px 0;
    }

    .main-menu li {
        position: relative;
        display: block;
        width: 250px;
    }

    .main-menu li>a {
        position: relative;
        display: table;
        border-collapse: collapse;
        border-spacing: 0;
        color: #999;
        font-family: arial;
        font-size: 14px;
        text-decoration: none;
        -webkit-transform: translateZ(0) scale(1, 1);
        -webkit-transition: all .1s linear;
        transition: all .1s linear;

    }

    .main-menu .nav-icon {
        position: relative;
        display: table-cell;
        width: 60px;
        height: 36px;
        text-align: center;
        vertical-align: middle;
        font-size: 18px;
    }

    .main-menu .nav-text {
        position: relative;
        display: table-cell;
        vertical-align: middle;
        width: 190px;
        font-family: 'Titillium Web', sans-serif;
    }

    .main-menu>ul.logout {
        position: absolute;
        left: 0;
        bottom: 0;
    }

    .no-touch .scrollable.hover {
        overflow-y: hidden;
    }

    .no-touch .scrollable.hover:hover {
        overflow-y: auto;
        overflow: visible;
    }

    a:hover,
    a:focus {
        text-decoration: none;
    }

    nav {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    nav ul,
    nav li {
        outline: 0;
        margin: 0;
        padding: 0;
    }

    .main-menu li:hover>a,
    nav.main-menu li.active>a,
    .dropdown-menu>li>a:hover,
    .dropdown-menu>li>a:focus,
    .dropdown-menu>.active>a,
    .dropdown-menu>.active>a:hover,
    .dropdown-menu>.active>a:focus,
    .no-touch .dashboard-page nav.dashboard-menu ul li:hover a,
    .dashboard-page nav.dashboard-menu ul li.active a {
        color: #fff;
        background-color: #5fa2db;
    }

    .area {
        float: left;
        background: #e2e2e2;
        width: 100%;
        height: 100%;
    }

    @font-face {
        font-family: 'Titillium Web';
        font-style: normal;
        font-weight: 300;
        src: local('Titillium WebLight'), local('TitilliumWeb-Light'), url(http://themes.googleusercontent.com/static/fonts/titilliumweb/v2/anMUvcNT0H1YN4FII8wpr24bNCNEoFTpS2BTjF6FB5E.woff) format('woff');
    }
</style>
