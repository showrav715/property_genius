
<div class="header  {{ request()->path() == '/' ? 'header-transparent change-logo' : 'header-light head-shadow' }}">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                @if ( request()->path() == '/')
                    <a class="nav-brand static-logo" href="{{ route('front.index') }}"><img src="{{ asset('assets/images/'.$gs->footer_logo) }}" class="logo" alt="" /></a>
                    <a class="nav-brand fixed-logo" href="{{ route('front.index') }}"><img src="{{ asset('assets/images/'.$gs->logo) }}" class="logo" alt="" /></a>
                @else
                    <a class="nav-brand" href="{{ route('front.index') }}">
                        <img src="{{ asset('assets/images/'.$gs->logo) }}" class="logo" alt="" />
                    </a>
                @endif
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="{{ request()->routeIs('front.index') ? 'active' : '' }}">
                        <a href="{{ url('/') }}">@lang('Home')</a>
                    </li>

                    <li class="{{ request()->routeIs('front.listing') ? 'active' : '' }}">
                        <a href="{{ route('front.listing') }}">@lang('Listings')</a>
                    </li>

                    <li class="{{ request()->routeIs('front.invests') ? 'active' : '' }}">
                        <a href="{{ route('front.invests') }}">@lang('Invest Properties')</a>
                    </li>

                    <li class="{{ request()->routeIs('front.agents') ? 'active' : '' }}">
                        <a href="{{ route('front.agents') }}">@lang('Agents')</a>
                    </li>

                    <li><a href="{{ request()->routeIs('front.blog') || request()->routeIs('front.plans') ? 'active' : ''}}">@lang('Pages')<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('front.blog') }}">@lang('Blogs')</a></li>
                            <li><a href="{{ route('front.plans') }}">@lang('Pricing')</a></li>
                            <li><a href="{{ route('front.contact') }}">@lang('Contact Us')</a></li>
                            <li><a href="{{ route('front.become.agent') }}">@lang('Become an agent')</a></li>
                        </ul>
                    </li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    @guest
                        <li>
                            <a href="{{ route('user.login') }}">
                                <i class="fas fa-user-circle mr-1"></i>@lang('Signin')</a>
                        </li>
                    @endguest

                    @auth
                        <li><a href="JavaScript:Void(0);">@lang('My Account')<span class="submenu-indicator"></span></a>
                            <ul class="nav-dropdown nav-submenu">
                                <li><a href="{{ route('user.dashboard') }}">@lang('User Dashboard')</a></li>
                                <li><a href="{{ route('user.change.password.form') }}">@lang('Change Password')</a></li>
                                <li><a href="{{ route('user.logout') }}">@lang('Sign Out')</a></li>
                            </ul>
                        </li>
                    @endauth

                        <li class="add-listing theme-bg">
                            <a href="{{ route('front.property.create') }}">@lang('Add Property')</a>
                        </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
