<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\InstituteClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //find
    public function find(Request $request)
    {
        $request->validate([
            'class_id'  =>  ['required'],
            'section_id'=>  ['required'],
        ]);


        $data['class'] = InstituteClass::where('school_id', Auth::user()->id)->get();
        $data['students'] = User::where(['school_id'=>Auth::id(), 'class_id'=>$request->class_id, 'section_id' => $request->section_id])->get();

        return view('frontend.school.student.finance.createShow', compact('data')); 
    }
}
