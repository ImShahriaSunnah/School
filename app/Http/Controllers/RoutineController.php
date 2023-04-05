<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoutineController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = DB::table('institute_classes')->where('school_id',$this->school->id)->get();
        $sections = DB::table('sections')->where('school_id',$this->school->id)->get();
        

        //return $abc =  $this->school->id;

        return view('frontend.school.routine.index')->with(compact('classes', 'sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @param   $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // return $request;

        try{
            for($i=0; $i < count($request->period); $i++)
            {
                // if(!is_null($request['subject'][$i]) && !is_null($request['teacher'][$i]) && !is_null($request['period'][$i])):
                    Routine::updateOrCreate([
                        'school_id'  =>  $this->school->id,
                        'class_id'  =>  $request['class'],
                        'section_id'  =>  $request['section'],
                        'subject_id'  =>  $request['subject'][$i],
                        'teacher_id'  =>  $request['teacher'][$i],
                        'period_id'   =>  $request['period'][$i],
                        'shift'   =>  $request['shift'],
                        'day'  =>  $request['day'],
                    ], ['note'  =>  $request['note'][$i]]);
                // endif;
            }

            toast('Routine Create Successfully', 'success');
        }
        catch(Exception $e)
        {
            toast($e->getMessage(), 'error');
        }
        
        return redirect(url("/school/routine/show?shift={$request['shift']}&class={$request['class']}&section={$request['section']}"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $rows = Routine::where([
            'school_id' => $this->school->id,
            'class_id'  => $request->class,
            'section_id'   => $request->section,
            'shift'   => $request->shift,
        ])->get()->groupBy('day');

        $data = $request->only('class', 'section', 'shift');
        $data['subjects'] = DB::table('subjects')->where('class_id', $data['class'])->get();
        $data['teachers'] = DB::table('teachers')->where('school_id', $this->school->id)->get();
        $data['periods'] = DB::table('class_periods')->where('school_id', $this->school->id)->where('shift', $request->shift)->get();

        if($data['periods']->count() > 0)
        {
            return view('frontend.school.routine.table')->with(compact('rows', 'data'));
        }
        else
        {
            Alert::info("Message", "Please create class period first");
            return redirect(route('period.create', $request->shift));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function editRoutine($classId, $sectionId, $periodId, $shift, $day)
    {
        $rows = Routine::where([
            'school_id' => $this->school->id,
            'class_id'  => $classId,
            'section_id'   => $sectionId,
            'shift'   => $shift,
        ])->get()->groupBy('day');

        

        $data = $request->only('class', 'section', 'shift');
        $data['subjects'] = DB::table('subjects')->where('class_id', $data['class'])->get();
        $data['teachers'] = DB::table('teachers')->where('school_id', $this->school->id)->get();
        $data['periods'] = DB::table('class_periods')->where('school_id', $this->school->id)->where('shift', $request->shift)->get();

        if($data['periods']->count() > 0)
        {
            return view('frontend.school.routine.table')->with(compact('rows', 'data'));
        }
        else
        {
            Alert::info("Message", "Please create class period first");
            return redirect(route('period.create', $request->shift));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
