<?php
use App\Http\Controllers;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InvestController;
use App\Http\Controllers\Frontend\PropertyController;
use Illuminate\Support\Facades\Route;

  Route::redirect('admin', 'admin/login');
  Route::post('the/genius/ocean/2441139', 'Frontend\FrontendController@subscription');
  Route::get('finalize', 'Frontend\FrontendController@finalize');

  Route::get('/under-maintenance', 'Frontend\FrontendController@maintenance')->name('front-maintenance');
  Route::group(['middleware'=>'maintenance'],function(){
    Route::get('/', [FrontendController::class,'index'])->name('front.index');

    Route::get('/listing', [PropertyController::class,'listing'])->name('front.listing');
    Route::get('/property/{slug}', [PropertyController::class,'propertyDetails'])->name('front.property.details');
    Route::get('/property-create', [PropertyController::class,'create'])->name('front.property.create');
    Route::post('/property/wishlist', [PropertyController::class,'wishlist'])->name('front.property.wishlist');
    Route::get('/agents', [PropertyController::class,'agents'])->name('front.agents');
    Route::get('/agents/{username}', [PropertyController::class,'agentDetails'])->name('front.agent.details');

    Route::get('/invest-properties', [InvestController::class,'invests'])->name('front.invests');
    Route::get('/become/agent', [FrontendController::class,'becomeAgent'])->name('front.become.agent');

    Route::get('blogs', [FrontendController::class,'blog'])->name('front.blog');
    Route::get('blog/{slug}', [FrontendController::class,'blogdetails'])->name('blog.details');
    Route::get('/blog-search', [FrontendController::class,'blogsearch'])->name('front.blogsearch');
    Route::get('/blog/category/{slug}', [FrontendController::class,'blogcategory'])->name('front.blogcategory');
    Route::get('/blog/tag/{slug}', [FrontendController::class,'blogtags'])->name('front.blogtags');
    Route::get('/blog/archive/{slug}', [FrontendController::class,'blogarchive'])->name('front.blogarchive');

    Route::get('/plans', [FrontendController::class,'plans'])->name('front.plans');

    Route::get('/contact', [FrontendController::class,'contact'])->name('front.contact');
    Route::post('/contact', [FrontendController::class,'contactemail'])->name('front.contact.submit');
    Route::get('/faq', [FrontendController::class,'faq'])->name('front.faq');
    Route::get('/{slug}', [FrontendController::class,'page'])->name('front.page');
    Route::post('/subscriber', [FrontendController::class,'subscriber'])->name('front.subscriber');

    Route::get('/currency/{id}', [FrontendController::class,'currency'])->name('front.currency');
    Route::get('/language/{id}', [FrontendController::class,'language'])->name('front.language');

    Route::get('/signup-session/flus', [FrontendController::class,'signupSession'])->name('front.signup.session');

});
Route::get('/profit/send', [FrontendController::class,'profitSend'])->name('front.profit.send');

