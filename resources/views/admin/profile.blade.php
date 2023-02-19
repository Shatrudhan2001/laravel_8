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
                   <div class="col-xl-6 offset-3">
				<div class="card"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
					<div class="card-header">
						<h4 class="card-title mb-0">My Profile</h4>
                         @if (session('status'))
                                <div class="alert alert-success mb-2 col-lg-6 offset-3 text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
						<div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<!-- <form> -->
							<div class="profile-title">
								<div class="media ad-profile2-img">                        
									<div class="media-body">
										<h5 class="mb-1">{{ Session::get('userData')['name'] }}</h5>
										
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Email</label>
								<input type='text' class="form-control" data-bs-original-title="" value="{{ session::get('userData')['email'] }}" title="" readonly>
								
							</div>
							<form method="post" action="{{ url('/UpdateProfile') }}">
								@csrf
								<div class="mb-3">
									<label class="form-label">Old Password</label> 
									<input class="form-control" type="text" value="{{ session::get('userData')['password_view'] }}" readonly>
								</div>
                                <div class="mb-3">
									<label class="form-label">New Password</label> 
									<input class="form-control @error('newpass') is-invalid @enderror" type="password" name="newpass" placeholder="Create New Password">
                                    @error('newpass')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
								</div>
								<div class="mb-3">
									<label class="form-label">Confirm Password</label>
									<input class="form-control  @error('cpass') is-invalid @enderror" name="cpass" type="password" placeholder="Comfirm Password">
                                    @error('cpass')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
								</div>
								
								<div class="form-footer">
									<button class="btn btn-primary squer-btn" data-bs-original-title="" title="">UPDATE</button>
								</div>
							</form>
							
							<!-- </form> -->
						</div>
					</div>
			</div>
                <!-- Products view Start -->
            @endsection
        </div>
    </div>
