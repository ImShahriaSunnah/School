@extends('layouts.user.master')

@section('content')

    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex justify-content-center">
                            <h4>Routine For {{instituteClass(Auth::user()->class_id)->class_name}}</h4>
                        </div>
                        <h5 class="text-center">{{ Auth::user()->sectionRelation->section_name }}</h5>
                    </div>
                     <div class="card-body">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th>Day \ Period</th>
                                     @foreach ($data['periods'] as $key => $period)
                                        <th>
                                            <p>{{ordinalNumber(++$key)." Class"}}</p>
                                            ({{date("h:i a", strtotime($period->from_time)) . " - " . date("h:i a", strtotime($period->to_time))}})
                                            {{-- {{ date('h:i a', strtotime($period->from_time)).' - '. date('h:i a', strtotime($period->to_time)) }} --}}
                                        </th> 
                                     @endforeach
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse ($routines as $key => $routine)
                                     <tr>
                                         <td>{{$key}}</td>
    
                                         @foreach ($routine as $routineData)
                                         <td>
                                             {{instituteSubject($routineData->subject_id)?->subject_name}} <br>
                                             {{strtoupper( getTeacherName($routineData->teacher_id)?->full_name)}}
                                         </td>
                                         @endforeach
                                     </tr>
                                 @empty
                                    <tr text-align="center">
                                        <td colspan="{{count($data['periods'])+1}}">Class Routine Not Available</td>
                                    </tr>
                                 @endforelse
                             </tbody>
                         </table>
                     </div>
                </div>
            </div>
        </div>
    </main>

@endsection
