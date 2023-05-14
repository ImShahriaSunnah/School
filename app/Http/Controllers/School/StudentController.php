<?php

namespace App\Http\Controllers\School;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InstituteClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\StudentDocumentUpload;
use Illuminate\Support\Facades\Stroage;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function documentpost(Request $request ){
        $request->validate([
            'title'  => 'required',
            'uploadfile'=> 'required|mimes:pdf',
        ]);
        $fileName = null;
            if ($request->hasFile('uploadfile')) {
                $fileName = time() . '.' . $request->file('uploadfile')->getclientOriginalExtension();
                $request->file('uploadfile')->move(public_path('/uploads/StudentDocument'), $fileName);
            }
        StudentDocumentUpload::create([
            'title'=>$request->title,
            'student_id'=>$request->student_id,
            'uploadfile'=>$fileName,
        ]);
        Alert::success('Successfully Document Uploaded', 'Success Message');
        return back();
    }
    public function document_delete($id){
        $documents=StudentDocumentUpload::find($id);
        $fileName=$documents->uploadfile;
        $removefile=public_path().'/uploads/StudentDocument/'.$fileName;
           File::delete($removefile);
        $documents->delete();
        Alert::success('Successfully Document deleted', 'Success Message');
        return back();
    }
    public function document_download(Request $request ,$uploadfile){
        return response()->download(public_path('/uploads/StudentDocument/'.$uploadfile));
    }
    public function document_view($id){
        $document = StudentDocumentUpload::find($id);
        return view('frontend.school.student.student_document_view',compact('document'));
    }
}