<?php
use App\Http\Controllers\accountController;
use App\Http\Controllers\ajaxController;
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

Route::get('/', 'homeController@index');

Route::get('/authSingup',function()
{
    return view('account.tempInputSingup');
});

Route::post('/authSingup','accountController@showtempSingupPage');
Route::post('/singup', 'accountController@add');
Route::get('/login', 'accountController@login');
Route::post('/login', 'accountController@checkLogin');

Route::get('/home', 'homeController@index');
Route::post('/item','ajaxController@getItemList');
Route::post('/postMusic','ajaxController@postMusic');
Route::post('/postLyrics','ajaxController@postLyrics');
Route::post('/postComment','ajaxController@postComment');
Route::post('/postProfile','ajaxController@postProfile');

Route::get('/postMail','ajaxController@postMail');

Route::get('/detaile/{id}','homeController@getDetaile');
Route::get('/profile/{user_id}','homeController@getProfile');
Route::get('/profile','homeController@getMyProfile');

