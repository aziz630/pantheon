<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\FeeController;


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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


/**
 * 
 * Academics module routes starts here **************************************
 */

/*** [ Classes ] */
Route::get('/classes/{p?}', [ClassController::class, 'classes_list'])->middleware('auth');
Route::get('/get_classes', [ClassController::class, 'read_all_classes'])->middleware('auth');
Route::get('/trashed_classes', [ClassController::class, 'read_all_trashed_classes'])->middleware('auth');

Route::get('/class_create', [ClassController::class, 'create_class'])->middleware('auth');
Route::post('/class_create', [ClassController::class, 'save_class'])->middleware('auth')->name('class.save');

Route::get('/class_edit/{id}', [ClassController::class, 'edit_class'])->middleware('auth');
Route::post('/class_edit', [ClassController::class, 'update_class'])->middleware('auth')->name('class.update');

Route::get('/class_delete/{id}', [ClassController::class, 'delete_class'])->middleware('auth');
Route::get('/class_restore/{id}', [ClassController::class, 'restore_class'])->middleware('auth');


/*** [ Sections ] */
Route::get('/sections/{p?}', [SectionController::class, 'sections_list'])->middleware('auth');
Route::get('/get_sections', [SectionController::class, 'read_all_sections'])->middleware('auth');
Route::get('/trashed_sections', [SectionController::class, 'read_all_trashed_sections'])->middleware('auth');

Route::get('/section_create', [SectionController::class, 'create_section'])->middleware('auth');
Route::post('/section_create', [SectionController::class, 'save_section'])->middleware('auth')->name('section.save');

Route::get('/section_edit/{id}', [SectionController::class, 'edit_section'])->middleware('auth');
Route::post('/section_edit', [SectionController::class, 'update_section'])->middleware('auth')->name('section.update');

Route::get('/section_delete/{id}', [SectionController::class, 'delete_section'])->middleware('auth');
Route::get('/section_restore/{id}', [SectionController::class, 'restore_section'])->middleware('auth');


/*** [ Sessions ] */
Route::get('/sessions/{p?}', [SessionController::class, 'session_list'])->middleware('auth');
Route::get('/get_sessions', [SessionController::class, 'read_all_sessions'])->middleware('auth');
Route::get('/trashed_sessions', [SessionController::class, 'read_all_trashed_sessions'])->middleware('auth');

Route::get('/session_create', [SessionController::class, 'create_session'])->middleware('auth');
Route::post('/session_create', [SessionController::class, 'save_session'])->middleware('auth')->name('session.save');

Route::get('/session_edit/{id}', [SessionController::class, 'edit_session'])->middleware('auth');
Route::post('/session_edit', [SessionController::class, 'update_session'])->middleware('auth')->name('session.update');

Route::get('/session_delete/{id}', [SessionController::class, 'delete_session'])->middleware('auth');
Route::get('/session_restore/{id}', [SessionController::class, 'restore_session'])->middleware('auth');


/*** [ Subjects ] */
Route::get('/subjects/{p?}', [SubjectController::class, 'subjects_list'])->middleware('auth');
Route::get('/get_subjects', [SubjectController::class, 'read_all_subjects'])->middleware('auth');
Route::get('/trashed_subjects', [SubjectController::class, 'read_all_trashed_subjects'])->middleware('auth');

Route::get('/subject_create', [SubjectController::class, 'create_subject'])->middleware('auth');
Route::post('/subject_create', [SubjectController::class, 'save_subject'])->middleware('auth')->name('subject.save');

Route::get('/subject_edit/{id}', [SubjectController::class, 'edit_subject'])->middleware('auth');
Route::post('/subject_edit', [SubjectController::class, 'update_subject'])->middleware('auth')->name('subject.update');

Route::get('/subject_delete/{id}', [SubjectController::class, 'delete_subject'])->middleware('auth');
Route::get('/subject_restore/{id}', [SubjectController::class, 'restore_subject'])->middleware('auth');

/**
 * 
 * Academics module routes ends here **************************************
 */




/**
 * 
 * Finance module routes starts here **************************************
 */

/*** [ Fee categories ] */
Route::get('/fee_categories/{p?}', [FeeCategoryController::class, 'fee_category_list'])->middleware('auth');
Route::get('/get_fee_categories', [FeeCategoryController::class, 'read_all_fee_categories'])->middleware('auth');
Route::get('/trashed_fee_categories', [FeeCategoryController::class, 'read_all_trashed_fee_categories'])->middleware('auth');

Route::get('/fee_category_create', [FeeCategoryController::class, 'create_fee_category'])->middleware('auth');
Route::post('/fee_category_create', [FeeCategoryController::class, 'save_fee_category'])->middleware('auth')->name('fee.category.save');

Route::get('/fee_category_edit/{id}', [FeeCategoryController::class, 'edit_fee_category'])->middleware('auth');
Route::post('/fee_category_edit', [FeeCategoryController::class, 'update_fee_category'])->middleware('auth')->name('fee.category.update');

Route::get('/fee_category_delete/{id}', [FeeCategoryController::class, 'delete_fee_category'])->middleware('auth');
Route::get('/fee_category_restore/{id}', [FeeCategoryController::class, 'restore_fee_category'])->middleware('auth');


