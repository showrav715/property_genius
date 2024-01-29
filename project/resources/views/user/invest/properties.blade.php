@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Invest Property')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
  <div class="dashboard--content-item">
      <h5 class="dashboard-title">@lang('Invest Properties')</h5>
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

@endsection

@push('js')

@endpush
