@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Welcome')!</h2>
                    <span class="ipn-subtitle">@lang('Buy/rent Details')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ User Dashboard ================================== -->
    <section class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="filter_search_opt">
                        <a href="javascript:void(0);" onclick="openFilterSearch()">Dashboard Navigation<i class="ml-2 ti-menu"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-12">
                    @include('partials.user.sidebar')
                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="dashboard-wraper">
                        <div class="row">
                            @if ($data->rent_type == 'visit')
                                @include('partials.user.property.visit')
                            @endif

                            @if ($data->type == 'for_buy' || $data->rent_type == 'immediately')
                                @include('partials.user.property.immediately')
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="special-box">
                                    <div class="heading-area">
                                        <h4 class="title">
                                            {{__('Required Information')}}
                                        </h4>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <tbody>

                                                @foreach ($requiredInformations as $key=>$value)
                                                    @if ($value[1] == 'file')
                                                    <tr>
                                                        <th width="45%">{{$key}}</th>
                                                        <td width="10%">:</td>
                                                        <td width="45%"><a href="{{asset('assets/images/'.$value[0])}}" download><img src="{{asset('assets/images/'.$value[0])}}" class="img-thumbnail"></a></td>
                                                    </tr>
                                                    @else
                                                        <tr>
                                                            <th width="45%">{{$key}}</th>
                                                            <td width="10%">:</td>
                                                            <td width="45%">{{ $value[0] }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="special-box">
                                    <div class="heading-area">
                                        <h4 class="title">
                                        {{__('Buy/Rent Details')}}
                                        </h4>
                                    </div>

                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <tbody>
                                                    <tr>
                                                        <th width="45%">{{__('Transaction No')}}</th>
                                                        <th width="10%">:</th>
                                                        <td width="45%">{{$data->transaction_no}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="45%">{{__('Property Name')}}</th>
                                                        <th width="10%">:</th>
                                                        <td width="45%">{{ $property['name'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="45%">{{__('User')}}</th>
                                                        <th width="10%">:</th>
                                                        <td width="45%">{{$data->user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="45%">{{__('Amount')}}</th>
                                                        <th width="10%">:</th>
                                                        <td width="45%">{{ showSignAmount($data->amount) }}</td>
                                                    </tr>

                                                    @if ($data->type == 'for_rent')
                                                        <tr>
                                                            <th width="45%">{{__('Guarantee Amount')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{ showSignAmount($data->guarantee_amount) }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th width="45%">{{__('Next Rent Given Time')}}</th>
                                                            <th width="10%">:</th>
                                                            <td width="45%">{{ $data->next_rent_time->format('m-d-y') }}</td>
                                                        </tr>
                                                    @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="footer-area">
                                        @if ($data->type == 'for_rent' && $data->rent_type == 'immediately' )
                                            @if ($data->phase == 3 || $data->phase == 4)
                                                <a href="{{ route('user.buy.rent.contracts',$data->id) }}" class="btn btn-danger ml-3 text-color"><i class="fas fa-minus-circle"></i> {{__('Download Contracts')}}</a>
                                            @endif
                                        @endif

                                        @if ($data->type == 'for_buy')
                                            @if ($data->phase == 3 || $data->phase == 4)
                                                <a href="{{ route('user.buy.rent.contracts',$data->id) }}" class="btn btn-danger ml-3 text-color"><i class="fas fa-minus-circle"></i> {{__('Download Contracts')}}</a>
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        @if ($data->phase == 3)
                            <div class="row">
                                <p class="text-danger">@lang('Please Download the contracts and sign here to upload')</p>
                                <form action="{{ route('user.contract.paper.submit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="buy_rent_id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label class="font-weight-bold">@lang('Contract Paper')</label>
                                        <input class="form-control" name="contract_paper" type="file">
                                    </div>

                                    <button class="btn btn-theme-light-2 rounded" type="submit">@lang('Submit')</button>
                                </form>
                            </div>
                        @endif

                        @if ($data->phase == 5)
                            <div class="row">
                                <p class="text-danger">@lang('Please pay now amount is: ') {{ $property['type'] == 'for_rent' ? showSignAmount($data->guarantee_amount) : showSignAmount($data->amount)}}</p>

                                <a href="{{ route('user.property.checkout',$data->id) }}" class="btn btn-theme-light-2 rounded">@lang('Pay now')</a>

                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ User Dashboard End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')

@endpush
