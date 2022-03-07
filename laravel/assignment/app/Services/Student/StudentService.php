<?php

namespace App\Services\Student;

use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Dao\Student\StudentDaoInterface;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentService implements StudentServiceInterface
{
    private $studentDao;

    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

     /**
     * Show All Student
     * @param array
     */
    public function showAllStudent()
    {
        return $this->studentDao->showAllStudent();
    }

    /**
     * Insert New Student 
     * @param array $data
     */
    public function insertStudent(array $data)
    {
        return $this->studentDao->insertStudent($data);
    }

    /**
     * Delete Student
     * 
     * @param int $id
     */
    public function deleteStudent(int $id)
    {
        return $this->studentDao->deleteStudent($id);
    }

     /**
     * Find Student
     * 
     * @param int $id
     */
    public function findStudent(int $id)
    {
        return $this->studentDao->findStudent($id);
    }

    /**
     * Update Student
     * 
     * @param array $data
     */
    public function updateStudent(array $data)
    {
        return $this->studentDao->updateStudent($data);
    }

    /////////////////////////////////////////
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new StudentsImport,request()->file('file'));
    }
}