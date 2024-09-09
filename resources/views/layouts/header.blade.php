    <div class="main-header  " style="margin-bottom: 50px" >
        <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="index.html" class="logo">
                    <img src={{asset("assets/img/kaiadmin/logo_light.svg")}} alt="navbar-brand" class="navbar-brand" height="20" />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" style="height: 10px;"  >
            <div class="container-fluid">
                <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                </nav>

                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                    <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                            <form class="navbar-left navbar-form nav-search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                </div>
                            </form>
                        </ul>
                    </li>
                    @php
                        $user = \App\Models\User::findOrFail(\Illuminate\Support\Facades\Auth::id())
                    @endphp
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="noti   fDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="notification">{{count($user->notifications)}}</span>
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                <div class="dropdown-title">
                                    You have {{count($user->notifications)}} new notification
                                </div>
                            </li>

                            <li>
                                <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        @forelse($user->notifications as $notification)
                                            <a href="#" class="notif" >{{$notification->data['data']}}</a>
                                            @empty
                                            <a href="#" class="notif" > NO Record</a>

                                        @endforelse
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="javascript:void(0);">See all notifications<i
                                        class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item topbar-user dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic me-5" data-bs-toggle="dropdown" href="#"
                            aria-expanded="false">
                            <div class="avatar-sm">
                                <img src={{asset("images/users/".Auth::user()->image)}} alt="..."
                                    class="avatar-img rounded-circle" />
                            </div>
                            <span class="profile-username">
                                <span class="op-7">Hi,</span>
                                <span class="fw-bold">{{ Auth::user()->name }}</span>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            <img src={{asset("images/users/".Auth::user()->image)}} alt="image-profile"
                                                class="avatar-img rounded" />
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted fs-6">{{ Auth::user()->email }}</p>
                                            @php
                                            $authUser = Auth::id();
                                            $user = App\Models\User::all();
                                            $candidate = App\Models\Candidate::where('user_id', $authUser)->first();
                                            $employee = App\Models\Employee::where('user_id', $authUser)->first();
                                            @endphp
                                            @can("is_candidate",$user)
                                            @if ($authUser == $candidate->user_id )
                                            <a href="{{route('candidate.show',$candidate->id)}}"
                                                class="btn btn-xs btn-secondary btn-sm mt-2 fw-bold">View Profile</a>
                                            @endif

                                            @endcan
                                            @can("is_employee",$user)


                                            @if ($authUser == $employee->user_id )
                                            <a href="{{route('employee.show',$employee->id)}}"
                                                class="btn btn-xs btn-secondary btn-sm mt-2 fw-bold">View Profile</a>
                                            @endif

                                            @endcan
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                            </div>
                        </ul>
                    </li>
                </ul>
                @endguest

            </div>
        </nav>
        <!-- End Navbar -->
    </div>
