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
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-sm-12">
                <form id="register_form" action="{{url('/save-user')}}" method="POST" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img src="{{asset('assets/images/logo.png')}}" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign up</h3>
                                </div>
                            </div>

                            <div class="form-group form-primary">
                                <input type="text" name="sponser_id" id="sponser_id" class="form-control"
                                       value="<?=isset($_GET['reference']) ? $_GET['reference'] : ''?>" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Enter Sponser ID</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="name" id="name" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Username</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="email" name="email" id="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Your Email Address</label>
                            </div>
                            <div class="ph_no">
                                <div class="form-group form-primary">
                                    <input type="tel" name="mobile" id="mobile" class="form-control" maxlength="10">
                                </div>
                            </div>
                            <input type="hidden" id="mobile_isd" name="contact_no2_isd"
                                   value="91">
                            <input type="hidden" id="mobile_cid" name="contact_no2_cid"
                                   value="99">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" id="password" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-primary">
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" >
                                        <span class="form-bar"></span>
                                        <label class="float-label">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                        Register
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
        $('#register_form').validate({
            ignore: '',
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 100,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: function () {
                        if ($('#mobile_cid').val() == "99") {
                            return 10;
                        }
                        return '6';
                    },
                    maxlength: function () {
                        if ($('#mobile_cid').val() == "99") {
                            return '10';
                        }
                        return '15';
                    },
                },
                password:{
                    required: true,
                },
                confirm_password:{
                    required: true,
                    equalTo: '#password',
                }
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
    $(document).ready(function () {
        $("#mobile").intlTelInput({
            separateDialCode: true
        });
        $("#mobile").on("countrychange", function (e, countryData) {
            $('#mobile_isd').val(countryData.dialCode);
            $('#mobile_cid').val(countryData.cid);
            if ($('#mobile_cid').val() == '99') {
                $("#mobile").attr('maxlength', 10);
                $("#mobile").attr('minlength', 10);
            } else {
                $("#mobile").attr('minlength', 6);
                $("#mobile").attr('maxlength', 15);
            }
        });

    });


</script>
</html>
