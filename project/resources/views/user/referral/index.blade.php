@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('My Referred')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                    <tr>
                        <th>{{ __('Serial No') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Joined At') }}</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
              @if (count($referreds) == 0)
                <tr>
                  <td colspan="12">
                    <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                  </td>
                </tr>
                @else
                  @foreach ($referreds as $key=>$data)
                    <tr>
                        <td data-label="{{ __('Serial No') }}">
                            <div>
                                {{ $loop->iteration }}
                            </div>
                        </td>
                        <td data-label="{{ __('Name') }}">
                            <div>
                                {{ ucfirst($data->name) }}
                            </div>
                        </td>
                        <td data-label="{{ __('Joined At') }}">
                            <div>
                                {{ $data->created_at->diffForHumans() }}
                            </div>
                        </td>
                    </tr>
                  @endforeach
                @endif
            </tbody>
        </table>
    </div>
    {{ $referreds->links() }}
</div>


@endsection

@push('js')

@endpush
