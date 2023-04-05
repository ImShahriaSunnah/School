<?php

namespace App\Http\Controllers\Exam;

use App\Models\ExamRoutine;
use App\Http\Controllers\Controller;
use App\Models\InstituteClass;
use App\Models\School;
use App\Models\Subject;
use App\Models\Term;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    /**
     * Fetch Routine
     * 
     * @return \Illuminate\Contracts\View\ 
     */
    public function examRoutine()
    {
        $data['classes'] = InstituteClass::where('school_id', Auth::user()->id)->get();
        $data['terms']   = Term::where('school_id', Auth::user()->id)->orderBy('id', 'asc')->get();

        return view('frontend.school.exam.index', $data);
    }

    /**
     * Fetch Subject
     * 
     * @param int $id
     * @return respone 
     */
    public function getSubject($id)
    {
        $subjects = Subject::where('school_id', Auth::user()->id)->where('class_id', $id)->get();
        
        return response()->json($subjects);
    }

    /**
     * Fetch Routine
     * 
     * @param int $id
     * @param int $term_id
     * @return respone 
     */
    public function getRoutine($id, $term_id)
    {
        $routines = ExamRoutine::with('class', 'subject', 'term')->where('school_id', Auth::user()->id)->where('term_id', $term_id)->where('class_id', $id)->orderBy('date', 'desc')->get();
        
        return response()->json($routines);
    }

    /**
     * Save Routine
     * 
     * @param Request $request
     * @return respone 
     */
    public function storeExamRoutine(Request $request)
    {   
        $validate = Validator::make($request->all(), [
            "class_id"        => "required",
            "subject_id"      => "required",
            "date"            => "required",
            "start_time"      => "required",
            "end_time"        => "required",
            "exam_term"       => "required"
        ], [
            "class_id.required" => "The class field is required.",
            "subject_id.required" => "The subject field is required.",
            "date.required" => "The date field is required.",
            "start_time.required" => "The start time field is required.",
            "end_time.required" => "The end time field is required.",
            "exam_term.required" => "The exam term field is required.",
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'fail',
                'error'  => $validate->errors()->toArray()
            ]);
        }

        $rotuine = ExamRoutine::where('term_id', $request->exam_term)->where('class_id', $request->class_id)->where('subject_id', $request->subject_id);
        if ($rotuine->exists()) {
            return response()->json([
                'status' => 'fail',
                'error'  => ['subject_id' => ['This Subject is Already Exist']]
            ]);
        };

        ExamRoutine::insert([
            "school_id"         => Auth::user()->id,
            "term_id"           => $request->exam_term,
            "class_id"          => $request->class_id,
            "subject_id"        => $request->subject_id,
            "date"              => \Carbon\Carbon::parse($request->date)->format('d/m/Y'),
            "start_time"        =>  \Carbon\Carbon::parse($request->start_time)->format('h:ia'),
            "end_time"          =>  \Carbon\Carbon::parse($request->end_time)->format('h:ia'),
            "day"               => \Carbon\Carbon::parse($request->date)->format('l'),
        ]);

        return response()->json(['Success' => 'Exam Routine Create Successfully']);
    }

    /**
     * Delete Exam Routine
     * 
     * @param int $id
     * @return respone 
     */
    public function deleteExamRoutine($id)
    {
        ExamRoutine::findOrFail($id)->delete();
        
        return back();
    }

    /**
     * Generate Pdf
     * 
     * @param int $class_id
     * @param int $term_id
     * @return respone pdf download 
     */
    public function generatePdf($class_id, $term_id)
    {
        $data['exam_routines'] = ExamRoutine::with('class', 'subject')->where('school_id', Auth::user()->id)->where('term_id', $term_id)->where('class_id', $class_id)->orderBy('date', 'asc')->get();
        $data['school']        = School::where('id', Auth::user()->id)->first();
        $data['term']          = Term::findOrFail($term_id);
        $data['class']         = InstituteClass::findOrFail($class_id);
        $pdf = PDF::loadView('frontend.school.exam.exam_routine', $data);
        $pdf->render();
        // return $pdf->download('Exam_Routine.pdf');
        return $pdf->stream('Exam_Routine.pdf', ['Attachment' => false]);
    }
}
