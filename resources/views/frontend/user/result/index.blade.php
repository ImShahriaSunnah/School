<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <meta name="description" content="{{isset($seo_array['seoDescription']) ? $seo_array['seoDescription'] : "CC School | CodeCell LTD" }}">
   <meta name="keywords" content="{{isset($seo_array['seoKeyword']) ? $seo_array['seoKeyword'] : "CC School | CodeCell LTD" }}">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
   <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">

   <!-- CSS here -->
   @include('frontend.partials.style')
   @stack('css')
</head>
<body>

    <div class="col-md-12">
        <h2 class="text-white text-center bg-primary" style="padding: 17px;">CodeCell International School and College</h2>
    </div>
    <div class="container">
        <div class="row" id="print">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                          <th colspan="2" class="text-center table-light" style="font-size: 25px;">Student Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Roll No.</td>
                        <td>{{ $student->roll_number }}</td>
                      </tr> 
                      <tr>
                          <td>Student Name</td>
                          <td>{{ $student->name }}</td>
                      </tr> 
    
                      <tr>
                          <td>Student ID</td>
                          <td>{{ $student->unique_id }}</td>
    
                      </tr>
                      <tr>
                          <td>{{__('app.class')}}</td>
                          <td>{{ $student->clasRelation->class_name }}</td>
                      </tr>
                      {{-- <tr>
                        <td>Group</td>
                        <td>Science</td>
                      </tr> --}}
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            @if (count($results) > 1)
                              <th colspan="6" class="text-center table-light" style="font-size: 25px;">Mark Details</th>
                            @else
                              <th colspan="4" class="text-center table-light" style="font-size: 25px;">Mark Details</th>
                            @endif
                        </tr>
                      <tr>
                        @php
                        @endphp
                        <th scope="col">Subject</th>
                        <th scope="col">Written</th>
                        <th scope="col">MCQ</th>
                        <th scope="col">Practical</th>
                        @if (count($results) > 1)
                          <th scope="col">Grade</th>
                          <th scope="col">Total</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($results) > 1)
                        @foreach ($results as $result )
                            <tr>
                              <th>{{ $result->subject->subject_name }}</th>
                              <td>{{ $result->written }}</td>
                              <td>{{ $result->mcq }}</td>
                              <td>{{ $result->practical }}</td>
                              @php
                                $totalMark =
                                  $result->written+
                                  $result->mcq+
                                  $result->practical;
                                
                              @endphp
                              <td>
                                  @if ($totalMark >= 80 && $totalMark <= 100)
                                    A+
                                  @elseif ($totalMark >= 70 && $totalMark <= 79)
                                    A 
                                  @elseif ($totalMark >= 60 && $totalMark <= 69)
                                    A- 
                                  @elseif ($totalMark >= 50 && $totalMark <= 59)
                                    B 
                                  @elseif ($totalMark >= 40 && $totalMark <= 49)
                                    C 
                                  @elseif ($totalMark >= 33 && $totalMark <= 39)
                                    D 
                                  @else
                                    F 
                                  @endif
                              </td>
                              <td>{{ $totalMark }}</td>
                            </tr>
                        @endforeach
                      @else
                        @foreach ($results as $result )
                          <tr>
                            <th>{{ $result->subject->subject_name }}</th>
                            <td>{{ $result->written }}</td>
                            <td>{{ $result->mcq }}</td>
                            <td>{{ $result->practical }}</td>
                          </tr>
                        @endforeach
                      @endif

                      @if (count($results) > 1)
                        <tr>
                          <th>Result</th>
                          <th>
                              @foreach ($results as $result )
                                @php
                                  $totalMark =
                                    $result->written+
                                    $result->mcq+
                                    $result->practical;
                                    $mark = array($totalMark);
                                    if (in_array($mark < 33, $mark)) {
                                      $var = 0;
                                    } else {
                                      $var = 1;
                                    }
                                @endphp
                              @endforeach
                              @php
                                if ($var == 0) {
                                  echo "Fail";
                                } else {
                                  echo "Pass";
                                }
                              @endphp
                          </th>
                        </tr>
                      @endif
                    </tbody>
                  </table>
            </div>
          </div>
          
          <div class="col-md-12 text-center">
            <button class="btn btn-primary" onclick="printDiv()">Print</button>
          </div>
    </div>

     <!-- JS here -->
   @include('sweetalert::alert')
   @include('frontend.partials.scripts')
  @stack('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function printDiv(print) {
        var printContents = document.getElementById("print").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
  </script>
</body>
</html>