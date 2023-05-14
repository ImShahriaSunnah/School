@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        

        <div class="col-xl-12 mx-auto">
            <!-- nav-tab -->
            <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">
            <div class="card">
                <div class="card-header">
                    <center><h3 class="mt-2 mb-2">Student Fees  </h3></center>
                    <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" data-bs-toggle="tab"
                                href="#Profile">Fees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Fees">Fees List</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="Profile">

                        <table class="table table-bordered table-hover w-100">
                            <tbody>
                               <tr>
                                <td width="25%">Student Name</td>
                                <td>{{$data['student']->name}}</td>
                                <td rowspan="5" class="text-center" width="25%">
                                    @if(File::exists(public_path($data['student']->image)))
                                    <img src="{{asset($data['student']->image)}}" alt="{{$data['student']->name}}" width="200" height="200">
                                    @else
                                    <img src="{{asset('d/no-img.jpg')}}" alt="{{$data['student']->name}}" width="200" height="200">
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

                                <form action="{{route('student.school.scholarship',$data['student']->id)}}" method="post">
                                    @method('put')
                                    @csrf
                                    <tr>
                                        <td>scholarship</td>

                                        <td class="row">
                                            <div class="col-2">
                                                @if ($data['student']->scholarship == 1)
                                                <span class="badge bg-secondary">Normal</span>
                                                @elseif($data['student']->scholarship == 2)
                                                <span class="badge bg-primary text-light">Half Free</span>
                                                @elseif($data['student']->scholarship == 0)
                                                <span class="badge bg-success text-light">Full Free</span>
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                <select  class="form-control mb-3 js-select" name="scholarship" class="form-select">
                                                    <option value="">Select One</option>
                                                    <option value="1" {{($data['student']->scholarship == 1) ? 'selected' : ''}}>Normal</option>
                                                    <option value="2" {{($data['student']->scholarship == 2) ? 'selected' : ''}}>Half Free</option>
                                                    <option value="0" {{($data['student']->scholarship == 0) ? 'selected' : ''}}>Full Free</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-primary" type="submit" style="border-radius:7px;">Update</button>
                                            </div>
                                            
                                        </td>
                                        <td></td>
                                    </tr>
                                </form>

                                {{-- <tr>
                                    <td>Scholarship</td>
                                    <td class="col-2">
                                        @if ($data['student']->scholarship == 1)
                                        <span class="badge bg-warning">Normal</span>
                                        @elseif($data['student']->scholarship == 2)
                                        <span class="badge bg-success text-light">Half Free</span>
                                        @elseif($data['student']->scholarship == 0)
                                        <span class="badge bg-success text-light">Full Free</span>
                                        @endif
                                    </td>
                                    <td class="col-2">

                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" class="dropdown-toggle btn btn-sm btn-info text-nowrap" id="dropdownId">
                                                Change Scholarship
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true"
                                                class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownId">
                                                <ul class="nav flex-column">
                                                    @if ($data['student']->scholarship != 1)
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="javascript::"
                                                                onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('scholarship.status', [$data['student']->id, 1])}}'); }">
                                                                <i class="nav-link-icon fa fa-handshake"></i>
                                                                <span>Normal</span>
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if ($data['student']->scholarship != 2)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="javascript::"
                                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('scholarship.status', [$data['student']->id, 2])}}'); }">
                                                            <i class="nav-link-icon fa fa-handshake"></i>
                                                            <span>Half Free</span>
                                                        </a>
                                                    </li>
                                                    @endif

                                                    @if ($data['student']->scholarship != 0)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="javascript::"
                                                            onclick="if(confirm('Are you sure? you are changing the status of this record')){ location.replace('{{route('scholarship.status', [$data['student']->id, 0])}}'); }">
                                                            <i class="nav-link-icon fa fa-ban"></i>
                                                            <span>Full Free</span>
                                                        </a>
                                                    </li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}


                                <tr>
                                    <td>Select Month</td>
                                    <td class="row">
                                        <form action="{{route('school.finance.history')}}" method="post" id="getPaymentFeeForm">
                                            @csrf
                                            <input type="hidden" name="studentId" value="{{$data['student']->id}}">
                                            <select  class="form-control js-select" name="month[]" class="form-select" multiple>
                                                <option value="">Select One</option>
                                                @foreach ($data['months'] as $key => $month)
                                                    <option value="{{$key}}" @isset(request()->month) {{(request()->month == $key) ? 'selected' : ''}}  @endisset>{{$month}}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn-sm btn-primary">Get</button>
                                        </form>
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
                                        <tr>
                                            <td width="70%">Monthly Fee</td>
                                            @if($data['student']->scholarship == 2) {{-- Half Payment --}}
                                                <td class="text-end">৳ {{$monthlyFee /2}}</td>
                                            @elseif ($data['student']->scholarship == 1) {{-- Full Payment --}}
                                                <td class="text-end">৳ {{$monthlyFee }}</td>
                                            @else 
                                                <td class="text-end">৳ 0</td> {{-- Full Schoolarship --}}
                                            @endif
                                        </tr>
                                        @php
                                            $sum = 0;                 
                                        @endphp
                                        
                                        @if(is_array($data['assignFees']['fees_details']))
                                            @foreach ($data['assignFees']['fees_details'] as $key => $item)
                                                <tr>
                                                    <td width="70%">{{Str::title($key)}}</td>
                                                    <td class="text-end">৳ {{$item}}</td>
                                                </tr>

                                                @php
                                                    $sum += $item;
                                                    
                                                @endphp
                                                
                                            @endforeach
                                        @else
                                            @foreach (json_decode($data['assignFees']['fees_details']) as $key => $item)
                                                <tr>
                                                    <td width="70%">{{Str::title($key)}}</td>
                                                    <td class="text-end">৳ {{$item}}</td>
                                                </tr>
                                                @php
                                                    $sum += $item;                                                    
                                                @endphp
                                            @endforeach
                                        @endif
                                        <tr class="text-end">
                                            <td>In Total: </td>
                                            @if($data['student']->scholarship == 2)
                                                <td>৳ {{$sum + ($monthlyFee /2)}}</td>
                                            @elseif ($data['student']->scholarship == 1)
                                                <td>৳ {{$sum + $monthlyFee }}</td>
                                            @else 
                                            <td>৳ {{$sum}}</td>
                                            @endif
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
                                                <form action="{{url('/school/finance/payment/receive')}}" method="post" id="paymentRecivedForm">
                                                    @csrf
                                                    <input type="hidden" name="studentId" value="{{$data['student']->id}}">
                                                    <input type="hidden" name="monthId" value="{{$data['month']}}">
                                                    <input type="hidden" name="amount" value="{{$data['studentFees']->amount}}">
                                                    <input type="hidden" name="assignFeesId" value="{{$data['assignFees']->id}}">

                                                    <button class="btn-sm btn-primary" id="receivebtn">Received</button>
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
                    <!-- Fees -->
                    <div class="tab-pane " id="Fees">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Status</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($studentMonthlyFees as $studentMonthlyFee)
                                    <tr >
                                        <td>{{ $studentMonthlyFee->month_name }}</td>
                                        <td>{{ $studentMonthlyFee->amount }} <svg style="width: 10px;"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path
                                                    d="M36 32.2C18.4 30.1 2.4 42.5 .2 60S10.5 93.6 28 95.8l7.9 1c16 2 28 15.6 28 31.8V160H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H64V384c0 53 43 96 96 96h32c106 0 192-86 192-192V256c0-53-43-96-96-96H272c-17.7 0-32 14.3-32 32s14.3 32 32 32h16c17.7 0 32 14.3 32 32v32c0 70.7-57.3 128-128 128H160c-17.7 0-32-14.3-32-32V224h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H128V128.5c0-48.4-36.1-89.3-84.1-95.3l-7.9-1z" />
                                            </svg></td>
                                        @if ($studentMonthlyFee->status == 2)
                                            <td><button class="btn btn-success"> Paid </button></td>
                                        @else
                                            <td><button class="btn btn-danger">Due</button></td>
                                        @endif
                                    </tr>
                                @endforeach
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
        var j = $("#paymentRecivedForm").serialize();
        $.ajax({
            url: "{{url('/school/finance/payment/receive')}}",
            type: "POST",
            data: $("#paymentRecivedForm").serialize(),
            success: function(resp){
                $("#payment-reciept").html(resp.html);
                printDiv("payment-reciept");
                location.reload();
            },
            error: function(error){
                Swal.fire({
                    title: "Try Later",
                    text: 'Have Some Problem. Please Try Again Later.',
                    inputPlaceholder: 'Nombre',
                });
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
