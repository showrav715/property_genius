<?php

use App\Http\Controllers;
use App\Http\Controllers\Crowdfunding\PaypalController as CrowdPaypalController;
use App\Http\Controllers\Deposit\AuthorizeController;
use App\Http\Controllers\Deposit\BlockIoController;
use App\Http\Controllers\Deposit\CoinpaymentController;
use App\Http\Controllers\Deposit\InstamojoController;
use App\Http\Controllers\Deposit\MollieController;
use App\Http\Controllers\Deposit\PaypalController;
use App\Http\Controllers\Deposit\PaytmController;
use App\Http\Controllers\Deposit\RazorpayController;
use App\Http\Controllers\Deposit\StripeController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\Deposit\FlutterwaveController;
use App\Http\Controllers\Deposit\ManualController;
use App\Http\Controllers\Deposit\MercadopagoController;
use App\Http\Controllers\Deposit\PayeerController;
use App\Http\Controllers\Deposit\PaystackController;
use App\Http\Controllers\Deposit\PerfectMoneyController;
use App\Http\Controllers\Deposit\SkrillController;
use App\Http\Controllers\User\ForgotController;
use App\Http\Controllers\User\KYCController;
use App\Http\Controllers\User\MessageController;
use App\Http\Controllers\User\OTPController;
use App\Http\Controllers\User\ReferralController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WithdrawController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as AppDashboardController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\Subscription\AuthorizeController as SubAuthorizeController;
use App\Http\Controllers\Subscription\FlutterwaveController as SubFlutterwaveController;
use App\Http\Controllers\Subscription\InstamojoController as SubInstamojoController;
use App\Http\Controllers\Subscription\MollieController as SubMollieController;
use App\Http\Controllers\Subscription\PaypalController as SubPaypalController;
use App\Http\Controllers\Subscription\PaytmController as SubPaytmController;
use App\Http\Controllers\Subscription\RazorpayController as SubRazorpayController;
use App\Http\Controllers\Subscription\StripeController as SubStripeController;
use App\Http\Controllers\User\InvestController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PropertyController;
use App\Http\Controllers\User\SubscriptionController;

