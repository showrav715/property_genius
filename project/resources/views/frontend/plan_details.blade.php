@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Subscription')</h2>
                    <span class="ipn-subtitle">@lang('Proceed For Payment')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 form-submit">
                    <div class="checkout-wrap">
                        <div class="checkout-body">
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="mb-3">@lang('Payment Method')</h4>
                                </div>

                                <form id="subscription-form" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang('Method')<i class="req">*</i></label>
                                            <select name="method" id="subscriptionMethod" class="form-control">
                                                <option value="" selected>{{__('Please select a method')}}</option>
                                                @foreach ($gateways as $gateway)
                                                    @if (in_array($gateway->keyword,$availableGatways))
                                                        @if ($gateway->type == 'manual')
                                                            <option value="Manual" data-details="{{$gateway->details}}">{{ $gateway->title }}</option>
                                                        @else
                                                            <option value="{{$gateway->keyword}}">{{ $gateway->name }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div id="card-view" class="col-lg-12 my-3 pt-3 d-none">
                                        <div class="row gy-2">
                                            <input type="hidden" name="cmd" value="_xclick">
                                            <input type="hidden" name="no_note" value="1">
                                            <input type="hidden" name="lc" value="UK">
                                            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">

                                            <div class="col-lg-6 mb-3">
                                                <input type="text" class="form-control card-elements" name="cardNumber" placeholder="{{ __('Card Number') }}" autocomplete="off" autofocus oninput="validateCard(this.value);"/>
                                                <span id="errCard"></span>
                                            </div>

                                            <div class="col-lg-6 cardRow mb-3">
                                                <input type="text" class="form-control card-elements" placeholder="{{ __('Card CVC') }}" name="cardCVC" oninput="validateCVC(this.value);">
                                                <span id="errCVC"></span>
                                            </div>

                                            <div class="col-lg-6">
                                                <input type="text" class="form-control card-elements" placeholder="{{ __('Month') }}" name="month" >
                                            </div>

                                            <div class="col-lg-6">
                                                <input type="text" class="form-control card-elements" placeholder="{{ __('Year') }}" name="year">
                                            </div>

                                        </div>
                                    </div>

                                    <input type="hidden" name="price" value="{{ baseCurrencyAmount($data->price) }}">
                                    <input type="hidden" name="days" value="{{ $data->post_duration }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="plan_id" value="{{ $data->id }}">
                                    <input type="hidden" name="currency_sign" value="{{ $currency->sign }}">
                                    <input type="hidden" id="currencyCode" name="currency_code" value="{{ $currency->name }}">
                                    <input type="hidden" name="currency_id" value="{{ $currency->id }}">

                                    <button type="submit" class="btn btn-theme rounded full-width my-2">{{__('Submit')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar End -->

                <div class="col-lg-3 col-md-12">
                    <div class="checkout-side">
                        <div class="booking-short-side">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="bookinDet">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#bookinSer" aria-expanded="true" aria-controls="bookinSer">
                                          @lang('Package Summary')
                                        </button>
                                      </h2>
                                    </div>

                                    <div id="bookinSer" class="collapse show" aria-labelledby="bookinDet" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="booking-detail-list">
                                                <li>@lang('Membership')<span>{{ strtoupper($data->title) }}</span></li>
                                                <li>@lang('Start Date')<span>{{ now()->format('d-m-Y') }}</span></li>
                                                <li>@lang('Expiry Date')<span>{{ now()->addDays($data->post_duration)->format('d-m-Y') }}</span></li>
                                                <li>@lang('Ad Limit')<span>{{ $data->post_limit }}</span></li>
                                                <li><strong>@lang('Total Cost')</strong><span>{{ showNameAmount($data->price) }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Agency List End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')
<script src="https://js.paystack.co/v1/inline.js"></script>

<script type="text/javascript">
    'use strict';

    $(document).on('change','#subscriptionMethod',function(){
        var val = $(this).val();

        if(val == 'stripe')
        {
            $('#subscription-form').prop('action','{{ route('subscription.stripe.submit') }}');
            $('#card-view').removeClass('d-none');
            $('.card-elements').prop('required',true);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

        if(val == 'paypal') {
            $('#subscription-form').prop('action','{{ route('subscription.paypal.submit') }}');
            $('#card-view').addClass('d-none');
            $('.card-elements').prop('required',false);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

        if(val == 'paytm') {
            $('#subscription-form').prop('action','{{ route('subscription.paytm.submit') }}');
            $('#card-view').addClass('d-none');
            $('.card-elements').prop('required',false);
            $('#manual_transaction_id').prop('required',false);

            $('.manual-payment').addClass('d-none');
        }

        if(val == 'instamojo') {
            $('#subscription-form').prop('action','{{ route('subscription.instamojo.submit') }}');
            $('#card-view').addClass('d-none');
            $('.card-elements').prop('required',false);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

        if(val == 'razorpay') {
            $('#subscription-form').prop('action','{{ route('subscription.razorpay.submit') }}');
            $('#card-view').addClass('d-none');
            $('.card-elements').prop('required',false);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

        if(val == 'mollie') {
            $('#subscription-form').prop('action','{{ route('subscription.molly.submit') }}');
            $('#card-view').addClass('d-none');
            $('.card-elements').prop('required',false);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

        if(val == 'flutterwave') {
            $('#subscription-form').prop('action','{{ route('subscription.flutter.submit') }}');
            $('#card-view').addClass('d-none');
            $('.card-elements').prop('required',false);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

        if(val == 'authorize.net')
        {
            $('#subscription-form').prop('action','{{ route('subscription.authorize.submit') }}');
            $('#card-view').removeClass('d-none');
            $('.card-elements').prop('required',true);
            $('#manual_transaction_id').prop('required',false);
            $('.manual-payment').addClass('d-none');
        }

    });

    $(document).on('submit','.step1-form',function(){
        var val = $('#sub').val();
        var total = $('#amount').val();
        var paystackInfo = $('#paystackInfo').val();
        var curr = $('#currencyCode').val();
        total = Math.round(total);
            if(val == 0)
            {
            var handler = PaystackPop.setup({
            key: paystackInfo,
            email: $('input[name=email]').val(),
            amount: total * 100,
            currency: curr,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){
                $('#ref_id').val(response.reference);
                $('#sub').val('1');
                $('#final-btn').click();
            },
            onClose: function(){
                window.location.reload();
            }
            });
            handler.openIframe();
                return false;
            }
            else {
            $('#preloader').show();
                return true;
            }
    });
</script>

<script src="//voguepay.com/js/voguepay.js"></script>

<script type="text/javascript" src="{{ asset('assets/front/js/payvalid.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/paymin.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/payform.js') }}"></script>


<script type="text/javascript">
  'use strict';

    var cnstatus = false;
    var dateStatus = false;
    var cvcStatus = false;

    function validateCard(cn) {
    cnstatus = Stripe.card.validateCardNumber(cn);
    if (!cnstatus) {
        $("#errCard").html('Card number not valid<br>');
    } else {
        $("#errCard").html('');
    }
    btnStatusChange();


    }

    function validateCVC(cvc) {
    cvcStatus = Stripe.card.validateCVC(cvc);
    if (!cvcStatus) {
        $("#errCVC").html('CVC number not valid');
    } else {
        $("#errCVC").html('');
    }
    btnStatusChange();
    }

</script>
@endpush
