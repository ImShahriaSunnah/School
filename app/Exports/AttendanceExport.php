<?php

namespace App\Exports;

use App\Models\AppModelsAttendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    function __construct($class_id,$section_id,$group_id,$date) {
        $this->class_id = $class_id;
        $this->section_id = $section_id;
        $this->group_id = $group_id;
        $this->date = $date;
    }
    public function collection()
    {
        $today = Carbon::now('d');

        if(!is_null($this->group_id)){
                $reportdata =  DB::table('attendances as a')
                    ->leftJoin('institute_classes as ic','ic.id','a.class_id')
                    ->leftJoin('users as u','u.id','a.student_id')
                    ->leftjoin('sections as s','s.id','a.section_id')
                     ->leftjoin('groups as g','g.id','a.group_id')
                    ->where('a.class_id',$this->class_id)
                    ->where('a.section_id',$this->section_id)
                    ->where('a.group_id',$this->group_id)
                    ->whereDate('a.created_at', $this->date)
                    ->select('u.name as StudentName','u.roll_number as RollNumber','ic.class_name as Class','s.section_name as Section Name','a.created_at',DB::raw('(CASE
                        WHEN a.attendance = "0" THEN "Absent"
                        WHEN a.attendance = "1" THEN "Present"
                        WHEN a.attendance = "2" THEN "Late"
                        ELSE "None"
                        END) AS AttendanceData'))->get();
                return $reportdata;
            }else{
            $reportdata =  DB::table('attendances as a')
                ->leftJoin('institute_classes as ic','ic.id','a.class_id')
                ->leftJoin('users as u','u.id','a.student_id')
                ->leftjoin('sections as s','s.id','a.section_id')
                ->where('a.class_id',$this->class_id)
                ->where('a.section_id',$this->section_id)
                ->whereDate('a.created_at', $this->date)
                ->select('u.name as StudentName','u.roll_number as RollNumber','ic.class_name as Class','s.section_name as Section Name','a.created_at',DB::raw('(CASE
                        WHEN a.attendance = "0" THEN "Absent"
                        WHEN a.attendance = "1" THEN "Present"
                        WHEN a.attendance = "2" THEN "Late"
                        ELSE "None"
                        END) AS AttendanceData'))->get();
            return $reportdata;
        }


    }

    public function headings():array
    {
        return ['StudentName','RollNumber','Class','Section','Date','Attendance Data'];

    }
}
