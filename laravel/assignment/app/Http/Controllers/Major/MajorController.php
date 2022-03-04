<?php

namespace App\Http\Controllers\Major;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Major;
use App\Contracts\Services\Major\MajorServiceInterface;

/**
 * SystemName: assignment
 * ModuleName: MajorController
 */
class MajorController extends Controller
{
    private $majorService;

    public function __construct(MajorServiceInterface $majorService)
    {
        $this->majorService = $majorService;
    }

    /**
     * Show Student Table
     * 
     * @return array $data
     */
    public function showMajor()
    {
        $data = $this->majorService->showMajor();

        return view('student.major', [
            'data' => $data
        ]);
    }

    /**
     * Add New Major
     * 
     *
     * @return view student.major
     */
    public function addMajor()
    {
        $this->majorService->addMajor(request()->name);
    
        return redirect('student/major');
    }

    /**
     * Delete An Existing Major
     * 
     * @param int $id
     */
    public function deleteMajor()
    {
        $this->majorService->deleteMajor(request()->id);
        
        return redirect('student/major');
    }
    
}
