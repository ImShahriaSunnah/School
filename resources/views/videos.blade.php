@extends('frontend.layouts.app')
@section('main')

    <section class="team__details pt-120 pb-160">
        <div class="container">
            <div class="row">
                <h1 class="py-4">{{__('app.header_title')}} </h1>
	
                {{-- <h2>Title: How to make the perfect cup of coffee</h2> --}}
                
                <iframe width="560" height="400" src="https://www.youtube.com/embed/WTJSt4wP2ME" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                
                <p class="py-4"><b>{{__('app.description')}}</b>: {{__('app.testimonial4')}} {{__('app.testimonial1')}} {{__('app.testimonial2')}} {{__('app.testimonial3')}} {{__('app.testimonial5')}}</p>
            </div>

        </div>
    </section>
@endsection