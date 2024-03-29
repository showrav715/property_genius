@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between py-3">
	<h5 class=" mb-0 text-gray-800 pl-3">{{ __('Reviews') }}</h5>
	<ol class="breadcrumb py-0 m-0">
		<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>

		<li class="breadcrumb-item"><a href="{{ route('admin.review.index') }}">{{ __('Reviews') }}</a></li>
	</ol>
	</div>
</div>


<div class="row mt-3">
    <div class="col-lg-12 mb-2">
        <div class="card">
            <div class="card-body">
              <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                <form class="geniusform" action="{{route('admin.ps.update')}}" method="POST" enctype="multipart/form-data">

                    @include('includes.admin.form-both')

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="review_title">{{  __('Section title')  }}</label>
                        <input type="text" class="form-control" id="review_title" name="review_title"  placeholder="{{ __('Enter Section title') }}" value="{{ $ps->review_title }}" required>
                    </div>


                    <div class="form-group">
                        <label>{{ __('Set Avatar Image') }}</label>
                        <div class="wrapper-image-preview">
                            <div class="box full-width">
                                <div class="back-preview-image" style="background-image: url({{ $ps->review_photo ? asset('assets/images/'.$ps->review_photo) : asset('assets/images/placeholder.jpg') }});"></div>
                                <div class="upload-options">
                                    <label class="img-upload-label full-width" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                    <input id="img-upload" type="file" class="image-upload" name="review_photo" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="submit-btn" class="btn btn-primary mt-2 w-100">{{ __('Submit') }}</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12">

        @include('includes.admin.form-success')

        <div class="card mb-4">
        <div class="table-responsive p-3">
            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>{{__('Featured Image')}}</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Sub Title')}}</th>
                    <th>{{__('Options')}}</th>
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
                <p class="text-center">{{__("You are about to delete this Review. Every informtation under this review will be deleted.")}}</p>
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
           ajax: '{{ route('admin.review.datatables') }}',
           columns: [
                    { data: 'photo', name: 'photo' , searchable: false, orderable: false},
                    { data: 'title', name: 'title' },
                    { data: 'subtitle', name: 'subtitle' },
                    { data: 'action', searchable: false, orderable: false }
            ],
            language : {
                processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
            }
        });

        		$(function() {
        			$(".btn-area").append('<div class="col-sm-12 col-md-4 pr-3 text-right">'+
                            '<a class="btn btn-primary" href="{{route('admin.review.create')}}">'+
                                '<i class="fas fa-plus"></i> Add New Review'+
                            '</a>'+
                        '</div>');
                    });


</script>

@endsection


