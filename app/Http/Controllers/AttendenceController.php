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

    public function uploadAttendence(Request $request)
    {
        $file = $request->file('attendence_upload');

        //dd($savedFileName);
        $arr = Excel::toArray(new AttendenceImport, $file);

        $result = $this->attendenceService->uploadAttendenceFile($arr[0]);

        if(isset($result)){
            return response()->json([
                "error" => false,
                "message" => "Attendence data uploaded successfully",
            ]);
        }else{
            return response()->json([
                "error" => true,
                "message" => "Attendence data uploading failed!"
            ]);
        }
    }
}
