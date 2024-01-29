<?php
use App\Http\Controllers;
use App\Http\Controllers\Checkout\AuthorizeController;
use App\Http\Controllers\Checkout\BlockIoController;
use App\Http\Controllers\Checkout\CoinGateController;
use App\Http\Controllers\Checkout\CoinPaymentController;
use App\Http\Controllers\Checkout\FlutterwaveController;
use App\Http\Controllers\Checkout\InstamojoController;
use App\Http\Controllers\Checkout\ManualController;
use App\Http\Controllers\Checkout\MercadopagoController;
use App\Http\Controllers\Checkout\MollieController;
use App\Http\Controllers\Checkout\PayeerController;
use App\Http\Controllers\Checkout\PaypalController;
use App\Http\Controllers\Checkout\PaystackController;
use App\Http\Controllers\Checkout\PaytmController;
use App\Http\Controllers\Checkout\PerfectMoneyController;
use App\Http\Controllers\Checkout\RazorpayController;
use App\Http\Controllers\Checkout\SkrillController;
use App\Http\Controllers\Checkout\StripeController;
use Illuminate\Support\Facades\Route;


Route::post('/stripe-submit', [StripeController::class,'store'])->name('checkout.stripe.submit');
Route::post('/manual-submit', [ManualController::class,'store'])->name('checkout.manual.submit');

Route::post('/authorize-submit', [AuthorizeController::class,'store'])->name('checkout.authorize.submit');

Route::post('/paystack/submit', [PaystackController::class,'store'])->name('checkout.paystack.submit');

Route::post('/mercadopago-submit', [MercadopagoController::class,'store'])->name('checkout.mercadopago.submit');

Route::post('/perfectmoney-submit', [PerfectMoneyController::class,'store'])->name('checkout.perfectmoney.submit');
Route::any('/perfectmoney-notify', [PerfectMoneyController::class,'notify'])->name('checkout.perfectmoney.notify');

Route::post('/payeer-submit', [PayeerController::class,'store'])->name('checkout.payeer.submit');
Route::any('/payeer-notify', [PayeerController::class,'notify'])->name('checkout.payeer.notify');

Route::post('/skrill-submit', [SkrillController::class,'store'])->name('checkout.skrill.submit');
Route::any('/skrill-notify', [SkrillController::class,'notify'])->name('checkout.skrill.notify');

Route::post('/molly-submit', [MollieController::class,'store'])->name('checkout.molly.submit');
Route::get('/molly-notify', [MollieController::class,'store'])->name('checkout.molly.notify');

Route::post('/paypal-submit', [PaypalController::class,'store'])->name('checkout.paypal.submit');
Route::get('/paypal/notify', [PaypalController::class,'notify'])->name('checkout.paypal.notify');
Route::get('/paypal/cancle', [PaypalController::class,'cancel'])->name('checkout.paypal.cancel');

Route::post('/razorpay-submit', [RazorpayController::class,'store'])->name('checkout.razorpay.submit');
Route::post('/razorpay-notify', [RazorpayController::class,'notify'])->name('checkout.razorpay.notify');

Route::post('/paytm-submit', [PaytmController::class,'store'])->name('checkout.paytm.submit');
Route::post('/paytm-callback', [PaytmController::class,'paytmCallback'])->name('checkout.paytm.notify');

Route::post('/instamojo-submit', [InstamojoController::class,'store'])->name('checkout.instamojo.submit');
Route::get('/instamojo-callback', [InstamojoController::class,'notify'])->name('checkout.instamojo.notify');
Route::get('/instamojo/cancle', [InstamojoController::class,'cancel'])->name('checkout.instamojo.cancel');

Route::post('/flutter/submit', [FlutterwaveController::class,'store'])->name('checkout.flutter.submit');
Route::post('/flutter/notify', [FlutterwaveController::class,'notify'])->name('checkout.flutter.notify');

Route::post('/coinpay-submit', [CoinPaymentController::class,'deposit'])->name('checkout.coinpay.submit');
Route::post('/coinpay/notify', [CoinPaymentController::class,'coincallback'])->name('checkout.coinpay.notify');
Route::get('/invest/coinpay', [CoinPaymentController::class,'blockInvest'])->name('checkout.coinpay.invest');

Route::post('/coingate-submit', [CoinGateController::class,'deposit'])->name('checkout.coingate.submit');
Route::post('/coingate/notify', [CoinGateController::class,'coingetCallback'])->name('checkout.coingate.notify');

Route::post('/blockio-submit', [BlockIoController::class,'deposit'])->name('checkout.blockio.submit');
Route::post('/blockio/notify', [BlockIoController::class,'blockiocallback'])->name('checkout.blockio.notify');
Route::get('/invest/blockio', [BlockIoController::class,'blockioInvest'])->name('blockio.invest');
