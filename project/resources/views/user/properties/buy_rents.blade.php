@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Buy Rent Properties')</h2>
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
            <form action="{{ route('user.deposit.index') }}" method="get">
                <div class="row g-3">
                <div class="col-md-4">
                    <input name="trx_no" class="form-control" autocomplete="off" placeholder="{{__('Transaction no')}}" type="text" value="">
                </div>

                <div class="col-md-4">
                    <select id="type" name="type" class="form-control">
                        <option value="">{{ __('Select Type') }}</option>
                        <option value="all" {{ request()->type == 'all' ? 'selected': '' }}>{{ __('All') }}</option>
                        <option value="for_buy" {{ request()->type == 'for_buy' ? 'selected': '' }}>{{ __('Buy') }}</option>
                        <option value="for_rent" {{ request()->type == 'for_rent' ? 'selected': '' }}>{{ __('Rent') }}</option>
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
                        <th>@lang('Image')</th>
                        <th>@lang('Transaction no')</th>
                        <th>@lang('Name')</th>
                        <th>@lang('Price')</th>
                        <th>@lang('Type')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Options')</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($buy_rents) == 0)
                <tr>
                    <td colspan="12">
                    <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                    </td>
                </tr>
                @else
                @foreach ($buy_rents as $key => $data)
                    <tr>
                        <td class="favourite-container" data-label="Image">
                            <div>
                                <a href="{{ route('front.property.details',$data->property->slug) }}">
                                    <img src="{{ asset('assets/images/'.$data->property->photo) }}" alt="">
                                </a>
                            </div>
                        </td>

                        <td data-label="Transaction no">
                            <div>
                                {{ strtoupper($data->transaction_no) }}
                            </div>
                        </td>

                        <td data-label="Name">
                            <div>
                                <a href="{{ route('front.property.details',$data->property->slug) }}">{{ $data->property->name }}</a>
                            </div>
                        </td>

                        <td data-label="Price">
                            <div>
                                {{ showNameAmount($data->property->price) }}
                            </div>
                        </td>

                        <td data-label="Type">
                            <div>
                                @if ($data->type== 'for_rent')
                                    @if ($data->rent_type == 'visit')
                                        <span class="badge bg-success text-white">{{ $data->rent_type }}</span>
                                        <p>{{ Carbon\Carbon::parse($data->visit_date)->format('d M y ') }} {{ $data->schedule_time }}</p>
                                    @else
                                        <span class="badge bg-success text-white">{{ $data->rent_type }}</span>
                                        <p>@lang('Rent ')/{{ $data->rent_duration }}</p>
                                    @endif
                                @else
                                    <span>@lang('Buy')</span>
                                @endif
                            </div>
                        </td>

                        <td data-label="Status">
                            <div>
                                @if ($data->status == 0)
                                    <span class="badge bg-warning text-white">@lang('pending')</span>
                                @elseif($data->status == 1)
                                    <span class="badge bg-success text-white">@lang('approved')</span>
                                @elseif($data->status == 2)
                                    <span class="badge bg-secondary text-white">@lang('contract submission')</span>
                                @elseif($data->status == 3 && $data->phase == 5)
                                    <span class="badge bg-info text-white">@lang('pay now')</span>
                                @elseif($data->status == 3)
                                    <span class="badge bg-info text-white">@lang('contract submitted')</span>
                                @else
                                    <span class="badge bg-danger text-white">@lang('rejected')</span>
                                @endif
                            </div>
                        </td>



                        <td data-label="Options">
                            <div>
                                <a href="{{ route('user.buy.rent.details',$data->id) }}" class="delete"><i class="ti-eye"></i> @lang('Details')</a>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        {{ $buy_rents->links() }}
    </div>

@endsection

@push('js')

@endpush
