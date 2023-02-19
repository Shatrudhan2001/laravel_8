<div class="ad-footer-btm">
    <p>Copyright 2022 © BSRS All Rights Reserved.</p>
</div>
</div>
</div>
</div>


<!-- Preview Setting Box -->
<div class="slide-setting-box">
    <div class="slide-setting-holder">
        <div class="setting-box-head">
            <h4>Dashboard Demo</h4>
            <a href="javascript:void(0);" class="close-btn">Close</a>
        </div>
        <div class="setting-box-body">
            <div class="sd-light-vs">
                <a href="index.html">
                    Light Version
                    <img src="assets/images/light.png" alt="" />
                </a>
            </div>
            <div class="sd-light-vs">
                <a href="https://kamleshyadav.com/html/splashdash/splashdash-admin-template-dark/">
                    dark Version
                    <img src="assets/images/dark.png" alt="" />
                </a>
            </div>
        </div>
        <div class="sd-color-op">
            <h5>color option</h5>
            <div id="style-switcher">
                <div>
                    <ul class="colors">
                        <li>
                            <p class='colorchange' id='color'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color2'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color3'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color4'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='color5'>
                            </p>
                        </li>
                        <li>
                            <p class='colorchange' id='style'>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Preview Setting -->


<!-- Script Start -->
<script src="{{ url('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('admin/assets/js/popper.min.js') }}"></script>
<script src="{{  url('admin/assets/js/datatables.min.js')}}"></script>
<script src="{{  url('admin/assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('admin/assets/js/bootstrap.min.j') }}s"></script>
<script src="{{ url('admin/assets/js/swiper.min.js') }}"></script>
<script src="{{ url('admin/assets/js/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ url('admin/assets/js/apexchart/control-chart-apexcharts.js') }}"></script>

<!-- Page Specific -->
<script src="{{ url('admin/assets/js/nice-select.min.js') }}"></script>
<!-- Custom Script -->
<script src="{{ url('admin/assets/js/custom.js') }}"></script>
<script src="{{ url('admin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('web/js/jquery.validate.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    $("table").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv'
        ]
    });
});
CKEDITOR.replace('description');
</script>
<script>
$(document).ready(function() {
    $("#phone").val($("#phone").val().replace(/ +?/g, ''));
    // Check already Email..
    $("#email").blur(function() {
        if ($(this).val() != '') {
            $.ajax({
                url: "CheckAlreadyEmail",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    email: $(this).val()
                },
                success: function(res) {
                    if (res == '1') {
                        $("#showEmailError").html(
                            "<div class='text-danger  mt-1 mb-1'>Email id already registred !</div>"
                        );
                    } else {
                        $("#showEmailError").html("");
                    }

                }

            })
        }
    });


    $("#cpassword").keyup(function() {
        let cpassword = $(this).val();
        let password = $("#password").val();
        if (cpassword != '' && password != '') {
            if (cpassword !== password) {
                $("#showPassError").html(
                    "<div class='text-danger  mt-1 mb-1'>Password not matched!</div>");
            } else {
                $("#showPassError").html(
                    "<div class='text-success  mt-1 mb-1'>Password Matched!</div>");
            }
        }
    });

    $("#password").keyup(function() {
        let password = $(this).val();
        let length = password.length;
        if (length >= 8) {
            $("#showPass").html("");
        } else {
            $("#showPass").html(
                "<div class='text-danger  mt-1 mb-1'>Password will be atleast 8 character!</div>");
        }
    });

    $("#userForm").validate({
        rules: {
            name: "required",
            // email: "required",
            password: "required",
            cpassword: "required",
            // phone: {
            //   required:true,
            //   minlength:10,
            //   maxlength:11,
            //   number: true
            // },
            block: "required",
            pocket_id: "required",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});
</script>
</body>

</html>