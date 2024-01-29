@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Payout History')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
<div>
    <div class="dashboard--content-item">
        <div class="card p-3 default--card">
        <form action="{{ route('user.withdraw.history') }}" method="get">
            <div class="row g-3">
            <div class="col-md-4">
                <input name="trx_no" class="form-control" autocomplete="off" placeholder="{{__('Transaction no')}}" type="text" value="{{ old('trx_no')}}">
            </div>

            <div class="col-md-4">
                <select id="type" name="type" class="form-control">
                <option value="">{{ __('Select Type') }}</option>
                <option value="all" {{ request()->type == 'all' ? 'selected': '' }}>{{ __('All') }}</option>
                <option value="pending" {{ request()->type == 'pending' ? 'selected': '' }}>{{ __('Pending') }}</option>
                <option value="completed" {{ request()->type == 'completed' ? 'selected': '' }}>{{ __('Completed') }}</option>
                <option value="rejected" {{ request()->type == 'rejected' ? 'selected': '' }}>{{ __('Rejected') }}</option>
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
        <div class="table-responsive table--mobile-lg">
            <table class="table bg--body">
                <thead>
                    <tr>
                        <th>@lang('Transaction no')</th>
                        <th>@lang('Payment Method')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Fee')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Options')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($withdraws) == 0)
                        <tr>
                            <td colspan="12">
                                <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                            </td>
                        </tr>
                    @else
                        @foreach ($withdraws as $key=>$data)
                        <tr>

                            <td data-label="Transaction no">
                                <div>
                                    {{ strtoupper($data->txnid) }}
                                </div>
                            </td>

                            <td data-label="Payment Method">
                                <div>
                                    {{ ucfirst($data->method) }}
                                </div>
                            </td>

                            <td data-label="Amount">
                                <div>
                                    {{ convertedPrice($data->amount,$data->currency_id) }}
                                </div>
                            </td>

                            <td data-label="Fee">
                                <div>
                                    {{ convertedPrice($data->fee,$data->currency_id) }}
                                </div>
                            </td>

                            <td data-label="Status">
                                <div>
                                    @if ($data->status == 'pending')
                                        <span class="badge btn-warning btn-sm">@lang('Pending')</span>
                                    @elseif($data->status == 'completed')
                                        <span class="badge btn-success btn-sm">@lang('Completed')</span>
                                    @else
                                        <span class="badge btn-danger btn-sm">@lang('Rejected')</span>
                                    @endif
                                </div>
                            </td>

                            <td data-label="Options">
                                <div class="text-center">
                                    <a href="{{ route('user.withdraw.details',$data->id) }}" class="cmn--btn">
                                        <i class="fas fa-info-circle"></i>
                                        @lang('details')
                                    </a>
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
<div class="modal fade" id="withdraw-modal" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{route('user.withdraw.request')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body p-4">
                <h4 class="modal-title text-center" id="withdrawModalTitle">@lang('Stripe Withdraw')</h4>
                <div class="pt-3 pb-4">
                  <label for="amount" class="form-label">@lang('Enter Amount')</label>
                  <div class="input-group input--group">
                      <input type="number" name="amount" class="form-group-input form-control form--control bg--section"
                          placeholder="0.00" id="amount" >
                      <button type="button" class="input-group-text" id="withdrawModalCurrency">USD</button>
                  </div>

                  <label for="withdraw_wallet" class="form-label">@lang('Select Wallet')</label>
                    <div class="input-group input--group">
                        <select name="withdraw_wallet" id="withdraw_wallet" class="form-control" required>
                            <option value="main_wallet">{{ __('Main Balance') }} ({{ showNameAmount(auth()->user()->balance) }})</option>
                            <option value="interest_wallet">{{ __('Interest Balance') }} ({{ showNameAmount(auth()->user()->interest_balance) }})</option>
                        </select>
                    </div>

                    <label for="info" class="form-label mt-2">@lang('Enter Account Information')</label>
                    <div class="input-group input--group">
                        <textarea name="details" class="form-group-input form-control form--control bg--section" cols="30" rows="10"></textarea>
                    </div>

                    <input type="hidden" name="method_id" value="" id="withdrawMethodId">
                </div>
                <div class="d-flex">
                    <button type="button" class="btn shadow-none btn-danger me-2 w-50" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn shadow-none btn-success w-50">@lang('Proceed')</button>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        'use strict';
        $(document).on('click','#withdrawNow',function(){
            $("#withdrawModalTitle").text($(this).attr('data-name')+' Withdraw');
            $("#withdrawModalCurrency").text($(this).attr('data-currName'));
            $("#withdrawMethodId").val($(this).attr('data-id'));
        });
    </script>
@endpush
