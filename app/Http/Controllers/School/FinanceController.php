<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\AssignStudentFee;
use App\Models\Bank;
use App\Models\Employee;
use App\Models\FeesType;
use App\Models\InstituteClass;
use App\Models\StudentFee;
use App\Models\StudentMonthlyFee;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Transection;
use Barryvdh\DomPDF\Facade\Pdf;

class FinanceController extends Controller
{

    /**
     * go to finance dashboard
     */
    public function dashboard()
    {
        $teacherSalary = Teacher::where('school_id', Auth::user()->id)->sum("salary"); 
        $StaffSalary = Employee::where('school_id', Auth::user()->id)->sum("salary");      
        $Expense = Transection::where('school_id', Auth::user()->id)->where('type','1')->sum("amount");      
        $TotalFees = StudentMonthlyFee::where('school_id', Auth::user()->id)->sum("amount");    
        $sumFund = Transection::where('school_id', Auth::user()->id)->where('type','2')->sum("amount");
        $colected = StudentMonthlyFee::where('school_id', Auth::user()->id)->where('status','2')->sum("amount");    
        $due = StudentMonthlyFee::where('school_id', Auth::user()->id)->where('status','0')->sum("amount"); 
        $accesories = Transection::where('school_id', Auth::user()->id)->where('type','3')->sum("amount");
        $profit=$sumFund+$colected+$accesories-$teacherSalary-$StaffSalary-$Expense;
        $profit = abs($profit);
        
        return view("frontend.school.finance.dashboard.dashboard",compact('teacherSalary','StaffSalary','Expense','TotalFees','sumFund','colected','due','accesories','profit'));
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
            'title' => ['required']
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
            'fees'      =>  ['required', 'array'],
            // 'fees.*'      =>  ['required'],
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
                        ], ['fees'=>$request['fees'][$key] ?? 0]);
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

        if($student->exists())
        {
            $data['student'] = $student->first();
            $data['months'] = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            if($month != 'n'):
                $data['assignFees'] = AssignStudentFee::where('school_id', Auth::id())->where('class_id', $data['student']->class_id)->where('month_id', $month)->first();
                $data['studentFees'] = StudentMonthlyFee::where('school_id', Auth::id())->where('student_id', $data['student']->id)->where('month_id', $month)->first();
            endif;

            // return $data;
            return view('frontend.school.finance.student-fees', compact('data'));
        }

        Alert::info("Sorry!", 'Record does not exists');
        return back();

    }


    /**
     * received student fees
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
                    'status'        => 2 // status = paid
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
                
            // $resp['status'] = false;
            // $resp['message'] = "Please add a bank account first";
            // $resp['data'] = null;
           
            Alert::Info("Sorry!", 'Please add a bank account first');
            endif;

        }
        catch(Exception $e)
        {
            $resp['status'] = false;
            $resp['message'] = $e->getMessage();
            $resp['data'] = null;
        }
        
        // return response()->json($resp);

        return back()->with('paymentSlip', compact('paymentSlip'));
    }
}
