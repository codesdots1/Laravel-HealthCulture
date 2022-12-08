<!DOCTYPE html>

<html lang="en">



<head>

    @include('coach.layouts.head')

    @yield('style')

    <style>

        #myVideo {

            position: fixed;

            right: 0px;

            top: 0;

            left: 0px;

            bottom: 0;

            min-width: 100%;

            min-height: 100%;

            z-index: -1;

            object-fit: cover;

            width: 100vw;

            height: 100vh;

        }

    </style>

</head>

<video autoplay muted loop playsinline id="myVideo" style="">

  <source src=" {{ asset('assets/images/WebsiteBanner_v4_small.mp4') }} " type="video/mp4">

</video>

<body class="custom-bg" style="background-color: #071428; background-position: top center; background-repeat: no-repeat; background-size: cover;     background-attachment: fixed;">

    @include('coach.layouts.headerwithoutmenu')



    <!--  BEGIN MAIN CONTAINER  -->

    <section class="main-container">

        @yield('content')

    </section>

    <!-- END MAIN CONTAINER -->



    @include('coach.layouts.script')

    @yield('script')



</body>

<script>

var video = document.getElementById("myVideo");

var btn = document.getElementById("myBtn");



function myFunction() {

  if (video.paused) {

    video.play();

    btn.innerHTML = "Pause";

  } else {

    video.pause();

    btn.innerHTML = "Play";

  }

}

</script>



<script>

    toastr.options = {

        "closeButton": true,

        "progressBar": true

    }

    @if (Session::has('message'))

        toastr.success("{{ session('message') }}");

    @endif



    @if (Session::has('error'))

        toastr.error("{{ session('error') }}");

    @endif



    @if (Session::has('info'))

        toastr.info("{{ session('info') }}");

    @endif



    @if (Session::has('warning'))

        toastr.warning("{{ session('warning') }}");

    @endif





    jQuery.extend(jQuery.validator.messages, {

        required: "This field is required",

        remote: "Please fix this field",

        email: "Please enter a valid email address",

        url: "Please enter a valid URL",

        date: "Please enter a valid date",

        dateISO: "Please enter a valid date (ISO)",

        number: "Please enter a valid number",

        digits: "Please enter only digits",

        creditcard: "Please enter a valid credit card number",

        equalTo: "Please enter the same value again",

        accept: "Please enter a value with a valid extension",

        maxlength: jQuery.validator.format("Please enter no more than {0} characters"),

        minlength: jQuery.validator.format("Please enter at least {0} characters"),

        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long"),

        range: jQuery.validator.format("Please enter a value between {0} and {1}"),

        max: jQuery.validator.format("Please enter a value less than or equal to {0}"),

        min: jQuery.validator.format("Please enter a value greater than or equal to {0}")

    });

</script>



</html>

