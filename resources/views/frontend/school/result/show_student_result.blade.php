@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl mx-auto">
                <div class="card">
                    <div class="card-body" id="printDiv">
                        <div class="border p-3 rounded">

                            <div class="d-flex justify-content-center">
                                @if (File::exists(public_path(Auth::user()->school_logo)) && !is_null(Auth::user()->school_logo))
                                <img src="{{asset(Auth::user()->school_logo)}}" alt="school logo" class="img-fluid" width="100">
                                @endif
                                <div class="text-center">
                                    <h1> {{ Auth::user()->school_name }} </h1>
                                    <p> {{ Auth::user()->address }} </p>
                                    <h5>{{ $term->term_name }}</h5>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex mb-5">
                                @if(File::exists(public_path($studentResults->first()->user?->image)))
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

                                <div class="h6 ms-auto">
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

                                {{-- <div>
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
                                        </tbody>
                                    </table>
                                </div> --}}
                            </div>

                            <table class="table table-bordered text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">MCQ</th>
                                    <th scope="col">Written</th>
                                    <th scope="col">Others</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Result</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $totalGpa = 0.000;
                                        $totalSubject = count($studentResults);
                                    @endphp
                                    @foreach ($studentResults as $result)
                                    <tr>
                                      <th scope="row">{{ $result->subject->subject_name }}</th>
                                      <td>{{ $result->mcq }}</td>
                                      <td>{{ $result->written }}</td>
                                      <td>{{ $result->others }}</td>
                                      <td>{{ $result->total }}</td>
                                      <td>{{ $result->grade }}</td>
                                      <td>{{ $result->gpa }}</td>
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
                                        <td colspan="4">Total</td>
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
