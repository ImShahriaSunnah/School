@extends('frontend.layouts.app')
@section('main')
@push('css')
<style>

    .custom-choose
    {
        display: flex;
        justify-content: normal;
        align-items: center;
    }
    .custom-choose input[type='radio'],.custom-choose input[type='checkbox']
    {
        display: none;
    }
    .custom-choose input[type='radio'] + label,.custom-choose input[type='radio']:not(checked) + label
    ,.custom-choose input[type='checkbox'] + label,.custom-choose input[type='checkbox']:not(checked) + label
    {
        padding: 10px 28px;
        border: solid 2px #4444;
        border-radius: 35px;
        text-align: center;
        font-size: 12px;
        margin-right: 31px;
        box-shadow: 0 5px 7px rgb(123 104 238 / 50%);
        transition: .4s;

    }
    .custom-choose input[type='radio']:checked + label,
    .custom-choose input[type='checkbox']:checked + label
    {
        position: relative;
        border: solid 2px #5F3AFC;
        background: #5F3AFC;
        color: #FFF;
        transition: .4s;

    }
    .custom-choose input[type='radio']:checked + label::before,
    .custom-choose input[type='checkbox']:checked + label::before
    {
        content:'✓';
        position: absolute;
        left: 16px;
    }

    .labelHover:hover {
        border: solid 2px #5F3AFC!important;
        background: #5F3AFC;
        color: #FFF;
        padding: 10px 35px!important;

    }




