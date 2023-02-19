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
                                <a href="{{ url('AddTeam') }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-plus"></i> Add </a>
                            </div>
                            <div class="card-body">
                                @error('image')
                                    <div class="alert alert-danger mb-2 col-lg-6 offset-3 text-center">{{ $message }}</div>
                                    @enderror @if (session('status'))
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
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Designation</th>
                                                        <th>Image</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($team_list as $item)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                             <td>{{ $item->designation }}</td>
                                                            <td><img src="{{ url('uploads/teams/' . $item->image) }}" alt=""
                                                                    width="100">
                                                            </td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td><a href="{{ url('edit-team/' . $item->id) }}"
                                                                    class='btn btn-success'><i
                                                                        class=' far
                                                                                                                                                                                                                                                                                                                                                                                                                                                            fa-edit'></i></a>
                                                                <a href="{{ url('delete-team/' . $item->id) }}"
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
