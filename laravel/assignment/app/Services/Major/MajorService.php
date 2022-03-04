<?php

namespace App\Services\Major;

use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Dao\Major\MajorDaoInterface;

class MajorService implements MajorServiceInterface
{
    private $majorDao;

    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }

    /**
     * Show Student Table
     * 
     * @return array $data
     */
    public function showMajor()
    {
        return $this->majorDao->showMajor();
    }

    /**
     * Add New Major
     * 
     *
     * @return view student.major
     */
    public function addMajor(string $name)
    {
        return $this->majorDao->addMajor($name);
    }

    /**
     * Delete An Existing Major
     * 
     * @param int $id
     */
    public function deleteMajor(int $id)
    {
        return $this->majorDao->deleteMajor($id);
    }
}