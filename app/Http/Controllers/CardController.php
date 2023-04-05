<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\IdCard;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use SebastianBergmann\Template\Template;

class CardController extends Controller
{
    public function idCard()
    {
        $idCard=IdCard::all();
        return view('frontend.school.ID_Card.IdCard',compact('idCard'));
    }


    public function idCardCreate()
    {
        return view('frontend.school.ID_Card.IdCardCreate');
    }


    public function idCardPost(Request $request)
    {
        // return $request;
        $Template = null;
        if ($request->hasFile('template')) {
            $Template = date('Ymdmsis') . '.' . $request->file('template')->getclientOriginalExtension();
            $request->file('template')->storeAs('/uploads/idCardFront', $Template);
        }
        $NullTemplate = null;
        if ($request->hasFile('null_template')) {
            $NullTemplate = date('Ydhmsis') . '.' . $request->file('null_template')->getclientOriginalExtension();
            $request->file('null_template')->storeAs('/uploads/idCard', $NullTemplate);
        }
        $BackTemplate = null;
        if ($request->hasFile('back_template')) {
            $BackTemplate = date('Ymdhsis') . '.' . $request->file('back_template')->getclientOriginalExtension();
            $request->file('back_template')->storeAs('/uploads/idCard', $BackTemplate);
        }
        IdCard::create([
            'template' => $Template,
            'null_template' => $NullTemplate,
            'back_template' => $BackTemplate
        ]);
        return back();
    }








    public function store(Request $request)
    {
        $data = User::all();
        $idTempl = IdCard::find($request->templ_id);

        foreach ($data as $user) {

            $image = Image::make(public_path()."/uploads/idCard/{$idTempl->null_template}");
          
            $image->text("$user->name", 90, 200, function ($font) {
                $font->file(public_path('Courgette-Regular.ttf'));
                $font->size(15);
                $font->color('#000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $image->text("Roll :$user->roll_number", 80, 215, function ($font) {
                $font->file(public_path('Courgette-Regular.ttf'));
                $font->size(10);
                $font->color('#000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $image->text("Class :$user->classRealtion->class_name", 80, 230, function ($font) {
                $font->file(public_path('Courgette-Regular.ttf'));
                $font->size(10);
                $font->color('#000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $image->text("Section  :$user->section", 80, 245, function ($font) {
                $font->file(public_path('Courgette-Regular.ttf'));
                $font->size(10);
                $font->color('#000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $image->text("Blood :$user->blood_group", 80, 260, function ($font) {
                $font->file(public_path('Courgette-Regular.ttf'));
                $font->size(10);
                $font->color('#000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
            $image->text("Phone Number :$user->phone", 80, 275, function ($font) {
                $font->file(public_path('Courgette-Regular.ttf'));
                $font->size(10);
                $font->color('#000');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(0);
            });
       
            $image->save(public_path('up/idCard').time().".png");     
        }

        return back();
    }
}
