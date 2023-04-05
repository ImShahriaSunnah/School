<?php

namespace App\Http\Controllers\school;

use Response;
use App\Models\User;
use App\Models\School;
use App\Models\Transfer;
use App\Models\Certificate;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Dompdf\Dompdf;

class CertificateController extends Controller
{
    
     public function print(){
      
      $certificate=Certificate::find();
      return view('frontend.school.certificate.certificate',compact('certificate'));
     }



    public function example($id){
      $user=User::find($id);
      $school=School::find(Auth::id());
      $view = view('frontend.school.Certificate.Testimonial',compact('user','school'))->render();

      $dompdf = new Dompdf();
      $dompdf->loadHtml($view);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();
      $dompdf->stream();

      return back();
      // return Response::download('frontend.school.Certificate.Testimonial');
    }

}
