<div class="nk-sidebar nk-sidebar-fixed bg-white " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head ">
        <div class="nk-sidebar-brand ">
            <a href="/" class="logo-link nk-sidebar-logo">
                <h3 class="font-weight-bold">{{ config('app.name') }}</h3>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <i class="icon bi bi-arrow-left"></i>
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->

    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <x-bootstrap-icon name="house-door" class="icon"/>
                            </span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.employees') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <x-bootstrap-icon name="person" class="icon"/>
                            </span>
                            <span class="nk-menu-text">Employees</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.payroll') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <x-bootstrap-icon name="wallet" class="icon"/>
                            </span>
                            <span class="nk-menu-text">Payroll</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
