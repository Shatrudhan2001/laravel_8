@extends('web.layouts.main')
@section('main.container')
    <!--Main Slider-->
    <section class="main-slider">

        <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach($banner_list as $r)
            <div class="slide" style="background-image:url({{ url('uploads/banners/'.$r->image) }})">
                <div class="auto-container">

                    <!-- Content boxed -->
                    <div class="content-boxed">
                        <h1>Bhavsagar Residential <br> Society</h1>
                        <div class="text">Adipisicing elit sed do eiusmod tempor incididunt <br> labore
                            dolore magna
                            aliqua enim veniam</div>
                        <div class="link-box clearfix">
                            <a href="{{ url('about') }}" class="theme-btn btn-style-one"><span class="txt">learn
                                    more</span></a>
                            <a href="{{ url('contact') }}" class="theme-btn btn-style-two"><span class="txt">get
                                    in
                                    touch</span></a>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
           
        </div>

    </section>
    <!--End Main Slider-->

    <!-- Service Section -->
    <section class="service-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Service Block -->
                    <div class="service-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box card-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-box">
                                <div class="icon">
                                    <div class="svg-icon" id="svg-4"
                                        data-svg-icon="{{ url('web/images/svgs/sanifica-08.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="{{ url('/pay-online') }}" target="_blank">Pay Online</a></h3>
                            <p>Make a contribution to society's well-being.Every contribution counts.</p>
                            <a href="{{ url('/pay-online') }}" target="_blank" class="plus flaticon-plus-symbol"></a>
                        </div>
                    </div>

                    <!-- Service Block -->
                    <div class="service-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box card-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
                            <div class="icon-box">
                                <div class="icon">
                                    <div class="svg-icon" id="svg-5"
                                        data-svg-icon="{{ url('web/images/svgs/sanifica-03.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Join Society</a></h3>
                            <p>Are you an owner or resident? Join today to communicate with other Bhavsagar residential society owners and residents.</p>
                            <a href="#" class="plus flaticon-plus-symbol"></a>
                        </div>
                    </div>

                    <!-- Service Block -->
                    <div class="service-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box card-box wow fadeInRight" data-wow-delay="150ms" data-wow-duration="1500ms">
                            <div class="icon-box">
                                <div class="icon">
                                    <div class="svg-icon" id="svg-6"
                                        data-svg-icon="{{ url('web/images/svgs/sanifica-01.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="{{ url('/news') }}" target="_blank">Updates</a></h3>
                            <p>We wish to maintain communication with our members regarding our efforts. 
                                Don't miss out on our latest updates...
                                </p>
                            <a href="{{ url('/news') }}" target="_blank" class="plus flaticon-plus-symbol"></a>
                        </div>
                    </div>

                    <!-- Service Block -->
                    <div class="service-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box card-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="icon-box">
                                <div class="icon">
                                    <div class="svg-icon" id="svg-7"
                                        data-svg-icon="{{ url('web/images/svgs/sanifica-04.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <h3><a href="#">Help Center</a></h3>
                            <p>Let us know your doubts. We are available to assist you. Our team of experts will assist you with every difficulty.</p>
                            <a href="#" class="plus flaticon-plus-symbol"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Service Section -->

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
                            @if(!@empty($about['image']))
                                <img src="{{ url('uploads/abouts/'.$about['image']) }}" alt="" />
                           
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
                        <div class="text" align="justify">
                            <?php
                            $new_string =  mb_strimwidth(strip_tags($about['description']), 0, 2000, "...");
                            echo $new_string;
                            ?>
                           
                           
                        </div>
                        <a href="{{ url('about') }}" class="theme-btn btn-style-three"><span class="txt">Know
                                more...</span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->
    <section class="product-section">
        <div class="layer-one" style="background-image: url({{ url('web/images/background/pattern-1.png') }})">
        </div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">

                <h2>News and Updates</h2>
                <div class="text">Check out our latest activities and events.<br>
