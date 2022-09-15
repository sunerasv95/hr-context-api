<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
        
class AttendenceImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
          
        }
    }
}