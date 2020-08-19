<?php

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
Route::get('users/profile/{id}', [
    'as' => 'profile',
    'uses' => 'UserController@profile'
]);

Route::post('projects/sendmail/{id}', [
    'as' => 'sendmail',
    'uses' => 'ProjectController@sendmail'
]);

Route::get('users/editrole', 'UserController@editrole');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('edituser', 'AssignprojectController@edituser');
Route::patch('/users/updatepassword/{id}', 'UserController@updatepassword'
);
Route::patch('users/updatepassword/{id}', [
    'as' => 'updatepassword',
    'uses' => 'UserController@updatepassword'
]);
Route::get('users/changepassword/{id}', [
    'as' => 'changepassword',
    'uses' => 'UserController@changepassword'
]);
Route::get('users/showproject/{id}', [
    'as' => 'showproject',
    'uses' => 'UserController@showproject'
]);

Route::get('activeproject', [
    'as' => 'activeproject',
    'uses' => 'ProjectstatusController@activeProject'
]);

Route::patch('updatepassword/{id}', 'UserController@updatepassword');
Route::resource('users', 'UserController');
Route::resource('projects', 'ProjectController');
Route::resource('pjstatus', 'ProjectstatusController')->middleware('checkuser');
Route::resource('assignedprojects', 'AssignprojectController')->middleware('checkuser');;
Route::resource('categories', 'CategoryController')->middleware('checkuser');;
Route::get('projectstatus/{id}', 'ProjectstatusController@activate');
Route::get('deactivateproject/{id}', 'ProjectstatusController@deactivate');
Route::get('assignproject/{id}', 'AssignprojectController@deassign')->middleware('checkuser');;
Route::get('adminregister', 'Auth\RegisterController@showadmin');
Route::post('ad', 'Auth\RegisterController@admincreate');
Route::get('assignedproject/{id}', 'ProjectstatusController@assignproject');
Route::get('inactiveproject', 'ProjectstatusController@inactiveProject');
Route::get('pjstatus/index', array('uses' => 'UserController@index', 'as' => 'users.index'));
