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
                            <form class="separate-form" method="post" action="{{ url('AddEvent') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="@if(!empty($data)){{ $data->id }} @endif">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label"> Title </label>
                                                <input name="title" class="form-control" type="text" placeholder="Enter title name " id="member-name" value="@if(!empty($data)){{ $data->title }} @endif">
                                            </div>
                                        </div>
                                       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="member-name" class="col-form-label">Select Image</label>
                                                <input type="file" name="image" class="form-control"  
                                                    id="member-name">
                                                @if(!empty($data))
                                                  <img src="{{ url('uploads/events/' . $data->image) }}" alt=""  width="100" class="mt-2"> @endif"
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="additional-msg" class="col-form-label">Descriptions</label>
                                        <textarea name="description" class="form-control description" id="additional-msg">@if(!empty($data)){{ $data->description }} @endif"</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" type="button">@if(!empty($data)){{ "UPDATE"; }} @else{{ "ADD"; }} @endif</button>
                                    <button class="btn btn-danger" type="reset">RESEST</button>
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
