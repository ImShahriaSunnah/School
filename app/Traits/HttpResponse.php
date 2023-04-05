<?php

namespace App\Traits;


trait HttpResponse{

    protected function success(string $message = "", $data = [], $code = 200)
    {
        return response()->json([
            "status"    =>  "Called API Successfully",
            "status_code"   =>  $code,
            "message"   =>  $message,
            "data"      =>  $data
        ], $code);
    }


    protected function error(string $message = "", $data = [], $code = 400)
    {
        return response()->json([
            "status"    =>  "Called API Successfully",
            "status_code"   =>  $code,
            "message"   =>  $message,
            "data"      =>  $data
        ], $code);
    }
}


?>