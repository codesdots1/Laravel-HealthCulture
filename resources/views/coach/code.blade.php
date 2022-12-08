@extends('coach.layouts.appwithoutheader')

@section('content')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
 
    <section class="custom-padding blocktext invite-only-section">
       
                    <div class="io-title">
                        <div class="text-lg-start text-center mt-3 mb-4 ">
                            <h1 class="text-danger text-lg-start fw-bolder h1-custom-font h1-custom-font-1">CoAch</h1>
                            <h1 class="text-danger text-lg-start fw-bolder h1-custom-font h1-custom-font-1">Culture</h1>
                        </div> 
                    </div>
                    <!-- <div class="col-1 custom-border p-0 mt-7 sc13-border-custom-height m-auto margin-bottom-7rem d-md-block d-none">
                    </div> -->    
                    <div class="io-details text-center semibold" >
                        <div class="p-4 p-md-4 p-lg-4" style="z-index:1; background: #191e24f2; border-radius: 15px;">
                            <h4 class="heavy mb-3" >Welcome to CoachCulture.</h4>
                            <div class="text-secondary " >
                                Signing up as a coach is an <b class="heavy">exclusive invite-only event. </b>
                            </div>
                            <div class="text-secondary " >
                            The pre-launch signup phase <b class="heavy"> will close</b> when we have reached our 
                                <b class="heavy">target number</b> of coaches.
                            </div>
                            <div class="row m-0 mt-3"> 
                                <div class="col-1">
                                </div> 
                                <div class=" col-md-10 col-12 mb-2 p-0">
                                    <div class="row justify-content-center" >
                                        @if ($goal_temp != "")
                                        @foreach(str_split($goal_temp) as $info)
                                        @if ($info == ".")
                                        <div class="col-1 p-0">
                                            <h1 class="custom-dot-bottom mb-0" style="line-height: 2;  color: #afafaf;">{{ $info }}</h1>
                                        </div>
                                        @else
                                        <div class="col-2 custom-count-bg m-auto position-relative">
                                            <h1 class="semibold mb-0" style="line-height: 2;">{{ $info}}</h1>
                                            <img class="custom-count-img" src="{{ asset('assets/images/imgpsh_anim.png')}}">
                                        </div>
                                        @endif
                                        @endforeach
                                        @endif 
                                        <div class="col-2 p-0" style="color:#AFAFAF;">
                                            <h1 class="custom-pr" style="margin-bottom: -10px;">%</h1>
                                            <span class="mb-0" style="font-size: 14px;"><b> reached </b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                </div> 
                            </div>   
                            <div class="mt-1 mb-2 p-3 invite-only-code">

                                <div class="text-secondary pt-2 pb-3">
                                     If you received an invitation, please  <b class="heavy"> enter the 8-digit code </b> that we have sent to you below: 
                                </div>

                                <form id="otp" method="POST" class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                {{csrf_field()}}    
                                <input type="text" name="code"  minlength="1" maxlength="1" style="margin-left: -6px; border-radius: 8px 0px 0px 8px; margin-right: 0px;" size="1" name="digit-1" id="digit-1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" required/>
 
                                    <input type="text" minlength="1" maxlength="1" style="margin-left: -6px; margin-right: 0px;" id="digit-2" name="digit-2" size="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" maxlength="1" required/>
 
                                    <input type="text" minlength="1" maxlength="1" style="margin-left: -6px; margin-right: 0px;" id="digit-3" name="digit-3" size="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" maxlength="1"  required/>

                                    <input type="text" minlength="1" maxlength="1" style="margin-left: -6px; margin-right: 0px; border-radius: 0px 8px 8px 0px;" name="digit-4" id="digit-4" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" maxlength="1" size="1" required/> 
					
                                    <span class="splitter" style="margin: 0.5rem!important;margin-right: 0.8rem !important;">&ndash;</span>

                                    <input type="text" length="1" style="margin-left: -6px; margin-right: 0px; border-radius: 8px 0px 0px 8px;" id="digit-5" name="digit-5" onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)" maxlength="1" size="1" required/>
                                    
                                    <input type="text" length="1" style="margin-left: -6px; margin-right: 0px;"id="digit-6" name="digit-6" size="1" onkeyup="onKeyUpEvent(6, event)" onfocus="onFocusEvent(6)" maxlength="1" required/>

                                    <input type="text"  length="1" style="margin-left: -6px; margin-right: 0px;" id="digit-7" name="digit-7" size="1" onkeyup="onKeyUpEvent(7, event)" onfocus="onFocusEvent(7)" maxlength="1" required/>

                                    <input type="text" length="1" size="1"  style="margin-left: -6px; margin-right: 0px;border-radius: 0px 8px 8px 0px;" name="digit-8" id="digit-8" onkeyup="onKeyUpEvent(8, event)" onfocus="onFocusEvent(8)" required/>
                                    
                                    <!-- <span id="demo">qqqq</span> <br/><br/> -->
                                     <div id="msg" class="bold"></div>

                                    <div class="mt-2">
                                        <button id="save" type="submit" class="btn custom-danger text-white mt-2 rounded-circle invite-btn-arrow" style="    margin-bottom: -70px;">
                                            <b><i class="bi bi-arrow-right"></i></b>
                                        </button>
                                    </div>

                                </form>
                                
                            </div>
                        </div>
                            <div class="pt-3"> 
                                <a href="{{ route('RegisteryourInterest') }}" type="submit" class="semibold btn mt-2  custom-btn-signup-coach">
                                    <b>Register Interest to Signup as Coach</b>
                                </a>
                            </div> 
                    </div> 
               
    </section>

@endsection

@section('script')

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            // called when key is pressed in textbox
            $(".digit-main").keypress(function (e) {
                if (e.which !== NaN  && (e.which < 48 || e.which > 57)) 
                {
                    //display error message
                   // $("#demo").html("Code Invalid").show("slow");
                        return false;
                } else if (e.which == 49 ){
                    return true;
                    window.location.href="sign-up-as-coach";
                }
            });
        });

        function getCodeBoxElement(index) {
            return document.getElementById('digit-' + index);
        }
        function onKeyUpEvent(index, event) {
            eventCode = event.which ;
            if (getCodeBoxElement(index).value.length == 1) {
                if (index != 8) {
                   getCodeBoxElement(index+ 1).focus();
                } else {
                    // Submit code
                    console.log('submit code ');
                }
            }
            if (eventCode == 8 && index !== 1) {
                getCodeBoxElement(index-1).focus();
            }
            }
            function onFocusEvent(index) {
            for (item = 1; item < index; item++) {
                const currentElement = getCodeBoxElement(item);
                if (!currentElement.value) {
                    currentElement.focus();
                    break;
                }
            }
        }
    </script> 
    <script>
        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());
                
                if(e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));
                    
                    if(prev.length) {
                        $(prev).select();
                    }
                } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));
                    
                    if(next.length) {
                        $(next).select();
                    } else {
                        if(parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });

        
    $("#save").click(function() {
        
        var form1 = $('#otp').serialize();
        $.ajax({
            type: "POST",
            url: "{{route('check_code')}}",
            data: form1,
            success: function(data) {
                console.log(data);
                if (data.result == "1") {
                     window.location.href="sign-up-as-coach";
                } else {
                    $("#msg").html(data.msg);
                    //alert(data);
                }
            }
        });
        return false;
    });
</script>
@endsection
