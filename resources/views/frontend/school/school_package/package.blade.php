@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            @foreach(\App\Models\Price::all() as $messagePackage)
                <div class="col-xl-3">
                    <form role="form" action="{{ route('school.package.after.post') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$messagePackage->id}}" name="message_package_id">
                        <div class="card radius-10 {{( ($loop->iteration % 2) == 0) ? 'bg-pink': 'bg-orange'}}">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-1 text-white">School Package {{$loop->iteration}}</p>
                                        <h4 class="mb-0 text-white">{{$messagePackage->name}} </h4>
                                    </div>
                                    <div class="ms-auto fs-2 text-white">
                                        <i class="fadeIn animated bx bx-money"></i>
                                    </div>
                                </div>
                                <hr class="my-2 border-top border-light">
                                <div class="d-flex justify-content-between text-center">
                                    <hr class="my-2 border-top border-light">
                                    <small class="mb-0 text-white"><span><p class="mb-1 text-white">Student Size</p>  {{$messagePackage->student}}</span></small>
                                    <small class="mb-0 text-white"><span><p class="mb-1 text-white">Teacher Size</p>  {{$messagePackage->teachers}}</span></small>
                                    <small class="mb-0 text-white"><span><p class="mb-1 text-white">Message Size</p>  {{$messagePackage->message}}</span></small>
                                </div>

                                <br>
                                <hr>
                                <div class="">
                                    <h4 class="mb-0 text-white text-center">{{$messagePackage->price}} Taka</h4>
                                </div>
                                <hr>
                                <div class="col text-center">

                                    <button type="submit" class="btn btn-outline-primary px-5 rounded-0 text-light">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                        Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            @endforeach
        </div>
    </main>

@endsection
