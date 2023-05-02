@extends('layouts.school.master')

@section('content')



<main class="page-content">

<div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 row-cols-xl-4 row-cols-xxl-4 g-3">
                        <div class="col">
                                <a href="{{route('teacher.salary.Show')}}">
                                    <div class="card radius-10 bg-tiffany mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-person-check-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$teacherSalary}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Total Teacher Salary')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="{{route('teacher.salary.Show')}}">
                                    <div class="card radius-10 bg-info mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-person-check-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$teacherPaidSalary}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Total Teacher Salary Paid')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="{{route('teacher.salary.Show')}}">
                                    <div class="card radius-10 bg-orange mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-person-check-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$teacherSalary-$teacherPaidSalary}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Total Teacher Salary Due')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                          
                            <a href="{{route('school.staff.salary.List')}}">
                                <div class="col">
                                    <div class="card radius-10 bg-purple mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-people-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$StaffSalary}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Staff Salary')}} </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="{{route('school.staff.salary.List')}}">
                                <div class="col">
                                    <div class="card radius-10 bg-info mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-people-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$StaffPaidSalary}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Staff Salary Paid')}} </p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="{{route('school.staff.salary.List')}}">
                                <div class="col">
                                    <div class="card radius-10 bg-orange mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-people-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$StaffSalary - $StaffPaidSalary}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Staff Salary Due')}} </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('expense.show')}}">
                                <div class="col">
                                    <div class="card radius-10 bg-purple mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-file-earmark-check-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$Expense}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Total Expense')}}</p>
                                        </div>
                                    </div>
                                </div>   
                            </a>
                                                  
                        
                            <a href="{{route('school.finance.students')}}">
                                <div class="col">
                                    <div class="card radius-10 bg-success mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-tags-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$TotalFees}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Total Student Fee')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                            <div class="col">
                                <a href="{{route('school.finance.students')}}">
                                    <div class="card radius-10 bg-orange mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-chat-left-quote-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$colected}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Collected Fee')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="{{route('school.finance.students')}}">
                                    <div class="card radius-10 bg-purple mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-hdd-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$due}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Due Fee')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col">
                                <a href="{{route('fund.show')}}">
                                    <div class="card radius-10 bg-success mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-wallet"></i>                                            
                                            </div>
                                            <h3 class="text-white">{{$sumFund}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Fund Receive')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div> 
                            
                            <div class="col">
                                <a href="#">
                                    <div class="card radius-10 bg-secondary mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-hdd-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$accesories}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Accesories')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col">
                                <a href="#">
                                    <div class="card radius-10 bg-purple mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-hdd-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{$profit}}</h3>
                                            <p class="mb-0 text-white">{{__('app.Total Profit')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
           
        </div><!--end row-->
</main>

@endsection