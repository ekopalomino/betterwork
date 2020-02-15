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
	Route::get('change-password','Apps\DashboardController@changePasswordIndex')->name('changePass.index');
	Route::post('change-password/store','Apps\DashboardController@changePasswd')->name('changePass.store');
	/*Navbar Main Route*/
	Route::get('user-dashboard','Apps\UserMenuController@index')->name('userHome.index');
	Route::get('dashboard','Apps\DashboardController@index')->name('dashboard.index');
	Route::get('configuration','Apps\ConfigurationController@index')->name('config.index');
	Route::get('human-resources','Apps\HumanResourcesController@index')->name('hr.index');
	Route::get('grievance','Apps\GrievanceController@index')->name('grievance.index');
	Route::get('accounting','Apps\AccountingController@index')->name('accounting.index');
	/*User Manager Sub Menu Route*/
	Route::get('configuration/users','Apps\ConfigurationController@userIndex')->name('user.index');
	Route::post('configuration/users','Apps\ConfigurationController@userStore')->name('user.store');
	Route::get('configuration/users/edit/{id}','Apps\ConfigurationController@userEdit')->name('user.edit');
	Route::post('configuration/users/update/{id}','Apps\ConfigurationController@userUpdate')->name('user.update');
	Route::post('configuration/users/password/update','Apps\ConfigurationController@updatePassword')->name('userPassword.update');
	Route::post('configuration/users/suspend/{id}','Apps\ConfigurationController@userSuspend')->name('user.suspend');
	Route::post('configuration/users/delete/{id}','Apps\ConfigurationController@userDestroy')->name('user.destroy');
	/*Role Manager Sub Menu Route*/
	Route::get('configuration/access-roles','Apps\ConfigurationController@roleIndex')->name('role.index');
	Route::get('configuration/access-roles/create','Apps\ConfigurationController@roleCreate')->name('role.create');
	Route::post('configuration/access-roles/store','Apps\ConfigurationController@roleStore')->name('role.store');
	Route::get('configuration/access-roles/edit/{id}','Apps\ConfigurationController@roleEdit')->name('role.edit');
	Route::post('configuration/access-roles/update/{id}','Apps\ConfigurationController@roleUpdate')->name('role.update');
	Route::post('configuration/access-roles/delete/{id}','Apps\ConfigurationController@roleDestroy')->name('role.destroy');
	/*Log Activity Sub Menu Route*/
	Route::get('configuration/log-activity','Apps\ConfigurationController@logActivity')->name('logs.index');
	/*Application Setting Sub Menu Route*/
	Route::get('configuration/application','Apps\ConfigurationController@applicationIndex')->name('application.index');
	/*Employee Position Sub Menu Route*/
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
	Route::get('human-resources/employee/family/edit/{id}','Apps\HumanResourcesController@familyEdit')->name('employeeFamily.edit');
	Route::post('human-resources/employee/family/update/{id}','Apps\HumanResourcesController@familyUpdate')->name('employeeFamily.update');
	Route::get('human-resources/employee/education/edit/{id}','Apps\HumanResourcesController@educationEdit')->name('employeeEducation.edit');
	Route::post('human-resources/employee/education/update/{id}','Apps\HumanResourcesController@educationUpdate')->name('employeeEducation.update');
	Route::get('human-resources/employee/training/edit/{id}','Apps\HumanResourcesController@trainingEdit')->name('employeeTraining.edit');
	Route::post('human-resources/employee/training/update/{id}','Apps\HumanResourcesController@trainingUpdate')->name('employeeTraining.update');
	Route::get('human-resources/employee/service/edit/{id}','Apps\HumanResourcesController@serviceEdit')->name('employeeService.edit');
	Route::post('human-resources/employee/service/update/{id}','Apps\HumanResourcesController@serviceUpdate')->name('employeeService.update');
	
	Route::get('human-resources/employee/training','Apps\HumanResourcesController@trainingIndex')->name('training.index');

	Route::get('human-resources/bulletin','Apps\HumanResourcesController@bulletinIndex')->name('bulletin.index');
	Route::get('human-resources/bulletin/create','Apps\HumanResourcesController@bulletinCreate')->name('bulletin.create');
	Route::post('human-resources/bulletin/store','Apps\HumanResourcesController@bulletinStore')->name('bulletin.store');
	Route::get('human-resources/bulletin/show/{id}','Apps\HumanResourcesController@bulletinShow')->name('bulletin.show');
	Route::get('human-resources/bulletin/edit/{id}','Apps\HumanResourcesController@bulletinEdit')->name('bulletin.edit');
	Route::post('human-resources/bulletin/update/{id}','Apps\HumanResourcesController@knowledgeUpdate')->name('bulletin.update');
	Route::post('human-resources/bulletin/destroy/{id}','Apps\HumanResourcesController@bulletinDelete')->name('bulletin.destroy');

	Route::get('human-resources/knowledgebase','Apps\HumanResourcesController@knowledgeIndex')->name('knowledge.index');
	Route::get('human-resources/knowledgebase/create','Apps\HumanResourcesController@knowledgeCreate')->name('knowledge.create');
	Route::post('human-resources/knowledgebase/store','Apps\HumanResourcesController@knowledgeStore')->name('knowledge.store');
	Route::get('human-resources/knowledgebase/show/{id}','Apps\HumanResourcesController@knowledgeShow')->name('knowledge.show');
	Route::get('human-resources/knowledgebase/edit/{id}','Apps\HumanResourcesController@knowledgeEdit')->name('knowledge.edit');
	Route::post('human-resources/knowledgebase/update/{id}','Apps\HumanResourcesController@bulletinUpdate')->name('knowledge.update');
	Route::post('human-resources/knowledgebase/destroy/{id}','Apps\HumanResourcesController@knowledgeDelete')->name('knowledge.destroy');

	Route::get('human-resources/attendance','Apps\HumanResourcesController@attendanceIndex')->name('attendance.index');
	Route::post('human-resources/attendance/search','Apps\HumanResourcesController@attendanceSearch')->name('attendance.search');
	Route::get('human-resources/attendance/request','Apps\HumanResourcesController@requestIndex')->name('request.index');
	Route::get('human-resources/attendance/request/show/{id}','Apps\HumanResourcesController@requestShow')->name('request.show');
	Route::post('human-resources/attendance/request/update/{id}','Apps\HumanResourcesController@requestUpdate')->name('request.update');
	Route::get('human-resources/leave','Apps\HumanResourcesController@employeeLeave')->name('employeeLeave.index');
	Route::get('human-resources/leave/leave-card/{id}','Apps\HumanResourcesController@employeeLeaveCard')->name('employeeLeaveCard.index');

	Route::get('human-resources/appraisal','Apps\HumanResourcesController@appraisalIndex')->name('appraisal.index');
	Route::get('human-resources/appraisal/show/{id}','Apps\HumanResourcesController@appraisalShow')->name('appraisal.show');
	Route::get('human-resources/appraisal/edit/{id}','Apps\HumanResourcesController@targetEdit')->name('appraisal.edit');
	Route::get('human-resources/appraisal/target/edit/{id}','Apps\HumanResourcesController@targetChange')->name('appraisalTarget.edit');
	Route::post('human-resources/appraisal/target/update/{id}','Apps\HumanResourcesController@targetUpdate')->name('appraisalTarget.update');
	Route::post('human-resources/appraisal/target/delete/{id}','Apps\HumanResourcesController@targetDestroy')->name('appraisalTarget.destroy');
	Route::get('human-resources/appraisal/target/soft-goal/create/{id}','Apps\HumanResourcesController@softGoalCreate')->name('softGoal.create');
	Route::post('human-resources/appraisal/target/soft-goal/store','Apps\HumanResourcesController@softGoalStore')->name('softGoal.store');
	Route::get('human-resources/appraisal/target/soft-goal/edit/{id}','Apps\HumanResourcesController@softGoalEdit')->name('softGoal.edit');
	Route::post('human-resources/appraisal/target/soft-goal/update/{id}','Apps\HumanResourcesController@softGoalUpdate')->name('softGoal.update');
	Route::post('human-resources/appraisal/target/soft-goal/delete/{id}','Apps\HumanResourcesController@softGoalDelete')->name('softGoal.destroy');
	Route::post('human-resources/appraisal/comment/{id}','Apps\HumanResourcesController@appraisalComment')->name('appraisal.comment');
	Route::get('human-resources/appraisal/close/{id}','Apps\HumanResourcesController@appraisalClose')->name('appraisal.close');
	Route::post('human-resources/appraisal/close/process/{id}','Apps\HumanResourcesController@appraisalCloseProcess')->name('appraisal.done');

	Route::get('human-resources/appraisal/target/additional-role/create/{id}','Apps\HumanResourcesController@additionalRoleCreate')->name('additionalRole.create');
	Route::post('human-resources/appraisal/target/additional-role/store','Apps\HumanResourcesController@additionalRoleStore')->name('additionalRole.store');
	Route::get('human-resources/appraisal/target/additional-role/edit/{id}','Apps\HumanResourcesController@additionalRoleEdit')->name('additionalRole.edit');
	Route::post('human-resources/appraisal/target/additional-role/update/{id}','Apps\HumanResourcesController@additionalRoleUpdate')->name('additionalRole.update');
	Route::post('human-resources/appraisal/target/additional-role/delete/{id}','Apps\HumanResourcesController@additionalRoleDelete')->name('additionalRole.destroy');

	Route::post('human-resources/appraisal/update/{id}','Apps\HumanResourcesController@appraisalUpdate')->name('appraisal.update');

	Route::get('human-resources/salary','Apps\HumanResourcesController@salaryIndex')->name('salary.index');
	Route::post('human-resources/salary/store','Apps\HumanResourcesController@salaryProcess')->name('salary.store');
	Route::get('human-resources/salary/show-detail/{period}','Apps\HumanResourcesController@salaryShow')->name('salary.show');
	Route::post('human-resources/salary/approve/{period}','Apps\HumanResourcesController@salaryApproval')->name('salary.approve');
	Route::post('human-resources/salary/approve/{period}','Apps\HumanResourcesController@salaryReject')->name('salary.reject');
	Route::get('human-resources/salary/show-slip/{empNo}','Apps\HumanResourcesController@salaryEmpShow')->name('salarySlips.show');

	Route::get('human-resources/reimbursment','Apps\HumanResourcesController@reimbursIndex')->name('reimburs.index');
	Route::post('human-resources/reimbursment/approve/{id}','Apps\HumanResourcesController@reimbursApprove')->name('reimburs.approve');
	Route::post('human-resources/reimbursment/reject/{id}','Apps\HumanResourcesController@reimbursApprove')->name('reimburs.reject');

	Route::get('grievance/database','Apps\GrievanceController@grievanceData')->name('grievanceData.index');
	Route::get('grievance/manual-input','Apps\GrievanceController@grievanceCreate')->name('grievanceData.create');
	Route::get('grievance/database/show/{id}','Apps\GrievanceController@grievanceShow')->name('grievanceData.show');
	Route::get('grievance/database/edit/{id}','Apps\GrievanceController@grievanceEdit')->name('grievanceData.edit');
	Route::post('grievance/database/update/{id}','Apps\GrievanceController@grievanceUpdate')->name('grievanceData.update');
	Route::post('grievance/database/comment/{id}','Apps\GrievanceController@grievanceComment')->name('grievanceData.comment');
	Route::post('grievance/database/close/{id}','Apps\GrievanceController@grievanceClose')->name('grievanceData.closed');
	Route::post('grievance/database/publish/{id}','Apps\GrievanceController@grievancePublish')->name('grievanceData.publish');
	Route::get('grievance/management-respond','Apps\GrievanceController@managementData')->name('managementGrievance.index');
	Route::get('grievance/management-respond/show/{id}','Apps\GrievanceController@grievanceManagementShow')->name('managementGrievance.show');
	Route::get('accounting/bank-statement','Apps\AccountingController@bankIndex')->name('bank.index');

	Route::get('my-menu/update-profile','Apps\UserMenuController@profileEdit')->name('profile.edit');
	Route::post('my-menu/attendance-in','Apps\UserMenuController@clockIn')->name('attendanceIn.store');
	Route::post('my-menu/attendance/task/edit','Apps\UserMenuController@taskEdit')->name('attendanceTask.update');
	Route::post('my-menu/attendance-out','Apps\UserMenuController@clockOut')->name('attendanceOut.store');
	Route::get('my-menu/leave-request','Apps\UserMenuController@leaveIndex')->name('myLeave.index');
	Route::post('my-menu/leave-request/create','Apps\UserMenuController@leaveRequest')->name('myLeave.store');
	Route::get('my-menu/reimbursment','Apps\UserMenuController@reimbursIndex')->name('myReimburs.index');
	Route::post('my-menu/reimbursment/create','Apps\UserMenuController@reimbursStore')->name('myReimburs.store');
	Route::get('my-menu/grievance','Apps\UserMenuController@grievanceIndex')->name('myGrievance.index');
	Route::get('my-menu/grievance/create','Apps\UserMenuController@grievanceCreate')->name('myGrievance.create');
	Route::post('my-menu/reimbursment/store','Apps\UserMenuController@grievanceStore')->name('myGrievance.store');
	Route::get('my-menu/grievance/edit/{id}','Apps\UserMenuController@grievanceEdit')->name('myGrievance.edit');
	Route::post('my-menu/grievance/update/{id}','Apps\UserMenuController@grievanceUpdate')->name('myGrievance.update');
	Route::get('my-menu/grievance/view/{id}','Apps\UserMenuController@grievanceShow')->name('myGrievance.show');
	Route::post('my-menu/grievance/respond/{id}','Apps\UserMenuController@grievanceComment')->name('myGrievance.respond');
	Route::post('my-menu/grievance/rate/{id}','Apps\UserMenuController@grievanceRate')->name('myGrievance.rate');
	Route::get('my-menu/appraisal','Apps\UserMenuController@appraisalIndex')->name('myAppraisal.index');
	Route::get('my-menu/appraisal/create','Apps\UserMenuController@appraisalCreate')->name('myAppraisal.create');
	Route::post('my-menu/appraisal/store','Apps\UserMenuController@appraisalStore')->name('myAppraisal.store');
	Route::get('my-menu/appraisal/add-detail/{id}','Apps\UserMenuController@appraisalDetail')->name('myAppraisal.detail');
	Route::get('my-menu/appraisal/add-detail/comment/{id}','Apps\UserMenuController@appraisalComment')->name('myAppraisal.comment');
	Route::post('my-menu/appraisal/add-detail/comment/store','Apps\UserMenuController@commentStore')->name('myAppraisalComment.store');
	Route::get('my-menu/appraisal/add-target/create/{id}','Apps\UserMenuController@targetCreate')->name('myTarget.create');
	Route::get('my-menu/appraisal/add-target/development/create/{id}','Apps\UserMenuController@developmentCreate')->name('myDevelopment.create');
	Route::post('my-menu/appraisal/add-target/store','Apps\UserMenuController@targetStore')->name('myTarget.store');
	Route::post('my-menu/appraisal/add-target/development/store','Apps\UserMenuController@developmentStore')->name('myDevelopment.store');
	Route::get('my-menu/appraisal/show/{id}','Apps\UserMenuController@appraisalShow')->name('myAppraisal.show');
	Route::get('my-menu/appraisal/edit/{id}','Apps\UserMenuController@appraisalEdit')->name('myAppraisal.edit');
	Route::get('my-menu/appraisal/target/edit/{id}','Apps\UserMenuController@targetEdit')->name('myTarget.edit');
	Route::post('my-menu/appraisal/update-target/update/{id}','Apps\UserMenuController@appraisalUpdate')->name('myTarget.update');

	Route::get('my-menu/training','Apps\UserMenuController@trainingIndex')->name('myTraining.index');
	Route::get('my-menu/training/edit/{id}','Apps\UserMenuController@trainingEdit')->name('myTraining.edit');

	Route::get('my-menu/bulletin','Apps\UserMenuController@bulletinIndex')->name('myBulletin.index');
	Route::get('my-menu/bulletin/show/{id}','Apps\UserMenuController@bulletinShow')->name('myBulletin.show');
	Route::get('my-menu/knowledge','Apps\UserMenuController@knowledgeIndex')->name('myKnowledge.index');
	Route::get('my-menu/knowledge/show/{id}','Apps\UserMenuController@knowledgeShow')->name('myKnowledge.show');
	Route::get('my-menu/attendance','Apps\UserMenuController@attendanceIndex')->name('myAttendance.index');
	Route::post('my-menu/attendance/search','Apps\UserMenuController@attendanceSearch')->name('myAttendance.search');

	Route::get('human-resources/reports/attendance','Apps\ReportsController@attendanceReport')->name('attReport.index');
	Route::post('human-resources/reports/attendance/result','Apps\ReportsController@attendanceProcess')->name('attReport.result');
	Route::get('human-resources/reports/attendance/result/detail/{ID}/{startDate}/{endDate}','Apps\ReportsController@attendanceDetail')->name('attReport.detail');
	Route::get('human-resources/reports/attendance/result/print/{ID}/{startDate}/{endDate}','Apps\ReportsController@attendancePrint')->name('attReport.print');
	Route::get('human-resources/reports/attendance/result/pdf/{ID}/{startDate}/{endDate}','Apps\ReportsController@attendancePdf')->name('attReport.export');

	Route::get('human-resources/reports/payroll-and-allowance','Apps\ReportsController@financeReport')->name('payReport.index');

});




