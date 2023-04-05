@extends('layouts.school.master')

@section('content')

<main class="page-content">

    <div class="row">
        <div class="ms-auto">
            <a href="{{route('syllabus.form.show')}}" class="btn btn-primary">{{__('app.Back')}} </a>
            <button onclick="printDiv('print')" class="btn btn-success">{{__('app.Print')}}</button>

        </div>

        <div class="col-xl-12 mx-auto">
            <div  id="print" class="border p-3 rounded">
                <center>
                    <h2 class="mb-0 text-uppercase">{{Auth::user()->school_name}}</h2>
                    <h4>
                        {{ $syllabus->first()->first()->classRelation->class_name }}

                    </h4>


                </center>
                <hr />


                @foreach($syllabus as $key => $items)
                <center>
                    <h3>{{\App\Models\Term::find($key)?->term_name}}</h3>


                </center>
                <hr>
                @foreach($items as $key => $item)
                <h5>
                    {{$item->subjectRelation->subject_name}}
                </h5>
               <p>{!! $item->Syllabus !!}</p> 
                @endforeach
                @endforeach

            </div>
        </div>
    </div>


    </div>
    </main>
    <script>
        // for printing
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
        @endsection


