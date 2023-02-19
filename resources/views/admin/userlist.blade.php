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

                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <form action="{{ url('uploadcsv') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <label>Upload Excel</label><br>
                                        <input type="file" name="file">
                                        <button type="submit" name="submit" class="btn btn-info">Upload</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('add-member') }}" class="btn btn-success btn-sm"
                                        style="float: right;"><i class="fa fa-plus"></i>
                                        Add </a>
                                </div>
                            </div>


                        </div>

                        <div class="card-body">

                            @error('image')

                            <div class="alert alert-danger mb-2 col-lg-6 offset-3 text-center">{{ $message }}</div>

                            @enderror

                            @if (session('status'))

                            <div class="alert alert-success mb-2 col-lg-6 offset-3 text-center">

                                {{ session('status') }}

                            </div>

                            @endif



                            <div class="chart-holder">

                                <div class="table-responsive">

                                    <table class="table table-styled mb-0">

                                        <thead>

                                            <tr>



                                                <th>S.no</th>

                                                <th>Image</th>

                                                <!-- <th>Block</th> -->

                                                <th>Packet Id</th>

                                                <th>Name</th>

                                                <th>Email</th>

                                                <th>Mobile</th>

                                                <th>Opening Balance</th>

                                                <th>Amouont</th>

                                                <th>Closing Balance</th>

                                                <th>Payment Mode</th>

                                                <th>Sub Reg</th>

                                                <th>Reg Signature</th>

                                                <th>Ownership</th>

                                                <th>Date</th>

                                                <th>Payment history</th>

                                                <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            @php $i = 1; @endphp

                                            @foreach ($data as $item)

                                            <tr>

                                                <td>{{ $i++ }}</td>

                                                <td><img src="{{ url('uploads/users/' . $item->image) }}" alt=""
                                                        width="40" height="40">

                                                </td>

                                                <!-- <td> {{ 'BLOCK: '.$item->block }}</td> -->

                                                <td>{{ $item->pocket_id }}</td>

                                                <td>{{ $item->name }}</td>

                                                <td>{{ $item->email }}</td>

                                                <td>{{ $item->phone }}</td>

                                                <td>{{ $item->opening_balance }}</td>

                                                <td>{{ $item->amount }}</td>

                                                <td>{{ $item->closing_balance }}</td>

                                                <td>{{ $item->payment_mode }}</td>

                                                <td>{{ $item->sub_recd }}</td>

                                                <td>{{ $item->res_signature }}</td>

                                                <td>{{ $item->ownership }}</td>

                                                <td>{{ $item->created_at }}</td>

                                                <td><a href="{{ url('payment-history/' . $item->id) }}"
                                                        class='btn btn-info'><i class=' far fa-eye'></i></a>

                                                </td>

                                                <td><a href="{{ url('edit-user/' . $item->id) }}"
                                                        class='btn btn-success'><i class=' far fa-edit'></i></a>

                                                    <a href="{{ url('delete-user/' . $item->id) }}"
                                                        class='btn btn-danger'><i class='far fa-trash-alt'></i></a>

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

            </div>

        </div>

        <!-- Products view Start -->

        @endsection

    </div>

</div>