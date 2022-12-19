<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/book', 'App\Http\Controllers\BookController@index')->name("book.index");
Route::get('/book/{id}', 'App\Http\Controllers\BookController@show')->name("book.show");

Route::get('/loan', 'App\Http\Controllers\LoanController@index')->name("loan.index");
Route::get('/loan/{id}', 'App\Http\Controllers\LoanController@show')->name("loan.show");


Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    
    
    Route::get('/admin/book', 'App\Http\Controllers\Admin\AdminBookController@index')->name("admin.book.index");
    Route::post('/admin/book/store', 'App\Http\Controllers\Admin\AdminBookController@store')->name("admin.book.store");
    Route::delete('/admin/book/{id}/delete', 'App\Http\Controllers\Admin\AdminBookController@delete')->name("admin.book.delete");
    Route::get('/admin/book/{id}/edit', 'App\Http\Controllers\Admin\AdminBookController@edit')->name("admin.book.edit");
    Route::put('/admin/book/{id}/update', 'App\Http\Controllers\Admin\AdminBookController@update')->name("admin.book.update");
    
    
    Route::get('/admin/category', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name("admin.category.index");
    Route::post('/admin/category/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name("admin.category.store");
    Route::delete('/admin/category/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name("admin.category.delete");
    Route::get('/admin/category/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name("admin.category.edit");
    Route::put('/admin/category/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name("admin.category.update");

    Route::get('/admin/loan', 'App\Http\Controllers\Admin\AdminLoanController@index')->name("admin.loan.index");
    Route::post('/admin/loan/store', 'App\Http\Controllers\Admin\AdminLoanController@store')->name("admin.loan.store");
    Route::delete('/admin/loan/{id}/delete', 'App\Http\Controllers\Admin\AdminLoanController@delete')->name("admin.loan.delete");
    Route::get('/admin/loan/{id}/edit', 'App\Http\Controllers\Admin\AdminLoanController@edit')->name("admin.loan.edit");
    Route::put('/admin/loan/{id}/update', 'App\Http\Controllers\Admin\AdminLoanController@update')->name("admin.loan.update");

});



Auth::routes();

