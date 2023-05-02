@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl mx-auto">
                @if (count($studentResults) > 0)
                <div class="card">
                    <div class="card-body" id="printDi">
                        <div class="border p-3 rounded" style="overflow-x:auto;">
                           <div id="printDiv">
                                <div class="d-flex justify-content-center">
                                    @if (File::exists(public_path(Auth::user()->school_logo)) && !is_null(Auth::user()->school_logo))
                                        <img src="{{asset(Auth::user()->school_logo)}}" alt="school logo" class="img-fluid" width="80" style="width:100px; height:80px;">
                                    @endif
                                    <div class="text-center">
                                        <h4 style="margin-bottom: 0px;"> {{ strtoupper(Auth::user()->school_name )}} </h4>
                                        <p style="margin-bottom: 0px; font-size:12px"> {{ (Auth::user()->slogan )}} </p>
                                        <p style="margin-bottom: 0px;"> {{ Auth::user()->address }} </p>
                                        <h5>Annual Examination Result</h5>
                                    </div>
                                </div>

                                <hr>

                                <div class="d-flex mb-2">
                                    @if(File::exists(asset($studentResults->first()->user?->image)))
                                    <img src="{{asset($studentResults->first()->user?->image)}}" class="img-fluid" alt="student image" style="height: 70px; width: 70px">
                                    @else
                                    <img src="{{asset('d/no-img.jpg')}}" class="img-fluid" alt="student image" style="height: 70px; width: 70px">
                                    @endif

                                    <div class="h6 ms-3" style="font-size: 12px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td>: {{ strtoupper($studentResults->first()->user?->name) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Father Name</td>
                                                    <td>: {{ strtoupper($studentResults->first()->user?->father_name)  }}</td>
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

                                    <div class="h6 ms-5" style="font-size: 12px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Class</td>
                                                    <td>: {{ $studentResults->first()->user?->class?->class_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Section</td>
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

                                    {{-- <div class="ms-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr align="center">
                                                    <th colspan="2">Performance In Class</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Excelent</td>
                                                    <td width="20%"></td>
                                                </tr>
                                                <tr>
                                                    <td>Very Good</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Good</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Need Improvment</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>

                                <table class="table table-bordered text-center" style="font-size: 12px;">
                                    <thead>
                                    <tr align="center">
                                        <th>Subject Name</th>
                                        <th>Full Marks</th>
                                        <th>Pass Marks</th>
                                        {{-- @dd(array_slice($subjects, 0, 1, true)) --}}
                                        @foreach (array_slice($subjects, 0, 1, true) as $key => $subject)
                                            @foreach ($subject as $k => $v)
                                                <th class="p-0">
                                                    {{ $k }}
                                                    <table class="table table-bordered m-0">
                                                        <tr>
                                                            <th width="25%">Written</th>
                                                            <th width="25%">Mcq</th>
                                                            <th width="25%">Other</th>
                                                            <th width="25%">Total</th>
                                                        </tr>
                                                    </table>
                                                </th>
                                            @endforeach
                                        @endforeach
                                        <th>Average</th>
                                        <th>Grade Latter</th>
                                        <th>Grade Point</th>
                                    </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($results as $result)
                                        <tr>
                                            <td>{{ $result->student_roll_number }}</td>
                                            <td>{{ $result->user->name }}</td>
                                            <td>{{ $result->total }}</td>
                                            <td>{{ finalGrade($result->total) }}</td>
                                            <td>{{ finalGpa($result->total) }}</td>
                                            <td>{{ ($result->total * 100 / 300 < 33) ? "Fail" : "Pass" }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody> --}}
                                    <tbody>
                                        {{-- @dd($subjects) --}}
                                        @php
                                            $totalAvg = 0;
                                        @endphp
                                        @foreach ($subjects as $key => $subject )
                                            @foreach ($subject as $k => $v)
                                                @php
                                                    $total[$k] = 0;
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        @foreach ($subjects as $key => $subject )
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>100</td>
                                            <td>33</td>
                                            @php
                                                $sum = 0;
                                                // $count = 0;
                                                // $total = [];
                                                
                                            @endphp
                                            
                                            @foreach ($subject as $k => $v)
                                            @php
                                                $total[$k] += $v['total'];
                                                $sum += $v['total'];
                                                // $count += 1;
                                                $totalTermMark = \App\Models\Term::where('school_id', Auth::id())->selectRaw("SUM(total_mark) as term_total_mark")->first();
                                                $count = $totalTermMark->term_total_mark / 100;
                                            @endphp
                                                @if ($v['total'] != 0)
                                                    <td class="p-0">
                                                        {{-- {{ $v['total'] }} --}}
                                                        <table class="table table-bordered m-0">
                                                            
                                                            <tr>
                                                                <td width="25%">{{ $v['written'] }}</td>
                                                                <td width="25%">{{ $v['mcq'] }}</td>
                                                                <td width="25%">{{ $v['other'] }}</td>
                                                                <td width="25%">{{ $v['total'] }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @else
                                                    <td class="p-0">
                                                        <table class="m-0 table table-bordered">
                                                            <tr>
                                                                <td width="25%"><br></td>
                                                                <td width="25%"><br></td>
                                                                <td width="25%"><br></td>
                                                                <td width="25%"><br></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @endif
                                            @endforeach
                                        <td>
                                            {{ number_format($sum / $count, 2) }}
                                        </td>
                                        <td>{{ annualGrade(number_format($sum / $count, 2)) }}</td>
                                        <td>{{ annualGpa(number_format($sum / $count, 2)) }}</td>
                                        @php
                                            $totalAvg += number_format($sum / $count, 2);
                                        @endphp
                                        </tr>
                                        @endforeach
                                        {{-- @dd($total) --}}
                                        <tr>
                                            <th colspan="3">Total Mark And GPA</th>
                                            @foreach ($total as $value)
                                                <th>{{ $value }}</th>
                                            @endforeach
                                            <th>{{ $totalAvg }}</th>
                                            <th>{{ finalGrade($totalAvg, Auth::id()) }}</th>
                                            <th>{{ finalGpa($totalAvg) }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex">
                                    <table class="table table-bordered" style="width: 30%;font-size: 12px;">
                                        <thead>
                                            <tr>
                                                <th>Marks Range</th>
                                                <th>Grade</th>
                                                <th>GPA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>80 - 100</td>
                                                <td>A+</td>
                                                <td>5.00</td>
                                            </tr>
                                            <tr>
                                                <td>70 - 79</td>
                                                <td>A</td>
                                                <td>4.00</td>
                                            </tr>
                                            <tr>
                                                <td>60 - 59</td>
                                                <td>A-</td>
                                                <td>3.50</td>
                                            </tr>
                                            <tr>
                                                <td>50 - 59</td>
                                                <td>B</td>
                                                <td>3.00</td>
                                            </tr>
                                            <tr>
                                                <td>40 - 49</td>
                                                <td>C</td>
                                                <td>2.00</td>
                                            </tr>
                                            <tr>
                                                <td>33 - 39</td>
                                                <td>D</td>
                                                <td>1.00</td>
                                            </tr>
                                            <tr>
                                                <td>00 - 32</td>
                                                <td>F</td>
                                                <td>0.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    {{-- <table class="table table-bordered ms-3 text-center" style="width: 25%">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Present</td>
                                                <td>{{ count($attendance) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Place In Own Class</th>
                                                <td>{{ $studentRank }}</td>
                                            </tr>
                                        </tbody>
                                    </table> --}}
                                    <table class="w-100 table table-bordered text-center ms-3" style="width: 45%">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Signatures</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="height: 90%">
                                                <td width="50%"></td>
                                                <td width="50%"></td>
                                            </tr>
                                            <tr>
                                                <th>Class Teacher</th>
                                                <th>Principal</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <button class="btn btn-success" onclick="printDiv()">Print</button>
                </div>
                @else
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-danger text-center">Result Not Available</h3>
                    </div>
                </div>
                @endif
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
