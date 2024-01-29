@extends('layouts.front')

@push('css')

@endpush

@section('content')
<!-- ============================ Hero Banner  Start================================== -->
<div class="search-header-banner">
    <div class="container">
        <div class="full-search-2 transparent">
            <div class="hero-search">
                <h1>@lang('Search Your Dream')</h1>
            </div>
            <div class="hero-search-content">
                <form action="{{ route('front.invests') }}" method="get">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" name="name"
                                        placeholder="@lang('Neighborhood')"
                                        value="{{ request()->name ? request()->name : '' }}">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <select id="cities" name="location_id" class="form-control">
                                        <option value="">&nbsp;</option>
                                        @foreach ($locations as $key=>$data)
                                        <option value="{{ $data->id }}" {{ request()->location_id == $data->id ?
                                            'selected' : '' }}>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="ti-briefcase"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="number" name="min" class="form-control" placeholder="@lang('Minimum')"
                                        value="{{ request()->min ? request()->min : '' }}">
                                    <i class="ti-money"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-6">
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="number" class="form-control" name="max" placeholder="@lang('Maximum')"
                                        value="{{ request()->max ? request()->max : '' }}">
                                    <i class="ti-money"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row my-3">
                        <div class="col-lg-4 col-md-4 col-sm-12">

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <a href="{{ route('front.invests') }}" class="btn reset-btn-outline">@lang('Search
                                        Reset')</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn search-btn-outline">@lang('Search Result')</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ All Property ================================== -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 list-layout">
                @if (count($properties) === 0)
                <div class="row">
                    <div class="col-lg-12">
                        <h3>@lang('NO DATA FOUND')</h3>
                    </div>
                </div>
                @else

                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="filter-fl">
                            <h4>@lang('Total Property Find is'): <span class="theme-cl">{{ count($properties) }}</span>
                            </h4>
                        </div>
                    </div>

                    @foreach ($properties as $key => $data)
                    <!-- Single Property Start -->
                    <div class="col-lg-12 col-md-12">
                        <a href="{{ route('front.property.details',$data->slug) }}">
                            <div class="property-listing property-1">

                                <div class="listing-img-wrapper">
                                    <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto"
                                        alt="" />
                                    <div class="listing-like-top">
                                        <i class="ti-heart"></i>
                                    </div>

                                    @if ($data->reviews->count()>0)
                                    <div class="listing-rating">
                                        @php
                                        $review = $data->reviews->sum('rate')/$data->reviews->count();
                                        @endphp

                                        @for ($i = 1; $i <= $review; $i++) <i class="ti-star filled"></i>
                                            @endfor

                                            @if (is_float($review))
                                            <i class="ti-star"></i>
                                            @endif
                                    </div>
                                    @endif
                                    <span class="property-type">For Sale</span>
                                </div>

                                <div class="listing-content">

                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail">
                                            <h4 class="listing-name">{{ $data->name }}</h4>
                                            <span class="listing-location"><i class="ti-location-pin"></i>{{
                                                $data->real_address }}</span>
                                        </div>
                                        <div class="list-author">
                                            <a href="#"><img src="assets/img/add-user.png"
                                                    class="img-fluid img-circle avater-30" alt=""></a>
                                        </div>
                                    </div>

                                    <div class="listing-features-info">
                                        <ul>
                                            <li><strong>@lang('Bed'):</strong>{{ $data->bed }}</li>
                                            <li><strong>@lang('Bath'):</strong>{{ $data->bathroom }}</li>
                                            <li><strong>@lang('Sqft'):</strong>{{ $data->square }}</li>
                                        </ul>
                                    </div>

                                    <div class="listing-footer-wrapper">
                                        <div class="listing-price">
                                            <h4 class="list-pr">{{ showAmount($data->price) }}</h4>
                                        </div>
                                        <div class="listing-detail-btn">
                                            <a href="{{ route('front.property.details',$data->slug) }}"
                                                class="more-btn">@lang('More Info')</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>
                    <!-- Single Property End -->
                    @endforeach

                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if($properties->hasPages())
                        {{ $properties->links() }}
                        @endif
                    </div>
                </div>
                @endif

            </div>

        </div>
    </div>
</section>
<!-- ============================ All Property ================================== -->

<!-- ============================ Call To Action ================================== -->
@includeIf('partials.front.cta')
<!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush