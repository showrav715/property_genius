<?php

use App\Http\Controllers;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AgentVerificationController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeOptionController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepositController as AppDepositController;
use App\Http\Controllers\Admin\DynamicFormController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FloorPlanController;
use App\Http\Controllers\Admin\FontController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\InvestController;
use App\Http\Controllers\Admin\InvestPropertyController;
use App\Http\Controllers\Admin\KycManageController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageCountryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PageSettingController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PropertyContractController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyEnquiryController;
use App\Http\Controllers\Admin\PropertyReviewController;
use App\Http\Controllers\Admin\ReferralController as AdminReferralController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeoToolController;
use App\Http\Controllers\Admin\SocialSettingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\SMSController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawMethodController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function(){

    Route::get('/cache/clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.dashboard')->with('cache','System Cache Has Been Removed.');
    })->name('admin.cache.clear');

      Route::get('/login', [LoginController::class,'showLoginForm'])->name('admin.login');
      Route::post('/login', [LoginController::class,'login'])->name('admin.login.submit');
      Route::get('/forgot', [LoginController::class,'showForgotForm'])->name('admin.forgot');
      Route::post('/forgot-submit', [LoginController::class,'forgot'])->name('admin.forgot.submit');
      Route::get('/change-password/{token}', [LoginController::class,'showChangePassForm'])->name('admin.change.token');
      Route::post('/change-password', [LoginController::class,'changepass'])->name('admin.change.password');
      Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');

      Route::get('/profile', [DashboardController::class,'profile'])->name('admin.profile');
      Route::post('/profile/update', [DashboardController::class,'profileupdate'])->name('admin.profile.update');

      Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
      Route::get('/password', [DashboardController::class,'passwordreset'])->name('admin.password');
      Route::post('/password/update', [DashboardController::class,'changepass'])->name('admin.password.update');

      Route::group(['middleware'=>'permissions:Menu Builder'],function(){
        Route::get('/menu-builder', [GeneralSettingController::class,'menubuilder'])->name('admin.gs.menubuilder');
      });

      Route::get('/referrals',[AdminReferralController::class,'index'])->name('admin.referral.index');
      Route::post('/referral-level',[AdminReferralController::class,'store'])->name('admin.referral.store');

      Route::get('/invests/datatables', [InvestController::class,'datatables'])->name('admin.invests.datatables');
      Route::get('/invests', [InvestController::class,'index'])->name('admin.invests.index');
      Route::get('/invests/status/{id1}/{id2}', [InvestController::class,'status'])->name('admin.invests.status');
      Route::get('/invests/{id}/show', [InvestController::class,'investdetails'])->name('admin.invests.show');

      Route::get('/invest/properties/datatables', [InvestPropertyController::class,'datatables'])->name('admin.invest.properties.datatables');
      Route::get('/invest/properties', [InvestPropertyController::class,'index'])->name('admin.invest.properties.index');
      Route::get('/invest/properties/create', [InvestPropertyController::class,'create'])->name('admin.invest.properties.create');
      Route::get('/invest/properties/edit/{id}', [InvestPropertyController::class,'edit'])->name('admin.invest.properties.edit');
      Route::post('/invest/properties/store', [InvestPropertyController::class,'store'])->name('admin.invest.properties.store');
      Route::get('/invest/properties/status/{id1}/{id2}', [InvestPropertyController::class,'status'])->name('admin.invest.properties.status');
      Route::post('/invest/properties/update/{id}', [InvestPropertyController::class,'update'])->name('admin.invest.properties.update');
      Route::get('/invest/properties/delete/{id}', [InvestPropertyController::class,'destroy'])->name('admin.invest.properties.delete');

      Route::get('/properties/datatables', [PropertyController::class,'datatables'])->name('admin.properties.datatables');
      Route::get('/properties', [PropertyController::class,'index'])->name('admin.properties.index');
      Route::get('/properties/create', [PropertyController::class,'create'])->name('admin.properties.create');
      Route::get('/properties/edit/{id}', [PropertyController::class,'edit'])->name('admin.properties.edit');
      Route::post('/properties/store', [PropertyController::class,'store'])->name('admin.properties.store');
      Route::get('/properties/status/{id1}/{id2}', [PropertyController::class,'status'])->name('admin.properties.status');
      Route::post('/properties/update/{id}', [PropertyController::class,'update'])->name('admin.properties.update');
      Route::get('/properties/delete/{id}', [PropertyController::class,'destroy'])->name('admin.properties.delete');
      Route::get('/properties/bulk-delete', [PropertyController::class,'bulkdelete'])->name('admin.properties.bulk.delete');

      Route::get('/contracts/datatables/{type}', [PropertyContractController::class,'datatables'])->name('admin.property.contracts.datatables');
      Route::get('/property-contracts/rents', [PropertyContractController::class,'rents'])->name('admin.property.contracts.rents');
      Route::get('/property-contracts/sells', [PropertyContractController::class,'sells'])->name('admin.property.contracts.sells');
      Route::get('/property-contracts/{slug}', [PropertyContractController::class,'details'])->name('admin.property.contracts.details');
      Route::get('/contract-paper/{id}', [PropertyContractController::class,'contractPaper'])->name('admin.property.contract.paper');
      Route::get('/property-contracts/status/{id1}/{id2}', [PropertyContractController::class,'status'])->name('admin.property.contracts.status');
      Route::get('/property-phase/status/{id1}/{id2}', [PropertyContractController::class,'phase'])->name('admin.property.contracts.phase');

      Route::get('/property/orders/datatables', [OrderController::class,'datatables'])->name('admin.property.order.datatables');
      Route::get('/property/order', [OrderController::class,'index'])->name('admin.property.order.index');

      Route::get('/gallery/show', [GalleryController::class,'show'])->name('admin.gallery.show');
      Route::post('/gallery/store', [GalleryController::class,'store'])->name('admin.gallery.store');
      Route::get('/gallery/delete', [GalleryController::class,'destroy'])->name('admin.gallery.delete');

      Route::get('/floor-plan/datatables/{pid}', [FloorPlanController::class,'datatables'])->name('admin.floor.plan.datatables');
      Route::get('/floor-plan/{pid}', [FloorPlanController::class,'index'])->name('admin.floor.plan.index');
      Route::get('/floor-plan/create/{pid}', [FloorPlanController::class,'create'])->name('admin.floor.plan.create');
      Route::get('/floor-plan/edit/{id}/{pid}', [FloorPlanController::class,'edit'])->name('admin.floor.plan.edit');
      Route::post('/floor-plan/store/{pid}', [FloorPlanController::class,'store'])->name('admin.floor.plan.store');
      Route::post('/floor-plan/update/{id}/{pid}', [FloorPlanController::class,'update'])->name('admin.floor.plan.update');
      Route::get('/floor-plan/delete/{id}/{pid}', [FloorPlanController::class,'destroy'])->name('admin.floor.plan.delete');

      Route::get('/locations/datatables', [LocationController::class,'datatables'])->name('admin.locations.datatables');
      Route::get('/locations', [LocationController::class,'index'])->name('admin.locations.index');
      Route::get('/locations/create', [LocationController::class,'create'])->name('admin.locations.create');
      Route::get('/locations/edit/{id}', [LocationController::class,'edit'])->name('admin.locations.edit');
      Route::post('/locations/store', [LocationController::class,'store'])->name('admin.locations.store');
      Route::get('/locations/status/{id1}/{id2}', [LocationController::class,'status'])->name('admin.locations.status');
      Route::post('/locations/update/{id}', [LocationController::class,'update'])->name('admin.locations.update');
      Route::get('/locations/delete/{id}', [LocationController::class,'destroy'])->name('admin.locations.delete');
      Route::get('/locations/bulk-delete', [LocationController::class,'bulkdelete'])->name('admin.locations.bulk.delete');

      Route::get('/attributes/datatables', [AttributeController::class,'datatables'])->name('admin.attributes.datatables');
      Route::get('/attributes', [AttributeController::class,'index'])->name('admin.attributes.index');
      Route::get('/attributes/create', [AttributeController::class,'create'])->name('admin.attributes.create');
      Route::get('/attributes/edit/{id}', [AttributeController::class,'edit'])->name('admin.attributes.edit');
      Route::post('/attributes/store', [AttributeController::class,'store'])->name('admin.attributes.store');
      Route::get('/attributes/status/{id1}/{id2}', [AttributeController::class,'status'])->name('admin.attributes.status');
      Route::post('/attributes/update/{id}', [AttributeController::class,'update'])->name('admin.attributes.update');
      Route::get('/attributes/delete/{id}', [AttributeController::class,'destroy'])->name('admin.attributes.delete');
      Route::get('/attributes/bulk-delete', [AttributeController::class,'bulkdelete'])->name('admin.attributes.bulk.delete');

      Route::get('/attribute/options/datatables/{id}', [AttributeOptionController::class,'datatables'])->name('admin.attributeoptions.datatables');
      Route::get('/attribute/options/{name}', [AttributeOptionController::class,'index'])->name('admin.attributeoptions.index');
      Route::get('/attribute/options/create/{name}', [AttributeOptionController::class,'create'])->name('admin.attributeoptions.create');
      Route::get('/attribute/options/edit/{name}/{id}', [AttributeOptionController::class,'edit'])->name('admin.attributeoptions.edit');
      Route::post('/attribute/options/store', [AttributeOptionController::class,'store'])->name('admin.attributeoptions.store');
      Route::get('/attribute/options/status/{id1}/{id2}', [AttributeOptionController::class,'status'])->name('admin.attributeoptions.status');
      Route::post('/attribute/options/update/{id}', [AttributeOptionController::class,'update'])->name('admin.attributeoptions.update');
      Route::get('/attribute/options/delete/{id}', [AttributeOptionController::class,'destroy'])->name('admin.attributeoptions.delete');
      Route::get('/attribute/options/bulk-delete', [AttributeOptionController::class,'bulkdelete'])->name('admin.attributeoptions.bulk.delete');

      Route::get('/categories/datatables', [CategoryController::class,'datatables'])->name('admin.categories.datatables');
      Route::get('/categories', [CategoryController::class,'index'])->name('admin.categories.index');
      Route::get('/categories/create', [CategoryController::class,'create'])->name('admin.categories.create');
      Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('admin.categories.edit');
      Route::post('/categories/create', [CategoryController::class,'store'])->name('admin.categories.store');
      Route::get('/categories/status/{id1}/{id2}', [CategoryController::class,'status'])->name('admin.categories.status');
      Route::post('/categories/update/{id}', [CategoryController::class,'update'])->name('admin.categories.update');
      Route::get('/categories/delete/{id}', [CategoryController::class,'destroy'])->name('admin.categories.delete');
      Route::get('/categories/bulk-delete', [CategoryController::class,'bulkdelete'])->name('admin.categories.bulk.delete');

      Route::get('/dynamic-form',[DynamicFormController::class,'create'])->name('admin.dynamic.from.create');
      Route::post('/dynamic-form',[DynamicFormController::class,'store'])->name('admin.dynamic.from.store');
      Route::post('/dynamic-form/update',[DynamicFormController::class,'update'])->name('admin.dynamic.form.update');
      Route::post('/dynamic-form/delete',[DynamicFormController::class,'deletedField'])->name('admin.dynamic.form.delete');

      Route::get('/schedules', [ScheduleController::class,'index'])->name('admin.schedules.index');
      Route::post('/schedules', [ScheduleController::class,'update'])->name('admin.schedules.update');

      Route::get('/enquiries/datatables', [PropertyEnquiryController::class,'datatables'])->name('admin.properties.enquiries.datatables');
      Route::get('/property-enquiries', [PropertyEnquiryController::class,'index'])->name('admin.properties.enquiries.index');

      Route::get('/country/datatables', [ManageCountryController::class,'datatables'])->name('admin.country.datatables');
      Route::get('/country', [ManageCountryController::class,'index'])->name('admin.country.index');
      Route::get('/country/edit/{id}', [ManageCountryController::class,'edit'])->name('admin.country.edit');
      Route::post('/country/update/{id}', [ManageCountryController::class,'update'])->name('admin.country.update');
      Route::get('/country/status/{id1}/{id2}', [ManageCountryController::class,'status'])->name('admin.country.status');

      Route::get('/cities/datatables', [CityController::class,'datatables'])->name('admin.cities.datatables');
      Route::get('/cities', [CityController::class,'index'])->name('admin.cities.index');
      Route::get('/cities/create', [CityController::class,'create'])->name('admin.cities.create');
      Route::get('/cities/edit/{id}', [CityController::class,'edit'])->name('admin.cities.edit');
      Route::post('/cities/create', [CityController::class,'store'])->name('admin.cities.store');
      Route::get('/cities/status/{id1}/{id2}', [CityController::class,'status'])->name('admin.cities.status');
      Route::post('/cities/update/{id}', [CityController::class,'update'])->name('admin.cities.update');
      Route::get('/cities/delete/{id}', [CityController::class,'destroy'])->name('admin.cities.delete');
      Route::get('/cities/bulk-delete', [CityController::class,'bulkdelete'])->name('admin.cities.bulk.delete');

      Route::get('/areas/datatables', [AreaController::class,'datatables'])->name('admin.areas.datatables');
      Route::get('/areas', [AreaController::class,'index'])->name('admin.areas.index');
      Route::get('/areas/create', [AreaController::class,'create'])->name('admin.areas.create');
      Route::get('/areas/edit/{id}', [AreaController::class,'edit'])->name('admin.areas.edit');
      Route::post('/areas/create', [AreaController::class,'store'])->name('admin.areas.store');
      Route::get('/areas/status/{id1}/{id2}', [AreaController::class,'status'])->name('admin.areas.status');
      Route::post('/areas/update/{id}', [AreaController::class,'update'])->name('admin.areas.update');
      Route::get('/areas/delete/{id}', [AreaController::class,'destroy'])->name('admin.areas.delete');
      Route::get('/areas/bulk-delete', [AreaController::class,'bulkdelete'])->name('admin.areas.bulk.delete');

      Route::group(['middleware'=>'permissions:Manage Plan'],function(){
        Route::get('/plans/datatables', [PlanController::class,'datatables'])->name('admin.plans.datatables');
        Route::get('/plans', [PlanController::class,'index'])->name('admin.plans.index');
        Route::get('/plans/create', [PlanController::class,'create'])->name('admin.plans.create');
        Route::get('/plans/edit/{id}', [PlanController::class,'edit'])->name('admin.plans.edit');
        Route::post('/plans/create', [PlanController::class,'store'])->name('admin.plans.store');
        Route::get('/plans/status/{id1}/{id2}', [PlanController::class,'status'])->name('admin.plans.status');
        Route::post('/plans/update/{id}', [PlanController::class,'update'])->name('admin.plans.update');
        Route::get('/plans/delete/{id}', [PlanController::class,'destroy'])->name('admin.plans.delete');
        Route::get('/plans/bulk-delete', [PlanController::class,'bulkdelete'])->name('admin.plans.bulk.delete');
      });

      Route::get('/agents/verification/datatables', [AgentVerificationController::class,'datatables'])->name('admin.agent.verification.datatables');
      Route::get('/agents/verification',[AgentVerificationController::class,'index'])->name('admin.agent.verification.index');
      Route::get('/agents/verification/ban/{id1}/{id2}', [AgentVerificationController::class,'status'])->name('admin.agent.verification.status');

      Route::get('/property/review/datatables', [PropertyReviewController::class,'datatables'])->name('admin.property.review.datatables'); //JSON REQUEST
      Route::get('/property/review', [PropertyReviewController::class,'index'])->name('admin.property.review.index');
      Route::get('/property/review/status/{id1}/{id2}', [PropertyReviewController::class,'status'])->name('admin.property.review.status');


      Route::group(['middleware'=>'permissions:Manage Customers'],function(){
        Route::get('/users/bonus', 'Admin\BonusController@index')->name('admin.user.bonus');
        Route::post('/users/edit/', 'Admin\BonusController@update')->name('admin.bonus.update');

        Route::get('/users/datatables', [UserController::class,'datatables'])->name('admin-user-datatables'); //JSON REQUEST
        Route::get('/users', [UserController::class,'index'])->name('admin.user.index');
        Route::get('/users/withdraws', [UserController::class,'withdraws'])->name('admin.withdraw.index');
        Route::get('/users/withdraws/datatables', [UserController::class,'withdrawdatatables'])->name('admin.withdraw.datatables');
        Route::get('/users/withdraw/{id}/show', [UserController::class,'withdrawdetails'])->name('admin.withdraw.show');
        Route::get('/users/withdraws/accept/{id}', [UserController::class,'accept'])->name('admin-withdraw-accept');
        Route::get('/users/withdraws/reject/{id}', [UserController::class,'reject'])->name('admin-withdraw-reject');
        Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('admin-user-edit');
        Route::post('/users/edit/{id}', [UserController::class,'update'])->name('admin-user-update');
        Route::get('/users/delete/{id}', [UserController::class,'destroy'])->name('admin-user-delete');
        Route::get('/user/{id}/show', [UserController::class,'show'])->name('admin-user-show');
        Route::get('/users/ban/{id1}/{id2}', [UserController::class,'ban'])->name('admin-user-ban');
        Route::get('/user/default/image', [UserController::class,'image'])->name('admin-user-image');
        Route::get('/users/deposit/{id}', [UserController::class,'deposit'])->name('admin-user-deposit');
        Route::post('/user/deposit/{id}', [UserController::class,'depositUpdate'])->name('admin-user-deposit-update');
        Route::post('/user/balance/add/deduct', [UserController::class,'adddeduct'])->name('admin.user.balance.add.deduct');

        Route::get('/withdraw-method/datatables', [WithdrawMethodController::class,'datatables'])->name('admin.withdraw.method.datatables'); //JSON REQUEST
        Route::get('/withdraw-method', [WithdrawMethodController::class,'index'])->name('admin-withdraw-method-index');
        Route::get('/withdraw-method/create', [WithdrawMethodController::class,'create'])->name('admin.withdraw.method.create');
        Route::post('/withdraw-method/store', [WithdrawMethodController::class,'store'])->name('admin.withdraw.method.store');
        Route::get('/withdraw-method/edit/{id}', [WithdrawMethodController::class,'edit'])->name('admin.withdraw.method.edit');
        Route::post('/withdraw-method/update/{id}', [WithdrawMethodController::class,'update'])->name('admin.withdraw.method.update');
        Route::get('/withdraw-method/delete/{id}', [WithdrawMethodController::class,'destroy'])->name('admin.withdraw.method.delete');
      });

      Route::group(['middleware'=>'permissions:Transactions'],function(){
        Route::get('/transactions/datatables', [TransactionController::class,'datatables'])->name('admin.transactions.datatables');
        Route::get('/transactions', [TransactionController::class,'index'])->name('admin.transactions.index');
      });

      Route::group(['middleware'=>'permissions:Deposits'],function(){
        Route::get('/deposits/datatables',[AppDepositController::class,'datatables'])->name('admin.deposits.datatables');
        Route::get('/deposits',[AppDepositController::class,'index'])->name('admin.deposits.index');
        Route::get('/deposits/status/{id1}/{id2}', [AppDepositController::class,'status'])->name('admin.deposits.status');
        Route::get('/users/deposit/{id}/show', [AppDepositController::class,'depositdetails'])->name('admin.deposit.show');
      });


      Route::group(['middleware'=>'permissions:Manage Blog'],function(){
        Route::get('/blog/datatables', [BlogController::class,'datatables'])->name('admin.blog.datatables'); //JSON REQUEST
        Route::get('/blog', [BlogController::class,'index'])->name('admin.blog.index');
        Route::get('/blog/create', [BlogController::class,'create'])->name('admin.blog.create');
        Route::post('/blog/create', [BlogController::class,'store'])->name('admin.blog.store');
        Route::get('/blog/edit/{id}', [BlogController::class,'edit'])->name('admin.blog.edit');
        Route::post('/blog/edit/{id}', [BlogController::class,'update'])->name('admin.blog.update');
        Route::get('/blog/delete/{id}', [BlogController::class,'destroy'])->name('admin.blog.delete');

        Route::get('/blog/category/datatables', [BlogCategoryController::class,'datatables'])->name('admin.cblog.datatables'); //JSON REQUEST
        Route::get('/blog/category', [BlogCategoryController::class,'index'])->name('admin.cblog.index');
        Route::get('/blog/category/create', [BlogCategoryController::class,'create'])->name('admin.cblog.create');
        Route::post('/blog/category/create', [BlogCategoryController::class,'store'])->name('admin.cblog.store');
        Route::get('/blog/category/edit/{id}', [BlogCategoryController::class,'edit'])->name('admin.cblog.edit');
        Route::post('/blog/category/edit/{id}', [BlogCategoryController::class,'update'])->name('admin.cblog.update');
        Route::get('/blog/category/delete/{id}', [BlogCategoryController::class,'destroy'])->name('admin.cblog.delete');
      });

      Route::get('/taxes/datatables', [TaxController::class,'datatables'])->name('admin.taxes.datatables');
      Route::get('/taxes', [TaxController::class,'index'])->name('admin.taxes.index');
      Route::get('/taxes/create', [TaxController::class,'create'])->name('admin.taxes.create');
      Route::get('/taxes/edit/{id}', [TaxController::class,'edit'])->name('admin.taxes.edit');
      Route::post('/taxes/create', [TaxController::class,'store'])->name('admin.taxes.store');
      Route::get('/taxes/status/{id1}/{id2}', [TaxController::class,'status'])->name('admin.taxes.status');
      Route::post('/taxes/update/{id}', [TaxController::class,'update'])->name('admin.taxes.update');
      Route::get('/taxes/delete/{id}', [TaxController::class,'destroy'])->name('admin.taxes.delete');

      Route::group(['middleware'=>'permissions:General Setting'],function(){
        Route::get('/general-settings/logo', [GeneralSettingController::class,'logo'])->name('admin.gs.logo');
        Route::get('/general-settings/favicon', [GeneralSettingController::class,'fav'])->name('admin.gs.fav');
        Route::get('/general-settings/loader', [GeneralSettingController::class,'load'])->name('admin.gs.load');
        Route::post('/general-settings/update/all', [GeneralSettingController::class,'generalupdate'])->name('admin.gs.update');
        Route::get('/general-settings/contents', [GeneralSettingController::class,'contents'])->name('admin.gs.contents');
        Route::get('/general-settings/moneytransfer', [GeneralSettingController::class,'moneytransfer'])->name('admin.gs.moneytransfer');
        Route::get('/general-settings/theme', [GeneralSettingController::class,'theme'])->name('admin.gs.theme');
        Route::get('/general-settings/custom-css', [GeneralSettingController::class,'customcss'])->name('admin.gs.customcss');
        Route::post('/general-settings/custom-css', [GeneralSettingController::class,'customcssSubmit'])->name('admin.gs.customcss.submit');

        Route::get('/general-settings/breadcumb', [GeneralSettingController::class,'breadcumb'])->name('admin.gs.breadcumb');
        Route::get('/general-settings/status/{field}/{status}', [GeneralSettingController::class,'status'])->name('admin.gs.status');
        Route::get('/general-settings/footer', [GeneralSettingController::class,'footer'])->name('admin.gs.footer');
        Route::get('/general-settings/affilate', [GeneralSettingController::class,'affilate'])->name('admin.gs.affilate');
        Route::get('/general-settings/error-banner', [GeneralSettingController::class,'errorbanner'])->name('admin.gs.error.banner');
        Route::get('/general-settings/popup', [GeneralSettingController::class,'popup'])->name('admin.gs.popup');
        Route::get('/general-settings/manage-cookie', [GeneralSettingController::class,'cookie'])->name('admin.gs.cookie');
        Route::get('/general-settings/maintenance', [GeneralSettingController::class,'maintain'])->name('admin.gs.maintenance');

        Route::get('/twilio-sms-settings', [GeneralSettingController::class,'twilio'])->name('admin.gs.twilio');
        Route::get('/nexmo-sms-settings', [GeneralSettingController::class,'nexmo'])->name('admin.gs.nexmo');
      });

      Route::group(['middleware'=>'permissions:Homepage Manage'],function(){

          Route::get('/review/datatables', [ReviewController::class,'datatables'])->name('admin.review.datatables'); //JSON REQUEST
          Route::get('/review', [ReviewController::class,'index'])->name('admin.review.index');
          Route::get('/review/create', [ReviewController::class,'create'])->name('admin.review.create');
          Route::get('/review/edit/{id}', [ReviewController::class,'edit'])->name('admin.review.edit');
          Route::post('/review/store', [ReviewController::class,'store'])->name('admin.review.store');
          Route::post('/review/edit/{id}', [ReviewController::class,'update'])->name('admin.review.update');
          Route::get('/review/delete/{id}', [ReviewController::class,'destroy'])->name('admin.review.delete');

          Route::get('/page-settings/hero', [PageSettingController::class,'hero'])->name('admin.ps.hero');
          Route::get('/homepage/customization', [PageSettingController::class,'customization'])->name('admin.ps.customization');
          Route::post('/homepage/customization/update', [PageSettingController::class,'customizationUpdate'])->name('admin.ps.customization.update');
          Route::get('/page-settings/about', [PageSettingController::class,'about'])->name('admin.ps.about');
          Route::get('/page-settings/download-apps', [PageSettingController::class,'download'])->name('admin.ps.download');
          Route::get('/page-settings/call-to-action', [PageSettingController::class,'calltoaction'])->name('admin.ps.call');
          Route::get('/page-settings/section/heading', [PageSettingController::class,'sectionHeading'])->name('admin.ps.heading');
          Route::post('/page-settings/contact/update', [PageSettingController::class,'contactupdate'])->name('admin.ps.contactupdate');
          Route::post('/page-settings/update/all', [PageSettingController::class,'update'])->name('admin.ps.update');
      });

      Route::group(['middleware'=>'permissions:Email Setting'],function(){
        Route::get('/email-templates/datatables', [EmailController::class,'datatables'])->name('admin.mail.datatables');
        Route::get('/email-templates', [EmailController::class,'index'])->name('admin.mail.index');
        Route::get('/email-templates/{id}', [EmailController::class,'edit'])->name('admin.mail.edit');
        Route::post('/email-templates/{id}', [EmailController::class,'update'])->name('admin.mail.update');
        Route::get('/email-config', [EmailController::class,'config'])->name('admin.mail.config');
        Route::get('/groupemail', [EmailController::class,'groupemail'])->name('admin.group.show');
        Route::post('/groupemailpost', [EmailController::class,'groupemailpost'])->name('admin.group.submit');
      });

      Route::get('/sms-templates/datatables', [SMSController::class,'datatables'])->name('admin.sms.datatables');
      Route::get('/sms-templates', [SMSController::class,'index'])->name('admin.sms.index');
      Route::get('/sms-templates/{id}', [SMSController::class,'edit'])->name('admin.sms.edit');
      Route::post('/sms-templates/{id}', [SMSController::class,'update'])->name('admin.sms.update');


      Route::group(['middleware'=>'permissions:Message'],function(){
        Route::post('/send/message', [MessageController::class,'usercontact'])->name('admin.send.message');
        Route::get('/user/ticket', [MessageController::class,'index'])->name('admin.user.message');
        Route::get('/messages/datatables/', [MessageController::class,'datatables'])->name('admin.message.datatables');
        Route::get('/message/{id}', [MessageController::class,'message'])->name('admin.message.show');
        Route::get('/message/{id}/delete', [MessageController::class,'messagedelete'])->name('admin.message.delete');
        Route::post('/message/post', [MessageController::class,'postmessage'])->name('admin.message.store');
        Route::get('/message/load/{id}', [MessageController::class,'messageshow'])->name('admin-message-load');
      });


      Route::group(['middleware'=>'permissions:Payment Setting'],function(){
        Route::post('/general-settings/update/all',[ GeneralSettingController::class,'generalupdate'])->name('admin.gs.update');
        Route::get('/paymentgateway/datatables', [PaymentGatewayController::class,'datatables'])->name('admin.payment.datatables');
        Route::get('/paymentgateway', [PaymentGatewayController::class,'index'])->name('admin.payment.index');
        Route::get('/paymentgateway/create', [PaymentGatewayController::class,'create'])->name('admin.payment.create');
        Route::post('/paymentgateway/create', [PaymentGatewayController::class,'store'])->name('admin.payment.store');
        Route::get('/paymentgateway/edit/{id}', [PaymentGatewayController::class,'edit'])->name('admin.payment.edit');
        Route::post('/paymentgateway/update/{id}', [PaymentGatewayController::class,'update'])->name('admin.payment.update');
        Route::get('/paymentgateway/delete/{id}', [PaymentGatewayController::class,'destroy'])->name('admin.payment.delete');
        Route::get('/paymentgateway/status/{id1}/{id2}', [PaymentGatewayController::class,'status'])->name('admin.payment.status');

        Route::get('/general-settings/currency/{status}', [GeneralSettingController::class,'currency'])->name('admin.gs.iscurrency');
        Route::get('/currency/datatables', [CurrencyController::class,'datatables'])->name('admin.currency.datatables');
        Route::get('/currency',[ CurrencyController::class,'index'])->name('admin.currency.index');
        Route::get('/currency/create', [CurrencyController::class,'create'])->name('admin.currency.create');
        Route::post('/currency/create', [CurrencyController::class,'store'])->name('admin.currency.store');
        Route::get('/currency/edit/{id}', [CurrencyController::class,'edit'])->name('admin.currency.edit');
        Route::post('/currency/update/{id}', [CurrencyController::class,'update'])->name('admin.currency.update');
        Route::get('/currency/delete/{id}', [CurrencyController::class,'destroy'])->name('admin.currency.delete');
        Route::get('/currency/status/{id1}/{id2}', [CurrencyController::class,'status'])->name('admin.currency.status');
      });

      Route::group(['middleware'=>'permissions:Manage Roles'],function(){
        Route::get('/role/datatables', [RoleController::class,'datatables'])->name('admin.role.datatables');
        Route::get('/role', [RoleController::class,'index'])->name('admin.role.index');
        Route::get('/role/create', [RoleController::class,'create'])->name('admin.role.create');
        Route::post('/role/create', [RoleController::class,'store'])->name('admin.role.store');
        Route::get('/role/edit/{id}', [RoleController::class,'edit'])->name('admin.role.edit');
        Route::post('/role/edit/{id}', [RoleController::class,'update'])->name('admin.role.update');
        Route::get('/role/delete/{id}', [RoleController::class,'destroy'])->name('admin.role.delete');
      });

      Route::group(['middleware'=>'permissions:Manage Staff'],function(){
        Route::get('/staff/datatables', [StaffController::class,'datatables'])->name('admin.staff.datatables');
        Route::get('/staff', [StaffController::class,'index'])->name('admin.staff.index');
        Route::get('/staff/create', [StaffController::class,'create'])->name('admin.staff.create');
        Route::post('/staff/create', [StaffController::class,'store'])->name('admin.staff.store');
        Route::get('/staff/edit/{id}', [StaffController::class,'edit'])->name('admin.staff.edit');
        Route::post('/staff/update/{id}', [StaffController::class,'update'])->name('admin.staff.update');
        Route::get('/staff/delete/{id}', [StaffController::class,'destroy'])->name('admin.staff.delete');
      });

      Route::group(['middleware'=>'permissions:Manage KYC Form'],function(){
        Route::get('/manage-kyc/datatables', [KycManageController::class,'datatables'])->name('admin.manage.kyc.datatables');
        Route::get('/manage-kyc-form',[KycManageController::class,'index'])->name('admin.manage.kyc');
        Route::get('/manage-kyc-module',[KycManageController::class,'module'])->name('admin.manage.module');
        Route::post('/manage-kyc-module/update',[KycManageController::class,'moduleUpdate'])->name('admin.manage.module.update');

        Route::get('/manage-kyc-form/{user}',[KycManageController::class,'userKycForm'])->name('admin.manage.kyc.user');
        Route::post('/manage-kyc-form/{user}',[KycManageController::class,'kycForm']);
        Route::post('/kyc-form/update',[KycManageController::class,'kycFormUpdate'])->name('admin.kyc.form.update');
        Route::post('/kyc-form/delete',[KycManageController::class,'deletedField'])->name('admin.kyc.form.delete');
        Route::get('/kyc-info/{user}',[KycManageController::class,'kycInfo'])->name('admin.kyc.info');
        Route::get('/kyc-info/user/{id}',[KycManageController::class,'kycDetails'])->name('admin.kyc.details');
        Route::get('/users/kyc/{id1}/{id2}', [KycManageController::class,'kyc'])->name('admin.user.kyc');
      });

      Route::group(['middleware'=>'permissions:Language Manage'],function(){
        Route::get('/general-settings/language/{status}',[ GeneralSettingController::class,'language'])->name('admin.gs.islanguage');
        Route::get('/languages/datatables', [LanguageController::class,'datatables'])->name('admin.lang.datatables');
        Route::get('/languages', [LanguageController::class,'index'])->name('admin.lang.index');
        Route::get('/languages/create', [LanguageController::class,'create'])->name('admin.lang.create');
        Route::get('/languages/edit/{id}', [LanguageController::class,'edit'])->name('admin.lang.edit');
        Route::post('/languages/create', [LanguageController::class,'store'])->name('admin.lang.store');
        Route::post('/languages/edit/{id}', [LanguageController::class,'update'])->name('admin.lang.update');
        Route::get('/languages/status/{id1}/{id2}', [LanguageController::class,'status'])->name('admin.lang.st');
        Route::get('/languages/delete/{id}',[ LanguageController::class,'destroy'])->name('admin.lang.delete');

        Route::get('/adminlanguages/datatables', [AdminLanguageController::class,'datatables'])->name('admin.tlang.datatables');
        Route::get('/adminlanguages', [AdminLanguageController::class,'index'])->name('admin.tlang.index');
        Route::get('/adminlanguages/create', [AdminLanguageController::class,'create'])->name('admin.tlang.create');
        Route::get('/adminlanguages/edit/{id}', [AdminLanguageController::class,'edit'])->name('admin.tlang.edit');
        Route::post('/adminlanguages/create', [AdminLanguageController::class,'store'])->name('admin.tlang.store');
        Route::post('/adminlanguages/edit/{id}', [AdminLanguageController::class,'update'])->name('admin.tlang.update');
        Route::get('/adminlanguages/status/{id1}/{id2}', [AdminLanguageController::class,'status'])->name('admin.tlang.st');
        Route::get('/adminlanguages/delete/{id}', [AdminLanguageController::class,'destroy'])->name('admin.tlang.delete');
      });

      Route::group(['middleware'=>'permissions:Fonts'],function(){
        Route::get('/fonts/datatables', [FontController::class,'datatables'])->name('admin.font.datatables');
        Route::get('/fonts', [FontController::class,'index'])->name('admin.font.index');
        Route::get('/font/create', [FontController::class,'create'])->name('admin.font.create');
        Route::post('/font/store', [FontController::class,'store'])->name('admin.font.store');
        Route::get('/font/edit/{id}', [FontController::class,'edit'])->name('admin.font.edit');
        Route::post('/font/update/{id}', [FontController::class,'update'])->name('admin.font.update');
        Route::get('/font/status/{id1}/{id2}', [FontController::class,'status'])->name('admin.font.status');
        Route::get('/font/delete/{id}', [FontController::class,'destroy'])->name('admin.font.delete');
      });

      Route::group(['middleware'=>'permissions:Menupage Setting'],function(){
        Route::get('/page-settings/contact', [PageSettingController::class,'contact'])->name('admin.ps.contact');

        Route::get('/page/datatables', [PageController::class,'datatables'])->name('admin.page.datatables'); //JSON REQUEST
        Route::get('/page', [PageController::class,'index'])->name('admin.page.index');
        Route::get('/page/create', [PageController::class,'create'])->name('admin.page.create');
        Route::post('/page/create', [PageController::class,'store'])->name('admin.page.store');
        Route::get('/page/edit/{id}', [PageController::class,'edit'])->name('admin.page.edit');
        Route::post('/page/update/{id}', [PageController::class,'update'])->name('admin.page.update');
        Route::get('/page/delete/{id}', [PageController::class,'destroy'])->name('admin.page.delete');
        Route::get('/page/status/{id1}/{id2}', [PageController::class,'status'])->name('admin.page.status');

        Route::get('/login-registration/page', [PageSettingController::class,'loginpage'])->name('admin.ps.login');

        Route::get('/faq/datatables', [FaqController::class,'datatables'])->name('admin.faq.datatables');
        Route::get('/admin-faq', [FaqController::class,'index'])->name('admin.faq.index');
        Route::get('/faq/create', [FaqController::class,'create'])->name('admin.faq.create');
        Route::get('/faq/edit/{id}', [FaqController::class,'edit'])->name('admin.faq.edit');
        Route::get('/faq/delete/{id}', [FaqController::class,'destroy'])->name('admin.faq.delete');
        Route::post('/faq/update/{id}', [FaqController::class,'update'])->name('admin.faq.update');
        Route::post('/faq/create', [FaqController::class,'store'])->name('admin.faq.store');
      });

      Route::group(['middleware'=>'permissions:Seo Tools'],function(){
        Route::get('/seotools/analytics', [SeoToolController::class,'analytics'])->name('admin.seotool.analytics');
        Route::post('/seotools/analytics/update', [SeoToolController::class,'analyticsupdate'])->name('admin.seotool.analytics.update');
        Route::get('/seotools/keywords', [SeoToolController::class,'keywords'])->name('admin.seotool.keywords');
        Route::post('/seotools/keywords/update', [SeoToolController::class,'keywordsupdate'])->name('admin.seotool.keywords.update');
        Route::get('/products/popular/{id}',[SeoToolController::class,'popular'])->name('admin.prod.popular');

        Route::get('/social-links/datatables', [SocialLinkController::class,'datatables'])->name('admin.social.links.datatables'); //JSON REQUEST
        Route::get('/social-links', [SocialLinkController::class,'index'])->name('admin.social.links.index');
        Route::get('/social-links/create', [SocialLinkController::class,'create'])->name('admin.social.links.create');
        Route::post('/social-links/create', [SocialLinkController::class,'store'])->name('admin.social.links.store');
        Route::get('/social-links/edit/{id}', [SocialLinkController::class,'edit'])->name('admin.social.links.edit');
        Route::post('/social-links/update/{id}', [SocialLinkController::class,'update'])->name('admin.social.links.update');
        Route::get('/social-links/delete/{id}', [SocialLinkController::class,'destroy'])->name('admin.social.links.delete');
        Route::get('/social-links/status/{id1}/{id2}', [SocialLinkController::class,'status'])->name('admin.social.links.status');
      });

      Route::group(['middleware'=>'permissions:Sitemaps'],function(){
        Route::get('/sitemap/datatables', [SitemapController::class,'datatables'])->name('admin.sitemap.datatables');
        Route::get('/sitemap',[SitemapController::class,'index'])->name('admin.sitemap.index');
        Route::get('/sitemap/create',[SitemapController::class,'create'])->name('admin.sitemap.create');
        Route::post('/sitemap/store', [SitemapController::class,'store'])->name('admin.sitemap.store');
        Route::get('/sitemap/{id}/update',[SitemapController::class,'update'])->name('admin.sitemap.update');
        Route::get('/sitemap/{id}/delete', [SitemapController::class,'delete'])->name('admin.sitemap.delete');
        Route::post('/sitemap/download', [SitemapController::class,'download'])->name('admin.sitemap.download');
      });

      Route::group(['middleware'=>'permissions:Subscribers'],function(){
        Route::get('/subscribers/datatables', [SubscriberController::class,'datatables'])->name('admin.subs.datatables'); //JSON REQUEST
        Route::get('/subscribers', [SubscriberController::class,'index'])->name('admin.subs.index');
        Route::get('/subscribers/download', [SubscriberController::class,'download'])->name('admin.subs.download');
      });

      Route::group(['middleware'=>'permissions:Social Setting'],function(){
        Route::get('/social', [SocialSettingController::class,'index'])->name('admin.social.index');
        Route::post('/social/update', [SocialSettingController::class,'socialupdate'])->name('admin.social.update');
        Route::post('/social/update/all', [SocialSettingController::class,'socialupdateall'])->name('admin.social.update.all');
        Route::get('/social/facebook', [SocialSettingController::class,'facebook'])->name('admin.social.facebook');
        Route::get('/social/google', [SocialSettingController::class,'google'])->name('admin.social.google');
        Route::get('/social/facebook/{status}', [SocialSettingController::class,'facebookup'])->name('admin.social.facebookup');
        Route::get('/social/google/{status}', [SocialSettingController::class,'googleup'])->name('admin.social.googleup');
      });

      Route::get('/check/movescript', [DashboardController::class,'movescript'])->name('admin-move-script');
      Route::get('/generate/backup', [DashboardController::class,'generate_bkup'])->name('admin-generate-backup');
      Route::get('/activation', [DashboardController::class,'activation'])->name('admin-activation-form');
      Route::post('/activation', [DashboardController::class,'activation_submit'])->name('admin-activate-purchase');
      Route::get('/clear/backup', [DashboardController::class,'clear_bkup'])->name('admin-clear-backup');

    });
