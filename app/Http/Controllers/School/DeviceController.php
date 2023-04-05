<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        return view('frontend.school.settings.form');
    }


    /**
     * 
     */
    public function update(Request $request)
    {
        try{
            $school = School::find(Auth::id());
            $school->zk_ip_address = $request->zk_ip_address;
            $school->zk_ip_port    = $request->zk_ip_port;
            $school->save();

            Alert::success("Record updated Successfully", 'Server Error');
            return back();
        }
        catch(Exception $e)
        {
            Alert::error($e->getMessage(), 'Server Error');
            return back();
        }

    }
}
