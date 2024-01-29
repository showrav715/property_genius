@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ User Dashboard ================================== -->
    <section class="error-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">
                        <img src="{{asset('assets/images/'.$gs->error_photo)}}" class="img-fluid" alt="">
                        <p>
                            @php
                                echo $gs->error_text;
                            @endphp
                        </p>
                        <a class="btn btn-theme" href="{{ route('front.index')}}">@lang('Back To Home')</a>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ User Dashboard End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush
