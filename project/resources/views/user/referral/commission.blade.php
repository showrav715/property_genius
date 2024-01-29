@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">@lang('Commissions Log')</h2>
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
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Type') }}</th>
                    <th>{{ __('From') }}</th>
                    <th>{{ __('Amount') }}</th>
                </tr>
            </thead>
            <tbody>
              @if (count($commissions) == 0)
                <tr>
                  <td colspan="12">
                    <h4 class="text-center m-0 py-2">{{__('No Data Found')}}</h4>
                  </td>
                </tr>
                @else
                  @foreach ($commissions as $key=>$data)
                    @php
                        $receiver = App\Models\User::whereId($data->from_user_id)->first();
                    @endphp
                  <tr>
                      <td data-label="{{ __('Date') }}">
                          <div>
                              {{ $data->created_at->toDateString() }}
                          </div>
                      </td>

                      <td data-label="{{ __('Type') }}">
                          <div>
                              {{ ucfirst($data->type) }}
                          </div>
                      </td>

                      <td data-label="{{ __('From') }}">
                          <div>
                              {{  $receiver != NULL ? $receiver->name : '' }}
                          </div>
                      </td>

                      <td data-label="{{ __('Amount') }}">
                          <div>
                              {{ showNameAmount($data->amount) }}
                          </div>
                      </td>
                  </tr>
                  @endforeach
                @endif
            </tbody>
        </table>
    </div>
    {{ $commissions->render() }}
</div>

@endsection

@push('js')

@endpush

