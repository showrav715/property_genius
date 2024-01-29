@extends('layouts.user')

@push('css')

@endpush

@section('title')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Withdraw Details')</h2>
                    <span class="ipn-subtitle">@lang('Dashboard')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
@endsection

@section('content')

<div class="dashboard--content-item">
  <div class="table-responsive-sm">
      <table class="table mb-0">
          <tbody>
          <tr class="border-top">
              <th class="45%" width="45%">{{__('WithDraw Method')}}</th>
              <td width="10%">:</td>
              <td class="45%" width="45%">{{ $data->method }}</td>
          </tr>

          <tr>
              <th class="45%" width="45%">{{__('User Name')}}</th>
              <td width="10%">:</td>
              <td class="45%" width="45%">{{ $data->user->name }}</td>
          </tr>

          <tr>
              <th class="45%" width="45%">{{__('Amount')}}</th>
              <td width="10%">:</td>
              <td class="45%" width="45%">{{ convertedPrice($data->amount,$data->currency_id) }}</td>
          </tr>

          <tr>
              <th class="45%" width="45%">{{__('Fees')}}</th>
              <td width="10%">:</td>
              <td class="45%" width="45%">{{ convertedPrice($data->fee,$data->currency_id) }}</td>
          </tr>

          <tr>
            <th class="45%" width="45%">{{__('Details')}}</th>
            <td width="10%">:</td>
            <td class="45%" width="45%">{{ $data->details }}</td>
          </tr>

          <tr>
              <th class="45%" width="45%">{{__('Status')}}</th>
              <td width="10%">:</td>
              <td class="45%" width="45%">
                @if ($data->status == 'completed')
                  <span class="badge bg-success">{{__('Completed')}}</span>
                @elseif($data->status == 'pending')
                  <span class="badge bg-warning">{{__('Pending')}}</span>
                @else
                  <span class="badge bg-danger">{{__('Rejected')}}</span>
                @endif
              </td>
          </tr>


          </tbody>
      </table>
  </div>
</div>


@endsection

@push('js')

@endpush
