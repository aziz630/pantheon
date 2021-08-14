<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpDashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FeeCategoryAmountController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\MonthlySalaryController;
use App\Http\Controllers\AccountEmployeeSalaryController;
use App\Http\Controllers\ProfitController;


// use App\Http\Controllers\DomesticController;
use App\Http\Controllers\ResigneController;
use App\Http\Controllers\OtherFeeController;
use App\Http\Controllers\AccountStudentsFeeController;
use App\Http\Controllers\AccountOtherCostController;

use App\Http\Controllers\RegistrationFeeController;
use App\Http\Controllers\MonthlyFeeController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\PreviousSchoolController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\PagesController;

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


/**** Royal School Routes ****/

Route::get('/', function () {
	return view('auth.login');
});

Route::group(['middleware'=>['auth']], function (){

	// Route::get('/emp_dashboard', [EmpDashboardController::class, 'index']);
	// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/resigne', [EmployController::class, 'resign_employ']);

});

Route::group(['middleware'=>['auth']], function (){

	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/classes/{p?}', [ClassController::class, 'classes_list']);
	Route::get('/get_classes', [ClassController::class, 'read_all_classes']);
	Route::get('/trashed_classes', [ClassController::class, 'read_all_trashed_classes']);

	Route::get('/class_create', [ClassController::class, 'create_class']);
	Route::post('/class_create', [ClassController::class, 'save_class'])->name('class.save');

	Route::get('/class_edit/{id}', [ClassController::class, 'edit_class']);
	Route::post('/class_edit', [ClassController::class, 'update_class'])->name('class.update');

	Route::get('/class_delete/{id}', [ClassController::class, 'delete_class']);
	Route::get('/class_restore/{id}', [ClassController::class, 'restore_class']);


	/*** [ Sections ] */
	Route::get('/sections/{p?}', [SectionController::class, 'sections_list']);
	Route::get('/get_sections', [SectionController::class, 'read_all_sections']);
	Route::get('/trashed_sections', [SectionController::class, 'read_all_trashed_sections']);

	Route::get('/section_create', [SectionController::class, 'create_section']);
	Route::post('/section_create', [SectionController::class, 'save_section'])->name('section.save');

	Route::get('/section_edit/{id}', [SectionController::class, 'edit_section']);
	Route::post('/section_edit', [SectionController::class, 'update_section'])->name('section.update');

	Route::get('/section_delete/{id}', [SectionController::class, 'delete_section']);
	Route::get('/section_restore/{id}', [SectionController::class, 'restore_section']);


	/*** [ Other Fee ] */
	Route::get('/other_fee/{p?}', [OtherFeeController::class, 'other_fee_list']);
	Route::get('/get_other_fee', [OtherFeeController::class, 'read_all_other_fee']);
	Route::get('/trashed_other_fee', [OtherFeeController::class, 'read_all_trashed_other_fee']);

	Route::get('/other_fee_create', [OtherFeeController::class, 'create_other_fee']);
	Route::post('/other_fee_create', [OtherFeeController::class, 'save_other_fee'])->name('save.other.fee');

	Route::get('/other_fee_edit/{id}', [OtherFeeController::class, 'edit_other_fee']);
	Route::post('/other_fee_edit', [OtherFeeController::class, 'update_other_fee'])->name('other.fee.update');

	Route::get('/other_fee_delete/{id}', [OtherFeeController::class, 'delete_other_fee']);
	Route::get('/other_fee_restore/{id}', [OtherFeeController::class, 'restore_other_fee']);



	/*** [ student Registration free ] */
	Route::get('/student_reg_fee_view/{p?}', [RegistrationFeeController::class, 'reg_free_view']);
	Route::get('/registration_fee_classwise', [RegistrationFeeController::class, 'registration_fee_class_wise'])->name('student.registration.fee.classwise.get');
	Route::get('/registration_fee_payslip', [RegistrationFeeController::class, 'registration_fee_payslip'])->name('student.registration.fee.payslip');

	
	/*** [ student Monthly free ] */
	Route::get('/student_monthly_fee_view/{p?}', [MonthlyFeeController::class, 'monthly_free_view']);
	Route::get('/monthly_fee_classwise', [MonthlyFeeController::class, 'monthly_fee_class_wise'])->name('student.monthly.fee.classwise.get');
	Route::get('/monthly_fee_payslip', [MonthlyFeeController::class, 'monthly_fee_payslip'])->name('student.monthly.fee.payslip');

	/*** [ student Account ] */
	Route::get('/student_fee/{p?}', [AccountStudentsFeeController::class, 'student_account_view']);
	Route::get('/student_fee_add', [AccountStudentsFeeController::class, 'Student_Fee_Add'])->name('student.fee.add');
	Route::get('/account_fee_getstudent', [AccountStudentsFeeController::class, 'Student_Fee_Get_Student'])->name('account.fee.getstudent');
	Route::post('/account_fee_store', [AccountStudentsFeeController::class, 'Account_Fee_Store'])->name('account.fee.store');

	/*** [ Employee Account ] */
	Route::get('/account/salary/view', [AccountEmployeeSalaryController::class, 'Account_Salary_view']);
	Route::get('/account/salary/add', [AccountEmployeeSalaryController::class, 'Employee_Salary_Add'])->name('employee.salary.add');
	Route::get('/account/salary/get', [AccountEmployeeSalaryController::class, 'Account_Salary_Getemployee'])->name('account.salary.getemployee');
	Route::post('/account/salary/store', [AccountEmployeeSalaryController::class, 'Account_Salary_Store'])->name('employee.account.salary.store');


	/*** [ Other cost ] */
	Route::get('/other_cost_view', [AccountOtherCostController::class, 'Account_Other_Cost_view']);
	Route::get('/add_other_cost', [AccountOtherCostController::class, 'Add_Other_Cost'])->name('add.other.cost');
	Route::post('/save_other_cost', [AccountOtherCostController::class, 'Save_other_Cost'])->name('save.other.cost');
	Route::get('/edit_other_cost/{id}', [AccountOtherCostController::class, 'Edit_Other_Cost'])->name('edit.other.cost');
	Route::post('/Update_other_cost/{id}', [AccountOtherCostController::class, 'Update_Other_Cost'])->name('update.other.cost');
	Route::get('/other_cost/trashed', [AccountOtherCostController::class, 'Trashrd_Other_Cost']);


	/**
	 * 
	 * 
	 * Report Management All Routs
	 */
	Route::get('/monthly/profit/view', [ProfitController::class, 'Monthly_Profit_view']);
	Route::get('/monthly/report/profit/get', [ProfitController::class, 'report_Profit_Datewaise_Get'])->name('report.profit.datewaise.get');
	Route::get('/report/profit/pdf', [ProfitController::class, 'Report_Profit_pdf'])->name('report.profit.pdf');

	/*** [ Sessions ] */
	Route::get('/sessions/{p?}', [SessionController::class, 'session_list']);
	Route::get('/get_sessions', [SessionController::class, 'read_all_sessions']);
	Route::get('/trashed_sessions', [SessionController::class, 'read_all_trashed_sessions']);

	Route::get('/session_create', [SessionController::class, 'create_session']);
	Route::post('/session_create', [SessionController::class, 'save_session'])->name('session.save');

	Route::get('/session_edit/{id}', [SessionController::class, 'edit_session']);
	Route::post('/session_edit', [SessionController::class, 'update_session'])->name('session.update');

	Route::get('/session_delete/{id}', [SessionController::class, 'delete_session']);
	Route::get('/session_restore/{id}', [SessionController::class, 'restore_session']);


	/*** [ Subjects ] */
	Route::get('/subjects/{p?}', [SubjectController::class, 'subjects_list']);
	Route::get('/get_subjects', [SubjectController::class, 'read_all_subjects']);
	Route::get('/trashed_subjects', [SubjectController::class, 'read_all_trashed_subjects']);

	Route::get('/subject_create', [SubjectController::class, 'create_subject']);
	Route::post('/subject_create', [SubjectController::class, 'save_subject'])->name('subject.save');

	Route::get('/subject_edit/{id}', [SubjectController::class, 'edit_subject']);
	Route::post('/subject_edit', [SubjectController::class, 'update_subject'])->name('subject.update');

	Route::get('/subject_delete/{id}', [SubjectController::class, 'delete_subject']);
	Route::get('/subject_restore/{id}', [SubjectController::class, 'restore_subject']);

	/**
	 * 
	 * Academics module routes ends here **************************************
	 */




	/**
	 * 
	 * Finance module routes starts here **************************************
	 */

	/*** [ Fee categories ] */
	Route::get('/fee_categories/{p?}', [FeeCategoryController::class, 'fee_category_list']);
	Route::get('/get_fee_categories', [FeeCategoryController::class, 'read_all_fee_categories']);
	Route::get('/trashed_fee_categories', [FeeCategoryController::class, 'read_all_trashed_fee_categories']);

	Route::get('/fee_category_create', [FeeCategoryController::class, 'create_fee_category']);
	Route::post('/fee_category_create', [FeeCategoryController::class, 'save_fee_category'])->name('fee.category.save');

	Route::get('/fee_category_edit/{id}', [FeeCategoryController::class, 'edit_fee_category']);
	Route::post('/fee_category_edit', [FeeCategoryController::class, 'update_fee_category'])->name('fee.category.update');

	Route::get('/fee_category_delete/{id}', [FeeCategoryController::class, 'delete_fee_category']);
	Route::get('/fee_category_restore/{id}', [FeeCategoryController::class, 'restore_fee_category']);


	/*** [ Fee categories Amount Routes ] */
	Route::get('/fee_categories_amount/{p?}', [FeeCategoryAmountController::class, 'fee_category_amount_list']);
	Route::get('/fee_amount_create', [FeeCategoryAmountController::class, 'create_fee_amount_category'])->name('fee.amount.create');
	Route::post('/save_amount', [FeeCategoryAmountController::class, 'save_fee_amount'])->name('save.fee.amount');

	Route::get('/fee_amount_edit/{fee_category_id}', [FeeCategoryAmountController::class, 'edit_fee_amount'])->name('fee.amount.edit');
	Route::post('/fee_category_update/{fee_category_id}', [FeeCategoryAmountController::class, 'update_fee_category_amount'])->name('ubdate.fee.amount');

	Route::get('/fee_amount_detail/{fee_category_id}', [FeeCategoryAmountController::class, 'detail_fee_amount'])->name('fee.amount.detail');
	// Route::get('/fee_category_restore/{id}', [FeeCategoryAmountController::class, 'restore_fee_category']);
  

	/*** [ Fee Structures ] */
	Route::get('/fee_structures/{p?}', [FeeStructureController::class, 'fee_structure_list']);
	Route::get('/get_fee_structures', [FeeStructureController::class, 'read_all_fee_structures']);
	Route::get('/trashed_fee_structures', [FeeStructureController::class, 'read_all_trashed_fee_structures']);

	Route::get('/fee_structure_create', [FeeStructureController::class, 'create_fee_structure']);
	Route::post('/fee_structure_create', [FeeStructureController::class, 'save_fee_structure'])->name('fee.structure.save');

	Route::get('/fee_structure_edit/{id}', [FeeStructureController::class, 'edit_fee_structure']);
	Route::post('/fee_structure_edit', [FeeStructureController::class, 'update_fee_structure'])->name('fee.structure.update');

	Route::get('/fee_structure_delete/{id}', [FeeStructureController::class, 'delete_fee_structure']);
	Route::get('/fee_structure_restore/{id}', [FeeStructureController::class, 'restore_fee_structure']);


	/*** [ Fee Register ] */
	Route::get('/fee_register/{p?}', [FeeController::class, 'fee_register']);
	Route::get('/get_fee_records', [FeeController::class, 'read_all_fee_records']);
	Route::get('/fee_transaction_history/{std_id}/{guardian_id}/{p?}', [FeeController::class, 'show_transaction_history']);

	Route::get('/collect_fee/{std_id?}/{firstTime?}', [FeeController::class, 'collect_fee']);
	Route::post('/get_student_fee_details', [FeeController::class, 'student_fee_details']);
	Route::post('/collect_fee', [FeeController::class, 'save_fee_record'])->name('fee.save');

	Route::get('/fee_record_edit/{id}', [FeeController::class, 'edit_fee_record']);
	Route::post('/fee_record_edit', [FeeController::class, 'update_fee_record'])->name('fee.update');



	/**
	 * 
	 * Finance module routes ends here **************************************
	 */




	/**
	 * 
	 * Guardian and family accounts module routes starts here **************************************
	 */

	/*** [ Guardians ] */
	Route::get('/accounts/{p?}', [GuardianController::class, 'guardians_list']);
	Route::get('/get_accounts', [GuardianController::class, 'read_all_guardians']);
	Route::get('/trashed_accounts', [GuardianController::class, 'read_all_trashed_guardians']);

	Route::get('/account_Transactions/{id}', [GuardianController::class, 'show_transaction_history']);

	Route::get('/account_delete/{id}', [GuardianController::class, 'delete_guardian']);
	Route::get('/account_restore/{id}', [GuardianController::class, 'restore_guardian']);
	Route::get('/deposit_to_family_account/{id}', [GuardianController::class, 'cash_deposit'])->name('family_account.deposit');
	Route::post('/save_account_transaction', [GuardianController::class, 'save_account_transaction']);
	Route::post('/reverse_account_transaction', [GuardianController::class, 'update_account_transaction']);
	Route::get('/withdraw_from_family_account/{id}', [GuardianController::class, 'cash_withdraw'])->name('family_account.withdraw');
	Route::get('/reverse_transaction/{id}', [GuardianController::class, 'reverse_transaction']);


	/**
	 * 
	 * Guardian and family accounts module routes ends here **************************************
	 */


	/**
	 * 
	 * Student Previous school information routes starts here **************************************
	 */
	Route::get('/student/{id}/previous_school', [PreviousSchoolController::class, 'get_student_previous_school']);
	Route::get('/add_previous_school', [PreviousSchoolController::class, 'create_previous_school']);
	Route::post('/save_previous_school', [PreviousSchoolController::class, 'save_previous_school'])->name('previousSchool.save');
	Route::get('/student/{std_id}/edit_previous_school', [PreviousSchoolController::class, 'edit_previous_school_info']);
	Route::post('/update_previous_school', [PreviousSchoolController::class, 'update_a_previous_school'])->name('previousSchool.update');


	/**
	 * 
	 * Student Previous school information routes ends here **************************************
	 */

	// 	Human Resource hiring epmloy

	Route::get('/employee/{p?}', [EmployController::class, 'employee_list']);
	Route::get('/domEmployee/{p?}', [EmployController::class, 'domestic_employee_list']);
	Route::get('/hire_employ', [EmployController::class, 'hire_new_employ']);
	Route::post('/save_employ', [EmployController::class, 'save_new_employee'])->name('employee.save');

	Route::get('/get_all_employee', [EmployController::class, 'read_all_employee']);
	Route::get('/trashed_employee', [EmployController::class, 'read_all_trashed_employee']);

	Route::get('/single_emp/{id}', [EmployController::class, 'get_single_employee_detail']);
	Route::get('/edit_employ/{id}', [EmployController::class, 'edit_employee_record']);
	Route::post('/edit_employee', [EmployController::class, 'update_employee_record'])->name('employee.update');
	Route::post('/terminate_employee', [EmployController::class, 'terminate_employee_record'])->name('terminate_employee.update');

	Route::get('/employee_delete/{id}', [EmployController::class, 'delete_employee']);
	Route::get('/employee_restore/{id}', [EmployController::class, 'restore_employee']);



	/***
	 * 
	 * 
	 * Employee Salary Increment
	 */
	Route::get('/employee/salary/view', [EmployeeSalaryController::class, 'Employee_Salary_View']);

	Route::get('/employee/salary/increment/{id}', [EmployeeSalaryController::class, 'Employee_Salary_Increment'])->name('employee.salary.increment');
	Route::get('/employee/salary/detail/{id}', [EmployeeSalaryController::class, 'Employee_Salary_detail'])->name('employee.salary.details');
	Route::post('/employee/salary/store/{id}', [EmployeeSalaryController::class, 'Salary_Store'])->name('update.increment.store');


	/***
	 * 
	 * 
	 * Employee Monthly Salary
	 */
	Route::get('/employee/monthly/salary/view', [MonthlySalaryController::class, 'Employee_Monthly_Salary_View']);
	Route::get('/employee/monthly/salary/get', [MonthlySalaryController::class, 'Employee_Monthly_Salary_Get'])->name('employee.monthly.salary.get');
	Route::get('/employee/monthly/salary/payslip/{id}', [MonthlySalaryController::class, 'Employee_Monthly_Salary_Payslip'])->name('employee.monthly.salary.payslip');


	/***
	 * 
	 * 
	 * Employee Attendance
	 */
	Route::get('/employee/attendance/view', [EmployeeAttendanceController::class, 'Employee_Attendance_view']);

	Route::get('/add/employee/attendance', [EmployeeAttendanceController::class, 'Add_Employee_Attendance'])->name('add.employee.attendance');
	Route::post('/store/employee/attendance', [EmployeeAttendanceController::class, 'store_Employee_Attendance'])->name('store.employee.attendance');
	Route::get('/employee/attendance/edit/{date}', [EmployeeAttendanceController::class, 'Employee_Attendance_Edit'])->name('employee.attendance.edit');
	Route::get('/employee/attendance/detail/{date}', [EmployeeAttendanceController::class, 'Employee_Attendance_details'])->name('employee.attendance.details');


	/********
	 **
	 * RESIGN EMPLOYEE
	 */
	Route::get('/resigneRequest/{p?}', [EmployController::class, 'resigne_request_list']);
	Route::get('/resigneEmployee/{p?}', [EmployController::class, 'resigned_employee_list']);
	Route::get('/terminateEmployee/{p?}', [EmployController::class, 'terminate_employee_list']);
	Route::get('/resignRequest/{id}', [EmployController::class, 'get_resigne_employee_detail']);
	Route::post('/resign_employee', [EmployController::class, 'update_resign_employee_record'])->name('resigh_employee.update');
	
	Route::get('/get_all_resigne_request', [EmployController::class, 'read_all_resigne_requests']);
	Route::get('/get_all_resigned_employee', [EmployController::class, 'read_all_resigned_employee']);
	Route::get('/get_all_terminated_employee', [EmployController::class, 'read_all_terminated_request']);

	Route::get('/approve/{id}', [EmployController::class , 'approve'])->name('employee.approve');
	Route::get('/reject/{id}', [EmployController::class , 'reject'])->name('employee.reject');

	Route::get('/download/{resig_file}', [EmployController::class , 'download_resign_File']);
	Route::get('/download/attached/{emp_file_attachment}', [EmployController::class , 'download_emp_file_attachment']);

	/**
 * 
 * 
 * These routes are not finalized yet.
 */

	Route::get('/enroll_student', [StudentController::class, 'enroll_new_student_form']);
	Route::post('/enroll_studen', [StudentController::class, 'save_and_enroll_new_student'])->name('student.enroll');
	Route::post('/get_all_sections_for_class', [StudentController::class, 'get_all_sections_for_a_specific_class']);
	Route::post('/get_fee_structure', [StudentController::class, 'ajax_fee_collection_view']);
	Route::get('/students', [StudentController::class, 'all_student_list']);
	// Route::get('/get_all_students_list', [StudentController::class, 'read_all_students']);
	Route::get('/withdraw_students', [StudentController::class, 'withdraw_students_list']);
	Route::get('/get_all_withdraw_students_list', [StudentController::class, 'read_all_withdraw_students']);
	Route::get('/student_promotion', [StudentController::class, 'students_promotion_list']);
	
	
	Route::get('/edit_student/{student_id}', [StudentController::class, 'edit_student_record'])->name('student.edit');
	Route::post('/edit_student/{student_id}', [StudentController::class, 'update_student_record'])->name('student.update');
	Route::get('/delete_student/{student_id}', [StudentController::class, 'delete_student'])->name('student.delete');
	
	Route::get('/view_student/{student_id}', [StudentController::class, 'view_single_student_detail'])->name('view.single.student');
	Route::get('/download/cnic/{grd_cnic_copy}', [StudentController::class , 'download_guardian_CNIC']);
	
	Route::get('/withdraw_student', [StudentController::class, 'withdraw_student']);
	Route::post('/withdraw_student', [StudentController::class, 'withdraw_student_record'])->name('withdraw_student.update');
	Route::get('/Search_student', [StudentController::class, 'student_student'])->name('search.student');
	Route::get('/Search_student_for_promotion', [StudentController::class, 'search_student_for_promotion'])->name('student.session.class.wise');
	
	Route::get('/promote_single_student/{student_id}', [StudentController::class, 'promote_single_student'])->name('promote.single.student');
	Route::post('/student_promtion_update/{student_id}', [StudentController::class, 'update_student_promotion_record'])->name('promote.student');
	
	// Route::post('/promote_student', [StudentController::class, 'student_promotion'])->name('student.promote');
	Route::post('/promotion_students_list', [StudentController::class, 'promote_selected_studentn'])->name('promotion.students.list');
});



/**
 * 
 * Academics module routes starts here **************************************
 */



// Demo routes
Route::get('/datatables', [PagesController::class, 'datatables']);
Route::get('/ktdatatables', [PagesController::class, 'ktDatatables']);
Route::get('/select2', [PagesController::class, 'select2']);
Route::get('/jquerymask', [PagesController::class, 'jQueryMask']);
Route::get('/icons/custom-icons', [PagesController::class, 'customIcons']);
Route::get('/icons/flaticon', [PagesController::class, 'flaticon']);
Route::get('/icons/fontawesome', [PagesController::class, 'fontawesome']);
Route::get('/icons/lineawesome', [PagesController::class, 'lineawesome']);
Route::get('/icons/socicons', [PagesController::class, 'socicons']);
Route::get('/icons/svg', [PagesController::class, 'svg']);

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [PagesController::class, 'quickSearch'])->name('quick-search');

/**** Royal School Routes ****/
