<div class="nk-header nk-header-fixed is-light">
    <div>
        <div class="nk-header-wrap justify-content-between">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <x-bootstrap-icon name="list" class="icon"/>
                </a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="#" class="logo-link">
                    <h3 class="font-weight-bold">{{ env('APP_NAME') }}</h3>
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news">
                <div class="nk-news-list">
                    <div class="nk-news-item">
                        <div class="nk-news-icon">
                            <?php $time = date("H"); $timezone = date("e"); ?>

                            @if ((int)$time < 12)
                                <x-bootstrap-icon name="sun" class="icon"/>
                            @elseif ((int)$time >= 12 && (int)$time < 17)
                                <x-bootstrap-icon name="sun-fill" class="icon"/>
                            @elseif ((int)$time >= 17 && (int)$time < 19)
                                <x-bootstrap-icon name="moon" class="icon"/>
                            @elseif ((int)$time >= 19)
                                <x-bootstrap-icon name="moon-fill" class="icon"/>
                            @endif
                        </div>
                        <div>
                            <p>
                                Welcome Back!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <x-bootstrap-icon name="person" class="icon"/>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">{{ auth()->user()->email }}</div>
                                    <div class="user-name dropdown-indicator">{{ auth()->user()->name }}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
