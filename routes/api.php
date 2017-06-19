<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/users','UserController');
Route::resource('/departments','DepartmentController');
Route::resource('/comments','CommentController');
Route::resource('/rent_requests','RentRequestController');

Route::get('user-departments/{id}','UserController@userDepartments');
Route::get('login/{user}/{password}','UserController@login');
Route::get('acceptRequest/{id}','RentRequestController@acceptRequest');
Route::get('myRequests/{id}','RentRequestController@showPendingRequests');