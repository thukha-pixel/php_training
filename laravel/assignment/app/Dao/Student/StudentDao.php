<?php

namespace App\Dao\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Models\Student;

class StudentDao implements StudentDaoInterface
{
    /**
     * Show All Student
     */
    public function showAllStudent()
    {
        return Student::all();
    }

    /**
     * Insert New Student 
     * @param array $data
     */
    public function insertStudent(array $data)
    {
        [$name, $email, $phone, $dob, $name_of_father, $major_id] = $data;

        $student = new Student;
        $student->name = $name;
        $student->email = $email;
        $student->phone = $phone;
        $student->dob = $dob;
        $student->name_of_father = $name_of_father;
        $student->major_id = $major_id;

        $student->save();
    }

    /**
     * Delete Student
     * 
     * @param int $id
     */
    public function deleteStudent(int $id)
    {
        return Student::find($id)->delete();
    }

    /**
     * Find Student
     * 
     * @param int $id
     */
    public function findStudent(int $id)
    {
        return Student::find($id);
    }

    /**
     * Update Student
     * 
     * @param array $data
     */
    public function updateStudent(array $data)
    {
        [$id, $name, $email, $phone, $dob, $name_of_father, $major_id] = $data;

        $student = Student::find($id);
        $student->name = $name;
        $student->email = $email;
        $student->phone = $phone;
        $student->dob = $dob;
        $student->name_of_father = $name_of_father;
        $student->major_id = $major_id;
        $student->save();
    }
}