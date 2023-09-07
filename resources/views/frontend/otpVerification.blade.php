<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <title>Mega Able bootstrap admin template by codedthemes </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description"
          content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
    <meta name="keywords"
          content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive"/>
    <meta name="author" content="codedthemes"/>
    <!-- Favicon icon -->

    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{asset('assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/font-awesome/css/font-awesome.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}"/>
    <style>

        .help-block-others, .required {
            font-size: 14px;
            line-height: 1em;
            color: #d93025 !important;
            font-family: 'Open sans';
        }
    </style>
</head>

<body themebg-pattern="theme1">
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">

            <div class="col-sm-12">

                <form method="POST" action="{{url('/loginWithOtp')}}" id="otp_form" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img src="{{asset('assets/images/logo.png')}}" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">OTP</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="otp" id="otp" class="form-control" placeholder="OTP" maxlength="6">
                                <input type="hidden" name="user_id" class="form-control" id="user_id" placeholder="Enter OTP"  value="{{$user_id}}">
                                <span class="form-bar"></span>
                                <label class="float-label">Your OTP</label>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">

                                    <div class="forgot-phone text-right f-right">
                                        <a href="{{url('re-send-otp/'.$user_id)}}" class="text-right f-w-600"> Re-Send OTP</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>

<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- waves js -->
<script src="{{asset('assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets/js/SmoothScroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- i18next.min.js -->

<script type="text/javascript" src="{{asset('assets/js/common-pages.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.js')}}"></script>
</body>

<script>

    jQuery(function () {
        $('#otp_form').validate({
            ignore: '',
            rules: {
                otp: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                },
            },
            messages: {
                confirm_password: {
                    equalTo: "Confirm Password does not match.",
                },
            },
            errorElement: "div",
            errorClass: "help-block-others",
            errorPlacement: function (error, element) {
                element.parent().after(error);
            },
            highlight: function (element) {
                if ($(element).attr('id') == 'contact_no1' || $(element).attr('id') == 'contact_no2') {
                    $(element).parent().parent().addClass("has-error");
                } else {
                    $(element).parent().addClass("has-error");
                }
            },
            unhighlight: function (element) {
                if ($(element).attr('id') == 'contact_no1' || $(element).attr('id') == 'contact_no2') {
                    $(element).parent().parent().removeClass("has-error");
                } else {
                    $(element).parent().removeClass("has-error");
                }
            },
            invalidHandler: function (form, validator) {

                if (!validator.numberOfInvalids())
                    return;
                $('html, body').animate({
                    scrollTop: $(validator.errorList[0].element).offset().top - 150
                }, "fast");
            },
            submitHandler: function (form) {
                $('input[type="submit"]').attr("disabled", true);
                $('.submit_btn').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });


</script>
</html>
