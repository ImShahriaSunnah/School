<?php

namespace App\Http\Controllers\Lib;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use LanguageDetector\LanguageDetector;


class LanguageDetectController extends Controller
{
   use HttpResponse;

    /**
     * detect language
     */
    public function detecLanguage(Request $request)
    {
        $detector = new LanguageDetector(null, ['en', 'bn']);
        $text = $request->text ?? "hello";
        $detector->evaluate($text);
        echo $detector;
    }
}
