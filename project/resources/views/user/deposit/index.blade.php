@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('All Deposits')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="dashboard--content-item">
        <div class="card p-3 default--card">
            <form action="{{ route('user.deposit.index') }}" method="get">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input name="trx_no" class="form-control" autocomplete="off" placeholder="{{__('Deposit number')}}" type="text" value="{{ old('trx_no')}}">
                    </div>

                    <div class="col-md-4">
                        <select id="type" name="type" class="form-control">
                            <option value="">{{ __('Select Method') }}</option>
                            <option value="all" {{ request()->type == 'all' ? 'selected' : '' }}>{{ __('All') }}</option>
                            <option value="stripe" {{ request()->type == 'stripe' ? 'selected' : '' }}>{{ __('Stripe') }}</option>
                            <option value="paypal" {{ request()->type == 'paypal' ? 'selected' : '' }}>{{ __('Paypal') }}</option>
                            <option value="Manual" {{ request()->type == 'Manual' ? 'selected' : '' }}>{{ __('Manual') }}</option>
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
                        <th>@lang('Deposit Date')</th>
                        <th>@lang('Deposit Number')</th>
                        <th>@lang('Method')</th>
                        <th>@lang('Account')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Status')</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($deposits) == 0)
                <tr>
                    <td colspan="12">
                    <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                    </td>
                </tr>
                @else
                    @foreach ($deposits as $key=>$data)
                        <tr>
                            <td data-label="Deposit Date">
                                <div>
                                    {{date('d-M-Y',strtotime($data->created_at))}}
                                </div>
                            </td>

                            <td data-label="Deposit Number">
                                <div>
                                    {{ strtoupper($data->deposit_number) }}
                                </div>
                            </td>

                            <td data-label="Method">
                                <div>
                                    {{ ucfirst($data->method) }}
                                </div>
                            </td>

                            <td data-label="Account">
                                <div>
                                    {{ auth()->user()->email }}
                                </div>
                            </td>

                            <td data-label="Amount">
                                <div>
                                    {{ showNameAmount($data->amount) }}
                                </div>
                            </td>

                            <td data-label="Status">
                                <div>
                                    @if ($data->status == 'pending')
                                        <span class="badge btn-warning btn-sm">@lang('Pending')</span>
                                    @elseif ($data->status == 'reject')
                                        <span class="badge btn-danger btn-sm">@lang('Rejected')</span>
                                    @else
                                        <span class="badge btn-success btn-sm">@lang('Completed')</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        {{ $deposits->links() }}
    </div>
@endsection

@push('js')

@endpush
