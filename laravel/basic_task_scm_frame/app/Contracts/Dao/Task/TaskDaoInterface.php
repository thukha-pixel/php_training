<?php

namespace App\Contracts\Dao\Task;
use Illuminate\Http\Request;

interface TaskDaoInterface
{
    public function showAllTask();

    public function addNewTask($name);

    public function deleteSingleTask($id);
}