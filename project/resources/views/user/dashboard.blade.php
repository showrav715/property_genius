@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Welcome')!</h2>
                    <span class="ipn-subtitle">@lang('Welcome To Your Account')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')


    <!-- ============================ User Dashboard ================================== -->
    <div class="dashboard-wraper mb-3">
        <div class="mb-3">
            <h4>@lang('Your Current Package'): <span class="pc-title theme-cl">{{ auth()->user()->plan != NULL ? auth()->user()->plan->title.'('.auth()->user()->plan_end_date->format('d-m-Y').')' : 'N/A'}}</span></h4>
            @if (auth()->user()->plan == NULL)
                <p class="text-danger">@lang('To be an agent, you should under a subscription package.')</p>
            @endif
        </div>

        <div class="row g-3">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-1">
                    <div class="dashboard-stat-content"><h4>{{ showNameAmount(auth()->user()->balance) }}</h4> <span>@lang('Balance')</span></div>
                    <div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-6">
                    <div class="dashboard-stat-content"><h4>{{ showNameAmount(auth()->user()->interest_balance) }}</h4> <span>@lang('Interest Balance')</span></div>
                    <div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-5">
                    <div class="dashboard-stat-content"><h4>{{ showNameAmount($total_payouts) }}</h4> <span>@lang('Total Payouts')</span></div>
                    <div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-2">
                    <div class="dashboard-stat-content"><h4>{{ showNameAmount($total_deposits) }}</h4> <span>@lang('Total Deposit')</span></div>
                    <div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-3">
                    <div class="dashboard-stat-content"><h4>{{ showNameAmount($total_invests) }}</h4> <span>@lang('Total Invest')</span></div>
                    <div class="dashboard-stat-icon"><i class="ti-user"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-4">
                    <div class="dashboard-stat-content"><h4>{{ showNameAmount($total_transactions) }}</h4> <span>@lang('Total transactions')</span></div>
                    <div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-wraper">
        <div class="row">
            <div class="dashboard--content-item">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="dashboard--content-item">
                            <h5 class="dashboard-title">@lang('Referral URL')</h5>
                            <div class="dashboard-refer">
                                <div class="input-group input--group">
                                    <input type="text" class="form-control form--control" readonly
                                        value="{{ url('/').'?reff='.$user->affilate_code}}" id="cronjobURL">
                                    <button class="input-group-text px-3 btn--primary border-0" type="button" id="copyBoard" onclick="myFunction()">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard--content-item">
                <div class="table-responsive table--mobile-lg">
                    <table class="table bg--body">
                        <thead>
                            <tr>
                            <th>@lang('No')</th>
                            <th>@lang('Type')</th>
                            <th>@lang('Txnid')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Date')</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($transactions) == 0)
                            <tr>
                            <td colspan="12">
                                <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                            </td>
                            </tr>
                        @else
                        @foreach($transactions as $key=>$data)
                            <tr>
                                <td data-label="@lang('No')">
                                    <div>

                                    <span class="text-muted">{{ $loop->iteration }}</span>
                                    </div>
                                </td>

                                <td data-label="@lang('Type')">
                                    <div>
                                    {{ strtoupper($data->type) }}
                                    </div>
                                </td>

                                <td data-label="@lang('Txnid')">
                                    <div>
                                    {{ $data->txnid }}
                                    </div>
                                </td>

                                <td data-label="@lang('Amount')">
                                    <div>
                                    <p class="text-{{ $data->profit == 'plus' ? 'success' : 'danger'}}">{{ showNameAmount($data->amount) }}</p>
                                    </div>
                                </td>

                                <td data-label="@lang('Date')">
                                    <div>
                                    {{date('d M Y',strtotime($data->created_at))}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ User Dashboard End ================================== -->
@endsection

@push('js')
    <script>
      'use strict';

      function myFunction() {
        var copyText = document.getElementById("cronjobURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $.notify("Referral url copied", "info");
    }
    </script>
@endpush
