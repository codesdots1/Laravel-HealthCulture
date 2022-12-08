@extends('user.layouts.app')

@section('content')

    <style>
        .custom-height {
            height: 45%;
        }
        ol.screen3-ol li {
            font-size: 20px !important;
        }
::marker {
    color: #fff !important;
    font-family: 'SF Pro Text Heavy';
}
        .custom-page-height{
            height:90vh;
        }
        @media screen and (max-width: 1024px) {
            .custom-height {
                height: 80%;
            }
        }
        @media screen and (max-width: 991px) {
            button.btn.btn-danger.mt-2.submit {
                margin-left: 30px;
            }
            .col-0  {
                 display:none;
            }
        }
        @media screen and (max-width: 767px) {
            .custom-height {
                height: 0%;
            }
            .custom-page-height{
                height:auto;
            }
        }
    </style>

    <section class="custom-padding blocktext h-100" style="margin-top:78px;">
        <div class="p-4">
            <div class="">
                <div class="row " style="padding: 12px; margin-top:5%;">

                    <div class="col-lg-4 col-12 pt-4">

                        <div class="text-center">
                            <img src="{{ asset('assets/images/QRCode.png') }}" alt="" class="width-75 pt-3 pb-3">
                        </div>

                        @if($upcoming_live_class)
                        <div class="row">
                            <div class="col-md-2 col-2 p-0"></div>
                            <div class="p-3 col-md-8 col-8 p-0" style="background: #2D3A4E; border-radius: 8px;">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-6 text-white" style="border-right: 2px solid #fff;">
                                                <h5 class="mb-0" style="font-size: 15px;">
                                                    {{ $upcoming_live_class['class_subtitle'] }}
                                                </h5>
                                                <p class="mb-0" style="font-size: 13px;">
                                                    {{ $upcoming_live_class['class_type'] }}
                                                </p>
                                            </div>

                                            @if ($upcoming_live_class['coach_class_type'] == 'live')
                                                <div class="col-6 text-white">
                                                    <h5 class="mb-0" style="font-size: 15px;">
                                                        {{ date('d M Y', strtotime($upcoming_live_class['class_date'])) }}
                                                    </h5>
                                                    <p class="mb-0" style="font-size: 13px;">
                                                        {{ date('h:i', strtotime($upcoming_live_class['class_time'])) }}
                                                    </p>
                                                </div>
                                            @else
                                                <div class="col-6 text-white">
                                                    <h5 class="mb-0" style="font-size: 15px;">
                                                        {{ $upcoming_live_class['total_views'] }} views
                                                    </h5>
                                                    <p class="mb-0" style="font-size: 13px;">
                                                        {{ date('d M Y', strtotime($upcoming_live_class['class_date'])) }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>


                                        @if ($upcoming_live_class['coach_class_type'] == 'live')

                                            <div class="text-center mt-3">
                                                <a href="#" class="btn btn-danger " role="button" aria-pressed="true" style="padding: 1% 5%; border-radius: 8px!important;">
                                                    <b style="font-size: 14px;">
                                                        <i class="bi bi-camera-video-fill pe-1"></i>
                                                        <span>Join Class</span>
                                                    </b>
                                                </a>
                                            </div>

                                        @else

                                            <div class="text-center mt-3">
                                                <a href="{{ route('startOnDemandClass', ['id' => base64_encode($upcoming_live_class['id'])]) }}" class="btn btn-danger " role="button" aria-pressed="true" style="padding: 1% 5%; border-radius: 8px!important;background: #008BFA;border-color: #008BFA;">
                                                    <b style="font-size: 14px;">
                                                        <i class="bi bi-play-fill pe-1"></i>
                                                        <span>Start Class</span>
                                                    </b>
                                                </a>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="col-3 p-0 coach_info" style="padding-right:3px !important;">
                                        <img src="{{ $upcoming_live_class['user_image'] }}" class="w-100">
                                        <p class="mb-0 text-white text-center">
                                            @ {{ $upcoming_live_class['username'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-2 p-0"></div>
                        </div>
                        @endif
                    </div>

                   	 <div class="col-lg-1 col-0  custom-buttom-right  text-center  pt-4 pb-4">
	        <img src="{{ asset('assets/images/red-border.png') }}" style="width:15px;" />
	 </div>

                    <div class="col-lg-7 col-md-12 col-12 custom-buttom pt-4  pb-5   ps-2" style="z-index:1;">

                        <h3 class="text-white mb-5  mt-5 mt-md-0 ps-md-5 ps-2">
                            <b class="heavy">How to Watch Classes in your Web Browser? </b>
                        </h3>

                        <ol class="screen3-ol semibold">
                            <div class="row mb-5">
                                <li class="col-lg-8 col-md-9 col-10 ps-md-5 ps-2" style="color: #AFAFAF;">
                                    In your CoachCulture mobile app, open the <b class="text-white heavy">Class Overview Page </b> of the “On Demand” or “Live Class” you want to watch.
                                </li>
                                <div class="col-lg-2 col-md-0 col-0"></div>
                                <div class="col-lg-2 col-md-3 col-2 text-end">
                                    <img src="{{ asset('assets/images/iPhone.png') }}" alt="" class="w-md-50 w-custom-100">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <li class="col-8 ps-md-5 ps-2" style="color: #AFAFAF;">
                                    Click the <b class="text-white heavy">Scan QR </b>Button on the bottom left of the <b class="text-white heavy"> Class Overview Page </b> in your mobile app.
                                </li>
                                <div class="col-4 text-end" style="margin: auto;">
                                    <button class="btn text-white" style="background-color: #ACBACA;">
                                        <i class="bi bi-camera-fill" style="padding-right:10px;">
                                        </i>
                                        <b>Scan QR</b>
                                    </button>   
                                </div>
                            </div>

                            <div class="row mb-5">
                                <li class="col-8 ps-md-5 ps-2" style="color: #AFAFAF;">
                                    Scan the QR Code on the left side of this of this page.
                                </li>
                                <div class="col-4 text-end" style="margin: auto;">
                                    <img src="{{ asset('assets/images/LeftArrow.png') }}" alt="" class="w-50">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <li class="ps-md-5 ps-2" style="color: #AFAFAF;">
                                    Watch the “On Demand” or “Live” Class.
                                </li>
                            </div>

                        </ol>

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
