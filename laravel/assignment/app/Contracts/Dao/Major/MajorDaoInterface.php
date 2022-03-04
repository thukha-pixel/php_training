<?php

namespace App\Contracts\Dao\Major;

interface MajorDaoInterface
{
    /**
     * Show Student Table
     * 
     * @return array $data
     */
    public function showMajor();

    /**
     * Add New Major
     * 
     *
     * @return view student.major
     */
    public function addMajor(string $name);

    /**
     * Delete An Existing Major
     * 
     * @param int $id
     */
    public function deleteMajor(int $id);
}