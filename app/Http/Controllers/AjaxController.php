<?php

namespace App\Http\Controllers;

use App\Models\AccesoriesTransaction;
use Str;
use Exception;
use App\Models\User;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Transection;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AjaxController extends Controller
{
    public function ajaxLoaderSubject(Request $request)
    {
        $data = Subject::where('class_id', $request->class_id)->where('school_id', Auth::user()->id)->get();

        $html = '<label><b>Subject</b></label><select class="form-select mb-3" name="subject_id" id="subject_id">
        <option value="" selected>Subject</option>';

        foreach ($data as $subject) {
            $html .= '<option value="' . $subject->id . '">' . $subject->subject_name . '</option>';
        }

        $html .= '</select>';

        return $html;
    }
    public function ajaxAccesorisTransaction(Request $request)
    {


        $access = AccesoriesTransaction::create([

            "name" => $request->name,
            "roll" => $request->roll,
            "class" => $request->class,
            "section" => $request->section,
            "amount" => $request->amount,
            "quantity" => $request->quantity,
            "accesories" => $request->accesories,
            'school_id' =>  Auth::id()

        ]);
        return response()->json(['success' => true, 'access' => $access]);
    }




    public function ajaxLoaderaccesories(Request $request)
    {
        Transection::create([
            'purpose' => 'receipt Accesories Payment',
            'payment_method' => 1,
            'type' => '3',
            'amount' => $request->amount,
            'name' => 'admin',
            'school_id' =>  Auth::id()
        ]);
    }

    public function ajaxLoadStudents(Request $request)
    {
        $request->validate([
            'shift' =>  ['required', 'integer'],
            'classId' =>  ['required', 'exists:institute_classes,id', 'integer'],
        ]);

        $rows = User::where(['school_id' => Auth::id(), 'shift' => $request->shift, 'class_id' => $request->classId])->get();

        $html = '<label>Student</label>  <select class="form-select mb-3" name="student_id" required>
        <option value="0" selected>All Students</option>';

        foreach ($rows as $row) {
            $html .= '<option value="' . $row->phone . '">' . $row->name . '</option>';
        }

        $html .= '</select>';

        return $html;
    }


    /**
     * 
     */
    public function zkTeck()
    {
        try {

            $zk = new ZKTeco('192.168.0.114', '4370');

            if ($zk->connect()) {
                $zk->disableDevice();
                // $zk->setUser(3, 119001, "Akbar Sir", '12345678', 0);
                // $zk->removeUser(3);
                // $zk->clearUsers();
                // return  $zk->getUser();


                $att =  $zk->getAttendance();
                // $zk->clearAttendance();
                $zk->enableDevice();
                return $att;
            }

            return "Not connect";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function ajaxLoaderSection(Request $request)
    {
        $data = Section::where('class_id', $request->class_id)->where('school_id', Auth::user()->id)->get();

        $html = '<label class="form-label">Section</label><select class="form-select mb-3" name="section_id" id="section_id">
        <option value="" selected>Section</option>';

        foreach ($data as $section) {
            $html .= '<option value="' . $section->id . '">' . $section->section_name . '</option>';
        }

        $html .= '</select>';

        return $html;
    }
}
