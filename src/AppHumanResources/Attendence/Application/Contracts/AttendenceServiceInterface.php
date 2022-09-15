<?php

namespace Src\AppHumanResources\Attendence\Application\Contracts;

interface AttendenceServiceInterface 
{
    public function uploadAttendenceFile(array $attendenceData =[]);
}