</style>
@endpush
    <!-- pricing area start -->

    <section id="iLoveYou" class="price__area grey-bg pt-105 pb-90 bg-image">
    <div class="hero__shape">

               <img class="hero-circle-2" src="{{ asset('frontend/assets/img/icon/hero/home-1/circle-2.png') }}" alt="">
               <img class="hero-triangle-1" src="{{ asset('frontend/assets/img/icon/hero/home-1/triangle-1.png') }}" alt="">
               <img class="hero-triangle-2" src="{{ asset('frontend/assets/img/icon/hero/home-1/triangle-2.png') }}" alt="">
            </div>
        <div class="container">
            <form method="post" action="{{route('acquisition.post')}}" enctype="multipart/form-data">
                @csrf
            <section id="one" >
                <div class="row align-items-center">

                    <div class="col-xxl-7 col-xl-6 col-lg-6">
                        <div class="hero__content pr-80">
{{--                            <h2 class="hero__title wow fadeInUp" data-wow-delay=".3s">Creative Saas Design Software.</h2>--}}
                            <img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt="">
                            <p style="margin-bottom: 0px;">Welcome to <span class="fw-bolder"> {{Auth::user()->school_name}}</span> 🙌<br>
                            Our mission is to make you more Productive.<br>
                            This will only take a minute</p><br>
                            <div class="hero__search wow fadeInUp" data-wow-delay=".7s">
                               <a onclick="acquisitionHandler('blurWorkplace')" href="#two" class="w-btn w-btn-2" style="position: relative; top: 20px">Let's do it</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6 col-lg-6">
                       <img class="price__area__imageRight" src="{{ asset('frontend/assets/img/acquisition/layer.png') }}" alt="">
                    </div>
                </div>
            </section>

            <section class="position-relative" id="two" style="margin-top: 50px;">
                <div class="row align-items-end mt-5">

                    <div class="col-xxl-5 col-xl-6 col-lg-6">
                        <div class="hero__thumb text-start ml-220">
                            <div class="faq__content">
                                <div class="section__title-wrapper section__title-wrapper-2 mb-35 wow fadeInUp" data-wow-delay=".3s">
                                    {{-- <h2 class="section__title section__title-2">Loved and trusted by over 40k+ users!</h2>
                                    <p>Over the last few years, podcasts have become a huge deal. They’ve taken on a growing role.</p> --}}

                                    {!! acquisition()->hero_thumb !!}
                                </div>
                            </div>
                        </div>

                        <div class="hero__content pr-80">
                            <h4 class="hero__title wow fadeInUp" data-wow-delay=".3s" style="font-size: 25px;"><img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt=""> Name Your Workplace</h4>
                            <div class="hero__search wow fadeInUp" data-wow-delay=".7s">

                                <input class="shadow-lg" type="text" placeholder="Enter your Workplace.." name="workspace_name" value="{{Auth::user()->school_name}}"><br>
                                <a onclick="acquisitionHandler('studentSection')" href="#three" class="w-btn w-btn-2 shadow-lg" style="position: relative; top: 20px">Next</a>

                            </div>
                        </div>

                    </div>

                    <div class="col-xxl-7 col-xl-6 col-lg-6" >
                        <div style="margin-top: -168px" class="faq__counter wow fadeInUp" data-wow-delay=".7s">
                        <h4 class="hero__title wow fadeInUp" data-wow-delay=".3s" style="font-size: 25px;"><img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt=""> Why You Choose Us ?</h4>
                            <ul>
                                <li>
                                    <h3 class="pink"><span class="counter">{{ acquisition()->happy_clients }}</span></h3>
                                    <p>Happy Clients</p>
                                </li>
                                <li>
                                    <h3 class="blue"><span class="counter">{{ acquisition()->projects }}</span></h3>
                                    <p>Projects</p>
                                </li>
                                <li>
                                    <h3 class="yellow"><span class="counter">{{ acquisition()->trusted_users }}</span></h3>
                                    <p>Trusted Users</p>
                                </li>
                            </ul>



                        </div>
                    </div>

                </div>
                <div id="blurWorkplace" class="blur blurWorkplace"></div>
            </section>

            <section id="three" class="position-relative mb-5" style="margin-top: 70px;">
            <div class="hero__shape">

              <img class="hero-triangle-1" src="{{ asset('frontend/assets/img/acquisition/shape-1.png') }}" alt="">

              <img class="hero-circle-2" src="{{ asset('frontend/assets/img/acquisition/shape-2.png') }}" alt="">
           </div>
                <div class="row align-items-center">
                    <div class="col-xxl-12">
                        <div class="hero__content pr-80">
                            <div class="container pt-5 pb-5">
                                <div class="mb-3">
                                    <h3> <img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt=""> Your Workplace Student Size Near About</h3>
                                </div>
                                <div class="custom-choose mb-3">
                                    <input type="radio" id="opt-1" value="1-25" name="student">
                                    <label class="labelHover" style="cursor: pointer" for="opt-1">
                                        1-25
                                    </label>
                                    <input type="radio" id="opt-2" value="1-50" name="student">
                                    <label class="labelHover" style="cursor: pointer" for="opt-2">
                                        1-50
                                    </label>
                                    <input type="radio" id="opt-3" value="1-100" name="student">
                                    <label class="labelHover" style="cursor: pointer" for="opt-3">
                                        1-100
                                    </label>
                                    <input type="radio" id="opt-4" value="1-150" name="student">
                                    <label class="labelHover" style="cursor: pointer" for="opt-4">
                                        1-150
                                    </label>
                                    <input type="radio" id="opt-5" value="1-250" name="student">
                                    <label class="labelHover" style="cursor: pointer" for="opt-5">
                                        1-250
                                    </label>
                                    <input type="radio" id="opt-6" value="250-5000" name="student">
                                    <label class="labelHover" style="cursor: pointer" for="opt-6">
                                        More than All
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="studentSection" class="blur"></div>
            </section>

            <section class="position-relative" id="four" style="margin-top: 70px;">
                <div class="row align-items-center">
                   <div class="col-xxl-12">
                        <div class="hero__content pr-80">
                            <div class="container pt-5 pb-5">
                                <div class="mb-3">
                                    <h3><img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt="">Your Workplace Teacher Size Near About</h3>
                                </div>
                                <div class="custom-choose mb-3">
                                    <input type="radio" id="opt-11" value="1-25" name="teachers" required>
                                    <label class="labelHover" style="cursor: pointer" for="opt-11">
                                        1-25
                                    </label>
                                    <input type="radio" id="opt-21" value="1-50" name="teachers" required>
                                    <label class="labelHover" style="cursor: pointer" for="opt-21">
                                        1-50
                                    </label>
                                    <input type="radio" id="opt-31" value="1-100" name="teachers" required>
                                    <label class="labelHover" style="cursor: pointer" for="opt-31">
                                        1-100
                                    </label>
                                    <input type="radio" id="opt-41" value="1-150" name="teachers" required>
                                    <label class="labelHover" style="cursor: pointer" for="opt-41">
                                        1-150
                                    </label>
                                    <input type="radio" id="opt-51" value="1-250" name="teachers" required>
                                    <label class="labelHover" style="cursor: pointer" for="opt-51">
                                        1-250
                                    </label>
                                    <input type="radio" id="opt-61" value="250-1000" name="teachers" required>
                                    <label class="labelHover" style="cursor: pointer" for="opt-61">
                                        More than All
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blur blurclick"></div>
            </section>

            <section class="position-relative" id="five" style="margin-top: 70px;">
                <div class="row align-items-center">

                    <div class="col-xxl-12">
                        <div class="hero__content pr-80">
                            <div class="container pt-5 pb-5">
                                <div class="mb-3">
                                    <h3><img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt="">How did you hear about us</h3>
                                </div>
                                <div class="custom-choose mb-3">
                                    <input type="radio" id="opt-111" value="Search Engine (Google,Bing,etc)" name="hear_us">
                                    <label class="labelHover" style="cursor: pointer" for="opt-111">
                                        Search Engine (Google,Bing,etc)
                                    </label>
                                    <input type="radio" id="opt-211" value="Google Ads" name="hear_us">
                                    <label class="labelHover" style="cursor: pointer" for="opt-211">
                                        Google Ads
                                    </label>
                                    <input type="radio" id="opt-311" value="Facebook Ads" name="hear_us">
                                    <label class="labelHover" style="cursor: pointer" for="opt-311">
                                        Facebook Ads
                                    </label>
                                    <input type="radio" id="opt-411" value="Youtube Ads" name="hear_us">
                                    <label class="labelHover" style="cursor: pointer" for="opt-411">
                                        Youtube Ads
                                    </label>
                                    <input type="radio" id="opt-511" value="Social Media" name="hear_us">
                                    <label class="labelHover" style="cursor: pointer" for="opt-511">
                                        Social Media
                                    </label>
                                    <input  type="radio" id="opt-611" value="Others" name="hear_us">
                                    <label class="labelHover" style="cursor: pointer" for="opt-611">
                                        Others
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blur blurAbout blurTeacher"></div>
            </section>

           <section class="position-relative" style="margin-top: 70px; margin-left: 25px;">
                    <div class="row align-items-center">

                        <div class="col-xxl-7 col-xl-6 col-lg-6">
                            <div class="hero__content pr-80">
                                {{--                            <h2 class="hero__title wow fadeInUp" data-wow-delay=".3s">Creative Saas Design Software.</h2>--}}
                                <h3><img class="hero-circle" src="{{ asset('frontend/assets/img/favicon.png') }}" alt="">It's time to start</h3>
                                {{-- <p style="margin-bottom: 0px;">One More Step Left ,Now go and change the World <br>
                                    And don't Forget to have fun 🙌</p> --}}
                                    {!! acquisition()->hero_content !!}
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-6>
                            <div class="hero__content pr-80">
                                <div class="hero__search wow fadeInUp" data-wow-delay=".7s">
                                    <button type="submit" class="w-btn w-btn-2">Let's Start with Shikka</button>
                                </div>
                            </div>
                        </div>
                    <div id="playShikka" class="blur"></div>
                </section>

    </form>


        </div>
    </section>
@endsection
