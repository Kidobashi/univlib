<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
            <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                <i class="fab fa-laravel" ></i>
                <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                <b class="caret mt-1"></b>
            </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        {{-- <li @if ($pageSlug == 'profile') class="active " @endif> --}}
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        @can('is-admin')
                            <a href="{{ route('admin.users.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>User Management</p>
                            </a>
                        @endcan
                        @can('is-librarian')
                            <a href="/reports">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Reports</p>
                            </a>
                        @endcan
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li @if ($pageSlug == 'notifications') class="active " @endif> --}}
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
