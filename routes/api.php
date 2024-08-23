<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebSiteCoreSettingsController;
use App\Http\Controllers\FooterManagementController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('login', [LoginController::class, 'authenticate'])->name('auth.authenticate');
//     Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//     Route::post('/refresh', [AuthController::class, 'refresh']);    
// });
// Route::group([
//     'middleware' => 'api'
// ], function ($router) {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
Route::prefix('menu')->group(function(){
    Route::post('/menu-creates', [WebsiteMenuManagementController::class, 'store'])->name('menu.menu-creates');
    Route::get('/menu-listing', [WebsiteMenuManagementController::class, 'show'])->name('menu.menu-listing');
});

Route::prefix('contentpage')->group(function(){
    Route::post('/contentpage-creates', [DynamicContentPageManagamentController::class, 'store'])->name('contentpage.contentpage-creates');
    Route::get('/contentpage-listing', [DynamicContentPageManagamentController::class, 'show'])->name('contentpage.contentpage-listing');
});


Route::prefix('websitecoresetting')->group(function(){
    Route::post('/websitecoresetting-creates', [WebSiteCoreSettingsController::class, 'store'])->name('websitecoresetting.websitecoresetting-creates');
    Route::get('/websitecoresetting-list', [WebSiteCoreSettingsController::class, 'show'])->name('websitecoresetting.websitecoresetting-list');
});