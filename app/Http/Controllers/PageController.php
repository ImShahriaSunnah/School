<?php

namespace App\Http\Controllers;

use App\Mail\SupportAlertMail;
use App\Models\FeatureDetailsPage;
use App\Models\Otp;
use App\Models\Price;
use App\Models\User;
use Carbon\Carbon;
use App\Models\School;
use App\Models\Support;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function changeLanguage($local = 'bn')
    {
        App::setLocale($local);
        
        if(Auth::guard('schools')->check())
        {
            // return "hello";
            $school=School::find(Auth::guard('schools')->id());
            $school->language = $local;
            $school->save();

            //  Store langcode in session
            session(['locale'   =>  Auth::guard('schools')->user()->language ?? "bn"]);
        }
        else
        {
            //  Store langcode in session
            session(['locale'   =>  $local]);
        }
        
        return back();
    }
    
    public function notificationData($id){
        $notificationUserId = User::where('id',$id)->first();
        return view('frontend.user.template.notification',compact('notificationUserId'));
    }
    public function home()
    {
        return view('frontend.pages.index');
    }

    public function contactPage()
    {
        return view('frontend.pages.contact');
    }

    public function contactPage2()
    {
        return Redirect::to('https://sportclubff.com/');
    }

    public function featurePage()
    {
        return view('frontend.pages.feature');
    }

    public function featureU()
    {
        return view('frontend.pages.service.featureU');
    }
    public function featureS()
    {
        return view('frontend.pages.service.featureS');
    }
    public function featureA()
    {
        return view('frontend.pages.service.featureA');
    }
    public function featureP()
    {
        return view('frontend.pages.service.featureP');
    }
    public function featureO()
    {
        return view('frontend.pages.service.featureO');
    }
    public function featureE()
    {
        return view('frontend.pages.service.featureE');
    }


    public function pricing()
    {
        $prices = Price::get();
        $seo_array = [
            'seoTitle' => 'Price',
            'seoDescription' => 'Price',
            'seoKeyword' => 'Price',
        ];

        return view('frontend.pages.pricing', compact('prices', 'seo_array'));
    }

    public function getStarted(Request $request)
    {
        $email=$request-> email;
        $data = School::where('email', $email)->first();
        if($data)
        {
            return view('auth.login', ['url' => 'schools', 'email'=>$email]);
        }
        else
        {
            return view('frontend.pages.signup',compact('email'));
        }
    }

    public function getSignup(Request $request){
        $validator = Validator::make($request->all(),[
            'school_name' => 'required',
            'school_name_bn' => 'required',

            'phone_number' => 'required|min:11||unique:schools',
            // 'address' => 'required',
            'password' => 'required|string|min:6|',
            'email' => 'required|unique:schools',
        ]);
        //  dd($validator->fails());
        
        if($validator->fails())
        {
            $school = School::where('phone_number',$request->phone_number)->where('email',$request->email)->first();
            if(!is_null($school)){
              //  dd($school);
                if($school->is_editor == 0){
                    $to = $request->phone_number;
                    $to_email = $request->email;
                    $to_password = $request->password;
                    return view('frontend.pages.otp',compact('to','to_email','to_password'));
                }elseif ($school->is_editor == 1){
                    toast('We need More Infomation','success');
                    return redirect()->route('school.login');
                }else{
                    toast('Your Account is already have','success');
                    return redirect()->route('school.login');
                }
            }else{
                $errors =$validator->errors();
                return view('frontend.pages.signup',compact('errors'));
            }


        }

        $school = new School();

        $school->email = $request->email;
        $school->phone_number = $request->phone_number;
        $school->address = $request->address;
        $school->password = Hash::make($request->password);
        $school->school_name = $request->school_name;
        $school->school_name_bn = $request->school_name_bn;

        $school->unique_id = uniqid();
        $school->save();

        $token   = env("GREENWEB_TOKEN");
        $code    = rand(1000, 9999);
        $to      = $school['phone_number'];
        $to_email      = $school['email'];
        $message = $code . " is your verification code on shikkha.one";

        $otp = new Otp();

        $otp->school_id = $school->id;
        $otp->otp = $code;
        $otp->phone = $to;
        $otp->email = $to_email;
        $otp->save();

        Controller::GreenWebSMS($to, $message);
        
        $to_password = $request->password;
        toast('Otp will be send , Please Wait','question');
        return view('frontend.pages.otp',compact('to','to_email','to_password'));

    }



    /**--------------------     Resend OTP 
     * =======================================================*/
    public function otpResent(Request $request)
    {
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;

        $row = Otp::where(['phone' => $phone, 'email' => $email]);
        /** Generate 4 digit code */
        $code    = rand(1000, 9999);

        $data = [
            'to'    => $phone,
            'to_email'  => $email,
            'to_password'   =>  $password,
        ];


        if($row->exists())
        {
            $row->update([
                'otp'   => $code,
            ]);

            /** Send otp */
            if(sendOtp($phone, $code))
            {
                toast('Otp will be send , Please Wait','question');
                return view('frontend.pages.otp',$data);
            }
        }
        
        toast('Somthing went wrong , Please Wait','question');
        return view('frontend.pages.otp',$data);
        
    }


    public function otpPost(Request $request)
    {
        $request->otp = $request->otp1.$request->otp2.$request->otp3.$request->otp4 ;
        $school = School::where('phone_number',$request->phone_number)->where('email',$request->email)->first();
        $otp = Otp::where('phone',$request->phone_number)->where('email',$request->email)->first();

        if(!$otp->exists())
        {
            toast('Otp not exists','question');
            return redirect()->route('school.login');
        }

        if($otp->otp == $request->otp){
            $school->is_editor = 1;
            $school->save();
            $otp->delete();
            $school = School::where('phone_number',$request->phone_number)->where('email',$request->email)->first();

            if (Auth::guard('schools')->attempt(['email' => $request->email,'password' => $request->password,'is_editor' => 1], $request->get('remember'))) {
                return redirect()->intended('/acquisition');
            }
            else{
                return back();
            }
        }else{
            $to_password = $request->password;
            $to_email = $request->email;
            $to = $request->phone_number;
            toast('Wrong Otp','question');
            return view('frontend.pages.otp',compact('to','to_email','to_password'));
        }
    }


    /**
     * send email for contact
     */
    public function contactSuppport(Request $request)
    {
        $request->validate([
            'name'  =>  ['required', 'string'],
            'email'=>['required', 'email', 'string'],
            'subject'=>['required', 'string'],
            'message'=>['required', 'string'],
        ]);

        $data = $request->only('name', 'email', 'subject', 'message');
        

        try{
            Support::create($data);

            $data['domain'] = url('');
            // Mail::to("support@codecell.com.bd")->send(new SupportAlertMail($data));
        }
        catch(Exception $e)
        {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', "We received your message successfully.");
    }

    
}