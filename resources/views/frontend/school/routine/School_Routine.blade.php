@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <style>
      .verticaltext{
           width:1px;
           word-wrap: break-word;
           white-space:pre-wrap;
           padding-top: 150px;
          
        }
    </style>
    <main class="page-content">
        <x-page-title title="{{ __('app.School') }} {{ __('app.Routine') }}" />
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered border-primary" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>day</th>
                                    <th>class</th>
                                    <th colspan="2">1st period</th>
                                    <th colspan="2">2nd period</th>
                                    <th colspan="2">3rd period</th>
                                    <th colspan="2">4th period</th>
                                    <th colspan="2">5th period</th>
                                    <th colspan="2">6th period</th>
                                    <th colspan="2">7th period</th>
                                    <th colspan="2">8th period</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="20" ><h2 class="verticaltext ">SATURDAY</h4></th>
                                    <td rowspan="2">class 1</td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 2</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 3</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 4</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 5</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 6</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>ict <br>
                                        <p style="color:blue">(LIEA)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>ict <br>
                                        <p style="color:blue">(LIHA)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 7</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(Lira)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(Miha)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 8</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(XYZ)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 9</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Biology <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Chemistry <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 10</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Biology <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Chemistry <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th rowspan="20" ><h2 class="verticaltext ">SUNDAY</h4></th>
                                    <td rowspan="2">class 1</td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 2</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 3</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 4</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 5</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 6</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>ict <br>
                                        <p style="color:blue">(LIEA)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>ict <br>
                                        <p style="color:blue">(LIHA)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 7</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(Lira)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(Miha)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 8</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(XYZ)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>ICT <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td colspan="2" class="text-center">----------</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 9</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Biology <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Chemistry <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2">class 10</td>
                                    <td> A</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> A</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>Biology <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> A</td>
                                    <td>physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> B</td>
                                    <td>Bangla <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Math <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>English <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td> B</td>
                                    <td>Science <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td> B</td>
                                    <td>social <br>
                                        <p style="color:blue">(Mismi)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Islam <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Physics <br>
                                        <p style="color:blue">(Liza)</p>
                                    </td>
                                    <td>B</td>
                                    <td>Chemistry <br>
                                        <p style="color:blue">(Sefuda)</p>
                                    </td>
                                </tr>
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
