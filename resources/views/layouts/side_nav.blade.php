<!-- ========== Left Sidebar Start ========== -->
@php
    $permissionObj = new \App\Services\PermissionService();
    $brvPermission = $permissionObj->getUserP       ermission(\Illuminate\Support\Facades\Auth::user()->id, '1');
    $bpvPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '2');
    $cpvPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '3');
    $crvPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '4');
    $jvPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '5');
    $documentPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '6');
    $userRegistrationPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '7');
    $companyRegistrationPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '8');
    $projectPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '9');
    $donorPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '10');
    $bankPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '11');
    $fYearPermission = $permissionObj->getUserPermission(\Illuminate\Support\Facades\Auth::user()->id, '12');
@endphp

<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ route('home') }}" class="logo"><img src="{{ asset('public/images/logo.png') }}" alt=""></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <!--<li class="menu-title">Main</li>-->

                @if(!empty($bpvPermission->menu_access) && $bpvPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('bpv.list')  }}" class="waves-effect">
                            <i class="mdi mdi-airplay"></i>
                            <span> BPV </span>
                        </a>
                    f</li>
                @endif
                @if(!empty($brvPermission->menu_access) && $brvPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('brv.list') }}" class="waves-effect"><i
                                    class="mdi mdi-layers"></i><span> BRV </span></a>
                    </li>
                @endif
                @if(!empty($cpvPermission->menu_access) && $cpvPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('cpv.list') }}" class="waves-effect"><i
                                    class="mdi mdi-email-variant"></i><span> CPV </span></a>
                    </li>
                @endif
                @if(!empty($crvPermission->menu_access) && $crvPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('crv.list') }}" class="waves-effect"><i
                                    class="mdi mdi-folder-outline"></i><span> CRV </span></a>
                    </li>
                @endif
                @if(!empty($jvPermission->menu_access) && $jvPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('jv.list') }}" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> JV </span></a>
                    </li>
                @endif
                @if(!empty($documentPermission->menu_access) && $documentPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i>
                            <span> Documents </span> <span class="float-right"><i
                                        class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            @if(!empty($companyRegistrationPermission->menu_access) && $companyRegistrationPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('company.list') }}"> <span>Company Registration</span> </a></li>
                            @endif
                            @if(!empty($companyRegistrationPermission->menu_access) && $companyRegistrationPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('govt-document.list') }}"> <span>Government Documents</span> </a></li>
                            @endif
                            @if(!empty($companyRegistrationPermission->menu_access) && $companyRegistrationPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('org-document.list') }}"> <span>Organizational Documents</span> </a></li>
                            @endif
                            @if(!empty($fYearPermission->menu_access) && $fYearPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('financial.year.list') }}"> <span>Financial Year</span></a></li>
                            @endif
                            @if(!empty($bankPermission->menu_access) && $bankPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('bank.list') }}"> <span>Bank Registration</span></a></li>
                            @endif
                            @if(!empty($donorPermission->menu_access) && $donorPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('donor.list') }}"> <span>Donor Registration</span></a></li>
                            @endif
                            @if(!empty($projectPermission->menu_access) && $projectPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('project.list') }}"> <span>Project Registration</span></a></li>
                            @endif
                            @if(!empty($userRegistrationPermission->menu_access) && $userRegistrationPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('users.list') }}"> <span>User Registration</span> </a></li>
                            @endif
                            @if(!empty($brvPermission->menu_access) && $brvPermission->menu_access == 1 || \Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                                <li><a href="{{ route('permission.list') }}"> <span>User Rights Management</span></a>
                                </li>
                            @endif

                        </ul>
                    </li>
                    @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
