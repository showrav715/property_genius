@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <section class="gray">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-12">

                    <div class="signup-screen-wrap">
                        <div class="signup-screen-single">
                            <div class="text-center mb-4">
                                <h4 class="m-0 ft-medium">@lang('Login Your Account')</h4>
                            </div>

                            <form class="submit-form" id="loginform" action="{{ route('user.login.submit') }}" method="POST">
                                @includeIf('includes.user.form-both')
                                @csrf
                                <div class="row gy-3">
                                    <div class="form-group">
                                        <label class="mb-1">@lang('Your Email')</label>
                                        <input type="email" name="email" class="form-control rounded" placeholder="@lang('Email')*">
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-1">@lang('Password')</label>
                                        <input type="password" name="password" class="form-control rounded" placeholder="@lang('Password')*">
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-1">
                                                <input id="dd" class="checkbox-custom" name="remember" type="checkbox">
                                                <label for="dd" class="checkbox-custom-label">@lang('Remember Me')</label>
                                            </div>
                                            <div class="eltio_k2">
                                                <a href="{{ route('user.forgot') }}" class="theme-cl">@lang('Lost Your Password')?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">
                                            @lang('Sign In') <div class="spinner-border formSpin" role="status"></div>
                                        </button>
                                    </div>

                                    <div class="form-group text-center mt-4 mb-0">
                                        <p class="mb-0">
                                            @lang("You Don't have any account")?
                                            <a href="{{ route('user.register') }}" class="ft-medium text-success">@lang('Sign Up')</a>
                                        </p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============================ Call To Action ================================== -->
        @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush
