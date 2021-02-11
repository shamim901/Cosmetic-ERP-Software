@php
    $settings = settings();
@endphp
<div class="container">
    <b-navbar toggleable="sm" type="light" variant="light">
        <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>

        <b-navbar-brand href={{ route('frontend.index') }}>
            <b-img thumbnail src="{{asset('storage/img/logo/'. $settings->logo)}}" width="128"
                   alt="placeholder"></b-img>
            Bangladesh Islamic Foundation
        </b-navbar-brand>

        <b-collapse id="nav-text-collapse" is-nav>
            <b-navbar-nav class="ml-auto">
                <b-nav-item right href={{ route('frontend.index') }}>Home</b-nav-item>
                <b-nav-item href={{ route('frontend.faqs') }}>FAQ</b-nav-item>
                <b-nav-item href={{ route('frontend.contacts') }}>Contact Us</b-nav-item>
                @if ($logged_in_user)
                    <b-nav-item href={{ route('frontend.user.dashboard') }}>Dashboard</b-nav-item>
                @endif
                @if (! $logged_in_user)
                    <b-nav-item href={{ route('frontend.auth.login') }}>{{ trans('navs.frontend.login') }}</b-nav-item>

                    @if (config('access.users.registration'))
                        <b-nav-item
                                href={{ route('frontend.auth.register') }}>{{ trans('navs.frontend.register') }}</b-nav-item>
                    @endif
                @else
                    <b-nav-item-dropdown text={{ $logged_in_user->name }}>
                        @permission('view-backend')
                        <b-dropdown-item
                                href={{ route('admin.dashboard') }}>{{ trans('navs.frontend.user.administration') }}</b-dropdown-item>
                        @endauth
                        <b-dropdown-item
                                href={{ route('frontend.user.account') }}>{{ trans('navs.frontend.user.account') }}</b-dropdown-item>
                        <b-dropdown-item
                                href={{ route('frontend.auth.logout') }}>{{ trans('navs.general.logout') }}</b-dropdown-item>
                    </b-nav-item-dropdown>
                @endif
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</div>
