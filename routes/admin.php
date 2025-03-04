<?php

use Illuminate\Support\Facades\Route;
use App\Models\Setting\Types\GrantType;
use App\Models\Enterprises\EnterprisePerson;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Grants\GrantController;
use App\Http\Controllers\Admin\Groups\GroupController;
use App\Http\Controllers\Admin\Farmers\FarmerController;
use App\Http\Controllers\Admin\Grants\GrantDetailController;
use App\Http\Controllers\Admin\Groups\GroupPersonController;
use App\Http\Controllers\Admin\Setting\FisicalYearController;
use App\Http\Controllers\Admin\Setting\GrantOfficeController;
use App\Http\Controllers\Admin\Setting\GrantProgramController;
use App\Http\Controllers\Admin\Enterprises\EnterpriseController;
use App\Http\Controllers\Admin\Setting\Types\GrantTypeController;
use App\Http\Controllers\Admin\Cooperatives\CooperativeController;
use App\Http\Controllers\Admin\Setting\Types\AffiliationController;
use App\Http\Controllers\Admin\Farmers\FarmerCooperativesController;
use App\Http\Controllers\Admin\Enterprises\EnterprisePersonController;
use App\Http\Controllers\Admin\Setting\Types\EnterpriseTypeController;
use App\Http\Controllers\Admin\Setting\Types\AffiliationTypeController;
use App\Http\Controllers\Admin\Setting\Types\CooperativeTypeController;
use App\Http\Controllers\Admin\Cooperatives\CooperativePersonController;

Route::get('/dashboard',[DashboardController::class,'_invoke'])->name('dashboard');

Route::group(['prefix' => 'settings'], function () {
    Route::resource('fisicalYear', FisicalYearController::class);
    Route::resource('grantOffice', GrantOfficeController::class);
    Route::resource('grantProgram',GrantProgramController::class);

    // Types settings group
    Route::group(['prefix=>types'], function () {
        Route::resource('affiliationType', AffiliationTypeController::class);
        Route::resource('affiliation', AffiliationController::class);
        Route::resource('cooperativeType', CooperativeTypeController::class);
        Route::resource('enterpriseType', EnterpriseTypeController::class);
        Route::resource('grantType', GrantTypeController::class);

    });
});

Route::group(['prefix=>enterprises'], function () {
    Route::resource('enterprise', EnterpriseController::class);
    Route::resource('enterprisePerson', EnterprisePersonController::class);

});

Route::group(['prefix=>farmers'], function () {
    Route::resource('farmer', FarmerController::class);
});

Route::group(['prefix=>groups'], function () {
    Route::resource('group', GroupController::class);
    Route::resource('groupPerson', GroupPersonController::class);
});

Route::group(['prefix=>grants'], function () {
    Route::resource('grant', GrantController::class);
    Route::resource('grantDetail', GrantDetailController::class);
});

Route::group(['prefix=>cooperatives'], function () {
    Route::resource('cooperative', CooperativeController::class);
    Route::resource('cooperativePerson', CooperativePersonController::class);
});
