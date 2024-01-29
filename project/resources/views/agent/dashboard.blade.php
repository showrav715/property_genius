@extends('layouts.agent')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4 py-3">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
    <ol class="breadcrumb m-0 py-0">
      <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">{{ __('Dashboard') }}</a></li>
    </ol>
</div>

  <div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Properties') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($properties) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Pending Properties') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($pending_properties) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Invest Properties') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($invest_properties) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Orders') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($orders) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Order Amount') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ $orders->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Rent Contracts') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($rents) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Sell Contracts') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($sells) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Deposits') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($total_deposits) }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Deposit Amount') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ $total_deposits->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Withdraw') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($total_payouts) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Withdraw Amount') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ $total_payouts->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">{{ __('Total Contacts') }}</div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800">{{ count($contacts) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  <!--Row-->

  <div class="row mb-3">
    <div class="col-xl-12 col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">@lang('Recent Contracts')</h6>
        </div>
        @if (count($contracts)>0)

          <div class="table-responsive table--mobile-lg">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>@lang('Title')</th>
                  <th>@lang('Client')</th>
                  <th>@lang('Amount')</th>
                  <th>@lang('Status')</th>
                  <th>@lang('Type')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contracts as $key=>$data)
                  <tr>
                    <td data-label="@lang('Title')">{{ $data->property != NULL ? $data->property->name : 'Property Deleted' }}</td>
                    <td data-label="@lang('Client')">{{ $data->user != NULL ? $data->user->name : 'User Deleted' }}</td>
                    <td data-label="@lang('Amount')">{{ showSignAmount($data->amount) }}</td>
                    @if($data->status == 0)
                        <td data-label="@lang('Status')"><span class="badge badge-warning">@lang('pending')</span></td>
                    @elseif($data->status == 1)
                        <td data-label="@lang('Status')"><span class="badge badge-success">@lang('approved')</span></td>
                    @elseif($data->status == 2)
                        <td data-label="@lang('Status')"><span class="badge badge-secondary">@lang('contract submission')</span></td>
                    @elseif($data->status == 3 && $data->phase == 5)
                        <td data-label="@lang('Status')"><span class="badge badge-info">@lang('client payment')</span></td>
                    @elseif($data->status == 3)
                        <td data-label="@lang('Status')"><span class="badge badge-info">@lang('contract submitted')</span></td>
                    @else
                        <td data-label="@lang('Status')"><span class="badge badge-danger">@lang('rejected')</span></td>
                    @endif

                    @if ($data->type == 'for_rent')
                        @if ($data->rent_type == 'visit')
                            <td data-label="@lang('Type')">
                                <span class="badge bg-info text-white">{{ $data->rent_type }}</span>
                                <p>{{ \Carbon\Carbon::parse($data->visit_date)->format('d M y ') }} {{ $data->schedule_time }}</p>
                            </td>
                        @else
                            <td data-label="@lang('Type')"><span class="badge bg-info text-white">{{ $data->rent_type }}</span>
                        @endif
                    @else
                        <td data-label="@lang('Type')"><span class="badge bg-info text-white">@lang('Sell')</span></span>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
          @else
            <p class="text-center">@lang('NO PROPERTY CONTRACTS FOUND')</p>
        @endif
      </div>
    </div>
  </div>

@endsection

@section('scripts')

@endsection
