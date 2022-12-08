@extends('coach.layouts.appwithoutheader')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">

<style>
    input {
        padding: 0px !important;
    }

    .allscreen-custom-height {
        height: 90vh;
        margin-top: 8%;
    }

    .custom-count-bg {
        background: url('{{ asset("assets/images/Rectangle.png") }}');
         background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        margin: 5px !important;
        /* background: url(images/Rectangle.png);  */
    }

    .custom-count-bg h1,
    .custom-dot-bottom {
        font-size: 62px;
    }

    ol.screen3-ol li {
        font-size: 20px;
        letter-spacing: 0.2px;
    }

    .digit-group input {
        width: 25px;
        height: 40px;
        /* background-color: lighten(#526070, 5%); */
        background: #526070;
        border: none;
        line-height: 50px;
        text-align: center;
        font-size: 24px;
        font-family: "Raleway", sans-serif;
        font-weight: 200;
        color: white;
        margin: 0 2px;
    }

    .digit-group .splitter {
        padding: 0px;
        color: white;
        font-size: 24px;
    }

    .prompt {
        margin-bottom: 20px;
        font-size: 20px;
        color: white;
    }

    .digit-group input:focus {
        outline: 0;
        box-shadow: none !important;
    }

    .sc13-border-custom-height {
        height: 50%;
    }

    span#demo {
        text-align: end;
        position: absolute;
        margin-top: 6px;
        margin-left: 23px;
        color: #C12734;
    }

    .h1-custom-font-1 {
        font-size: 80px;
    }

    @media screen and (max-width:992px) {
        .custom-count-bg h1 {
            font-size: 39px;
            margin-bottom: 0px;
        }

        .custom-dot-bottom {
            font-size: 35px;
        }


    }

    @media screen and (max-width:767px) {
        .allscreen-custom-height {
            height: auto;
        }

        .sc13-border-custom-height {
            height: 5%;
        }

        .custom-count-bg h1,
        .custom-dot-bottom {
            font-size: 62px;
        }

    }

    @media screen and (max-width: 375px) {

        .custom-count-bg h1,
        .custom-dot-bottom {
            font-size: 44px;
        }

        .h1-custom-font-1 {
            font-size: 55px;
        }

    }
</style>

<section class="custom-padding blocktext">
    <div class="container">
        <div class="">
            <div class="row allscreen-custom-height" style="padding: 12px;">

                <div class="col-md-6 col-12 m-md-auto mb-5">

                    <div class="text-md-start text-center mt-3 mb-4">
                        <h1 class="text-danger text-md-start text-center fw-bolder h1-custom-font h1-custom-font-1">CoAch</h1>
                        <h1 class="text-danger text-md-start text-center fw-bolder h1-custom-font h1-custom-font-1">Culture</h1>
                    </div>

                </div>

                <div class="col-md-6 col-12 custom-buttom m-auto p-sm-4 p-0" style=" z-index:1;">
                    <div class="p-4" style="background: #191e24f2;  border-radius: 15px; z-index:1;">

                        <h4 class="text-white text-center mb-4 heavy" >Welcome to CoachCulture.</h4>

                        <p class="text-secondary text-center" style="font-size: 20px;">
                           We have <b class="heavy text-white"> reached our target number of coaches </b> and the pre-launch signup phase has now closed. <br> Thanks to everyone who signed up. We will reach out to you regarding <b class="text-white heavy"> next steps </b> soon.
                        </p>

                        <div class="text-center row">
                           <div class="col-1"></div> 
	  <div class=" col-10 text-center mb-3 p-0">
                                    <div class="row justify-content-center">
                            @if ($goal_count != "")
                            @foreach(str_split($goal_count) as $info)
                            @if ($info == ".")
                            <div class="col-1  p-0">
                                <h1 class=" custom-dot-bottom mb-0" style="line-height: 2;    color: #afafaf;">{{ $info }}</h1>
                            </div>
                            @else
                            <div class="col-2 custom-count-bg m-auto position-relative">
                                <h1 class="text-white mb-0" style="line-height: 2;">{{ $info}}</h1>
	           <img class="custom-count-img" src="https://coachculture.com/assets/images/imgpsh_anim.png">
                            </div>
                            @endif
                            @endforeach
                            @endif


                            <!-- <div class="col-2 custom-count-bg m-auto">
                                <h1 class="text-white mb-0">1</h1>
                            </div>

                            <div class="col-2 custom-count-bg m-auto">
                                <h1 class="text-white mb-0">0</h1>
                            </div>

                            <div class="col-2 custom-count-bg m-auto">
                                <h1 class="text-white mb-0">0</h1>
                            </div>

                            <div class="col-1 m-auto p-0">
                                <h1 class="text-white custom-dot-bottom mb-0">.</h1>
                            </div>

                            <div class="col-2 custom-count-bg m-auto p-0">
                                <h1 class="text-white mb-0">0</h1>
                            </div> -->

                            <div class="col-2" style="color:#AFAFAF;">
                                <h1 class="custom-pr mb-0" style="margin-bottom: -10px !important;">%</h1>
                                <span class="mb-0" style="font-size: 13px;"><b>reached</b></span>
                            </div>
	</div>
</div>
	<div class="col-1">
                                </div> 
                        </div>
	           <div class="text-center pb-4"> 
                                <a href="{{ route('RegisteryourInterest') }}" type="submit" class="btn btn-danger mt-2" style="padding: 1.5% 2%; background: #526070; border-radius: 10px;">
                                    <b>Register Interest to Signup as Coach</b>
                                </a>
                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection