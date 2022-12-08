@extends('auth.layouts.app')

@section('content')

    <style>

        .custom-h-50 {
            height: 40%;
        }
        .width-35{
            width: 35%;
        }
        .custom-from-height {
            height: 365px;
        }
        form .error {
            color: #cc2936;
        }
        label.error {
            position: absolute;
            top: 52px;
        }
        .bg-custom{
            background: url('{{ asset("assets/images/loginbg.png") }}');
            background-position: bottom center; 
            background-repeat: 
            no-repeat; 
            background-size: cover;
        }
        .body-custom-color{
            background-color: #191e24;
        }
        .form-check-input[type=checkbox] {
            border-radius: 0.15em !important;
        }
        .form-check-input:checked[type=checkbox] {
            background-image: url('{{ asset("assets/images/redcheck.svg") }}') !important;
        }
        .form-check-input:checked {
            background-color: #ffffff !important;
            border: 1px solid rgb(255, 255, 255) !important;
        }
	.h1-custom-font , .h1-custom-font-1 {
    		font-family: Kontanter;
	}
	.h1-custom-font {
   	      font-size:70px;
	}
        @media screen and (max-width: 992px) {
	.h1-custom-font {
   	      font-size: 55px;
	}
        }
        @media screen and (max-width: 767px) {
            .custom-h-50 {
                height: 0%;
            }
            .custom-div-padding, .custom-signup-div-padding {
                padding: 0% !important;
            }
            /* .custom-from-height {
                height: 400px;
            } */
        }

    </style>

    <section class="col-12 custom-padding blocktext">
        <div class="container">
            <div class="">
                <div class="row" style="height: 100vh;">
                    <div class="col-md-5 col-12 m-auto ">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/CoachCultureLogo.png') }}" alt="" class="width-35 mb-4">
                        </div>
                        <div class="text-md-start text-center mt-3 mb-4 padding-10">
                            <h1 class="text-danger fw-bolder mb-0 h1-custom-font " style="" >CoAch</h1>
                            <h1 class="text-danger fw-bolder mb-0 h1-custom-font " style="" >Culture</h1>
                        </div>
                    </div>
                    <div class="col-md-1 col-0 text-end custom-buttom-right m-auto custom-h-50">
	   	<img src="{{ asset('assets/images/red-border.png') }}" style="    height: 100%;" />
	</div>
                    <div class="col-md-6 col-12 m-auto custom-buttom custom-div-padding">
                        <div class="form custom-from-height custom-login p-5" style="background-color: #191e24;  border-radius: 12px;">

                            <ul class="tab-group p-0">
                                <button class="btn tab active login p-0">
                                    <a href="#login" class="text heavy " style="font-size: 18px !important;">Login</a>
                                </button>
                                <button class="btn tab signup">
                                    <a href="#signup" class=" text-white heavy " style="font-size: 18px !important;">SignUp</a>
                                </button>
                            </ul>

                            <div class="tab-content mt-4">
                                <div id="login">
                                    <form method="POST" action="{{ route('login') }}" id="login_form" class="custom-login-form bold">
                                        @csrf
                                        <div class="input-group "  style="    margin-bottom: 30px !important;">
                                            <label class="input-group-prepend" for="Username">
                                                <div class="input-group-text">
                                                    <i class="bi bi-person-fill" style="font-size:21px;"></i>
                                                </div>
                                            </label>
                                            <input type="text" class="form-control background_transparent" id="Username" name="username" placeholder="Username">
                                        </div>

                                        <div class="input-group " style="    margin-bottom: 30px !important;">
                                            <label class="input-group-prepend" for="InputPassword">
                                                <div class="input-group-text">
                                                    <i class="bi bi-lock-fill" style="font-size:21px;"></i>
                                                </div>
                                            </label>
                                            <input type="password" class="form-control background_transparent" id="InputPassword" name="password" placeholder="Password">
                                        </div>

                                        <div class="form-group form-check mb-3 checkbox-input">
                                            <input type="checkbox" class="form-check-input text-white " style="border: 2px solid #CC2936 !important;" id="exampleCheck1">
                                            
                                            <label class="form-check-label text-white noselect semibold" for="exampleCheck1"> Remember Me </label>
                                        </div>

                                        <div class="field-wrapper text-center">
                                            <button type="submit" style="padding: 7px 12px!important; border: 5px solid #fff;" class="btn custom-danger mt-1 rounded-circle">
                                                <i class="bi bi-arrow-right text-white"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div id="signup" style="display: none;">
                                    <form action="/" method="post">
                                        <div class="text-center semibold" style="margin: 10px 0; padding: 10px; border: 5px solid #fff; border-radius: 10px; ">
                                            <p class="text-white mb-0" style="font-weight: 800; font-size:18px;">To Sign Up on CoachCulture,you</p>
                                            <p class="text-white mb-0" style="font-weight: 800; font-size:18px;">need to download our mobile</p>
                                            <p class="text-white mb-0" style="font-weight: 800; font-size:18px;">application from the Google Play</p>
                                            <p class="text-white " style="font-weight: 800; font-size:18px;">or Apple App Store.</p>

                                            <div class="row" style=" margin:10px;padding:5px 0 7px 0; border: 5px solid #fff; border-radius: 10px; font-weight: 700;">
                                                <div class="col-3 m-auto">
                                                    <img class="w-75" src="{{ asset('assets/images/AppleAppStoreLogo.png') }}" alt="">
                                                </div>
                                                <div class="col-9 text-white m-auto text-start p-0">
                                                   <a href="https://www.apple.com/in/app-store/" target="_blank" class="align-middle semibold">
                                                        Get it from the Apple App Store
                                                   </a>
                                                </div>
                                            </div>

                                            <div class="row" style=" margin: 10px; padding: 5px 0 5px 0; border: 5px solid #fff; border-radius: 10px;font-weight: 700;">
                                                <div class="col-3 m-auto">
                                                    <img style="width:55% !important" src="{{ asset('assets/images/GoogleLogo.png') }}" alt="">
                                                </div>
                                                <div class="col-9 text-white text-start m-auto p-0">
                                                    <a href="https://play.google.com/store/" target="_blank" class="align-middle semibold">
                                                        Get it from the Google Play Store
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                   <!--   <div class="text-center">
                                        <a href="{{ route('signUpAsCoach') }}" class="btn btn-primary">Sign up as coach </a>
                                    </div>  -->
                                    <!-- <div class="text-center">
                                        <a href="{{ route('code') }}" class="btn btn-primary">code</a>
                                    </div> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('script')

    <script>
        $(function() {
            $("#login_form").validate({
                rules: {
                    username: "required",
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                // Specify validation error messages
                messages: {
                    username: "Please enter your username",
                    password: {
                        required: "Please enter a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                },
            });
        });

        $('.tab a').on('click', function(e) {

            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            // $(this).parent().addClass('bg-custom');
            // $(this).parent().siblings().removeClass('bg-custom');
            target = $(this).attr('href');

            $('.tab-content > div').not(target).hide();

            $(target).fadeIn(600);

        });
        jQuery(function() {            

            //Settings tab close
            jQuery('.signup , .signup a ').click(function(e) {
                jQuery(this).closest('.bg-custom').removeClass('bg-custom');
                jQuery(this).closest('.p-5').removeClass('p-5');
                $('.custom-body-bg').addClass('body-custom-color');
                    e.stopPropagation();
            });
            jQuery('.login , .login a').click(function() {  
                jQuery(this).closest('.body-custom-color').removeClass('body-custom-color');  
                // jQuery(this).addClass('bg-custom');
                $('.custom-body-bg').addClass('bg-custom');
                $('.custom-from-height').addClass('p-5');
            });
            
        });
    </script>

@endsection
