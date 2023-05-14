<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\School;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    /**
     * get fetch log from stellar device
     */
    public function getFetchLog(Request $request)
    {
        $data = array(
            "operation" => "fetch_log",
            "auth_user" => Auth::user()->device_username,
            "auth_code" => env('STELLAR_AUTH_CODE'),
            "start_date"=> date("Y-m-d", strtotime($request->from_date)),
            "end_date"  => date("Y-m-d", strtotime($request->to_date)),
            "start_time"=> "00:00:00",
            "end_time"  => "23:59:00"
        );

        $datapayload = json_encode($data);
        $api_request = curl_init('https://rumytechnologies.com/rams/json_api');
        curl_setopt($api_request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($api_request, CURLINFO_HEADER_OUT, true);
        curl_setopt($api_request, CURLOPT_POST, true);
        curl_setopt($api_request, CURLOPT_POSTFIELDS, $datapayload);
        curl_setopt($api_request, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Content-Length: ' . strlen($datapayload)));
        $result = curl_exec($api_request);

        $result =  json_decode($result);

        foreach($result->log as $item)
        {
            $student = User::where('school_id', Auth::id())->where('unique_id', $item->registration_id);
            
            if($student->exists())
            {
                $student = $student->first();

                Attendance::insert([
                    'student_id'    => $student->id,
                    'attendance'    => 1,
                    'class_id'      => $student->class_id,
                    'section_id'    => $student->section_id,
                    'school_id'     =>  $student->school_id,
                    'comment'       =>  "Fingerprint",
                    'created_at'    =>  $item->access_date . ' ' . $item->access_time,
                    'updated_at'    =>  $item->access_date . ' ' . $item->access_time,
                ]);
            }
        }

        // processing for absence
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
            }
        }
        
        Alert::success('Fetch data successfully', 'Great!');
        return back();
    }


    /**
     * 
     */
    public function index()
    {
        return view('frontend.school.settings.form');
    }


    /**
     * 
     */
    public function update(Request $request)
    {
        try{
            $school = School::find(Auth::id());
            $school->device_address = $request->device_address;
            $school->device_username    = $request->device_username;
            $school->save();

            Alert::success("Record updated Successfully", 'Server Error');
            return back();
        }
        catch(Exception $e)
        {
            Alert::error($e->getMessage(), 'Server Error');
            return back();
        }

    }
}
