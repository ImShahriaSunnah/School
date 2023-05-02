@extends('layouts.school.master')
@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{__('app.dashboard')}}</div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                   <form class="row g-3" method="post" action="{{route('send.fees.due.sms')}}" enctype="multipart/form-data">
                       @csrf
                       <button type="submit" class="btn btn-primary">{{__('app.dashboard1btn')}}</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">{{__('app.dashboard1btn')}}</button>
                   </form>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->


        <div class="row">
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 g-3">
                            <div class="col">
                               <a href="{{route('student.teacher.create.show')}}">
                                    <div class="card radius-10 bg-tiffany mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-file-earmark-break-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{CountUser()}}</h3>
                                            <p class="mb-0 text-white">{{__('app.student')}}</p>
                                        </div>
                                    </div>
                               </a>
                            </div>
                            <div class="col">
                                <a href="{{route('teacher.Show')}}">
                                    <div class="card radius-10 bg-success mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-hdd-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{CountTeacher()}}</h3>
                                            <p class="mb-0 text-white">{{__('app.teacher')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <div class="card radius-10 bg-danger mb-0">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <h3 class="text-white">{{totalDuefeature()}}</h3>
                                        <p class="mb-0 text-white">{{__('app.t3')}} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 bg-dark mb-0">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                            <i class="bi bi-file-earmark-check-fill"></i>
                                        </div>
                                        <h3 class="text-white">{{MonthlyIncome()}}</h3>
                                        <p class="mb-0 text-white">{{__('app.t4')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 bg-purple mb-0">
                                    <div class="card-body text-center">
                                        <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                            <i class="bi bi-tags-fill"></i>
                                        </div>
                                        <h3 class="text-white">0</h3>
                                        <p class="mb-0 text-white">{{__('app.t5')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <a href="{{route('student.attendance.show.date')}}">
                                    <div class="card radius-10 bg-orange mb-0">
                                        <div class="card-body text-center">
                                            <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                                                <i class="bi bi-chat-left-quote-fill"></i>
                                            </div>
                                            <h3 class="text-white">{{DailyAttendence()}}</h3>
                                            <p class="mb-0 text-white">{{__('app.t6')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent">
                        <div class="row g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">{{__('app.Status1')}}</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent p-3">
                        <div class="row row-cols-1 row-cols-lg-2 g-3 align-items-center">
                            <div class="col">
                                <h5 class="mb-0">{{__('app.Status2')}}</h5>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center justify-content-sm-end gap-3 cursor-pointer">
                                    <div class="font-13"><i class="bi bi-circle-fill text-info"></i><span class="ms-2">{{__('app.Status3')}}</span></div>
                                    <div class="font-13"><i class="bi bi-circle-fill text-orange"></i><span class="ms-2">{{__('app.Status4')}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="chart5"></div>
                    </div>
                </div>
            </div>
{{--            <div class="col-12 col-lg-12 col-xl-6 d-flex">--}}
{{--                <div class="card radius-10 w-100">--}}
{{--                    <div class="card-header bg-transparent">--}}
{{--                        <div class="row g-3 align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h5 class="mb-0">Statistics</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">--}}
{{--                                    <div class="dropdown">--}}
{{--                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-menu">--}}
{{--                                            <li><a class="dropdown-item" href="javascript:;">Action</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <hr class="dropdown-divider">--}}
{{--                                            </li>--}}
{{--                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div id="chart2"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="project-date">
                                <p class="mb-0 font-13">July 2, 2020</p>
                            </div>

                        </div>
                        <div class="text-center my-3">
                            <h6 class="mb-0">{{__('app.Status5')}} </h6>
                        </div>
                        <?php
                        $messageAccount =  getMessageAccount();
                        ?>
                        <div class="my-2">
                            <p class="mb-1 font-13">Usages {{$messageAccount['dataProcessBar']}} / {{$messageAccount['total']}} </p>
                            <div class="progress radius-10" style="height:5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$messageAccount['cssProcessBar']}}%"></div>
                            </div>
                            <p class="mb-0 mt-1 font-13 text-end"></p>
                        </div>
                        <div class="d-flex align-items-center mt-5">
                            <div class="project-user-groups">
                                <a href="{{route('school.message.post.checkout.show')}}" class="py-1 px-3 radius-30 bg-light-primary text-primary ms-auto">{{__('app.Status7')}} </a>
                            </div>
                            <a href="{{route('school.message')}}" class="py-1 px-3 radius-30 bg-light-primary  ms-auto">{{__('app.Status8')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <!--end page main-->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('app.SendSms')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('send.fees.due.sms')}}">
                    @csrf
                    <div class="modal-body">
                    {{__('app.sure')}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('app.no')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('app.yes')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection

@push('js')
    <script>
        $(function() {
            "use strict";
            var datas  = <?php echo json_encode($datas);?>
          //




// chart 1
            var options = {
                series: [{
                    name: "Users",
                    data: datas
                }],
                chart: {
                    foreColor: '#9a9797',
                    type: "bar",
                    //width: 130,
                    height: 270,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    dropShadow: {
                        enabled: 0,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: .12,
                        color: "#3461ff"
                    },
                    sparkline: {
                        enabled: !1
                    }
                },
                markers: {
                    size: 0,
                    colors: ["#3461ff", "#12bf24"],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: {
                        size: 7
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "40%",
                        endingShape: "rounded"
                    }
                },
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: -20
                },
                dataLabels: {
                    enabled: !1
                },
                grid: {
                    show: false,
                    // borderColor: '#eee',
                    // strokeDashArray: 4,
                },
                stroke: {
                    show: !0,
                    // width: 3,
                    curve: "smooth"
                },
                colors: ["#12bf24"],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function (val) {
                            return "" + val + ""
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();


// chart 2
            var options = {
                series: [{
                    name: "Users",
                    data: [450, 650, 440, 160]
                }],
                chart: {
                    foreColor: '#9a9797',
                    type: "bar",
                    //width: 130,
                    height: 270,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    dropShadow: {
                        enabled: 0,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: .12,
                        color: "#12bf24"
                    },
                    sparkline: {
                        enabled: !1
                    }
                },
                markers: {
                    size: 0,
                    colors: ["#12bf24"],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: {
                        size: 7
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: 1,
                        columnWidth: "20%",
                        columnHeight: "20%",
                        endingShape: "rounded"
                    }
                },
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: -20
                },
                dataLabels: {
                    enabled: !1
                },
                grid: {
                    show: false,
                    // borderColor: '#eee',
                    // strokeDashArray: 4,
                },
                stroke: {
                    show: !0,
                    // width: 3,
                    curve: "smooth"
                },
                //colors: ["#12bf24"],
                xaxis: {
                    categories: ["Visitors", "Subscribers", "Contributor", "Author"]
                },
                tooltip: {
                    theme: 'dark',
                    y: {
                        formatter: function (val) {
                            return "" + val + ""
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();






// chart 3

            var options = {
                series: [89, 45, 35, 62],
                chart: {
                    width: 340,
                    type: 'donut',
                },
                labels: ["Visitors", "Subscribers", "Contributor", "Author"],
                colors: ["#3361ff", "#e72e2e", "#12bf24", "#ff6632"],
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: -20
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            height: 260
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart3"), options);
            chart.render();




            // chart 4

            var options = {
                series: [68],
                chart: {
                    foreColor: '#9ba7b2',
                    height: 280,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        //startAngle: -130,
                        //endAngle: 130,
                        hollow: {
                            margin: 0,
                            size: '82%',
                            //background: '#fff',
                            image: undefined,
                            imageOffsetX: 0,
                            imageOffsetY: 0,
                            position: 'front',
                            dropShadow: {
                                enabled: false,
                                top: 3,
                                left: 0,
                                blur: 4,
                                color: 'rgba(0, 169, 255, 0.15)',
                                opacity: 0.65
                            }
                        },
                        track: {
                            background: '#dfecff',
                            //strokeWidth: '67%',
                            margin: 0, // margin is in pixels
                            dropShadow: {
                                enabled: false,
                                top: -3,
                                left: 0,
                                blur: 4,
                                color: 'rgba(0, 169, 255, 0.85)',
                                opacity: 0.65
                            }
                        },
                        dataLabels: {
                            showOn: 'always',
                            name: {
                                offsetY: -25,
                                show: true,
                                color: '#6c757d',
                                fontSize: '16px'
                            },
                            value: {
                                formatter: function (val) {
                                    return val + "%";
                                },
                                color: '#000',
                                fontSize: '45px',
                                show: true,
                                offsetY: 10,
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: 'horizontal',
                        shadeIntensity: 0.5,
                        gradientToColors: ['#3361ff'],
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    }
                },
                colors: ["#3361ff"],
                labels: ['mc'],
            };

            var chart = new ApexCharts(document.querySelector("#chart4"), options);
            chart.render();



// chart 5
           var incomeDatas  = <?php echo json_encode($incomeDatas, JSON_NUMERIC_CHECK);?>;
           var exDatas  = <?php echo json_encode($exDatas, JSON_NUMERIC_CHECK);?>

            var optionsLine = {
                chart: {
                    foreColor: '#9ba7b2',
                    height: 275,
                    type: 'line',
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: false
                    },
                    dropShadow: {
                        enabled: true,
                        top: 3,
                        left: 2,
                        blur: 4,
                        opacity: 0.1,
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ["#32bfff", '#ff6632'],
                series: [{
                    name: "Income",
                    data: incomeDatas
                }, {
                    name: "Expense",
                    data: exDatas
                }],
                markers: {
                    size: 4,
                    strokeWidth: 0,
                    hover: {
                        size: 7
                    }
                },
                grid: {
                    show: true,
                    padding: {
                        bottom: 0
                    }
                },
                //labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002'],
                xaxis: {
                    //type: 'datetime',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    offsetY: -20
                }
            }
            var chartLine = new ApexCharts(document.querySelector('#chart5'), optionsLine);
            chartLine.render();






        });
    </script>
@endpush

