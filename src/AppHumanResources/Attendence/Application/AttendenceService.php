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

    public function uploadAttendenceFile(array $attendenceData = [])
    {
        DB::beginTransaction();

        try {
            foreach($attendenceData as $k => $data){
                if($k > 0){

                    $empId = Employee::where('employee_code', $data[1])->first()->id;

                    $attendence = new Attendence();

                    $attendence->employee_id    = $empId;
                    $attendence->checkin_at     = $data[2];
                    $attendence->checkout_at    = $data[3];
                    $attendence->checked_date   = $data[4];

                    $attendence->save();
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        DB::commit();
        return true;
    }
}