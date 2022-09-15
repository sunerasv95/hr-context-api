<?php

namespace Src\AppHumanResources\Attendence\Application\Contracts;

interface AttendenceServiceInterface 
{
    public function getAllAttendenceByEmployee(int $empId);
}