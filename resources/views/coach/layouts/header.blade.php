<style>
    .navbar {
        flex-wrap: nowrap !important;
    }
</style>

<section class="container-fluid pt-2 pb-2 custom-fix-top " style="z-index: 3; background:#071428; height:78px!important;">
    <div class="row" style="height: 65px !important;">
	
        <div class="col-lg-1 col-sm-2 col-5 text-sm-center text-start mt-2">
<a href="{{ route('code') }}">
            <img src="{{ asset('assets/images/CoachCultureLogo.png') }}" alt="" style="width: 70px;"></a>
        </div>
	

        <div class="col-lg-9 col-sm-7 col-6 d-sm-block d-none mt-2">
<a href="{{ route('code') }}">            
<h1 class="text-white text-start mb-0 mt-1 h1-custom-font">CoAchCulture</h1>
</a>
        </div>
        <!-- <div class="col-lg-8 col-6 mt-2">
            <h1 class="text-white text-center h1-custom-font" style="margin-top: 0.7rem!important;"> Coachculture</h1>
        </div> -->
        <div class="col-lg-2 col-sm-3 col-7" style="z-index: 100;">
            <nav class="navbar navbar-dark">
                <div class="container-fluid justify-content-end p-0" style="padding-right: 0px;">
                    <h5 class="text-white pe-3 text-end col-6 heavy">Menu</h5>
                    <button class="navbar-toggler col-6" type="button" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#navbar" aria-label="Toggle navigation" style="margin-top: -3px;">                        
                        <i class="bi bi-list text-center"></i>
                    </button>
                </div>
            </nav>
            <div class="collapse justify-content-end" id="navbar">
                <ul class="navbar-nav bold">

                    <li class="nav-item active pl-3">
                        <a class="nav-link bold" href="{{ route('onDemandVideoUpload') }}">
                            <b>On Demand Video Upload</b>
                        </a>
                    </li>
                    <li class="nav-item active pl-3">
                        <a class="nav-link bold" href="{{ route('scheduleLiveVideo') }}">
                            <b>Schedule Live Video</b>
                        </a>
                    </li>
                    <li class="nav-item active pl-3">
                        <a class="nav-link bold" href="{{ route('createMealRecipe') }}">
                            <b>Create Meal Recipe</b>
                        </a>
                    </li>
                    <li class="nav-item active pl-3">
                        <a class="nav-link bold" href="{{ route('scanQRCode') }}">
                            <b>Scan QR Code</b>
                        </a>
                    </li>
                    <li class="nav-item pl-3">
                        <a href="{{ route('logout') }}" class="nav-link custom-logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <b><i class="bi bi-box-arrow-right" style="padding-right: 10px;"></i>Logout</b>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
