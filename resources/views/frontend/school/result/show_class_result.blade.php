@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl mx-auto">
                <div class="card">
                    <div class="card-body" id="printDiv">
                        <div class="border p-3 rounded">
                            <table class="table table-bordered text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">MCQ</th>
                                    <th scope="col">Written</th>
                                    <th scope="col">Others</th>
                                    <th scope="col">Total Mark</th>
                                    <th colspan="2" scope="col">Grade/GPA</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
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
