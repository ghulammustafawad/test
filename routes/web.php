<?php

use App\Http\Controllers\HomeController;
use App\Models\Category;
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

//

Route::get('/create/cat', function () {
    return view('createCat');
})->name('cat.create');

Route::get('/create/sub/cat', function () {
    $categories = Category::where('parentID', null)->get();
    return view('createsubCat',compact('categories'));
})->name('subcat.create');


Route::get('/', [HomeController::class,'getAllCategory'])->name('categories');

Route::get('/get/categories', [HomeController::class,'getAllCategory'])->name('categories');

Route::get('/delete/categories/{id}', [HomeController::class,'DelCategory'])->name('delete');


Route::get('/get/sub/categories', [HomeController::class,'getAllSubCategory'])->name('sub_categories');

Route::post('/create/categories', [HomeController::class,'createCatgory'])->name('create.cat');

Route::post('/create/sub/categories', [HomeController::class,'createSubCatgory'])->name('create.sub_cat');;
