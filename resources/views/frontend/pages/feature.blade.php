@extends('frontend.layouts.app')
@section('main')

<section class="page__title-area page__title-height d-flex align-items-center fix p-relative z-index-1 feature_bg" data-background="{{ asset('frontend/assets/img/features/features.svg') }}">
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
            
                  <nav aria-label="breadcrumb">
                   <h1 class="text-light fs-1">Hundreds of powerful tools, one platform.</h1>
                   <h5 class="text-light">ClickUp comes with hundreds of features that can be customized for any work <br> need—with more added every week. And they're all free, forever.
</h5>
<div class="pt-30 pb-30">
<a class="feature__anchor" href="#">OVERVIEW</a>
<a class="feature__anchor" href="#">VIEWS</a>
<a class="feature__anchor" href="#">CUSTOMIZATION</a>
<a class="feature__anchor" href="#">COLLABORATION</a>
<a class="feature__anchor" href="#">DOCS</a>
<a class="feature__anchor" href="#">REPORTING</a>
<a class="feature__anchor" href="#">TIME</a>
<a class="feature__anchor" href="#">ALL FEATURES</a>
</div>



            </div>
         </div>
      </div>
   </div>
</section>
<section>
<div class="feature__div text-center">
    <img class="w-50 h-50 feature__img" src="{{ asset('frontend/assets/img/hero/home-1/hero__area.png') }}" alt="">
    <br>
    <div class="feature__btn">
    <button type="submit" class="w-btn w-btn mt-5">Get Started</button>
    </div>    
    
</div>

</section>

