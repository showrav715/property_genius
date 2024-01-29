@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">@lang('Checkout')!</h2>
                    <span class="ipn-subtitle">@lang('Please pay now')</span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ User Dashboard ================================== -->
    <section class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="filter_search_opt">
                        <a href="javascript:void(0);" onclick="openFilterSearch()">Dashboard Navigation<i class="ml-2 ti-menu"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-12">
                    @include('partials.user.sidebar')
                </div>

                <div class="col-lg-9 col-md-12">
                    <div class="dashboard-wraper">
                        <form id="" method="POST" class="payment-form" action="">
                            @csrf

                            <div class="row gy-3 gy-md-4">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="form-label required">{{__('User Email')}}</label>
                                  <input name="email" id="accountemail" class="form-control @error('email') is-invalid @enderror" autocomplete="off" placeholder="{{__('doe@gmail.com')}}" type="email" value="{{ auth()->user()->email }}" readonly>
                                  @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                  @enderror

                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="form-label required">{{__('User Name')}}</label>
                                  <input name="name" id="account_name" class="form-control @error('name') is-invalid @enderror" autocomplete="off" placeholder="{{__('Jhon Doe')}}" type="text" value="{{ auth()->user()->name }}" readonly>
                                  @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12">
                                  <div id="card-view" class="col-md-12 d-none">
                                      <div class="row gy-3">
                                          <input type="hidden" name="cmd" value="_xclick">
                                          <input type="hidden" name="no_note" value="1">
                                          <input type="hidden" name="lc" value="UK">
                                          <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">

                                          <div class="col-md-6">
                                            <input type="text" class="form-control card-elements" name="cardNumber" placeholder="{{ __('Card Number') }}" autocomplete="off" required autofocus oninput="validateCard(this.value);"/>
                                            <span id="errCard"></span>
                                          </div>

                                          <div class="col-lg-6 cardRow">
                                            <input type="text" class="form-control card-elements" placeholder="{{ ('Card CVC') }}" name="cardCVC" oninput="validateCVC(this.value);">
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
                              </div>

                            <div class="col-sm-12">
                              <div id="mergado-view" class="col-md-12 d-none">
                                  <div class="row gy-3">
                                      <div class="row gy-3">
                                          <div class="col-md-6">
                                              <input class="form-control mergado-elements" type="text" placeholder="{{ __('Credit Card Number') }}" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" autocomplete="off" />
                                          </div>

                                          <div class="col-md-6">
                                              <input class="form-control mergado-elements" type="text" id="securityCode" data-checkout="securityCode" placeholder="{{ __('Security Code') }}" onselectstart="return false" autocomplete="off" />
                                          </div>

                                          <div class="col-md-6">
                                              <input class="form-control mergado-elements" type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="{{ __('Expiration Month') }}" autocomplete="off" />
                                          </div>

                                          <div class="col-md-6">
                                              <input class="form-control mergado-elements" type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="{{ __('Expiration Year') }}" autocomplete="off" />
                                          </div>

                                          <div class="col-md-6">
                                              <input class="form-control mergado-elements" type="text" id="cardholderName" data-checkout="cardholderName" placeholder="{{ __('Card Holder Name') }}" />
                                          </div>

                                          <div class="col-md-6">
                                              <select class="form-control mergado-elements col-lg-9 pl-0" id="docType" data-checkout="docType" required></select>
                                          </div>

                                          <div class="col-md-6">
                                              <input class="form-control mergado-elements" type="text" id="docNumber" data-checkout="docNumber" placeholder="{{ __('Document Number') }}" />
                                          </div>
                                      </div>

                                      <input type="hidden" id="installments" value="1" />
                                      <input type="hidden" name="description" />
                                      <input type="hidden" name="paymentMethodId" />
                                  </div>
                              </div>
                            </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label class="form-label required">{{__('Amount')}}</label>
                                  <input name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" autocomplete="off" placeholder="{{__('0.0')}}" type="number" value="{{ $amount }}" min="1" readonly>
                                  @error('amount')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                  @enderror
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <label class="form-label required">{{__('Payment Method')}}</label>
                                <select id="method" name="method" required class="form-control @error('method') is-invalid @enderror">
                                    <option value="">{{ __('Select Payment Method') }}</option>
                                    @foreach ($gateways as $gateway)
                                        @if (in_array($gateway->keyword,$availableGatways))
                                            <option value="{{$gateway->keyword}}">{{ $gateway->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('method')
                                  <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                              </div>

                              <div class="col-sm-12 mt-4 manual-payment d-none">
                                <div class="card default--card">
                                  <div class="card-body">
                                    <div class="row">

                                      <div class="col-sm-12 pb-2 manual-payment-details">
                                      </div>

                                      <div class="col-sm-12">
                                        <label class="form-label required">@lang('Transaction ID')#</label>
                                        <input class="form-control" name="txn_id4" type="text" placeholder="Transaction ID" id="manual_transaction_id">
                                      </div>

                                    </div>
                                  </div>
                                </div>
                            </div>


                              <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                              <input type="hidden" name="buy_rent_id" value="{{ $data->id }}">
                              <input type="hidden" name="currency_sign" value="{{ $defaultCurrency->sign }}">
                              <input type="hidden" id="currencyCode" name="currency_code" value="{{ $defaultCurrency->name }}">
                              <input type="hidden" name="currency_id" value="{{ $defaultCurrency->id }}">
                              {{-- <input type="hidden" name="paystackInfo" id="paystackInfo" value="{{ $paystackKey }}"> --}}

                              <div class="col-sm-12">
                                <label class="form-label d-none d-sm-block">&nbsp;</label>
                                <button class="btn btn-theme-light-2 rounded" type="submit">@lang('Submit')</button>

                              </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ User Dashboard End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->
@endsection

@push('js')
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
<script type="text/javascript">
  'use strict';

  $(document).on('change','#method',function(){
      var val = $(this).val();

      if(val == 'stripe')
      {
        $('.payment-form').prop('action','{{ route('checkout.stripe.submit') }}');
        $('#card-view').removeClass('d-none');
        $('.card-elements').prop('required',true);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'skrill'){
        $('.payment-form').prop('action','{{ route('checkout.skrill.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'payeer'){
        $('.payment-form').prop('action','{{ route('checkout.payeer.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'mercadopago')
      {

        $('.payment-form').prop('action','{{ route('checkout.mercadopago.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').removeClass('d-none');
        $('.mergado-elements').prop('required',true);
        $('.payment-form').prop('id','mercadopago');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');



      }

      if(val == 'authorize.net')
      {
        $('.payment-form').prop('action','{{ route('checkout.authorize.submit') }}');
        $('#card-view').removeClass('d-none');
        $('.card-elements').prop('required',true);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'paypal') {
        $('.payment-form').prop('action','{{ route('checkout.paypal.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'perfectmoney') {
        $('.payment-form').prop('action','{{ route('checkout.perfectmoney.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'mollie') {
        $('.payment-form').prop('action','{{ route('checkout.molly.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'flutterwave') {
        $('.payment-form').prop('action','{{ route('checkout.flutter.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }


      if(val == 'paytm') {
        $('.payment-form').prop('action','{{ route('checkout.paytm.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'instamojo') {
        $('.payment-form').prop('action','{{ route('checkout.instamojo.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'paystack') {
        $('.payment-form').prop('action','{{ route('checkout.paystack.submit') }}');
		$('.payment-form').prop('id','step1-form');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
    }

      if(val == 'coinpayment') {
        $('.payment-form').prop('action','{{ route('checkout.coinpay.submit') }}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'coingate') {
        $('.payment-form').prop('action','{{route('checkout.coingate.submit')}}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('#mergado-view').addClass('d-none');
        $('.mergado-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
      }

      if(val == 'razorpay') {
          $('.payment-form').prop('action','{{ route('checkout.razorpay.submit') }}');
          $('#card-view').addClass('d-none');
          $('.card-elements').prop('required',false);
          $('#mergado-view').addClass('d-none');
          $('.mergado-elements').prop('required',false);
          $('.payment-form').prop('id','');
          $('#manual_transaction_id').prop('required',false);
          $('.manual-payment').addClass('d-none');
      }

      if(val == 'block.io.btc' || val == 'block.io.ltc' || val == 'block.io.dgc') {
        $('.payment-form').prop('action','{{route('checkout.blockio.submit')}}');
        $('#card-view').addClass('d-none');
        $('.card-elements').prop('required',false);
        $('.payment-form').prop('id','');
        $('#manual_transaction_id').prop('required',false);
        $('.manual-payment').addClass('d-none');
    }

      if(val == 'Manual'){
      $('.payment-form').prop('action','{{route('checkout.manual.submit')}}');
      $('.manual-payment').removeClass('d-none');
      $('#card-view').addClass('d-none');
      $('.card-elements').prop('required',false);
      $('#mergado-view').addClass('d-none');
      $('.mergado-elements').prop('required',false);
      $('.payment-form').prop('id','');
      $('#manual_transaction_id').prop('required',true);
      const details = $(this).find(':selected').data('details');
      $('.manual-payment-details').empty();
      $('.manual-payment-details').append(`<font size="3">${details}</font>`)
    }
  });

  </script>



  <script>
     closedFunction=function() {
          alert('Payment Cancelled!');
      }

      successFunction=function(transaction_id) {
          window.location.href = '{{ url('order/payment/return') }}?txn_id=' + transaction_id;
      }

      failedFunction=function(transaction_id) {
          alert('Transaction was not successful, Ref: '+transaction_id)
      }
  </script>

  <script>
      'use strict';

    $(document).on('submit','#step1-form',function(e){
      e.preventDefault();

        var total = parseFloat( $('#amount').val());
        var paystackInfo = $("#paystackInfo").val();
        var curr = $('#currencyCode').val();

        total = Math.round(total);

            var handler = PaystackPop.setup({
              key: paystackInfo,
              email: $('input[name=email]').val(),
              amount: total * 100,
              currency: curr,
              ref: ''+Math.floor((Math.random() * 1000000000) + 1),
              callback: function(response){
                $('#ref_id').val(response.reference);
                $('#step1-form').prop('id','');
                $('.payment-form').submit();
              },
              onClose: function(){
                window.location.reload();
              }
            });
            handler.openIframe();
                return false;


    });
  </script>



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



<script type="text/javascript">
	'use strict';

	$('.countdown').each(function(){
		var date = $(this).data('date');
		var countDownDate = new Date(date).getTime();
		var $this = $(this);
		var x = setInterval(function() {
		  var now = new Date().getTime();
		  var distance = countDownDate - now;

		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  var text = days + "d " + hours + "h "
		  + minutes + "m " + seconds + "s ";
		  $this.html(text);

		  if (distance < 0) {
		    clearInterval(x);
		   var text = 0 + "d " + 0 + "h "
		  + 0 + "m " + 0 + "s ";
		  $this.html(text);
		  }
		}, 1000);
	});

</script>

<script type="text/javascript" src="{{ asset('assets/front/js/payvalid.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/paymin.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/payform.js') }}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
        window.Mercadopago.setPublishableKey("{{ $mercadoKey }}");
        window.Mercadopago.getIdentificationTypes();

        $(document).on('change','#method',function(){
            let method = $(this).val();

            if(method == 'mercadopago'){


        function addEvent(to, type, fn){
            if(document.addEventListener){
                to.addEventListener(type, fn, false);
            } else if(document.attachEvent){
                to.attachEvent('on'+type, fn);
            } else {
                to['on'+type] = fn;
            }
        };

        addEvent(document.querySelector('#cardNumber'), 'keyup', guessingPaymentMethod);
        addEvent(document.querySelector('#cardNumber'), 'change', guessingPaymentMethod);

        function getBin() {
            var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
            return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
        };

        function guessingPaymentMethod(event) {
            var bin = getBin();

            if (event.type == "keyup") {
                if (bin.length >= 6) {
                    window.Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            } else {
                setTimeout(function() {
                    if (bin.length >= 6) {
                        window.Mercadopago.getPaymentMethod({
                            "bin": bin
                        }, setPaymentMethodInfo);
                    }
                }, 100);
            }
        };

        function setPaymentMethodInfo(status, response) {
            if (status == 200) {
                const paymentMethodElement = document.querySelector('input[name=paymentMethodId]');

                if (paymentMethodElement) {
                    paymentMethodElement.value = response[0].id;
                } else {
                    const input = document.createElement('input');
                    input.setAttribute('name', 'paymentMethodId');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('value', response[0].id);

                    form.appendChild(input);
                }

                Mercadopago.getInstallments({
                    "bin": getBin(),
                    "amount": parseFloat(document.querySelector('#amount').value),
                }, setInstallmentInfo);

            } else {
                alert(`payment method info error: ${response}`);
            }
        };

        addEvent(document.querySelector('#mercadopago'), 'submit', function doPay(event){
                event.preventDefault();
                let isMethod = $('#method').val();
                    if(isMethod == 'mercadopago'){
                        var $form = document.querySelector('#mercadopago');
                        window.Mercadopago.createToken($form, sdkResponseHandler);
                        return false;
                    }
            });
            }

        })

        function sdkResponseHandler(status, response) {
            if (status != 200 && status != 201) {
                alert("Some of your information is wrong!");
                $('#preloader').hide();

            }else{
                var form = document.querySelector('#mercadopago');
                var card = document.createElement('input');
                card.setAttribute('name', 'token');
                card.setAttribute('type', 'hidden');
                card.setAttribute('value', response.id);
                form.appendChild(card);
                doSubmit=true;
                form.submit();
            }
        };


        function setInstallmentInfo(status, response) {
            var selectorInstallments = document.querySelector("#installments"),
            fragment = document.createDocumentFragment();
            selectorInstallments.length = 0;

            if (response.length > 0) {
                var option = new Option("Escolha...", '-1'),
                payerCosts = response[0].payer_costs;
                fragment.appendChild(option);

                for (var i = 0; i < payerCosts.length; i++) {
                    fragment.appendChild(new Option(payerCosts[i].recommended_message, payerCosts[i].installments));
                }

                selectorInstallments.appendChild(fragment);
                selectorInstallments.removeAttribute('disabled');
            }
        };
</script>
@endpush
