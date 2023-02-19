@extends('admin.layouts.main')
@section('main.container')
    <!-- Container Start -->
    <div class="page-wrapper">
        <div class="main-content">
            <!-- Page Title Start -->
            <div class="row">
                <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-title-wrapper">
                        <div class="page-title-box">
                            <h4 class="page-title">Banner</h4>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li class="breadcrumb-link">
                                    <a href="{{ url('/dashboard') }}"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                </li>
                                <li class="breadcrumb-link active">Banner</li>
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
                                    <div class="alert alert-danger mb-2 col-lg-6 text-center">{{ $message }}</div>
                                @enderror
                                @if (session('status'))
                                    <div class="alert alert-success mb-2 col-lg-6 text-center">
                                        {{ session('status') }}</div>
                                @endif

                                <form method="post" action="{{ route('banner') }}" enctype="multipart/form-data">
                                    <input type="hidden" name="id"
                                        value="@if (request('id') != null) {{ request('id') }} @endif">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <input class="form-control" type="file" name="image">
                                                @if (request('id') != null)
                                                    <img src="{{ url('uploads/banners/' . $data->image) }}" alt=""
                                                        width="100" class="mt-2">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="form-group mb-0">
                                                <button class="btn btn-primary" type="submit">
                                                    @if (request('id') != null)
                                                        Update
                                                    @else
                                                        Add
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                @if (request('id') == null)
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>image</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = 1; @endphp
                                                    @foreach ($banner_list as $item)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td><img src="{{ url('uploads/banners/' . $item->image) }}"
                                                                    alt="" width="100">
                                                            </td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td><a href="{{ url('edit-banner/' . $item->id) }}"
                                                                    class='btn btn-success'><i
                                                                        class=' far
                                                                                                                                                                                                                                                                                    fa-edit'></i></a>
                                                                <a href="{{ url('delete-banner/' . $item->id) }}"
                                                                    class='btn btn-danger'><i
                                                                        class='far fa-trash-alt'></i></a>
                                                            </td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Products view Start -->
        @endsection
