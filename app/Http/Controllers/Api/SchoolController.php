<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AssignTeacher;
use App\Models\Attendance;
use App\Models\Checkout;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use App\Models\Group;
use App\Models\Notice;
use App\Models\StaffType;
use App\Models\StudentFee;
use App\Models\TeacherSalary;
use App\Models\Term;
use App\Models\InstituteClass;
use App\Models\Message;
use App\Models\MessagePackage;
use App\Models\Otp;
use App\Models\Price;
use App\Models\PromoAccount;
use App\Models\Result;
use App\Models\School;
use App\Models\SchoolFee;
use App\Models\Section;
use App\Models\Store;
use App\Models\StudentMonthlyFee;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\WorkplaceInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:schools',
            'phone_number' => 'required|unique:schools',
            'password' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status_code'=>400,'message'=>'Bad Request',
                'error'   => $validator->errors(),],400);
        }
        $user = new School();

        $user->school_name = $request->full_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

        $user->save();
        $user = School::where('id',$user->id)->first();
        $token   = "8371b733bd239059f940b857e94d4cf2";
        $code    = rand(1000, 9999);
        $to      = $user['phone_number'];
        $message = "Your OTP is " . $code;

        $otp = new Otp();

        $otp->otp = $code;
        $otp->school_id = $user->id;
        $otp->phone = $request->phone_number;
        $otp->email = $request->email;
        $otp->save();


        $url = "http://api.greenweb.com.bd/api.php?json";

        $data = [
            'to'      => "$to",
            'message' => "$message",
            'token'   => "$token"
        ]; // Add parameters in key value

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);

        DB::commit();

        return response()->json([
            'message' => 'otp send sucessfully',
            'data' => $user->id,
            'success' => true,
            'status'  => 201,
        ], 201);
    }

    public function verifyOtp(Request $request){
        $otp = Otp::where('otp',$request->otp)->first();
        if(!is_null($otp)){
            $user = School::where('phone_number',$otp->phone)->first();
            $user->is_editor = 1;
            $user->save();
            $otp->delete();
            $user = School::where('id',$user->id)->first();
            $tokenResult = $user->createToken('authToken');
            return response()->json([
                'message'=>'account Verified Successfully',
                'status_code'=>200,
                'data'=>$user,
                'token'=>$tokenResult
            ]);
        }else{
            return response()->json(['status_code'=>400,'message'=>'Otp does not matched']);
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'phone_number' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json(['status_code'=>400,'message'=>'Bad Request']);
        }
        $credentials = request(['phone_number','password']);

        if(!Auth::guard('schools')->attempt($credentials)){
            return response()->json(['status_code'=>500,'message'=>'Unauthrazied']);
        }
        $user = School::where('phone_number',$request->phone_number)->first();
        $tokenResult = $user->createToken('authToken');
        return response()->json([
            'status_code'=>200,
            'data'=>$user,
            'token'=>$tokenResult
        ]);
    }

    public function schoolList(){
        $data = School::where('status','1')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);
    }

    public function schoolListSearch($data)
    {
        $search = School::orwhere('school_name',"like","%".$data."%")->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $search,
        ], 201);
    }

    public function acquisitionPost(Request $request)
    {
        $workplaceinfo = new WorkplaceInfo();

        $workplaceinfo->workspace_name = $request->workspace_name;
        $workplaceinfo->student = $request->student;
        $workplaceinfo->teachers = $request->teachers;
        $workplaceinfo->hear_us = $request->hear_us;
        $workplaceinfo->school_id = Auth::user()->id;

        $workplaceinfo->save();

        $school = School::where('id', Auth::user()->id)->first();
        $school->is_editor = 2;
        $school->save();

        $workplaceinfo = WorkplaceInfo::where('id',$workplaceinfo->id)->first();

        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $workplaceinfo,
        ], 201);
    }


    public function priceSuggest($id){
        $workplace = WorkplaceInfo::where('id',$id)->first();
        $student = substr($workplace->student,2);
        $teachers = substr($workplace->teachers,2);
        $price = Price::orwhere('student','>=', (int)$student)->orderby('student','desc')->limit(2)->get();

        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $price,
            'id'  => $id,
        ], 201);

    }



    public function selectPricePost(Request $request,$id){
        $request->validate
        ([
            'select' => 'required',
        ]);
        $workPlace = WorkplaceInfo::where('id',$id)->first();
        $workPlace->price_id = is_null($request->select) ? 0 :$request->select;
        $workPlace->save();
        $school = School::where('id',Auth::user()->id)->first();
        $school->is_editor = 3;
        $school->save();

        $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        foreach ($month as $iteration =>$data){
            $monthFunction =date('m');
            if($iteration+1 > $monthFunction){
                $fees = new SchoolFee();
                $fees->month_name = $data;
                $fees->month_id = $iteration+1;
                $fees->school_id = Auth::user()->id;
                $fees->save();
            }

        }

        for($i=1;$i<11;$i++){
            $class = new InstituteClass();
            $class->class_name = 'class '.$i;
            $class->class_fees = 0;
            $class->active = 1;
            $class->school_id = Auth::user()->id;

            $class->save();
            $section = new Section();
            $section->section_name ='Section A';
            $section->class_id = $class->id;
            $section->active = 1;
            $section->school_id = Auth::user()->id;
            $section->save();
        }

        $department = ['Bangla 1st Paper','Bangla 2nd Paper','English 1st Paper',
            'English 2nd Paper','Math','Religion','ICT','Physics',
            'Chemistry','Biology','Higher Math','Accounting',
            'Finance','Agricultural Studies','Business Entrepreneurship','General Science'];

        foreach($department as $dept){
            $department = new Department();
            $department->department_name = $dept;
            $department->active = 1;
            $department->school_id = Auth::user()->id;

            $department->save();

        }

        $term = ['Term 1','Term 2'];

        foreach($term as $tm){
            $term = new Term();
            $term->term_name = $tm;
            $term->active = 1;
            $term->school_id = Auth::user()->id;

            $department->save();

        }

        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }


    // api for school operation ...............

    public function createClassPost(Request $request){
        $data = new InstituteClass();
        $data->class_name = $request->class_name;
        $data->class_fees = $request->class_fees;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = InstituteClass::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showClass(){
        $data = InstituteClass::orderby('id','desc')->where('school_id',Auth::user()->id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteClass($id){
        $dataFee = StudentFee::where('class_id',$id)->delete();
        $data = InstituteClass::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editClass($id){
        $data = InstituteClass::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateClass(Request $request,$id){
        $data = InstituteClass::where('id',$id)->where('school_id',Auth::user()->id)->first();
        $data->class_name = $request->class_name;
        $data->class_fees = $request->class_fees;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = InstituteClass::where('id',$data->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showStudentPayAmount($student_id,$month_name){
        $classData = User::where('id',$student_id)->first();
        $data = StudentMonthlyFee::where('student_id',$student_id)->where('month_name',$month_name)->first();
        $dataExtrafees = StudentFee::where('class_id',$classData->class_id)->where('month_name',$month_name)->get();
        $dataExtrafeesAll = StudentFee::where('class_id',0)->where('month_name',$month_name)->get();

        $array_data = [
         'data' => $data ,
         'dataExtrafees' => $dataExtrafees ,
         'dataExtrafeesAll' => $dataExtrafeesAll ,
        ];

        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $array_data,
        ], 201);
    }

    public function postStudentPayAmount(Request $request,$id){
        $studentFeesEdit = StudentMonthlyFee::where('id',$id)->first();
        $studentFeesEdit->amount = $studentFeesEdit->amount + $request->amount;
        if($request->total == $studentFeesEdit->amount){
            $studentFeesEdit->status = 2;
        }else{
            $studentFeesEdit->status = 1;
        }
        $studentFeesEdit->save();

        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);
    }

    public function showTeacherAccount(){
        $data = Teacher::where('school_id',Auth::user()->id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);
    }

    public function showTeacherSalary($teacher_id,$month_name){
        $data = TeacherSalary::where('school_id',Auth::user()->id)->where('teacher_id',$teacher_id)->where('month_name',$month_name)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);
    }

    public function postTeacherSalary(Request  $request,$id){
        $data = TeacherSalary::where('id',$id)->first();
        $data->amount = $request->amount;
        $data->save();

        return response()->json([
            'success' => true,
            'status'  => 201,
            'message'  => 'data post successfully',
        ], 201);
    }







    // api for school -- section operation ...............

    public function createSectionPost(Request $request){
        $data = new Section();
        $data->section_name = $request->section_name;
        $data->class_id = $request->class_id;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Section::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showSection(){
        $data = Section::orderby('id','desc')->where('school_id',Auth::user()->id)->with('class_name')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showSectionClass($class_id){
        $data = Section::orderby('id','desc')->where('class_id',$class_id)->where('school_id',Auth::user()->id)->with('class_name')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteSection($id){
        $data = Section::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editSection($id){
        $data = Section::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateSection(Request $request,$id){
        $data = Section::where('id',$id)->where('active',1)->where('school_id',Auth::user()->id)->first();
        $data->section_name = $request->section_name;
        $data->class_id = $request->class_id;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Section::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }


    // api for school -- group operation ...............

    public function createGroupPost(Request $request){
        $data = new Group();
        $data->group_name = $request->group_name;
        $data->section_id = $request->section_id;
        $data->class_id = $request->class_id;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Group::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showGroup(){
        $data = Group::orderby('id','desc')->where('school_id',Auth::user()->id)->with('class_name')->with('section_name')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteGroup($id){
        $data = Group::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editGroup($id){
        $data = Group::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateGroup(Request $request,$id){
        $data = Group::where('id',$id)->where('school_id',Auth::user()->id)->first();
        $data->group_name = $request->group_name;
        $data->section_id = $request->section_id;
        $data->class_id = $request->class_id;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Group::where('id',$data->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }


    // api for school -- subject operation ...............

    public function createSubjectPost(Request $request){
        $data = new Subject();
        $data->subject_name = $request->subject_name;
        $data->group_id = ($request->group_id == 0) ? NULL :$request->group_id;
        $data->section_id = $request->section_id;
        $data->class_id = $request->class_id;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Subject::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showClassSectionForSubject($class_id,$section_id){
        $data = Group::where('class_id',$class_id)->where('section_id',$section_id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);


    }

    public function showSubject(){
        $data = Subject::orderby('id','desc')->where('school_id',Auth::user()->id)->with('class_name')->with('section_name')->with('group_name')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function dataShowSubject($class_id,$section_id,$group_id){
        $group_id = ($group_id == 0) ? NULL : $group_id;
        $data = Subject::orderby('id','desc')->where('school_id',Auth::user()->id)->where('class_id',$class_id)->where('section_id',$section_id)->where('group_id',$group_id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteSubject($id){
        $data = Subject::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editSubject($id){
        $data = Subject::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateSubject(Request $request,$id){
        $data = Subject::where('id',$id)->where('school_id',Auth::user()->id)->first();
        $data->subject_name = $request->subject_name;
        $data->class_id = $request->class_id;
        $data->section_id = $request->section_id;
        $data->group_id = $request->group_id;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Subject::where('id',$data->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }


    // department ......


    public function createDeptPost(Request $request){
        $data = new Department();
        $data->department_name = $request->department_name;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Department::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showDept(){
        $data = Department::orderby('id','desc')->where('school_id',Auth::user()->id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteDept($id){
        $data = Department::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editDept($id){
        $data = Department::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateDept(Request $request,$id){
        $data = Department::where('id',$id)->where('school_id',Auth::user()->id)->first();
        $data->department_name = $request->department_name;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Department::where('id',$data->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    // term ......


    public function createTermPost(Request $request){
        $data = new Term();
        $data->term_name = $request->term_name;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Term::where('id',$data->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showTerm(){
        
        $data = Term::orderby('id','desc')->where('school_id',Auth::user()->id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteTerm($id){
        $data = Term::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editTerm($id){
        $data = Term::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateTerm(Request $request,$id){
        $data = Term::where('id',$id)->where('school_id',Auth::user()->id)->first();
        $data->term_name = $request->term_name;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;
        $data->save();

        $data = Term::where('id',$data->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }


    public function createTeacherPost(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:teachers',
            'phone' => 'required|unique:teachers',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status_code'=>400,'message'=>'Bad Request',
                'error'   => $validator->errors(),],400);
        }else{
            $password = 123456789;
            $link = 'shikka'.rand(10,100).Auth::user()->id.substr($request->phone,3);
            $data = new Teacher();
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->department_name = $request->department_name;
            $data->active = $request->active;
            $data->link_id = $link;
            $password = $password;
            $data->password = Hash::make($password);
            $data->school_id = Auth::user()->id;

            $data->save();

            $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];

            foreach ($month as $datas){
                $fees = new TeacherSalary();
                $fees->month_name = $datas;
                $fees->teacher_id = $data->id;
                $fees->school_id = $data->school_id;
                $fees->save();
            }

            $data = Teacher::where('id',$data->id)->first();
            return response()->json([
                'success' => true,
                'status'  => 201,
                'data'  => $data,
            ], 201);
        }


    }

    public function showTeacher(){
        $data = Teacher::orderby('id','desc')->where('school_id',Auth::user()->id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteTeacher($id){
        $data = Teacher::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editTeacher($id){
        $data = Teacher::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateTeacher(Request $request,$id){
        $data = Teacher::where('id',$id)->where('school_id',Auth::user()->id)->first();
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->department_name = $request->department_name;
        $data->active = $request->active;
        $data->school_id = Auth::user()->id;

        $data->save();

        $data = Teacher::where('id',$data->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function assignTeacherForData($class_id,$section_id,$group_id){
        $group_id = ($group_id == 0) ? '' : $group_id;
        $data = Subject::where('class_id',$class_id)->where('section_id',$section_id)->where('group_id',$group_id)->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function assignTeacherForDataPost(Request $request){
        $data = new AssignTeacher();

        $data->class_id = $request->class_id;
        $data->section_id = $request->section_id;
        $data->group_id = $request->group_id;
        $data->subject_id = $request->subject_id;
        $data->teacher_id = $request->teacher_id;
        $data->school_id = Auth::user()->id;
        $data->class_teacher = $request->active;

        $data->save();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);
    }

    public function assignTeacherShowAll($class_id,$section_id,$group_id){
        $data = AssignTeacher::where('class_id',$class_id)->where('section_id',$section_id)->where('group_id',$group_id)
            ->with('class_name')->with('section_name')->with('group_name')->with('subject_name')->with('teacher_name')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);
    }

    public function classSectionGroupAll(){
        $data = Section::where('active',1)->where('school_id',Auth::user()->id)->with('class_name')->get();
        $data = $data->each(function ($item){
            $item->group_list = $item->group_name()->where('active',1)->get();
            $item->class_teacher = $item->class_teacher()->with('teacher_name')->where('class_teacher',1)->get();
        });
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);
    }

    public function classSectionGroupAllStudent($class_id,$section_id,$group_id){
        $group_id = ($group_id == 0) ? NULL : $group_id;
        $data = User::where('school_id',Auth::user()->id)->where('class_id',$class_id)->where('section_id',$section_id)->where('group_id',$group_id)->get();
//        $data = $data->each(function ($item){
//            $item->group_list = $item->group_name()->where('active',1)->get();
//            $item->class_teacher = $item->class_teacher()->with('teacher_name')->where('class_teacher',1)->get();
//        });
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);
    }


    public function showAllStudent(){
        $data = User::orderby('id','desc')->where('school_id',Auth::user()->id)->get();
        return response()->json([
            'status_code'=>200,
            'data'=>$data,
            'message'=>'data show Successfully'
        ]);
    }

    public function addAllStudent(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'roll_number' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'parents_name' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        // dd($request->all());
        $password = 123456789;
        $user = new User();

        $user->name = $request->name;
        $user->parents_name = $request->parents_name;
        $user->email = $request->email;
        $user->roll_number = $request->roll_number;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->blood_group = $request->blood_group;
        $user->class_id = $request->class_id;
        $user->section_id = $request->section_id;
        $user->group_id = ($request->group_id == 0) ? NULL : $request->group_id;
        $user->school_id = Auth::user()->id;
        $user->password = Hash::make($password);

        $image = $request->file('image');
        if($request->hasfile('image')){
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('profile/img'),$new_name);
            $user->image = $new_name;
        }
        $user->save();

        $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        foreach ($month as $iteration =>$data){
            $fees = new StudentMonthlyFee();
            $fees->month_name = $data;
            $fees->month_id = $iteration;
            $fees->student_id = $user->id;
            $fees->school_id = Auth::user()->id;
            $fees->save();
        }
        $user = User::where('id',$user->id)->get();
        return response()->json([
            'status_code'=>200,
            'data'=>$user,
            'message'=>'Logout Successfully'
        ]);

    }

    public function studentSearch($class_id,$section_id,$group_id,$data){
        $group_id = ($group_id == 0) ? '' : $group_id;
        $datas = User::where("name","like","%".$data."%")
            ->where('class_id',$class_id)
            ->where('section_id',$section_id)
            ->where('group_id',$group_id)
            ->where('school_id',Auth::user()->id)
            ->get();

        if(count($datas) == 0){

            $datas = User::where("roll_number","like","%".$data."%")
                ->where('class_id',$class_id)
                ->where('section_id',$section_id)
                ->where('group_id',$group_id)
                ->where('school_id',Auth::user()->id)
                ->get();
        }

        return response()->json([
            'status_code'=>200,
            'data'=>$datas,
            'message'=>'Logout Successfully'
        ]);
    }


    public function presentArray(Request $request,$class_id,$section_id,$group_id){
        $group_id = ($group_id == 0) ? '' : $group_id;
        $dataMessageCount = StudentMonthlyFee::where('school_id',Auth::user()->id)->where('status','<',2)->groupby('student_id')->count();
        $messageAccount =  getMessageAccount();
        $data = User::where('class_id',$class_id)->where('section_id',$section_id)->where('group_id',$group_id)->where('school_id',Auth::user()->id)->get();
        $array_data = explode(",",$request['present_data']);
        foreach($data as $d){
            $id = array_search($d->id, $array_data);
            $attendance = new Attendance();
            if($id === false){
                $attendance->student_id = $d->id;
                $attendance->attendance = 0;

                if ($messageAccount['total'] >= $messageAccount['dataProcessBar']) {
                    if ($messageAccount['dataProcessBar'] >= $dataMessageCount) {
                        $token = "8371b733bd239059f940b857e94d4cf2";
                        $code = getUserName($d->id)->id;
                        $to = getUserName($d->id)->phone;
                        $message = 'Student Name:' . getUserName($d->id)->name . ' is now Present';

                        $url = "http://api.greenweb.com.bd/api.php?json";

                        $data = [
                            'to' => "$to",
                            'message' => "$message",
                            'token' => "$token"
                        ]; // Add parameters in key value

                        $ch = curl_init(); // Initialize cURL
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_ENCODING, '');
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $smsresult = curl_exec($ch);

                        $dataMessage = new Message();
                        $dataMessage->school_id = Auth::user()->id;
                        $dataMessage->message = 1;
                        $dataMessage->send_number = getUserName($d->id)->phone;
                        $dataMessage->save();
                    }
                }
            }else{
                $attendance->student_id = $d->id;
                $attendance->attendance = 1;
            }
            $attendance->school_id = Auth::user()->id;
            $attendance->class_id = $class_id;
            $attendance->section_id = $section_id;
            $attendance->group_id = $group_id;
            $attendance->save();
        }

        return response()->json([
            'status_code'=>200,
            // 'data'=>$token,
            'message'=>'Logout Successfully'
        ]);


    }

    public function attendanceCheck($class_id,$section_id,$group_id){
        $group_id = ($group_id == 0) ? NULL : $group_id;
        $dataAttendance = Attendance::where('class_id',$class_id)
            ->where('section_id',$section_id)
            ->where('group_id',$group_id)
            ->whereDate('created_at', Carbon::today())->with('user')
            ->get();
        $dataAttendanceCount = Attendance::where('class_id',$class_id)
            ->where('section_id',$section_id)
            ->where('group_id',$group_id)
            ->whereDate('created_at', Carbon::today())
            ->count();

        return response()->json([
            'status_code'=>200,
            'data'=>$dataAttendance,
            'dataCount'=>$dataAttendanceCount,
            'message'=>'Logout Successfully'
        ]);
    }

    public function attendanceCheckStatus(Request $request,$id){
        $dataMessageCount = StudentMonthlyFee::where('school_id',Auth::user()->id)->where('status','<',2)->groupby('student_id')->count();
        $messageAccount =  getMessageAccount();
        $data = Attendance::where('id',$id)->first();
        //  dd($request->all());
        if($request->attendance == '1') {
            $data->attendance = $request->attendance;
            $data->save();
            if ($messageAccount['total'] >= $messageAccount['dataProcessBar']) {
                if ($messageAccount['dataProcessBar'] >= $dataMessageCount) {
                    $token = "8371b733bd239059f940b857e94d4cf2";
                    $code = getUserName($data->student_id)->id;
                    $to = getUserName($data->student_id)->phone;
                    $message = 'Student Name:' . getUserName($data->student_id)->name . ' is now Present';

                    $url = "http://api.greenweb.com.bd/api.php?json";

                    $data = [
                        'to' => "$to",
                        'message' => "$message",
                        'token' => "$token"
                    ]; // Add parameters in key value

                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);

                    $dataMessage = new Message();
                    $dataMessage->school_id = Auth::user()->id;
                    $dataMessage->message = 1;
                    $dataMessage->send_number = $to;
                    $dataMessage->save();
                }
            }
        }
        elseif($request->attendance == '0') {
            $data->attendance = $request->attendance;
            $data->save();
            if ($messageAccount['total'] >= $messageAccount['dataProcessBar']) {
                if ($messageAccount['dataProcessBar'] >= $dataMessageCount) {
                    $token = "8371b733bd239059f940b857e94d4cf2";
                    $code = getUserName($data->student_id)->id;
                    $to = getUserName($data->student_id)->phone;
                    $message = 'Student Name:' . getUserName($data->student_id)->name . ' is Absent';

                    $url = "http://api.greenweb.com.bd/api.php?json";

                    $data = [
                        'to' => "$to",
                        'message' => "$message",
                        'token' => "$token"
                    ]; // Add parameters in key value

                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);

                    $dataMessage = new Message();
                    $dataMessage->school_id = Auth::user()->id;
                    $dataMessage->message = 1;
                    $dataMessage->send_number = $to;
                    $dataMessage->save();
                }
            }
        }


        return response()->json([
            'status_code'=>200,
            'data' => $messageAccount,
            'message'=>'post Successfully'
        ]);

    }

    public function messageStatusData(){
        $messageAccount =  getMessageAccount();
        $messagePackage = MessagePackage::orderby('id','desc')->get();
        $array_data =
            [
                'messageAccount' => $messageAccount,
                'messagePackage' => $messagePackage,
            ];
        return response()->json([
            'status_code'=>200,
            'data' => $array_data,
            'message'=>'post Successfully'
        ]);
    }

    public function messageUsageData(){
        $data = Message::where('school_id',Auth::user()->id)->get();
        return response()->json([
            'status_code'=>200,
            'data'=>$data,
            'message'=>'data Show Successfully'
        ]);
    }

    public function schoolMessagePostCheckout(Request $request){
        $data = new Checkout();
        $data->school_id = Auth::user()->id;
        $data->package_name = $request->package_name;
        $data->package_price = $request->package_price;
        $data->package_quantity = $request->package_quantity;
        $data->gateway_type = $request->gateway_type;
        $data->gateway_number = $request->gateway_number;
        $data->transaction_number = $request->transaction_number;
        $data->save();

        return response()->json([
            'status_code'=>200,
            'message'=>'data Post Successfully'
        ]);

    }

    public function schoolMessagePostCheckoutShow(Request $request){
        $data = Checkout::where('school_id',Auth::user()->id)->get();

        return response()->json([
            'status_code'=>200,
            'data'=>$data,
            'message'=>'data Post Successfully'
        ]);

    }

    public function resultShowAll($class_id,$section_id,$group_id,$subject_id,$term_id){
        $group_id = ($group_id == 0) ? NULL : $group_id;
        $data = User::where('class_id',$class_id)->where('section_id',$section_id)
            ->where('group_id',$group_id)
            ->where('school_id',Auth::user()->id)
            ->get();
        $data = $data->each(function ($item) use($subject_id,$term_id){
            $item->result_data = $item->result()->with('subject')->where('subject_id',$subject_id)->where('term_id',$term_id)->get();
        });

        return response()->json([
            'status_code'=>200,
            'data'=>$data,
            'message'=>'data Post Successfully'
        ]);
    }

    public function resultUpdatePost(Request $request,$id){
        $resultStudentSearch = Result::where('student_id',$id)->first();
        if(!isset($resultStudentSearch)){
            $result = new Result();
            $result->student_id = $id;
            $result->student_roll_number = $request->student_roll_number;
            $result->subject_id = $request->subject_id;
            $result->term_id = $request->term_id;
            $result->mcq = $request->mcq;
            $result->written = $request->written;
            $result->practical = $request->practical;
            $result->school_id = $request->school_id;
            $result->save();
        }else{
            $result = Result::where('id',$resultStudentSearch->id)->first();
            $result->student_id = $id;
            $result->student_roll_number = $request->student_roll_number;
            $result->subject_id = $request->subject_id;
            $result->term_id = $request->term_id;
            $result->mcq = $request->mcq;
            $result->written = $request->written;
            $result->practical = $request->practical;
            $result->school_id = $request->school_id;

            $result->save();
        }

        return response()->json([
            'status_code'=>200,
            'message'=>'data Post Successfully'
        ]);


        return back();

    }

    // fees ......


    public function createClassFeesPost(Request $request){
        $request->validate([
            'class_id' => 'required',
        ]);
        $fees = new StudentFee();

        $fees->fees_name = $request->fees_name;
        $fees->fees_amount = $request->fees_amount;
        $fees->class_id = $request->class_id;
        $fees->month_name = $request->month_name;
        $fees->active = $request->active;
        $fees->school_id = Auth::user()->id;

        $fees->save();

        $data = StudentFee::where('id',$fees->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }


        public function showClassExtra(){
            $data = InstituteClass::orderby('id','desc')->where('school_id',Auth::user()->id)->get()->toArray();
            $dataArray = array(
                '-1' => array(
                    'id'=> 0,
                    'class_name'=> 'All student',
                    "class_fees"=> 0,
                    "active"=> "1",
                    "school_id"=> Auth::user()->id,
                    "created_at"=> "2022-02-20T00:09:21.000000Z",
                    "updated_at"=> "2022-02-20T00:09:21.000000Z"
                ),
            );
            return response()->json([
                'success' => true,
                'status'  => 201,
                'data'  => array_merge($dataArray,$data),
            ], 201);

            // dd(array_merge($dataArray,$data));
        }



    public function showClassFees(){
        $data = StudentFee::orderby('id','desc')->where('school_id',Auth::user()->id)->with('class_name')->get();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function deleteClassFees($id){
        $data = StudentFee::where('id',$id)->delete();
        return response()->json([
            'success' => true,
            'status'  => 201,
        ], 201);

    }

    public function editClassFees($id){
        $data = StudentFee::where('id',$id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function updateClassFees(Request $request,$id){
        $fees = StudentFee::find($id);
        $fees->fees_name = $request->fees_name;
        $fees->fees_amount = $request->fees_amount;
        $fees->class_id = $request->class_id;
        $fees->month_name = $request->month_name;
        $fees->active = $request->active;
        $fees->school_id = Auth::user()->id;
        $fees->save();

        $data = Term::where('id',$fees->id)->where('school_id',Auth::user()->id)->first();
        return response()->json([
            'success' => true,
            'status'  => 201,
            'data'  => $data,
        ], 201);

    }

    public function showStaffPosition(){
        $data = StaffType::where('school_id',Auth::user()->id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'post Successfully',
            'data'=>$data
        ]);
    }

    public function createStaffPosition(Request $request){
        $data = new StaffType();
        $data->position_name = $request->position_name;
        $data->school_id = Auth::user()->id;
        $data->save();
        return response()->json([
            'status_code'=>200,
            // 'data'=>$token,
            'message'=>'post Successfully'
        ]);
    }

    public function showStaff(){
        $data = Employee::where('school_id',Auth::user()->id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'post Successfully',
            'data'=>$data
        ]);
    }

    public function showStaffPostCreate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_name' => 'required',
            'phone_number' => 'required|unique:employees',
            'employee_id' => 'required| unique:employees',
            'position_name' => 'required',
            'address' => 'required',
            'salary' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400, 'message' => 'Bad Request',
                'error' => $validator->errors(),], 400);
        } else {

            $data = new Employee();
            $data->employee_name = $request->employee_name;
            $data->phone_number = $request->phone_number;
            $data->employee_id = $request->employee_id;
            $data->position = $request->position_name;
            $data->address = $request->address;
            $data->salary = $request->salary;
            $data->school_id = Auth::user()->id;

            $data->save();

            $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            foreach ($month as $iteration => $datas) {
                $monthFunction = date('m');
                if ($iteration + 2 > $monthFunction) {
                    $fees = new EmployeeSalary();
                    $fees->month_name = $datas;
                    $fees->employee_id = $data->id;
                    $fees->school_id = Auth::user()->id;
                    $fees->save();
                }
            }

            return response()->json([
                'status_code'=>200,
                'message'=>'post Successfully'
            ]);
        }

    }

    public function showStaffMonthData($id,$month_name){
        $data = EmployeeSalary::where('employee_id',$id)->where('month_name',$month_name)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }

    public function postStaffMonthData(Request $request,$id,$month_name){
        $data = EmployeeSalary::where('employee_id',$id)->where('month_name',$month_name)->first();

        $data->amount = $request->amount;
        $data->save();
        $data = EmployeeSalary::where('id',$data->id)->first();
        return response()->json([
            'status_code'=>200,
            'message'=>'post Successfully',
            'data'=>$data
        ]);
    }

    public function allTeacherSalary($id){
        $data = TeacherSalary::where('teacher_id',$id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }

    public function allStaffSalary($id){
        $data = EmployeeSalary::where('employee_id',$id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }

    public function showNoticeData(){
        $data = Notice::orderby('id','desc')->where('school_id',Auth::user()->id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }

    public function postNoticeData(Request $request){
        $data = new Notice();
        $data->topic = $request->topic;
        $data->description = $request->description;
        $data->class_id = $request->class_id;
        $data->school_id = Auth::user()->id;
        $data->save();

        $data = Notice::where('id',$data->id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }

    public function deleteNoticeData($id){
        $data = Notice::where('id',$id)->delete();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
        ]);
    }

    public function showNoticeDataId($id){
        $data = Notice::orderby('id','desc')->where('school_id',Auth::user()->id)->where('class_id',$id)->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }

    public function showTeacherClassId($id){
        $data = AssignTeacher::orderby('id','desc')->where('school_id',Auth::user()->id)->where('class_id',$id)->with('teacher_name')->get();
        return response()->json([
            'status_code'=>200,
            'message'=>'Data Show Successfully',
            'data'=>$data
        ]);
    }



    public function logout(){
        $user = School::where('id',Auth::user()->id)->first();
        $user->tokens()->delete();
        return response()->json([
            'status_code'=>200,
            // 'data'=>$token,
            'message'=>'post Successfully'
        ]);
    }


}
