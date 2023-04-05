@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <center><h3>Fees Histories</h3></center>

        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <tbody>
                               <tr>
                                <td width="25%">Student Name</td>
                                <td>{{$data['student']->name}}</td>
                                <td rowspan="5" class="text-center" width="25%">
                                    @if(File::exists(public_path($data['student']->image)))
                                    <img src="{{asset($data['student']->image)}}" alt="{{$data['student']->name}}" width="200">
                                    @else
                                    <img src="{{asset('d/no-img.jpg')}}" alt="{{$data['student']->name}}" width="200">
                                    @endif
                                </td>
                               </tr>
                               <tr>
                                <td>Father Name</td>
                                <td>{{$data['student']->father_name}}</td>
                               </tr>
                               
                               <tr>
                                <td>Mother Name</td>
                                <td>{{$data['student']->mother_name}}</td>
                               </tr>

                               <tr>
                                <td>Phone</td>
                                <td>{{$data['student']->phone}}</td>
                               </tr>

                               <tr>
                                <td>Shift</td>
                                <td>
                                    @if ($data['student']->shift == 1) 
                                    <span class="badge bg-success px-2">{{strtoupper("Morning")}}</span>
                                    @elseif ($data['student']->shift == 2) 
                                    <span class="badge bg-success px-2">{{strtoupper("Day")}}</span>
                                    @else 
                                    <span class="badge bg-success px-2">{{strtoupper("Evening")}}</span>
                                    @endif
                                </td>
                               </tr>

                               <tr>
                                <td>{{__('app.class')}}</td>
                                <td>{{$data['student']->class?->class_name}}</td>
                               </tr>

                               <tr>
                                <td>{{__('app.section')}}</td>
                                <td>{{$data['student']->section?->section_name}}</td>
                               </tr>

                               <tr>
                                <td>Roll</td>
                                <td>{{$data['student']->roll_number}}</td>
                               </tr>

                               <tr>
                                <td>SID</td>
                                <td>{{$data['student']->unique_id}}</td>
                               </tr>

                               <tr>
                                    <td>Select Month</td>
                                    <td>
                                        <select  class="form-control mb-3 js-select" name="month" class="form-select" onchange="feesShow(this.value)">
                                            <option value="">Select One</option>
                                            @foreach ($data['months'] as $key => $month)
                                                <option value="{{$key}}" @isset(request()->month) {{(request()->month == $key) ? 'selected' : ''}}  @endisset>{{$month}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                               @if ($data['month'] !== "n")
                                <tr>
                                <td colspan="3" class="text-center">
                                    <h4 class="m-0">Fees Of {{date("F", mktime(0, 0, 0, $data['month']+1, 10))}}</h4>
                                </td>
                               </tr>

                               <tr>
                                <table class="table table-bordered w-50 mx-auto">
                                    @if(isset($data['assignFees']['fees_details']))
                                    <tbody>
                                        @if(is_array($data['assignFees']['fees_details']))
                                            @foreach ($data['assignFees']['fees_details'] as $key => $item)
                                                <tr>
                                                    <td width="70%">{{Str::title($key)}}</td>
                                                    <td class="text-end">৳ {{$item}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach (json_decode($data['assignFees']['fees_details']) as $key => $item)
                                                <tr>
                                                    <td width="70%">{{Str::title($key)}}</td>
                                                    <td class="text-end">৳ {{$item}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr class="text-end">
                                            <td>In Total: </td>
                                            <td>৳ {{$data['studentFees']->amount}}</td>
                                        </tr>
                                        <tr class="text-end">
                                            <td>Status</td>
                                            <td>
                                                @if($data['studentFees']->status == 2)
                                                <span class="badge bg-success">PAID</span>
                                                @elseif($data['studentFees']->status == 0)
                                                <span class="badge bg-danger">DUE</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-end">
                                                {{-- @if($data['studentFees']->status == 0) --}}
                                                <form action="{{route('school.finance.fees.received')}}" method="post" id="paymentRecivedForm">
                                                    @csrf
                                                    <input type="hidden" name="studentId" value="{{$data['student']->id}}">
                                                    <input type="hidden" name="monthId" value="{{$data['month']}}">
                                                    <input type="hidden" name="amount" value="{{$data['studentFees']->amount}}">
                                                    <input type="hidden" name="assignFeesId" value="{{$data['assignFees']->id}}">

                                                    <button class="btn-sm btn-primary">Received</button>
                                                </form>
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    @else
                                    <tbody>
                                        <tr class="text-center">
                                            <td>No Fees Assigned</td>
                                        </tr>
                                    </tbody>
                                    @endif
                                </table>
                               </tr>
                               @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </main>

    <div class="hidden-reciet" style="display:none">
        <div id="payment-reciept"></div>
    </div>
@endsection

@push('js')
    <script>
        function feesShow(month)
        {
            location.replace(`/school/finance/student/{{$data['student']->id}}/${month}/fee`)
        }

        $("#paymentRecivedForm").submit(function(e){
            e.preventDefault();
            
            $.ajax({
                url: "{{route('school.finance.fees.received')}}",
                type: "POST",
                data: $("#paymentRecivedForm").serialize(),
                success: function(resp){
                    // console.log(resp);
                    $("#payment-reciept").html(resp.data.html);
                    printDiv("payment-reciept");
                    location.reload();                    
                },
                error: function(error){
                    console.log(error);
                    alert(error.responseJSON.message);
                }
            })
        });


        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