<section id="overview">
    <div class="overview__title text-center pt-5 pb-10">
        <h1 class="text-dark fs-1 fw-bold">WelLand Overview.</h1>
        <p class="text-muted">WetLand's unique Hierarchy helps you create the perfect structure that scales with your needs. Each level of <br> ClickUp gives you more flexibility and control to organize everything from small teams to enterprise companies.</p>
    </div>
    <div class="container overview__container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="overview__container__left">
                <img src="{{ asset('frontend/assets/img/icon/services/home-2/services-2.png') }}" alt="">
                <h2 class="text-light mt-4">Everything view</h2>
                <p class="text-light lh-lg fw-bolder"> wetLand Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem ipsum ipsam voluptatibus suscipit quaerat. Nostrum asperiores placeat molestias dolores exercitationem tenetur. Saepe reiciendis nulla dicta deleniti atque possimus, ad sunt?</p>
                </div>
               
            </div>
            <div class="col-lg-6">
                <img class="w-100 h-100" src="{{ asset('frontend/assets/img/hero/home-1/hero__area.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section class="about__area grey-bg-3 pt-40 pb-120 p-relative">
            <div class="about__shape-2">
               <img class="about-2-circle" src="{{ asset('frontend/assets/img/about/home-2/about-circle.png') }}" alt="">
               <img class="about-2-circle-2" src="{{ asset('frontend/assets/img/about/home-2/about-circle-2.png') }}" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-7 col-xl-7 col-lg-6 col-md-8">
                     <div class="about__thumb-3 wow fadeInLeft" data-wow-delay=".3s">
                        <img src="{{ asset('frontend/assets/img/about/home-2/about-1.png') }}" alt="">
                     </div>
                  </div>
                  <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8">
                     <div class="about__content-3 pt-55">
                        <div class="section__title-wrapper section__title-wrapper-2 mb-55 wow fadeInUp" data-wow-delay=".3s">
                           <span class="section__pre-title pink">Features</span>
                           <h2 class="section__title section__title-2">Get the perfect solution for your web.</h2>
                           <p>Starkers pardon you knees up is Elizabeth geeza Why, quain standard  guvnor gosh cras brilliant.</p>
                        </div>
                        <a href="about.html" class="w-btn w-btn-blue w-btn-3 w-btn-1">Get Started</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about area end -->


         <!-- features area start -->
         <section class="features__area pt-135 pb-120 p-relative">
            <div class="features__shape-2">
               <img class="features-2-dot" src="{{ asset('frontend/assets/img/icon/features/home-2/features-dot.png') }}" alt="">
               <img class="features-2-dot-2" src="{{ asset('frontend/assets/img/icon/features/home-2/features-dot-2.png') }}" alt="">
               <img class="features-2-dot-3" src="{{ asset('frontend/assets/img/icon/features/home-2/features-dot-3.png') }}" alt="">
               <img class="features-2-triangle-1" src="{{ asset('frontend/assets/img/icon/features/home-2/features-triangle-1.png') }}" alt="">
               <img class="features-2-triangle-2" src="{{ asset('frontend/assets/img/icon/features/home-2/features-triangle-2.png') }}" alt="">
               <img class="features-2-triangle-3" src="{{ asset('frontend/assets/img/icon/features/home-2/features-triangle-3.png') }}" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-6 offset-xxl-3 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                     <div class="section__title-wrapper section__title-wrapper-2 text-center mb-75 wow fadeInUp" data-wow-delay=".3s">
                        <span class="section__pre-title purple">Features</span>
                        <h2 class="section__title section__title-2">We work together to create beautiful product.</h2>
                        <p>Starkers pardon you knees up is Elizabeth geeza Why.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xxl-3 offset-xxl-1 col-xl-3 col-lg-4 col-md-4">
                     <div class="features__tab">
                        <ul class="nav nav-tabs" id="feaTab" role="tablist">
                           <li class="nav-item" role="presentation">
                             <button class="nav-link pink-bg" id="sync-tab" data-bs-toggle="tab" data-bs-target="#sync" type="button" role="tab" aria-controls="sync" aria-selected="true"> <i class="icon_document_alt"></i> Seamless Sync</button>
                           </li>
                           <li class="nav-item" role="presentation">
                             <button class="nav-link blue-bg active" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false"> <i class="icon_book_alt"></i> Super security</button>
                           </li>
                           <li class="nav-item" role="presentation">
                             <button class="nav-link yellow-bg" id="multitask-tab" data-bs-toggle="tab" data-bs-target="#multitask" type="button" role="tab" aria-controls="multitask" aria-selected="false"> <i class="icon_flowchart"></i> Multitask</button>
                           </li>
                         </ul>
                     </div>
                  </div>
                  <div class="col-xxl-7 offset-xxl-1 col-xl-7 offset-xl-1 col-lg-8 col-md-8">
                     <div class="features__tab-content">
                        <div class="tab-content" id="feaTabContent">
                           <div class="tab-pane fade" id="sync" role="tabpanel" aria-labelledby="sync-tab">
                              <div class="features__thumb">
                                 <div class="features__thumb-inner">
                                    <img class="fea-thumb" src="{{ asset('frontend/assets/img/features/home-2/fea-thumb-2.jpg') }}" alt="">
                                    <img class="fea-sm" src="{{ asset('frontend/assets/img/features/home-2/fea-sm.jpg') }}" alt="">
                                    <img class="fea-sm-2" src="{{ asset('frontend/assets/img/features/home-2/fea-sm-2.jpg') }}" alt="">
                                    <img class="fea-2-shape" src="{{ asset('frontend/assets/img/icon/features/home-2/features-shape.png') }}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade show active" id="security" role="tabpanel" aria-labelledby="security-tab">
                              <div class="features__thumb">
                                 <div class="features__thumb-inner">
                                    <img class="fea-thumb" src="{{ asset('frontend/assets/img/features/home-2/fea-thumb.jpg') }}" alt="">
                                    <img class="fea-sm" src="{{ asset('frontend/assets/img/features/home-2/fea-sm.jpg') }}" alt="">
                                    <img class="fea-sm-2" src="{{ asset('frontend/assets/img/features/home-2/fea-sm-2.jpg') }}" alt="">
                                    <img class="fea-2-shape" src="{{ asset('frontend/assets/img/icon/features/home-2/features-shape.png') }}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="multitask" role="tabpanel" aria-labelledby="multitask-tab">
                              <div class="features__thumb">
                                 <div class="features__thumb-inner">
                                    <img class="fea-thumb" src="{{ asset('frontend/assets/img/features/home-2/fea-thumb-3.jpg') }}" alt="">
                                    <img class="fea-sm" src="{{ asset('frontend/assets/img/features/home-2/fea-sm.jpg') }}" alt="">
                                    <img class="fea-sm-2" src="{{ asset('frontend/assets/img/features/home-2/fea-sm-2.jpg') }}" alt="">
                                    <img class="fea-2-shape" src="{{ asset('frontend/assets/img/icon/features/home-2/features-shape.png') }}" alt="">
                                 </div>
                              </div>
                           </div>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- features area end -->








@endsection()


