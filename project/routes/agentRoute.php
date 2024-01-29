<?php
use App\Http\Controllers;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Agent\CrowdfundingController;
use App\Http\Controllers\Agent\DynamicFormController;
use App\Http\Controllers\Agent\GalleryController;
use App\Http\Controllers\Agent\InvestController;
use App\Http\Controllers\Agent\InvestPropertyController;
use App\Http\Controllers\Agent\LoginController;
use App\Http\Controllers\Agent\OrderController;
use App\Http\Controllers\Agent\PropertyContractController;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Agent\PropertyEnquiryController;
use App\Http\Controllers\Agent\RegisterController;
use App\Http\Controllers\Agent\ScheduleController;

Route::prefix('agent')->group(function() {
    Route::get('/dashboard', [AgentController::class,'index'])->name('agent.dashboard');

    Route::get('/login', [LoginController::class,'showLoginForm'])->name('agent.login');
    Route::post('/login', [LoginController::class,'login'])->name('agent.login.submit');

    Route::post('/register', [RegisterController::class,'register'])->name('agent.register.submit');

    Route::group(['middleware'=>'authagent'],function(){
        Route::get('/profile', [AgentController::class,'profile'])->name('agent.profile');
        Route::post('/profile/update', [AgentController::class,'profileupdate'])->name('agent.profile.update');

        Route::get('/password', [AgentController::class,'passwordreset'])->name('agent.password');
        Route::post('/password/update', [AgentController::class,'changepass'])->name('agent.password.update');

        Route::get('/invest/properties/datatables', [InvestPropertyController::class,'datatables'])->name('agent.invest.properties.datatables');
        Route::get('/invest/properties', [InvestPropertyController::class,'index'])->name('agent.invest.properties.index');
        Route::get('/invest/properties/create', [InvestPropertyController::class,'create'])->name('agent.invest.properties.create');
        Route::get('/invest/properties/edit/{id}', [InvestPropertyController::class,'edit'])->name('agent.invest.properties.edit');
        Route::post('/invest/properties/store', [InvestPropertyController::class,'store'])->name('agent.invest.properties.store');
        Route::get('/invest/properties/status/{id1}/{id2}', [InvestPropertyController::class,'status'])->name('agent.invest.properties.status');
        Route::post('/invest/properties/update/{id}', [InvestPropertyController::class,'update'])->name('agent.invest.properties.update');
        Route::get('/invest/properties/delete/{id}', [InvestPropertyController::class,'destroy'])->name('agent.invest.properties.delete');

        Route::get('/properties/datatables', [PropertyController::class,'datatables'])->name('agent.properties.datatables');
        Route::get('/properties', [PropertyController::class,'index'])->name('agent.properties.index');
        Route::get('/properties/pending', [PropertyController::class,'pending'])->name('agent.properties.pending');
        Route::get('/properties/approved', [PropertyController::class,'approved'])->name('agent.properties.approved');
        Route::get('/properties/create', [PropertyController::class,'create'])->name('agent.properties.create');
        Route::post('/properties/store', [PropertyController::class,'store'])->name('agent.properties.store');
        Route::get('/properties/edit/{id}', [PropertyController::class,'edit'])->name('agent.properties.edit');
        Route::post('/properties/update/{id}', [PropertyController::class,'update'])->name('agent.properties.update');
        Route::get('/properties/delete/{id}', [PropertyController::class,'destroy'])->name('agent.properties.delete');

        Route::get('/schedules', [ScheduleController::class,'index'])->name('agent.schedules.index');
        Route::post('/schedules', [ScheduleController::class,'update'])->name('agent.schedules.update');

        Route::get('/contracts/datatables/{type}', [PropertyContractController::class,'datatables'])->name('agent.property.contracts.datatables');
        Route::get('/property-contracts/rents', [PropertyContractController::class,'rents'])->name('agent.property.contracts.rents');
        Route::get('/property-contracts/sells', [PropertyContractController::class,'sells'])->name('agent.property.contracts.sells');
        Route::get('/property-contracts/{slug}', [PropertyContractController::class,'details'])->name('agent.property.contracts.details');
        Route::get('/contract-paper/{id}', [PropertyContractController::class,'contractPaper'])->name('agent.property.contract.paper');
        Route::get('/property-contracts/status/{id1}/{id2}', [PropertyContractController::class,'status'])->name('agent.property.contracts.status');
        Route::get('/property-phase/status/{id1}/{id2}', [PropertyContractController::class,'phase'])->name('agent.property.contracts.phase');

        Route::get('/property/orders/datatables', [OrderController::class,'datatables'])->name('agent.property.order.datatables');
        Route::get('/property/order', [OrderController::class,'index'])->name('agent.property.order.index');

        Route::get('/gallery/show', [GalleryController::class,'show'])->name('agent.gallery.show');
        Route::post('/gallery/store', [GalleryController::class,'store'])->name('agent.gallery.store');
        Route::get('/gallery/delete', [GalleryController::class,'destroy'])->name('agent.gallery.delete');

        Route::get('/invests/datatables', [InvestController::class,'datatables'])->name('agent.invests.datatables');
        Route::get('/invests', [InvestController::class,'index'])->name('agent.invests.index');
        Route::get('/invests/status/{id1}/{id2}', [InvestController::class,'status'])->name('agent.invests.status');
        Route::get('/invests/{id}/show', [InvestController::class,'investdetails'])->name('agent.invests.show');

        Route::get('/dynamic-form',[DynamicFormController::class,'create'])->name('agent.dynamic.from.create');
        Route::post('/dynamic-form',[DynamicFormController::class,'store'])->name('agent.dynamic.from.store');
        Route::post('/dynamic-form/update',[DynamicFormController::class,'update'])->name('agent.dynamic.form.update');
        Route::post('/dynamic-form/delete',[DynamicFormController::class,'deletedField'])->name('agent.dynamic.form.delete');

        Route::get('/enquiries/datatables', [PropertyEnquiryController::class,'datatables'])->name('agent.properties.enquiries.datatables');
        Route::get('/property-enquiries', [PropertyEnquiryController::class,'index'])->name('agent.properties.enquiries.index');
    });

});

