<style>
    .navbar {
        flex-wrap: nowrap !important;
    }
</style>

<section class="container-fluid pt-2 pb-2 custom-fix-top" style="z-index:3; background:#071428; height:78px!important;">
    <div class="row" >
        <div class="col-lg-1 col-sm-2 col-5 text-sm-center text-start mt-2">
            <img src="{{ asset('assets/images/logo_2.png') }}" alt="" style="width: fit-content;">
        </div>
        <div class="col-lg-9 col-sm-7 col-6 d-sm-block d-none mt-2">
            <h1 class="text-white text-start m-0 h1-custom-font">Coachculture</h1>
        </div>
        <!-- <div class="col-sm-2 col-4 text-end">
            <h5 class="text-white heavy">menu</h5>
        </div> -->

        <div class="col-lg-2 col-sm-3 col-7" style="z-index: 100;">
            <nav class="navbar navbar-dark">
                <div class="container-fluid justify-content-end p-0">
                    <h5 class="text-white text-center col-6">Menu</h5>
                    <button class="navbar-toggler col-6" type="button" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#navbar" aria-label="Toggle navigation" style="margin-top: -6px;"> 
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </nav>
            <div class="collapse justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item active pl-3">
                        <a class="nav-link bold" href="{{ route('user.dashboard') }}">
                            <b>Scan QR Code</b>
                        </a>
                    </li>

                    <li class="nav-item pl-3">
                        <a href="{{ route('logout') }}" class="nav-link custom-logout blod" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <b>
                                <i class="bi bi-box-arrow-right" style="padding-right: 10px;"></i>Logout
                            </b>
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
