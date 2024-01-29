@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('All Transactions!')</h2>
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
	  <form action="{{ route('user.transaction') }}" method="get">
		<div class="row g-3">
		  <div class="col-md-4">
			<input name="trx_no" class="form-control" autocomplete="off" placeholder="{{__('Transaction no')}}" type="text" value="{{ old('trx_no')}}">
		  </div>

		  <div class="col-md-4">
			<select id="type" name="type" class="form-control">
			  <option value="">{{ __('Select Type') }}</option>
			  <option value="all" {{ request()->type == 'all' ? 'selected' : '' }}>{{ __('All') }}</option>
			  <option value="Deposit" {{ request()->type == 'Deposit' ? 'selected' : '' }}>{{ __('Deposit') }}</option>
			  <option value="Payout" {{ request()->type == 'Payout' ? 'selected' : '' }}>{{ __('Payout') }}</option>
			  <option value="Subscription" {{ request()->type == 'Subscription' ? 'selected' : '' }}>{{ __('Subscription') }}</option>
			  <option value="Interest Money" {{ request()->type == 'Interest Money' ? 'selected' : '' }}>{{ __('Interest Money') }}</option>
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
					<th>@lang('No')</th>
					<th>@lang('Txnid')</th>
					<th>@lang('Type')</th>
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

                        <td data-label="@lang('Txnid')">
							<div>
							{{ $data->txnid }}
							</div>
						</td>

						<td data-label="@lang('Type')">
							<div>
							{{ strtoupper($data->type) }}
							</div>
						</td>

						<td data-label="@lang('Amount')">
							<div>
							<p class="text-{{ $data->profit == 'plus' ? 'success' : 'danger'}}">{{ showSignAmount($data->amount) }}</p>
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
	  {{ $transactions->links() }}
</div>

@endsection

@push('js')

@endpush
