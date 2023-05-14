@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl mx-auto">
                <div class="card" id="printDiv">
                    <div class="card-body" >

                        <div class="d-flex justify-content-center">
                            @if (File::exists(public_path(Auth::user()->school_logo)) && !is_null(Auth::user()->school_logo))
                            <img src="{{asset(Auth::user()->school_logo)}}" alt="school logo" class="img-fluid" width="80" style="width:80px; height:80px;margin-right:20px;">
                            @endif
                            
                            <div class="text-center">
                                <h4 style="margin-bottom: 0px; "> {{ strtoupper( Auth::user()->school_name) }} </h4>
                                <p style="margin-bottom: 0px; font-size:12px margin-bottom:10px;"> {{ (Auth::user()->slogan )}} </p>
                                <h5>Result Of {{getClassName($class)->class_name}} {{ getTermName($term)->term_name }}</h5>                                
                                <h6>Date: {{ date('d-m-Y') }}</h6>
                            </div>
                        </div>

                        <hr>

                        <table class="table table-bordered text-center" style="font-size: 12px;">
                                <thead>
                                  <tr>
                                    <th scope="col">Rank</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Mark</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">GPA</th>
                                    <th scope="col">Result</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $key =0;
                                    @endphp

                                    @foreach ($sortedArrayOfResult as $rank => $data)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{getStudentName($data['student_id'])?->roll_number}}</td>
                                                <td> {{ strtoupper(getStudentName($data['student_id'])?->name) }} </td>
                                                <td>{{ $data['total'] }}</td>
                                                <td>{{ ($data['totalGpa'] > 1 && $data['resultStatus'] == 1) ? classWiseGpa($data['totalGpa']) : "F" }}</td>
                                                <td>{{ ($data['totalGpa'] > 1 && $data['resultStatus'] == 1) ? $data['totalGpa'] : "0" }}</td>
                                                <td>{{ ($data['resultStatus'] == 1) ? "Pass" : "Fail" }}</td>

                                                {{-- <td>{{classWisePassFail($data['totalGpa'])}}</td> --}}
                                            </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-success" onclick="printDiv()">Print</button>
                    </div>
                </div>
            </div>
        </div>

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
