<?php

namespace App\Http\Controllers;

use App\Models\InstituteClass;
use App\Models\School;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{

    public $school;

    public function __construct()
    {   
        $this->middleware(function($request, $next){
            $this->school = Auth::user(); //auth user details

            return $next($request);
        });
    }



    /**
     * show index
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {   
        //$institute_class= DB::table("institute_classes")->where('school_id'==Auth::user())->get();
        //return $institute_class;
        if(!empty($institute_classes)){
                
            $data = [];
            $data['sections'] = DB::table("common_classes")->whereNotNull('section')->get();
            $data['classes'] = [];
            $classes = DB::table("common_classes")->whereNull('section')->get();
                
            foreach($classes as $class)
            {
                $data['classes'][] = [
                    'id' =>  $class->id,
                    'title' =>  $class->title,
                    'subjects'  =>  DB::table("common_subjects")->where('class', $class->id)->get(['id', 'code', 'name'])
                ];
                
            //return $data;
            }
            return view('frontend.school.settings')->with(compact('data'));
        }

        else{
            
            $data = [];
            $data['sections'] = DB::table("common_classes")->whereNotNull('section')->get();
            $data['classes'] = [];
            $classes = DB::table("common_classes")->whereNull('section')->get();

            foreach($classes as $class)
            {
                $data['classes'][] = [
                    'id' =>  $class->id,
                    'title' =>  $class->title,
                    'subjects'  =>  DB::table("common_subjects")->where('class', $class->id)->get(['id', 'code', 'name'])
                ];
                
            }
            //return $data;
            return view('frontend.school.settings')->with(compact('data'));
        }

    }



    /**
     * Store Data
     * 
     * @param
     */
    public function store(Request $request)
    {   
        $request->validate(
            [
                'class' => 'required|array',
            ],
            [
                'class.required'    =>  'Please select at least one item'
            ]
        );

        try{
            foreach($request->class as $classId)
            {
                $class = DB::table('common_classes')->where('id', $classId)->first();

                $newClass = InstituteClass::updateOrCreate([
                                    'class_name'    =>  $class->title,
                                    'school_id'     =>  $this->school->id,
                                ],
                                [
                                    'class_fees'    =>  0,
                                    'active'        =>  1
                                ]
                            );

                $subjects = DB::table('common_subjects')
                            ->where('class', $classId)
                            ->whereIn('id', $request->subjects)
                            ->get();

                foreach($subjects as $item)
                {
                    Subject::updateOrCreate([
                        'class_id'  =>  $newClass->id,
                        'subject_name'  =>  $item->name,
                        'school_id'     =>  $this->school->id,
                        'active'        =>  1
                    ], []);
                }
            }

            return redirect(route('school.dashboard'));
        }
        catch(Exception $e)
        {
            Alert::error('Server Problem', $e->getMessage());
            return back();
        }


    }

    /**
     * show school profile 
    */
    public function school_profile(){
        $school=School::find(Auth::id());
        return view('frontend.school.schoolProfile.schoolProfile',compact('school'));
    }


    /**
     * update school password
     */
    public function school_Password(Request $request ,$id){
        $school=School::find(Auth::id());
        $request->validate([
           'password'=>'required|min:8'
        ]);

        $school->update([
            'password' =>bcrypt($request->password)
        ]);
        Alert::success('Student password is Changed', 'Success Message');
        return back();
    }


    /**
     * edit school profile
     * 
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function school_profileEdit($id){
        $school=School::find(Auth::id());
        return view('frontend.school.schoolProfile.EditProfile', compact('school'));
    }


    /** 
     * update school profile
     */
    public function school_profile_Update(Request $request, $id)
    {
            $school=School::find($id);

            $request->validate([
                'school_logo' => 'image|mimes:jpeg,png,jpg'
            ]);


            if($imageName = null && $request->hasFile('school_logo')){

                $imageName = $school->school_logo;
                $removefile=public_path().'/uplaods/SchoolLogo/'.$imageName;
                File::delete($removefile);

                $imageName=date('Ymdhmsis').'.'.$request->file('school_logo')->getClientOriginalExtension();
                $request->file('school_logo')->storeAs('/uploads/SchoolLogo',$imageName);
                
                $school->update([
                    'school_name'=>$request->school_name,
                    'school_name_bn'    => $request->school_name_bn,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'phone_number'=>$request->phone_number,
                    'state'=>$request->state,
                    'city'=>$request->city,
                    'postcode'=>$request->postcode,
                    'school_logo'=>$imageName,
                ]);
            }
            else
            {

                $school->update([
                    'school_name'=>$request->school_name,
                    'school_name_bn'    => $request->school_name_bn,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'phone_number'=>$request->phone_number,
                    'state'=>$request->state,
                    'city'=>$request->city,
                    'postcode'=>$request->postcode,
                ]);
            }
        return redirect()->route('school.profile');
    }
}
