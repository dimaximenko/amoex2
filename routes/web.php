<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AmoapiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'main')->name('main');
    Route::get('/service', 'service')->name('service');
//    Route::post('/service/make', 'serviceMake');
});

Route::controller(AmoapiController::class)->group(function () {
    Route::get('/authamo', 'makeAuthAccess');
    Route::post('/amoapi/make', 'makeLeadByContact')->name('success');
    Route::get('/amoapi/test', 'makeLeadByContactTest');
});

