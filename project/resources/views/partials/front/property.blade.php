@forelse ($properties as $key => $data)
    <!-- Single Property Start -->


        <div class="col-lg-12 col-md-12">
            <a  href="{{ route('front.property.details',$data->slug) }}">
                <div class="property-listing property-1">

                    <div class="listing-img-wrapper">

                        <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto" alt="" />

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
                        <span class="property-type">{{ $data->type == 'for_rent' ? __('For Rent') : __('For Sale')}}</span>
                    </div>

                    <div class="listing-content">

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail">
                                <h4 class="listing-name">{{ $data->name }}</h4>
                                <span class="listing-location"><i class="ti-location-pin"></i>{{ $data->real_address }}</span>
                            </div>
                            <div class="list-author">
                                <img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt="">
                            </div>
                        </div>

                        <div class="listing-features-info">
                            <ul>
                                <li><strong>@lang('Bed'):</strong>{{ $data->bed }}</li>
                                <li><strong>@lang('Bath'):</strong>{{ $data->bathroom }}</li>
                                <li><strong>@lang('Sqft'):</strong>{{ $data->square }}</li>
                            </ul>
                        </div>

                        <div class="listing-footer-wrapper d-flex justify-content-between">
                            <div class="listing-price">
                                <h4 class="list-pr">{{ showAmount($data->price) }}</h4>
                            </div>
                            <div class="listing-detail-btn">
                                <button type="button" class="more-btn">@lang('More Info')</button>
                            </div>
                        </div>

                    </div>

                </div>
            </a>
        </div>

    <!-- Single Property End -->
@empty
    <div class="col-lg-12 col-md-12">
        <h5 class="text-center">
            @lang('No Product Found!')
        </h5>
    </div>
@endforelse

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        @if($properties->hasPages())
            {{ $properties->links() }}
        @endif
    </div>
</div>
