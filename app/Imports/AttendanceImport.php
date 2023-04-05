<?php

namespace App\Imports;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;




class AttendanceImport implements ToModel
{

    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $student = User::where('school_id', Auth::id())->where('unique_id', $row[0])->first();
        $attDate = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]));

        if($student)
        {
            return new Attendance([
                'student_id'    => $student->id,
                'attendance'    => $row[2],
                'class_id'      => $student->class_id,
                'section_id'     => $student->section_id,
                'school_id'     =>  $student->school_id,
                'comment'     =>  "Fingerprint",
                'created_at'     =>  $attDate,
                'updated_at'     =>  $attDate,
            ]);
        }
        
    }
}
