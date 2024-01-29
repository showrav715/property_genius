@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Become an agent')</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Submit Property Start ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="submit-page">
                        <form id="registerform" action="{{ route('agent.register.submit') }}" method="POST">
                            @includeIf('partials.user.form-both')
                            @csrf
                            <div class="row gy-3">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" name="name" placeholder="@lang('Full Name')">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="email" class="form-control" name="email" placeholder="@lang('Email')">
                                            <i class="ti-email"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" name="username" placeholder="@lang('Username')">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="phone" class="form-control" name="phone" placeholder="@lang('Phone no')">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" name="password" placeholder="*******">
                                            <i class="ti-unlock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="*******">
                                            <i class="ti-unlock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme full-width" type="submit">
                                        @lang('Submit')
                                        <div class="spinner-border formSpin" role="status"></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Submit Property End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
	<!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush
