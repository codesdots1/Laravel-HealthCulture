@extends('coach.layouts.appwithoutheader')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
<style>
    .form-check-input:checked[type=checkbox] {
        background-image: url('{{ asset("assets/images/redcheck.svg") }}') !important;
    }

    .form-check-input:checked {
        background-color: #ffffff !important;
    }

    .allscreen-custom-height {
        height: 93vh;
        margin-top: 5%;
    }

    ol.screen3-ol li {
        font-size: 20px;
        letter-spacing: 0.2px;
    }

    .desc {
        color: #6b6b6b;
    }

    .desc a {
        color: #0092dd;
    }

    .flag {
        width: 30px !important;
    }

    .dropdown dd,
    .dropdown dt,
    .dropdown ul {
        margin: 0px;
        padding: 0px;
    }

    .dropdown dd {
        position: relative;
    }

    .dropdown a,
    .dropdown a:visited {
        color: #816c5b;
        text-decoration: none;
        outline: none;
    }

    .dropdown dt a {
    background: #2c3a4a url(https://coachculture.com/assets/images/Chevron_-_Down_1_.png);
    background-position: right 0.75rem center;
    display: block;
    padding-right: 20px;
    border: none;
    padding: 11px 10px;
    border-radius: 8px !important;
    background-repeat: no-repeat;
    background-size: 10px;
    height: 51.5px;
    }

    .dropdown dt a span {
        cursor: pointer;
        display: block;
    }

    .dropdown dd ul {
        z-index: 5 !important;
        background: #2c3a4a none repeat scroll 0 0;
        border-radius: 8px !important;
        color: #C5C0B0;
        display: none;
        left: 0px;
        padding: 5px 0px;
        position: absolute;
        top: 2px;
        width: auto;
        min-width: 200px;
        list-style: none;
        box-shadow: 0px 1px 7px #000000;
    }

    .dropdown span.value {
        display: none;
    }

    .dropdown dd ul li a {
        padding: 5px;
        display: block;
    }

    .dropdown dd ul li a:hover {
        background-color: #acbaca;
        border-radius: 7px;
    }

    .dropdown img.flag {
        border: none;
        vertical-align: middle;
        margin-right: 3px;
    }

    input[type="file"] {
        color: transparent !important;
    }

    .file-upload .file-upload-select input[type="file"] {
        display: none;
    }

    ::file-selector-button {
        display: none;
    }

    .sc13-border-custom-height {
        height: 50%;
    }

    .custom-input-phone .input-group-text.custom-clock-icon {
        position: absolute;
        z-index: 4;
        margin-left: 19% !important;
    }

    .custom-input-phone input#phone {
        padding-left: 34% !important;
        border-radius: 8px;
        font-size: 18px;
    }

    @media screen and (max-width:1190px) {
        .custom-input-phone .input-group-text.custom-clock-icon {
            margin-left: 22% !important;
        }

        .custom-input-phone input#phone {
            padding-left: 38% !important;
        }
    }

    @media screen and (max-width:990px) {
        .custom-input-phone input#phone {
            padding-left: 48% !important;
            border-radius: 8px;
            font-size: 18px;
        }

        .custom-input-phone .input-group-text.custom-clock-icon {
            position: absolute;
            z-index: 4;
            margin-left: 30% !important;
        }
    }

    @media screen and (max-width:767px) {
        .sc13-border-custom-height {
            height: 10%;
        }

        .custom-input-phone .input-group-text.custom-clock-icon {
            margin-left: 18% !important;
        }

        .custom-input-phone input#phone {
            padding-left: 28% !important;
        }

        .allscreen-custom-height {
            height: auto;
        }
    }

    @media screen and (max-width:490px) {
        .custom-input-phone .input-group-text.custom-clock-icon {
            margin-left: 28% !important;
        }

        .custom-input-phone input#phone {
            padding-left: 45% !important;
        }
    }

    @media screen and (max-width: 320px) {
        .custom-input-phone input#phone {
            padding-left: 46% !important;
        }
    }


</style>

