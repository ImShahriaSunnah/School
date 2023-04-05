<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronjobController extends Controller
{
    /**
     * set attendance for users
     */
    public function callAttendance()
    {
        // if()
        $zk = new ZKTeco('192.168.0.107', '4370'); //192.168.0.123
        
        if($zk->connect())
        {
            echo "Version: {$zk->version()} <br/>";
            echo "Serial Number {$zk->serialNumber()} <br/>";
            echo "Device Name: {$zk->deviceName()} <br>"; 

            // return $zk->clearAdmin();
            // $zk->setUser(5, 5, "Tanvir Ahmed", 'abcdabcd', 0, 8717237);
            return  $zk->getUser();
            // return $zk->getAttendance(); //8717237
        }

        return "Not connect";
    }
}
