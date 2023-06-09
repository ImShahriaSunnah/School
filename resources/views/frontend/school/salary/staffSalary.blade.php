@extends('layouts.school.master')

@section('content')
<!--start content-->
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Month Name</th>
                                <th>Amount</th>
                                <th>Last updated Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($studentFees as $key => $data)
                            <tr>
                                <td>{{$key++ +1}}</td>
                                <td>{{$data->month_name}}</td>
                                <td>{{($data->amount == 0) ? 'Non-Paid' : $data->amount}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td>
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                        <a  href="{{route('school.staff.salary.edit',$data->id)}}" class="btn btn-success">Update fees</a>
                                    </div>
                                </td>
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
