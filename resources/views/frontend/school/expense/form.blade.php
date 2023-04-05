@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add New Record</h1>
            <a href="{{ route('expense.show') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
            </a>
        </div>
    
       <div class="row">
            <div class="col-12">
                <div class="card shadow">
    
                    <div class="card-body">
                        @if (isset($expense))
                        <form action="{{ route('expense.update') }}" method="post" enctype="multipart/form-data">
                        @else
                        <form action="{{ route('expense.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                            @csrf
    
                            @isset($expense)
                            <input type="hidden" name="key" value="{{ $expense->id }}">
                            @endisset
    
                            <div class="form-group">
                                <div class="row">
    
                                    <div class="col-md">
                                        <label for=""><b>Date*</b></label>
                                        <input type="date" name="datee" 
                                            class="form-control @error('datee') is-invalid @enderror"
                                            
                                            @if(isset($expense))
                                            value="{{ (isset($expense->datee)) ? date('Y-m-d', strtotime($expense->datee)) : date('Y-m-d', strtotime($expense->datee)) }}"
                                            @else
                                            value="{{date('Y-m-d')}}"
                                            @endif>
    
                                        @error('datee')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="col-md">
                                        <label for=""><b>Purpose*</b></label>
                                        <input type="text" name="purpose" 
                                            class="form-control @error('purpose') is-invalid @enderror"
                                            @if(isset($expense))
                                            value="{{ $expense->purpose}}"
                                            @else
                                            value="{{ old('purpose') }}"
                                            @endif>
    
                                        @error('purpose')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md">
                                        <label for=""><b>Type*</b></label>
                                        <select name="type" id="" class="form-control mb-3 js-select @error('type') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select One</option>
                                            <option value="1" @if(isset($expense)) @if($expense->type == 1) {{'selected'}} @endif @endif >Expense</option>
                                            <option value="2" @if(isset($expense)) @if($expense->type == 2) {{'selected'}} @endif @endif >Fund</option>
                                        </select>
    
                                        @error('type')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  
                                </div>
                            </div>
    
                            <br>

                            <div class="form-group">
                                <div class="row">
    
                                    <div class="col-md">
                                        <label for=""><b>Payment Method*</b></label>
                                        <select name="payment_method" id="" class="form-control mb-3 js-select @error('payment_method') is-invalid @enderror" required>
                                            <option value="" selected disabled>Select One</option>
                                            <option value="1" @if(isset($expense)) @if($expense->payment_method == 1) {{'selected'}} @endif @endif >Hand Payment</option>
                                            <option value="2" @if(isset($expense)) @if($expense->payment_method == 2) {{'selected'}} @endif @endif >Bank Payment</option>
                                        </select>
    
                                        @error('payment_method')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    
                                    <div class="col-md">
                                        <label for=""><b>Expense By*</b></label>
                                        <input type="text" name="name" 
                                            class="form-control @error('name') is-invalid @enderror"
                                            @if(isset($expense))
                                            value="{{ $expense->name}}"
                                            @else
                                            value="{{ old('name') }}"
                                            @endif>
    
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="col-md">
                                        <label for=""><b>Amount*</b></label>
                                        <input type="text" name="amount" 
                                            class="form-control @error('amount') is-invalid @enderror"
                                            @if(isset($expense))
                                            value="{{ $expense->amount}}"
                                            @else
                                            value="{{ old('amount') }}"
                                            @endif>
    
                                        @error('amount')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
    
                            <br>
                            <div class="form-group">
                                    
                                    <div class="cal-md">
                                        <label for=""><b>Remark/ Note</b></label>
                                        <textarea type="text" name="remark" class="form-control @error('remark') is-invalid @enderror">@if(isset($expense)){{ $expense->remark}}@else{{ old('remark') }}@endif</textarea>
    
                                        @error('remark')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                            </div>
                            <br>
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
        <!--end row-->
    </main>

@endsection
