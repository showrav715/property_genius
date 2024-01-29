@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured-slick">
        <div class="featured-slick-slide">
            @if ($data->galleries)
                @foreach ($data->galleries as $key => $gallery)
                    <div>
                        <a href="{{ asset('assets/images/'.$gallery->photo) }}" class="mfp-gallery">
                            <img src="{{ asset('assets/images/'.$gallery->photo) }}" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <section class="spd-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slide-property-detail">
                        <div class="slide-property-first">
                            <div class="pr-price-into">
                                <h2>
                                    {{ showAmount($data->price) }}
                                    <i>/ {{ $data->payment_duration }}</i>
                                    @if ($data->type == 'for_buy')
                                        <span class="prt-type rent">@lang('For Buy')</span>
                                    @else
                                        <span class="prt-type rent">@lang('For Sell')</span>
                                    @endif
                                </h2>
                                <span><i class="lni-map-marker"></i> {{ $data->real_address }}</span>
                            </div>
                        </div>

                        <div class="slide-property-sec">
                            <div class="pr-all-info">
                                <div class="pr-single-info">
                                    <a href="JavaScript:Void(0);" id="propertyPrint" data-bs-toggle="tooltip" data-original-title="Get Print"><i class="ti-printer"></i></a>
                                </div>

                                <div class="pr-single-info">
                                    <a href="JavaScript:Void(0);" id="wishList" class="{{ $data->checkFavourite(auth()->id(),$data->id) ? 'like-bitt' : '' }} add-to-favorite" data-property="{{ $data->id }}" data-user={{ auth()->id() }} data-bs-toggle="tooltip" data-original-title="Add To Favorites"><i class="lni-heart-filled"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Property Detail Start ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title">@lang('Property Info')</h4>
                        </div>

                        <div class="block-body">
                            <ul class="dw-proprty-info">
                                <li><strong>@lang('Bedrooms'):</strong>{{ $data->bed }} @lang('Beds')</li>
                                <li><strong>@lang('Bathrooms'):</strong>{{ $data->bathroom }} @lang('Bath')</li>
                                <li><strong>@lang('Square feet'):</strong>{{ $data->square }} @lang('sq ft')</li>
                                <li><strong>@lang('Areas'):</strong>{{ $data->area }} sq ft</li>
                                <li><strong>@lang('Garage')</strong>{{ $data->garage == 0 ? 'N/A' : $data->garage }}</li>
                                <li><strong>@lang('Built Year'):</strong>{{ $data->year_built }}</li>
                                <li><strong>@lang('Remodel Year'):</strong>{{ $data->remodel_year }}</li>
                                <li><strong>@lang('Pool Size'):</strong>{{ $data->pool_size == 0 ? 'N/A' : $data->pool_size.'sq ft'}}</li>
                                <li><strong>@lang('Additional Rooms'):</strong>{{ $data->additional_room }}</li>
                                <li><strong>@lang('Amenities'):</strong>{{ $data->amenities }}</li>
                                <li><strong>@lang('Equipment'):</strong>{{ $data->equipment }}</li>
                            </ul>
                        </div>

                    </div>

                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title">@lang('Description')</h4>
                        </div>

                        <div class="block-body">
                            <p>
                                @php
                                    echo $data->description;
                                @endphp
                            </p>
                        </div>

                    </div>

                    @if ($data->attributes)
                        @foreach ($attribute_name = json_decode($data->attributes,true) as $key => $attributes)
                            <!-- Single Block Wrap -->
                            <div class="block-wrap">

                                <div class="block-header">
                                    <h4 class="block-title">{{ $key }}</h4>
                                </div>

                                <div class="block-body">
                                    <ul class="avl-features third">
                                        @foreach ($attributes as $key => $id)
                                            <li>{{ DB::table('attribute_options')->where('id',$id)->first()->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if (count($data->floorplans)>0)
                        <!-- Single Block Wrap -->
                        <div class="block-wrap">

                            <div class="block-header">
                                <h4 class="block-title">@lang('Floor Plan')</h4>
                            </div>

                            <div class="block-body">
                                <div class="accordion" id="floor-option">
                                    @foreach ($data->floorplans as $key=>$plan)
                                        <div class="card">
                                            <div class="card-header" id="firstFloor{{$key}}">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#firstfloor{{$key}}">{{ $plan->name }}<span>{{ $plan->size }}</span></button>
                                                </h2>
                                            </div>
                                            <div id="firstfloor{{$key}}" class="collapse {{ $key == 0 ? 'show': '' }}" aria-labelledby="firstFloor{{$key}}" data-parent="#floor-option">
                                                <div class="card-body">
                                                    <img src="{{ asset('assets/images/'.$plan->photo) }}" class="img-fluid" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endif


                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title">@lang('Location')</h4>
                        </div>

                        <div class="block-body">
                            <div class="map-container">
                                <div id="singleMap" class="mb-0" data-latitude="{{ $data->latitude }}" data-longitude="{{ $data->longitude }}" data-mapTitle="Our Location"></div>
                            </div>

                        </div>

                    </div>

                    <!-- Property Reviews -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title">{{ count($reviews) }} @lang('Reviews')</h4>
                        </div>

                        <div class="block-body">
                            <div class="author-review">
                                <div class="comment-list">
                                    <ul>
                                        @foreach ($reviews as $key=>$review)
                                            <li class="article_comments_wrap">
                                                <article>
                                                    <div class="article_comments_thumb">
                                                        <img src="{{ asset('assets/images/'.$review->user->photo) }}" alt="">
                                                    </div>
                                                    <div class="comment-details">
                                                        <div class="comment-meta">
                                                            <div class="comment-left-meta">
                                                                <h4 class="author-name">{{ $review->user->name }}</h4>
                                                                <div class="comment-date">{{ $review->created_at->format('d M Y')}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p>{{ $review->message }}</p>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>


                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title">@lang('Write A Review')</h4>
                        </div>

                        <div class="block-body">
                            <form class="simple-form" action="{{ route('user.property.review') }}" method="POST">
                                @csrf
                                <div class="row gy-3">

                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="property_id" value="{{ $data->id }}">
                                    <input type="hidden" id="reviewRate" name="rate" value="">

                                    <div class="form-group review-items review-icon sspd_review w-auto">
                                        <div class="item">
                                            <div class="fr-can-rating">
                                                <i class="fas fa-star rate_item" data-value="1"></i>
                                                <i class="fas fa-star rate_item" data-value="2"></i>
                                                <i class="fas fa-star rate_item" data-value="3"></i>
                                                <i class="fas fa-star rate_item" data-value="4"></i>
                                                <i class="fas fa-star rate_item" data-value="5"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" placeholder="@lang('Subject Title')">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control ht-80" name="message" placeholder="@lang('Messages')"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-theme" type="submit">@lang('Submit Review')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="like_share_wrap b-0">
                        @if ($data->is_invest == 1)

                            <div class="d-flex flex-row">
                                <div class="col-md-6">
                                    @lang('Property Price')
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    {{ showAmount($data->price) }}
                                </div>
                            </div>


                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    @lang('Min invest amount')
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    {{ showAmount($data->min_invest) }}
                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    @lang('Max invest amount')
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    {{ showAmount($data->max_invest) }}
                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    @lang('Future value')
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    {{ showAmount($data->funding_amount) }}
                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    @lang('Total Invest amount')
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    {{ showAmount($data->invest_amount) }}
                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    @lang('Hold Years')
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    {{ $data->hold_years }} @lang(' Years')
                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <button type="button" class="btn btn-theme full-width" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">@lang('Invest Now')</button>
                            </div>
                        @else
                            <ul class="like_share_list d-flex justify-content-center">
                                @if ($data->type == 'for_campaign')
                                    <li><a href="{{ route('user.crowdfunding.checkout',$data->slug) }}" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="ti-money"></i> @lang('Invest')</a></li>
                                @else
                                    <li><a href="{{ route('user.property.buy.rent',$data->slug) }}" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="fas fa-share"></i> {{ $data->type == 'for_rent' ? __('Rent') : __('Buy')}}</a></li>
                                @endif
                            </ul>
                        @endif
                    </div>

                    <div class="page-sidebar">

                        <!-- Agent Detail -->
                        <div class="agent-widget">
                            <div class="agent-title">
                                @if ($data->admin)
                                    <div class="agent-photo"><img src="{{ asset('assets/images/'.$data->admin->photo) }}" alt=""></div>
                                @else
                                    @if ($data->user && $data->user->photo)
                                        <div class="agent-photo"><img src="{{ asset('assets/images/'.$data->user->photo) }}" alt=""></div>
                                    @endif
                                @endif
                                <div class="agent-details">
                                    @if ($data->admin)
                                        <h4><a href="#">{{ $data->admin->name }}</a></h4>
                                        <span><i class="lni-phone-handset"></i>{{ $data->admin->phone }}</span>
                                    @else
                                        @if ($data->user)
                                            <h4><a href="#">{{ $data->user->name }}</a></h4>
                                            <span><i class="lni-phone-handset"></i>{{ $data->user->phone }}</span>
                                        @endif
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <form action="{{ route('user.property.enquiry') }}" method="post">
                                @csrf

                                <input type="hidden" name="property_id" value="{{ $data->id }}">
                                @if ($data->admin)
                                    <input type="hidden" name="admin_id" value="{{ $data->admin->id }}">
                                @else
                                    <input type="hidden" name="user_id" value="{{ $data->user ? $data->user->id : '' }}">
                                @endif

                                <div class="row gy-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="@lang('Your Email')">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="@lang('Your Phone')">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" name="details">@lang("I'm interested in this property.")</textarea>
                                    </div>
                                    <button class="btn btn-theme full-width" type="submit">@lang('Send Message')</button>
                                </div>
                            </form>
                        </div>

                        <!-- Featured Property -->
                        <div class="sidebar-widgets">

                            <h4>@lang('Featured Property')</h4>

                            <div class="sidebar_featured_property">
                                @foreach ($featured_properties as $key => $fproperty)
                                    <!-- List Sibar Property -->
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            <img src="{{ asset('assets/images/'.$fproperty->photo) }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4><a href="{{ route('front.property.details',$fproperty->slug) }}">{{ $fproperty->name }}</a></h4>
                                            <span>
                                                <i class="ti-location-pin"></i>
                                                {{ ($fproperty->location != NULL) ? ($fproperty->location->parent_id != NULL ? $fproperty->location->name.', '.$fproperty->location->parent->name : $fproperty->location->name) : 'N/A'}}
                                            </span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_types">
                                                    <div class="property_types_vlix sale">{{ $fproperty->type == 'for_rent' ? __('For Rent') : __('For Sale')}}</div>
                                                </div>
                                                <div class="lists_property_price_value">
                                                    <h4>{{ showAmount($fproperty->price) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->


    <!-- ============================ Invest Modal ================================== -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">@lang('Invest Now')</h5>
                    <button type="button" class="close border-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-modal-slider">
                                <div class="your-class">
                                    @if ($data->galleries)
                                        @foreach ($data->galleries as $key => $gallery)
                                        <li>
                                            <a href="{{ asset('assets/images/'.$gallery->photo) }}" class="mfp-gallery"><img src="{{ asset('assets/images/'.$gallery->photo) }}" class="img-fluid mx-auto" alt="" /></a>
                                        </li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <form action="{{ route('user.invest.property') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label>@lang('Amount')</label>
                                    <input type="number" class="form-control" id="investAmount" name="amount" placeholder="@lang('Enter amount')">
                                </div>
                                <input type="hidden" name="property_id" value="{{ $data->id }}">
                                <input type="hidden" id="form_profit" name="return_amount" value="">

                                <p class="text-danger" id="profitFinalAmount"></p>

                                <button class="btn btn-theme full-width" id="investBtn">@lang('Invest')</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Invest Modal End ================================== -->

    <!-- Video Modal -->
    <div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupvideo">
                <iframe class="embed-responsive-item" class="full-width" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Video Modal -->


    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')
<script src="http://maps.google.com/maps/api/js?key="></script>
<script src="{{ asset('assets/front/js/map_infobox.js')}}"></script>
<script src="{{ asset('assets/front/js/markerclusterer.js')}}"></script>
<script src="{{ asset('assets/front/js/map.js')}}"></script>

<script>
    'use strict';

    $(document).ready(function(){
        $('.your-class').slick();
    });

    $('.modal').on('shown.bs.modal', function (e) {
        $('.your-class').slick('setPosition');
        $('.wrap-modal-slider').addClass('open');
        $("#investAmount").val('');
        $("#profitFinalAmount").text('');
    })

    $(".rate_item").on('click',function(){
        let n = $(this).data('value');

        $(".rate_item").each(function(i){
            $(this).removeClass('filled');
        })

        $(".rate_item").each(function(i){
            if(i <= n-1){
                $(this).addClass('filled');
            }
        })
        $("#reviewRate").val(n);
    })

    $("#investAmount").on('input',function(){
        let amount = parseFloat($(this).val());
        let minAmount = '{{$data->min_invest}}';
        let maxAmount = '{{$data->max_invest}}';
        let property_price = '{{$data->price}}';
        let finalAmount = '{{$data->funding_amount}}';

        let ProfitAmount = parseFloat(finalAmount - property_price);
        let profitPercentage = parseFloat((ProfitAmount * 100)/property_price);
        let finalProfit = parseFloat((amount/100)*profitPercentage) + amount;

        if(amount>=minAmount && amount<=maxAmount){
            $("#profitFinalAmount").text(`You will get return ${finalProfit}`);
            $("#form_profit").val(finalProfit);
        }else{
            $("#profitFinalAmount").text('');
        }
    })

    $("#propertyPrint").on('click',function(){
        window.print();
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','#wishList',function(){
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
                    $this.prop('class','');
                    $this.prop('class','like-bitt add-to-favorite');
                    toastr.success(data.success);
                }else{
                    $this.prop('class','');
                    $this.prop('class','add-to-favorite');
                    toastr.error(data.error);
                }
            }

        });

    })
</script>
@endpush
