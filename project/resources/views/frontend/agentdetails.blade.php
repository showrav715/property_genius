@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Agency Name Start================================== -->
    <div class="agent-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="agency agency-list shadow-0 mt-2 mb-2">

                        <a href="{{ route('front.agent.details',$agent->username) }}" class="agency-avatar">
                            <img src="{{ asset('assets/images/'.$agent->photo) }}" alt="">
                        </a>

                        <div class="agency-content">
                            <div class="agency-name">
                                <h4><a href="{{ route('front.agent.details',$agent->username) }}">{{ $agent->name }}</a></h4>
                                <span><i class="lni-map-marker"></i>{{ $agent->address }}</span>
                            </div>

                            <div class="agency-desc">
                            <p>
                                {{ $agent->details }}
                            </p>
                            </div>

                            <ul class="agency-detail-info">
                                <li><i class="lni-phone-handset"></i>{{ $agent->phone }}</li>
                                <li><i class="lni-envelope"></i><a href="#">{{ $agent->email }}</a></li>
                            </ul>

                            <ul class="social-icons">
                                <li><a class="facebook" href="{{ $agent->fb_link }}"><i class="lni-facebook"></i></a></li>
                                <li><a class="twitter" href="{{ $agent->twitter_link }}"><i class="lni-twitter"></i></a></li>
                                <li><a class="linkedin" href="{{ $agent->instagram_link	 }}"><i class="lni-instagram"></i></a></li>
                                <li><a class="linkedin" href="{{ $agent->linkedin_link }}"><i class="lni-linkedin"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Agency Name ================================== -->

    <!-- ============================ About Agency ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title">@lang('Agent Info')</h4>
                        </div>

                        <div class="block-body">
                            <ul class="dw-proprty-info">
                                <li><strong>@lang('Ceo')</strong>{{ $agent->name}}</li>
                                <li><strong>@lang('Email')</strong>{{ $agent->email }}</li>
                                <li><strong>@lang('Phone')</strong>{{ $agent->phone != NULL ? $agent->phone : 'N/A' }}</li>
                                <li><strong>@lang('Skype')</strong>{{ $agent->skype_name != NULL ? $agent->skype_name : 'N/A' }}</li>
                                <li><strong>@lang('Address')</strong>{{ $agent->address != NULL ? $agent->address : 'N/A' }}</li>
                                <li><strong>@lang('City')</strong>{{ $agent->city != NULL ? $agent->city : 'N/A' }}</li>
                                <li><strong>@lang('Country')</strong>{{ $agent->country != NULL ? $agent->country->name : 'N/A'}}</li>
                                <li><strong>@lang('Stab.')</strong>{{ $agent->created_at->format('Y')}}</li>
                            </ul>
                        </div>

                    </div>

                    <!-- Single Block Wrap -->
                    <div class="block-wraps">

                        <div class="block-header">
                            <ul class="nav nav-tabs customize-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active" id="rental-tab" data-bs-toggle="tab" href="#rental" role="tab" aria-controls="rental" aria-selected="true">Rental</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link" id="sale-tab" data-bs-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false">For Sale</a>
                                </li>
                            </ul>
                        </div>

                        <div class="block-body">
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="rental" role="tabpanel" aria-labelledby="rental-tab">
                                    <!-- row -->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 list-layout">
                                            @if (count($rent_properties)>0)
                                                @foreach ($rent_properties as $key => $data)
                                                    <!-- Single Listings -->
                                                    <div class="property-listing property-1">

                                                        <div class="listing-img-wrapper">
                                                            <a href="{{ route('front.property.details',$data->slug) }}">
                                                                <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto" alt="" />
                                                            </a>

                                                            <div class="listing-like-top wishList" data-property="{{ $data->id }}" data-user={{ auth()->id() }}>
                                                                <i class="ti-heart {{ $data->checkFavourite(auth()->id(),$data->id) ? 'active' : ''}}"></i>
                                                            </div>

                                                            @if ($data->reviews->count()>0)
                                                                <div class="listing-rating">
                                                                    @php
                                                                        $review = $data->reviews->sum('rate')/$data->reviews->count();
                                                                    @endphp

                                                                    @for ($i = 1; $i <= $review; $i++)
                                                                        <i class="ti-star filled"></i>
                                                                    @endfor

                                                                    @if (is_float($review))
                                                                        <i class="ti-star"></i>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                            <span class="property-type">@lang('For Rent')</span>
                                                        </div>

                                                        <div class="listing-content">

                                                            <div class="listing-detail-wrapper">
                                                                <div class="listing-short-detail">
                                                                    <h4 class="listing-name"><a href="{{ route('front.property.details',$data->slug) }}">{{ $data->name }}</a></h4>
                                                                    <span class="listing-location"><i class="ti-location-pin"></i>{{ $data->real_address }}</span>
                                                                </div>
                                                                <div class="list-author">
                                                                    <a href="#"><img src="{{ asset('assets/images/'.$data->user->photo) }}" class="img-fluid img-circle avater-30" alt=""></a>
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
                                                                    <a href="{{ route('front.property.details',$data->slug) }}" class="more-btn">@lang('More Info')</a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- End Single Listings -->
                                                @endforeach
                                            @else
                                                <p>@lang('No Property Found!')</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- // row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            @if($rent_properties->hasPages())
                                                {{ $rent_properties->links() }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                                    <!-- row -->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 list-layout">
                                            @if (count($buy_properties)>0)
                                                @foreach ($buy_properties as $key => $data)
                                                    <!-- Single Listings -->
                                                    <div class="property-listing property-1">

                                                        <div class="listing-img-wrapper">
                                                            <a href="{{ route('front.property.details',$data->slug) }}">
                                                                <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto" alt="" />
                                                            </a>

                                                            <div class="listing-like-top wishList" data-property="{{ $data->id }}" data-user={{ auth()->id() }}>
                                                                <i class="ti-heart {{ $data->checkFavourite(auth()->id(),$data->id) ? 'active' : ''}}"></i>
                                                            </div>

                                                            @if ($data->reviews->count()>0)
                                                                <div class="listing-rating">
                                                                    @php
                                                                        $review = $data->reviews->sum('rate')/$data->reviews->count();
                                                                    @endphp

                                                                    @for ($i = 1; $i <= $review; $i++)
                                                                        <i class="ti-star filled"></i>
                                                                    @endfor

                                                                    @if (is_float($review))
                                                                        <i class="ti-star"></i>
                                                                    @endif
                                                                </div>
                                                            @endif

                                                            <span class="property-type">@lang('For Sell')</span>
                                                        </div>

                                                        <div class="listing-content">

                                                            <div class="listing-detail-wrapper">
                                                                <div class="listing-short-detail">
                                                                    <h4 class="listing-name"><a href="{{ route('front.property.details',$data->slug) }}">{{ $data->name }}</a></h4>
                                                                    <span class="listing-location"><i class="ti-location-pin"></i>{{ $data->real_address }}</span>
                                                                </div>
                                                                <div class="list-author">
                                                                    <a href="#">
                                                                        <img src="{{ asset('assets/images/'.$data->user->photo) }}" class="img-fluid img-circle avater-30" alt="">
                                                                    </a>
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
                                                                    <a href="{{ route('front.property.details',$data->slug) }}" class="more-btn">@lang('More Info')</a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- End Single Listings -->
                                                @endforeach
                                            @else
                                                <p>@lang('No Property Found!')</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- // row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            @if($buy_properties->hasPages())
                                                {{ $buy_properties->links() }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="page-sidebar">

                        <div class="sides-widget">
                            <div class="sides-widget-header">
                                <div class="agent-photo"><img src="{{ asset('assets/images/'.$agent->photo) }}" alt=""></div>
                                <div class="sides-widget-details">
                                    <h4><a href="#">{{ $agent->name }}</a></h4>
                                    <span><i class="lni-phone-handset"></i>{{ $agent->phone }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="sides-widget-body simple-form">
                                <form action="{{ route('user.property.enquiry') }}" method="post">
                                    @csrf

                                    <div class="row gy-2">
                                        <input type="hidden" name="user_id" value="{{ $agent->id }}">
                                        <div class="form-group">
                                            <label>@lang('Email')</label>
                                            <input type="text" class="form-control" name="email" placeholder="@lang('Your Email')">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Phone No.')</label>
                                            <input type="text" class="form-control" name="phone" placeholder="@lang('Your Phone')">
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Description')</label>
                                            <textarea class="form-control" name="details">@lang("I'm interested in this property.")</textarea>
                                        </div>
                                        <button class="btn btn-black btn-md rounded full-width">@lang('Send Message')</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Featured Property -->
                        @if (count($featured_properties)>0)
                            <div class="sidebar-widgets">

                                <h4>@lang('Featured Property')</h4>

                                <div class="sidebar-property-slide">
                                    @foreach ($featured_properties as $key => $data)
                                        <!-- Single Property -->
                                        <div class="single-items">
                                            <div class="property-listing property-1">

                                                <div class="listing-img-wrapper">
                                                    <a href="{{ route('front.property.details',$data->slug) }}">
                                                        <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto" alt="" />
                                                    </a>

                                                    <div class="listing-like-top wishList" data-property="{{ $data->id }}" data-user={{ auth()->id() }}>
                                                        <i class="ti-heart {{ $data->checkFavourite(auth()->id(),$data->id) ? 'active' : ''}}"></i>
                                                    </div>

                                                    @if ($data->reviews->count()>0)
                                                        <div class="listing-rating">
                                                            @php
                                                                $review = $data->reviews->sum('rate')/$data->reviews->count();
                                                            @endphp

                                                            @for ($i = 1; $i <= $review; $i++)
                                                                <i class="ti-star filled"></i>
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
                                                            <h4 class="listing-name"><a href="{{ route('front.property.details',$data->slug) }}">{{ $data->name }}</a></h4>
                                                            <span class="listing-location"><i class="ti-location-pin"></i>{{ $data->real_address }}</span>
                                                        </div>
                                                        <div class="list-author">
                                                            <a href="#">
                                                                <img src="{{ asset('assets/images/'.$data->user->photo) }}" class="img-fluid img-circle avater-30" alt="">
                                                            </a>
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
                                                            <a href="{{ route('front.property.details',$data->slug) }}" class="more-btn">@lang('More Info')</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ About Agency End ================================== -->

@endsection

@push('js')
    <script>
        'use strict';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.wishList',function(){
            let $this = $(this);
            let propertyId = $(this).data('property');
            let userId = $(this).data('user');
            if(userId == ''){
                window.location.href = mainurl+'/user/login'
            }

            $.ajax({
                method:"POST",
                url: mainurl+'/property/wishlist',
                data: {
                    property_id : propertyId,
                    user_id : userId
                },
                success:function(data)
                {
                    if(data.success){
                        $this.children().prop('class','');
                        $this.children().prop('class','ti-heart active');
                        toastr.success(data.success);
                    }else{
                        $this.children().prop('class','');
                        $this.children().prop('class','ti-heart');
                        toastr.error(data.error);
                    }
                }

            });

        })
    </script>
@endpush