<section class="custom-padding blocktext">
    <div class="container">
        <div class="">
            <div class="row allscreen-custom-height" style="padding: 12px;">

                <div class="col-md-6 col-12 m-md-auto ">
                    <div class="p-4 mb-md-5 mb-4" style="background: #191e24f2;  border-radius: 15px;">
                        <h5 class="text-md-center text-center text-white ps-2 pe-2" style=" font-size: 20px; line-height: 30px;">Thanks for your interest in joining as a coach on CoachCulture. For now signing up as Coach is exclusively available for invited individuals only, but we might make an exception on a case-by-case basis.</h5>
                        <h5 class="text-md-center text-center text-white mt-4 ps-2 pe-2" style="font-size: 20px; line-height: 30px;">Please fill and submit the form on the right to register your interest.</h5>
                    </div>
                </div>

                <div class="col-1 p-0 mt-7 sc13-border-custom-height m-auto margin-bottom-7rem d-md-block d-none">
                </div>

                <div class="col-md-5 col-12 custom-buttom m-auto" style="z-index:1;">

                    <h4 class="text-white mb-4 heavy">Register your Interest</h4>
                    <form id="regiform" class="screen5-form needs-validation" method="post" role="form" data-toggle="validator" novalidate>
                    <input type="hidden" value="instagram" name="socialmedia" id="socialmedia">

                    <div class="row ">
                        <div class="col-lg-5 col-12">
                        <dl id="sample" name="socialmedia" class="dropdown">
                              <dt>
                                    <a data-value="instagram">
                                       <span>
                                          <img class="flag" src="{{ asset('assets/images/Instagram.png') }}" alt="" />
                                                Instagram
                                       </span>
                                    </a>
                              </dt>
                              <dd>
                                    <ul>
                                       <li>
                                          <a data-value="youtube"><img class="flag" src="{{ asset('assets/images/youtube.png') }}" alt="" />YouTube</a>
                                       </li>
                                       <li>
                                          <a data-value="facebook"><img class="flag" src="{{ asset('assets/images/Facebook.png') }}" alt="" />Facebook</a>
                                       </li>
                                       <li>
                                          <a data-value="twitter"><img class="flag" src="{{ asset('assets/images/Twitter.png') }}" alt="" />Twitter</a>
                                       </li>
                                       <li>
                                          <a data-value="tiktok"><img class="flag" src="{{ asset('assets/images/tiktok.png') }}" alt="" />TikTok</a>
                                       </li>
                                       <li>
                                          <a data-value="instagram"><img class="flag" src="{{ asset('assets/images/Instagram.png') }}" alt="" />Instagram</a>
                                       </li>
                                    </ul>
                              </dd>
                           </dl>
                        </div>

                            <div class="col-lg-7 col-12">
                                <div class="input-group mb-2" style="font-size: 18px;">
                                    <div class="input-group has-validation">
                                        <label class="input-group-prepend" for="Socialmediausername">
                                            <div class="input-group-text custom-clock-icon"  style="height: 51.5px; ">
						<!--<i class="bi bi-people"></i>-->
						<img src="{{asset('assets/images/person-2.png')}}" alt="" style=" height: 18px; width: 26px;">
					     </div>
                                        </label>
                                        <input type="text" pattern="^[_A-z0-9]{1,}$" style="padding-left: 0px !important;" class="form-control" id="Socialmediausername" name='social_media_username' placeholder='Social Media Username' aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please enter a username
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                            <div class="input-group has-validation">
                                <label class="input-group-prepend" for="firstname">
                                    <div class="input-group-text custom-clock-icon"><i class="bi bi-person" style="font-size: 21px;"></i></div>
                                </label>
                                <input type="text" pattern="^[_A-z]{1,}$" class="form-control" id="firstname" placeholder='First Name' name="firstname" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter a firstname
                                </div>
                            </div>
                        </div>

                        <div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                            <div class="input-group has-validation">
                                <label class="input-group-prepend" for="lastname">
                                    <div class="input-group-text custom-clock-icon"><i class="bi bi-person" style="font-size: 21px;"></i></div>
                                </label>
                                <input type="text" pattern="^[_A-z ]{1,}$" class="form-control" id="lastname" placeholder='Last Name' name="lastname" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter a lastname
                                </div>
                            </div>
                        </div>

                        <div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                            <div class="input-group has-validation">
                                <label class="input-group-prepend" for="Emailaddress">
                                    <div class="input-group-text custom-clock-icon"><i class="bi bi-envelope-fill" style="font-size: 21px;"></i></div>
                                </label>
                                <input type="email" pattern="^[_A-z0-9@.]{1,}$" class="form-control" id="Emailaddress" name="email" placeholder='Email Address' aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter a email address
                                </div>
                            </div>
                        </div>

                        <div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                            <div class="input-group has-validation custom-input-phone">
                                <!--<label class="input-group-prepend" >
                                        <div id="phone"></div>
                                    </label>-->
                                <label class="input-group-prepend" for="phone">
                                    <div class="input-group-text custom-clock-icon" style="height: 51.5px;">
					<!--<i class="bi bi-telephone-fill" style="font-size: 21px;"></i>-->
				    <img src="{{asset('assets/images/ic_call_24px.png')}}" alt="" style=" height: 22px; width: 22px;">
				    </div>
                                </label>
                                <input id="phone" type="tel" pattern="^[_0-9]{1,}$" maxlength="10" minlength="10" name="phoneno" class="form-control" placeholder="Phone" style=" height: 51.5px;" required>
                                <div class="invalid-feedback">
                                    Please enter a phone number
                                </div>
                            </div>
                        </div>
	<div class="ps-5">
                        <div class="form-group form-check mt-2 checkbox-input " style="margin-bottom: 14px !important;">
                            <input type="checkbox" class="form-check-input text-white " style="border: 1px solid#CC2936 !important;float: unset;" id="exampleCheck1" name='terms'>
                            <label class="form-check-label text-white noselect pl-2" for="exampleCheck1" style="padding-left:12px;"> Accept <a href="{{ asset('assets/images/TermsandConditionsv.pdf') }}" target="_blank"><u> Terms & Conditions </u></a></label>
                        </div>

                        <div class="form-group form-check mt-2 checkbox-input " style="margin-bottom: 14px !important;">
                            <input type="checkbox" class="form-check-input text-white " style="border: 1px solid#CC2936 !important;float: unset;" id="Newsletter" name='newsletter'>
                            <label class="form-check-label text-white noselect pl-2" for="Newsletter" style="padding-left:12px;"> Signup to our Newsletter (optional)</label>
                        </div>
