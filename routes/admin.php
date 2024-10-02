<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Enterprises\EnterpriseController;
use App\Http\Controllers\Admin\Enterprises\EnterprisePersonController;
use App\Http\Controllers\Admin\Setting\FisicalYearController;
use App\Http\Controllers\Admin\Setting\GrantOfficeController;
use App\Http\Controllers\Admin\Setting\GrantProgramController;
use App\Http\Controllers\Admin\Setting\Types\AffiliationTypeController;
use App\Http\Controllers\Admin\Setting\Types\CooperativeTypeController;
use App\Http\Controllers\Admin\Setting\Types\EnterpriseTypeController;
use App\Http\Controllers\Admin\Setting\Types\GrantTypeController;
use App\Models\Enterprises\EnterprisePerson;
use App\Models\Setting\Types\GrantType;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'_invoke'])->name('dashboard');

Route::group(['prefix' => 'settings'], function () {
    Route::resource('fisicalYear', FisicalYearController::class);
    Route::resource('grantOffice', GrantOfficeController::class);
    Route::resource('grantProgram',GrantProgramController::class);

    // Types settings group
    Route::group(['prefix=>types'], function () {
        Route::resource('affiliationType', AffiliationTypeController::class);
        Route::resource('cooperativeType', CooperativeTypeController::class);
        Route::resource('enterpriseType', EnterpriseTypeController::class);
        Route::resource('grantType', GrantTypeController::class);

    });
});

Route::group(['prefix=>enterprises'], function () {
    Route::resource('enterprise', EnterpriseController::class);
    Route::resource('enterprisePerson', EnterprisePersonController::class);
    Route::resource('enterpriseType', EnterpriseTypeController::class);
    Route::resource('grantType', GrantTypeController::class);

});
