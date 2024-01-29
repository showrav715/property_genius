@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Pricing Plan')</h2>
                    <span class="ipn-subtitle">@lang('Lists of our all Popular plans')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Price Table Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>{{ $ps->plan_title }}</h2>
                        <p>{{ $ps->plan_subtitle }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($plans as $key => $data)
                    <div class="col-lg-4 col-md-4">
                        <div class="pricing-wrap">

                            <div class="pricing-header">
                                <i class="lni-layers"></i>
                                <h4 class="pr-title">{{ $data->title }}</h4>
                                <span class="pr-subtitle">{{ $data->sub_title }}</span>
                            </div>
                            <div class="pricing-value">
                                <h4 class="pr-value" style="color:{{ $data->price_color}}">{{ $data->price }}</h4>
                            </div>
                            <div class="pricing-body">
                                <ul>
                                    @foreach (json_decode($data->attribute) as $key => $attribute)
                                        <li class="available">{{ $attribute }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pricing-bottom">
                                @if (auth()->user() && auth()->user()->plan_id == $data->id)
                                    <a href="javascript:;" class="btn-pricing">@lang('Current Plan')</a>

                                    <div class="mt-2">
                                        ({{ auth()->user()->plan_end_date ? auth()->user()->plan_end_date->toDateString() : '' }}) <a href="{{route('user.package.subscription',$data->id)}}" style="color:{{ $data->price_color}}">@lang('Renew Plan')</a>
                                    </div>
                                @else
                                    <a href="{{ route('user.package.subscription',$data->id) }}" class="btn-pricing">@lang('Choose Plan')</a>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- ============================ Price Table End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->

@endsection

@push('js')

@endpush
