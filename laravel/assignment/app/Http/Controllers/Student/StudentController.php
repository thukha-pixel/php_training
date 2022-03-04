<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Major;

use App\Contracts\Services\Student\StudentServiceInterface;

/**
 * SystemName: assignment
 * ModuleName: StudentController
 */
class StudentController extends Controller
{
    private $studentService;

    public function __construct(StudentServiceInterface $studentService)
    {
        $this->studentService = $studentService;
    }
    /**
     * Show Student Table
     * 
     * @return array $data
     */
    public function showTable()
    {
        $data = $this->studentService->showAllStudent();//showAllStudent

        return view('student.table', [
            'data' => $data
        ]);
    }

    /**
     * Show Insert Form View
     * 
     * @return view insert_form.blade.php
     */
    public function insertForm()
    {
        $data = Major::all();
        return view('student.insert_form', [
            'data' => $data
        ]);
    }

    /**
     * Insert New Student To DataBase
     * 
     * @return view
     */
    public function insertStudent()
    {
        $data = [
            request()->name,
            request()->email,
            request()->phone,
            request()->date_of_birth,
            request()->name_of_father,
            request()->major_id
        ];

        $this->studentService->insertStudent($data);

        return redirect('student/table');
    }

    /**
     * Delete Single Student From DataBase
     * 
     * @return view
     */
    public function deleteStudent(int $id)
    {
        $this->studentService->deleteStudent($id);
        return redirect('student/table');
    }

    /**
     * Find data from db with $id and return associated data
     * 
     * @param int $id
     * @return view with array
     */
    public function updateForm(int $id)
    {
        // $data = Student::find($id);
        $data = $this->studentService->findStudent($id);
        $dataMajor = Major::all();

        return view('student.update_form', [
            'student' => $data,
            'data' => $dataMajor
        ]);
    }

    /**
     * Update student info by finding with $id
     * 
     * @return view 
     */
    public function updateStudent()
    {
        $data = [
            request()->id,
            request()->name,
            request()->email,
            request()->phone,
            request()->date_of_birth,
            request()->name_of_father,
            request()->major_id
        ];

        $this->studentService->updateStudent($data);

        return redirect('student/table');
    }
}
