@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <style>
        .card-hover:hover {
            background-color: #07e5f5;
            cursor: pointer;
}

    </style>
    <main class="page-content">
        <div class="card">
            <div class="card-body">
              <h3 class="text-center">Setting Your Result System</h3>
            </div>
          </div>
        <div class="row">
            <div class="col-lg-4 ">
                <div class="card rounded card-hover" style="width: 17rem;height:220px">
                    <div class="card-body text-center hover-overlay" style="padding-top: 80px">
                      <div> <i class="bi bi-plus-square-fill " style="font-size: 45px;"></i></div>
                      <div>
                        <h5 style="color:white">Input Your Result Information</h5>
                      </div>
                     
                    </div>
                  </div>
            </div>
            <div class="col-lg-4">
              <div class="card rounded" style="width: 17rem;height:220px">
                <div class="card-body text-center hover-overlay">
      
                  <div style="margin-right: -180px;">
                    <div class="dropdown">
                      <button class=" btn " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: none;border:none;">
                        <i class="bi bi-three-dots" style="font-size: 20px;"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                  <div style="margin-top: 20px"> <i class="bi  bi-postcard" style="font-size: 50px;"></i></div>
                  <div>
                    <h5 >1st term result</h5>
                    <p >Date:7/12/2023</p>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              
            </div>
            {{-- <div class="col-lg-3"></div> --}}
        </div>
    </main>


@endsection