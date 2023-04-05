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
                                    @if (File::exists(asset(Auth::user()->school_logo)) && !is_null(Auth::user()->school_logo))
                                    <img src="{{asset(Auth::user()->school_logo)}}" alt="school logo" class="img-fluid" width="100">
                                    @endif
                                    <div class="text-center">
                                        <h1> {{ strtoupper(Auth::user()->school_name )}} </h1>
                                        <p> {{ Auth::user()->address }} </p>
                                        <h5>Annual Examination Result</h5>
                                    </div>
                                </div>

                                <hr>

                                <div class="d-flex mb-5 justify-content-between">
                                    @if(File::exists(asset($studentResults->first()->user?->image)))
                                    <img src="{{asset($studentResults->first()->user?->image)}}" class="img-fluid" alt="student image" style="height: 150px; width: 150px">
                                    @else
                                    <img src="{{asset('d/no-img.jpg')}}" class="img-fluid" alt="student image" style="height: 150px; width: 150px">
                                    @endif

                                    <div class="h6 ms-3">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td>: {{ $studentResults->first()->user?->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Father Name</td>
                                                    <td>: {{ $studentResults->first()->user?->father_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Name</td>
                                                    <td>: {{ $studentResults->first()->user?->mother_name }}</td>
                                                </tr>
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

                                    <div class="h6 ms-3">
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

                                    <div class="ms-3">
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
                                    </div>
                                </div>

                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">Subjec Name</th>
                                        <th scope="col">Full Marks</th>
                                        <th scope="col">Pass Marks</th>
                                        {{-- @dd(array_slice($subjects, 0, 1, true)) --}}
                                        @foreach (array_slice($subjects, 0, 1, true) as $key => $subject)
                                            @foreach ($subject as $k => $v)
                                                <th scope="col">{{ $k }}</th>
                                            @endforeach
                                        @endforeach
                                        <th scope="col">Average</th>
                                        <th scope="col">Grade Latter</th>
                                        <th scope="col">Grade Point</th>
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
                                                $totalTermMark = \App\Models\Term::selectRaw("SUM(total_mark) as term_total_mark")->first();
                                                $count = $totalTermMark->term_total_mark / 100;
                                            @endphp
                                                @if ($v['total'] != 0)
                                                    <td>
                                                        {{ $v['total'] }}
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Written</th>
                                                                <th>Mcq</th>
                                                                <th>Other</th>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $v['written'] }}</td>
                                                                <td>{{ $v['mcq'] }}</td>
                                                                <td>{{ $v['other'] }}</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                @else
                                                    <td>
                                                        <br>
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Written</th>
                                                                <th>Mcq</th>
                                                                <th>Other</th>
                                                            </tr>
                                                            <tr>
                                                                <td><br></td>
                                                                <td><br></td>
                                                                <td><br></td>
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
                                            <th>{{ finalGrade($totalAvg) }}</th>
                                            <th>{{ finalGpa($totalAvg) }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex">
                                    <table class="table table-bordered" style="width: 30%">
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
                                    <table class="table table-bordered ms-3 text-center" style="width: 25%">
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
                                            {{-- <tr>
                                                <td>Absent</td>
                                                <td>61</td>
                                            </tr> --}}
                                            <tr>
                                                <th>Place In Own Class</th>
                                                <td>{{ $studentRank }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered text-center ms-3" style="width: 45%">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Signatures</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="height: 90%">
                                                <td></td>
                                                <td></td>
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
