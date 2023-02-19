@extends('web.layouts.main')
@section('main.container')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ url('web/images/background/2.jpg') }})">
        <div class="auto-container">
            <h1>News and Updates</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>News and Updates</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->


    <!-- About Section -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="our-blogs">
                        @if(!empty($news_list))
                        @foreach($news_list as $r)
                        <!-- News Block Two -->
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ url('news-details/'.$r->id)}}"><img src="{{ url('uploads/news/'.$r->image) }}" alt="" /></a>
                                @php
                             $datetime = new DateTime($r->created_at);
                            @endphp        
                            <div class="post-date"> 
                            {{ $datetime->format('d');  }}<br><span>{{ strtoUpper($datetime->format('F')); }}</span></div>
                                </div>
                                <div class="lower-content">

                                    <h3><a href="{{ url('news-details/'.$r->id)}}">{{ $r->title }}</a></h3>
                                    <div class="text">
                                        {{\Illuminate\Support\Str::limit(strip_tags($r->description, 100))}}
                                    </div>
                                    <div class="btn-box">
                                        <a href="{{ url('news-details/'.$r->id)}}" class="read-more theme-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                       
                        <!-- Paginations -->
                        <div class="pagination-outer">
                            <div class="styled-pagination text-center">
                                <ul class="clearfix">
                                    <li class="prev"><a href="#"><span class="fa fa-angle-double-left"></span>
                                        </a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#"><span class="fa fa-angle-double-right"></span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">



                        <!-- category -->
                        <div class="sidebar-widget category-widget-two">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h5>Categories</h5>
                                </div>

                                <ul class="cat-list-two">
                                    <li><a href="#">Covid-19 (Coronavirus)</a></li>
                                    <li><a href="#">Staphylococcus</a></li>
                                    <li><a href="#">Influenza (Flu)</a></li>
                                    <li><a href="#">EV-D68 & Paralysis</a></li>
                                    <li><a href="#">Mold & MRSA</a></li>
                                    <li><a href="#">All Types Bacteria</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Popular Posts -->




                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!-- End About Section -->






    <!-- Call To Action Section Two -->
    <section class="call-to-action-section-two">
        <div class="auto-container">
            <div class="inner-container" style="background-image: url({{ url('images/background/pattern-2.png') }})">
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
