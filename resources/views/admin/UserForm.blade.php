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
                            <form class="separate-form" id="userForm" method="post" action="{{ url('AddUser') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="@if(!empty($data)){{ $data->id }} @endif">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Block </label>
                                                <select name="block" id="block" class="form-select form-control">
                                                    <option value=""> Select </option>
                                                    <?php for($i = 1; $i <= 8; $i++){ ?>
                                                    <option value="0<?php echo $i; ?>" <?php if(!empty($data)){if( $data->block == $i){ echo 'selected'; }} ?>>BLOCK 0<?php echo $i; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                @error('block')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Pocket Id </label>
                                                <input name="pocket_id" class="form-control @error('pocket_id') is-invalid @enderror" type="text" placeholder="Enter Pocket Id " id="pocket_id" value="@if(!empty($data)){{ $data->pocket_id }} @endif">
                                                @error('pocket_id')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Name </label>
                                                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter name " id="name" value="@if(!empty($data)){{ $data->name }} @endif">
                                                @error('name')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Email Id </label>
                                               
                                                @if(!empty($data))
                                                     <input name="email" class="form-control" type="email" placeholder="Enter Email Id" id="email" value="@if(!empty($data)){{ $data->email }} @endif">
                                                @else
                                                     <input name="email" class="form-control @error ('email') is-invalid @enderror" type="email" placeholder="Enter Email Id">
                                                    @error('email')
                                                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                    <div id="showEmailError"></div>
                                                 @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Phone </label>
                                                <input name="phone" class="form-control @error ('phone') is-invalid @enderror" type="text" maxlength="10" placeholder="Enter Phone Number" id="phone" value="@if(!empty($data)){{ $data->phone }} @endif" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                 @error('phone')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Ownership </label>
                                                <select name="ownership" id="ownership" class="form-select form-control">
                                                    <option value=""> Select </option>
                                                    <option value="owner" <?php if(!empty($data)){if( $data->ownership == 'owner'){ echo 'selected'; }} ?>> Owner </option>
                                                    <option value="rental" <?php if(!empty($data)){if( $data->ownership == 'rental'){ echo 'selected'; }} ?>> Rental </option>
                                                </select>
                                                @error('ownership')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <label for="member-name" class="col-form-label">Designation</label>-->
                                        <!--        <input name="designation" class="form-control @error('designation') is-invalid @enderror" type="text" placeholder="Enter Designation " id="designation" value="@if(!empty($data)){{ $data->designation }} @endif">-->
                                        <!--        @error('designation')-->
                                        <!--        <div class="text-danger mt-1 mb-1">{{ $message }}</div>-->
                                        <!--        @enderror-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Address </label>
                                                <input name="address" id="address" class="form-control" value="@if(!empty($data)){{ $data->address }} @endif">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label">Password </label>
                                                <input name="password" class="form-control" type="text" placeholder="Create Password" id="password" value="@if(!empty($data)){{ $data->password_view }} @endif">
                                                @error('password')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <div id="showPass"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label">Confirm Password </label>
                                                <input name="cpassword" class="form-control @error('password') in-invalid @enderror" type="password" placeholder="Confirm Password" id="cpassword" value="@if(!empty($data)){{ $data->password_view }} @endif">
                                                 @error('cpassword')
                                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                                <div id="showPassError"></div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="member-name" class="col-form-label">Select Image</label>-->
                                    <!--        <input type="file" name="image" class="form-control"  -->
                                    <!--            id="member-name">-->
                                    <!--        @if(!empty($data))-->
                                    <!--          <img src="{{ url('uploads/users/' . $data->image) }}" alt=""  width="100" class="mt-2"> -->
                                    <!--        @endif-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <button type="submit" class="btn btn-primary" type="button">@if(!empty($data)){{ "UPDATE"; }} @else{{ "ADD"; }} @endif</button>
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
