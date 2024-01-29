@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('My Investment')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
<div class="dashboard--content-item">
    <div class="card p-3 default--card">
      <form action="{{ route('user.invest.history') }}" method="get">
        <div class="row g-3">
          <div class="col-md-4">
            <input name="trx_no" class="form-control" autocomplete="off" placeholder="{{__('Transaction no')}}" type="text" value="{{ old('trx_no')}}">
          </div>

          <div class="col-md-4">
            <select id="type" name="type" class="form-control">
              <option value="">{{ __('Select Type') }}</option>
              <option value="all" {{ request()->type == 'all' ? 'selected' : '' }}>{{ __('All') }}</option>
              <option value="pending" {{ request()->type == 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
              <option value="running" {{ request()->type == 'running' ? 'selected' : '' }}>{{ __('Running') }}</option>
              <option value="completed" {{ request()->type == 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
            </select>
          </div>

          <div class="col-md-4">
            <button type="submit" class="cmn--btn bg--primary submit-btn w-100 border-0">{{__('Submit')}}</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="dashboard--content-item">
      <h5 class="dashboard-title">@lang('Invests')</h5>
      <div class="table-responsive table--mobile-lg">
          <table class="table bg--body">
              <thead>
                  <tr>
                      <th>@lang('Date')</th>
                      <th>@lang('Transaction')</th>
                      <th>@lang('Invest Property')</th>
                      <th>@lang('Invest Amount')</th>
                      <th>@lang('Hold Amount')</th>
                      <th>@lang('Return Amount')</th>
                      <th>@lang('Status')</th>
                      <th>@lang('Upcoming profit')</th>
                  </tr>
              </thead>
              <tbody>
                @if (count($invests) == 0)
                <tr>
                  <td colspan="12">
                    <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                  </td>
                </tr>
                @else
                  @foreach ($invests as $key=>$data)
                    <tr>
                        <td data-label="Date">
                            <div>
                              {{ $data->created_at->format('d M, Y') }}
                            </div>
                        </td>

                        <td data-label="Transaction">
                          <div>
                            {{ $data->transaction_no }}
                          </div>
                        </td>

                        <td data-label="Invest Property">
                          <div>
                            {{ $data->property->name }}
                          </div>
                        </td>

                        <td data-label="Invest Amount">
                            <div>
                              {{ showSignAmount($data->amount) }}
                            </div>
                        </td>

                        <td data-label="Hold Amount">
                            <div>
                                @if ($data->hold_amount == 0)
                                    {{ $data->hold_amount }}
                                @else
                                    {{ showSignAmount($data->hold_amount) }}
                                @endif
                            </div>
                        </td>

                        <td data-label="Return Amount">
                            <div>
                                {{ showSignAmount($data->return_amount) }}
                            </div>
                        </td>

                        @if ($data->status == 0)
                            <td data-label="Status">
                                <div>
                                    <span class="badge btn--warning btn-sm">@lang('pending')</span>
                                </div>
                            </td>
                        @elseif($data->status == 1)
                            <td data-label="Status">
                                <div>
                                    <span class="badge btn-info btn-sm">@lang('running')</span>
                                </div>
                            </td>
                        @else
                            <td data-label="Status">
                                <div>
                                    <span class="badge btn-success btn-sm">@lang('completed')</span>
                                </div>
                            </td>
                        @endif

                        @if ($data->status == 0)
                          <td data-label="Upcoming profit">
                            <div>
                                @lang('N/A')
                            </div>
                          </td>
                        @elseif($data->status == 1)
                          <td data-label="Upcoming profit" class="countdown" data-date="{{ Carbon\Carbon::parse($data->profit_time)->diffInSeconds() }}"></td>
                        @else
                          <td data-label="Upcoming profit">
                            <div>
                              <span class="badge btn-danger btn-sm">@lang('closed')</span>
                            </div>
                          </td>
                        @endif
                    </tr>
                  @endforeach
                @endif
              </tbody>
          </table>
      </div>
  </div>
@endsection

@push('js')
<script type="text/javascript">
	'use strict';

	$('.countdown').each(function(){
        var times = $(this).data('date');
        var $this = $(this);
        var x = setInterval(function () {
                var distance = times * 1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                var text = days + "d: " + hours + "h " + minutes + "m " + seconds + "s ";
                $this.html(text);
                if (distance < 0) {
                    clearInterval(x);
                    $this.html("COMPLETE");
                }
                times--;
        }, 1000);
	});

</script>
@endpush
