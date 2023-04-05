<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Result;
use App\Models\School;
use App\Models\Term;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoticeViewController extends Controller
{
    /**
     * Show All Notice
     * 
     * @param $id
     * @return \Illuminate\Contracts\View
     */
    public function index()
    {   
        $notices = Notice::where('school_id', Auth::user()->id)->latest()->take(20)->get();
        $noticeFirst = Notice::where('school_id', auth()->user()->id)->latest()->first();
        $school = School::where('id', auth()->user()->id)->first();
        $results = Result::where('school_id', auth()->user()->id)->get();
        //Number
        $bn_numbers = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
        $en_numbers = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
        //Months
        $en_short_months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $bn_months = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
        //Days
        $en_short_days = ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
        $bn_short_days = ['শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার'];
        $todayDate = Carbon::now()->format('d/m/Y');
        $day = Carbon::now()->format('D');
        // Convert Numbers
        $todayDate = str_replace($en_numbers, $bn_numbers, $todayDate);
        // Convert Months
        $todayDate = str_replace($en_short_months, $bn_months, $todayDate);
        // Convert Days
        $day = str_replace($en_short_days, $bn_short_days, $day);
        return view('notice.index', compact('notices', 'school', 'todayDate', 'noticeFirst', 'day', 'results'));
    }

    /**
     * Login Student
     * 
     * @param Request
     * @param $request
     * @return \Illuminate\Contracts\View
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentLoginController(Request $request)
    {
        $student = User::where('unique_id', $request->studentId);

        $request->validate([
            "studentId" => 'required',
            "password"  => 'required|min:8'
        ]);

        if($student->exists())
        {
            $student = $student->first();

            if ($request->studentId == $student->unique_id && \Hash::check($request->password, $student->password)) {
                $terms = Term::where('school_id', $student->school_id)->get();
                return view('frontend.user.result.show_term', compact('student', 'terms'));

            } else {
                toast("Student ID or Password Wrong", "error");
                return redirect()->back();
            }
        }

        toast("Student ID or Password Wrong", "error");
        return redirect()->back();
    }

    /**
     * Show Term Wise Result
     * 
     * @param Request
     * @param $request
     * @return \Illuminate\Contracts\View\
     */
    public function termWiseResult(Request $request)
    {
        $student = User::where('unique_id', $request->studentId)->first();
        $results = Result::where('student_id', $student->id)->where('term_id', $request->term_id)->get();
          
        return view('frontend.user.result.index', compact('student', 'results'));
    }

    /**
     * Otp view page
     * 
     * @return \Illuminate\Contracts\View\
    */
    public function otpView()
    {
        return view('notice.otp');
    }
}
