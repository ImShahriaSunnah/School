<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Imports\AttendanceImport;
use App\Models\Attendance;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Rats\Zkteco\Lib\ZKTeco;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    /**
     * get attendance from device
     */
    public function getAttendanceFromDevice()
    {
        if (function_exists('socket_sendto')) {
            echo "Socket extension is installed.";
        } else {
            echo "Socket extension is NOT installed.";
        }


        try{
            $zk = new ZKTeco(Auth::user()->zk_ip_address, Auth::user()->zk_ip_port);
        
            if($zk->connect())
            {
                $zk->disableDevice();
                $rows =  $zk->getAttendance();
                
                if(count($rows) > 0)
                {
                    foreach($rows as $row)
                    {
                        $user = User::where('unique_id', $row['id']);

                        if($user->exists())
                        {
                            $student = $user->first();
                            $attendance = new Attendance();
                            $attendance->student_id = $student->id;
                            $attendance->attendance = 1;
                            $attendance->comment = "Fringerprint Attendance";
                            $attendance->school_id = Auth::id(); // school Id
                            $attendance->class_id = getUserName($student->id)->class_id;
                            $attendance->section_id = getUserName($student->id)->section_id;
                            $attendance->group_id = getUserName($student->id)->group_id;
                            $attendance->created_at = $row['timestamp'];
                            $attendance->save();
                        }
                    }

                    User::where("school_id", Auth::id())->get();

                    $zk->clearAttendance();
                    $zk->enableDevice();
                }
                else
                {
                    Alert::info("Opps!", "No record Found");
                    return back();
                }                

                Alert::success("Great!", "Record added successfully");
                return back();
            }

            return "Not connect";
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }


    /** 
     * upload attendance
     * =============================================
     */
    public function uploadAttendance(Request $request)
    {
        $request->validate([
            'file'  =>  ['required', 'mimes:xls,xlsx,csv'],
        ]);

        try {

            $import = new AttendanceImport();
            $import->import($request->file);

            $usersId = User::where("school_id", Auth::id())->pluck('id');

            foreach($usersId as $sid)
            {
                $attExists = Attendance::where('school_id', Auth::id())->where('student_id', $sid)->whereDate('created_at', today())->exists();
            
                if(!$attExists)
                {
                    $student = User::find($sid);

                    Attendance::insert([
                        'student_id'    => $student->id,
                        'attendance'    => 0, // absence
                        'class_id'      => $student->class_id,
                        'section_id'     => $student->section_id,
                        'school_id'     =>  $student->school_id,
                        'comment'     =>  "Fingerprint",
                        'created_at'     =>  today(),
                        'updated_at'     =>  today(),
                    ]);


                    $token   = env('GREENWEB_TOKEN'); // greenweb api access
                    $to      = $student->phone;
                    $message = $student->name . " is absent today(" . date('d-m-Y') . ")";

                    $data = [
                        'to'      => "$to",
                        'message' => "$message",
                        'token'   => "$token"
                    ]; // Add parameters in key value
                    $url = "http://api.greenweb.com.bd/api.php?json";

                    // $ch = curl_init(); // Initialize cURL
                    // curl_setopt($ch, CURLOPT_URL, $url);
                    // curl_setopt($ch, CURLOPT_ENCODING, '');
                    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    // $smsresult = curl_exec($ch);
                }
            }

            Alert::success('Great!', 'Record imported successfully');
            return back();
        } 
        catch (ValidationException $e) 
        {
            $failures = $e->failures();
            Alert("error", $failures);
            return back();
        }
    }
}
