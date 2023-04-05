@extends('frontend.layouts.app')

@section('main')

<main>

<!-- page title area start -->
<section class="page__title-area page__title-height d-flex align-items-center fix p-relative z-index-1" data-background="{{ asset('frontend/assets/img/page-title/page-title.jpg') }}">
   <div class="page__title-shape">
      <img class="page-title-dot-4" src="{{ asset('frontend/assets/img/page-title/dot-4.png') }}" alt="">
      <img class="page-title-dot" src="{{ asset('frontend/assets/img/page-title/dot.png') }}" alt="">
      <img class="page-title-dot-2" src="{{ asset('frontend/assets/img/page-title/dot-2.png') }}" alt="">
      <img class="page-title-dot-3" src="{{ asset('frontend/assets/img/page-title/dot-3.png') }}" alt="">
      <img class="page-title-plus" src="{{ asset('frontend/assets/img/page-title/plus.png') }}" alt="">
      <img class="page-title-triangle" src="{{ asset('frontend/assets/img/page-title/triangle.png') }}" alt="">
   </div>
   <div class="container">
      <div class="row">
         <div class="col-xxl-12">
            <div class="page__title-wrapper text-center">
               <h3>{{__('app.contact')}} </h3>
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/">{{__('app.Home')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('app.contact')}}</li>
                     </ol>
                  </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="contact__area pb-150 p-relative z-index-1">
   <div class="container">
      <div class="row">
         <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
            <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">
               <div class="row">
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                     <div class="contact__info pr-80">
                        <h3 class="contact__title">{{__('app.talk')}}</h3>

                        <div class="contact__details">
                           <ul>
                              <li>
                              <h4>{{__('app.Location')}}</h4>
                              <p>
                              {{__('app.Location1')}}  
                              </p>
                              </li>
                              <li>
                              <h4>{{__('app.Email')}}</h4>
                              <p>
                                 <a href="mailto:support@shikkha.one">
                                    support@shikkha.one
                                 </a>
                              </p>
                              </li>
                              <li>
                                 <h4>{{__('app.Number')}} </h4>
                                 <p><a href="tel:+8801568405146">{{__('app.Number1')}}</a></p>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">

                     @if (session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                     @elseif(session()->has('error'))
                        <div class="alert alert-danger">{{session()->get('error')}}</div>
                     @endif

                     <div class="contact__form">
                        <form action="{{route('contact.support')}}" method="post">
                           @csrf
                           @error('name') <strong class="text-danger">{{$message}}</strong> @enderror
                           <input type="text" name="name" placeholder="{{__('app.Name')}}" value="{{old('name')}}">

                           @error('email') <strong class="text-danger">{{$message}}</strong> @enderror
                           <input type="email" name="email" placeholder="{{__('app.Email')}}" value="{{old('email')}}">

                           @error('subject') <strong class="text-danger">{{$message}}</strong> @enderror
                           <input type="subject" name="subject" placeholder="{{__('app.Subject')}}" value="{{old('subject')}}">

                           @error('message') <strong class="text-danger">{{$message}}</strong> @enderror
                           <textarea name="message" placeholder="{{__('app.Message')}}">{{old('message')}}</textarea>
                           
                           <button type="submit" class="w-btn w-btn-blue-5 w-btn-6 w-btn-14">{{__('app.sent')}}</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
      <!-- contact area end  -->

   <!-- contact support area start -->
   <section class="contact__support p-relative pb-110">
      <div class="contact__shape">
         <img src="assets/img/contact/shape.png" alt="">
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
               <div class="contact__item-inner hover__active mb-30">
                  <div class="contact__item text-center transition-3 white-bg">
                     <div class="contact__icon d-flex justify-content-center align-items-end">
                        <img src="assets/img/contact/call.png" alt="">
                     </div>
                     <div class="contact__content">
                        <h3 class="contact__title-2"><a href="#">{{__('app.Quick1')}}</a></h3>
                        <p>{{__('app.Quick8')}} </p>
                        <a href="#" class="link-btn">{{__('app.Quick3')}} <i class="arrow_right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
               <div class="contact__item-inner hover__active mb-30">
                  <div class="contact__item text-center transition-3 white-bg">
                     <div class="contact__icon d-flex justify-content-center align-items-end">
                        <img src="assets/img/contact/message.png" alt="">
                     </div>
                     <div class="contact__content">
                        <h3 class="contact__title-2"><a href="#">{{__('app.Quick4')}}</a></h3>
                        <p>{{__('app.Quick9')}} </p>
                        <a href="#" class="link-btn">{{__('app.Quick5')}}<i class="arrow_right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
               <div class="contact__item-inner hover__active mb-30">
                  <div class="contact__item text-center transition-3 white-bg">
                     <div class="contact__icon d-flex justify-content-center align-items-end">
                        <img src="assets/img/contact/social.png" alt="">
                     </div>
                     <div class="contact__content">
                        <h3 class="contact__title-2"><a href="#">{{__('app.Quick6')}}</a></h3>
                        <p>{{__('app.Quick2')}} </p>
                        <a href="#" class="link-btn">{{__('app.Quick7')}}<i class="arrow_right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- contact support area end -->
</main>
@endsection