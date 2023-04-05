@extends('layouts.teacher.master')

@section('content')
    <style>
        html,body{
            min-height: 100vh;
            min-width: 100vw;
        }
        .parent{
            height: 100vh;
        }
        .parent>.row{
            display: flex;
            align-items: center;
            height: 100%;
        }
        .col img{
            height:100px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }
        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
        /*         aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }
    </style>
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                <form method="get" action="{{route('allAttendance.show.all.teacher',['class_id'=>$class_id,'section_id'=>$section_id,'group_id'=>is_null($group_id) ? 0 :$group_id])}}" enctype="multipart/form-data">
                    <div class="input-group">
                        <select  class="form-control mb-3 js-select" name="date">
                            <option selected>Choose a month</option>
                            <option value="01" {{($date == 1) ? 'selected' :''}}>January</option>
                            <option value="02" {{($date == 2) ? 'selected' :''}}>February</option>
                            <option value="03" {{($date == 3) ? 'selected' :''}}>March</option>
                            <option value="04" {{($date == 4) ? 'selected' :''}}>April</option>
                            <option value="05" {{($date == 5) ? 'selected' :''}}>May</option>
                            <option value="06" {{($date == 6) ? 'selected' :''}}>June</option>
                            <option value="07" {{($date == 7) ? 'selected' :''}}>July</option>
                            <option value="08" {{($date == 8) ? 'selected' :''}}>August</option>
                            <option value="09" {{($date == 9) ? 'selected' :''}}>September</option>
                            <option value="10" {{($date == 10) ? 'selected' :''}}>October</option>
                            <option value="11" {{($date == 11) ? 'selected' :''}}>November</option>
                            <option value="12" {{($date == 12) ? 'selected' :''}}>December</option>
                        </select>
                        <div class="input-group-append" style="margin-left: 10px">
                            <button type="submit" class="btn btn-outline-secondary">Search</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
            <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Student</th>
                                            <th >1</th>
                                            <th >2</th>
                                            <th >3</th>
                                            <th >4</th>
                                            <th >5</th>
                                            <th >6</th>
                                            <th >7</th>
                                            <th >8</th>
                                            <th >9</th>
                                            <th >10</th>
                                            <th >11</th>
                                            <th >12</th>
                                            <th >13</th>
                                            <th >14</th>
                                            <th >15</th>
                                            <th >16</th>
                                            <th >17</th>
                                            <th >18</th>
                                            <th >19</th>
                                            <th >20</th>
                                            <th >21</th>
                                            <th >22</th>
                                            <th >23</th>
                                            <th >24</th>
                                            <th >25</th>
                                            <th >26</th>
                                            <th >27</th>
                                            <th >28</th>
                                            <th >29</th>
                                            <th >30</th>
                                            <th>31</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dataShow as $key => $data)
                                            <tr>
                                                <td>{{$data->name}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'01')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'02')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'03')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'04')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'05')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'06')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'07')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'08')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'09')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'10')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'11')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'12')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'13')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'14')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'15')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'16')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'17')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'18')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'19')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'20')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'21')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'22')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'23')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'24')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'25')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'26')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'27')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'28')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'29')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'30')}}</td>
                                                <td> {{getAttData($data->id,$class_id,$section_id,$group_id,$date,'31')}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>

@endsection


