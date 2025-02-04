<!-- Top Bar Start -->

<div class="topbar">

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <!-- language-->

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{ !empty(\Illuminate\Support\Facades\Auth::user()->avatar) ? asset('public/uploads/users/'.\Illuminate\Support\Facades\Auth::user()->avatar) : asset('public/images/placeholder.jpg') }}" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    {{--<a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>--}}
                    {{--<div class="dropdown-divider"></div>--}}
                    <a class="dropdown-item" href="{{url('logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>

        </ul>
        <ul class="list-inline float-left mb-0" style="
                margin-top: 27px;
                margin-left: 10px;
                font-size: large;
            ">
                    <li style="
                color: white;
            ">
                    Document Management Systems
                        </li>
                </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

            <!--<li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </li>-->
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>
<!-- Top Bar End -->