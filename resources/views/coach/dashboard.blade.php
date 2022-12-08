@extends('coach.layouts.app')

@section('style')
    <style>
        .custom-height {
            height: 40%;
        }
        ol.screen3-ol li {
            font-size: 20px !important;
        }   
::marker {
    color: #fff !important;
    font-family: 'SF Pro Text Heavy';
}
.allscreen-custom-height {
    height: 90vh;
    margin-top: 8%;
}
        @media screen and (max-width: 1024px) {
            .custom-height {
                height: 60%;
            }
        }
        @media screen and (max-width: 991px) {
            .custom-height {
                height: 60%;
            }
            .col-0  {
                 display:none;
            }
        }
        @media screen and (max-width: 767px) {
            .custom-height {
                height: 0%;
            }
.allscreen-custom-height {
    height: auto;
}
        } 
    </style>
@endsection 

@section('content')

    <div class="custom-padding blocktext h-100" style="margin-top: 78px;">
        <div class="p-4">
            <div class="">
                <div class="row" style="padding: 12px; margin-top:5%;">

                    <div class="col-lg-4 col-md-12  pt-4">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/QRCode.png') }}" alt="" class="width-75 pt-3 pb-3">
                        </div>
                    </div>

                   	 <div class="col-lg-1 col-0  custom-buttom-right text-center  pt-4 pb-4">
	        <img src="{{ asset('assets/images/red-border.png') }}" style="width:15px;" />
	 </div>

                    <div class="col-lg-7 col-md-12 col-12 custom-buttom pt-4  pb-5   ps-2" style="z-index:1;">

                        <h3 class="text-white mb-5  mt-5 mt-md-0 ps-md-5 ps-2" >
                            <b class="heavy">How to Watch Classes in your Web Browser?</b>
                        </h3>

                        <ol class="screen3-ol semibold">

                            <div class="row mb-5">
                                <li class="col-lg-8 col-md-9 col-10 ps-md-5 ps-2" style="color: #AFAFAF;">
                                    In your CoachCulture mobile app, open the <b class="text-white heavy"> Class Overview Page </b> of the “On Demand” or “Live Class” you want to watch.
                                </li>
                                <div class="col-lg-2 col-md-0 col-0"></div> 
                                <div class="col-lg-2 col-md-3 col-2 text-end">
                                    <img src="{{ asset('assets/images/iPhone.png') }}" alt="" class=" " >
                                </div>
                            </div>

                            <div class="row mb-5">
                                <li class=" col-8 ps-md-5 ps-2" style="color: #AFAFAF;">
                                    Click the <b class="text-white heavy"> Scan QR </b> Button on the bottom left of the <b class="text-white heavy"> Class Overview Page </b> in your mobile app.
                                </li>
                                <div class="col-4 text-end" style="margin: auto;">
                                    <button class="btn text-white" style="background-color: #ACBACA;">
                                        <i class="bi bi-camera-fill" style="padding-right:10px;"></i>
                                        <b>Scan QR</b>
                                    </button>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <li class=" col-8 ps-md-5 ps-2" style="color: #AFAFAF;">
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
    </div>

@endsection
