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

/* POSTULANT */
//get all
Route::get('postulant', 'PostulantController@getAll')->name('getAllPostulant');
//post
Route::post('postulant','PostulantController@add')->name('addPostulant');
//get one
Route::get('postulant/{id}', 'PostulantController@get')->name('getPostulant');
//edit/put
Route::post('postulant/{id}', 'PostulantController@edit')->name('editPostulant');
//delete
Route::get('postulant/delete/{id}', 'PostulantController@delete')->name('deletePostulant');

/* ANNOUNCEMENT */
//get all
Route::get('announcement', 'AnnouncementController@getAll')->name('getAllAnnouncement');
//post
Route::post('announcement','AnnouncementController@add')->name('addAnnouncement');
//get one
Route::get('announcement/{id}', 'AnnouncementController@get')->name('getAnnouncement');
//edit/put
Route::post('announcement/{id}', 'AnnouncementController@edit')->name('editAnnouncement');
//delete
Route::get('announcement/delete/{id}', 'AnnouncementController@delete')->name('deleteAnnouncement');