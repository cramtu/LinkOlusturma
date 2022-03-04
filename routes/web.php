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
/*
Route::get('/', function () {
    return view('Linkolustur');
});

*/




//Route::match(['get','post'],'/bilgial/{id}', [\App\Http\Controllers\OdemeController::class,'bilgial'])->name('bilgial');

Route::match(['get','post'],'/', [\App\Http\Controllers\LoginController::class,'index'])->name('login');

Route::match(['get','post'],'/callback', [\App\Http\Controllers\OdemeController::class,'callback'])->name('callback');
Route::match(['get','post'],'/odeme/{id}', [\App\Http\Controllers\OdemeController::class,'odeme'])->name('odeme');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::match(['get','post'],'/ayarlar', [\App\Http\Controllers\AyarlarController::class,'ayarlar'])->name('ayarlar');
Route::match(['get','post'],'/logout', [\App\Http\Controllers\LoginController::class,'logout'])->name('logout');

Route::match(['get','post'],'/Linkolustur', [\App\Http\Controllers\LinkController::class,'Linkolustur'])->name('Linkolustur');

Route::match(['get','post'],'/Linklistele', [\App\Http\Controllers\LinkController::class,'Linklistele'])->name('Linklistele');

});


