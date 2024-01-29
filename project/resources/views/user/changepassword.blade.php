@extends('layouts.user')

@push('css')

@endpush

@section('title')
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title">@lang('Change Password')</h2>
                <span class="ipn-subtitle">@lang('Dashboard')</span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
<form id="request-form" action="" method="POST" enctype="multipart/form-data">
    @includeIf('includes.flash')
    @csrf
    <div class="form-submit">
        <h4>@lang('Change Your Password')</h4>
        <div class="submit-section">
            <div class="row">
                <div class="form-group col-lg-12 my-3 col-md-6">
                    <label class="form-label">@lang('Old Password')</label>
                    <input type="password" name="cpass" class="form-control">
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">@lang('New Password')</label>
                    <input type="password" name="newpass" class="form-control">
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label">@lang('Confirm Password')</label>
                    <input type="password" name="renewpass" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-theme rounded" type="submit">@lang('Submit')</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection

@push('js')

@endpush