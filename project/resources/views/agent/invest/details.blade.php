@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Invest Details') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.invests.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Invests') }}</a></li>
        </ol>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        @include('includes.admin.form-success')
        <div class="row">
            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                            {{__('User/Owner Information')}}
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="45%">@lang('Invest user Name')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ $data->user->name }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Invest user Email')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ $data->user->email }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Property Owner Name')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ $owner->name }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Property Owner Email')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ $owner->email }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                            {{__('General Information')}}
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="45%">@lang('Property Title')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ $data->property->name }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Invest amount')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ showNameAmount($data->amount) }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Invest Hold amount')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ showNameAmount($data->hold_amount) }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Return amount')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ showNameAmount($data->return_amount) }}</td>
                                </tr>

                                <tr>
                                    <th width="45%">@lang('Profit Generation Time')</th>
                                    <td width="10%">:</td>
                                    <td width="45%">{{ $data->profit_time != NULL ? \Carbon\Carbon::parse($data->profit_time)->toDateString() : '--' }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
