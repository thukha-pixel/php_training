<?php

namespace App\Contracts\Dao\Student;

interface StudentDaoInterface
{
    /**
     * Show All Student
     */
    public function showAllStudent();

    /**
     * Insert New Student 
     * @param array $data
     */
    public function insertStudent(array $data);

    /**
     * Delete Student
     * 
     * @param int $id
     */
    public function deleteStudent(int $id);

    /**
     * Find Student
     * 
     * @param int $id
     */
    public function findStudent(int $id);


    /**
     * Update Student
     * 
     * @param array $data
     */
    public function updateStudent(array $data);
}