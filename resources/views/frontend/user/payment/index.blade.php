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
                        <h3 class="text-center">Student Payment History</h3>
                        <h5 class="text-center">{{ Auth::user()->school->school_name }}</h5>
                    </div>
                     <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Month</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Details</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentMonthlyFees as $studentMonthlyFee)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $studentMonthlyFee->month_name }}</td>
                                        <td>{{ $studentMonthlyFee->amount }} <svg style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M36 32.2C18.4 30.1 2.4 42.5 .2 60S10.5 93.6 28 95.8l7.9 1c16 2 28 15.6 28 31.8V160H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H64V384c0 53 43 96 96 96h32c106 0 192-86 192-192V256c0-53-43-96-96-96H272c-17.7 0-32 14.3-32 32s14.3 32 32 32h16c17.7 0 32 14.3 32 32v32c0 70.7-57.3 128-128 128H160c-17.7 0-32-14.3-32-32V224h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H128V128.5c0-48.4-36.1-89.3-84.1-95.3l-7.9-1z"/></svg></td>
                                        <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentDetails{{ $studentMonthlyFee->id }}">View</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($studentMonthlyFees as $key => $studentMonthlyFee)
            {{-- Modal Start --}}
                <div class="modal fade" id="paymentDetails{{ $studentMonthlyFee->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        @php
                                            $colSpan = count(studentFieldWiseFee($studentMonthlyFee->month_id)['fees_details']);
                                            $total = 0;
                                        @endphp
                                        <tr class="">
                                            <th colspan="{{ $colSpan }}"><h4>{{ $studentMonthlyFee->month_name }}</h4></th>
                                        </tr>
                                        @foreach (studentFieldWiseFee($studentMonthlyFee->month_id)['fees_details'] as $k => $val )
                                        <tr>
                                            <th scope="col">
                                                @php
                                                    $space = preg_replace("/(?<=[a-z])(?=[A-Z])/", " ", $k);
                                                    $total += $val; 
                                                @endphp
                                                {{ ucfirst($space) }}
                                            </th>
                                            <td>{{ $val }} <svg style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M36 32.2C18.4 30.1 2.4 42.5 .2 60S10.5 93.6 28 95.8l7.9 1c16 2 28 15.6 28 31.8V160H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H64V384c0 53 43 96 96 96h32c106 0 192-86 192-192V256c0-53-43-96-96-96H272c-17.7 0-32 14.3-32 32s14.3 32 32 32h16c17.7 0 32 14.3 32 32v32c0 70.7-57.3 128-128 128H160c-17.7 0-32-14.3-32-32V224h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H128V128.5c0-48.4-36.1-89.3-84.1-95.3l-7.9-1z"/></svg></td>
                                        </tr>
                                        @endforeach
                                    </thead>
                                    <tbody>
                                        <th>Total</th>
                                        <td colspan="{{ $colSpan }}" class="">{{ $total }} <svg style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M36 32.2C18.4 30.1 2.4 42.5 .2 60S10.5 93.6 28 95.8l7.9 1c16 2 28 15.6 28 31.8V160H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H64V384c0 53 43 96 96 96h32c106 0 192-86 192-192V256c0-53-43-96-96-96H272c-17.7 0-32 14.3-32 32s14.3 32 32 32h16c17.7 0 32 14.3 32 32v32c0 70.7-57.3 128-128 128H160c-17.7 0-32-14.3-32-32V224h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H128V128.5c0-48.4-36.1-89.3-84.1-95.3l-7.9-1z"/></svg></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- Modal End --}}
            @endforeach

    </main>

@endsection
