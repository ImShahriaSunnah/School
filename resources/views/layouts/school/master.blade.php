<!doctype html>
<?php
    use Illuminate\Support\Carbon;

    $i = 1; 
?>
<html lang="en" class=" {{  (Auth::user()->color == 0) ? 'light-theme' : 'dark-theme'  }}">


<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('schools/assets/images/favicon-32x32.png')}}" type="image/png" />
    <link href="{{ asset('schools/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!--plugins-->
    <link href="{{asset('schools/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

    <!-- Toastr style -->
    <link href="{{ asset('assets/admin/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Bootstrap CSS -->
    <link href="{{asset('schools/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link href="{{asset('schools/assets/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    {{-- <link rel="{{asset('schools/')}}stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css"> --}}

    <!-- loader-->
    <link href="{{asset('schools/assets/css/pace.min.css')}}" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="{{asset('schools/assets/css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/light-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/header-colors.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/style.css')}}" rel="stylesheet" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>{{isset($seo_array['seoTitle']) ? $seo_array['seoTitle'] : "CC School | CodeCell LTD" }}</title>
    <meta name="description" content="{{isset($seo_array['seoDescription']) ? $seo_array['seoDescription'] : "CC School | CodeCell LTD" }}">
    <meta name="keywords" content="{{isset($seo_array['seoKeyword']) ? $seo_array['seoKeyword'] : "CC School | CodeCell LTD" }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    @stack('css')

    <style>
        .nav-link{
            display: inline;
        }
    </style>

</head>

<body>
    <!--start wrapper-->
    <?php
        use Illuminate\Support\Facades\Request;
        $date = Carbon::parse(Auth::user()->created_at);
        $now = Carbon::now();
        
        $diff = $date->diffInDays($now);
        $data = 38 - $diff;
    ?>

    <!-- modal -->

    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar d-none d-xl-block">
                    <ul class="navbar-nav align-items-center">

                    </ul>
                </div>
                <div class="search-toggle-icon d-xl-none ms-auto">
                    <i class="bi bi-search"></i>
                </div>
                <div class="searchbar d-none d-xl-flex ms-auto">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"></div>

                    @if(workPlace(Auth::user()->id)->price_id == 0)

                    {{-- <h5 style="color:red;">{{$diff}} DAYS FREE TRIAL</h5>--}}
                    @else
                    @endif

                </div>
                <div class="dropdown bg-primary rounded">
                    <a class="btn btn-sm dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        EN/বাং
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('change.language', 'bn')}}">Bangla</a></li>
                        <li><a class="dropdown-item" href="{{route('change.language', 'en')}}">English</a></li>
                    </ul>
                </div>

                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center" style="padding: 0 10px;">
                                    <div class="user-name d-none d-sm-block mt-50" style="margin-top: 9px;">
                                        <h5 style="background-color:#3361FF;color: #f1f1f1;border-radius: 50%; height: 25px;
                                          width: 25px;text-align: center;">{{substr(Auth::user()->school_name, 0, 1)}} </h5>
                                    </div>

                                    <div class="">{{Auth::user()->school_name}}</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                    {{-- <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{Auth::user()->school_name}}</h6>

                                                <small class="mb-0 dropdown-user-designation text-secondary">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li> --}}
                                <li>
                                    <a class="dropdown-item" href="{{route('school.profile')}}">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{Auth::user()->school_name}}</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">{{__('app.School')}} {{__('app.Profile')}}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    @if (workPlace()->price_id == 0)
                                        <a class="dropdown-item" href="{{route('school.package.after')}}">
                                            <div class="d-flex align-items-center">
                                                <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                                <div class="setting-text ms-3"><span>{{__('app.All')}} {{__('app.Package')}}</span></div>
                                            </div>
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{route('school.payment.info')}}">
                                            <div class="d-flex align-items-center">
                                                <div class="setting-icon"><i class="fadeIn animated bx bx-money"></i></div>
                                                <div class="setting-text ms-3"><span>{{__('app.Paynow')}}</span></div>
                                            </div>
                                        </a>
                                    @endif
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{route('school.payment.status')}}">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>{{__('app.Account')}} {{__('app.Status')}}</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" target="_blank" href="{{route('show.notice')}}">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-bell"></i></div>
                                            <div class="setting-text ms-3"><span>{{__('app.Notice')}}</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('logout') }}" class="btn btn-light" onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">{{ __('app.Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <div class="setting-text ms-3">

                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

    <!--start sidebar -->
    <aside class="sidebar-wrapper">
        <div class="iconmenu">
            <div class="nav-toggle-box">
                <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
            </div>
            <ul class="nav nav-pills flex-column" style="align-items: center">
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.dashboard')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-mdashboards" type="button"><i class="bi bi-house-door-fill"></i></button>
                    <br> {{__('app.dashboard')}}
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Class')}} / {{__('app.Section')}} / {{__('app.Group')}} / {{__('app.Department')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-class" type="button"><i class="bi bi-card-list"></i></button>
                    <br> {{__('app.Class')}}
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Teacher')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-teacher" type="button"><i class="bi bi-person-fill"></i></button>
                    <br> {{__('app.Teacher')}}
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Student')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-student" type="button"><i class="bi bi-people-fill"></i></button>
                    <br> {{__('app.Student')}}
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Attendance')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-attentdance" type="button"><i class="bi bi-person-check-fill"></i></button>
                    <br>{{__('app.Attendance')}} 
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Finance')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-finance" type="button"><i class="fadeIn animated bx bx-credit-card-front"></i></button>
                    <br>{{__('app.Finance')}}
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Stuff')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-staff" type="button"><i class="bi bi-person-bounding-box"></i></button>
                    <br>{{__('app.Stuff')}}
                </li>
                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.SMS')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-sms" type="button"><i class="fadeIn animated bx bx-comment-detail"></i></button>
                    <br>{{__('app.SMS')}}
                </li>

                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Exam')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-exam" type="button"><i class="fadeIn animated bx bx-book-content"></i></button>
                    <br>{{__('app.Exam')}} 
                </li>

                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Result')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-result" type="button"><i class="fadeIn animated bx bx-book-content"></i></button>
                    <br>{{__('app.Result')}}
                </li>

                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Setting')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-settings" type="button"><i class="fadeIn animated bi bi-gear"></i></button>
                    <br>{{__('app.Setting')}}
                </li>

                <li class="nav-item mb-2 text-center" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('app.Library')}}">
                    <button class="nav-link mb-0" data-bs-toggle="pill" data-bs-target="#pills-library" type="button"><i class="lni lni-slideshare"></i></button>
                    <br>{{__('app.Library')}}
                </li>
            </ul>
        </div>
        <div class="textmenu">
            <div class="brand-logo">
                {{-- <h6>{{Auth::user()->school_name}}<br> --}}
                <button class="btn btn-danger btn-sm" style="font-size: 12px;">
                    {{90-$diff}} days left
                </button>
                </h6>
            </div>
            <div class="tab-content">

                {{-- Dashboard --}}
                <div class="tab-pane fade <?php if ((Request::segment(1) == 'school' and Request::segment(2) == 'dashboard') OR (Request::segment(2) == 'online' AND Request::segment(3) == 'admission')) {
                                                echo 'active show';
                                            } ?>" id="pills-mdashboards">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.dashboard')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}}</small>
                        </div>
                        <div>
                            <a href="{{route('school.dashboard')}}" class="list-group-item  @if (Auth::user()->color == 1) text-light @else text-dark @endif "><i class="fadeIn animated bi bi-speedometer"></i>{{__('app.dashboard')}}</a>
                            <a href="{{route('online.Admission.Form', Auth::user()->unique_id)}}" class="list-group-item"><i class="lni lni-grid-alt"></i>{{__('app.feater1a')}} {{__('app.Admission')}}</a>
                            <a href="{{route('online.Admission.Form.list')}}" class="list-group-item"><i class="lni lni-grid-alt"></i>{{__('app.Admission')}} {{__('app.Request')}}</a>
                        </div>
                    </div>
                </div>

                {{-- Class / Section / Group / Period / routine / syllabus / subject --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' 
                and (Request::segment(2) == 'class' or Request::segment(2) == 'section' or Request::segment(2) == 'group' or Request::segment(2) == 'subject' or Request::segment(2) == 'department' or Request::segment(2) == 'routine' or Request::segment(2) == 'period' OR Request::segment(2) == 'syllabus' or Request::segment(2) == 'FormShowPost')) {
                                                echo 'active show';
                                            } ?>" id="pills-class">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Class')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}}</small>
                        </div>
                        <a href="{{route('class.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-id-card"></i>{{__('app.Class')}} {{__('app.Show')}}</a>
                        <a href="{{route('section.show')}}" class="list-group-item"><i class="lni lni-slideshare"></i>{{__('app.Section')}} {{__('app.Show')}}</a>
                        <a href="{{route('group.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-network-chart"></i>{{__('app.Group')}} {{__('app.Show')}}</a>
                        {{-- <a href="{{route('department.show')}}" class="list-group-item"><i class="lni lni-control-panel"></i>Show Department</a> --}}
                        <a href="{{route('period.index')}}" class="list-group-item"><i class="lni lni-notepad"></i>{{__('app.Class')}} {{__('app.Period')}}</a>
                        <a href="{{route('routine.index')}}" class="list-group-item"><i class="lni lni-notepad"></i> {{__('app.Class')}}{{__('app.Routine')}}</a>
                        <a href="{{route('syllabus.form.show')}}" class="list-group-item"><i class="lni lni-notepad"></i>{{__('app.Class')}} {{__('app.Syllabus')}}</a>
                        <a href="{{route('subject.index')}}" class="list-group-item"><i class="lni lni-library"></i> {{__('app.Subject')}} {{__('app.Show')}}</a>
                    </div>
                </div>

                {{-- Teacher --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' and Request::segment(2) == 'teacher') {
                                                echo 'active show';
                                            } ?>" id="pills-teacher">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Teacher')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}}</small>
                        </div>
                        <a href="{{route('teacher.Show')}}" class="list-group-item"><i class="fadeIn animated bx bx-street-view"></i>{{__('app.Teacher')}} {{__('app.Show')}} </a>
                        {{--<a href="{{route('teacher.create')}}" class="list-group-item"><i class="bi bi-cast"></i>create Teacher</a>--}}
                        <a href="{{route('assign.teacher.create.show')}}" class="list-group-item"><i class="lni lni-consulting"></i>{{__('app.Assign')}} {{__('app.Class')}} {{__('app.Teacher')}}</a>
                    </div>
                </div>

                {{-- Student --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' 
                and Request::segment(2) == 'student' 
                and Request::segment(3) == 'create' 
                    or Request::segment(3) == 'edit' 
                    or Request::segment(3) == 'studentshow' 
                    or (Request::segment(3) == 'student' and Request::segment(4) == 'singleShow') 
                    or Request::route()->getName() == 'student.find') {
                                                echo 'active show';
                                            } ?>" id="pills-student">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Student')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}}</small>
                        </div>
                        {{-- <a href="{{route('student.create')}}" class="list-group-item"><i class="bi bi-cast"></i>Student Create</a>--}}
                        <a href="{{route('student.teacher.create.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-user-circle"></i>{{__('app.Student')}} {{__('app.Show')}}</a>
                        <a href="{{route('student.create')}}" class="list-group-item"><i class="fadeIn animated bx bx-user-plus"></i>{{__('app.Student')}} {{__('app.Create')}}</a>
                        {{-- <a href="{{route('student.upload')}}" class="list-group-item"><i class="fadeIn animated bx bx-user-plus"></i>{{__('app.Student')}} {{__('app.Upload')}}</a> --}}
                        {{-- <a href="{{route('id.Card')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>Student Id Card</a> --}}

                    </div>
                </div>

                {{-- Attendance --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' 
                and Request::segment(2) == 'student' 
                and ((Request::segment(3) == 'attendanceshow') 
                    or (Request::segment(3) == 'all' and Request::segment(4) == 'attendanceshow') 
                    or (Request::segment(3) == 'attendance' and Request::segment(4) == 'attendanceshow'))) {
                                                echo 'active show';
                                            } ?>" id="pills-attentdance">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Student')}} {{__('app.Attendance')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}}</small>
                        </div>
                        @if (!is_null(Auth::user()->zk_ip_address))
                        <a href="javascript::" onclick="if(confirm('*** Please, Ensure that your fingerprint device is running! ***')){ location.replace('{{route('get.attendance.device')}}') }" class="list-group-item"><i class="fadeIn animated bi bi-hdd-rack"></i> {{__('app.Attendance')}} {{__('app.Get')}}</a>
                        @endif
                        <a href="{{route('student.attendance.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-user-voice"></i>{{__('app.Student')}} {{__('app.Attendance')}}</a>
                        {{-- <a href="{{route('student.attendance.show.date')}}" class="list-group-item"><i class="fadeIn animated bx bx-food-menu"></i>{{__('app.Show Attendance')}}</a> --}}
                        <a href="{{route('student.attendance.show.date.all')}}" class="list-group-item"><i class="fadeIn animated bx bx-clipboard"></i>{{__('app.All')}} {{__('app.Attendance')}}</a>
                        
                        <a href="javascript::" data-bs-target="#attendance-upload-modal" data-bs-toggle="modal" class="list-group-item">
                            <i class="fadeIn animated bx bx-list"></i>{{__('app.upload_attendance')}}
                        </a>
                    </div>
                </div>

                {{-- Finance --}}
                <div class="tab-pane fade 
                    @if ( (Request::segment(1) == 'school' or Request::segment(1) == 'receipt' or Request::segment(1) == 'accesories' )
                        and ((Request::segment(2) == 'finance' and (Request::segment(3) == 'dashboard' or Request::segment(3) == 'fees' or Request::segment(3) == 'student'))
                            or (Request::segment(2) == 'assign' and Request::segment(3) == 'fees')
                            or (Request::segment(2) == 'staff-salary' and Request::segment(3) == 'teacher' and Request::segment(4) == 'add' and Request::segment(5) == 'salary')
                            or (Request::segment(2) == 'bankadd' and Request::segment(3) == 'create') 
                            or (Request::segment(2) == 'student' and Request::segment(3) == 'finance' and (Request::segment(4) == 'expense' or Request::segment(4) == 'fund') and Request::segment(5) == 'create')
                            or Request::segment(2) == 'show'
                            or Request::segment(2) == 'create'
                            or Request::route()->getName() == "school.finance.find.student.fee")
                    
                            // (Request::segment(1) == 'school' and Request::segment(2) == 'finance' and Request::segment(3) == 'dashboard')
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'finance' and Request::segment(3) == 'fees')
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'assign' and Request::segment(3) == 'fees')
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'finance' and Request::segment(3) == 'student' )
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'staff-salary' and Request::segment(3) == 'teacher' and Request::segment(4) == 'add' and Request::segment(5) == 'salary')
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'bankadd' and Request::segment(3) == 'create')
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'student' and Request::segment(3) == 'finance' and Request::segment(4) == 'expense')
                            // OR (Request::segment(1) == 'school' and Request::segment(2) == 'student' and Request::segment(3) == 'finance' and Request::segment(4) == 'fund')
                            // OR (Request::segment(1) == 'receipt' and Request::segment(2) == 'show')
                            // OR (Request::route()->getName() == "school.finance.find.student.fee")
                        )
                        'active show';
                    @endif" id="pills-finance">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Finance')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}}</small>
                        </div>
                        {{-- <a href="{{route('student.fees.create')}}" class="list-group-item"><i class="bi bi-cast"></i>Student Fees Create</a>--}}
                        <a href="{{route('school.finance.dashoboard')}}" class="list-group-item"><i class="fadeIn animated bx bx-door-open"></i>{{__('app.dashboard')}}</a>
                        <a href="{{route('school.finance.fees.index')}}" class="list-group-item"><i class="fadeIn animated bx bx-door-open"></i>{{__('app.School')}} {{__('app.Fees')}}</a>
                        <a href="{{route('school.finance.assign.fees.index')}}" class="list-group-item"><i class="fadeIn animated bx bx-door-open"></i>{{__('app.Assign')}} {{__('app.Fees')}}</a>
                        <a href="{{route('school.finance.students')}}" class="list-group-item"><i class="fadeIn animated bx bx-receipt"></i>{{__('app.Student')}} {{__('app.List')}}</a>
                        <a href="{{route('school.staff.salary.List')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>{{__('app.Stuff')}} {{__('app.Salery')}}</a>
                        <a href="{{route('teacher.salary.Show')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>{{__('app.Teacher')}} {{__('app.Salery')}}</a>

                        <a href="{{route('bankadd')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>{{__('app.BankAccount')}}</a>
                        <a href="{{route('expense.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>{{__('app.Expenses')}}</a>
                        <a href="{{route('fund.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>{{__('app.Funds')}}</a>
                        <a href="{{route('reciept.create')}}" class="list-group-item"><i class="fadeIn animated bx bx-credit-card-alt"></i>{{__('app.Accessories')}} {{__('app.Receit')}}</a>

                    </div>
                </div>


                {{-- Staff --}}
                <div class="tab-pane fade @if(Request::segment(1) == 'school' and Request::segment(2) == 'staff') active show @endif " id="pills-staff">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Stuff')}} </h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}} </small>
                        </div>

                        <a href="{{route('school.staff.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-accessibility"></i>{{__('app.Stuff')}}  {{__('app.Type')}} </a>
                        {{-- <a href="{{route('school.staff.create')}}" class="list-group-item"><i class="bi bi-cast"></i>Staff Type create</a>--}}
                        <a href="{{route('school.staff.List')}}" class="list-group-item"><i class="fadeIn animated bx bx-male"></i>{{__('app.Stuff')}} {{__('app.List')}} </a>
                        {{-- <a href="{{route('school.staff.List.create')}}" class="list-group-item"><i class="bi bi-cast"></i>Staff Create</a>--}}

                    </div>
                </div>

                {{-- SMS --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' and Request::segment(2) == 'send' and Request::segment(3) == 'sms' and (Request::segment(4) == 'teacher' or Request::segment(4) == 'student')) {
                                                echo 'active show';
                                            } ?>" id="pills-sms">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.SMS')}} </h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard1')}} </small>
                        </div>

                        <a href="{{route('send.sms.teacher')}}" class="list-group-item"><i class="fadeIn animated bx bx-message-rounded-detail"></i>{{__('app.SMS')}} {{__('app.Teacher')}}</a>
                        <a href="{{route('send.sms.student')}}" class="list-group-item"><i class="fadeIn animated bx bx-message-rounded-add"></i>{{__('app.SMS')}} {{__('app.Student')}}</a>
                        <a href="{{route('send.sms.employee')}}" class="list-group-item"><i class="fadeIn animated bx bx-message-rounded-add"></i>{{__('app.SMS')}} {{__('app.Employee')}}</a>

                        <a href="{{route('school.message')}}" class="list-group-item"><i class="fadeIn animated bx bx-message-rounded-add"></i>{{__('app.SMS')}} {{__('app.Purchase')}}</a>

                    </div>
                </div>

                {{-- Exams --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' and Request::segment(2) == 'term' or Request::segment(3) == 'exam' or Request::segment(3) == 'create/question') {
                                                echo 'active show';
                                            } ?>" id="pills-exam">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Exam')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard')}}</small>
                        </div>


                        <a href="{{route('term.index')}}" class="list-group-item"><i class="fadeIn animated bi bi-list"></i>{{__('app.Exam')}} {{__('app.Terms')}}</a>
                        <a href="{{route('exam.routine.create')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Exam')}} {{__('app.Routine')}} {{__('app.Create')}}</a>
                        <a href="{{route('create.question.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Question')}} {{__('app.Create')}}</a>
                        <a href="{{route('show.question')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Question')}} {{__('app.Show')}}</a>

                    </div>
                </div>

                {{-- Result --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' 
                and (Request::segment(2) == 'student' or Request::segment(2) == 'sms') 
                and (Request::segment(3) == 'notice' 
                    or Request::segment(3) == 'result' 
                    or Request::segment(3) == 'mark' 
                    or Request::segment(3) == 'class' 
                    or (Request::segment(3) == 'show' and Request::segment(4) == 'class' and Request::segment(5) == 'wise' and Request::segment(6) == 'result') 
                    or (Request::segment(3) == 'all' and Request::segment(4) == 'result' and Request::segment(5) == 'data' and Request::segment(6) == 'show'))) {
                                                echo 'active show';
                                            } ?>" id="pills-result">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Result')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard')}}</small>
                        </div>
                        <a href="{{route('result.school.admin.create.show.all')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Result')}}</a>
                        <a href="{{route('sms.result')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Result')}} {{__('app.SMS')}}</a>
                        <a href="{{route('notice.school.admin.create.show')}}" class="list-group-item"><i class="fadeIn animated bx bx-pie-chart-alt"></i>{{__('app.Notice')}}</a>
                        <a href="{{route('show.mark.type')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Mark')}} {{__('app.Type')}}</a>
                        <a href="{{route('class.wise.result')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Result_Show')}}</a>
                        
                    </div>
                </div>


                {{-- Settings --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' and Request::segment(2) == 'settings') {
                                                echo 'active show';
                                            } ?>" id="pills-settings">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Setting')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard')}}</small>
                        </div>

                        <a href="{{route('settings')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Class')}}</a>
                        <a href="{{route('device.index')}}" class="list-group-item"><i class="fadeIn animated bi bi-fingerprint"></i>{{__('app.FingerprintDevice')}}</a>
                    </div>
                </div>

                {{-- Library --}}
                <div class="tab-pane fade <?php if (Request::segment(1) == 'school' 
                    and Request::segment(2) == 'library' or Request::segment(2) == 'borrowerinfo' or Request::segment(2) == 'borrowerCreate' or Request::segment(2) == 'borrowerEdit') 
                    {
                        echo 'active show';
                    } ?>" id="pills-library">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0">{{__('app.Library')}}</h5>
                            </div>
                            <small class="mb-0">{{__('app.dashboard')}}</small>
                        </div>

                        <a href="{{route('books.create')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Book')}} {{__('app.Info')}}</a>
                        <a href="{{route('borrowerinfo')}}" class="list-group-item"><i class="fadeIn animated bx bx-task-x"></i>{{__('app.Borrower')}} {{__('app.Info')}}</a>
                    </div>
                </div>

            </div>

        </div>
    </aside>


    @yield('content')

    @include('modals.attendance_form')

    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="#" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
        <form method="post" action="{{route('user.update.post.color')}}" enctype="multipart/form-data">
            @csrf
            @if(Auth::user()->color == 0)
            <input type="hidden" name="color" value="1">
            <button class="btn btn-dark btn-switcher shadow-sm" type="submit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="lni lni-night"></i> <br><span>Dark</span> </button>
            @else
            <input type="hidden" name="color" value="0">
            <button class="btn btn-light btn-switcher" type="submit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="background-color: #f1f1f1;color: black;"><i class="lni lni-sun"></i><br><span>light</span></button>
            @endif
        </form>
    </div>
    <!--end switcher-->

    </div>
    <!--end wrapper-->

<!-- Bootstrap bundle JS -->
{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap bundle JS -->
<script src="{{ asset('schools/assets/js/bootstrap.bundle.min.js')}}"></script>

<!--plugins-->
<script src="{{ asset('schools/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('schools/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('schools/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('schools/assets/js/pace.min.js')}}"></script>
<script src="{{ asset('schools/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('schools/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('schools/assets/js/table-datatable.js')}}"></script>

{{-- Select2 js --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".js-select").select2({
        placeholder: "Select One",
        allowClear: true,
        width: "100%"
    });
</script>

@stack('js')
<script src="{{ asset('schools/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<!--app-->
<script src="{{ asset('schools/assets/js/app.js')}}"></script>
<script src="{{ asset('schools/assets/js/index5.js')}}"></script>

@include('sweetalert::alert')

</body>
</html>
