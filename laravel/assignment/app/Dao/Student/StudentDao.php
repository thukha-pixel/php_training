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
        $id = $data[0];
        $student = Student::find($id);

        // $name = $data[1] ? $data[1] : $student->name;
        // $email = $data[2] ? $data[2] : $student->email;
        // $phone = $data[3] ? $data[3] : $student->phone;
        // $dob = $data[4] ? $data[4] : $student->dob;
        // $name_of_father = $data[5] ? $data[5] : $student->name_of_father;
        // $major_id = $data[6] ? $data[6] : $student->major_id;
        
        // switch($data) {
        //     case array_key_exists(1, $data): $student->name = $data[1];
        //     case array_key_exists(2, $data): $student->email = $data[2];
        //     case array_key_exists(3, $data): $student->phone = $data[3];
        //     case array_key_exists(4, $data): $student->dob = $data[4];
        //     case array_key_exists(5, $data): $student->name_of_father = $data[5];
        //     case array_key_exists(6, $data): $student->major_id = $data[6];
        // }

        if (array_key_exists(1, $data)) {
            $student->name = $data[1];
        } 
        if (array_key_exists(2, $data)) {
            $student->email = $data[2];
        } 
        if (array_key_exists(3, $data)) {
            $student->phone= $data[3];
        } 
        if (array_key_exists(4, $data)) {
            $student->dob = $data[4];
        } 
        if (array_key_exists(5, $data)) {
            $student->name_of_father = $data[5];
        } 
        if (array_key_exists(6, $data)) {
            $student->major_id = (int)$data[6];
        }
        $student->save();

        
        // $student->name = $name;
        // $student->email = $email;
        // $student->phone = $phone;
        // $student->dob = $dob;
        // $student->name_of_father = $name_of_father;
        // $student->major_id = $major_id;
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