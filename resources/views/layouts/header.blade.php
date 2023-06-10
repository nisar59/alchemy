<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('home')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{url('public/img/settings/'.Settings()->portal_favicon)}}" height="30" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="{{url('public/img/settings/'.Settings()->portal_logo)}}" height="100%" width="100%" alt="" >
                    </span>
                </a>
                <a href="{{url('home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{url('public/img/settings/'.Settings()->portal_favicon)}}" height="30" alt="" >
                    </span>
                    <span class="logo-lg">
                        <img src="{{url('public/img/settings/'.Settings()->portal_logo)}}" height="100%" width="100%" alt="">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
            <i class="mdi mdi-menu"></i>
            </button>
            <div class="d-none d-sm-block">
                <div class="dropdown pt-4 d-inline-block">
                    <input class="form-check form-switch" type="checkbox" id="maintenance" switch="bool" @if(app()->isDownForMaintenance()) @else checked @endif>
                    <label class="form-label" for="maintenance" data-on-label="Up" data-off-label="Down"></label>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/user-4.jpg')}}"alt="">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{url('users/edit/'.Auth::id())}}"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="{{url('lock-screen')}}?id={{UserDetail(Auth::id())->lock_screen_token}}"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{url('logout')}}"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
            
        </div>
    </div>
</header>