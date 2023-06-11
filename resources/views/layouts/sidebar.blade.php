@php
$pref = Request()->route()->getPrefix();
$type = Request()->type;
@endphp

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
                <li @if ($pref == '') class="mm-active" @endif>
                    <a href="{{url('home')}}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               
                <li class="menu-title">Users</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('users')}}">Users</a></li>
                    </ul>
                </li>
                
               
                <li class="menu-title">Documents</li>
                <li>
                    <a href="{{url('documents')}}" class="waves-effect">
                        <i class="fas fa-file"></i>
                        <span>Documets</span>
                    </a>
                </li>
               
                
                <li class="menu-title">Penal Settings</li>
                <li>
                    <a href="{{url('settings')}}" class="waves-effect">
                        <i class="fas fa-cogs"></i>
                        <span>Penal Settings</span>
                    </a>
                </li> 
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>