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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/login','Auth\AdminController@showLoginForm');
Route::post('admin/login','Auth\AdminController@login')->name('admin.login');
Route::get('seller/login','Auth\SellerController@showLoginForm');
Route::post('seller/login','Auth\SellerController@login')->name('seller.login');
Route::group(["prefix"=>"admin", "middleware" => "assign.guard:admin,admin/login"],function(){
    Route::get("dashbord", function(){
        return view("admin.home");
    });
});
Route::group(["prefix"=>"seller", "middleware" => "assign.guard:seller,seller/login"],function(){
    Route::get("dashbord", function(){
        return view("seller.home");
    });
});

