@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
	<h5 class=" mb-0 text-gray-800 pl-3">{{ __('Add New Attribute Options') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.attributeoptions.index',$data->name)}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.attributeoptions.create',$data->name) }}">{{ __('Add New Property') }}</a></li>
	</ol>
	</div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Add New Attribute Options Form') }}</h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{route('admin.attributeoptions.store')}}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}

            <div class="form-group">
                <label for="inp-name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="inp-name" name="name"  placeholder="{{ __('Enter Name') }}" value="" required>
            </div>

            <input type="hidden" name="attribute_id" value="{{ $data->id }}">

            <button type="submit" id="submit-btn" class="btn btn-primary w-100">{{ __('Submit') }}</button>

        </form>
      </div>
    </div>
  </div>

</div>
@endsection
