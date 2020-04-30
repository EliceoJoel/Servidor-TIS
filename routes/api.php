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

//POSTULANT//

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


//post/announcement
Route::post('announcement', 'AnnouncementController@add')->name ('addAnnouncement');
//get all announcement
Route::get('announcement', 'AnnouncementController@getAll')->name('getAllAnnouncement');
//get one
Route::get('announcement/{id}', 'AnnouncementController@get')->name('getAnnouncement');

<<<<<<< HEAD

//POSTULANTENABLE//
Route::get('postulantEnable', 'PostulantEnableController@getAll')->name('getAllPostulantEnable');
//post
Route::post('postulantEnable','PostulantEnableController@add')->name('addPostulantEnable');
//get one
Route::get('postulantEnable/{id}', 'PostulantEnableController@get')->name('getPostulantEnable');
//edit/put
Route::post('postulantEnable/{id}', 'PostulantEnableController@edit')->name('editPostulantEnable');
//delete
Route::get('postulantEnable/delete/{id}', 'PostulantEnableController@delete')->name('deletePostulantEnable');

=======
>>>>>>> b2821f4600177af89582ad3c0c7801fe8ed955a6
//REQUIREMENTCONV//
Route::post('requirement', 'RequirementConvController@add')->name ('addRequirement');
