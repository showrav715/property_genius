@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">

            <h2 class="ipt-title">@lang('Bookmarked Listing')</h2>
            <span class="ipn-subtitle">@lang('Dashboard')</span>

        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')
    <div class="dashboard--content-item mb-0">
        <div class="table-responsive table--mobile-lg">
            <table class="table bg--body">
                <thead>
                    <tr>
                        <th>@lang('Image')</th>
                        <th>@lang('Name')</th>
                        <th>@lang('Price')</th>
                        <th>@lang('Type')</th>
                        <th>@lang('Options')</th>
                    </tr>
                </thead>
                
                <tbody>

                  @if (count($wishlists) == 0)
                  <tr>
                    <td colspan="12">
                      <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                    </td>
                  </tr>
                  @else
                    @foreach ($wishlists as $key => $list)
                      @if($list->property)
                        <tr>
                            <td class="favourite-container" data-label="Image">
                                <div>
                                    <a href="{{ route('front.property.details',$list->property->slug) }}">
                                        <img src="{{ asset('assets/images/'.$list->property->photo) }}" alt="">
                                    </a>
                                </div>
                            </td>

                            <td data-label="Name">
                                <div>
                                    <a href="{{ route('front.property.details',$list->property->slug) }}">{{ $list->property->name }}</a>
                                </div>
                            </td>

                            <td data-label="Price">
                                <div>
                                    {{ showNameAmount($list->property->price) }}
                                </div>
                            </td>

                            <td data-label="Type">
                                <div>
                                    {{ $list->property->type== 'for_rent' ? __('Rent') : __('Buy')}}
                                </div>
                            </td>



                            <td data-label="Options">
                                <div>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#confirm-delete" data-href="{{ route('user.bookmark.delete',$list->id) }}" class="badge badge-danger text-white py-2 px-3"><i class="ti-close"></i> @lang('Delete')</a>
                                </div>
                            </td>

                        </tr>
                      @endif
                    @endforeach
                  @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal modal-blur fade" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
              <h3>{{__('Are you sure')}}?</h3>
              <div class="text-muted">{{__("You are about to delete this favourite.")}}</div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="d-flex justify-content-center gap-10px">
                  <a href="#" class="btn btn-outline-info w-100" data-bs-dismiss="modal">
                      {{__('Cancel')}}
                    </a>

                    <a href="javascript:;" class="btn btn-danger w-100 btn-ok text-white">
                      {{__('Delete')}}
                    </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection

@push('js')
<script type="text/javascript">
    'use strict';

      $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });

</script>
@endpush
