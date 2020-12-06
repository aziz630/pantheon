<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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
Route::get('/enroll_student', [StudentController::class, 'enroll_new_student_form'])->middleware('auth');
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
