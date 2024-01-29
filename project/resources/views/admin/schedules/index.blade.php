@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Update Schedules') }}</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">{{ __('Schedules') }}</a></li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Update Schedule Time') }}</h6>
                </div>

                <div class="card-body">
                    <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                    <form class="geniusform" action="{{route('admin.schedules.update')}}" method="POST" enctype="multipart/form-data">

                        @include('includes.admin.form-both')

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="times">{{ __('Time') }}</label>
                            <textarea class="form-control mytags" id="times" name="times" placeholder="{{__('Schedule Time')}}">{{ $data != NULL ? $data->times : '' }}</textarea>
                        </div>

                    <button type="submit" id="submit-btn" class="btn btn-primary w-100">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection
