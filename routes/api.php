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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('profile', 'UserController@getAuthenticatedUser');
Route::post('userAnnouncement','UserAnnouncementController@saveAnnouncement')->name('addAnnouncementToUser');

//FUNCTIONS//
Route::post('studentsData', 'functionsController@getStudents')->name('getStudent');
Route::post('percentageData', 'functionsController@getPercentage')->name('getPercentage');
Route::get('finalScores/{id}', 'functionsController@getFinalScores')->name('getFinalScores');
Route::get('theoryScore/{id}/{pos}', 'functionsController@getTheory')->name('getTheoryScores');
Route::get('getAverage/{id}', 'functionsController@getAverage')->name('getAverage');
Route::get('updateRol/{id}/{rol}', 'functionsController@updateRol')->name('updateROl');


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
//ANNOUNCEMENT//

//post/announcement
Route::post('announcement', 'AnnouncementController@add')->name ('addAnnouncement');
//get all announcement
Route::get('announcement', 'AnnouncementController@getAll')->name('getAllAnnouncement');
//get one
Route::get('announcement/{id}', 'AnnouncementController@get')->name('getAnnouncement');
//announcementsearch
Route::post('announcementSearch', 'AnnouncementController@search')->name ('searchAnnouncement');





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

//REQUIREMENTCONV//
Route::post('requirement', 'RequirementConvController@add')->name ('addRequirement');

Route::post('requirementList','RequirementConvController@getReq')->name('getRequirement');

//REGISTER BOOK//
Route::get('registerBook', 'RegisterBookController@getAll')->name('getAllRegisterBook');
//post
Route::post('registerBook','RegisterBookController@add')->name('addRegisterBook');
//get one
Route::get('registerBook/{id}', 'RegisterBookController@get')->name('getRegisterBook');
//edit/put
Route::post('registerBook/{id}', 'RegisterBookController@edit')->name('editRegisterBook');
//delete
Route::get('registerBook/delete/{id}', 'RegisterBookController@delete')->name('deleteRegisterBook');
//para habilitar postulante
Route::get('registerBookEnable', 'RegisterBookController@getPostulant')->name('getPostulant');
//post
Route::post('registerBookEnable','RegisterBookController@verify')->name('verifyPostulant');

//POSTULANTENABLE//
//post postulantenable
Route::post('postulantenable', 'PostulantEnableController@add')->name ('addPostulantEnable');
//get all postulantenable
Route::get('postulantenable', 'PostulantEnableController@getAll')->name('getAllPostulantEnable');
//get by enable=true
Route::get('enablePostulant', 'PostulantEnableController@getbyTrue')->name('getPostulantEnable');

//IMPORTANTDATE//
Route::post('importantDate', 'ImportantDateController@add')->name ('addImportantDate');
//get all postulantenable
Route::get('importantDate', 'ImportantDateController@getAll')->name('getAllImportantDate');

// //POSTULANTENABLE//
// //post postulantenable
// Route::post('postulantenable', 'PostulantEnableController@add')->name ('addPostulantEnable');
// //get all postulantenable
// Route::get('postulantenable', 'PostulantEnableController@getAll')->name('getAllPostulantEnable');

// POSTULANT SCORE//

Route::get('postulantScore', 'postulantScoreController@getAll')->name('getAllScores');

//update score
Route::post('update/{id}', 'postulantScoreController@edit')->name('updateScore');

Route::post('add', 'postulantScoreController@add')->name('addScore');

Route::post('labScore', 'labScoreController@add')->name('addLabScore');



//USER FUNCTIONS//
//get postulant with scores//
Route::get('students', 'UserController@getStudentsScores')->name('getAllStudents');
//get all
Route::get('user', 'UserController@getAll')->name('getAllPermission');
//post
Route::post('user','UserController@add')->name('addUser');
//get one
Route::get('user/{id}', 'UserController@get')->name('getUser');
//edit/put
Route::post('user/{id}', 'UserController@edit')->name('editUser');
//delete
Route::get('user/delete/{id}', 'UserController@delete')->name('deleteUser');
//get announcements
Route::get('userAnnouncement/{id}', 'functionsController@getAnnouncements')->name('getUserAnnouncement');

Route::get('userAnnouncementLab/{id}', 'functionsController@getAnnouncementsLab')->name('getUserAnnouncementLab');

Route::get('userAuxiliary/{id}/{conv}', 'functionsController@getUserAuxiliary')->name('getUserAuxiliary');

Route::get('userTheme/{id}/{conv}/{aux}', 'functionsController@getUserTheme')->name('getUserTheme');

// getAllUsers
Route::get('AllUsers', 'UserController@getUsers')->name('getAllUsers');



//AUXILIARY//

//get all
Route::get('auxiliary', 'AuxiliaryController@getAll')->name('getAllAuxiliary');
//post
Route::post('auxiliary','AuxiliaryController@add')->name('addAuxiliary');
//get one
Route::get('auxiliary/{id}', 'AuxiliaryController@get')->name('getAuxiliary');
//post get auxiliary de una convocatoria
Route::post('auxiliarySearch','AuxiliaryController@search')->name('searchAuxiliary');


//get auxiliary per id conv
Route::get('getAux/{id}', 'functionsController@getAuxConv')->name('getAuxiliary');

//THEMEAUXILIARY//

//get all
Route::get('themeAuxiliary', 'ThemeAuxiliaryController@getAll')->name('getAllThemeAuxiliary');
//post
Route::post('themeAuxiliary','ThemeAuxiliaryController@add')->name('addThemeAuxiliary');
//get one
Route::get('themeAuxiliary/{id}', 'ThemeAuxiliaryController@get')->name('getThemeAuxiliary');
//post get theme de una convocatoria
Route::post('themeAuxiliarySearch','ThemeAuxiliaryController@search')->name('searchThemeAuxiliary');


