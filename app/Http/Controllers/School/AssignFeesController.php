<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\AssignStudentFee;
use App\Models\FeesType;
use App\Models\InstituteClass;
use App\Models\StudentFee;
use App\Models\StudentMonthlyFee;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;

class AssignFeesController extends Controller
{
    /**
     * show form assign fees 
     */
    public function index()
    {
        $data['classes'] = InstituteClass::where('school_id', Auth::id())->get();
        $data['fee_types'] = FeesType::where('school_id', Auth::id())->get();
        $data['months'] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        return view('frontend.school.assignFees', compact('data'));
    }


    /**
     * show form assign fees 
     */
    public function store(Request $request)
    {   
        $request->validate(
            [
                'class' =>  ['required', 'array'],
                'month' =>  ['required', 'array'],
                'feesTypeId'    => 'required|array',
            ],
            [
                'feesTypeId.required' => "Please select atleast one fees"
            ]
        );

        foreach($request['class'] as $classId)
        {   
            try{
                foreach($request['month'] as $month)
                {   
                    AssignStudentFee::where(['class_id'=> $classId, 'month_id' => $month])->delete();

                    $data = [];
                    $inTotalFee = 0;
                    
                    foreach($request['feesTypeId'] as $feesType)
                    {
                        $fees = StudentFee::where(['school_id' => Auth::id(), 'class_id' => $classId, 'fees_type_id' => $feesType])->first();
                        $feesTitle = \Str::camel(FeesType::find($feesType)->title);

                        $data[$feesTitle] = $fees->fees ?? 0;

                        $inTotalFee += $fees->fees ?? 0;
                    }

                    // store record in assign student fees
                    AssignStudentFee::create([
                        'school_id' =>  Auth::id(),
                        'class_id'  =>  $classId,
                        'month_id'  =>  $month,
                        'fees_details'  => json_encode($data)
                    ]);

                    // selected class students
                    $students = User::where(['school_id'=>Auth::id(), 'class_id'=>$classId])->get();

                    foreach($students as $student)
                    {
                        StudentMonthlyFee::where(['school_id'=>Auth::id(), 'student_id'=>$student->id, 'month_id'=>$month])
                        ->update(['amount'=>$inTotalFee]);
                    }
                }                
            }
            catch(Exception $e)
            {
                Alert::error("Great!", $e->getMessage());
                return back();
            }
        }

        Alert::success("Great!", "Fees assign successfully");
        return back();
    }
}
