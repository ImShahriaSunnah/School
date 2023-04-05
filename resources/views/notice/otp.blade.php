<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP</title>
    <meta name="description" content="{{isset($seo_array['seoDescription']) ? $seo_array['seoDescription'] : "CC School | CodeCell LTD" }}">
   <meta name="keywords" content="{{isset($seo_array['seoKeyword']) ? $seo_array['seoKeyword'] : "CC School | CodeCell LTD" }}">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
   <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">

   <!-- CSS here -->
   @include('frontend.partials.style')
   @stack('css')
</head>
<body>
    <main>
        <!-- sign up area start -->
        <section class="signup__area po-rel-z1 pt-100 pb-145 bg__otp">
            <div class="sign__shape">
                <img class="man-1" src="assets/img/icon/sign/man-3.png" alt="">
                <img class="man-2 man-22" src="assets/img/icon/sign/man-2.png" alt="">
                <img class="circle" src="assets/img/icon/sign/circle.png" alt="">
                <img class="zigzag" src="assets/img/icon/sign/zigzag.png" alt="">
                <img class="dot" src="assets/img/icon/sign/dot.png" alt="">
                <img class="bg" src="assets/img/icon/sign/sign-up.png" alt="">
                <img class="flower" src="assets/img/icon/sign/flower.png" alt="">
            </div>
            <div class="container">
                <!-- <div class="row">
                    <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
                        <div class="page__title-wrapper text-center mb-55">
                            <h2 class="page__title-2">Create a free <br> Account</h2>
                            <p>I'm a subhead that goes with a story.</p>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div style="padding: 15px 70px" class="sign__wrapper white-bg shadow-lg">
                            <div class="sign__header mb-35">

                            </div>

                            <div class="text-center pb-4">
                                <h2 class="text-center fw-bold">Let's Start</h2>
                                <img style="width: 150px" src="{{ asset('frontend/assets/img/otp/validate-email.png') }}" alt="">

                            </div>
                            <div class="pt-4">
                                <h5> We just Send you</h5>
                                <p>Please enter the code we Send Your Phone Number.</p>
                            </div>
                            <div class="sign__form">
                                <form method="post" action="{{route('otp.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="sign__input-wrapper mb-25">
                                        <div class="sign__input">
                                            <input type="hidden" placeholder="e-mail address" name="email" value="">
                                            <input type="hidden" placeholder="e-mail address" name="password" value="">
                                        </div>
                                    </div>
                                    <div class="sign__input-wrapper mb-25">
                                        <div class="sign__input">
                                            <input type="hidden" placeholder="Contact Number"  name="phone_number" value="">
                                        </div>
                                    </div>
                                    <div class="sign__input-wrapper mb-25">
                                        <h5>OTP</h5>
                                        <div class="sign__input d-flex" id="otp__input">

                                            {{-- <input type="text" placeholder="OTP" name="otp">--}}
                                            {{-- <i class="fal fa-otter"></i>--}}
                                            <input maxlength="1" type="text" inputmode="numeric" pattern="[0-9]*"  data-next-index="1" name="otp1" id="fst" onkeyup="keyEvent(this, 'sec')">
                                            <input maxlength="1" type="text" inputmode="numeric" pattern="[0-9]*"  data-next-index="1" name="otp2" id="sec" onkeyup="keyEvent(this, 'trd')">
                                            <input maxlength="1" type="text" inputmode="numeric" pattern="[0-9]*"  data-next-index="1" name="otp3" id="trd" onkeyup="keyEvent(this, 'for')">
                                            <input maxlength="1" type="text" inputmode="numeric" pattern="[0-9]*"  data-next-index="1" name="otp4" id="for" onkeyup="keyEvent(this, 'fiv')">
                                            <input maxlength="1" type="hidden" inputmode="numeric" pattern="[0-9]*"  data-next-index="1"  id="fiv">
                                        </div>
                                    </div>

                                    <button class="w-btn w-btn-11 w-100" type="submit"> <span></span> Submit</button>                                   
                                </form>
                                <div class="sign__new text-center mt-20">
                                    <form action="{{ route('resend.otp') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="phone" value="">
                                        <input type="hidden" name="email" value="">
                                        <input type="hidden" name="password" value="">
                                        <button class="btn-link bg-none" type="submit">Resend OTP</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sign up area end -->
    </main>

     <!-- JS here -->
   @include('sweetalert::alert')
   @include('frontend.partials.scripts')
  @stack('js')
</body>
</html>