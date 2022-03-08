<?php

namespace App\Dao\Student;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Student\StudentDaoInterface;

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

    /**
     * Search Student
     * 
     * @return array data
     */
    public function searchStudent($searchItem)
    {
        $data = DB::table('students')->select('students.*')
        ->where('name', 'like', '%'. $searchItem . '%')
        ->orWhere('email', 'like', '%'. $searchItem. '%')
        ->orWhere('phone', 'like', '%'. $searchItem. '%')
        ->orWhere('dob', 'like', '%'. $searchItem. '%')
        ->orWhere('name_of_father', 'like', '%'. $searchItem. '%')
        ->orWhere('major_id', 'like', '%'. $searchItem. '%')
        ->get();

        return $data;
    }
}