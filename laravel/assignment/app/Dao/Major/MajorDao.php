<?php

namespace App\Dao\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Models\Major;

class MajorDao implements MajorDaoInterface
{
    /**
     * Show Student Table
     * 
     * @return array $data
     */
    public function showMajor()
    {
        return Major::all();
    }

    /**
     * Add New Major
     * 
     *
     * @return view student.major
     */
    public function addMajor(string $name)
    {
        $major = new Major;
        $major->name = $name;
        $major->save();
    }

    /**
     * Delete An Existing Major
     * 
     * @param int $id
     */
    public function deleteMajor(int $id)
    {
        return Major::findOrFail($id)->delete();
    }
}