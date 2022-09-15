<?php

namespace Src\AppHumanResources\Attendence\Application\Contracts;

interface AttendenceServiceInterface 
{
    public function getEmployeeAttendence(int $empCode);

    public function uploadAttendenceFile(array $attendenceData =[]);
}