@extends('layouts.agent')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Property') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('agent.properties.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('agent.properties.edit',$data->id) }}">{{ __('Edit Property') }}</a></li>
        </ol>
	</div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-12">
    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
    <form class="geniusform" action="{{route('agent.properties.update',$data->id)}}" method="POST" enctype="multipart/form-data">
        @include('includes.admin.form-both')
        {{ csrf_field() }}

        <input type="hidden" id="property_id" name="property_id" value="{{ $data->id }}">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Property Form') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inp-name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="inp-name" name="name" placeholder="{{ __('Enter Name') }}" value="{{ $data->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="inp-slug">{{ __('Slug') }}</label>
                            <input type="text" class="form-control" id="inp-slug" name="slug"  placeholder="{{ __('Enter Slug') }}" value="{{ $data->slug }}" required>
                        </div>

                        <div class="form-group">
                            <label for="details">{{ __('Description ') }}</label>
                            <textarea class="form-control summernote" id="details" name="description" rows="3" placeholder="{{__('Description')}}">{{ $data->description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Pricing Info') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inp-price">{{ __('Price') }}</label>
                            <input type="number" class="form-control" id="inp-price" name="price" placeholder="{{ __('Enter amount') }}" value="{{ $data->price }}" required>
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Extra Info') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-bed">{{ __('No. Bed') }}</label>
                                    <input type="number" class="form-control" id="inp-bed" name="bed"  placeholder="{{ __('Example: 2') }}" value="{{ $data->bed }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-bathroom">{{ __('No. Bathroom') }}</label>
                                    <input type="number" class="form-control" id="inp-bathroom" name="bathroom"  placeholder="{{ __('Example: 1') }}" value="{{ $data->bathroom }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-square">{{ __('Square Feet') }}</label>
                                    <input type="number" class="form-control" id="inp-square" name="square"  placeholder="{{ __('Example: 1200') }}" value="{{ $data->square }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-garage">{{ __('Garages') }}</label>
                                    <input type="number" class="form-control" id="inp-garages" name="garage" placeholder="{{ __('Example: 1') }}" value="{{ $data->garage }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-year_built">{{ __('Year Built') }}</label>
                                    <input type="number" class="form-control" id="inp-year_built" name="year_built"  placeholder="{{ __('Example: 2022') }}" value="{{ $data->year_built }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-area">{{ __('Area') }}</label>
                                    <input type="number" class="form-control" id="inp-area" name="area"  placeholder="{{ __('Example: 1200') }}" value="{{ $data->area }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Locations') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp-location">{{ __('Locations') }}*</label>
                                    <select class="form-control mb-3" name="location_id" required>
                                      <option value="" selected>{{__('Please select a location')}}</option>
                                      @foreach ($locations as $key=>$location)
                                      <option value="{{$location->id}}" {{ $location->id == $data->location_id ? 'selected' : ''}}>{{$location->name}}</option>
                                        @if ($location->child)
                                            @foreach ($location->child as $key=>$childlocation)
                                                <option value="{{$childlocation->id}}" {{ $childlocation->id == $data->location_id ? 'selected' : ''}}>-{{$childlocation->name}}</option>
                                            @endforeach
                                        @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp-address">{{ __('Real address') }}</label>
                                    <input type="text" class="form-control" id="inp-address" name="real_address"  placeholder="{{ __('Address') }}" value="{{ $data->real_address }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp-latitude">{{ __('Map Latitude') }}</label>
                                    <input type="text" class="form-control" id="inp-latitude" name="latitude"  placeholder="{{ __('Latitude') }}" value="{{ $data->latitude }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp-longitude">{{ __('Map Longitude') }}</label>
                                    <input type="text" class="form-control" id="inp-longitude" name="longitude"  placeholder="{{ __('Longitude') }}" value="{{ $data->longitude }}" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Additional Details') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-remodel">{{ __('Remodal year') }}</label>
                                    <input type="number" class="form-control" id="inp-remodel" name="remodel_year"  placeholder="{{ __('Example: 2022') }}" value="{{ $data->remodel_year }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-pool">{{ __('Pool Size') }}</label>
                                    <input type="number" class="form-control" id="inp-pool" name="pool_size"  placeholder="{{ __('Example: 120') }}" value="{{ $data->pool_size }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inp-room">{{ __('Additional Room') }}</label>
                                    <input type="text" class="form-control" id="inp-room" name="additional_room"  placeholder="{{ __('Guest room') }}" value="{{ $data->additional_room }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp-amenities">{{ __('Amenities') }}</label>
                                    <input type="text" class="form-control" id="inp-amenities" name="amenities" placeholder="{{ __('Golf field') }}" value="{{ $data->amenities }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp-equipment">{{ __('Equipment') }}</label>
                                    <input type="text" class="form-control" id="inp-equipment" name="equipment"  placeholder="{{ __('Electric heater') }}" value="{{ $data->equipment }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Banner & Gallery') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="embed_video">{{ __('Youtube embed video') }}</label>
                            <textarea class="form-control" id="embed_video" name="embed_video" rows="3" placeholder="{{__('embed video')}}">{{ $data->embed_video }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Current Featured Image ') }} </label>
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{$data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input id="img-upload"type="file" class="image-upload" name="photo" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="details">{{ __('Gallery Images') }}*</label>

                            <button type="button" class="btn btn-primary set-gallery" data-toggle="modal" data-target="#setgallery" id="#myBtn">
                                <i class="icofont-plus"></i> {{__('Set Gallery')}}
                            </button>
                        </div>

                    </div>
                </div>

                <div class="card my-4 categoryDiv">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Category') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inp-name">{{ __('Category') }}*</label>
                            <select class="form-control mb-3" name="category_id" required>
                              <option value="" selected>{{__('Please select a category')}}</option>
                              @foreach ($categories as $key=>$category)
                              <option value="{{$category->id}}" {{ $data->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                                @if ($category->child)
                                    @foreach ($category->child as $key=>$childlocation)
                                        <option value="{{$childlocation->id}}" {{ $data->category_id == $category->id ? 'selected' : ''}}>-{{$childlocation->title}}</option>
                                    @endforeach
                                @endif
                              @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                @if ($attributes)
                    @foreach ($attributes as $key=>$attribute)
                        <div class="card my-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">{{ $attribute->name }}</h6>
                            </div>

                            <div class="card-body">
                                @if ($attribute->options)
                                    @foreach ($attribute->options as $okey=>$option)
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="attributes[{{ $attribute->name }}][]" value="{{ $option->id }}" id="{{$attribute->name}}-option-{{$okey}}" {{ in_array($option->id,$data_attributes[$attribute->name]) ? 'checked':''}}>
                                                <label class="custom-control-label" for="{{$attribute->name}}-option-{{$okey}}">{{ $option->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif


                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Propert Type') }}</h6>
                    </div>
                    <div class="card-body">
                        <fieldset class="form-group">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="customRadio1" name="type" value="for_buy" class="custom-control-input" {{ $data->type=='for_buy' ? 'checked' : ''}}>
                                  <label class="custom-control-label" for="customRadio1">@lang('For Buy')</label>
                                </div>

                                <div class="custom-control custom-radio">
                                  <input type="radio" id="customRadio2" name="type" value="for_rent" class="custom-control-input" {{ $data->type=='for_rent' ? 'checked' : ''}}>
                                  <label class="custom-control-label" for="customRadio2">@lang('For Rent')</label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <button type="submit" id="submit-btn" class="btn btn-primary w-100">{{ __('Submit') }}</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
  </div>

</div>


<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="top-area">
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <div class="upload-img-btn">
                            <form  method="POST" enctype="multipart/form-data" id="form-gallery">
                                {{ csrf_field() }}
                                <input type="hidden" id="property_id" name="property_id" value="{{ $data->id }}">
                                <input type="file" name="gallery[]" class="hidden" id="property_upload_gallery_edit" accept="image/*" multiple>
                                <label id="property_gallery_edit"><i class="icofont-upload-alt"></i>{{ __("Upload File") }}</label>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
                    </div>
                    <div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )</div>
                </div>
            </div>
            <div class="gallery-images">
                <div class="selected-image">
                    <div class="row">


                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/front/js/image_gallary.js') }}"></script>
@endsection



