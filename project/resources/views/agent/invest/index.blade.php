@extends('layouts.agent')

@section('content')
<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Invest Property') }}</h5>
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
                <th>{{ __('Price') }}</th>
                <th>{{ __('Invest Amount') }}</th>
                <th>{{ __('Min Amount') }}</th>
                <th>{{ __('Max Amount') }}</th>
                <th>{{ __('Type') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Options') }}</th>
			</tr>
		  </thead>
		</table>
	  </div>
	</div>
  </div>
</div>


@includeIf('partials.admin.status')

<div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __("Confirm Delete") }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-center">{{__("You are about to delete this property. Every informtation under this property will be deleted.")}}</p>
				<p class="text-center">{{ __("Do you want to proceed?") }}</p>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
				<a href="javascript:;" class="btn btn-danger btn-ok">{{ __("Delete") }}</a>
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
               ajax: '{{ route('agent.invest.properties.datatables') }}',
               columns: [

                        { data: 'photo', name: 'photo' , searchable: false, orderable: false},
                        { data: 'name', name: 'name' },
                        { data: 'price', name: 'price' },
                        { data: 'invest_amount', name: 'invest_amount' },
                        { data: 'min_invest', name: 'min_invest' },
                        { data: 'max_invest', name: 'max_invest' },
                        { data: 'type', name: 'type' },
                        { data: 'status', name: 'status' },
            			{ data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });

			$(function() {
            $(".btn-area").append('<div class="col-sm-12 col-md-4 pr-3 text-right">'+
                '<a class="btn btn-primary" href="{{route('agent.invest.properties.create')}}">'+
                    '<i class="fas fa-plus"></i> {{__('Add New')}}'+
                '</a>'+
            '</div>');
        });

</script>

@endsection
