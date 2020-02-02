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
Route::group(['prefix' => 'apps', 'middleware' => ['auth']], function() {
	/*Navbar Main Route*/
	Route::get('user-dashboard','Apps\UserMenuController@index')->name('userHome.index');
	Route::get('dashboard','Apps\DashboardController@index')->name('dashboard.index');
	Route::get('configuration','Apps\ConfigurationController@index')->name('config.index');
	Route::get('human-resources','Apps\HumanResourcesController@index')->name('hr.index');
	Route::get('grievance','Apps\GrievanceController@index')->name('grievance.index');
	Route::get('accounting','Apps\AccountingController@index')->name('accounting.index');

	/*Configuration Sub Menu Route*/
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
	Route::post('configuration/employee-position/store','Apps\ConfigurationController@positionStore')->name('position.store');
	Route::get('configuration/employee-position/edit/{id}','Apps\ConfigurationController@positionEdit')->name('position.edit');
	Route::post('configuration/employee-position/update/{id}','Apps\ConfigurationController@positionUpdate')->name('position.update');
	Route::post('configuration/employee-position/delete/{id}','Apps\ConfigurationController@positionDestroy')->name('position.destroy');

	Route::get('configuration/leave-type','Apps\ConfigurationController@leaveTypeIndex')->name('leaveType.index');
	Route::post('configuration/leave-type/store','Apps\ConfigurationController@leaveTypeStore')->name('leaveType.store');
	Route::get('configuration/leave-type/edit/{id}','Apps\ConfigurationController@leaveTypeEdit')->name('leaveType.edit');
	Route::post('configuration/leave-type/update/{id}','Apps\ConfigurationController@leaveTypeUpdate')->name('leaveType.update');
	Route::post('configuration/leave-type/delete/{id}','Apps\ConfigurationController@leaveTypeDestroy')->name('leaveType.destroy');

	Route::get('configuration/reimburstment-type','Apps\ConfigurationController@reimbursTypeIndex')->name('reimbursType.index');
	Route::post('configuration/reimburstment-type/store','Apps\ConfigurationController@reimbursTypeStore')->name('reimbursType.store');
	Route::get('configuration/reimburstment-type/edit/{id}','Apps\ConfigurationController@reimbursTypeEdit')->name('reimbursType.edit');
	Route::post('configuration/reimburstment-type/update/{id}','Apps\ConfigurationController@reimbursTypeUpdate')->name('reimbursType.update');
	Route::post('configuration/reimburstment-type/delete/{id}','Apps\ConfigurationController@reimbursTypeDestroy')->name('reimbursType.destroy');

	Route::get('configuration/document-category','Apps\ConfigurationController@documentCategoryIndex')->name('docCat.index');
	Route::post('configuration/document-category/store','Apps\ConfigurationController@documentCategoryStore')->name('docCat.store');
	Route::get('configuration/document-category/edit/{id}','Apps\ConfigurationController@documentCategoryEdit')->name('docCat.edit');
	Route::post('configuration/document-category/update/{id}','Apps\ConfigurationController@documentCategoryUpdate')->name('docCat.update');
	Route::post('configuration/document-category/delete/{id}','Apps\ConfigurationController@documentCategoryDestroy')->name('docCat.destroy');
	
	Route::get('configuration/grievance-category','Apps\ConfigurationController@grievanceCategoryIndex')->name('grievCat.index');
	Route::post('configuration/grievance-category/store','Apps\ConfigurationController@grievanceCategoryStore')->name('grievCat.store');
	Route::get('configuration/grievance-category/edit/{id}','Apps\ConfigurationController@grievanceCategoryEdit')->name('grievCat.edit');
	Route::post('configuration/grievance-category/update/{id}','Apps\ConfigurationController@grievanceCategoryUpdate')->name('grievCat.update');
	Route::post('configuration/grievance-category/delete/{id}','Apps\ConfigurationController@grievanceCategoryDestroy')->name('grievCat.destroy');

	Route::get('configuration/chart-of-account','Apps\ConfigurationController@coaCategoryIndex')->name('coaCat.index');
	Route::post('configuration/chart-of-account/store','Apps\ConfigurationController@coaCategoryStore')->name('coaCat.store');
	Route::get('configuration/chart-of-account/edit/{id}','Apps\ConfigurationController@coaCategoryEdit')->name('coaCat.edit');
	Route::post('configuration/chart-of-account/update/{id}','Apps\ConfigurationController@coaCategoryUpdate')->name('coaCat.update');
	Route::post('configuration/chart-of-account/delete/{id}','Apps\ConfigurationController@coaCategoryDestroy')->name('coaCat.destroy');

	Route::get('configuration/asset-category','Apps\ConfigurationController@assetCategoryIndex')->name('assetCat.index');

	Route::get('human-resources/employee','Apps\HumanResourcesController@employeeIndex')->name('employee.index');
	Route::get('human-resources/employee/create','Apps\HumanResourcesController@employeeCreate')->name('employee.create');
	Route::post('human-resources/employee/store','Apps\HumanResourcesController@employeeStore')->name('employee.store');
	Route::get('human-resources/employee/edit/{id}','Apps\HumanResourcesController@employeeEdit')->name('employee.edit');
	Route::post('human-resources/employee/update/{id}','Apps\HumanResourcesController@employeeUpdate')->name('employee.update');
	Route::post('human-resources/employee/delete/{id}','Apps\HumanResourcesController@employeeDelete')->name('employee.destroy');
	
	Route::get('human-resources/attendance','Apps\HumanResourcesController@attendanceIndex')->name('attendance.index');
	Route::get('human-resources/attendance/request','Apps\HumanResourcesController@requestIndex')->name('request.index');
	Route::get('human-resources/appraisal','Apps\HumanResourcesController@appraisalIndex')->name('appraisal.index');

	Route::get('accounting/bank-statement','Apps\AccountingController@bankIndex')->name('bank.index');

	Route::post('my-menu/attendance-in','Apps\UserMenuController@clockIn')->name('attendanceIn.store');
	Route::post('my-menu/attendance-out','Apps\UserMenuController@clockOut')->name('attendanceOut.store');
});




