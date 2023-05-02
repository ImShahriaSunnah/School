@extends('layouts.school.master')

@push('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    
@endpush

@section('content')
    <!--start content-->
    <main class="page-content" id="questioanPrint">
        <div id="questionPrint">
            <div class="row" id="questionPrindt">

                @foreach ( $questions as $question )
                    @php
                        //Number
                        $bn_numbers = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
                        $en_numbers = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
                        $arr = [1 => 'A', 'B', 'C', 'D'];
                        $arr1 = [1=> 'ক', 'খ', 'গ', 'ঘ' ];
                        $bnNumber = [1 => '১', '২', '৩' , '৪', '৫', '৬', '৭', '৮', '৯', '১০', 
                                          '১১', '১২', '১৩', '১৪', '১৫', '১৬', '১৭', '১৮', '১৯',
                                           '২০', '২১', '২২', '২৩', '২৪', '২৫', '২৬', '২৭', '২৮', '২৯',
                                            '৩০', '৩১', '৩২', '৩৩', '৩৪', '৩৫', '৩৬', '৩৭', '৩৮', '৩৯', '৪০', '৪১' ];
                        $subjectArray = explode(" ", strtolower($question->subject->subject_name));
                    @endphp
                    <div class="col-md-12 text-center">
                        <h6>{{ in_array("english", $subjectArray) ? $question->school->school_name : $question->school->school_name_bn ?? " " }}</h6>
                        <h6>{{ in_array("english", $subjectArray) ? $question->term->term_name : $question->term->term_name_bn ?? " "}}</h6>
                        <h6>{{ in_array("english", $subjectArray) ? $question->class->class_name : $question->class->class_name_bn ?? " " }}</h6>
                        <h6>{{ in_array("english", $subjectArray) ? $question->subject->subject_name : $question->subject->subject_name_bn ?? " " }}</h6>
                        <h6>
                            @if (in_array("english", $subjectArray))
                                {{ $question->type }} Question
                            @else
    
                                @if ($question->type == "MCQ")
                                    {{ "এমসিকিউ প্রশ্ন" }}
                                @elseif ($question->type == "Written")
                                    {{ "লিখিত প্রশ্ন" }}
                                @elseif ($question->type == "Creative")
                                    {{ "সৃজনশীল প্রশ্ন" }}
                                @endif
                                
                            @endif
                        </h6>
                    </div>
                    @php
                        
                        $floatNum = $question->hours / 60;
                        $sb = ($question->hours == 60) ? 1 : substr($floatNum, 1);
                        $hr = floor($floatNum);
                        $min = round($sb * 60);
                        $length = strlen($question->hours);

                    @endphp
                    <div class="d-flex justify-content-between">
                        <div style="width: 25%">
                            @if (in_array("english", $subjectArray))
                                @if ($question->hours > 59)
                                    @if (is_float($floatNum))
                                        {{ "Time : ".$hr." Hours ". $min." Minutes" }}
                                    @else
                                        {{ "Time : ".$question->hours / 60 }} Hours                               
                                    @endif
                                @else
                                    @if ($length > 1)
                                        {{ "Time : ".$question->hours / 60 * 60 }} Minutes
                                    @else
                                        {{ "Time : ".$question->hours}} Hours
                                    @endif
                                @endif
                            @else
                                @if ($question->hours > 59)
                                    @if (is_float($floatNum))
                                        {{ "সময় : ".$hr." ঘন্টা ". $min." ‍মিনিট" }}
                                    @else
                                    {{ "সময় : ".str_replace($en_numbers, $bn_numbers, $question->hours / 60)}} ঘন্টা                               
                                    @endif
                                @else
                                    @if ($length > 1)
                                        {{ "সময় : ".str_replace($en_numbers, $bn_numbers, $question->hours / 60 * 60) }} মিনিট
                                    @else
                                        {{ "সময় : ".str_replace($en_numbers, $bn_numbers, $question->hours) }} ঘন্টা
                                    @endif
                                @endif
                            @endif
                            {{-- <p>{{ in_array("english", $subjectArray) ? "Time :". $question->hours." hours" : "সময় : ". str_replace($en_numbers, $bn_numbers, $question->hours)." ঘন্টা" }}</p> --}}
                            {{-- <p>{{ in_array("english", $subjectArray) ? "Time :". $question->hours : "সময় : ". str_replace($en_numbers, $bn_numbers, $question->hours) }}</p> --}}
                        </div> 
                        <div style="width: 10%">
                            <p>{{ in_array("english", $subjectArray) ? "Total :". $question->total_marks : "মোট : ". str_replace($en_numbers, $bn_numbers, $question->total_marks) }}</p>
                        </div> 
                    </div>
                    <hr>
                        <div class="d-flex">
                            <div style="width: 75%; margin-bottom: 15px;">
                                <h5>{{ in_array("english", $subjectArray) ? "Name................." : "নাম................." }}</h5> <br>
                                <h5>{{ in_array("english", $subjectArray) ? "Roll................." : "রোল................." }}</h5>
                            </div>
                        </div> 
                        @if ($question->type == "Creative")
                            @foreach ($question['cre_question'] as $key => $qn )
                                <div class="col-md-12 d-flex">
                                    <h6 >{{ in_array("english", $subjectArray) ? $loop->iteration.'.' : $bnNumber[$loop->iteration].'|' }}</h6> &nbsp &nbsp
                                    <h6>{!! $question['question'][$key] !!}</h6>
                                </div> 
                                @foreach ($qn as $k => $ques )
                                    <div style="display: flex;">
                                        <div style="width: 75%">
                                            <p class="ms-5">
                                                @if (in_array("english", $subjectArray))
                                                    {{ $arr[$loop->iteration].')' }} 
                                                @else
                                                    {{ $arr1[$loop->iteration].')' }} 
                                                @endif
                                                {{  $ques  }}
                                            </p> <br>
                                        </div>
                                        
                                        <div style="width: 25%;">
                                            <p>{{ $question['question_mark'][$key][$k] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @elseif ($question->type == "MCQ")
                            @foreach ($question->question as $key => $value )
                            <div style="width: 50%;">
                                <h6 class="d-flex">{{ in_array("english", $subjectArray) ? $loop->iteration.'.' : $bnNumber[$loop->iteration].'|' }} &nbsp &nbsp {!! $value !!}</h6>
                                <div class="row">
                                    @foreach ($question->mcq_question[$key] as $val )
                                        <div  style="width: 50%;">
                                            <span style="border: 1px solid black; border-radius: 100%; padding-left: 5px; padding-right: 1px;">
                                                @if (in_array("english", $subjectArray))
                                                    {{ $arr[$loop->iteration] }} 
                                                @else
                                                    {{ $arr1[$loop->iteration] }} 
                                                @endif
                                            </span> &nbsp 
                                            
                                            {{ $val }} <br><br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        @elseif ($question->type == "Written")
                            @foreach ($question->question_title as $key => $value )
                                <div class="d-flex">
                                    <div style="width: 75%">
                                        <h4>{{ in_array("english", $subjectArray) ? $loop->iteration.'.' : $bnNumber[$loop->iteration].'|' }} {{ $value }}</h4> <br>
                                        <div style="margin-left: 40px">
                                            <p>{!! $question->question[$key] !!}</p>
                                        </div>
                                    </div>
                                    
                                    <div style="width: 25%">
                                        <p>{{ $question->question_mark[$key] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                @endforeach 
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button class="btn btn-primary" onclick="printDiv()">Print</button>    
        </div>   
    </main>


@endsection

@push('js')
<script>
    function printDiv(questionPrint) {
        $("div").css("color", "black");
        var printContents = document.getElementById("questionPrint").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
   

@endpush
