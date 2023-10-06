<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'Maintenance'], function () {

    Route::get('/', 'App\Http\Controllers\PagesController@home');
    Route::get('/about', 'App\Http\Controllers\PagesController@about');
    Route::get('/services', 'App\Http\Controllers\PagesController@services');
    Route::get('/service/{id}/', 'App\Http\Controllers\PagesController@service');
    Route::get('/news', 'App\Http\Controllers\PagesController@news');
    Route::get('/new/{id}/', 'App\Http\Controllers\PagesController@new');
    Route::get('/contact', 'App\Http\Controllers\PagesController@contact');
    Route::get('/jobs', 'App\Http\Controllers\PagesController@jobs');
    Route::get('/images', 'App\Http\Controllers\PagesController@images');
    Route::get('/videos', 'App\Http\Controllers\PagesController@videos');

});


Route::get('maintenance', function () {

    if (setting()->status == 'open')
    {
     return redirect ('/');
    }

    return view('frontend.maintenance');
});
Route::get('lang/{lang}',function($lang){

    session()->has('lang') ?session()->forget('lang') :'';
    $lang == 'ar' ?session()->put('lang','ar'): session()->put('lang','en');

    return back();

});