//MERIT//

//get all
Route::get('merit', 'MeritController@getAll')->name('getAllMerit');
//post
Route::post('merit','MeritController@add')->name('addMerit');
//get one
Route::get('merit/{id}', 'MeritController@get')->name('getMerit');
//post get theme de una convocatoria
Route::post('meritSearch','MeritController@search')->name('searchMerit');
//update the porcentage and type
Route::post('meritUpdate','MeritController@update')->name('updateMerit');
//get por nombre de convocatoria
Route::get('getMerit/{name}', 'MeritController@getByNameAnnouncement')->name('getMeritByNameAnnouncement');
//get by announement
Route::post('meritByAnnouncement','MeritController@getByAnnouncement')->name('getByAnnouncementMerit');
//delete one percentage by id
Route::post('deleteMerit','MeritController@delete')->name('deleteMerit');
//end Configuration merit
Route::post('endConfigurationMerit','MeritController@endConfiguration')->name('endConfigurationMerit');

//PERCENTAGEAUXILIARY//

//get all
Route::get('percentageAuxiliary', 'PercentageAuxiliaryController@getAll')->name('getAllPercentageAuxiliary');
//post
Route::post('percentageAuxiliary','PercentageAuxiliaryController@add')->name('addPercentageAuxiliary');
//get one
Route::get('percentageAuxiliary/{id}', 'PercentageAuxiliaryController@get')->name('getPercentageAuxiliary');
//get by announement
Route::post('percentageAuxiliaryAnnouncement','PercentageAuxiliaryController@getByAnnouncement')->name('getByAnnouncementPercentageAuxiliary');
//delete one percentage by id
Route::post('percentageAuxiliaryDelete','PercentageAuxiliaryController@delete')->name('deletePercentageAuxiliary');

//get theme per id auxiliary
Route::post('getTheme', 'functionsController@getTheme')->name('getTheme');

//end Configuration lab
Route::post('endConfigurationLab','PercentageAuxiliaryController@endConfigurationLab')->name('endConfigurationPercentageAuxiliary');


//ROL//
//get all
Route::get('rol', 'RolController@getAll')->name('getAllRol');
//post
Route::post('rol','RolController@add')->name('addRol');
//get one
Route::get('rol/{id}', 'RolController@get')->name('getRol');
//edit/put
Route::post('rol/{id}', 'RolController@edit')->name('editRol');
//delete
Route::get('rol/delete/{id}', 'RolController@delete')->name('deleteRol');

//PERMISSION//
//get all
Route::get('permission', 'PermissionController@getAll')->name('getAllPermission');
//post
Route::post('permission','PermissionController@add')->name('addPermission');
//get one
Route::get('permission/{id}', 'PermissionController@get')->name('getPermission');
//get by idRol
Route::get('permission/rol/{idRol}', 'PermissionController@getByRol')->name('getPermissionByRol');
//edit/put
Route::post('permission/{id}', 'PermissionController@edit')->name('editPermission');
//delete
Route::get('permission/delete/{id}', 'PermissionController@delete')->name('deletePermission');

//Meritos Register//
//post
Route::post('meritosRegister', 'MeritosRegisterController@add')->name('addmeritosPermision');

//NOTAS//
//push meritos note
Route::post('notaMeritos', 'NotasController@addMerito')->name('addNotaMerito');
//get meritos data and postulant
Route::get('obtenerNotasMerito', 'NotasController@getMeritos')->name('getNotasMerito');
//get de todas las notas
Route::get('allNotes', 'NotasController@getAllNotes')->name('getAllNotes');
//get percentage announcement
Route::get('getper', 'NotasController@getPercentage')->name('getAllNotes');

Route::post('notaConocimiento', 'NotasController@addConocimiento')->name('addNotaConocimiento');



//CONFIGURACION CONVOCATORIA//

//get all
Route::get('configAnnouncement', 'ConfigAnnouncementController@getAll')->name('getAllConfigAnnouncement');
//post
Route::post('configAnnouncement','ConfigAnnouncementController@add')->name('addConfigAnnouncement');
//finalizar configuracion de meritos
Route::post('finishConfigurationMerit','ConfigAnnouncementController@finishConfigurationMerit')->name('finishConfigMerit');
//finalizar configuracion de conocimiento
Route::post('finishConfigurationKnowledge','ConfigAnnouncementController@finishConfigurationKnowledge')->name('finishConfigKnowledge');

//PORCENTAJE DE MERITO Y CONOCIMIENTO CONVOCATORIA//

//get all
Route::get('percentageAnnouncement', 'PercentageAnnouncementController@getAll')->name('getAllPercentageAnnouncement');
//post
Route::post('percentageAnnouncement','PercentageAnnouncementController@add')->name('addPercentageAnnouncement');

//PORCENTAJE PARA CONOCIMIENTO DE DOCENCIA//

//get all
Route::get('percentageKnowledgeDoc', 'PercentageKnowledgeDocController@getAll')->name('getAllPercentageKnowledgeDoc');
//post
Route::post('percentageKnowledgeDoc','PercentageKnowledgeDocController@add')->name('addPercentageKnowledgeDoc');
//get by announement
Route::post('percentageKnowledgeDocAnn','PercentageKnowledgeDocController@getByAnnouncement')->name('getByAnnouncementPercentageKnowledgeDoc');
//delete one percentage by id
Route::post('percentageKnowledgeDocDelete','PercentageKnowledgeDocController@delete')->name('deletePercentageKnowledgeDoc');
//terminar configuracion para conocimiento de docencia
Route::post('endConfigurationDoc','PercentageKnowledgeDocController@endConfiguration')->name('endConfigurationMerit');

