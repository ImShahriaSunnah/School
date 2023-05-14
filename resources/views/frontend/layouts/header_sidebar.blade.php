<div class="sidebar__area">
    <div class="sidebar__wrapper">
       <div class="sidebar__close">
          <button class="sidebar__close-btn" id="sidebar__close-btn">
             <span><i class="fal fa-times"></i></span>
             <span>close</span>
          </button>
       </div>
       <div class="sidebar__content">
          <div class="mb-40 logo">
             <a href="{{url('/')}}">
                <img src="{{ asset('images/logo/logo.svg') }}" alt="logo">
             </a>
          </div>
          <div class="mobile-menu"></div>
          <div class="sidebar__info mt-350">
             <a href="{{route('school.login')}}" class="w-btn w-btn-4 d-block mb-15 mt-15">login</a>
             <a href="{{url('/get/started')}}" class="w-btn d-block">sign up</a>
          </div>
       </div>
    </div>
 </div>
