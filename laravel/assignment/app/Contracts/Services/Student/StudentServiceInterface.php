<?php

namespace App\Contracts\Services\Student;

interface StudentServiceInterface
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

    /**
     * Export Data
     * 
     * @return resource 
     */
    public function export();

    /**
     * Import Data
     * 
     * just procedure
     */
    public function import();

    /**
     * Search Student
     * @param request searchItem
     * @return array data
     */
    public function searchStudent($searchItem);

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendCreateSuccessMail(string $email);

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendDeleteSuccessMail(string $email);
}