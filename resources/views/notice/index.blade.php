<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notice Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        ::-webkit-input-placeholder {
            font-style: italic;
            font-size: 1em;
            color: mintcream;
            text-align: right;
        }
        .nav-pills .nav-link.active{
            background-color: black;
            color: white;
        }
        /* #showAll::-webkit-scrollbar {
            display: none;
        } */
        #showSingle::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body>
 
    <div class="row w-100">
        <div class="col-md-12 mb-2 p-4 bg-primary text-white" style="margin-left: 12px;">
            <h1 class="d-inline" style=" margin-bottom:  100px; font-size: 40px;">{{ $school->school_name }}</h1>
            {{-- <h2 class="d-inline float-end" style="font-size: 27px;"> {{ $todayDate }}</h2>  --}}
            {{-- <h2 class="text-end" style="font-size: 17px;">{{ $day }} </h2>  --}}
            @if (count($results) > 0)
                <a class="d-inline float-end result" style="font-size: 35px; color: white; margin-right: 10px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#resultLogin"> <i class="fa-solid fa-right-to-bracket"></i> </a> 
            @endif
        </div>

        {{-- navbar Start
            <nav class="navbar navbar-expand-lg navbar-light bg-primary mb-2" style="margin-left: 12px; height: 60px;">
                <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                    @if (count($results) > 0)
                    <li class="nav-item">
                        <a class="nav-link btn bg-light text-dark result" id="v-pills-home-tab" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" data-bs-toggle="modal" data-bs-target="#resultLogin" style="padding: 6px 13px; margin: 8px;">Result</a>
                    </li>
                    @endif
                    </ul>
                </div>
                </div>
            </nav>
        navbar end --}}

         {{-- Left Side Bar Notice and Result --}}
        
            {{-- <div class="col-md-2">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link notice" id="v-pills-home-tab"  type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Notice</button>
                    <span class="border border-info mt-2 mb-2"></span>
                    <button class="nav-link" id="v-pills-home-tab" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" data-bs-toggle="modal" data-bs-target="#resultLogin">Result</button>
                    </div>
                </div>
            </div> --}}

        {{-- Left Side Bar Notice and Result --}}

        <div class="{{-- col-md-8  --}} bg-dark p-0 fs-2 text-white " style="width: 72%; margin-left: 37px;">
            <div class=" mb-2 bg-dark d-none" id="showSingle" style="height: 520px; overflow-y: auto;">
                <div class="tab-content d-flex justify-content-center" id="v-pills-tabContent">
                    @foreach ($notices as $notice )
                        <p class="tab-pane fade m-4" id="notice{{ $notice->id }}" role="tabpanel" aria-labelledby="v-pills-home-tab">{{ $notice->description }}</p>
                    @endforeach
                </div>
            </div>

            <div id="showAll" style="height: 520px; overflow-y: auto">
                <div class="mb-2 d-flex justify-content-center">
                    <p class="m-4">{{ $noticeFirst?->description }}</p>
                </div>
            </div>
        </div>

        <div {{-- class="col-md-3" --}} style="width: 25%;">
            {{-- <div class="col-md-12"> --}}
                {{-- <div class="d-flex  flex-wrap align-items-start"> --}}
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <h6 class="" style="font-size: 20px; margin-left: auto"> {{ $todayDate }}</h6> 
                        @foreach ($notices as $key => $notice )
                            <button class="nav-link border topicNotice"  id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#notice{{ $notice->id }}" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" style="text-align: left; border-radius: 0px;"><i class="bi bi-bell-fill"></i> {{ $notice->topic }}</button>
                        @endforeach
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="resultLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <i class="fa fa-user" style="font-size: 40px;" aria-hidden="true"></i>
                <h3 class="text-center m-3">Student Login</h3>
                <form id="resultLoginForm" action="{{ route('student.login') }}" target="_blank" method="POST">
                    @csrf
                    <div class="mb-3 d-flex justify-content-center">
                        <i class="fa fa-user-circle fa-lg" style="margin-top: 18px; margin-right: 252px; position: absolute; color:#d9dbde;" aria-hidden="true"></i>
                        <input type="text" class="form-control text-center" style="width: 300px;" name="studentId" placeholder="Student ID" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <i class="fa fa-key fa-lg" style="margin-top: 21px; margin-right: 252px; position:absolute; color:#d9dbde;" aria-hidden="true"></i>
                        <input type="password" class="form-control text-center" style="width: 300px;" name="password" placeholder="Password" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="btn btn-outline-dark h-25 loginbtn" style="width: 300px;">Login</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    {{-- Modal End --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Auto Scroll Start
<script>
    const autoScroll=()=>{
        var showAll = document.getElementById("showAll");
        showAll.scrollBy(0,1);
        if($(showAll).scrollTop() + $(showAll).innerHeight() >= $(showAll)[0].scrollHeight) {
            $('#showAll').scrollTop(0)
        }

        let scrolldelay=setTimeout(autoScroll, 55)
    }
    autoScroll();
</script>

<script>
    const singleautoScroll= ()=>{
       var singleScroll = document.getElementById("showSingle");
        singleScroll.scrollBy(0, 1);
       if ($(singleScroll).scrollTop() + $(singleScroll).innerHeight() >= $(singleScroll)[0].scrollHeight) {
        $("#showSingle").scrollTop(0);
       }
       let scrolldelay = setTimeout(singleautoScroll, 55);
    }
    singleautoScroll();
    // setInterval(singleautoScroll , 10);
    
</script>
Auto Scroll End --}}
<script>
    $(document).ready(function() {
        $(".topicNotice").on("click", function() {
            $("#showAll").addClass("d-none");
            $("#showSingle").removeClass("d-none");
        });

        $(".notice").on("click", function() {
            $("#showSingle").addClass("d-none");
            $("#showAll").removeClass("d-none");
        });
        $('.result').on("click", function() {
            $("#resultLoginForm").trigger('reset');
            $("#resultLogin").modal('show');
        });

        $('.loginbtn').on('click', function() {
            $("#resultLogin").modal('hide');
        })
    });
    </script>
</body>
</html>