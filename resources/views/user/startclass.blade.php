<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/CoachCultureLogo.png') }}" />


    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <link href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-icons/bootstrap-icons.scss') }}" rel="stylesheet">

    <link href="{{ asset('assets/plugins/fonts/css2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/fonts/font.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/fonts/kontanter.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}" />

    <title> {{ $title ? $title . ' | ' : '' }} Coach culture </title>

</head>

<body class="custom-bg ">
    <section class="container-fluid" style="z-index: 9; position: fixed;">
        <div class="row" style="background:#5D5E64;">
            <div class="col-lg-2 col-md-2 col-4" style="margin: auto;">
                <!-- <img src="images/Chevron_-_Down_1_.svg" alt="" style="width: 15px;" > -->
                <div class="text-white" style="font-size: 24px;">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-4 text-white text-center" style="margin: auto;">
                <h4 class="m-0">{{ $class_type }}</h4>
                <p class="m-0">{{ $class_subtitle }}</p>
            </div>
            <div class="col-lg-2 col-md-2 col-4 text-white text-end pt-2 text-center" style="margin: auto;">
                <img src="{{ asset('assets/images/CoachCultureLogo.png') }}" alt="" style="width:25%;">
                <p style="margin-bottom:8px;">@ {{ $username }}</p>
            </div>
        </div>
    </section>

    <section>
        <video width="100%" controls id="cspd_video">
            <source src="{{ $thumbnail_video }}" type="video/mp4">
        </video>
    </section>


    <!-- JavaScript Bundle with Popper -->
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/jquery/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

    <script>
        var theVideo = document.getElementById("cspd_video");
        document.onkeydown = function(event) {
            switch (event.keyCode) {
                case 37:
                    event.preventDefault();

                    vid_currentTime = theVideo.currentTime;
                    theVideo.currentTime = vid_currentTime - 10;
                    break;
                case 39:
                    event.preventDefault();

                    vid_currentTime = theVideo.currentTime;
                    theVideo.currentTime = vid_currentTime + 10;
                    break;

            }
        };
    </script>
</body>

</html>
