<!doctype html>
<html lang="en" class="light-theme">


<!-- Mirrored from codervent.com/skodash/demo/tabular-menu/ltr/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Nov 2021 20:17:08 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('schools/assets/images/favicon-32x32.png')}}" type="image/png" />
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
    <link href="{{asset('schools/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="{{asset('schools/')}}stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{asset('schools/assets/css/pace.min.css')}}" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="{{asset('schools/assets/css/dark-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/light-theme.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/semi-dark.css')}}" rel="stylesheet" />
    <link href="{{asset('schools/assets/css/header-colors.css')}}" rel="stylesheet" />

    <title>{{isset($seo_array['seoTitle']) ? $seo_array['seoTitle'] : "CC School | CodeCell LTD" }}</title>
    <meta name="description" content="{{isset($seo_array['seoDescription']) ? $seo_array['seoDescription'] : "CC School | CodeCell LTD" }}">
    <meta name="keywords" content="{{isset($seo_array['seoKeyword']) ? $seo_array['seoKeyword'] : "CC School | CodeCell LTD" }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>


<!--start wrapper-->
<div class="col-md-12">
    <!--start top header-->
    <!--start content-->
    <div class="col-md-12">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">STUDENT ATTENDANCE  STATEMENT</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <div class="btn-group mt-3">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{url('/school')}}" class="btn btn-sm btn-outline-success me-2">Home</a>
                            <button onclick="history.back()" class="btn btn-sm btn-secondary me-2">Go Back</button>
                            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-danger"><i class="bi bi-printer-fill"></i>Export as PDF</a>
                        </li>

                    </ol>
                    </div>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

       <?php $student_id = 9; ?>
        <div class="card border shadow-none">
            <div class="card-header py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-lg-6">
                        <h5 class="mb-0">{{Auth::user()->school_name}}</h5>
                        <h6 class="mb-0">{{Auth::user()->phone_number}}<br>
                            {{Auth::user()->address}}</h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        @if (File::exists(public_path(Auth::user()->school_logo)) && !is_null(Auth::user()->school_logo))
                        <img src="{{asset(Auth::user()->school_logo)}}" alt="school logo" class="img-fluid" width="80" style="width:100px; height:80px;">
                        @endif
                        <div class="text-center">
                            <h4 style="margin-bottom: 0px;"> {{ strtoupper(Auth::user()->school_name) }} </h4>
                            {{-- <p style="margin-bottom: 0px;"> {{ Auth::user()->address }} </p> --}}
                            <h6 class="mb-0" style="margin-bottom: 0px;">{{Auth::user()->phone_number}}<br>
                                {{Auth::user()->address}}</h6>
                            <h5>Receipt</h5>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 text-md-end">
                    </div>
                </div>
            </div>
            <div class="card-header py-2 bg-light">
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col">
                        <div class="">
                            <small>to</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse">{{Auth::user()->school_name}}</strong><br>
                                Class Name: {{isset( getClassName( $class_id )->id) ? getClassName($class_id)->class_name : 'No' }} <br>
                                Section Name: {{isset( getSectionName( $section_id )->id) ? getSectionName($section_id)->section_name : 'No' }}<br>
                                Group Name: {{isset( getSectionName( $group_id )->id) ? getSectionName($group_id)->group_name : 'No' }}<br>
                            </address>
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <small>Attendance / {{$date}} </small>
                            <div class=""><b>{{date("F j, Y, g:i a")}} (Download Time)</b></div>
                            <div class="invoice-detail">
                                Full Attendance Details<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-invoice">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Roll Number</th>
                            <th>Phone Number</th>
                            <th>Attendance</th>
                            <th>{{__('app.date')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataAttendance as $key => $data)
                        <tr>
                            <td>
                                <span class="text-inverse">{{$key++ +1}}</span><br>
                            </td>
                            <td>
                                <span class="text-inverse">{{getUserName($data->student_id)->name}}</span><br>
                            </td>
                            <td>
                                <span class="text-inverse">{{getUserName($data->student_id)->roll_number}}</span><br>
                            </td>
                            <td>
                                <span class="text-inverse">{{getUserName($data->student_id)->phone}}</span><br>
                            </td>
                            <td>
                                <span class="text-inverse">{{($data->attendance == 1 ) ? 'Present' : 'Absent'}}</span><br>
                            </td>
                            <td >{{$date}}</td>
                        </tr>
                       @endforeach

                        </tbody>
                    </table>
                </div>

                <hr>
                <!-- begin invoice-note -->
                <div class="my-3">
                    * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br>
                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                </div>
                <!-- end invoice-note -->
            </div>

            <div class="card-footer py-3">
                <p class="text-center mb-2">
                    THANK YOU FOR YOUR SUPPORT
                </p>
                <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                    <span class=""><i class="bi bi-globe"></i> {{Auth::user()->school_name}}</span>
                    <span class=""><i class="bi bi-telephone-fill"></i> Phone:{{Auth::user()->phone_number}}</span>
                    <span class=""><i class="bi bi-envelope-fill"></i> {{Auth::user()->email}}</span>
                </p>
            </div>
        </div>

    </div>
    <!--end page main-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <h6 class="mb-0">Theme Variation</h6>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
                    <label class="form-check-label" for="LightTheme">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                    <label class="form-check-label" for="DarkTheme">Dark</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
                    <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
                    <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
                </div>
                <hr/>
                <h6 class="mb-0">Header Colors</h6>
                <hr/>
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator headercolor1" id="headercolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor2" id="headercolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor3" id="headercolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor4" id="headercolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor5" id="headercolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor6" id="headercolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor7" id="headercolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor8" id="headercolor8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->

</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

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




<script src="{{ asset('schools/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<!--app-->
<script src="{{ asset('schools/assets/js/app.js')}}"></script>
<script src="{{ asset('schools/assets/js/index5.js')}}"></script>
{{--<!--app-->--}}
{{--<script src="{{ asset('schools/assets/js/app.js')}}"></script>--}}
@stack('js')


</body>


<!-- Mirrored from codervent.com/skodash/demo/tabular-menu/ltr/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Nov 2021 20:17:08 GMT -->
</html>

