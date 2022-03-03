<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;// for database model
use App\Contracts\Services\Task\TaskServiceInterface; // dependency injection
use Illuminate\Support\Facades\Validator;  // for Validate name char more than 255

class TaskController extends Controller
{

    private $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
    
    public function index()
    {
        $data = $this->taskService->showAllTask();

        return view('tasks.task', [
            'tasks' => $data
        ]);
    }

    public function addNewTask()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        $name = request()->name;
        $this->taskService->addNewTask($name);

        return redirect('/');
    }

    public function deleteSingleTask()
    {
        $id = request()->id;
        $this->taskService->deleteSingleTask($id);

        return redirect('/');
    }
}
