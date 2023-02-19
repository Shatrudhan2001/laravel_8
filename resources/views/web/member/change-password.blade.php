@extends('web.member.layouts.main')
@section('main.container')
  <section class="team-detail-section" style="margin-bottom: 200px;">
		<div class="auto-container">
			<div class="row clearfix" style="margin: 0 auto; width: 50%">
				 @if(session('status'))
				 <?php 
				    echo '<script>
				        setTimeout(myfun1, 100);
                        function myfun1(){
                            $(".loaderGif").css("display", "block");
                        }
				 
				 </script>'; ?>
                 <div class = "alert alert-info text-center col-lg-6 offset-3 loaderGif" style="display: none;">
                 <b>{{ session('status') }}</b> 
                 </div>   
                @endif
                
                <h3 class="text-center formhide" style="background: #e5e5e5;">{{ $title }}</h3>
				<div class="content-column formhide">
				    
                    <form class="row g-3 mt-3" method="post" action= "{{ url('update-password')}}" enctype="multipart/form-data">
                        @csrf
                        
                        <button type="submit" class="btn btn-primary shadow p-2 rounded mt-3" id="submitBtn">Send Request</button>
                    
                    </form>
				</div>
			</div>
			<div>
			    <center><img src="{{ url('public/loading.gif'); }}" width="300" class="preloadergig" style="display: none;"></center>
			</div>
		</div>
	</section>
@endsection
