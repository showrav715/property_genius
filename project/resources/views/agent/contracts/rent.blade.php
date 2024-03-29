@extends('layouts.agent')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Property Contracts') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">{{ __('Property') }}</a></li>
        </ol>
	</div>
</div>

<div class="row mt-3">
  <div class="col-lg-12">
	@include('includes.admin.form-success')

	<div class="card mb-4">
	  <div class="table-responsive p-3">
		<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
		  <thead class="thead-light">
			<tr>
                <th>{{ __('Featured Image') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Client') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Options') }}</th>
			</tr>
		  </thead>
		</table>
	  </div>
	</div>
  </div>
</div>

@endsection


@section('scripts')

    <script type="text/javascript">
	"use strict";

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               searching: true,
               ajax: '{{ route('agent.property.contracts.datatables',['type' => 'for_rent']) }}',
               columns: [

                        { data: 'photo', name: 'photo' , searchable: false, orderable: false},
                        { data: 'name', name: 'name' },
                        { data: 'user_id', name: 'user_id' },
                        { data: 'amount', name: 'amount' },
                        { data: 'status', name: 'status' },
                        { data: 'type', name: 'type' },
            			{ data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });

</script>

@endsection
