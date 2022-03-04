<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;  // for dependency injection
use App\Contracts\Services\Task\TaskServiceInterface;// for implement

use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface{

    private $taskDao;

    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    public function showAllTask()
    {
        return $this->taskDao->showAllTask();
    }

    public function addNewTask($name)
    {
        return $this->taskDao->addNewTask($name);
    }

    public function deleteSingleTask($id)
    {
        return $this->taskDao->deleteSingleTask($id);
    }
}