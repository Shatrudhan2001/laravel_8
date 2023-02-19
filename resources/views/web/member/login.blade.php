<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>::. Bhavsagar Residential Society .::</title>

    <!-- Stylesheets -->
    <link href="{{ url('web/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/responsive.css') }}" rel="stylesheet">

    <!-- Color Switcher Mockup -->
    <link href="{{ url('web/css/color-switcher-design.css') }}" rel="stylesheet">

    <!-- Color Themes -->
    <link id="theme-color-file" href="{{ url('web/css/color-themes/default-theme.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ url('web/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('web/images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .error{
        color: red !important;    
    }
    </style>

</head>

<body>

    <div class="page-wrapper">
   <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-header text-center">
                 <img src="{{ url('web/images/bsrs.png') }}" class="logo-n" style="height: 65px; margin: auto;">
                 <h3 style="margin-top: 10px;">Member Login</h3>
            </div>
          <div class="card-body p-5">
          @if(session('status'))
            <div class="alert alert-danger text-center">
            <b>{{ session('status') }}</b>
            </div>
            @endif
          <form action="{{ url('/MemberLoginProcess') }}" method="post">
                @csrf
               <div class="form-outline mb-4">
                    <label class="form-label" for="typeEmailX-2">Email</label>
                    <input type="email" id="typeEmailX-2" name="email" class="@error('email') is-invalid @enderror form-control form-control-lg" />
                    @error('email')
                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <input type="password" name="password" class="@error('password') is-invalid @enderror form-control form-control-lg" />
                     @error('password')
                    <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
             <button class="btn btn-primary btn-lg btn-block form-control" type="submit">Login</button>
             <div class="d-flex flex-wrap justify-content-between m-2">
                <a href="{{ url('member-registration') }}"><u>New Member</u></a>
                {{-- <a href="#">Forget Password</a> --}}
             </div>
             
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="{{ url('web/js/jquery.js') }}"></script>

<script src="{{ url('web/js/bootstrap.min.js') }}"></script>
<script src="{{ url('web/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ url('web/js/jquery.fancybox.js') }}"></script>
<script src="{{ url('web/js/jquery.fancybox.js') }}"></script>
<script src="{{ url('web/js/appear.js') }}"></script>
<script src="{{ url('web/js/nav-tool.js') }}"></script>
<script src="{{ url('web/js/mixitup.js') }}"></script>
<script src="{{ url('web/js/owl.js') }}"></script>
<script src="{{ url('web/js/wow.js') }}"></script>
<script src="{{ url('web/js/isotope.js') }}"></script>
<script src="{{ url('web/js/vivus.min.js') }}"></script>
<script src="{{ url('web/js/jquery-ui.js') }}"></script>
<script src="{{ url('web/js/script.js') }}"></script>
<script src="{{ url('web/js/color-settings.js') }}"></script>
<script src="{{ url('web/js/jquery.validate.min.js') }}"></script>

</body>

</html>
<script>
$(document).ready(function(){
    $("#formData").validate({
        rules: {
        name: "required",
        email: "required",
        phone: "required",
        },
        submitHandler: function(form) {
        form.submit();
        }
    });

});
</script>