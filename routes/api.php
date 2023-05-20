<?php

use App\Http\Controllers\Api\AboutUsApiController;
use App\Http\Controllers\Api\FooterLinksApiController;
use App\Http\Controllers\Api\MenuBarApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\SliderApiController;
use App\Http\Controllers\Api\TestimonialsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('menus', MenuBarApiController::class);
Route::resource('sliders', SliderApiController::class);
Route::resource('footer-links', FooterLinksApiController::class);
Route::resource('about-us', AboutUsApiController::class);
Route::resource('testimonilas', TestimonialsApiController::class);
Route::resource('services', ServiceApiController::class);
