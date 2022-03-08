<?php

namespace App\Http\Controllers\Student;

use App\Models\Major;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

// use App\Exports\StudentsExport;
// use App\Imports\StudentsImport;
// use Maatwebsite\Excel\Facades\Excel;

/**
 * SystemName: assignment
 * ModuleName: StudentController
 */
class StudentController extends Controller
{
    private $studentService;
    private $majorService;

    public function __construct(StudentServiceInterface $studentService, MajorServiceInterface $majorService)
    {
        $this->studentService = $studentService;
        $this->majorService = $majorService;
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
        $data = $this->majorService->showMajor();
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
        $data = $this->studentService->findStudent($id);
        $dataMajor = $this->majorService->showMajor();

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

    /////////////////////////////////////////////////

    /**
    * Export Student Data
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return $this->studentService->export();
    }

    /**
    *Import Student Data 
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        $this->studentService->import();
               
        return back();
    }

    ///////////////////////////////////////////////

    /**
     * Search Table View
     * 
     * @return array data
     */

    public function searchTableView()
    {
        if (request()->search_item == '')
        {
            $data = $this->studentService->showAllStudent();//showAllStudent
            
        } else {
            $searchItem = request()->search_item;

            $data = $this->studentService->searchStudent($searchItem);

            if ( $data == '')
            {
                $data = $this->studentService->showAllStudent();//showAllStudent
            }
        }
        
        return view('student.search_table', [
            'data' => $data
        ]);
    }
}
