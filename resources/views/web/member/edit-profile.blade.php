@extends('web.member.layouts.main')
@section('main.container')
  <section class="team-detail-section">
		<div class="auto-container">
			<div class="row clearfix">
				 @if(session('status'))
                    <div class="alert alert-success text-center">
                    <b>{{ session('status') }}</b>
                    </div>
                @endif

                <h3 class="text-center" style="background: #e5e5e5;">{{ $title }}</h3>
               
				<div class="content-column col-lg-12 col-md-12 col-sm-12 card p-4">
                    
                    <form class="row g-3" method="post" action= "{{ url('update-member')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="text" class="form-control @error ('name') is-invalid @enderror" id="inputEmail4" name="name" id="name" value="{{ $data->name }}">
                            @error('name')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror


                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Mobile</label>
                            <input type="text" class="form-control  @error ('mobile') is-invalid @enderror" id="inputEmail4" id="mobile" name="mobile" value="{{ $data->phone }}">
                             @error('mobile')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name="email" id="email"  class="form-control  @error ('email') is-invalid @enderror" id="inputEmail4" value="{{ $data->email }}">
                             @error('email')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="inputPassword4">
                            @if($data->image != ''){
                                <img src="{{ url('uploads/users/' . $data->image) }}" alt="" width="100">
                            }
                            @endif
                        </div>
                        <div class="col-12">
                           
                            <div class="form-group purple-border">
                            <label for="exampleFormControlTextarea4">Address</label>
                            <textarea class="form-control @error ('address') is-invalid @enderror" id="exampleFormControlTextarea4" name="address" rows="3">{{ $data->address }}</textarea>
                             @error('address')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
				</div>
				
			</div>
		</div>
	</section>
@endsection
