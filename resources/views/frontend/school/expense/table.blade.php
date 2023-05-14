@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">       


        <div class="row">
            <div class="col-xl-12">                 
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0" ><a href="{{route('expense.show')}}"><span style="color:black;"> {{__('app.expenses_list')}}</span></a></h5>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-secondary" onclick="history.back()">{{__('app.back')}}</button>
                            <a href="{{route('expense.create')}}" class="btn btn-primary">{{__('app.Add new expense')}}</a>

                        </div>
                    </div>
                </div>

                <div class="row" >
                    <div class="col">
                        <div class="card shadow">
            
                            <div class="card-body">
            
                                <div class="form-group">
                                    <form action="{{route('expense.show')}}" method="GET" id="orderIdForm">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <div class="row">
            
                                                <div class="col-md">
                                                    <label for=""><b>{{__('app.Search On Date/Start Date')}}</b></label>
                                                    <input type="date" name="searchdate" 
                                                        class="form-control @error('searchdate') is-invalid @enderror">
            
                                                    @error('searchdate')
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            
                                                </div>
                                                <div class="col-md">
                                                    <label for=""><b>{{__('app.Search End Date')}}</b></label>
                                                    <input type="date" name="enddate" 
                                                        class="form-control @error('enddate') is-invalid @enderror">
            
                                                    @error('enddate')
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            
                                                </div>
                                            
            
                                        
                                                <div class="col-md">
                                                    <label for=""><b>{{__('app.Search On month')}}</b></label>
                                                    <select  class="form-control mb-3 js-select" name="searchmonth" class="form-control @error('searchmonth') is-invalid @enderror">
                                                    <option value="0" selected>{{__('app.Month')}} {{__('app.select')}}</option>
                                                    <option value="1" @isset(request()->searchmonth) {{(request()->searchmonth == 1) ? 'selected' : ''}}  @endisset>January</option>
                                                    <option value="2" @isset(request()->searchmonth) {{(request()->searchmonth == 2) ? 'selected' : ''}}  @endisset>February</option>
                                                    <option value="3" @isset(request()->searchmonth) {{(request()->searchmonth == 3) ? 'selected' : ''}}  @endisset>March</option>
                                                    <option value="4" @isset(request()->searchmonth) {{(request()->searchmonth == 4) ? 'selected' : ''}}  @endisset>April</option>
                                                    <option value="5" @isset(request()->searchmonth) {{(request()->searchmonth == 5) ? 'selected' : ''}}  @endisset>May</option>
                                                    <option value="6" @isset(request()->searchmonth) {{(request()->searchmonth == 6) ? 'selected' : ''}}  @endisset>June</option>
                                                    <option value="7" @isset(request()->searchmonth) {{(request()->searchmonth == 7) ? 'selected' : ''}}  @endisset>July</option>
                                                    <option value="8" @isset(request()->searchmonth) {{(request()->searchmonth == 8) ? 'selected' : ''}}  @endisset>August</option>
                                                    <option value="9" @isset(request()->searchmonth) {{(request()->searchmonth == 9) ? 'selected' : ''}}  @endisset>September</option>
                                                    <option value="10" @isset(request()->searchmonth) {{(request()->searchmonth == 10) ? 'selected' : ''}}  @endisset>October</option>
                                                    <option value="11" @isset(request()->searchmonth) {{(request()->searchmonth == 11) ? 'selected' : ''}}  @endisset>November</option>
                                                    <option value="12" @isset(request()->searchmonth) {{(request()->searchmonth == 12) ? 'selected' : ''}}  @endisset>December</option>
                                                </select>
            
                                                    @error('searchmonth')
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            
                                                </div>
            
                                                 
                                                
                                                <div class="col">
                                                    <label for="search">  </label><br>
                                                    <button class="btn btn-primary">{{__('app.search')}}</button>
                                                </div>
            
                                                
                                            </div>
                                        </div>
                                            
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               </div>

               <div class="card shadow">
                <div class="card-body" >
                    <h4><span class="align: center;">{{__('app.Total Expense')}}: {{number_format($sumFund)}}</span> 
                        <i class="fa-solid fa-bangladeshi-taka-sign"></i> 
                    </h4>
                </div>
            </div>
                
                <div class="card shadow">
                    <div class="card-body  table-responsive">
                        <table class="table table-striped table-hover data-table">
                            <thead>
                                <tr >
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('app.date')}}</th>
                                    <th scope="col">{{__('app.Expense Purpose')}}</th>
                                    <th scope="col">{{__('app.Payment Method')}}</th>
                                    <th scope="col">{{__('app.Account')}}</th>
                                    <th scope="col">{{__('app.Expense by')}}</th>
                                    <th scope="col">{{__('app.Amount')}}</th>
                                    <th scope="col">{{__('app.Remark')}}</th>
                                    <th scope="col">{{__('app.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($expense as $key => $item)
                                <tr>
                                    <th scope="row" >{{++$key}}</th>
                                    <td>{{date('d-m-Y',strtotime($item->datee))}}</td>
                                    <td>{{$item->purpose}}</td>
                                    <td>@if( $item->payment_method == 1) Hand Cash
                                        @elseif( $item->payment_method == 2) Bank Transiction 
                                        @else 
                                        @endif
                                    </td>
                                    <td>{{ \App\Models\Bank::find($item->account)->account_number ?? ""}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->remark}}</td>
                                    <td class="text-nowrap">
                                            <a href="{{ route('expense.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                {{__('app.Edit')}}
                                        </a>
            
                                        <button class="btn btn-sm btn-primary"
                                            onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('delete/{{$item->id}}'); }">
                                            {{__('app.Delete')}}
                                        </button> 
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <div class="col-12 py-5 text-center">
                                        <tr>
                                            <td colspan="9" style="text-align: center;">No record found</td>
                                        </tr>
                                    </div>
                                </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </main>
    <?php
    $tutorialShow = getTutorial('department-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection