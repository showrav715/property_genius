@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New Plan') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.plans.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">{{ __('Manage Plan') }}</a></li>
    </ol>
	</div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Plan Form') }}</h6>
      </div>

      <div class="card-body py-5">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{route('admin.plans.store')}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}

            <div class="form-group">
              <label for="inp-title">{{ __('Title') }}</label>
              <input type="text" class="form-control" id="inp-title" name="title"  placeholder="{{ __('Enter Title') }}" value="" required>
            </div>

            <div class="form-group">
              <label for="inp-subtitle">{{ __('Subtitle') }}</label>
              <input type="text" class="form-control" id="inp-subtitle" name="subtitle"  placeholder="{{ __('Enter Subtitle') }}" value="" required>
            </div>

            <div class="form-group">
                <label for="plan_type">{{ __('Plan Type') }}</label>
                <select name="plan_type" class="form-control" id="plan_type">
                  <option value="monthly"> {{__('Monthly')}} </option>
                  <option value="yearly"> {{__('Yearly')}} </option>
                  <option value="life_time"> {{__('Life Time')}} </option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">{{ __('Price') }} ({{$currency->name}})</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="{{ __('Plan Price') }}" min="0" step="0.01" value="">
            </div>

            <div class="form-group">
                <label for="limit">{{ __('Ad Limit') }}</label>
                <input type="number" class="form-control" id="limit" name="post_limit" placeholder="0" min="0" value="">
            </div>

            <div class="form-group">
                <label for="limit">{{ __('Ad Duration') }}</label>
                <input type="number" class="form-control" id="limit" name="post_duration" placeholder="0" min="0" value="">
            </div>

            <div class="form-group">
                <label for="limit">{{ __('Price Color') }}</label>
                <div  id="cp3-container">
                  <div class="input-group" title="Using input value">
                      <input  type="color" name="price_color" class="form-control" value="" id="exampleInputPassword1">
                  </div>
                </div>
            </div>

            <div class="form-group">
              <label for="status">{{ __('Status') }}</label>
              <select name="status" class="form-control" id="status">
                <option value="1"> {{__('activated')}} </option>
                <option value="0"> {{__('deactivated')}} </option>
              </select>
            </div>

            <div class="featured-keyword-area">
                <div class="lang-tag-top-filds" id="lang-section">


                </div>

                <a href="javascript:;" id="lang-btn" class="add-fild-btn d-flex justify-content-center"><i class="icofont-plus"></i> {{__('Add Attribute')}}</a>
              </div>

            <input type="hidden" name="manage_schedule_id" value="" id="scheduleId">
            <button type="submit" id="submit-btn" class="btn btn-primary w-100 mt-3">{{ __('Submit') }}</button>

        </form>
      </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        "use strict";
        function isEmpty(el){
            return !$.trim(el.html())
        }


    $("#lang-btn").on('click', function(){

        $("#lang-section").append(''+
                                    '<div class="lang-area mb-3">'+
                                        '<span class="remove lang-remove"><i class="fas fa-times"></i></span>'+
                                        '<div class="row">'+
                                        '<div class="col-md-12">'+
                                        '<input type="text" class="form-control" name="attribute[]" placeholder="{{ __('Enter Plan Attribute') }}" value="" required>'+
                                        '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '');

    });

    $(document).on('click','.lang-remove', function(){

        $(this.parentNode).remove();

    });

  </script>
@endsection
