<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\AssignStudentFee;
use App\Models\Bank;
use App\Models\Employee;
use App\Models\FeesType;
use App\Models\InstituteClass;
use App\Models\StudentFee;
use App\Models\TeacherSalary;
use App\Models\StudentMonthlyFee;
use App\Models\Teacher;
use App\Models\EmployeeSalary;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Transection;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class FinanceController extends Controller
{

    /**
     * go to finance dashboard
     */
    public function dashboard()
    {
        $teacherSalary = Teacher::where('school_id', Auth::user()->id)->sum("salary");
        $currentMonth = Carbon::now()->month;
        $teacherPaidSalary = TeacherSalary::where('school_id', Auth::user()->id)->whereMonth('updated_at', '=', $currentMonth)->sum("amount");
        $StaffSalary = Employee::where('school_id', Auth::user()->id)->sum("salary");
        $StaffPaidSalary = EmployeeSalary::where('school_id', Auth::user()->id)->whereMonth('updated_at', '=', $currentMonth)->sum("amount");
        $Expense = Transection::where('school_id', Auth::user()->id)->where('type','1')->sum("amount");
        $TotalFees = StudentMonthlyFee::where('school_id', Auth::user()->id)->sum("amount");
        $sumFund = Transection::where('school_id', Auth::user()->id)->where('type','2')->sum("amount");
        $colected = StudentMonthlyFee::where('school_id', Auth::user()->id)->where('status','2')->sum("amount");
        $due = StudentMonthlyFee::where('school_id', Auth::user()->id)->where('status','0')->sum("amount");
        $accesories = Transection::where('school_id', Auth::user()->id)->where('type','3')->sum("amount");
        $profit = $sumFund + $colected + $accesories - $teacherPaidSalary - $StaffPaidSalary - $Expense;
        // $profit = abs($profit);

        return view("frontend.school.finance.dashboard.dashboard",compact('teacherSalary','teacherPaidSalary','StaffSalary','StaffPaidSalary','Expense','TotalFees','sumFund','colected','due','accesories','profit'));
    }


    /**
     * view fees blade
     */
    public function index(Request $request)
    {
        $data['classes'] = InstituteClass::where('school_id', Auth::id())->get();
        $data['fee_types'] = FeesType::where('school_id', Auth::id())->get();

        if(isset($request['class']) && $request['class'] != 0)
        {
            if(InstituteClass::where('school_id', Auth::id())->where('id', $request['class'])->exists()):
                return view('frontend.school.finance.fees-create', compact('data'));
            else:
                Alert::info('Sorry!', "Class does not exists. You can add more class");
                return back();
            endif;
        }

        return view('frontend.school.finance.fees-create', compact('data'));
    }


    /**
     * store fees title
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|regex:/^[a-zA-Z0-9\s]+$/u',
            'fees.*'    => 'numeric'
        ]);

        try{
            FeesType::updateOrCreate([
                    'school_id' =>  Auth::id(),
                    'title'     =>  $request['title'],
            ],[]);

            return back();
        }
        catch(Exception $e)
        {
            return back()->with('status', $e->getMessage());
        }
    }

    /**
     * fees update
     */
    public function update(Request $request)
    {
        $request->validate([
            'class_id'  =>  ['required', 'integer'],
            // 'class'      =>  ['required'],
            'fees.*'      =>  'required | integer'
        ]);

        // return $request;

        try{

            if($request['class_id'] == 0) // for all classes
            {
                $classes = InstituteClass::where('school_id', Auth::id())->get();

                foreach($classes as $class)
                {
                    foreach($request['fees_type_id'] as $key => $item)
                    {
                        StudentFee::updateOrCreate([
                                'school_id' =>  Auth::id(),
                                'class_id'     =>  $class->id,
                                'fees_type_id'  =>  $item
                        ],

                        ['fees' =>  $request['fees'][$key] ?? 0]);
                    }
                }
            }
            else // single class
            {
                foreach($request['fees_type_id'] as $key => $item)
                {
                    StudentFee::updateOrCreate([
                            'school_id' =>  Auth::id(),
                            'class_id'     =>  $request['class_id'],
                            'fees_type_id'  =>  $item
                    ], ['fees'=>$request['fees'][$key] ?? 0]);
                }
            }

            Alert::success("Great!", "Fees updated successfully");
            return back();
        }
        catch(Exception $e)
        {
            return back()->with('status', $e->getMessage());
        }
    }



    /**
     * show students list
     */
    public function students(Request $request)
    {
        $q = User::where('school_id', Auth::id());

        if(isset($request['class']))
        {
            $q->where('class_id', $request['class']);
        }
        elseif(isset($request['secion']))
        {
            $q->where('section_id', $request['secion']);
        }

        $data['students'] = $q->paginate();
        $data['classes'] = InstituteClass::where('school_id', Auth::id())->get();
        $data['months'] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return view('frontend.school.finance.students-fee', compact('data'));
    }


        /**
     * show students list
     */
    public function findStudent($sid = null, $month)
    {
        $student = User::where('school_id', Auth::id())->where('id', $sid);
        $data['month'] = $month;
        $studentMonthlyFees = StudentMonthlyFee::where('student_id', $sid)->get();

        if($student->exists())
        {
            $data['student'] = $student->first();
            $data['months'] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            $monthlyFee = InstituteClass::where('school_id', Auth::id())->where('id', $data['student']->class_id)->first()->class_fees;

            if($month != 'n'):
                $data['assignFees'] = AssignStudentFee::where('school_id', Auth::id())->where('class_id', $data['student']->class_id)->where('month_id', $month)->first();
                // $monthlyFee = InstituteClass::where('school_id', Auth::id())->where('id', $data['student']->class_id)->first()->class_fees;
                $data['studentFees'] = StudentMonthlyFee::where('school_id', Auth::id())->where('student_id', $data['student']->id)->where('month_id', $month)->first();
            endif;

            // return $data;
            return view('frontend.school.finance.student-fees', compact('data','monthlyFee','studentMonthlyFees'));
        }

        Alert::info("Sorry!", 'Record does not exists');
        return back();

    }

    /**
     * get finance history
     */
    public function getFinanceHistory(Request $request)
    {
        $data['requests'] = $request->except('_token');

        $student = User::where('school_id', Auth::id())->where('id', $request->studentId);
        $data['month'] = $request->month;

        if($student->exists())
        {
            $data['student'] = $student->first();
            $data['months'] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            $monthlyFee = InstituteClass::where('school_id', Auth::id())->where('id', $data['student']->class_id)->first()->class_fees;

            $data['assignFees'] = AssignStudentFee::where('school_id', Auth::id())->where('class_id', $data['student']->class_id)->whereIn('month_id', $data['months'])->get();
            $data['studentFees'] = StudentMonthlyFee::where('school_id', Auth::id())->where('student_id', $data['student']->id)->whereIn('month_id', $data['months'])->get();
            return $data;
            return view('frontend.school.finance.student-fees', compact('data','monthlyFee'));
        }
    }

    public function studentSchoolScholarship(Request $request, $id)
    {
        $student = User::find($id);
        $student->scholarship = $request->scholarship;
        $student->save();
        Alert::success('Success student scholarship', 'Success Message');
        return back();

    }

    // public function scholarshipStatus(Request $request)
    // {
    //     $key = $request->key;
    //     $status = $request->status;
    //     $row = User::where(['id'=>  $key]);

    //     if($row->exists())
    //     {
    //         if($status == 1)
    //         {
    //             $row->update(['status'  =>  1]);
    //         }
    //         else if($status == .5)
    //         {
    //             $row->update(['status' => .5]);
    //         }
    //         else
    //         {
    //             $row->update(['status'  =>  0]);
    //         }

    //         return back()->with('success', 'Record updated successfully');
    //     }

    //     return back()->with('error', 'Something went wrong. Please try again after login');
    // }


    /**
     * received student fees
     *
     * @param Request
     * @param $request
     * @return @param \Illuminate\Contracts\View\View
     */
    public function receivedFees(Request $request)
    {
        $request->validate([
            'studentId' =>  ['required', 'exists:users,id'],
            'monthId'   =>  ['required'],
            'amount'    =>  ['required'],
            'assignFeesId'    =>  ['required']
        ]);

        try{
            $bank = Bank::where('school_id', Auth::id());

            if($bank->count() > 0):

            StudentMonthlyFee::updateOrCreate(
                [
                    'school_id'     =>  Auth::id(),
                    'student_id'    =>  $request['studentId'],
                    'month_id'      =>  $request['monthId']
                ],
                [
                    'amount'        =>  $request['amount'],
                    'status'        =>  2 // status = paid
                ]
            );

            // update mother account
            $bank = $bank->first();
            $bank->balance += $request['amount'];
            $bank->update(['amount'=>$bank->balance]);

            Transection::create([
                'purpose'   =>  "Collect student fee",
                'payment_method'    => 1, // 1 for handCash
                'amount'        =>  $request['amount'],
                'name'          =>  'Admin',
                'type'          =>  2, // 2 for fundad or add
                'school_id'     =>  Auth::id()
            ]);

            $data['user'] = User::find($request['studentId']);            
            $data['assignFees'] = AssignStudentFee::find($request['assignFeesId']);
            $data['studentFees'] = StudentMonthlyFee::where('school_id', Auth::id())->where('student_id', $data['user']->id)->where('month_id', $request['monthId'])->first();
            $data['html'] = view('pdf.monthly-fee', compact('data'))->render();
            $resp['status'] = true;
            $resp['message'] = "Record updated successfully";
            $resp['data'] = $data;
            $paymentSlip = $data;

            else:

            Alert::Info("Sorry!", 'Please add a bank account first');
            endif;

        }
        catch(Exception $e)
        {
            $resp['status'] = false;
            $resp['message'] = $e->getMessage();
            $resp['data'] = null;
        }

        return response()->json($paymentSlip);
    }

    /**
     * Delete Finance Fees Title
     *
     * @param Request
     * @param $request
     * @return redirector
     */
    public function financeTitleDelete($id)
    {
        StudentFee::where('fees_type_id', $id)->delete();
        FeesType::findOrFail($id)->delete();
        toast("Successfully Delete Fees Type", "success");

        return redirect()->back();
    }
}
