<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Rats\Zkteco\Lib\ZKTeco;

class ZktecoController extends Controller
{
    public function zkteco(){

        // ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        // set_time_limit(300);

        $zk = new ZKTeco('192.168.0.117', 4370);
        $zk->connect(); 
        //$zk->deviceName('K12/D'); 
        //$zk->enableDevice(); 
        // $zk->setUser('15', '1567', 'Rakibul Islam', 'abcdabcd');
        // $zk->disconnect();

        return $zk->getUser();
         //return $abc = $zk->serialNumber();
        $zk->disconnect();

        // return $abc;
    }


    public function testOnly()
    {
        // return $dateStudent = \App\Models\Attendance::where('student_id',83)
        //                     ->where('class_id',8)
        //                     ->where('section_id',6)
        //                     ->where('group_id',null)
        //                     ->whereDate('created_at','2023-03-29')
        //                     ->first();


        // return \App\Models\Attendance::whereDate('created_at','2023-03-29')->get();
    }
}
