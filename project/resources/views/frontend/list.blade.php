@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Property List')</h2>
                    <span class="ipn-subtitle">@lang('All Properties')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All Property ================================== -->
    <section>

        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="filter_search_opt">
                        <a href="javascript:void(0);" onclick="openFilterSearch()">@lang('Search Property')<i class="ml-2 ti-menu"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="simple-sidebar sm-sidebar" id="filter_search"  style="left:0;">

                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading">@lang('Close Filter')</h4>
                            <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">

                            <h5 class="mb-3">@lang('Find New Property')</h5>

                            <form action="{{ route('front.listing') }}" method="get">
                                <div class="row gy-3">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control b-r" name="name" placeholder="@lang('Neighborhood')" value="{{ request()->name ? request()->name : '' }}">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="ptypes" class="form-control" name="category_id">
                                                <option value="">&nbsp;</option>
                                                @foreach ($categories as $key=>$data)
                                                    <option value="{{ $data->id }}" {{ request()->category_id == $data->id ? 'selected' : '' }}>{{ $data->title }}</option>
                                                @endforeach
                                            </select>
                                            <i class="ti-briefcase"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="location" class="form-control" name="location_id">
                                                <option value="">&nbsp;</option>
                                                @foreach ($locations as $key=>$data)
                                                    <option value="{{ $data->id }}" {{ request()->location_id == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            <i class="ti-location-pin"></i>
                                        </div>
                                    </div>

                                    <div class="row gy-2">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control" name="min" value="{{ request()->min ? request()->min : '' }}" placeholder="@lang('Minimum')">
                                                    <i class="ti-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control" name="max" value="{{ request()->max ? request()->max : '' }}" placeholder="@lang('Maximum')">
                                                    <i class="ti-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="number" min="1" placeholder="{{__('Enter Bed Number')}}" class="form-control" value="{{ request()->bed  ?request()->bed :'' }}" name="bed" id="">
                                            <i class="fas fa-bed"></i> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="number" min="1" placeholder="{{__('Enter Bath Number')}}" class="form-control" value="{{ request()->bathroom  ?request()->bathroom : '' }}" name="bathroom" id="">
                                             <i class="fas fa-bath"></i>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-theme full-width mt-3">@lang('Find New Home')</button>
                            </form>

                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>

                <div class="col-lg-8 col-md-12 col-md-12 list-layout">
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="filter-fl">
                                <h4>@lang('Total Property Find is'): <span class="theme-cl">{{ count($properties) }}</span></h4>
                            </div>
                        </div>


                        @includeIf('partials.front.property')
                    </div>



                </div>

            </div>
        </div>
    </section>
    <!-- ============================ All Property ================================== -->

    @includeIf('partials.front.cta')

    <form id="__search" class="d-none" action="{{route('front.listing')}}" method="get">
        <input type="text" name="location" value="{{request()->input('location') ? request()->input('location') : ''}}" id="location">
        <input type="text" name="type" id="type" value="{{request()->input('type') ? request()->input('type') : ''}}">
        <input type="text" name="bed" id="bed" value="{{request()->input('bed') ? request()->input('bed') : ''}}">
        <input type="text" name="range" id="range" value="{{request()->input('range') ? request()->input('range') : ''}}">
        <input type="text" name="shorty" id="shorty_val" value="{{request()->input('shorty') ? request()->input('shorty') : ''}}">
    </form>
@endsection

@push('js')
<script src="{{ asset('assets/front/js/map_infobox.js')}}"></script>
<script src="{{ asset('assets/front/js/markerclusterer.js')}}"></script>
<script src="{{ asset('assets/front/js/map.js')}}"></script>
<script>
    'use strict';
    $(document).on('click','.search__by__location',function(){
        var location = $(this).val();
        $('#location').val(location);
        doSubmit();
    })

    $(document).on('click','.search__by__type',function(){
        var type = $(this).val();
        $('#type').val(type);
        doSubmit();
    })

    $(document).on('click','.search__by__bed',function(){
        var bed = $(this).val();
        $('#bed').val(bed);
        doSubmit();
    })

    $(document).on('click','.search__by__range',function(){
        var range = $(this).val();
        $('#range').val(range);
        doSubmit();
    })

    $(document).on('change','#shorty',function(){
        var shorty = $(this).val();
        $('#shorty_val').val(shorty);
        doSubmit();
    })

    function doSubmit(){
        $('#__search').submit();
    }


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
