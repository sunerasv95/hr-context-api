<?php

namespace Src\AppHumanResources\Attendence\Application;

use Src\AppHumanResources\Attendence\Domain\Attendence;
use Src\AppHumanResources\Attendence\Application\Contracts\AttendenceServiceInterface;

class AttendenceService implements AttendenceServiceInterface
{
    public function getAllAttendenceByEmployee(int $empId)
    {
        //return Attendence::get();
    }

    public function saveAllAttendence()
    {

    }
}