Route::prefix('user')->group(function () {
  Route::group(['middleware' => 'maintenance'], function () {
    Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserLoginController::class, 'login'])->name('user.login.submit');

    Route::get('/forgot', [ForgotController::class, 'showforgotform'])->name('user.forgot');
    Route::post('/forgot', [ForgotController::class, 'forgot'])->name('user.forgot.submit');

    Route::get('/otp', [OTPController::class, 'showotpForm'])->name('user.otp');
    Route::post('/otp', [OTPController::class, 'otp'])->name('user.otp.submit');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('user.register.submit');
    Route::get('/register/verify/{token}', [RegisterController::class, 'token'])->name('user.register.token');

    Route::group(['middleware' => ['otp', 'banuser']], function () {

      Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
      Route::get('/username/{number}', [UserController::class, 'username'])->name('user.username');
      Route::get('/transactions', [UserController::class, 'transaction'])->name('user.transaction');

      Route::get('/2fa-security', [UserController::class, 'showTwoFactorForm'])->name('user.show2faForm');
      Route::post('/createTwoFactor', [UserController::class, 'createTwoFactor'])->name('user.createTwoFactor');
      Route::post('/disableTwoFactor', [UserController::class, 'disableTwoFactor'])->name('user.disableTwoFactor');

      Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.index');
      Route::post('/profile', [UserController::class, 'profileupdate'])->name('user.profile.update');

      Route::get('/kyc-form', [KYCController::class, 'kycform'])->name('user.kyc.form');
      Route::post('/kyc-form', [KYCController::class, 'kyc'])->name('user.kyc.submit');

      Route::post('/property/store', [PropertyController::class, 'store'])->name('user.property.store');
      Route::get('/property/success', [PropertyController::class, 'success'])->name('user.property.success');
      Route::get('/buy/rent/{slug}', [PropertyController::class, 'buyrent'])->name('user.property.buy.rent');
      Route::post('/buy/rent', [PropertyController::class, 'buyrentSubmit'])->name('user.property.buy.rent.submit');
      Route::get('/bookmark-property', [PropertyController::class, 'favorite'])->name('user.property.bookmark');
      Route::get('/bookmark-property/{id}', [PropertyController::class, 'favoriteDelete'])->name('user.bookmark.delete');
      Route::get('/property/buy-rents', [PropertyController::class, 'propertyBuyRents'])->name('user.buy.rent');
      Route::get('/buy-rents/{id}', [PropertyController::class, 'buyRentDetails'])->name('user.buy.rent.details');
      Route::get('/buy-rents/contracts/{id}', [PropertyController::class, 'contracts'])->name('user.buy.rent.contracts');
      Route::post('/contract-paper', [PropertyController::class, 'contractSubmit'])->name('user.contract.paper.submit');

      Route::post('/property/review', [PropertyController::class, 'review'])->name('user.property.review');
      Route::post('/property/enquiry', [PropertyController::class, 'enquiry'])->name('user.property.enquiry');

      Route::get('/property/checkout/{id}', [OrderController::class, 'checkout'])->name('user.property.checkout');
      Route::get('/property/crowdfunding/{slug}', [InvestController::class, 'checkout'])->name('user.crowdfunding.checkout');

      Route::get('/invest/history', [InvestController::class, 'history'])->name('user.invest.history');
      Route::get('/all-invest/property', [InvestController::class, 'property'])->name('user.all.invest.property');
      Route::post('/invest/property', [InvestController::class, 'store'])->name('user.invest.property');


      Route::group(['middleware' => 'kyc:Payouts'], function () {
        Route::get('/payout', [WithdrawController::class, 'index'])->name('user.withdraw.index');
        Route::post('/payout/request', [WithdrawController::class, 'store'])->name('user.withdraw.request');
        Route::get('/payouts/history', [WithdrawController::class, 'history'])->name('user.withdraw.history');
        Route::get('/payout/{id}', [WithdrawController::class, 'details'])->name('user.withdraw.details');
      });

      Route::group(['middleware' => 'kyc:Deposits'], function () {
        Route::get('/deposits', [DepositController::class, 'index'])->name('user.deposit.index');
        Route::get('/deposit/create', [DepositController::class, 'create'])->name('user.deposit.create');
      });

      Route::group(['middleware' => 'kyc:Deposits'], function () {
        Route::get('/referrals', [ReferralController::class, 'referred'])->name('user.referral.index');
        Route::get('/referral-commissions', [ReferralController::class, 'commissions'])->name('user.referral.commissions');
      });

      Route::get('support-tickets', [MessageController::class, 'index'])->name('user.message.index');
      Route::post('support-tickets/store', [MessageController::class, 'store'])->name('user.message.store');
      Route::post('support-tickets/conversation/{id}', [MessageController::class, 'conversation'])->name('user.message.conversation');
      Route::get('admin/message/{id}/delete', [MessageController::class, 'adminmessagedelete'])->name('user.message.delete1');

      Route::get('/change-password', [UserController::class, 'changePasswordForm'])->name('user.change.password.form');
      Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.change.password');


      Route::get('/package', [SubscriptionController::class, 'index'])->name('user.package.index');
      Route::get('/package/subscription/{id}', [SubscriptionController::class, 'subscription'])->name('user.package.subscription');

      Route::post('/deposit/stripe-submit', [StripeController::class, 'store'])->name('deposit.stripe.submit');

      Route::post('/deposit/mercadopago-submit', [MercadopagoController::class, 'store'])->name('deposit.mercadopago.submit');

      Route::post('/deposit/paystack/submit', [PaystackController::class, 'store'])->name('deposit.paystack.submit');

      Route::post('/paypal-submit', [PaypalController::class, 'store'])->name('deposit.paypal.submit');
      Route::get('/paypal/deposit/notify', [PaypalController::class, 'notify'])->name('deposit.paypal.notify');
      Route::get('/paypal/deposit/cancel', [PaypalController::class, 'cancel'])->name('deposit.paypal.cancel');

      Route::post('/deposit/skrill-submit', [SkrillController::class, 'store'])->name('deposit.skrill.submit');
      Route::any('/deposit/skrill-notify', [SkrillController::class, 'notify'])->name('deposit.skrill.notify');

      Route::post('/deposit/perfectmoney-submit', [PerfectMoneyController::class, 'store'])->name('deposit.perfectmoney.submit');
      Route::any('/deposit/perfectmoney-notify', [PerfectMoneyController::class, 'notify'])->name('deposit.perfectmoney.notify');

      Route::post('/deposit/payeer-submit', [PayeerController::class, 'store'])->name('deposit.payeer.submit');
      Route::any('/deposit/payeer-notify', [PayeerController::class, 'notify'])->name('deposit.payeer.notify');

      Route::post('/instamojo-submit', [InstamojoController::class, 'store'])->name('deposit.instamojo.submit');
      Route::get('/instamojo-notify', [InstamojoController::class, 'notify'])->name('deposit.instamojo.notify');

      Route::post('/deposit/paytm-submit', [PaytmController::class, 'store'])->name('deposit.paytm.submit');
      Route::post('/deposit/paytm-callback', [PaytmController::class, 'paytmCallback'])->name('deposit.paytm.notify');

      Route::post('/deposit/razorpay-submit', [RazorpayController::class, 'store'])->name('deposit.razorpay.submit');
      Route::post('/deposit/razorpay-notify', [RazorpayController::class, 'notify'])->name('deposit.razorpay.notify');

      Route::post('/deposit/molly-submit', [MollieController::class, 'store'])->name('deposit.molly.submit');
      Route::get('/deposit/molly-notify', [MollieController::class, 'notify'])->name('deposit.molly.notify');

      Route::post('/deposit/flutter/submit', [FlutterwaveController::class, 'store'])->name('deposit.flutter.submit');
      Route::post('/deposit/flutter/notify', [FlutterwaveController::class, 'notify'])->name('deposit.flutter.notify');

      Route::post('/authorize-submit', [AuthorizeController::class, 'store'])->name('deposit.authorize.submit');
      Route::post('/deposit/manual-submit', [ManualController::class, 'store'])->name('deposit.manual.submit');

      Route::post('/deposit/coinpayment-submit', [CoinpaymentController::class, 'deposit'])->name('deposit.coinpay.submit');
      Route::post('/deposit/coinpayment/notify', [CoinpaymentController::class, 'coincallback'])->name('deposit.coinpay.notify');
      Route::get('/deposit/coinpayment', [CoinpaymentController::class, 'blockInvest'])->name('deposit.coinpay.invest');

      Route::post('/deposit/blockio-submit', [BlockIoController::class, 'deposit'])->name('deposit.blockio.submit');
      Route::post('/deposit/blockio/notify', [BlockIoController::class, 'blockiocallback'])->name('deposit.blockio.notify');
      Route::get('/deposit/blockio', [BlockIoController::class, 'blockioDeposit'])->name('blockio.deposit');

      Route::post('/subscription/stripe-submit', [SubStripeController::class, 'store'])->name('subscription.stripe.submit');
      Route::post('/subscription/free', [SubscriptionController::class, 'store'])->name('subscription.free.submit');

      Route::post('/subscription/paypal-submit', [SubPaypalController::class, 'store'])->name('subscription.paypal.submit');
      Route::get('/subscription/paypal/deposit/notify', [SubPaypalController::class, 'notify'])->name('subscription.paypal.notify');
      Route::get('/subscription/paypal/deposit/cancel', [SubPaypalController::class, 'cancel'])->name('subscription.paypal.cancel');

      Route::post('/subscription/instamojo-submit', [SubInstamojoController::class, 'store'])->name('subscription.instamojo.submit');
      Route::get('/subscription/instamojo-notify', [SubInstamojoController::class, 'notify'])->name('subscription.instamojo.notify');

      Route::post('/subscription/paytm-submit', [SubPaytmController::class, 'store'])->name('subscription.paytm.submit');
      Route::post('/subscription/paytm-callback', [SubPaytmController::class, 'paytmCallback'])->name('subscription.paytm.notify');

      Route::post('/subscription/razorpay-submit', [SubRazorpayController::class, 'store'])->name('subscription.razorpay.submit');
      Route::post('/subscription/razorpay-notify', [SubRazorpayController::class, 'notify'])->name('subscription.razorpay.notify');

      Route::post('/subscription/molly-submit', [SubMollieController::class, 'store'])->name('subscription.molly.submit');
      Route::get('/subscription/molly-notify', [SubMollieController::class, 'notify'])->name('subscription.molly.notify');

      Route::post('/subscription/flutter/submit', [SubFlutterwaveController::class, 'store'])->name('subscription.flutter.submit');
      Route::post('/subscription/flutter/notify', [SubFlutterwaveController::class, 'notify'])->name('subscription.flutter.notify');

      Route::post('/subscription/authorize-submit', [SubAuthorizeController::class, 'store'])->name('subscription.authorize.submit');

      Route::post('/crowdfunding/paypal-submit', [CrowdPaypalController::class, 'store'])->name('crowdfunding.paypal.submit');
      Route::get('/crowdfunding/paypal/deposit/notify', [CrowdPaypalController::class, 'notify'])->name('crowdfunding.paypal.notify');
      Route::get('/crowdfunding/paypal/deposit/cancel', [CrowdPaypalController::class, 'cancel'])->name('crowdfunding.paypal.cancel');


      Route::get('/affilate/code', [UserController::class, 'affilate_code'])->name('user-affilate-code');


      Route::get('/notf/show', 'User\NotificationController@user_notf_show')->name('customer-notf-show');
      Route::get('/notf/count', 'User\NotificationController@user_notf_count')->name('customer-notf-count');
      Route::get('/notf/clear', 'User\NotificationController@user_notf_clear')->name('customer-notf-clear');
    });

    Route::get('/logout', [UserLoginController::class, 'logout'])->name('user.logout');
  });
});
