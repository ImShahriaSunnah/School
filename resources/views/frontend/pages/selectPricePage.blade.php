@extends('frontend.layouts.app')
@section('main')
    @push('css')
        <style>
            input[type="radio"] {
                display: none;
                &:not(:disabled) ~ label {
                 
             }
                &:disabled ~ label {
                    color: hsla(150, 5%, 75%, 1);
                    border-color: hsla(150, 5%, 75%, 1);
                    box-shadow : 0 0 5px 1px;                 
                }
            }
            label {
                height: 100%;
                display: block;
                background: white;
                border-radius: 20px;
                cursor: pointer;
                padding: 1rem;
                box-shadow : 0 3px 3px 1px;
                /* margin-bottom: 1rem; */
                /* margin: 1rem; */
                text-align: center;
              
                position: relative;
            }
            input[type="radio"]:checked + label {
                background: hsla(300, 90%, 92%,1);
                color: hsla(215, 0%, 100%, 1);
              
            &::after {
                 color: hsla(215, 5%, 25%, 1);
                 font-family: FontAwesome;
                 border: 2px solid hsla(150, 75%, 45%, 1);
                 content: "\f00c";
                 font-size: 24px;
                 position: absolute;
                 /* top: -25px; */
                 left: 50%;
                 
                 transform: translateX(-50%);
                 height: 50px;
                 width: 50px;
                 line-height: 50px;
                 text-align: center;
                 border-radius: 50%;
                 background: white;                 
             }
            }
          

            p {
                font-weight: 900;
            }


            @media only screen and (max-width: 700px) {
                section {
                    flex-direction: column;
                }
            }

        </style>


        <style>
            .price__title-height{
                padding: 0px !important;
                min-height: 60vh;
            }
        </style>
    @endpush
    <!-- pricing area start -->

    <section class="page__title-area price__title-height d-flex align-items-center fix p-relative z-index-1 clip__path" data-background="{{ asset('frontend/assets/img/page-title/page-title.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <h2 class="section__title section__title-2 text-light">The best work solution <br> for the best price. </h2>
                    <p class=" text-light">100% Money Back Guarantee</p>
                    <span class="section__pre-title bg-white text-dark">Price</span>
                </div>
            </div>
        </div>
    </section>


    <section class="my-5 py-5">
        
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 wow fadeInUp" style="margin-bottom: 50px" data-wow-delay=".3s">
                    {{-- <div class="services__inner services__inner-2 hover__active mb-30">
                        <div class="services__item-2 transition-3">                                
                            <div class="services__content-2">
                                <input class="services__content__input" type="radio" id="control_03" name="select" value="0">
                                <label for="control_03">
                                    <h2>Free Trial</h2>
                                </label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card shadow" style="border-radius: 20px">
                        <div class="card-body px-5">
                            <div class="services__icon-2 text-center">
                                <img src="{{ asset('frontend/assets/img/icon/services/home-2/services-2.png')}}" alt="">
                            </div>

                            <div class="text-center">
                                <h4>Starter</h4>
                                <h5>Free</h5>

                                <ul class="list-unstyled my-3 fw-bolder">
                                    <li>Student : 20</li>
                                    <li>Teacher : 20</li>
                                    <li>Message : 10</li>
                                </ul>

                                <form method="post" action="{{route('selectPrice.post')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="hidden" name="select" value="0">
                                    <button class="btn__bg text-light">
                                        Get Started
                                        <i class="fas fa-long-arrow-alt-right ms-2 fs-6"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="services__inner services__inner-2 hover__active mb-30">
                        <div class="services__item-2 transition-3">
                            <div class="services__icon-2 text-center">
                                <img src="{{ asset('frontend/assets/img/icon/services/home-2/services-2.png')}}" alt="">
                            </div>
                            <div class="services__content-2">
                                <input class="services__content__input" type="radio" id="control_03" name="select" value="0">
                                <label for="control_03">
                                    <h2>Free Trial</h2>
                                </label>
                            </div>
                        </div>
                    </div>
                </div> --}}
                @foreach($price as $key => $data)
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 wow fadeInUp" style="margin-bottom: 50px" data-wow-delay=".3s">
                    {{-- <div class="services__inner services__inner-2 hover__active mb-30">
                        <div class="services__item-2 transition-3">
                            <div class="services__icon-2 text-center">
                                <img src="{{ asset('frontend/assets/img/icon/services/home-2/services-2.png')}}" alt="">
                            </div>
                            <div class="services__content-2">
                                <input class="services__content__input" type="radio" id="control_0{{$loop->iteration}}" name="select" value="{{$data->id}}" >
                                <label for="control_0{{$loop->iteration}}">
                                    <h2>{{$data->name}}</h2>
                                    <h5>{{$data->price}}</h5>
                                    <p>Student : {{$data->student}}</p>
                                    <p>Teachers : {{$data->teachers}}</p>
                                    <p>Message : {{$data->message}}</p>
                                </label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card shadow" style="border-radius: 20px">
                        <div class="card-body px-5">
                            <div class="services__icon-2 text-center">
                                <img src="{{ asset('frontend/assets/img/icon/services/home-2/services-2.png')}}" alt="">
                            </div>

                            <div class="text-center">
                                <h4>{{$data->name}}</h4>
                                <h5>{{$data->price}} BDT</h5>

                                <ul class="list-unstyled my-3 fw-bolder">
                                    <li>Student : {{$data->student}}</li>
                                    <li>Teacher : {{$data->teachers}}</li>
                                    <li>Message : {{$data->message}}</li>
                                </ul>

                                <form method="post" action="{{route('selectPrice.post')}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="hidden" name="select" value="{{ $data->id }}">
                                    <button class="btn__bg text-light">
                                        Get Started
                                        <i class="fas fa-long-arrow-alt-right ms-2 fs-6"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
