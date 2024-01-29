@extends('layouts.front')

@push('css')

@endpush

@section('content')
<section class="gray">
    <div class="container">
        <div class="row align-items-start justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-12">

                <div class="signup-screen-wrap">
                    <div class="signup-screen-single light">
                        <div class="text-center mb-4">
                            <h4 class="m-0 ft-medium">@lang('Create An Account')</h4>
                        </div>

                        <form id="registerform" class="row gy-3" action="{{ route('user.register') }}" method="POST">
                            @includeIf('includes.user.form-both')
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="mb-1">@lang('Your Name')</label>
                                        <input type="text" name="name" class="form-control rounded" placeholder="@lang('Your Name')">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label class="mb-1">@lang('Email')</label>
                                    <input type="text" name="email" class="form-control rounded" placeholder="@lang('Email')">
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mb-1">@lang('User Name')</label>
                                <input type="text" name="username" class="form-control rounded" placeholder="@lang('User Name')">
                            </div>

                            <div class="form-group">
                                <label class="mb-1">@lang('User Phone')</label>
                                <input type="text" name="phone" class="form-control rounded" placeholder="@lang('User Phone')">
                            </div>

                            <div class="form-group">
                                <label class="mb-1">@lang('Password')</label>
                                <input type="password" name="password" class="form-control rounded" placeholder="@lang('Password')*">
                            </div>

                            <div class="form-group">
                                <label class="mb-1">@lang('Confirm Password')</label>
                                <input type="password" name="password_confirmation" class="form-control rounded" placeholder="@lang('Confirm Password')*">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">
                                    @lang('Sign Up') <div class="spinner-border formSpin" role="status"></div>
                                </button>
                            </div>

                            <div class="form-group text-center mt-4 mb-0">
                                <p class="mb-0">
                                    @lang('Have You Already An account')?
                                    <a href="{{ route('user.login') }}" class="ft-medium text-success">@lang('Sign In')</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@includeIf('partials.front.cta')
@endsection

@push('js')

@endpush