Be a part of our society.




                </div>
            </div>

            <div class="three-item-carousel owl-carousel owl-theme">

                <!-- Product Block -->
                @if(!empty($news_list))
                   
                    @foreach($news_list as $r)
                       
                        <div class="product-block">
                            <div class="inner-box card-box">
                                <div class="icon-outer">
                                    <div class="icon">
                                        <div class="svg-icon" id="id-1"
                                            data-svg-icon="{{ url('web/images/svgs/sanifica-14.svg') }}">
                                        </div>
                                    </div>
                                </div>
                                <h5><a href="#"><strong>{{ $r->title }}</strong></a></h5>
                                <div class="text">{{\Illuminate\Support\Str::limit(strip_tags($r->description, 20))}}</div>
                                <div class="read-box">
                                    <a href="{{ url('news-details/'.$r->id) }}" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
               
            </div>

        </div>
    </section>
    <!-- Call To Action Section -->
    <section class="call-to-action-section">
        <div class="auto-container">
            <div class="inner-container card-box margin-top">
                <div class="image">
                    <img src="{{ url('web/images/resource/call-to-action.jpg') }}" alt="" />
                </div>
                <div class="content">
                    <div class="phone-icon">
                        <div class="icon">
                            <div class="svg-icon" id="svg-08"
                                data-svg-icon="{{ url('web/images/svgs/sanifica-06.svg') }}">
                            </div>
                        </div>
                    </div>
                    <h3>Need Our Help or Have Questions?<br> Call Us <a href="tel:+1-030-987-4563">+91
                            98765543210</a></h3>
                    <div class="text">We Omnis iste natus error voluptatem accusantium dolremque
                        laudantis totam.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section -->





    <!-- Faq's Section -->
    <section class="faq-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Accordian Column -->
                <div class="accordian-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <!-- Sec Title -->
                        <div class="sec-title style-two">
                            <div class="title2">Frequently Asked Questions</div>
                            <h2>Read The FAQ’s</h2>
                        </div>

                        <!-- Accordian Box -->
                        <ul class="accordion-box">
                            @foreach($faqs_list as $r)
                            <!-- Block -->
                            <li class="accordion block active-block">
                                <div class="acc-btn">
                                    <div class="icon-outer"><span class="icon icon-plus fas fa-plus"></span>
                                        <span class="icon icon-minus fa fa-minus"></span>
                                    </div>{{ $r->question }}
                                </div>
                                <div class="acc-content current" style="display: none;">
                                    <div class="content">
                                        <div class="accordian-text">{{ $r->answer }}</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                           
                        </ul>

                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="title">
                        <h2>Complaint Form</h2>
                    </div>
                    <div class="inner-column">
                        <!-- Faq's Form -->
                        <div class="faq-form">
                            @if (count($errors) > 0)
                                <div class = "alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('status'))
                                <div class="alert alert-success mb-2 col-lg-6 offset-3 text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <!-- Contact Form -->
                            <form method="post" action="{{ url('sendEnquiry') }}" id="formData">
                                @csrf
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="fname" placeholder="Your Name" required id="fname" value="{{ old('fname') }}">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="lname" placeholder="Last Name" required id="lname" value="{{ old('lname') }}">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required id="email" value="{{ old('email') }}">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="mobile" placeholder="Phone No." required id="mobile" value="{{ old('mobile') }}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Complaint"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="enquiry-form"><span
                                                class="txt">Submit</span></button>
                                    </div>

                                </div>
                            </form>

                            <!--End Contact Form -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Faq's Section -->
    <!-- Video Section -->
    <section class="video-section" style="background-image: url({{ url('web/images/background/1.jpg') }})">
        <div class="auto-container">
            <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image video-box"><span
                    class="flaticon-play-button"><i class="ripple"></i></span></a>
            <h4>Dolore eu fugiat nulla pariatur cupidatat non proident
                <br> officia deserunt mollit anim id est laborum
            </h4>
        </div>
    </section>
    <!-- End Video Section -->

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">Update Activities and Events</div>
                <h2>Recent Events</h2>
                <div class="text">Dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                    proident
                    <br> sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>

            <div class="row clearfix">

                <!-- News Block -->
                @if(!empty($event_list))
                @foreach($event_list as $r)
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <a href="#"><img src="{{ url('uploads/events/' . $r->image) }}" alt="" /></a>
                            <div class="post-date"> 
                            @php
                             $datetime = new DateTime($r->created_at);
                            @endphp 
                            {{ $datetime->format('d F Y');  }}</div>
                        </div>
                        <div class="lower-content">

                            <h4><a href="#">{{ $r->title }}</a></h4>
                            <div class="text">{{\Illuminate\Support\Str::limit(strip_tags($r->description, 20))}}</div>
                            <a href="{{ url('events-details/'.$r->id) }}" class="read-more theme-btn">View More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
               

            </div>
        </div>
    </section>
    <!-- End Blog Section -->

    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container"
                style="background-image: url({{ url('web/images/background/pattern-2.png') }})">
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
