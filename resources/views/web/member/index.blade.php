@extends('web.member.layouts.main')
@section('main.container')
  <section class="team-detail-section" style="margin-bottom: 175px;">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Content Column -->
				<div class="content-column col-lg-9 col-md-12 col-sm-12">
					
                    <div class="grey-bg container-fluid">
                    <section id="minimal-statistics">

                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 cart_p"> 
                                <div class="card">
                                    <div class="card-content bg-primary">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="icon-pencil primary font-large-2 float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h3>100000</h3>
                                            <span>Total Pay</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 cart_p">
                            <div class="card">
                                <div class="card-content bg-success">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-speech warning font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3>156</h3>
                                                <span>Success Payment</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-3 col-sm-6 col-12 cart_p">
                            <div class="card">
                                <div class="card-content bg-danger">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-speech warning font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3>156</h3>
                                                <span>Failed Payment</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-3 col-sm-6 col-12 cart_p">
                            <div class="card">
                                <div class="card-content bg-info">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-speech warning font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3>156</h3>
                                                <span>Notice</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </section>
                    </div>
				</div>
               
                <!-- Info Column -->
				<div class="info-column col-lg-3 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
                        @if(!empty($data->image))
							<img src="{{ url('uploads/users/' . $data->image) }}" alt="" style="height: 101px; width: 140px;">
                        @else
                        <img src="{{ url('web/images/resource/team-8.jpg') }}" alt="" style="height: 101px; width: 140px;">
                        @endif
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
@endsection