/*** [ Fee Structures ] */
Route::get('/fee_structures/{p?}', [FeeStructureController::class, 'fee_structure_list'])->middleware('auth');
Route::get('/get_fee_structures', [FeeStructureController::class, 'read_all_fee_structures'])->middleware('auth');
Route::get('/trashed_fee_structures', [FeeStructureController::class, 'read_all_trashed_fee_structures'])->middleware('auth');

Route::get('/fee_structure_create', [FeeStructureController::class, 'create_fee_structure'])->middleware('auth');
Route::post('/fee_structure_create', [FeeStructureController::class, 'save_fee_structure'])->middleware('auth')->name('fee.structure.save');

Route::get('/fee_structure_edit/{id}', [FeeStructureController::class, 'edit_fee_structure'])->middleware('auth');
Route::post('/fee_structure_edit', [FeeStructureController::class, 'update_fee_structure'])->middleware('auth')->name('fee.structure.update');

Route::get('/fee_structure_delete/{id}', [FeeStructureController::class, 'delete_fee_structure'])->middleware('auth');
Route::get('/fee_structure_restore/{id}', [FeeStructureController::class, 'restore_fee_structure'])->middleware('auth');


/*** [ Fee Register ] */
Route::get('/fee_register/{p?}', [FeeController::class, 'fee_register'])->middleware('auth');
Route::get('/get_fee_records', [FeeController::class, 'read_all_fee_records'])->middleware('auth');
Route::get('/fee_transaction_history/{std_id}/{guardian_id}/{p?}', [FeeController::class, 'show_transaction_history'])->middleware('auth');

Route::get('/collect_fee/{std_id?}/{firstTime?}', [FeeController::class, 'collect_fee'])->middleware('auth');
Route::post('/get_student_fee_details', [FeeController::class, 'student_fee_details'])->middleware('auth');
Route::post('/collect_fee', [FeeController::class, 'save_fee_record'])->middleware('auth')->name('fee.save');

Route::get('/fee_record_edit/{id}', [FeeController::class, 'edit_fee_record'])->middleware('auth');
Route::post('/fee_record_edit', [FeeController::class, 'update_fee_record'])->middleware('auth')->name('fee.update');


/**
 * 
 * Finance module routes ends here **************************************
 */




/**
 * 
 * Guardian and family accounts module routes starts here **************************************
 */

/*** [ Guardians ] */
Route::get('/accounts/{p?}', [GuardianController::class, 'guardians_list'])->middleware('auth');
Route::get('/get_accounts', [GuardianController::class, 'read_all_guardians'])->middleware('auth');
Route::get('/trashed_accounts', [GuardianController::class, 'read_all_trashed_guardians'])->middleware('auth');

Route::get('/account_Transactions/{id}', [GuardianController::class, 'show_transaction_history'])->middleware('auth');

Route::get('/account_delete/{id}', [GuardianController::class, 'delete_guardian'])->middleware('auth');
Route::get('/account_restore/{id}', [GuardianController::class, 'restore_guardian'])->middleware('auth');
Route::get('/deposit_to_family_account/{id}', [GuardianController::class, 'cash_deposit'])->middleware('auth')->name('family_account.deposit');
Route::post('/save_account_transaction', [GuardianController::class, 'save_account_transaction'])->middleware('auth');
Route::post('/reverse_account_transaction', [GuardianController::class, 'update_account_transaction'])->middleware('auth');
Route::get('/withdraw_from_family_account/{id}', [GuardianController::class, 'cash_withdraw'])->middleware('auth')->name('family_account.withdraw');
Route::get('/reverse_transaction/{id}', [GuardianController::class, 'reverse_transaction'])->middleware('auth');


/**
 * 
 * Guardian and family accounts module routes ends here **************************************
 */


/**
 * 
 * Student Previous school information routes starts here **************************************
 */
Route::get('/student/{id}/previous_school', [PreviousSchoolController::class, 'get_student_previous_school'])->middleware('auth');
Route::get('/add_previous_school', [PreviousSchoolController::class, 'create_previous_school'])->middleware('auth');
Route::post('/save_previous_school', [PreviousSchoolController::class, 'save_previous_school'])->middleware('auth')->name('previousSchool.save');
Route::get('/student/{std_id}/edit_previous_school', [PreviousSchoolController::class, 'edit_previous_school_info'])->middleware('auth');
Route::post('/update_previous_school', [PreviousSchoolController::class, 'update_a_previous_school'])->middleware('auth')->name('previousSchool.update');


/**
 * 
 * Student Previous school information routes ends here **************************************
 */






/**
 * 
 * 
 * These routes are not finalized yet.
 */
Route::get('/enroll_student', [StudentController::class, 'enroll_new_student_form'])->middleware('auth');
Route::post('/enroll_student', [StudentController::class, 'save_and_enroll_new_student'])->middleware('auth')->name('student.enroll');
Route::post('/get_all_sections_for_class', [StudentController::class, 'get_all_sections_for_a_specific_class'])->middleware('auth');
Route::post('/get_fee_structure', [StudentController::class, 'ajax_fee_collection_view'])->middleware('auth');
Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/students_list_ajax', [StudentController::class, 'get_all_students'])->middleware('auth');
Route::get('/withdraw_student', [StudentController::class, 'withdraw_student']);

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
