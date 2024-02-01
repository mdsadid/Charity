<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2 logo-big">
                <img src="{{ getImage(getFilePath('logoFavicon') . '/logo_dark.png') }}" alt="logo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder logo-small">
                <img src="{{ getImage(getFilePath('logoFavicon') . '/favicon.png') }}" alt="logo">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="las la-chevron-left align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ navigationActive('admin.dashboard', 1) }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-tachometer-alt text-primary"></i>
                <div class="text-truncate">@lang('Dashboard')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.gateway*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons las la-credit-card text-info"></i>
                <div class="text-truncate">@lang('Payment Methods')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ navigationActive('admin.gateway.automated*', 1) }}">
                    <a href="{{ route('admin.gateway.automated.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('Automated')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.gateway.manual*', 1) }}">
                    <a href="{{ route('admin.gateway.manual.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('Manual')</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ navigationActive('admin.campaign*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons las la-bullhorn text-success"></i>
                <div class="text-truncate">@lang('Campaign Management')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ navigationActive('admin.campaign.category', 1) }}">
                    <a href="{{ route('admin.campaign.category') }}" class="menu-link">
                        <div class="text-truncate">@lang('Category')</div>
                    </a>
                </li>
                {{-- <li class="menu-item {{ navigationActive('admin.gateway.manual*', 1) }}">
                    <a href="{{ route('admin.gateway.manual.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('Manual')</div>
                    </a>
                </li> --}}
            </ul>
        </li>

        <li class="menu-item {{ navigationActive('admin.user*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons las la-user-tie text-purple"></i>
                <div class="text-truncate text-nowrap d-inline-block">@lang('Users')</div>
                @if ($bannedUsersCount > 0 || $emailUnconfirmedUsersCount > 0 || $mobileUnconfirmedUsersCount > 0 || $kycUnconfirmedUsersCount > 0 || $kycPendingUsersCount > 0)
                    <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto"><i class="las la-exclamation"></i></div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ navigationActive('admin.user.index', 1) }}">
                    <a href="{{ route('admin.user.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('All')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.user.active', 1) }}">
                    <a href="{{ route('admin.user.active') }}" class="menu-link">
                        <div class="text-truncate">@lang('Active')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.user.banned', 1) }}">
                    <a href="{{ route('admin.user.banned') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('Banned')</div>
                        @if ($bannedUsersCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $bannedUsersCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.user.kyc.pending', 1) }}">
                    <a href="{{ route('admin.user.kyc.pending') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('KYC Pending')</div>
                        @if ($kycPendingUsersCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $kycPendingUsersCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.user.kyc.unconfirmed', 1) }}">
                    <a href="{{ route('admin.user.kyc.unconfirmed') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('KYC Unconfirmed')</div>
                        @if ($kycUnconfirmedUsersCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $kycUnconfirmedUsersCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.user.email.unconfirmed', 1) }}">
                    <a href="{{ route('admin.user.email.unconfirmed') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('Email Unconfirmed')</div>
                        @if ($emailUnconfirmedUsersCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $emailUnconfirmedUsersCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.user.mobile.unconfirmed', 1) }}">
                    <a href="{{ route('admin.user.mobile.unconfirmed') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('Mobile Unconfirmed')</div>
                        @if ($mobileUnconfirmedUsersCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $mobileUnconfirmedUsersCount }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ navigationActive('admin.deposit*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons las la-wallet text-cyan"></i>
                <div class="text-truncate text-nowrap d-inline-block">@lang('Deposits')</div>
                @if ($pendingDepositsCount)
                    <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto"><i class="las la-exclamation"></i></div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ navigationActive('admin.deposit.pending', 1) }}">
                    <a href="{{ route('admin.deposit.pending') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('Pending')</div>
                        @if ($pendingDepositsCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $pendingDepositsCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.deposit.done', 1) }}">
                    <a href="{{ route('admin.deposit.done') }}" class="menu-link">
                        <div class="text-truncate">@lang('Done')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.deposit.canceled', 1) }}">
                    <a href="{{ route('admin.deposit.canceled') }}" class="menu-link">
                        <div class="text-truncate">@lang('Canceled')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.deposit.index*', 1) }}">
                    <a href="{{ route('admin.deposit.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('All')</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ navigationActive('admin.withdraw*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons las la-university text-pink"></i>
                <div class="text-truncate text-nowrap d-inline-block">@lang('Withdrawals')</div>
                @if ($pendingWithdrawCount)
                    <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto"><i class="las la-exclamation"></i></div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ navigationActive('admin.withdraw.method*', 1) }}">
                    <a href="{{ route('admin.withdraw.method.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('Methods')</div>
                    </a>
                </li>

                <li class="menu-item {{ navigationActive('admin.withdraw.pending', 1) }}">
                    <a href="{{ route('admin.withdraw.pending') }}" class="menu-link">
                        <div class="text-truncate text-nowrap d-inline-block">@lang('Pending')</div>
                        @if ($pendingWithdrawCount)
                            <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $pendingWithdrawCount }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.withdraw.done', 1) }}">
                    <a href="{{ route('admin.withdraw.done') }}" class="menu-link">
                        <div class="text-truncate">@lang('Done')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.withdraw.canceled', 1) }}">
                    <a href="{{ route('admin.withdraw.canceled') }}" class="menu-link">
                        <div class="text-truncate">@lang('Canceled')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.withdraw.index', 1) }}">
                    <a href="{{ route('admin.withdraw.index') }}" class="menu-link">
                        <div class="text-truncate">@lang('All')</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ navigationActive('admin.transaction*', 1) }}">
            <a href="{{ route('admin.transaction.index') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-exchange-alt text-primary"></i>
                <div class="text-truncate">@lang('Transactions')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.contact*', 1) }}">
            <a href="{{ route('admin.contact.index') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-address-book text-info"></i>
                <div class="text-truncate">@lang('Contacts')</div>
                @if ($unansweredContactsCount)
                    <div class="badge bg-label-danger fs-tiny rounded-pill ms-auto">{{ $unansweredContactsCount }}</div>
                @endif
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.subscriber*', 1) }}">
            <a href="{{ route('admin.subscriber.index') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-heartbeat text-success"></i>
                <div class="text-truncate">@lang('Subscribers')</div>
            </a>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text">@lang('GENERAL PREFERENCES')</span>
        </li>

        <li class="menu-item {{ navigationActive('admin.basic*', 1) }}">
            <a href="{{ route('admin.basic.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-cog text-purple"></i>
                <div class="text-truncate">@lang('Basic')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.notification*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons las la-bell text-cyan"></i>
                <div class="text-truncate">@lang('Email & SMS')</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ navigationActive('admin.notification.universal', 1) }}">
                    <a href="{{ route('admin.notification.universal') }}" class="menu-link">
                        <div class="text-truncate">@lang('Universal Template')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.notification.email', 1) }}">
                    <a href="{{ route('admin.notification.email') }}" class="menu-link">
                        <div class="text-truncate">@lang('Email Config')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.notification.sms', 1) }}">
                    <a href="{{ route('admin.notification.sms') }}" class="menu-link">
                        <div class="text-truncate">@lang('SMS Config')</div>
                    </a>
                </li>
                <li class="menu-item {{ navigationActive('admin.notification.templates', 1) }}">
                    <a href="{{ route('admin.notification.templates') }}" class="menu-link">
                        <div class="text-truncate">@lang('All Templates')</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ navigationActive('admin.plugin*', 1) }}">
            <a href="{{ route('admin.plugin.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-plug text-blue"></i>
                <div class="text-truncate">@lang('Plugins')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.language*', 1) }}">
            <a href="{{ route('admin.language.index') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-language text-indigo"></i>
                <div class="text-truncate">@lang('Language')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.seo*', 1) }}">
            <a href="{{ route('admin.seo.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-globe text-pink"></i>
                <div class="text-truncate">@lang('SEO')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.kyc*', 1) }}">
            <a href="{{ route('admin.kyc.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-user-check text-primary"></i>
                <div class="text-truncate">@lang('KYC')</div>
            </a>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text">@lang('FRONTEND')</span>
        </li>

        <li class="menu-item {{ navigationActive('admin.site.themes*', 1) }}">
            <a href="{{ route('admin.site.themes') }}" class="menu-link">
                <i class="menu-icon tf-icons lab la-themeisle text-success"></i>
                <div class="text-truncate">@lang('Themes')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.site.sections*', 2) }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons la la-grip-horizontal text-info"></i>
                <div class="text-truncate">@lang('Site Content')</div>
            </a>
            <ul class="menu-sub">
                @php $lastSegment = collect(request()->segments())->last(); @endphp

                @foreach (getPageSections(true) as $key => $section)
                    <li class="menu-item @if ($lastSegment == $key) active @endif">
                        <a href="{{ route('admin.site.sections', $key) }}" class="menu-link">
                            <div class="text-truncate">{{ __($section['name']) }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        <li class="menu-header small">
            <span class="menu-header-text">@lang('OTHERS')</span>
        </li>

        <li class="menu-item {{ navigationActive('admin.cookie*', 1) }}">
            <a href="{{ route('admin.cookie.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-cookie text-purple"></i>
                <div class="text-truncate">@lang('GDPR Cookie')</div>
            </a>
        </li>

        <li class="menu-item {{ navigationActive('admin.maintenance*', 1) }}">
            <a href="{{ route('admin.maintenance.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons las la-tools text-cyan"></i>
                <div class="text-truncate">@lang('Maintenance')</div>
            </a>
        </li>

        <li class="menu-item sidebar-menu-item">
            <a href="javascript:void(0)" role="button" class="menu-link" data-bs-target="#cacheModal" data-bs-toggle="modal">
                <i class="menu-icon tf-icons las la-eraser text-indigo"></i>
                <div class="text-truncate">@lang('Cache Clear')</div>
            </a>
        </li>

        <li class="menu-item sidebar-menu-item">
            <a href="javascript:void(0)" role="button" class="menu-link" data-bs-target="#systemInfoModal" data-bs-toggle="modal">
                <i class="menu-icon tf-icons las la-info-circle text-success"></i>
                <div class="text-truncate">@lang('System Info')</div>
            </a>
        </li>
    </ul>
</aside>

<div class="modal fade" id="cacheModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">@lang('Flush System Cache')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr>
            <form method="GET" action="{{ route('admin.cache.clear') }}">
                <div class="modal-body">
                    <div class="card border">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="demo-inline-spacing p-4">
                                    <ul class="list-group list-group-timeline">
                                        <li class="list-group-item list-group-timeline-primary">
                                            <b>@lang('The cache containing compiled views will be removed')</b>
                                        </li>
                                        <li class="list-group-item list-group-timeline-success">
                                            <b>@lang('The cache containing application will be removed')</b>
                                        </li>
                                        <li class="list-group-item list-group-timeline-warning">
                                            <b>@lang('The cache containing route will be removed')</b>
                                        </li>
                                        <li class="list-group-item list-group-timeline-info">
                                            <b>@lang('The cache containing configuration will be removed')</b>
                                        </li>
                                        <li class="list-group-item list-group-timeline-secondary">
                                            <b>@lang('Clearing out the compiled service and package files')</b>
                                        </li>
                                        <li class="list-group-item list-group-timeline-danger">
                                            <b>@lang('The cache containing system will be removed')</b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Clear')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="systemInfoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">@lang('System Information')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <hr>

            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="demo-inline-spacing mt-3">
                            <div class="list-group list-group-horizontal-md text-md-center">
                                <a class="list-group-item list-group-item-action active" id="home-list-item" data-bs-toggle="list" href="#app-info">@lang('Application')</a>
                                <a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#server-info">@lang('Server')</a>
                            </div>
                            <div class="tab-content px-0 mt-0">
                                <div class="tab-pane fade show active" id="app-info">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>{{ systemDetails()['name'] }} @lang('Version')</b>
                                            <span>{{ systemDetails()['version'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Charity Admin Version')</b>
                                            <span>{{ systemDetails()['build_version'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Laravel Version')</b>
                                            <span>{{ app()->version() }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Timezone')</b>
                                            <span>{{ config('app.timezone') }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="server-info">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('PHP Version')</b>
                                            <span>{{ phpversion() }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Server Software')</b>
                                            <span>{{ @$_SERVER['SERVER_SOFTWARE'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Server IP Address')</b>
                                            <span>{{ @$_SERVER['SERVER_ADDR'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Server Protocol')</b>
                                            <span>{{ @$_SERVER['SERVER_PROTOCOL'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('HTTP Host')</b>
                                            <span>{{ @$_SERVER['HTTP_HOST'] }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <b>@lang('Server Port')</b>
                                            <span>{{ @$_SERVER['SERVER_PORT'] }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
