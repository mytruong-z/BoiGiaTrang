<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('axies', 'AxiesCrudController');
    Route::crud('axie-reports', 'AxieReportsCrudController');
    Route::crud('users', 'UsersCrudController');
    Route::crud('crypto', 'CryptoCrudController');
    Route::crud('crypto-follow', 'CryptoFollowCrudController');
    Route::crud('crypto-hold', 'CryptoHoldCrudController');
    Route::crud('crypto-blades', 'CryptoBladesCrudController');
}); // this should be the absolute last line of this file