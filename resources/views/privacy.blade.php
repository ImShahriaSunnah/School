@extends('frontend.layouts.app')
@section('main')

    <section class="team__details pt-120 pb-160">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="team__details-info mt-60">
                        <h4 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">{{__('app.p21')}}</h4>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p1')}}: </strong>
{{__('app.p2')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p3')}}: </strong>
{{__('app.p4')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p5')}}: </strong>
{{__('app.p6')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p7')}}: </strong>
{{__('app.p8')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p9')}}: </strong>
{{__('app.p10')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p11')}}: </strong>
{{__('app.p12')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p13')}}: </strong>
{{__('app.p14')}}                        </p>
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p15')}}: </strong>
{{__('app.p16')}}                        </p>
                       
                        <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <strong>{{__('app.p19')}}: </strong>
{{__('app.p20')}}                            <span style="color:yellow;"><a href="{{url('/contact')}}">here</a></span>.
                        </p>
                        
                            
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection