<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\School;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'phone' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status_code'=>400,'message'=>'Bad Request',
                'error'   => $validator->errors(),],400);
        }
        $credentials = request(['phone','password']);

        if(!Auth::guard('teachers')->attempt($credentials)){
            return response()->json(['status_code'=>500,'message'=>'Unauthrazied']);
        }
        $user = Teacher::where('phone',$request->phone)->first();
        $tokenResult = $user->createToken('authToken');
        return response()->json([
            'status_code'=>200,
            'data'=>$user,
            'token'=>$tokenResult
        ]);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'school_id' => 'required',
            'email' => 'required||unique:teachers',
            'phone' => 'required||unique:teachers',
            'password' => 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status_code'=>400,'message'=>'Bad Request',
                'error'   => $validator->errors(),],400);
        }
        $user = new Teacher();

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->school_id = $request->school_id;
        $user->password = Hash::make($request->password);

        $user->save();
        $user = Teacher::where('id',$user->id)->first();
        $token   = "8371b733bd239059f940b857e94d4cf2";
        $code    = rand(1000, 9999);
        $to      = $user['phone'];
        $message = "Your OTP is " . $code;

        $otp = new Otp();

        $otp->otp = $code;
        $otp->school_id = $request->school_id;
        $otp->phone = $request->phone;
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
            $user = Teacher::where('phone',$otp->phone)->first();
            $user->active = 2;
            $user->save();
            $otp->delete();
            $user = Teacher::where('id',$user->id)->first();
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


}
