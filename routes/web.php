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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Prototype Routes*/
Route::group(['prefix' => 'apps'], function() {
	Route::get('/','Apps\UserMenuController@index')->name('home.index');
	Route::get('dashboard','Apps\DashboardController@index')->name('dashboard.index');
	Route::get('configuration','Apps\ConfigurationController@index')->name('config.index');
	Route::get('human-resources','Apps\HumanResourcesController@index')->name('hr.index');
	Route::get('grievance','Apps\GrievanceController@index')->name('grievance.index');
	Route::get('accounting','Apps\AccountingController@index')->name('accounting.index');

	Route::get('configuration/employee-position','Apps\ConfigurationController@positionIndex')->name('position.index');
	Route::get('configuration/leave-type','Apps\ConfigurationController@leaveTypeIndex')->name('leaveType.index');
	Route::get('configuration/reimburstment-type','Apps\ConfigurationController@reimbursTypeIndex')->name('reimbursType.index');
	Route::get('configuration/document-category','Apps\ConfigurationController@documentCategoryIndex')->name('docCat.index');
	Route::get('configuration/grievance-category','Apps\ConfigurationController@grievanceCategoryIndex')->name('grievCat.index');
});

