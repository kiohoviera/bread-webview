<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/qrInfo/{inputString}', [\App\Http\Controllers\ApiController::class, 'readScannerInfo']);

Route::post('generateQr', [\App\Http\Controllers\BreadsController::class, 'generateQr']);
Route::get('/checkSettings', [\App\Http\Controllers\ApiController::class, 'getConfiguration']);
//Route::get('/qrInfo', [\App\Http\Controllers\ApiController::class, 'readScannerInfoTest']);
Route::get('/scanLogsIn', [\App\Http\Controllers\ApiController::class, 'getScanLogsIn']);
Route::get('/scanLogsOut', [\App\Http\Controllers\ApiController::class, 'getScanLogsOut']);
Route::post('/updateScanner', [\App\Http\Controllers\ApiController::class, 'updateScanner']);
Route::group(['prefix' => 'application'], function () {

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('scanner', [\App\Http\Controllers\HomeController::class, 'scanner']);
    Route::get('secure', [\App\Http\Controllers\HomeController::class, 'secure']);
    Route::post('/enableCamera', [\App\Http\Controllers\HomeController::class, 'enable']);
    Route::post('/verify', [\App\Http\Controllers\HomeController::class, 'verify']);
    Route::get('out', [\App\Http\Controllers\HomeController::class, 'scannerOut']);

    /*
     * Homepage
     */
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'home']);
    Route::get('inventory', [\App\Http\Controllers\SalesDashboardController::class, 'inventory']);
    Route::get('logs', [\App\Http\Controllers\HomeController::class, 'scannerLogs']);
    Route::get('settings', [\App\Http\Controllers\HomeController::class, 'settings']);
    Route::post('updateSettings', [\App\Http\Controllers\HomeController::class, 'updateSettings']);
    Route::patch('/inventory/update/{id}', [\App\Http\Controllers\SalesDashboardController::class, 'update']);
    Route::delete('/inventory/delete/{id}', [\App\Http\Controllers\SalesDashboardController::class, 'delete']);
});
