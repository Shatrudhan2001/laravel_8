@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>Vision and Mission</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Vision and Mission</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <section class="about-section">
        <div class="icon-one" style="background-image: url({{ url('web/images/icons/covid.png') }})"></div>
        <div class="icon-two" style="background-image: url({{ url('web/images/icons/icon-1.png') }})"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Images Column -->
                <div class="images-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="row clearfix">
                            <!-- Column -->
                             @if(!empty($data['image']))
                             <img src="{{ url('uploads/abouts/'.$data['image']) }}" alt="" />
                            @else
                            
                           
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <div class="image">
                                    <img src="{{ url('web/images/resource/about-1.jpg') }}" alt="" />
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <div class="image">
                                    <img src="{{ url('web/images/resource/about-2.jpg') }}" alt="" />
                                </div>
                                <div class="image">
                                    <img src="{{ url('web/images/resource/about-3.jpg') }}" alt="" />
                                </div>
                            </div>
                         @endif
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--<div class="title2">Bhavsagar Residential Society</div>-->
                        <!--<h2>Welcome to BSRS</h2>-->
                        <div class="text" align="justify">
                            @if(!empty($data['description']))
                             <?= $data['description']; ?>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->






    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url({{ url('web/images/background/pattern-2.png') }})">
                <h3>Feel free to contact us with any questions or concerns <br> you may have. We’ll always be happy
                    to assist.</h3>
                <ul>
                    <li><span class="icon flaticon-phone-call"></span>+91 9876543210</li>
                    <li><span class="icon flaticon-email-1"></span>info@bsrs.in</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section Two -->
@endsection
