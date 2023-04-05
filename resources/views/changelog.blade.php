@extends('frontend.layouts.app')
@section('main')

<section class="team__details pt-120 pb-160">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="team__details-info mt-60">
                    <h4 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">{{__('app.u1')}}</h4>
                    <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <strong>{{__('app.u2')}}: </strong>
                        {{__('app.u3')}}
                    <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <strong>{{__('app.u4')}}: </strong>
                        {{__('app.u5')}}
                    </p>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
