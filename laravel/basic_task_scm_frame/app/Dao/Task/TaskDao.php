<?php

namespace App\Dao\Task;

use Illuminate\Http\Request;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;

class TaskDao implements TaskDaoInterface
{
    public function showAllTask()
    {
        $data = Task::orderBy('created_at', 'asc')->get();

        return $data;
    }

    public function addNewTask($name)
    {
        $task = new Task;
        $task->name = $name;
        $task->save();

        return "Inserted";
    }

    public function deleteSingleTask($id)
    {
        Task::findOrFail($id)->delete();

        return "Deleted";
    }
}