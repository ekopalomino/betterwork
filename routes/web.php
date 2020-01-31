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
    return view('apps.pages.login');
});
/*Development Routes*/
Auth::routes(['register' => false]);
/* Prototype Routes*/
Route::group(['prefix' => 'apps', 'middleware' => ['auth']], function() {
	Route::get('user-home','Apps\UserMenuController@index')->name('userHome.index');
	Route::get('dashboard','Apps\DashboardController@index')->name('dashboard.index');
	Route::get('configuration','Apps\ConfigurationController@index')->name('config.index');
	Route::get('human-resources','Apps\HumanResourcesController@index')->name('hr.index');
	Route::get('grievance','Apps\GrievanceController@index')->name('grievance.index');
	Route::get('accounting','Apps\AccountingController@index')->name('accounting.index');

	Route::get('configuration/users','Apps\ConfigurationController@userIndex')->name('user.index');
	Route::post('configuration/users','Apps\ConfigurationController@userStore')->name('user.store');
	Route::get('configuration/users/edit/{id}','Apps\ConfigurationController@userEdit')->name('user.edit');
	Route::post('configuration/users/update/{id}','Apps\ConfigurationController@userUpdate')->name('user.update');
	Route::post('configuration/users/password/update','Apps\ConfigurationController@updatePassword')->name('userPassword.update');
	Route::post('configuration/users/suspend/{id}','Apps\ConfigurationController@userSuspend')->name('user.suspend');
	Route::post('configuration/users/delete/{id}','Apps\ConfigurationController@userDestroy')->name('user.destroy');
	Route::get('configuration/access-roles','Apps\ConfigurationController@roleIndex')->name('role.index');
	Route::get('configuration/access-roles/create','Apps\ConfigurationController@roleCreate')->name('role.create');
	Route::post('configuration/access-roles/store','Apps\ConfigurationController@roleStore')->name('role.store');
	Route::get('configuration/access-roles/edit/{id}','Apps\ConfigurationController@roleEdit')->name('role.edit');
	Route::post('configuration/access-roles/update/{id}','Apps\ConfigurationController@roleUpdate')->name('role.update');
	Route::post('configuration/access-roles/delete/{id}','Apps\ConfigurationController@roleDestroy')->name('role.destroy');
	Route::get('configuration/log-activity','Apps\ConfigurationController@logActivity')->name('logs.index');
	Route::get('configuration/application','Apps\ConfigurationController@applicationIndex')->name('application.index');
	Route::get('configuration/employee-position','Apps\ConfigurationController@positionIndex')->name('position.index');
	Route::get('configuration/leave-type','Apps\ConfigurationController@leaveTypeIndex')->name('leaveType.index');
	Route::get('configuration/reimburstment-type','Apps\ConfigurationController@reimbursTypeIndex')->name('reimbursType.index');
	Route::get('configuration/document-category','Apps\ConfigurationController@documentCategoryIndex')->name('docCat.index');
	Route::get('configuration/grievance-category','Apps\ConfigurationController@grievanceCategoryIndex')->name('grievCat.index');
	Route::get('configuration/chart-of-account','Apps\ConfigurationController@coaCategoryIndex')->name('coaCat.index');
	Route::get('configuration/asset-category','Apps\ConfigurationController@assetCategoryIndex')->name('assetCat.index');

	Route::get('human-resources/employee','Apps\HumanResourcesController@employeeIndex')->name('employee.index');
	Route::get('human-resources/attendance','Apps\HumanResourcesController@attendanceIndex')->name('attendance.index');
	Route::get('human-resources/attendance/request','Apps\HumanResourcesController@requestIndex')->name('request.index');
	Route::get('human-resources/appraisal','Apps\HumanResourcesController@appraisalIndex')->name('appraisal.index');

	Route::get('accounting/bank-statement','Apps\AccountingController@bankIndex')->name('bank.index');
});




