@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl mx-auto">
                <div class="card">
                    <div class="card-body" id="printDiv">
                        <div class="border border-dark p-3 rounded" ">

                            <div class="d-flex justify-content-center">
                                @if (File::exists(public_path(Auth::user()->school_logo)) && !is_null(Auth::user()->school_logo))
                                <img src="{{asset(Auth::user()->school_logo)}}" alt="school logo" class="img-fluid" width="80" style="width:100px; height:80px;margin-right:10px;">
                                @endif
                                <div class="text-center">
                                    <h3 style="margin-bottom: 0px;"> {{ strtoupper(Auth::user()->school_name) }} </h3>
                                    <p style="margin-bottom: 0px;"> <b>({{ (Auth::user()->slogan )}})</b> </p>
                                    <p style="margin-bottom: 0px;"> {{ Auth::user()->address }} </p>
                                    <h5>{{ $term->term_name }}</h5>
                                </div>
                            </div>

                            <hr style="margin-top: 0px;">

                            <div class="d-flex mb-2 justify-content-between">
                                @if(File::exists(public_path($studentResults->first()->user?->image)))
                                    <img src="{{asset($studentResults->first()->user?->image)}}" class="img-fluid" alt="student image" style="height: 100px; width: 80px">
                                @else
                                    <img src="{{asset('d/no-img.jpg')}}" class="img-fluid" alt="student image" style="height: 60px; width: 60px">
                                @endif

                                <div class="h6 col-md-3" style="font-size: 12px;">
                                    <table style="border-color: black;">
                                        <tbody>
                                            <tr>
                                                <td>Student Name</td>
                                                <td>: {{ strtoupper($studentResults->first()->user?->name) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Father Name</td>
                                                <td>: {{ strtoupper($studentResults->first()->user?->father_name) }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Mother Name</td>
                                                <td>: {{ $studentResults->first()->user?->mother_name }}</td>
                                            </tr> --}}
                                            <tr>
                                                <td>Shift</td>
                                                <td>: @if($studentResults->first()->user?->shift == 1) Morning @elseif($studentResults->first()->user?->shift == 2) Day @elseif($studentResults->first()->user?->shift == 3) Evening @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Roll</td>
                                                <td>: {{ $studentResults->first()->user?->roll_number }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="h6 col-md-4" style="font-size: 12px;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>{{__('app.class')}}</td>
                                                <td>: {{ $studentResults->first()->user?->class?->class_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('app.section')}}</td>
                                                <td>: {{ $studentResults->first()->user?->section?->section_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>SID</td>
                                                <td>: {{ $studentResults->first()->user?->unique_id ?? 'none' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Year</td>
                                                <td>: {{date("Y")}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Performance of student --}}

                                <div class="ml-auto">
                                    <table class="table table-bordered" style="font-size: 10px; border-color:black;">
                                        <thead>
                                            <tr align="center">
                                                <th colspan="2">Performance In Class</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding:1px;">Excelent</td>
                                                <td width="20%" style="padding:1px;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;magrin-left:2px;">Very Good</td>
                                                <td style="padding:1px;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">Good</td>
                                                <td style="padding:1px;"></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">Poor</td>
                                                <td style="padding:1px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <table class="table table-bordered text-center" style="font-size: 12px; border-color:black;">
                                <thead style="padding:0px;">
                                  <tr>
                                    <th width="350px;" class="text-nowrap">Subject Name</th>
                                    <th scope="col">Full Mark</th>
                                    <th scope="col">Pass Marks</th>
                                    @foreach ($markType as $data)
                                        @if ($data->mark_type == 'Class_Test')
                                            <th>CT</th>
                                        @else
                                            <th>{{$data->mark_type}}</th>
                                        @endif

                                    @endforeach
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Grade Point</th>
                                  </tr>
                                </thead>
                                <tbody style="padding:0px;">
                                    @php
                                        $total = 0;
                                        $totalGpa = 0.000;
                                        $totalSubject = count($studentResults);

                                    @endphp
                                    @foreach ($studentResults as $result)
                                    <tr>
                                        @if($result->subject->subject_name == 'Information and Communication Technology')
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">ICT</td>
                                        @elseif($result->subject->subject_name == 'Bangla First Paper')
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">Bangla 1st Paper</td>
                                        @elseif($result->subject->subject_name == 'Bangla Second paper')
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">Bangla 2nd Paper</td>
                                        @elseif($result->subject->subject_name == 'English First Paper')
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">English 1st Paper</td>
                                        @elseif($result->subject->subject_name == 'English Second Paper')
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">English 2nd Paper</td>
                                            @elseif($result->subject->subject_name == 'Islam/ Other Religions')
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">Islam/ Other</td>
                                        @else
                                            <td width="300px;" scope="row" style="padding: 1px; color:black;">{{ $result->subject->subject_name }}</td>
                                        @endif
                                            <td style="padding: 0px; color:black;">100</td>
                                            <td style="padding: 0px; color:black;">33</td>
                                         @foreach ($markType as $data)
                                            @if($data->mark_type == 'Attendance')
                                                <td style="padding: 0px; color:black;">{{$result->attendance}}</td>
                                            @elseif($data->mark_type == 'Written')
                                                <td style="padding: 0px; color:black;">{{$result->written}}</td>
                                            @elseif($data->mark_type == 'MCQ')
                                                <td style="padding: 0px; color:black;">{{$result->mcq}}</td>
                                            @elseif($data->mark_type == 'Assignment')
                                                <td style="padding: 0px; color:black;">{{$result->assignment}}</td>
                                            @elseif($data->mark_type == 'Presentation')
                                                <td style="padding: 0px; color:black;">{{$result->presentation}}</td>
                                            @elseif($data->mark_type == 'Quiz')
                                                <td style="padding: 0px; color:black;">{{$result->quiz}}</td>
                                            @elseif($data->mark_type == 'Practical')
                                                <td style="padding: 0px; color:black;">{{$result->practical}}</td>
                                            @elseif($data->mark_type == 'Others')
                                                <td style="padding: 0px; color:black;">{{$result->others}}</td>
                                            @elseif ($data->mark_type == 'Class_Test')
                                                <td style="padding: 0px; color:black;">{{$result->class_test}}</td>
                                            @endif

                                        @endforeach

                                        <td style="padding: 0px; color:black;">{{ $result->total }}</td>
                                        <td style="padding: 0px; color:black;">{{ $result->grade }}</td>
                                        <td style="padding: 0px; color:black;">{{ $result->gpa }}</td>
                                    </tr>
                                    @php
                                         $total += $result->total;
                                         $totalGpa += $result->gpa;
                                         $totalMark = $result->total * 100 / $term->total_mark;

                                         if ($totalMark < 33) {
                                            $resultStatus = "Fail";
                                         }
                                    @endphp
                                    @endforeach
                                    @php
                                        $grading_point = array(
                                                                'A+' => 5, 'A' => 4, 'A-' => 3.5, 'B' => 3, 'C' => 2, 'D' => 1, 'F' => 0
                                                            );
                                        foreach ($grading_point as $gpa => $minimum_grade) {
                                                if (number_format($totalGpa/$totalSubject, 2) >= $minimum_grade) {
                                                    $gpa_point = $gpa;
                                                    break;
                                                }
                                            }
                                    @endphp
                                    <tr>
                                        <td colspan="{{$markTypeCount+2 }}">Total/ GPA</td>
                                        <td>{{ $total }}</td>
                                        @if (isset($resultStatus))
                                            <td colspan="2" >{{ $resultStatus }}</td>
                                        @else
                                            <td>{{ $gpa_point }}</td>
                                            <td>{{ number_format($totalGpa/$totalSubject, 2) }}</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>

                            <br>
                            <div class="row justify-content-between">

                                <div class="ml-auto col-2">
                                    <table class="table table-bordered" style="font-size: 12px; border-color:black;">
                                        <thead>
                                            <tr align="center">
                                                <th colspan="2">Mark Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding:1px;">80-100</td>
                                                <td width="20%" style="padding:1px;">A+</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">70-79</td>
                                                <td style="padding:1px;">A</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">60-69</td>
                                                <td style="padding:1px;">A-</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">50-59</td>
                                                <td style="padding:1px;">B</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">40-49</td>
                                                <td style="padding:1px;">C</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">33-39</td>
                                                <td style="padding:1px;">D</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:1px;">0-32</td>
                                                <td style="padding:1px;">F</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                            

                                <div class="col-3">
                                    <div>
                                        <table class=" table table-bordered text-center" style="font-size: 12px; border-color:black;">

                                            <tbody>
                                                <tr class="row">
                                                    <td class="col-8 border-end-0" style="border-bottom-color: white;" style="padding:2px;">Total Working Days</td>
                                                    <td class="col-4" style="padding:2px;"></td>
                                                </tr>
                                                <tr class="row">
                                                    <td class="col-8 border-end-0 border-top-0" style="padding:2px;">Present</td>
                                                    <td class="col-4" style="padding:2px;"></td>
                                                </tr>
                                                <tr class="row">
                                                    <td class="col-8 border-end-0 border-top-0" style="padding:2px;">Absent</td>
                                                    <td class="col-4" style="padding:2px;"></td>                                                
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div>
                                        <table class=" table table-bordered text-center" style="font-size: 12px; border-color:black;">

                                            <tbody>
                                                <tr class="row">
                                                    <td class="col-8 border-end-0" style="padding:2px;">Position in class</td>
                                                    <td class="col-4" style="padding:2px;">{{$studentRank}}</td>
                                                </tr>
                                                <tr class="row">
                                                    <td class="col-8 border-end-0 border-top-0" style="padding:2px;">Position in section</td>
                                                    <td class="col-4" style="padding:2px;">{{$section_studentRank}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>

                                <div class="col-6" style="font-size: 12px;">
                                    <table class=" table table-bordered text-center" style="border-color: black;">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Signatures</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="height: 90%">
                                                <td style="height: 80px; width:150px;"></td>
                                                <td style="height: 80px; width:150px;"></td>
                                                <td style="height: 80px; width:150px;"></td>
                                            </tr>
                                            <tr>
                                                <td>Class Teacher</td>
                                                <td>Principal</td>
                                                <td>Guardian</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>                            

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-success" onclick="printDiv()">Print</button>
            </div>
        </div>
        <!--end row-->
    </main>

@endsection

@push('js')
<script>
    function printDiv(printDiv) {
        var printContents = document.getElementById('printDiv').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endpush
