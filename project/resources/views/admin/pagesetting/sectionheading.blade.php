@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Section Heading') }}</h5>
        <ol class="breadcrumb py-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Home Page Manage') }}</a></li>
        </ol>
    </div>
</div>

<div class="card mb-4 mt-3">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Section Heading') }}</h6>
    </div>

    <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{route('admin.ps.update')}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}


            <div class="form-group">
                <label for="explore-title">{{ __('Explore Property Title') }} *</label>
                <input type="text" class="form-control" id="explore-title" name="explore_ptitle"  placeholder="{{ __('Explore Property Title') }}" value="{{ $data->explore_ptitle }}" required>
            </div>

            <div class="form-group">
                <label for="explore-subtitle">{{ __('Explore Property Subtitle') }} *</label>
                <textarea name="explore_psub" id="explore-subtitle" cols="30" rows="5" class="form-control summernote" placeholder="{{ __('Explore Property Subtitle') }}" required>{{ $data->explore_psub }} </textarea>
            </div>

            <div class="form-group">
                <label for="location-title">{{ __('Location Title') }} *</label>
                <input type="text" class="form-control" id="location-title" name="location_title"  placeholder="{{ __('Location Title') }}" value="{{ $data->location_title }}" required>
            </div>

            <div class="form-group">
                <label for="location-subtitle">{{ __('Location Subtitle') }} *</label>
                <textarea name="location_subtitle" id="location-subtitle" cols="30" rows="5" class="form-control summernote" placeholder="{{ __('Location Subtitle') }}" required>{{ $data->location_subtitle }} </textarea>
            </div>

            <div class="form-group">
                <label for="review-title">{{ __('Review Title') }} *</label>
                <input type="text" class="form-control" id="plan-title" name="review_title"  placeholder="{{ __('Review Title') }}" value="{{ $data->review_title }}" required>
            </div>

            <div class="form-group">
                <label for="review-subtitle">{{ __('Review Subtitle') }} *</label>
                <textarea name="review_subtitle" id="review-subtitle" cols="30" rows="5" class="form-control summernote" placeholder="{{ __('Review Subtitle') }}" required>{{ $data->review_subtitle }} </textarea>
            </div>

            <div class="form-group">
                <label for="plan-title">{{ __('Plan Title') }} *</label>
                <input type="text" class="form-control" id="plan-title" name="plan_title"  placeholder="{{ __('Plan Title') }}" value="{{ $data->plan_title }}" required>
            </div>

            <div class="form-group">
                <label for="plan-subtitle">{{ __('Plan Subtitle') }} *</label>
                <textarea name="plan_subtitle" id="plan-subtitle" cols="30" rows="5" class="form-control summernote" placeholder="{{ __('Plan Subtitle') }}" required>{{ $data->plan_subtitle }} </textarea>
            </div>

            <div class="form-group">
                <label for="blog-title">{{ __('Blog Title') }} *</label>
                <input type="text" class="form-control" id="blog-title" name="blog_title"  placeholder="{{ __('Blog Title') }}" value="{{ $data->blog_title }}" required>
            </div>

            <div class="form-group">
                <label for="blog-subtitle">{{ __('Blog Subtitle') }} *</label>
                <textarea name="blog_subtitle" id="blog-subtitle" cols="30" rows="5" class="form-control summernote" placeholder="{{ __('Blog Subtitle') }}" required>{{ $data->blog_subtitle }} </textarea>
            </div>

            <div class="form-group">
                <label for="cta-title">{{ __('Cta Title') }} *</label>
                <input type="text" class="form-control" id="cta-title" name="call_title"  placeholder="{{ __('Cta Title') }}" value="{{ $data->call_title }}" required>
            </div>

            <div class="form-group">
                <label for="cta-subtitle">{{ __('Cta Subtitle') }} *</label>
                <textarea name="call_subtitle" id="cta-subtitle" cols="30" rows="5" class="form-control summernote" placeholder="{{ __('Cta Subtitle') }}" required>{{ $data->call_subtitle }} </textarea>
            </div>

            <button type="submit" id="submit-btn" class="btn btn-primary w-100">{{ __('Submit') }}</button>

        </form>
    </div>
</div>
@endsection
