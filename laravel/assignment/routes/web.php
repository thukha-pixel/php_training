<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student;
use App\Http\Controllers\Major;

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
    return view('welcome');
});

Route::prefix('student')->group(function () {

    Route::controller(Student\StudentController::class)->group(function () {
        Route::get('/table', 'showTable')->name('student#table');

        Route::get('/insert_form', 'insertForm')->name('student#insert_form');
        Route::post('/insert_student', 'insertStudent')->name('student#insertStudent');

        Route::get('/update_form/{id}', 'updateForm')->name('student#update_form');
        Route::post('update_student', 'updateStudent')->name('student#update_student');

        Route::get('/delete_student/{id}', 'deleteStudent')->name('student#delete_student/{id}');

        Route::get('/export_csv', 'export')->name('student#export_csv');
        Route::post('/import_csv', 'import')->name('student#import_csv');
    });

    Route::controller(Major\MajorController::class)->group(function () {
        Route::get('/major', 'showMajor')->name('student#major');
        Route::post('/add_major', 'addMajor')->name('student#add_major');
        Route::post('/delete_major', 'deleteMajor')->name('student#delete_major');
    });

});
