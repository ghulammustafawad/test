<?php

use App\Http\Controllers\CategoryController;
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


Route::get('/get/categories', [CategoryController::class,'getAllCategory']);

Route::get('/delete/category/{id}', [CategoryController::class,'delCategory']);


Route::get('/get/sub/categories', [CategoryController::class,'getAllSubCategory']);

Route::post('/create/categories', [CategoryController::class,'createCatgory']);

Route::post('/create/sub/categories', [CategoryController::class,'createSubCatgory']);



