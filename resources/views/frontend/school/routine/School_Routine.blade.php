@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <x-page-title title="{{__('app.School')}} {{__('app.Routine')}}"/>
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">day</th>
                                <th scope="col">Class</th>
                                @foreach ($data['periods'] as $key => $row)
                                    <th colspan="4">
                                        {{ordinalNumber(++$key)." Class"}} <br>
                                        ({{date("h:i a", strtotime($row->from_time)) . " - " . date("h:i a", strtotime($row->to_time))}})
                                    </th> 
                                    @endforeach
                              </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($rows as $key => $row)
                                <tr>
                                    <td>{{$key}}</td>
                                   
                                    @foreach ($row as $period)
                                       
                                    <td >
                                        {{instituteClass($period->class_id)?->class_name}}
                                        {{shifting($period->shift)}}<br>
                                        {{instituteSection($period->section_id)?->section_name}} <br>
                                        {{instituteSubject($period->subject_id)?->subject_name}} <br>
                                        {{strtoupper( getTeacherName($period->teacher_id)?->full_name)}} <br>
                                        @if (!is_null($period->note))
                                            Room No: {{$period->note}}
                                        @endif
                                    </td>
                                    
                                    @endforeach
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>
    <?php
    $tutorialShow = getTutorial('subject-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection