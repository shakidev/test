<?php
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'department', 'middleware' => 'auth'], function () {
    Route::get('/', 'DepartmentController@index')->name('department');
    Route::get('create', 'DepartmentController@create')->name('department.create');
    Route::patch('create', 'DepartmentController@store')->name('department.store');
    Route::get('edit/{id}', 'DepartmentController@edit')->name('department.edit');
    Route::put('edit/{id}', 'DepartmentController@update')->name('department.update');
    Route::delete('delete/{id}', 'DepartmentController@destroy')->name('department.delete');
    Route::get('/show/{id}', 'DepartmentController@show')->name('department.show');
});
Route::group(['prefix' => 'project', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProjectController@index')->name('project');
    Route::get('create', 'ProjectController@create')->name('project.create');
    Route::patch('create', 'ProjectController@store')->name('project.store');
    Route::get('edit/{id}', 'ProjectController@edit')->name('project.edit');
    Route::put('edit/{id}', 'ProjectController@update')->name('project.update');
    Route::delete('delete/{id}', 'ProjectController@destroy')->name('project.delete');
    Route::get('/show/{id}', 'ProjectController@show')->name('project.show');
});
Route::group(['prefix' => 'employee', 'middleware' => 'auth'], function () {
    Route::get('/', 'EmployeeController@index')->name('employee');
    Route::get('create', 'EmployeeController@create')->name('employee.create');
    Route::patch('create', 'EmployeeController@store')->name('employee.store');
    Route::get('edit/{id}', 'EmployeeController@edit')->name('employee.edit');
    Route::put('edit/{id}', 'EmployeeController@update')->name('employee.update');
    Route::delete('delete/{id}', 'EmployeeController@destroy')->name('employee.delete');
    Route::get('/show/{id}', 'EmployeeController@show')->name('employee.show');
});