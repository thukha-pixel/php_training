<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentApiController extends Controller
{
    private $studentService;
    private $majorService;

    public function __construct(StudentServiceInterface $studentService, MajorServiceInterface $majorService)
    {
        $this->studentService = $studentService;
        $this->majorService = $majorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->studentService->showAllStudent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return "Insert Successful!!!"; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $this->studentService->findStudent($student->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = [
            (int)$id,
            $request->name,
            $request->email,
            $request->phone,
            $request->dob,
            $request->name_of_father,
            $request->major_id,
        ];

        if ($id) {
            return $this->studentService->updateStudent($data);
        } else {
            return response()->json("id is required to upate data", 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->studentService->deleteStudent((int)$id);
    }
}
