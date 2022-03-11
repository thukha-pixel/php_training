<?php

namespace App\Services\Student;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;

use App\Mail\CreateSuccessMail;
use App\Mail\DeleteSuccessMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

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

    // Assignment 2
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

    // Assignment 3
    /**
     * Search Student
     * 
     * @param request searchItem
     * @return array data
     */
    public function searchStudent($searchItem)
    {
        return $this->studentDao->searchStudent($searchItem);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendCreateSuccessMail(string $email)
    {
        $mailData = [
            'title' => 'Mail from Laravel Assignment 6',
            'body' => 'Create Data Successfully!',
        ];

        Mail::to("$email")->send(new CreateSuccessMail($mailData));

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendDeleteSuccessMail(string $email)
    {
        $mailData = [
            'title' => 'Mail from Laravel Assignment 6',
            'body' => 'Delete Data Successfully!',
        ];

        Mail::to("$email")->send(new DeleteSuccessMail($mailData));
    }
}