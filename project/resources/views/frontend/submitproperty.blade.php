@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Submit Property')</h2>
                    <span class="ipn-subtitle">@lang('Just Submit Your Property')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Submit Property Start ================================== -->
    <section>
        <div class="container">
            <div class="row">
                @if (!auth()->user())
                    <div class="col-lg-12 col-md-12">
                        <div class="alert alert-success" role="alert">
                            <p>@lang("Please, Sign In before you submit a property. If you don't have an account you can create one by") <a href="{{ route('front.become.agent') }}">@lang('Clicking Here')</a></p>
                        </div>
                    </div>
                @endif

                <!-- Submit Form -->
                <div class="col-lg-12 col-md-12">
                    <form class="geniusform" action="{{route('user.property.store')}}" method="POST" enctype="multipart/form-data">
                        @include('includes.user.form-both')
                        {{ csrf_field() }}

                        <div class="submit-page">
                            <div class="form-submit">
                                <h3>@lang('Basic Information')</h3>
                                <div class="submit-section">
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label>@lang('Property Title')<span class="tip-topdata" data-tip="Property Title"><i class="ti-help"></i></span></label>
                                            <input type="text" name="name" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12 my-2">
                                            <label>@lang('Property Slug')</label>
                                            <input type="text" name="slug" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12 my-2">
                                            <label>@lang('Description')</label>
                                            <textarea name="description" class="form-control h-120"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-submit my-2">
                                <h3>@lang('Featured Image ') </h3>
                                <div class="submit-section">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="wrapper-image-preview">
                                                <div class="box">
                                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                                    <div class="upload-options">
                                                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                                        <input id="img-upload"type="file" class="image-upload" name="photo" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Info -->
                            <div class="form-submit my-2">
                                <h3>@lang('Pricing Info')</h3>
                                <div class="submit-section">
                                    <div class="row">
                                        <div class="form-group col-md-12 my-2">
                                            <label for="inp-price">{{ __('Price') }}</label>
                                            <input type="number" class="form-control" id="inp-price" name="price" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Extra Info -->
                            <div class="form-submit my-2">
                                <h3>@lang('Extra Info')</h3>
                                <div class="submit-section">
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-bed">{{ __('No. Bed') }}</label>
                                                <input type="number" class="form-control" id="inp-bed" name="bed"  placeholder="{{ __('Example: 1') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-bathroom">{{ __('No. Bathroom') }}</label>
                                                <input type="number" class="form-control" id="inp-bathroom" name="bathroom"  placeholder="{{ __('Example: 1') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-square">{{ __('Square Feet') }}</label>
                                                <input type="number" class="form-control" id="inp-square" name="square"  placeholder="{{ __('Example: 1200') }}" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-garage">{{ __('Garages') }}</label>
                                                <input type="number" class="form-control" id="inp-garages" name="garage" placeholder="{{ __('Example: 1') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-year_built">{{ __('Year Built') }}</label>
                                                <input type="number" class="form-control" id="inp-year_built" name="year_built"  placeholder="{{ __('Example: 2022') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-area">{{ __('Area') }}</label>
                                                <input type="number" class="form-control" id="inp-area" name="area"  placeholder="{{ __('Example: 1200') }}" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Locations -->
                            <div class="form-submit my-2">
                                <h3>@lang('Locations')</h3>
                                <div class="submit-section">
                                    <div class="row my-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inp-location">{{ __('Locations') }}*</label>
                                                <select class="form-control mb-3" name="location_id" required>
                                                <option value="" selected>{{__('Please select a location')}}</option>
                                                @foreach ($locations as $key=>$location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                                    @if ($location->child)
                                                        @foreach ($location->child as $key=>$childlocation)
                                                            <option value="{{$childlocation->id}}">-{{$childlocation->name}}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inp-address">{{ __('Real address') }}</label>
                                                <input type="text" class="form-control" id="inp-address" name="real_address"  placeholder="{{ __('Address') }}" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inp-latitude">{{ __('Map Latitude') }}</label>
                                                <input type="text" class="form-control" id="inp-latitude" name="latitude"  placeholder="{{ __('Latitude') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inp-longitude">{{ __('Map Longitude') }}</label>
                                                <input type="text" class="form-control" id="inp-longitude" name="longitude"  placeholder="{{ __('Longitude') }}" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Details -->
                            <div class="form-submit my-2">
                                <h3>@lang('Additional Details')</h3>
                                <div class="submit-section">
                                    <div class="row my-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-remodel">{{ __('Remodal year') }}</label>
                                                <input type="number" class="form-control" id="inp-remodel" name="remodel_year"  placeholder="{{ __('Example: 2022') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-pool">{{ __('Pool Size') }}</label>
                                                <input type="number" class="form-control" id="inp-pool" name="pool_size"  placeholder="{{ __('Example: 120') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inp-room">{{ __('Additional Room') }}</label>
                                                <input type="text" class="form-control" id="inp-room" name="additional_room"  placeholder="{{ __('Guest room') }}" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inp-amenities">{{ __('Amenities') }}</label>
                                                <input type="text" class="form-control" id="inp-amenities" name="amenities" placeholder="{{ __('Golf field') }}" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inp-equipment">{{ __('Equipment') }}</label>
                                                <input type="text" class="form-control" id="inp-equipment" name="equipment"  placeholder="{{ __('Electric heater') }}" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Category -->
                            <div class="form-submit my-2">
                                <h3>@lang('Category')</h3>
                                <div class="submit-section">
                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <label for="inp-category">{{ __('Category') }}*</label>
                                            <select class="form-control mb-3" name="category_id" required>
                                            <option value="" selected>{{__('Please select a category')}}</option>
                                            @foreach ($categories as $key=>$category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                                @if ($category->child)
                                                    @foreach ($category->child as $key=>$childlocation)
                                                        <option value="{{$childlocation->id}}">-{{$childlocation->title}}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            @if ($attributes)
                                @foreach ($attributes as $key=>$attribute)
                                    <!-- Atrribute -->
                                    <div class="form-submit my-2">
                                        <h3>{{ $attribute->name }}</h3>
                                        <div class="submit-section">
                                            <div class="row my-2">
                                                @if ($attribute->options)
                                                    @foreach ($attribute->options as $okey=>$option)
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="attributes[{{ $attribute->name }}][]" value="{{ $option->id }}" id="{{$attribute->name}}-option-{{$okey}}">
                                                                <label class="custom-control-label" for="{{$attribute->name}}-option-{{$okey}}">{{ $option->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <!-- Type -->
                            <div class="form-submit my-2">
                                <h3>@lang('Property Type')</h3>
                                <div class="submit-section">
                                    <fieldset class="form-group">
                                        <div class="row">
                                        <div class="col-sm-12">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="buy_type" name="type" value="for_buy" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="buy_type">@lang('For Buy')</label>
                                            </div>

                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="rent_type" name="type" value="for_rent" class="custom-control-input">
                                            <label class="custom-control-label" for="rent_type">@lang('For Rent')</label>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="form-submit my-2">
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>@lang('GDPR Agreement') *</label>
                                    <ul class="no-ul-list">
                                        <li>
                                            <input id="aj-1" class="checkbox-custom" name="aj-1" type="checkbox">
                                            <label for="aj-1" class="checkbox-custom-label">@lang('I consent to having this website store my submitted information so they can respond to my inquiry.')</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="form-submit my-2">
                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme rounded" id="submit-btn" type="submit">
                                        @lang('Submit')
                                        <div class="spinner-border formSpin" role="status"></div>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
    <!-- ============================ Submit Property End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
	<!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')
<script src="{{ asset('assets/front/js/dropzone.js')}}"></script>
@endpush
