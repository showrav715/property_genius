@extends('layouts.front')

@push('css')

@endpush

@section('content')
   <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Agent Login')</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Submit Property Start ================================== -->
    <section class="bg-light">

        <div class="container">
            <div class="row">

                <!-- Submit Form -->
                <div class="col-lg-12 col-md-12">
                    <div class="submit-page">
                        <form id="loginform" action="{{ route('agent.login.submit') }}" method="post">
                            @includeIf('partials.user.form-both')
                            @csrf
                            <div class="form-submit">
                                <div class="submit-section">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>@lang('Email')</label>
                                            <input type="email" name="email" class="form-control" placeholder="@lang('Enter email')">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>@lang('Password')</label>
                                            <input type="password" name="password" class="form-control" placeholder="*******">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <button class="btn btn-theme-light-2 rounded" type="submit">
                                    @lang('Submit')
                                    <div class="spinner-border formSpin" role="status"></div>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- ============================ Submit Property End ================================== -->

@endsection

@push('js')

@endpush
