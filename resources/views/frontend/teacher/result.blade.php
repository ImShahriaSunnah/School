@extends('layouts.teacher.master')
@section('content')
    <main class="page-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <form method="post" action="{{route('teacher.result.create.post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Student Name</th>
                                            <th>Roll</th>
                                            <th style="text-align: center;">{{$dataSubject->subject_name}}</th>
                                            <th>Total</th>
                                            <th>Grade</th>
                                            <th>GPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataStudent as $key => $data)
                                            <tr>    
                                                <td>{{$key++ +1}}</td>
                                                <td>    
                                                    <div class="cursor-pointer">
                                                        @if ($data->image != null && file_exists($data->image))
                                                            <img src="{{asset($data->image)}}" class="rounded-circle" width="44" height="44" alt=" "> <br>
                                                        @else
                                                            @if ($data->gender == "Female")
                                                                <img src="{{asset('d/no-img-female.png')}}" class="rounded-circle" width="44" height="44" alt=" "> <br>
                                                            @else
                                                                <img src="{{asset('d/no-img.png')}}" class="rounded-circle" width="44" height="44" alt=" "> <br>
                                                            @endif
                                                        @endif
                                                        <div class="">
                                                            <p class="mb-0">{{$data->name}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$data->roll_number}}</td>

                                                @php
                                                    $resultHaveorNot =  getResultHaveorNotUser($data->id, $dataSubject->id, $dataTermId);
                                                    $resultHaveorNotById =  getResultHaveorNotByIdUser($data->id, $dataSubject->id, $dataTermId);
                                                    $subjectTotalMark = 0;
                                                @endphp

                                                <td>
                                                    <input type="hidden" class="form-control" name="student_id[]" value="{{$data->id}}">
                                                    <input type="hidden" class="form-control" name="student_roll_number[]" value="{{$data->roll_number}}">
                                                    <input type="hidden" class="form-control" name="subject_id" value="{{$dataSubject->id}}">
                                                    <input type="hidden" class="form-control" name="term_id" value="{{$dataTermId}}">
                                                    <input type="hidden" class="form-control" name="class_id" value="{{$class_id}}">
                                                    <div class="row">
                                                        @foreach ($markTypes as $markType)
                                                            <div class="col-md-4">
                                                                <label for="">{{ $markType->mark_type == "Class_Test" ? "Class Test" : $markType->mark_type }}</label>
                                                                <input type="text" class="form-control" name="{{ $markType->mark_type }}[]" value="{{ (teacherGetResultMarks($data->id, $dataSubject->id, $dataTermId, $markType->mark_type) == NULL) ? ' ' : teacherGetResultMarks($data->id, $dataSubject->id, $dataTermId, $markType->mark_type)  }}">
                                                            </div>
                                                            @php
                                                                $subjectTotalMark += teacherGetResultMarks($data->id, $dataSubject->id, $dataTermId, $markType->mark_type);
                                                            @endphp
                                                        @endforeach
                                                    </div>
                                                </td>

                                                @php
                                                    $termName = \App\Models\Term::where('id', $dataTermId)->first();
                                                    $totalMark = $subjectTotalMark * 100 / $termName->total_mark;
                                                    $grading_scale = array(
                                                        'A+' => 80, 'A' => 70, 'A-' => 60, 'B' => 50, 'C' => 40, 'D' => 33, 'F' => 0
                                                    );

                                                    $grading_point = array(
                                                        '5' => 80, '4' => 70, '3.5' => 60, '3' => 50, '2' => 40, '1' => 33, '0' => 0
                                                    );

                                                    $markInvalid = $totalMark > 100 || $totalMark < 0;
                                                    if ($markInvalid) {
                                                        $invalidMsg =  "Mark is invalid";
                                                    } else {
                                                        foreach ($grading_scale as $grade => $minimum_score) {
                                                            if ($totalMark >= $minimum_score) {
                                                                $final_grade = $grade;
                                                                break;
                                                            }
                                                        }

                                                        foreach ($grading_point as $gpa => $minimum_score) {
                                                            if ($totalMark >= $minimum_score) {
                                                                $gpa_point = $gpa;
                                                                break;
                                                            }
                                                        }
                                                    }
                                                @endphp

                                                <td><h5 style="margin-top: 5px;">{{ $subjectTotalMark }}</h5></td>
                                                <td><h5 style="margin-top: 5px;">{{ $markInvalid ? $invalidMsg : $final_grade }}</h5></td>
                                                <td><h5 style="margin-top: 5px;">{{ $markInvalid ? $invalidMsg : $gpa_point }}</h5></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <button  type="submit" class="btn btn-success">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection