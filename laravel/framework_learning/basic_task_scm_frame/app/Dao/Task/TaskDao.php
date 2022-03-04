<?php

namespace App\Dao\Task;

use Illuminate\Http\Request;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Models\Task;

/**
 * System Name: Task
 * Module Name TaskDao
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * Show All Task 
     * 
     * @return array $data
     */
    public function showAllTask()
    {
        $data = Task::orderBy('created_at', 'asc')->get();

        return $data;
    }

    /**
     * Add New Task
     * 
     * @param string $name
     * 
     * @return string "Inserted"
     */
    public function addNewTask($name)
    {
        $task = new Task;
        $task->name = $name;
        $task->save();

        return "Inserted";
    }

    /**
     * Delete Single Task
     * 
     * @param int $id
     * 
     * @return string "Deleted"
     */

    public function deleteSingleTask($id)
    {
        Task::findOrFail($id)->delete();

        return "Deleted";
    }
}