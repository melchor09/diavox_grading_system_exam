<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;





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
    return redirect("login");
});
Route::get('/logout', function () {
    return redirect("login");
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
    	// Super Admin
    	if (Auth::user()->role == 1) {
            return view('superAdmin.dashboard');
        }

        //  Teacher
        else if (Auth::user()->role == 2) {
            return redirect("/teacher/dashboard");
        }

        // Student
        else if (Auth::user()->role == 3) {
            return view('/student.dashboard');
        }


    })->name('dashboard');
});

/***** start Super Admin *****/
    Route::post('/create_subject',  [SubjectController::class, 'createSubject'])->name('subject.create_subject');
    Route::get('/subject_list',     [SubjectController::class, 'subjectList'])->name('subject.list');

    Route::post('/create_user',     [UserController::class, 'createUser'])->name('user.create_user');
    Route::get('/user_list',        [UserController::class, 'userList'])->name('user.list');
/***** end Super Admin *****/


/***** start Teacher *****/
    Route::get('/teacher/dashboard',  [TeacherController::class, 'index'])->name('teacher.index');
    Route::post('/upsert_grade',      [TeacherController::class, 'upsertGrade'])->name('teacher.upsert_grade');
    Route::get('/grade_list',         [TeacherController::class, 'gradeList'])->name('grade.list');
/***** end Teacher *****/

/***** start Student *****/
    Route::get('/student_grade_list',  [StudentController::class, 'studentGradelist'])->name('student.grade_list');
/***** end Student *****/

