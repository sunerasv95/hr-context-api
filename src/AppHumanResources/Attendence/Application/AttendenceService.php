<?php

namespace Src\AppHumanResources\Attendence\Application;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Src\AppHumanResources\Attendence\Domain\Attendence;
use Src\AppHumanResources\Attendence\Application\Contracts\AttendenceServiceInterface;
use Src\AppHumanResources\Attendence\Domain\Employee;

class AttendenceService implements AttendenceServiceInterface
{
    public function getEmployeeAttendence(int $empCode)
    {
        try {
            $emp = Employee::where('employee_code',$empCode)->with(['attendences'])->first();

            if(isset($emp) && $emp->attendences){
                
                //calculating total hours count
                $totalHours = $emp->attendences->reduce(function($tot, $i){
                    $timeDiff= Carbon::parse($i->checkout_at)->diffInHours(Carbon::parse($i->checkin_at));
                    return $tot + $timeDiff;
                }, 0);

                //destructuring response attributes
                $emp->attendences->map(function($a){
                    unset($a->id);
                    unset($a->employee_id);
                    return $a;
                });

                $emp->toArray();
                $emp['total_hours'] = $totalHours;
            }

            return $emp;
        } catch (\Throwable $th) {
            throw $th;
        }
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
