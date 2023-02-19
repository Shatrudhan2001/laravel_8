@extends('admin.layouts.main') @section('main.container')
    <!-- Container Start -->
    <div class="page-wrapper">
        <div class="main-content">
            <!-- Page Title Start -->
            <div class="row">
                <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-title-wrapper">
                        <div class="page-title-box">
                            <h4 class="page-title">{{ $title }}</h4>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li class="breadcrumb-link">
                                    <a href="{{ url('/dashboard') }}"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                </li>
                                <li class="breadcrumb-link active">{{ $title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="from-wrapper">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                             @error('image')
                                    <div class="alert alert-danger mb-2 col-lg-6 offset-3 text-center">{{ $message }}</div>
                                @enderror
                                @if (session('status'))
                                    <div class="alert alert-success mb-2 col-lg-6 offset-3 text-center">
                                        {{ session('status') }}</div>
                                @endif
                            <form class="separate-form" id="userForm" method="post" action="{{ url('/ToPaymentProcess') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="member_id" value="{{ $member_id }}">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Opening Balance </label>
                                                <input name="opening_balance" class="form-control @error('opening_balance') is-invalid @enderror" type="text" placeholder="Enter amount " id="opening_balance">
                                                @error('opening_balance')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Closing Balance </label>
                                                <input name="closing_balance" class="form-control @error('closing_balance') is-invalid @enderror" type="text" placeholder="Enter amount " id="closing_balance">
                                                @error('closing_balance')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Amount </label>
                                                <input name="amount" class="form-control @error('amount') is-invalid @enderror" type="text" placeholder="Enter paid amount " id="amount">
                                                @error('amount')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Payment Mode </label>
                                                <select name="payment_method" class="form-control @error('payment_method') is-invalid @enderror" type="text" placeholder="Enter amount " id="payment_method">
                                                    <option value=""> Select </option>
                                                    <option value="Cash"> Cash </option>
                                                    <option value="Online"> Online </option>
                                                </select>
                                                @error('payment_method')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Payment Date </label>
                                                <input name="payment_date" class="form-control @error('payment_date') is-invalid @enderror" type="date" placeholder="Enter amount " id="payment_date">
                                                @error('payment_date')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Monthly Subscription </label>
                                                <input name="subscription" class="form-control @error('subscription') is-invalid @enderror" type="number" placeholder="Enter monthly subscription " id="subscription" min="0">
                                                @error('subscription')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" type="button"> Submit </button></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <!-- Products view Start -->
            @endsection
        </div>
    </div>
