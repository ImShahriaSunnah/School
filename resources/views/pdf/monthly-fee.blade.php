
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h1> {{ $data['user']?->school?->school_name }} </h1>
                    <h5>Payment Receipt</h5>
                    <h6>Date: {{ date('d-m-Y') }}</h6>
                </div>

                <hr>

                <table class="w-100 mb-3">
                    <tbody>
                        <tr>
                            <td><h6>Name: {{ $data['user']?->name }}</h6></td>
                            <td><h6>Roll: {{ $data['user']?->roll_number }}</h6></td>
                            <td><h6>Shift: @if($data['user']?->shift == 1) Morning @elseif($data['user']?->shift == 2) Day @elseif($data['user']?->shift == 3) Evening @endif</h6></td>
                        </tr>
                        <tr>
                            <td><h6>Father Name: {{$data['user']?->father_name ?? '......'}}</h6></td>
                            <td><h6>Class: {{ $data['user']?->class?->class_name }}</h6></td>
                            <td><h6>Section: {{ $data['user']?->section?->section_name }}</h6></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered w-100 mx-auto">
                    <thead>
                        <tr>
                            <th>Fees</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(is_array($data['assignFees']['fees_details']) && isset($data['assignFees']['fees_details']))
                            {{-- <tr>
                                <td>
                                    <span class="text-inverse">Monthly Fees</span><br>
                                    <small></small>
                                </td>
                                @if({{$data['user']->scholarship == 2}})
                                    <td class="text-center">{{(getClassName($data['user']->class_id)->class_fees) /2}} Taka</td>
                                @elseif({{$data['user']->scholarship == 0}})
                                    <td class="text-center">{{(getClassName($data['user']->class_id)->class_fees) *0}} Taka</td>
                                @else
                                    <td class="text-center">{{getClassName($data['user']->class_id)->class_fees}} Taka</td>
                                @endif
                            </tr> --}}
                            @foreach ($data['assignFees']['fees_details'] as $key => $item)
                                <tr>
                                    <td width="70%">{{ ucfirst(preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $key)) }}</td>
                                    <td class="text-end">{{ $item }} TK</td>
                                </tr>
                            @endforeach
                        @else
                        {{-- <tr>
                            <td>
                                <span class="text-inverse">Monthly Fees</span><br>
                                <small></small>
                            </td>
                            @if({{$data['user']->scholarship == 2}})
                                <td class="text-center">{{(getClassName($data['user']->class_id)->class_fees) /2}} Taka</td>
                            @elseif({{$data['user']->scholarship == 0}})
                                <td class="text-center">{{(getClassName($data['user']->class_id)->class_fees) *0}} Taka</td>
                            @else
                                <td class="text-center">{{getClassName($data['user']->class_id)->class_fees}} Taka</td>
                            @endif
                        </tr> --}}
                            @foreach (json_decode($data['assignFees']['fees_details']) as $key => $item)
                                <tr>
                                    <td width="70%">{{ ucfirst(preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $key)) }}</td>
                                    <td class="text-end">{{ $item }} TK</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr class="text-end">
                            <td><strong>In Total: </strong></td>
                            {{-- @if({{$data['user']->scholarship == 2}})
                                <td class="text-center">({{$data['studentFees']?->amount + (getClassName($data['user']->class_id)->class_fees / 2)}}) Taka</td>
                            @elseif({{$data['user']->scholarship == 0}})
                                <td class="text-center">({{$data['studentFees']?->amount + (getClassName($data['user']->class_id)->class_fees * 0)}}) Taka</td>
                            @else --}}
                                <td class="text-center">{{$data['studentFees']?->amount + getClassName($data['user']->class_id)->class_fees}} Taka</td>
                            {{-- @endif --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
