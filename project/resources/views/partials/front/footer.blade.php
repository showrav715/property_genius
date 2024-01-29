<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <img src="{{ asset('assets/images/'.$gs->footer_logo) }}" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p>
                                @php
                                    echo $ps->street;
                                @endphp
                            </p>
                            <p>{{ $ps->phone}}</p>
                            <p>{{ $ps->email }}</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">@lang('Navigations')</h4>
                        <ul class="footer-menu">
                            @foreach(DB::table('pages')->whereStatus(1)->orderBy('id','desc')->get() as $data)
                                <li>
                                    <a href="{{ route('front.page',$data->slug) }}">{{ $data->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">@lang('My Account')</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('front.become.agent') }}">@lang('Become an agent')</a></li>
                            <li><a href="{{ route('agent.login') }}">@lang('agent login')</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">@lang('Download Apps')</h4>
                        <a href="{{ $ps->google_play_link }}" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-playstore theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    @lang('Google Play')
                                    <span>@lang('Get It Now')</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ $ps->app_store_link }}" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-apple theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    @lang('App Store')
                                    <span>@lang('Now it Available')</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">
                        @php
                            echo $gs->copyright;
                        @endphp
                    </p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        @if ($sociallinks)
                            @foreach ($sociallinks as $key => $social)
                                <li>
                                    <a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
