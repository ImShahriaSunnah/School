@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (isset($row))
                        {{-- Update Form --}}

                        <form action="{{route('period.update',$row->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">{{__('app.Select')}} {{__('app.Shift')}}</label>
                                <select  class="form-control mb-3 js-select" name="shift" class="form-select" required>
                                    <option value="2"  {{ ($row->shift == 2) ? 'selected' : '' }}>Day Shift</option>
                                    <option value="1" {{ ($row->shift == 1) ? 'selected' : '' }}>Morning Shift</option>
                                    <option value="3" {{ ($row->shift == 3) ? 'selected' : '' }}>Evening Shift</option>
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="">{{__('app.Title')}}</label>
                                    <input type="text" name="title" class="form-control" value="{{$row->title}}" readonly>
                                </div>

                                <div class="col">
                                    <label for="">{{__('app.Starttime')}}</label>
                                    <input type="time" name="start_time" value="{{date("H:i", strtotime($row->from_time))}}" class="form-control">
                                </div>

                                <div class="col">
                                    <label for="">{{__('app.Endtime')}}</label>
                                    <input type="time" name="end_time" value="{{date("H:i", strtotime($row->to_time))}}" class="form-control">
                                </div>
                            </div>

                            <button class="btn btn-outline-success">{{__('app.Save')}}</button>
                            <a href="javascript::" onclick="if(confirm('Are your sure?')){ location.replace('{{route('period.index')}}') }" class="btn btn-outline-danger">{{__('app.Back')}}</a>
                        </form>

                        @else
                        {{-- Insert Form --}}
                        <form action="{{route('period.store')}}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="">{{__('app.Select')}} {{__('app.Shift')}}</label>
                                <select  
                                    class="form-control mb-3 js-select"
                                    name="shift" 
                                    class="form-select" 
                                    required
                                    onchange="location.replace('/school/period/create/'+this.value)"
                                >
                                    <option value="2" {{ ($shift == 2) ? 'selected' : '' }}>Day Shift</option>
                                    <option value="1" {{ ($shift == 1) ? 'selected' : '' }}>Morning Shift</option>
                                    <option value="3" {{ ($shift == 3) ? 'selected' : '' }}>Evening Shift</option>
                                </select>
                            </div>

                            <button class="btn-sm btn-primary my-4" id="add_shift" onclick="event.preventDefault();">+ {{__('app.Add')}} {{__('app.Period')}}</button>

                            <div id="shift">
                                @forelse ($rows as $key => $item)
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">{{__('app.Title')}}</label>
                                        <input type="text" name="title[]" class="form-control" value="{{$item->title}}" readonly>
                                    </div>

                                    <div class="col">
                                        <label for="">{{__('app.Starttime')}}</label>
                                        <input type="time" name="start_time[]" class="form-control" value="{{$item->from_time}}">
                                    </div>

                                    <div class="col">
                                        <label for="">{{__('app.Endtime')}}</label>
                                        <input type="time" name="end_time[]" class="form-control" value="{{$item->to_time}}">
                                    </div>
                                </div>
                                @empty
                                    @for ($i=1; $i<=5; $i++)
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="">{{__('app.Title')}}</label>
                                            <input type="text" name="title[]" class="form-control" value="{{ordinalNumber($i)}} period" readonly>
                                        </div>

                                        <div class="col">
                                            <label for="">{{__('app.Starttime')}}</label>
                                            <input type="time" name="start_time[]" class="form-control">
                                        </div>

                                        <div class="col">
                                            <label for="">{{__('app.Endtime')}}</label>
                                            <input type="time" name="end_time[]" class="form-control">
                                        </div>
                                    </div>
                                    @endfor
                                @endforelse

                               
                            </div>

                            <button class="btn-sm btn-outline-success">{{__('app.Save')}}</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        
    </main>

@endsection
@push('js')

    <script>
        @if(isset($rows) && isset($key))
        let x = {{++$key}};
        @else
        let x = 5;
        @endif

        $("#add_shift").click(function(){
            x++;
            var html = '<div class="row mb-3">\
                            <div class="col">\
                                <label for="">Title</label>\
                                <input type="text" name="title[]" class="form-control" value="'+ x +'th period" readonly>\
                            </div>\
                            <div class="col">\
                                <label for="">Start Time</label>\
                                <input type="time" name="start_time[]" class="form-control">\
                            </div>\
                            <div class="col">\
                                <label for="">End Time</label>\
                                <input type="time" name="end_time[]" class="form-control">\
                            </div>\
                        </div>';

            $("#shift").append(html);
        })
    </script>
@endpush