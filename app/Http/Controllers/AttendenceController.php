<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\AppHumanResources\Attendence\Application\Contracts\AttendenceServiceInterface;

class AttendenceController extends Controller
{
    private $attendenceService;

    public function __construct(AttendenceServiceInterface $attendenceService)
    {
        $this->attendenceService = $attendenceService;
    }

    public function getByEmployee(int $empId)
    {
        return $this->attendenceService->getAllAttendenceByEmployee($empId);
    }
}
