<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\Services\Major\MajorServiceInterface;
class StudentAjaxController extends Controller
{
    public function __construct(MajorServiceInterface $majorService)
    {
        $this->majorService = $majorService;
    }

    public function showTable()
    {
        return view('ajax.table');
    }

    public function insertForm()
    {
        $data = $this->majorService->showMajor();
        return view('ajax.insert_form', [
            'data' => $data
        ]);
    }

    public function updateForm(int $id)
    {
        $data = $this->majorService->showMajor();

        return view('ajax.update_form', [
            'data' => $data,
            'id' => $id
        ]);
    }
}
