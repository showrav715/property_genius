@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="d-sm-flex align-items-center py-3 justify-content-between">
        @if ($data->type == 'for_rent')
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Contract Details') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.property.contracts.rents')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        @else
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Contract Details') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.property.contracts.sells')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        @endif
        <ol class="breadcrumb py-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Contracts') }}</a></li>
        </ol>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        @include('includes.admin.form-success')

        <div class="row">
            <div class="col-lg-12">
                @if ($data->rent_type == 'visit')
                    @include('partials.agent.property.visit')
                @endif

                @if ($data->type == 'for_buy' || $data->rent_type == 'immediately')
                    @include('partials.agent.property.immediately')
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
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

                                @if ($data->type == 'for_buy' || $data->rent_type == 'immediately')
                                    @if ($data->phase == 3 || $data->phase == 4)
                                        <tr>
                                            <th width="45%">@lang('Contract Paper')</th>
                                            <td width="10%">:</td>
                                            <td width="45%">
                                                <a href="{{asset('assets/images/'.$data->contract_paper)}}" download>
                                                    {{ $data->contract_paper }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="footer-area">
                        @if ($data->type == 'for_rent' && $data->rent_type == 'immediately')
                            @if ($data->status == 0)
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 2]) }}" class="btn btn-primary"><i class="far fa-check-circle"></i> {{__('Verify')}}</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 4]) }}" class="btn btn-danger ml-3"><i class="fas fa-minus-circle"></i> {{__('Reject')}}</a>
                            @endif

                            @if ($data->status == 3 && $data->phase == 4)
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.phase',['id1' => $data->id, 'id2' => 5]) }}" class="btn btn-primary"><i class="far fa-check-circle"></i> {{__('Approve to pay')}}</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 4]) }}" class="btn btn-danger ml-3"><i class="fas fa-minus-circle"></i> {{__('Reject')}}</a>
                            @endif
                        @elseif($data->status == 0 && $data->rent_type == 'visit')
                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 1]) }}" class="btn btn-primary"><i class="far fa-check-circle"></i> {{__('Approve')}}</a>
                            <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 4]) }}" class="btn btn-danger ml-3"><i class="fas fa-minus-circle"></i> {{__('Reject')}}</a>
                        @else
                            @if ($data->status == 0)
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 2]) }}" class="btn btn-primary"><i class="far fa-check-circle"></i> {{__('Verify')}}</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 4]) }}" class="btn btn-danger ml-3"><i class="fas fa-minus-circle"></i> {{__('Reject')}}</a>
                            @endif

                            @if ($data->status == 3 && $data->phase == 4)
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.phase',['id1' => $data->id, 'id2' => 5]) }}" class="btn btn-primary"><i class="far fa-check-circle"></i> {{__('Approve to pay')}}</a>
                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" data-href="{{ route('agent.property.contracts.status',['id1' => $data->id, 'id2' => 4]) }}" class="btn btn-danger ml-3"><i class="fas fa-minus-circle"></i> {{__('Reject')}}</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="special-box">
                    <div class="heading-area">
                        <h4 class="title">
                            {{__('Client Information')}}
                        </h4>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <tbody>

                                    <tr>
                                        <th width="45%">@lang('Name')</th>
                                        <td width="10%">:</td>
                                        <td width="45%">{{ $user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th width="45%">@lang('Email')</th>
                                        <td width="10%">:</td>
                                        <td width="45%">{{ $user->email }}</td>
                                    </tr>

                                    @if ($user->photo != NULL)
                                        <tr>
                                            <th width="45%">{{$key}}</th>
                                            <td width="10%">:</td>
                                            <td width="45%"><a href="{{asset('assets/images/'.$user->photo)}}" download><img src="{{asset('assets/images/'.$user->photo)}}" class="img-thumbnail"></a></td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th width="45%">@lang('Phone')</th>
                                        <td width="10%">:</td>
                                        <td width="45%">{{ $user->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th width="45%">@lang('Zip')</th>
                                        <td width="10%">:</td>
                                        <td width="45%">{{ $user->zip }}</td>
                                    </tr>

                                    <tr>
                                        <th width="45%">@lang('City')</th>
                                        <td width="10%">:</td>
                                        <td width="45%">{{ $user->city }}</td>
                                    </tr>

                                    <tr>
                                        <th width="45%">@lang('Address')</th>
                                        <td width="10%">:</td>
                                        <td width="45%">{{ $user->address }}</td>
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
                </div>
            </div>
        </div>

    </div>
</div>

{{-- STATUS MODAL --}}
<div class="modal fade status-modal" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __("Update Status") }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="text-center">{{ __("You are about to change the status.") }}</p>
				<p class="text-center">{{ __("Do you want to proceed?") }}</p>
			</div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
				<a href="javascript:;" class="btn btn-success btn-ok">{{ __("Update") }}</a>
			</div>
		</div>
	</div>
</div>
{{-- STATUS MODAL ENDS --}}



@endsection
