<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Rats\Zkteco\Lib\ZKTeco;

class ZktecoController extends Controller
{
    public function zkteco()
    {

        // ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        // set_time_limit(300);

        $zk = new ZKTeco('192.168.0.115', 5005);
        $zk->connect();
        //$zk->deviceName('K12/D'); 
        //$zk->enableDevice(); 
        // $zk->setUser('15', '1567', 'Rakibul Islam', 'abcdabcd');
        // $zk->disconnect();

        // return $zk->getUser();
         //return $abc = $zk->serialNumber();
        return $zk->deviceName();

        // return $abc;
    }


    public function testOnly()
    {
        
    }
}
