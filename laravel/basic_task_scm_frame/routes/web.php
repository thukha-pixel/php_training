<?php

use Illuminate\Support\Facades\Route;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     $tasks = Task::orderBy('created_at', 'asc')->get();
 
//     return view('tasks.task', [
//         'tasks' => $tasks
//     ]);
// });

Route::get('/', [TaskController::class, 'index']);

/**
 * Add A New Task
 */
Route::post('/task', [TaskController::class, 'addNewTask']);

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', [TaskController::class, 'deleteSingleTask']);
