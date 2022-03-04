<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

interface TaskServiceInterface
{
    public function showAllTask();

    public function addNewTask($name);
    
    public function deleteSingleTask($id);
}