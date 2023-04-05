@extends('layouts.school.master')
@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
            <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-danger" role="tablist">
                @foreach($subjectName as $key => $tabName)
                <li class="nav-item mx-3" role="presentation">
                    <a class="nav-link {{($key == 0) ? 'active' : ''}}" data-bs-toggle="tab" href="#danger{{$tabName->id}}" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                            </div>
                            <div class="tab-title">{{$tabName->subject_name}}</div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content py-3">
                @foreach($subjectName as $key => $tabName)
                <div class="tab-pane fade {{($key == 0) ? 'show active' : ''}}" id="danger{{$tabName->id}}" role="tabpanel">
                    <div class="card">
                        <form method="post" action="{{route('result.create.post')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive" id="aaa">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Roll</th>
                                                <th>Student Name</th>
                                                @foreach ($markTypes as $markType)
                                                    <th style="text-align: center;">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">{{ $markType->mark_type == "Class_Test" ? "Class Test" : $markType->mark_type }}</label>
                                                            </div>
                                                        </div>
                                                    </th>
                                                @endforeach
                                                <th>Total</th>
                                                <th>Grade</th>
                                                <th>GPA</th>
                                                {{-- <th>PDF</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($markTypes) > 0)
                                                @foreach($dataShow as $key => $data)
                                                    <tr id="result{{ $data->id }}">
                                                        <td>{{$data->roll_number}}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3 cursor-pointer">
                                                                <img src="{{asset('profile/img/'.$data->image)}}" class="rounded-circle" width="44" height="44" alt="">
                                                                <div class="">
                                                                    <p class="mb-0">{{$data->name}}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <?php
                                                            $resultHaveorNot =  getResultHaveorNot($data->id,$tabName->id,$termName->id);
                                                            $resultHaveorNotById =  getResultHaveorNotById($data->id,$tabName->id,$termName->id);
                                                            $subjectTotalMark = 0;
                                                        ?>
                                                        <input type="hidden" class="form-control" name="student_id[]" value="{{$data->id}}">
                                                        <input type="hidden" class="form-control" name="student_roll_number[]" value="{{$data->roll_number}}">
                                                        <input type="hidden" class="form-control" name="subject_id" value="{{$tabName->id}}">
                                                        <input type="hidden" class="form-control" name="term_id" value="{{$termName->id}}">
                                                        <input type="hidden" class="form-control" name="class_id" value="{{$data->class_id}}">
                                                        
                                                        @foreach ($markTypes as $markType)
                                                            <td>    
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="{{ $markType->mark_type }}[]" value="{{ (getResultMarks($data->id, $tabName->id, $termName->id, $markType->mark_type) == NULL) ? '' : getResultMarks($data->id, $tabName->id, $termName->id, $markType->mark_type)  }}">
                                                                </div>
                                                            </td>
                                                            @php
                                                                $subjectTotalMark += getResultMarks($data->id, $tabName->id, $termName->id, $markType->mark_type);
                                                            @endphp
                                                        @endforeach
                                                        @php
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
                                                        {{-- <td><button class="btn btn-success" onclick="printDiv({{ $data->id }});">Print</button></td> --}}
                                                        
                                                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Class</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form method="get" action="{{route('student.delete',['id'=>$data->id])}}">
                                                                        <div class="modal-body">
                                                                            Are you Sure To Delete ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h4 class="text-center text-danger">First create mark types in this subject</h4>
                                            @endif
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
                @endforeach
            </div>
        </div>
       </div>
            </div>
        </div>
    </main>

<script>
     
</script>
@endsection