</div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger mt-2" style="padding: 1.5% 24%; font-family:SF Pro Text !important;">
                                <b>Submit</b>
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>

<script>
    let telInput2 = $("#phone")

    telInput2.intlTelInput({

        allowExtensions: true,
        formatOnDisplay: true,
        autoFormat: true,
        autoHideDialCode: true,
        autoPlaceholder: true,
        defaultCountry: "auto",
        ipinfoToken: "yolo",

        nationalMode: false,
        numberType: "MOBILE",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['sa', 'ae', 'qa', 'om', 'bh', 'kw', 'ma'],
        preventInvalidNumbers: true,
        separateDialCode: true,
        initialCountry: 'sg',
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"
    })
</script>

<script>
    $(".dropdown img.flag").addClass("flagvisibility");
    $(".dropdown dt a").click(function() {
        $(".dropdown dd ul").toggle();
    });

    $(".dropdown dd ul li a").click(function() {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
       $('#socialmedia').val($(this).data('value'));

        // $("#result").html("Selected value is: " + getSelectedValue("sample"));
    });

    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function(e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown"))
            $(".dropdown dd ul").hide();
    });

    $(".dropdown img.flag").toggleClass("flagvisibility");
</script>

<script>
    $(function() {
        $('input[type="file"]').change(function() {
            if ($(this).val() != "") {
                $(this).css('color', '#fff !important');
            } else {
                $(this).css('color', 'transparent ');
            }
        });
    })
</script>

<script>
    $('#myFileInput').attr('title', '');
</script>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()

                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#regiform").submit(function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($("#regiform")[0]);
            formData.append('phonecode', jQuery('.selected-dial-code').html());
            // formData.append('socialtype', jQuery('.selected-dial-code').html());
            $.ajax({
                url: "{{ route('saveInterestInfo') }}",
                method: 'POST',
                // dataType: "json",
                contentType: false,
                processData: false,
                data: formData,
                success: function(response) {
                    var response = JSON.parse(response);
                    if (response.error) {
                        toastr.error(response.error);
                    } else {
                         toastr.success(response.success);
                        window.location.href = "{{ route('Thankyouforregistering') }}";
                    }
                }
            });
        });
    });
</script>

@endsection
