<nav class="navbar navbar-default" style="margin-bottom: 0px">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           @php
             $settings = settings();
           @endphp
{{--           @if($settings->logo)--}}
{{--               <div class="logo">--}}
{{--                   <a href="{{ route('frontend.index') }}">--}}
{{--                        <img height="48" width="226" class="navbar-brand" src="{{asset('storage/img/logo/'. $settings->logo)}}">--}}
{{--                    </a>--}}
{{--               </div>--}}
{{--           @else--}}
{{--             {{ link_to_route('frontend.index', app_name(), [], ['class' => 'navbar-brand']) }}--}}
{{--           @endif--}}

            <div>
                <div class="col-lg-4 col-sm-12">
                    <a href="{{ route('frontend.index') }}">
                        <img height="48" width="226" class="navbar-brand" src="{{asset('storage/img/logo/'. $settings->logo)}}">
                    </a>
                </div>
                <div class="col-lg-8 vertical-align-style hidden-xs">
                  <h4>Bangladesh Islamic Foundation</h4>
                </div>
            </div>

        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            {{-- <ul class="nav navbar-nav">
                <li></li>
            </ul> --}}
            <ul class="nav navbar-nav navbar-right" style="margin-right: -91px;padding-top: 30px;">
                
                {{ renderFrontMenuItems(getFrontMenuItems()) }}

                    
                @if (! $logged_in_user)
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $logged_in_user->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @permission('view-backend')
                                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth

                            <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                            <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                        </ul>
                    </li>
                @endif
          
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>