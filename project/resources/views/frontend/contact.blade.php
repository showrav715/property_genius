@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Contact Us')</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <div class="row gy-2">
                <div class="col-lg-7 col-md-7">
                    <form id="contactform" action="{{ route('front.contact.submit') }}" method="post">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>@lang('Name')</label>
                                    <input type="text" class="form-control simple" name="name" placeholder="@lang('Your Name')" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input type="email" class="form-control simple"  name="email" placeholder="@lang('Enter email')" required>
                                </div>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="form-group">
                                <label>@lang('Subject')</label>
                                <input type="text" class="form-control simple" name="subject" placeholder="@lang('Enter Subject')" required>
                            </div>

                            <div class="form-group">
                                <label>@lang('Messages')</label>
                                <textarea class="form-control simple" name="message" placeholder="@lang('Write Message')" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-theme rounded my-2" type="submit">
                                @lang('Submit Request')
                                <div class="spinner-border formSpin" role="status"></div>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="col-lg-5 col-md-5">
                    <div class="contact-info">

                        <h2>
                            @php
                                echo $ps->side_title;
                            @endphp
                        </h2>
                        <p>
                            @php
                                echo $ps->side_text;
                            @endphp
                        </p>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="ti-home"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">@lang('Reach Us')</h4>
                                @php
                                    echo $ps->street;
                                @endphp
                            </div>
                        </div>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">@lang('Drop A Mail')</h4>
                                {{ $ps->contact_email }}
                            </div>
                        </div>

                        <div class="cn-info-detail">
                            <div class="cn-info-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="cn-info-content">
                                <h4 class="cn-info-title">@lang('Call Us')</h4>
                                {{ $ps->phone }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /row -->

        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush
