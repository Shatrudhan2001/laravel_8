@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>{{  $title }}</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{  $title }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
   <section class="about-section">
       
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <div class="faq-form">
                     
                     <!-- Contact Form -->
                    @if(session('status'))
                        <div class="alert alert-success text-center">
                            <b>{{ session('status') }}</b>
                        </div>
                     @endif
                     <h3 class="text-center">Donation Form</h3>
                     <form method="post" action="{{ url('donate') }}" id="formData">
                     @csrf
                        <div class="row clearfix">
                        
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" id="name" name="name" placeholder="Your Name*" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                              @error('name')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="email" name="email" id="email" placeholder="Email*" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                               @error('email')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" name="mobile" id="mobile" placeholder="Mobile No." class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}">
                               @error('mobile')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="number" min='1' name="amount" id="amount" placeholder="Amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">
                               @error('amount')
                                <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" name="address" id="address" placeholder="Address" class="form-control" value="{{ old('address') }}">
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" name="city" id="city" placeholder="City" class="form-control" value="{{ old('city') }}">
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                              <input type="text" name="state" id="state" placeholder="State" class="form-control" value="{{ old('state') }}">
                           </div>
                           
                           
                           <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                              <button class="theme-btn btn-style-one" type="submit"><span class="txt">Submit</span></button>
                           </div>
                           
                        </div>
                     </form>
                     
                     <!--End Contact Form -->
                  </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
