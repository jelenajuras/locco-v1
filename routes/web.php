<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Index page
Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
// Home page
Route::get('home', ['as' => 'home', 'uses' => 'User\HomeController@index']);

// Authorization
Route::get('login', ['as' => 'auth.login.form', 'uses' => 'Auth\SessionController@getLogin']);
Route::post('login', ['as' => 'auth.login.attempt', 'uses' => 'Auth\SessionController@postLogin']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\SessionController@getLogout']);

// Registration
Route::get('register', ['as' => 'auth.register.form', 'uses' => 'Auth\RegistrationController@getRegister']);
Route::post('register', ['as' => 'auth.register.attempt', 'uses' => 'Auth\RegistrationController@postRegister']);

// Activation
Route::get('activate/{code}', ['as' => 'auth.activation.attempt', 'uses' => 'Auth\RegistrationController@getActivate']);
Route::get('resend', ['as' => 'auth.activation.request', 'uses' => 'Auth\RegistrationController@getResend']);
Route::post('resend', ['as' => 'auth.activation.resend', 'uses' => 'Auth\RegistrationController@postResend']);

// Password Reset
Route::get('password/reset/{code}', ['as' => 'auth.password.reset.form', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset/{code}', ['as' => 'auth.password.reset.attempt', 'uses' => 'Auth\PasswordController@postReset']);
Route::get('password/reset', ['as' => 'auth.password.request.form', 'uses' => 'Auth\PasswordController@getRequest']);
Route::post('password/reset', ['as' => 'auth.password.request.attempt', 'uses' => 'Auth\PasswordController@postRequest']);



/*############# ADMIN ##############*/
Route::group(['prefix' => 'admin'], function () {
  // Dashboard
  Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);
  // Users
  Route::resource('users', 'Admin\UserController');
  // Roles
  Route::resource('roles', 'Admin\RoleController');
  //Posts
  Route::resource('cities', 'Admin\CityController', ['names' => [
  'index' 		=> 'admin.cities.index', 
  'create' 		=> 'admin.cities.create', 
  'store' 		=> 'admin.cities.store', 
  'show' 		=> 'admin.cities.show', 
  'edit' 		=> 'admin.cities.edit', 
  'update'		=> 'admin.cities.update', 
  'destroy'		=> 'admin.cities.destroy'
  ]]);
  Route::resource('customers', 'Admin\CustomerController', ['names' => [
  'index' 		=> 'admin.customers.index', 
  'create' 		=> 'admin.customers.create', 
  'store' 		=> 'admin.customers.store', 
  'show' 		=> 'admin.customers.show', 
  'edit' 		=> 'admin.customers.edit', 
  'update'		=> 'admin.customers.update', 
  'destroy'		=> 'admin.customers.destroy'
  ]]);
  Route::resource('projects', 'Admin\ProjectController', ['names' => [
  'index' 		=> 'admin.projects.index', 
  'create' 		=> 'admin.projects.create', 
  'store' 		=> 'admin.projects.store', 
  'show' 		=> 'admin.projects.show', 
  'edit' 		=> 'admin.projects.edit', 
  'update'		=> 'admin.projects.update', 
  'destroy'		=> 'admin.projects.destroy'
  ]]);
  Route::resource('departments', 'Admin\DepartmentController', ['names' => [
  'index' 		=> 'admin.departments.index', 
  'create' 		=> 'admin.departments.create', 
  'store' 		=> 'admin.departments.store', 
  'show' 		=> 'admin.departments.show', 
  'edit' 		=> 'admin.departments.edit', 
  'update'		=> 'admin.departments.update', 
  'destroy'		=> 'admin.departments.destroy'
  ]]);
  Route::resource('cars', 'Admin\CarController', ['names' => [
  'index' 		=> 'admin.cars.index', 
  'create' 		=> 'admin.cars.create', 
  'store' 		=> 'admin.cars.store', 
  'show' 		=> 'admin.cars.show', 
  'edit' 		=> 'admin.cars.edit', 
  'update'		=> 'admin.cars.update', 
  'destroy'		=> 'admin.cars.destroy'
  ]]);
  Route::resource('loccos', 'Admin\LoccoController', ['names' => [
  'index' 		=> 'admin.loccos.index', 
  'create' 		=> 'admin.loccos.create', 
  'store' 		=> 'admin.loccos.store', 
  'show' 		=> 'admin.loccos.show', 
  'edit' 		=> 'admin.loccos.edit', 
  'update'		=> 'admin.loccos.update', 
  'destroy'		=> 'admin.loccos.destroy'
  ]]);
});

//excel
Route::get('/getImport','ExcelController@getImport');
Route::post('/postImport','ExcelController@postImport');
Route::get('/deleteAll','ExcelController@deleteAll');
Route::get('/getExport','ExcelController@getExport');

Route::get('admin/showAll', ['as' => 'admin.showAll', 'uses' => 'Admin\LoccoController@showAll']);

