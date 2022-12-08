@extends('coach.layouts.app')

@section("style")
    <style>
        ol.screen3-ol li {
            font-size: 20px;
            letter-spacing: 0.2px;
            font-weight: 600;
        }
        ::marker {
              color: #fff !important;
              font-family: 'SF Pro Text Heavy';
           }
        .sc13-border-custom-height{
            height: 55%;
        }
        .allscreen-custom-height{
            height: 89vh;
            margin-top: 6%;
        }
        .text-secondary {
            color: #afafaf !important;
        }
        @media screen and (max-width:1399px) {
            .sc13-border-custom-height {
                height: 76%;
            }
        }
        @media screen and (max-width:1024px) {
            .sc13-border-custom-height {
                height: 96%;
            }
        }
        @media screen and (max-width:991px) {
            .sc13-border-custom-height{
                height: 10%;
            }
            .custom-border {
                border-left: none !important;
            }
            .allscreen-custom-height{
                height: auto;
            }
            .custom-padding {
                padding-top: 50px;
                padding-bottom: 50px;
            }
            .col-0  {
                 display:none;
            }
        }

        @media screen and (max-width:767px) {
            .sc13-border-custom-height{
                height: 10%;
            }

        }
    </style>
@endsection

@section("content")

<section class="custom-padding blocktext" style="height:100%;">
    <div class="p-4">
        <div class="">
            <div class="row" style="padding: 12px; margin-top:10%;">

                <div class="col-lg-4 col-md-12  pt-4">
                    <h3 class="text-lg-center text-start text-white mb-5 heavy">Upload successful.</h3>
                    <div class="text-center col-12" >
                        <img src="{{ asset('assets/images/CoachCultureLogo.png') }}" alt="" class="width-75 pt-3 pb-3" >
                    </div>
                </div>


                    <div class="col-lg-1 col-0  custom-buttom-right text-center  pt-4 pb-4" >
	    <img src="{{ asset('assets/images/red-border.png') }}" style=" height: 100%;width:15px;" />
	</div>

                <div class="col-lg-7 col-md-12 col-12 custom-buttom pt-4  pb-5  ps-md-1 ps-2" style="z-index:1;">

                    <h3 class="text-white mb-5 heavy ps-md-5 ps-2"> How to find your new upload? </h3>

                    <ol class="screen3-ol">

                        <div class="row mb-4">
                            <li class="text-secondary col-lg-9 col-8 ps-md-5 ps-2">
                            In your CoachCulture mobile app, navigate to the Profile Screen by clicking on the <b class="text-white heavy">Profile Button </b> located in the bottom right of most screens.
                            </li>
                            <div class="col-lg-3 col-4 text-center m-auto">
                                <img src="{{ asset('assets/images/coach.png') }}" alt="" style="width: 65px;">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <li class="text-secondary col-lg-9 col-8 ps-md-5 ps-2">
                                Access your <b class="text-white heavy"> Coach Profile </b> by clicking on the <b class="text-white heavy">Switch Profile Button </b> located next to your profile picture.
                            </li>

                            <div class="col-lg-3 col-4 text-center m-auto">
                                <img src="{{ asset('assets/images/Search.png') }}" alt="" style="">
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <li class="text-secondary col-lg-9 col-8 ">
                                On the Search Screen, type <b class="text-white heavy"> your username</b> in the<b class="text-white heavy"> Search Bar</b> located on top of the screen.
                            </li>
                            <div class="col-lg-3 col-4 mt-md-0 mt-2 text-center" style="margin: auto;">
                                <img src="{{asset('assets/images/searchbar.png')}}" alt="" style="width:75%;">                                
                            </div>

                        </div> 
                        <div class="row mb-3">
                            <li class="text-secondary col-10 ">
                                Click on your username to get to your <b class="text-white heavy">Coach Profile.</b>
                            </li>
                        </div> -->

                        <div class="row mb-2">
                            <li class="text-secondary col-lg-7 col-12 ps-md-5 ps-2">
                            You can find your new upload by clicking on its <b class="text-white heavy"> content type </b> (On Demand, Live or Recipe) in the <b class="text-white heavy">tab bar</b> located in the center of the screen.
                            </li>
                            <div class="col-lg-5 col-12 text-center small-navbar-custom" style="margin:auto;">
                                <div class="row my-2" style="font-size:14px;">
                                    <div class="col-md-6 col-6 mb-md-0 pb-2" >
                                        <a class="pb-1 heavy" >ON DEMAND</a>
                                    </div>
                                    <div class="col-md-2 col-3 p-0 mb-md-0 mb-2">
                                        <a class="pb-1 heavy" >LIVE</a>
                                    </div>
                                    <div class="col-md-4 col-3  mb-md-0 mb-2">
                                        <a class="pb-1 heavy" >MEALS</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- <div class="col-1"></div> -->
                            <div class="col-lg-8 col-12 ps-md-5 ps-2" style="color: #464646; font-size: 18px; font-family: 'SF Pro Text'; font-weight: 600;">
                                For Example: New Recipes can be found by navigating to the “Meals” Tab.
                            </div>
                        </div>
                        
                    </ol>

                </div>

            </div>
        </div>
    </div>
</section>



@endsection

@section("script")

@endsection
