@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('My Profile')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
    <!-- ============================ User Dashboard ================================== -->
        <div class="form-submit">
            <h4>@lang('My Account')</h4>
            @includeIf('partials.flash')

            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="submit-section">
                    <div class="row gy-3">
                        <div class="form-group col-md-12">
                            <div class="user--profile mb-5">
                                <div class="thumb">
                                    <img src="{{ auth()->user()->photo ? asset('assets/images/'.auth()->user()->photo) : asset('assets/images/1671448068p-4.jpg') }}" alt="clients">
                                </div>
                                <div class="remove-thumb">
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="content">
                                    <div>
                                        <h3 class="title">
                                            {{ auth()->user()->name }}
                                        </h3>
                                        <a href="#0" class="text--base">
                                            {{ auth()->user()->email }}
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <label class="btn btn-sm btn-primary border-0">
                                            @lang('Update Profile Picture')
                                            <input type="file" id="profile-image-upload" name="photo" hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label>@lang('Your Name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Email')</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Fax')</label>
                            <input type="text" class="form-control" name="fax" value="{{ $user->fax }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Country')</label>
                            <select class="js-example-basic-single" name="country_id">
                                @foreach ($countries as $key=>$country)
                                    <option value="{{ $country->id }}" {{ $country->id == $user->country_id ? 'selected' : ''}}>{{ $country->name }}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Phone')</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Address')</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('City')</label>
                            <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Zip')</label>
                            <input type="text" class="form-control" name="zip" value="{{ $user->zip }}">
                        </div>

                        <div class="form-group col-md-6">
                            <label>@lang('Skype Name')</label>
                            <input type="text" class="form-control" name="skype_name" value="{{ $user->skype_name }}">
                        </div>


                        <div class="form-group col-md-12">
                            <label>@lang('About')</label>
                            <textarea class="form-control" name="about">
                                {{ $user->about }}
                            </textarea>
                        </div>

                        <div class="form-submit">
                            <h4>@lang('Social Accounts')</h4>
                            <div class="submit-section">
                                <div class="row gy-3">

                                    <div class="form-group col-md-6">
                                        <label>@lang('Facebook')</label>
                                        <input type="text" class="form-control" name="fb_link" value="{{ $user->fb_link }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>@lang('Twitter')</label>
                                        <input type="text" class="form-control" name="twitter_link" value="{{ $user->twitter_link }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>@lang('Instagram')</label>
                                        <input type="text" class="form-control" name="instagram_link" value="{{ $user->instagram_link }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>@lang('Linkedin')</label>
                                        <input type="text" class="form-control" name="linkedin_link" value="{{ $user->linkedin_link }}">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button class="btn btn-theme rounded" type="submit">@lang('Submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <!-- ============================ User Dashboard End ================================== -->
@endsection

@push('js')
<script>
  "use strict"
  var prevImg = $('.user--profile .thumb').html();
    function proPicURL(input) {
        if (input.files && input.files[0]) {
          var uploadedFile = new FileReader();
          uploadedFile.onload = function (e) {
              var preview = $('.user--profile').find('.thumb');
              preview.html(`<img src="${e.target.result}" alt="user">`);
              preview.addClass('image-loaded');
              preview.hide();
              preview.fadeIn(650);
              $(".image-view").hide();
              $(".remove-thumb").show();
          }
          uploadedFile.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-image-upload").on('change', function () {
        proPicURL(this);
    });

    $(".remove-thumb").on('click', function () {
        $(".user--profile .thumb").html(prevImg);
        $(".user--profile .thumb").removeClass('image-loaded');
        $(".image-view").show();
        $(this).hide();
    })

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
