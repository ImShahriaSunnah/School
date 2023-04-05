<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
</head>
    <body>
        <div class="row" style="margin: 20px 100px 100px; line-height: 20px;">
                <div style="text-align: center;">
                    <h3>{{ $question->school->school_name }}</h3>
                    <h3>{{ $question->term->term_name }}</h3>
                    <h3>{{ $question->class->class_name }}</h3>
                    <h3>{{ $question->subject->subject_name }}</h3>
                </div>
                <hr>
                <div class="" style="display: flex; justify-content: space-between">
                    <div >
                        <h5>Name.................</h5>
                        <h5>Roll.................</h5>
                    </div>
                    <div style="">
                        <h5>{{ $question->total_marks }}</h5>
                    </div>
                </div> 

                @foreach ($question['question_title'] as $key => $title )
                    <div style="display: flex; justify-content: space-between;">
                        <div class="">
                            <h4>{{ "Q".$loop->iteration }}. {{ $title }}</h4> <br>
                            <p>{!! $question['question'][$key] !!}</p>
                        </div>
                        
                        <div class="">
                            <p>{{ $question['question_mark'][$key] }}</p>
                        </div>
                    </div>
                @endforeach
        </div>
    </body>
</html>