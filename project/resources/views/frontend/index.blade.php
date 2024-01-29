@extends('layouts.front')

@push('css')

@endpush

@section('content')
    @if (in_array('Banner', $home_modules))
        <!-- ============================ Hero Banner  Start================================== -->
        <div class="image-cover hero-banner" style="background:url({{ asset('assets/images/'.$ps->hero_photo) }}) no-repeat;" data-overlay="6">
            <div class="container">

                <h1 class="big-header-capt mb-0">{{ $ps->banner_title }}</h1>
                <p class="text-center mb-5">{{ $ps->banner_subtitle }}</p>
                <!-- Type -->
                <form action="{{ route('front.listing') }}" method="get">
                    <div class="property-search-type">
                        <label class="active"><input name="type" type="radio" value="for_buy">@lang('For Sale')</label>
                        <label><input name="type" type="radio" value="for_rent">@lang('For Rent')</label>
                        <div class="property-search-type-arrow"></div>
                    </div>
                    <div class="full-search-2 eclip-search italian-search hero-search-radius">
                        <div class="hero-search-content">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control b-r" name="name" placeholder="@lang('Neighborhood')">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="ptypes" class="form-control" name="category_id">
                                                <option value="">&nbsp;</option>
                                                @foreach ($categories as $key=>$data)
                                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                @endforeach
                                            </select>
                                            <i class="ti-briefcase"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <div class="input-with-icon b-l b-r">
                                            <select id="location" class="form-control" name="location_id">
                                                <option value="">&nbsp;</option>
                                                @foreach ($locations as $key=>$data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            <i class="ti-location-pin"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-1 col-md-1 col-sm-12 small-padd">

                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <button type="submit" class="btn search-btn">@lang('Search')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->
    @endif

    @if (in_array('Explore Property', $home_modules))
        <!-- ============================ Latest Property For Sale Start ================================== -->
            <section class="gray">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="sec-heading center mb-3">
                                <h2>{{ $ps->explore_ptitle }}</h2>
                                <p>{{ $ps->explore_psub }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="property-slide">
                          
                                @foreach ($properties as $key => $data)
                                    <!-- Single Property -->
                                    <div class="single-items">
                                        <a href="{{ route('front.property.details',$data->slug) }}">
                                            <div class="property_item classical-list">
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/'.$data->photo) }}" alt="latest property" class="img-fluid">
                                                    <div class="sb-date">
                                                        <span class="tag"><i class="ti-calendar"></i>{{ $data->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <span class="tag_t">{{ $data->type == 'for_rent' ? __('For Rent') : __('For Sale')}}</span>
                                                </div>

                                                    <div class="proerty_content">
                                                        <div class="proerty_text">
                                                            <h3 class="captlize">{{ $data->name }}</h3>
                                                            <p class="proerty_price">{{ showAmount($data->price) }}</p>
                                                        </div>
                                                        <p class="property_add">{{ $data->real_address }}</p>

                                                        <div class="property_meta">
                                                            <div class="list-fx-features">
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-bed">{{ $data->bed }} @lang('Beds')</span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-type">{{ $data->year_built }} @lang('Built')</span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-area">{{ $data->square }} @lang('sqft')</span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-bath">{{ $data->bathroom }} @lang('Bath')</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="property_links">
                                                            <button type="button" class="btn btn-theme-light">@lang('Property Detail')</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <!-- ============================ Latest Property For Sale End ================================== -->
    @endif

    @if (in_array('Location', $home_modules))
        <!-- ============================ Property Location Start ================================== -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="sec-heading center">
                            <h2>{{ $ps->location_title }}</h2>
                            <p>{{ $ps->location_subtitle }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($locations as $key => $data)
                        <!-- Single Location Listing -->
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="location-listing">
                                <div class="location-listing-thumb">
                                    <a href="{{ route('front.listing',['location_id'=>$data->id]) }}"><img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="location-listing-caption">
                                    <h4><a href="{{ route('front.listing',['location_id'=>$data->id]) }}">{{ $data->name }}</a></h4>
                                    <span class="theme-cl">{{ count($data->properties) }} @lang('Property')</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ============================ Property Location End ================================== -->
    @endif

    @if (in_array('Testimonials', $home_modules))
        <!-- ============================ Smart Testimonials ================================== -->
        <section class="image-cover pb-0" style="background:#122947 url({{ asset('assets/front/img/pattern.png') }}) no-repeat;">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-7">
                        <h2 class="text-light">{{ $ps->review_title }}</h2>

                        <div class="smart-textimonials smart-light" id="smart-textimonials">
                            @foreach ($testimonials as $key => $data)
                                <!-- Single Item -->
                                <div class="item">
                                    <div class="smart-tes-content">
                                        <p>
                                            @php
                                                echo $data->details;
                                            @endphp
                                        </p>
                                    </div>

                                    <div class="smart-tes-author">
                                        <div class="st-author-box">
                                            <div class="st-author-thumb">
                                                <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid" alt="" />
                                            </div>
                                            <div class="st-author-info">
                                                <h4 class="st-author-title">{{ $data->title }}</h4>
                                                <span class="st-author-subtitle">{{ $data->subtitle }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-5">
                        <img src="{{ asset('assets/images/'.$ps->review_photo) }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Smart Testimonials End ================================== -->
    @endif

    @if (in_array('Blogs', $home_modules))
        <!-- ================================= Blog Grid ================================== -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading center">
                            <h2>{{ $ps->blog_title }}</h2>
                            <p>
                                @php
                                    echo $ps->blog_subtitle;
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($blogs as $key=>$data)
                        <!-- Single blog Grid -->
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-wrap-grid">

                                <div class="blog-thumb">
                                    <a href="{{ route('blog.details',$data->slug) }}">
                                        <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid" alt="" />
                                    </a>
                                </div>

                                <div class="blog-info">
                                    <span class="post-date"><i class="ti-calendar"></i>{{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</span>
                                </div>

                                <div class="blog-body">
                                    <h4 class="bl-title"><a href="{{ route('blog.details',$data->slug) }}">{{ $data->title }}</a></h4>
                                    <p>
                                        {{ Str::limit(strip_tags($data->details),100) }}
                                    </p>
                                    <a href="{{ route('blog.details',$data->slug) }}" class="bl-continue">@lang('Continue')</a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
        <!-- ================= Blog Grid End ================= -->
    @endif

    @if (in_array('CTAs', $home_modules))
        <!-- ============================ Call To Action ================================== -->
        @includeIf('partials.front.cta')
        <!-- ============================ Call To Action End ================================== -->
    @endif

@endsection

@push('js')
    <script>
        'use strict';
        let affiliate_visit = '{{ Session::get('affliate_visited') }}';
        let modal = document.getElementById('signup');
        let modalRoute = '{{ route('front.signup.session') }}';
        modal.addEventListener('hidden.bs.modal', function (event) {
            $.get(modalRoute,function(data){
                window.location.href = '{{ route('front.index') }}';
            });
        })

        if(affiliate_visit == 1){
             let modall = bootstrap.Modal.getOrCreateInstance(document.getElementById('signup'));
             modall.show();
        }
    </script>
@endpush
