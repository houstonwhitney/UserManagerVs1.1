<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post(' /hote/login', 'Auth');
Route::group(['prefix' => '/auth'], function() {
    Route::post('/login','TestController@login');
});

//gestion des users
Route::group(['prefix' => '/user'], function() {
    Route::post('/save','UserController@ajoutUser');
    Route::get('/aff','UserController@getAllUser');
    Route::post('/update','UserController@updateUser');
    Route::post('/del/{id}','UserController@deleteUser');
    Route::get('/rech/{id}','UserController@findById');
    Route::get('/roles/{id}','UserController@getRolesById');
    Route::get('/rechName/{first_name}','UserController@findByName');
});

Route::get('/user/pass','UserController@getPasssword');


//gestion des  roles
Route::group(['prefix' => '/role'], function() {
    Route::post('/save','RoleController@ajoutRole');
    Route::post('/update','RoleController@updates');
    Route::post('/del/{id}','RoleController@deleteRole');
    Route::get('/rech/{id}','RoleController@findById');
    Route::get('/aff','RoleController@getAllRole');
});

//gestion des groups
Route::group(['prefix' => '/group'], function() {
    Route::put('/save','GroupController@ajoutGroup');
    Route::post('/del/{id}','GroupController@deleteGroup');
    Route::get('/rech/{id}','GroupController@findById');
    Route::post('/update','GroupController@updates');
    Route::get('/aff','GroupController@getAllGroup');
});


//gestion des Invitations
Route::group(['prefix' => '/inv'], function() {
    Route::post('/save','InvitationController@ajoutInvitation');
    Route::post('/del/{id}','InvitationController@deleteInv');
    Route::get('/rech/{id}','InvitationController@findById');
    Route::get('/aff','InvitationController@getAllInv');
    Route::post('/accept/{id}','InvitationController@accept');
    Route::post('/reject/{id}','InvitationController@refuse');
});


//gestion des permitions
Route::group(['prefix' => '/permit'], function() {
    Route::post('/save','permitionController@ajoutPermition');
    Route::post('/del/{id}','permitionController@deletepermition');
    Route::post('/update','permitionController@updates');
    Route::get('/rech/{id}','permitionController@findById');
    Route::get('/aff','permitionController@getAllpermition');
});


//gestion des users groupes
Route::group(['prefix' => '/usergroup'], function() {
    Route::post('/save','UserGroupController@ajoutUserGroup');
    Route::post('/del/{id}','UserGroupController@deleteUserGroup');
    Route::get('/rech/{id}','UserGroupController@findById');
    Route::get('/aff','UserGroupController@getAllUserGroup');
});


//gestio des roles permitions
Route::group(['prefix' => '/rolepermition'], function() {
    Route::post('/save','RolePermitionController@ajoutRolePermission');
    Route::post('/del/{id}','RolePermitionController@deleteRolePermission');
    Route::get('/rech/{id}','RolePermitionController@findById');
    Route::get('/aff','RolePermitionController@getAllRolePermission');
});


//gestio des users role
Route::group(['prefix' => '/userrole'], function() {
    Route::post('/save','UserRoleController@ajoutUserRole');
    Route::post('/del/{id}','UserRoleController@deleteUserRole');
    Route::get('/rech/{id}','UserRoleController@findById');
    Route::get('/aff','UserRoleController@getAllUserRole');
});

Route::get('sendbasicemail','MailController@basic_email');
// Route::get('sendhtmlemail','MailController@html_email');
// Route::get('sendattachmentemail','MailController@attachment_email');