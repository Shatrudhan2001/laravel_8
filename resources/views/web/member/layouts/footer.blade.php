<!-- Main Footer -->
<footer class="main-footer margin-top">
    <div class="icon-one" style="background-image: url(web/images/icons/icon-1.png)"></div>
   
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="clearfix">

                <div class="pull-left">
                    <div class="copyright">Copyrights &copy; 2022 Bhavsagar Residential Society All Rights
                        Reserved.</div>
                </div>
                <div class="pull-right">
                    <ul class="footer-nav">
                        <li><a href="#">Powerd by :- </a></li>
                        <li><a href="#">Indowebtech.com</a></li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

</div>
<div class="scroll-to-tops scroll-to-target" data-bs-target="html"><span class="fa fa-angle-up"></span></div>

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
<script src="{{  url('admin/assets/js/datatables.min.js')}}"></script>
<script src="{{  url('admin/assets/js/dataTables.responsive.min.js')}}"></script>

</body>

</html>
<script>
$(document).ready(function(){
   $("table").DataTable(); 
    /* Check Already exist email id */
    $("#email").blur(function(){
       if($(this).val() != ''){
           $.ajax({
                url : "checkEmail",
                type : "post",
                data : {"_token" : "{{ csrf_token() }}", email : $(this).val()},
                success : function(res){
                   if(res == '1'){
                        $("#showEmailError").html("<div class='text-danger  mt-1 mb-1'>Email id already registred !</div>");
                    }
                    else{
                        $("#showEmailError").html("");
                    }
                   
                }

           })
        }
    });
    
    /* End */
    
    
    $("#formData").validate({
        rules: {
        name: "required",
        email: "required",
        phone: "required",
        },
        
        messages: {
        name: "Please enter your firstname",
        email: "Please enter email address",
        phone: "Please enter your mobile number"
        },
        submitHandler: function(form) {
        form.submit();
        }
    });
    
    $(".rental_show").css('display','none');
    /* Ownership */
    $('#ownership').change(function(){
       let val = $(this).val();
       if($(this).val() == 'rental'){
           $(".rental_show").css('display','block');
       }
       else{
           $(".rental_show").css('display','none');
       }
    });
    
    
    $("#submitBtn").click(function(){
        $('.preloadergig').css('display','block');
        // setTimeout(settime,10000);
        // function settime(){
        //     $('.preloadergig').css('display','block');
        //     $('.formhide').hide();
        // }
        
    });

});
</script>
























