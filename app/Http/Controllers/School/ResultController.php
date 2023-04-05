<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\InstituteClass;
use App\Models\Result;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class ResultController extends Controller
{
    /**
     * Show View Page Select Class and Term
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function classWiseResult()
    {
        $class = InstituteClass::where('school_id', Auth::user()->id)->get();
        $terms = Term::where('school_id', Auth::user()->id)->orderBy('id','desc')->get();
        $users = User::where('school_id', Auth::user()->id)->get();
        return view('frontend.school.result.class_wise_result', compact('class', 'terms'));
    }

    /**
     * Class Wise User
     * 
     * @param $id
     */
    public function classWiseUser(Request $request)
    {
        $users = User::where('class_id', $request->class_id)->get();
        return response()->json($users);
    }

    /**
     * Show Class Wise, Student Wise, Final Year Result
     * 
     * @param Request 
     * @param $request
     * @return 
     */
    public function showClassWiseResult(Request $request)
    {   
        if ($request->resultType == "studentWise") {

            $request->validate(
                [
                    'student_wise_class_id' => 'required',
                    'student_wise_term_id' => 'required',
                    'student_wise_student_id' => 'required',
                ],
                [
                    'student_wise_class_id.required' => 'Class Section Required',
                    'student_wise_student_id.required' => 'Student Section Required',
                    'student_wise_term_id.required' => 'Term Section Required',
                ]
            );
                  
            $term = Term::where('id', $request->student_wise_term_id)->first();
            $studentResults = Result::where('institute_class_id', $request->student_wise_class_id)->where('student_id', $request->student_wise_student_id)->where('term_id', $request->student_wise_term_id)->get();
            
            if($studentResults->count() > 0)
            {
                return view('frontend.school.result.show_student_result', compact('studentResults', 'term'));
            }
            else
            {
                Alert::info("Sorry", "Result not published yet");
                return back();
            }

        }
        
        elseif ($request->resultType == 'yearlyFinalResult') {
            
            $request->validate(
                [
                    'final_wise_class_id' => 'required',
                    'final_student_wise_student_id' => 'required',
                ],
                [
                    'final_wise_class_id.required' => 'Class Section Required',
                    'final_student_wise_student_id.required' => 'Student Section Required',
                ]
                );

            $studentResults = Result::where('institute_class_id', $request->final_wise_class_id)
                ->where('student_id', $request->final_student_wise_student_id)
                ->orderByDesc('term_id')
                ->get();

            $subjects = [];
            foreach ($studentResults as $key => $result) {
                $subjects[$result->subject->subject_name][$result->term->term_name] = [
                    'total' => $result->total,
                    'written' => $result->written,
                    'mcq' => $result->mcq,
                    'other' => $result->attendence + $result->assignment + $result->class_test + $result->presentation + $result->quiz + $result->practical + $result->other,
                ];
            }
            $rank = Result::select('student_id')->selectRaw("SUM(total) as finalTotal")
                            ->where('institute_class_id', $request->final_wise_class_id)
                            ->orderByDesc('finalTotal')
                            ->groupBy('student_id')
                            ->get();
            $findRank       = $rank->where('student_id', $request->final_student_wise_student_id);
            $studentRank    = $findRank->keys()->first() + 1; 
            $userSection = User::where('id', $request->final_student_wise_student_id)->first();
            $attendance = Attendance::where('section_id', $userSection->section_id)->where('student_id', $request->final_student_wise_student_id)->get();
            return view('frontend.school.result.show_final_result', compact('subjects', 'studentResults', 'studentRank', 'attendance')); 

        }

        else {    
            $request->validate(
                [
                    'class_wise_class_id' => 'required',
                    'class_wise_term_id' => 'required',
                ],
                [
                    'class_wise_class_id.required' => 'Class Section Required',
                    'class_wise_term_id.required' => 'Term Section Required',
                ]
            );
            // try {

            //     } 
            // catch(Exception $e)
            // {
            //     return $e->getMessage();
            // }
                $class = $request->class_wise_class_id;
                $term = $request->class_wise_term_id;
                $classResults = Result::where('school_id',Auth::user()->id)
                ->where('institute_class_id', $request->class_wise_class_id)
                ->where('term_id', $request->class_wise_term_id)
                ->get()->groupBy('student_id');
                
                $subjectCount = Result::where('school_id',Auth::user()->id)
                ->where('institute_class_id', $request->class_wise_class_id)
                ->where('term_id', $request->class_wise_term_id)
                ->get()
                ->groupBy('student_id');

                $term_mark= Term::where('id',$term)->first();
                
            
                $arrOfResult =[];
                foreach ($classResults as $result => $data){
                    $total = 0;
                    $totalGpa = 0.000;
                    $totalSubject = 0;
                    $resultStatus = 1;
                    foreach($data as $results){
                        $total += $results->total;
                        
                        $totalGpa += $results->gpa;
                        $totalMark = $results->total * 100 / $term_mark->total_mark; 
                        if( $totalMark < 33 ) $resultStatus = 0; 
                        $totalSubject++;
                        
                    }
                    $totalGpa = number_format($totalGpa/$totalSubject, 2);
                    $arrOfResult [$total]= [
                        'total' => $total,
                        'totalGpa' => $totalGpa,
                        'totalMark' => $totalMark,
                        'resultStatus' => $resultStatus,
                        'student_id' => $data[0]->student_id,
                    ];                    
                }
                $arraySize = sizeof($arrOfResult);

                $sortedArrayOfResult = collect($arrOfResult)->sortByDesc('total');

                // return $sortedArrayOfResult[203]["student_id"];
                
                return view('frontend.school.result.classWiseResult', compact('sortedArrayOfResult','term','class', 'arraySize')); 
            
        }
    }
        
}
