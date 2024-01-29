
    <li class="{{ request()->routeIs('user.dashboard') ? 'active' : ''}}"><a href="{{ route('user.dashboard') }}"><i class="ti-layout-grid3-alt"></i>@lang('Dashboard')</a></li>
    <li class="{{ request()->routeIs('user.transaction') ? 'active' : ''}}"><a href="{{ route('user.transaction') }}"><i class="ti-layout-cta-btn-left"></i>@lang('Transactions')</a></li>
    @if (auth()->user()->is_agent == 2 )
        <li><a href="{{ route('agent.dashboard') }}"><i class="ti-dashboard"></i>@lang('Agent Dashboard')</a></li>
        <li><a href="{{ route('front.agent.details',auth()->user()->username) }}"><i class="ti-layers"></i>@lang('Profile public view')</a></li>
    @endif
    <li class="{{ request()->routeIs('user.property.bookmark') ? 'active' : ''}}"><a href="{{ route('user.property.bookmark') }}"><i class="ti-bookmark"></i>@lang('Bookmarked Listing')</a></li>
    <li class="{{ request()->routeIs('user.buy.rent') ? 'active' : ''}}"><a href="{{ route('user.buy.rent') }}"><i class="ti-target"></i>@lang('Buy/Rent Properties')</a></li>
    <li class="{{ request()->routeIs('user.all.invest.property') ? 'active' : ''}}"><a href="{{ route('user.all.invest.property') }}"><i class="ti-wheelchair"></i>@lang('Invest')</a></li>
    <li class="{{ request()->routeIs('user.invest.history') ? 'active' : ''}}"><a href="{{ route('user.invest.history') }}"><i class="ti-time"></i>@lang('My Investment')</a></li>
    <li class="{{ request()->routeIs('user.deposit.create') ? 'active' : ''}}"><a href="{{ route('user.deposit.create') }}"><i class="ti-arrow-up"></i>@lang('Deposit')</a></li>
    <li class="{{ request()->routeIs('user.deposit.index') ? 'active' : ''}}"><a href="{{ route('user.deposit.index') }}"><i class="ti-loop"></i>@lang('Deposit history')</a></li>
    <li class="{{ request()->routeIs('user.withdraw.index') ? 'active' : ''}}"><a href="{{ route('user.withdraw.index') }}"><i class="ti-arrow-down"></i>@lang('Payout')</a></li>
    <li class="{{ request()->routeIs('user.withdraw.history') ? 'active' : ''}}"><a href="{{ route('user.withdraw.history') }}"><i class="ti-arrow-down"></i>@lang('Payout History')</a></li>
    <li class="{{ request()->routeIs('user.package.index') ? 'active' : ''}}"><a href="{{ route('user.package.index') }}"><i class="ti-layers"></i>@lang('Pricing Plan')</a></li>
    @if ($ticket = DB::table('admin_user_conversations')->orderBy('id','desc')->first())
        <li class="{{ request()->routeIs('user.message.index') ? 'active' : ''}}"><a href="{{ route('user.message.index',['ticket' => $ticket->id]) }}"><i class="ti-ticket"></i>@lang('Support')</a></li>
    @else
        <li><a href="{{ route('user.message.index') }}"><i class="ti-ticket"></i>@lang('Support')</a></li>
    @endif
    <li class="{{ request()->routeIs('user.referral.index') ? 'active' : ''}}"><a href="{{ route('user.referral.index') }}"><i class="ti-user"></i>@lang('Referred Users')</a></li>
    <li class="{{ request()->routeIs('user.referral.commissions') ? 'active' : ''}}"><a href="{{ route('user.referral.commissions') }}"><i class="ti-user"></i>@lang('Referral Commissions')</a></li>
    <li class="{{ request()->routeIs('user.profile.index') ? 'active' : ''}}"><a href="{{ route('user.profile.index') }}"><i class="ti-user"></i>@lang('My Profile')</a></li>
    <li class="{{ request()->routeIs('user.change.password.form') ? 'active' : ''}}"><a href="{{ route('user.change.password.form') }}"><i class="ti-unlock"></i>@lang('Change Password')</a></li>
    <li class="{{ request()->routeIs('user.logout') ? 'active' : ''}}"><a href="{{ route('user.logout') }}"><i class="ti-power-off"></i>@lang('Log Out')</a></li>
