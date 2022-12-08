@extends('coach.layouts.appwithoutheader')
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

<style>
   ::-webkit-input-placeholder {
   text-align: start !important;
   }
   button.previous {
   position: absolute;
   bottom: auto;
   }
   .input-group-text.custom-clock-icon {
   font-size: 18px !important;
   /* padding: 12px 18px !important; */
   padding: 10px 15px !important;
   }
   .tab {
   width: 100%;
   height: auto;
   margin: 0px auto;
   }
   button.previous {
   padding: 10px 15px !important;
   }
   .form-check-input[type=checkbox] {
   border-radius: 0.15em !important;
   }
   .form-check-input:checked[type=checkbox] {
   background-image: url('{{ asset("assets/images/redcheck.svg") }}') !important;
   }
   .form-check-input:checked {
   background-color: #ffffff !important;
   border: 1px solid rgb(255, 255, 255) !important;
   }
.custom-right-padding{
    padding-right: 6%;
}
   /* ------- screen-16 ------- */
   .allscreen-custom-height {
   height: 90vh;
   margin-top: 8%;
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
   .start-100 {
    left: 99%!important;
}
.top-0 {
    top: 15%!important;
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
   z-index: 2 !important;
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
   margin-right: 10px;
   }
   .flagvisibility {
   display: none;
   }
   .file-upload .file-upload-select input[type="file"] {
   display: none;
   }
   ::file-selector-button {
   display: none;
   }
   /* ------- screen-20 ------- */
   ol.screen3-ol li {
   font-size: 20px;
   letter-spacing: 0.2px;
   }
   .iti__country-list {
   width: 250px !important;
   }
   .sc13-border-custom-height {
   height: 50%;
   }
   .custom-input-phoneno .input-group-text.custom-clock-icon {
   position: absolute;
   z-index: 1;
   margin-left: 19% !important;
   }
   .custom-input-phoneno input#phoneno {
   padding-left: 33% !important;
   border-radius: 8px;
   font-size: 18px;
   }
.h1-custom-font-1 {
    font-size: 75px;
}
.modal {
    position: fixed;
    top: 0;
    right: 0 !important;
    left: auto !important;
    z-index: 1055;
    display: none;
    width: 50% !important;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
}
   
.modal-body { 
    padding: 1rem 2rem;
}

.modal-dialog {
    margin-left: 10.5rem !important;
}
@media (min-width: 576px){ 
      .modal-dialog {
             max-width: 440px;
            margin-top: 3.75rem !important;
        }
    }
   @media screen and (max-width:1399px) {
	.modal-dialog {
    		margin: 1.75rem auto !important;
	}
}
   @media screen and (max-width:1199px) {
   .dropdown img.flag {
   margin-right: 5px !important;
   }
   }
   @media screen and (max-width:1190px) {
   .custom-input-phoneno .input-group-text.custom-clock-icon {
   margin-left: 22% !important;
   }
   .custom-input-phoneno input#phoneno {
   padding-left: 39% !important;
   }
   }
   @media screen and (max-width:991px) {
   button.btn.btn-danger.mt-2.submit,
   button.next.btn.btn-danger.mt-2 {
   margin-left: 30px !important;
   }
.custom-right-padding {
    padding-right: 0;
}
   .custom-input-phoneno input#phoneno {
   padding-left: 50% !important;
   border-radius: 8px;
   font-size: 18px;
   }
   .custom-input-phoneno .input-group-text.custom-clock-icon {
   position: absolute;
   z-index: 1;
   margin-left: 29% !important;
   }
   .h1-custom-font-1 {
    font-size: 60px;
   }
   }
   @media screen and (max-width:767px) {
   .allscreen-custom-height {
   height: auto;
   }
   .sc13-border-custom-height {
   height: 10%;
   }
   .custom-input-phoneno .input-group-text.custom-clock-icon {
   margin-left: 18% !important;
   }
   .custom-input-phoneno input#phoneno {
   padding-left: 31% !important;
   }
	.modal {    
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1055;
    display: none;
    width: 100% !important;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    outline: 0;
    padding: 20px;
}

   }
   @media screen and (max-width:490px) {
   .custom-input-phoneno .input-group-text.custom-clock-icon {
   margin-left: 28% !important;
   }
   .custom-input-phoneno input#phoneno {
   padding-left: 43% !important;
   }
   }
   @media screen and (max-width:375px) {
   .custom-input-phoneno input#phoneno {
   padding-left: 47% !important;
   }
   .h1-custom-font-1{
        font-size: 55px;
   }
   }
   @media screen and (max-width:320px) {
   .custom-input-phoneno input#phoneno {
   padding-left: 50% !important;
   }
   }

   /* span.isvalid:after {
	content: '✓';
	color: green;
	}
	span.notvalid:after{
		content: '×';
		color: red;
	
	} 

	.isvalid input[name=firstname]{
		/* border: 2px solid green; */
	}
	.notvalid input[name=firstname]{
		/* border: 2px solid red; */
	} */

</style>
<section class="custom-padding blocktext">
   <div class="p-4">
      <div class="custom-right-padding">
         <div class="row allscreen-custom-height" >
            <div class="col-md-6 col-12 m-md-auto mb-5">
               <div class="mb-md-5 mb-4 p-3" style="background: #191e24; opacity: 90%; border-radius: 15px;">
                  <h5 class="text-md-center text-center text-white" style="font-size: 20px;">
                     Congratulations for being selected by our team.
                  </h5>
                  <h5 class="text-md-center text-center text-white" style="font-size: 20px; line-height: 30px;">
                     To get you started, please fill and submit the form to signup.
                  </h5>
               </div>
               {{--
               <div class="text-center col-12">
                  <img src="{{ asset('assets/images/CoachCultureLogo.png') }}" alt="" class="width-50 pt-3 pb-3">
               </div>
               --}}
               <div class="mt-3 mb-4 padding-10">
                  <h1 class="text-danger text-md-start text-center fw-bolder h1-custom-font h1-custom-font-1" >CoAch</h1>
                  <h1 class="text-danger text-md-start text-center fw-bolder  h1-custom-font h1-custom-font-1">Culture</h1>
               </div>
            </div>

                   	 <div class="col-md-1 col-0  custom-buttom-right text-center  pt-4 pb-4 m-auto">
	        <img src="{{ asset('assets/images/red-border.png') }}" style="height: 100%;width:15px;" />
	 </div>

            <div class="col-md-5 col-12 custom-buttom m-auto ">
               <form id="myForm" class="screen5-form needs-validation" method="post" role="form" data-toggle="validator" novalidate enctype="multipart/form-data">
                 <input type="hidden" value="{{$code}}" name="used_code" id="used_code">
                 <input type="hidden" value="instagram" name="socialmedia" id="socialmedia">

               <!-- ------------------- screen-16 ------------------- -->
                  <div class="tab">
                     <h4 class="text-white heavy mb-3"> Social Media Account Details </h4>
                     <div class="row mb-3">
                        <div class="col-lg-5 col-12">
                           <dl id="sample" name="socialmedia" class="dropdown">
                              <dt>
                                    <a data-value="instagram">
                                       <span>
                                          <img class="flag blod" src="{{ asset('assets/images/Instagram.png') }}" alt="" />
                                                Instagram
                                       </span>
                                    </a>
                              </dt>
                              <dd>
                                    <ul>

                                       <li>
                                          <a data-value="youtube blod"><img class="flag" src="{{ asset('assets/images/youtube.png') }}" alt="" />YouTube</a>
                                       </li>
                                       <li>
                                          <a data-value="facebook blod"><img class="flag" src="{{ asset('assets/images/Facebook.png') }}" alt="" />Facebook</a>
                                       </li>
                                       <li>
                                          <a data-value="twitter blod"><img class="flag" src="{{ asset('assets/images/Twitter.png') }}" alt="" />Twitter</a>
                                       </li>
                                       <li>
                                          <a data-value="tiktok blod"><img class="flag" src="{{ asset('assets/images/tiktok.png') }}" alt="" />TikTok</a>
                                       </li>
                                       <li>
                                          <a data-value="instagram blod"><img class="flag" src="{{ asset('assets/images/Instagram.png') }}" alt="" />Instagram</a>
                                       </li>
                                    </ul>
                              </dd>
                           </dl>
</div>
                        <div class="col-lg-7 col-12">
                           <div class="input-group mb-2" style="font-size: 18px;">
                              <div class="input-group has-validation">
                                 <label class="input-group-prepend" for="social_media_username">
                                    <div class="input-group-text custom-clock-icon"  style="height: 51.5px; ">
                                      <!--<i class="bi bi-people"></i>-->
		<img src="{{asset('assets/images/person-2.png')}}" alt="" style=" height: 18px; width: 26px;">
                                    </div>
                                 </label>
                                 <input type="text" pattern="^[_A-z0-9]{1,}$" class="form-control" style="padding-left:0px !important;" id="social_media_username" name="social_media_username" placeholder='Social Media Username' aria-describedby="inputGroupPrepend" required>
                              </div>
                           </div>
                        </div>
                     </div>
                     <h4 class="text-white heavy mb-3">Personal Information</h4>
                     <div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="firstname">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-person" style="font-size: 21px;"></i>
                              </div>
                           </label>
                          <input type="text" pattern="^[_A-z]{1,}$" class="form-control" name="firstname" id="firstname" placeholder='First Name' aria-describedby="inputGroupPrepend" required>
                        </div>
                     </div>
                     <div class="input-group has-feedback " style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="lastname">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-person" style="font-size: 21px;"></i>
                              </div>
                           </label>
                           <input type="text" pattern="^[_A-z]{1,}$" class="form-control" id="lastname" name="lastname" placeholder='Last Name' aria-describedby="inputGroupPrepend" required>
                        </div>
                     </div>
                     <div class="input-group has-feedback " style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="datepicker">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-calendar2-week-fill" style="font-size: 21px;"></i>
                              </div>
                           </label>
                           <input type="text" name="birthdaydate" class="form-control unstyled datepicker" placeholder="Birthday" id="datepicker" />
                        </div>
                     </div>
                     <div class="input-group has-feedback "  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="nationality1">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-globe2" style="font-size: 21px;"></i>
                              </div>
                           </label>
                           <select class="form-select selectpicker countrypicker" name="nationality" id="nationality1" required>
                              <option value="">Nationality</option>
                              @foreach ($nationality as $value)
                              <option value="{{ $value->country_nationality }}">
                                 {{ $value->country_nationality }}
                              </option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="input-group has-feedback"  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="passport">
                              <div class="input-group-text custom-clock-icon" style="height: 51.5px;">
                                   <!-- <i class="bi bi-person-badge"></i>-->
		<img src="{{asset('assets/images/passport.png')}}" alt="" style=" height: 31px; width: 22px;">
                              </div>
                           </label>
                           <input type="text" class="form-control" name="passport" placeholder='Passport/ID Number' id="passport" aria-describedby="inputGroupPrepend" required>
                           <div class="invalid-feedback">
                              Please enter a passport/iD number
                           </div>
                        </div>
                     </div>
                     <div class="input-group has-feedback"  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation main-custom-fileinput">
                           <label class="input-group-prepend" for="inputGroupFile01">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-paperclip" style="font-size: 21px;"></i>
                              </div>
                           </label>

                           <input id="user_passport_id_image" class="form-control" type="file" name="files[]" id="inputGroupFile01" multiple style='display: none;'>
                           <input type="file" class="custom-file-input form-control" title="Select your file!" name="user_passport_id_image" id="inputGroupFile01" placeholder="Upload Picture of Passport or ID" accept="image/png, image/jpeg,image/WebP, image/jpg, image/HEIC, image/application/pdf, application/vnd.ms-excel*" style="padding: 12px 13px !important;  "  required>

                        </div>
                     </div>
                  </div>
                  <!-- ------------------- screen-20 ------------------- -->
                  <div class="tab">
                     <h4 class="text-white mb-4">Create CoachCulture Account</h4>
                     <div class="input-group has-feedback "  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="username">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-person" style="font-size:21px;"></i>
                              </div>
                           </label>
                           <input type="text" pattern="^[_A-z]{1,}$" class="form-control" id="username" name="username" placeholder='Username' aria-describedby="inputGroupPrepend" required>
                        </div>
                     </div>
                     <div class="input-group "  style="margin-bottom: 14px !important;">
                        <div class="input-group custom-input-phoneno">
                           <label class="input-group-prepend" for="phoneno">
                              <div class="input-group-text custom-clock-icon" style="height: 51.5px;">
				<!--<i class="bi bi-telephone-fill" style="font-size: 21px;"></i>-->
				    <img src="{{asset('assets/images/ic_call_24px.png')}}" alt="" style=" height: 22px; width: 22px;">
			     </div>
                           </label>
                           <input id="phoneno" type="tel" pattern="^[_0-9]{1,}$"  name="phoneno" class="form-control" placeholder="Phone" style="height: 51.5px; padding-top: 10px !important; padding-bottom: 10px !important;" required>
                        </div>
                     </div>
                     <div class="input-group has-feedback"  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="Emailaddress">
                              <div class="input-group-text custom-clock-icon">
                                 <i class="bi bi-envelope-fill" style="font-size:21px;"></i>
                              </div>
                           </label>
                           <input type="email" name="email" class="form-control" id="Emailaddress" placeholder='Email Address' aria-describedby="inputGroupPrepend" style="padding: 10px 13px !important;" required>
                        </div>
                     </div>
                     <div class="input-group has-feedback "  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="Password">
                              <div class="input-group-text custom-clock-icon" style="height: 51.5px;">
                                <!-- <i class="bi bi-lock-fill" style="font-size:21px;"></i> -->
		<img src="{{asset('assets/images/ic_lock_24px.png')}}" alt="" style=" height: 26px; width: 22px;">
                              </div>
                           </label>
                           <input type="password" name="password" class="form-control" id="Password" placeholder='Password' aria-describedby="inputGroupPrepend" required>
                        </div>
                     </div>
                     <div class="input-group has-feedback "  style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                           <label class="input-group-prepend" for="retypepassword">
                              <div class="input-group-text custom-clock-icon" style="height: 51.5px;">
                                 <!--<i class="bi bi-lock-fill" style="font-size:21px;"></i>-->
		<img src="{{asset('assets/images/ic_lock_24px.png')}}" alt="" style=" height: 26px; width: 22px;">
                              </div>
                           </label>
                           <input type="password" name="password_confirmation" class="form-control" placeholder='Retype Password' aria-describedby="inputGroupPrepend" name="retypepassword" id="retypepassword" required>
                        </div>
                     </div>
                     <div class="input-group custom-placeholder-center"  style="margin-bottom: 14px !important; height: 51.5px;">
                        <label class="input-group-prepend" for="subscriber_fee">
                           <!-- <select class="form-select" name="currency_symbol" aria-label="Default select example" style="background-color: #526070 !important; border-radius: 8px 0px 0px 8px;width: 70px;" required>
                              <option value="$"> $ </option>
                              
                              <option value="INR">₹</option>
                              
                              <option value="AUD">$</option>
                              
                              <option value="AZN">m</option>
                              
                              </select> -->  
                           <select class="form-select" name="currency_symbol" id="currency_symbol" style="height: 51.5px; background-color: #526070 !important; border-radius: 8px 0px 0px 8px;width: 70px;">
                              <!-- <option value="$">$</option> -->
                              @foreach ($nationality_currency as $value)
                              <option value="{{ $value->currency }}">
                                       {{ $value->currency }}
                              </option>
                              @endforeach
                           </select>
                        </label>
                         <input type="number" class="form-control" id="subscriber_fee" name="subscriber_fee" placeholder="Monthly Subscription Fee" style="border-radius: 0 8px 8px 0px !important;" required>
	            <span class="position-absolute btn top-0 start-100 translate-middle bg-white border border-light rounded-circle" style="    z-index: 9;padding: 1px 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="text-black" style="font-size: 12px;font-weight: 900;">?</span>
                                </span>


		 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content " style="background: #2c3a4a;border-radius: 12px;">
                                                        <div class="modal-header p-0 mt-3 mb-2" style="justify-content: center; border:none;">
                                                            <h4 class="modal-title text-white heavy" id="exampleModalLabel" style="font-size:1.6rem;">Monthly Subscription Fee</h4>
                                                        </div>
                                                        <div class="modal-body pb-0 pt-0">
                                                                <div class="mb-2 text-center ">
                                                                    <label for="recipient-name" class="text-white col-form-label semibold" style="font-size: 20px;">Users will pay a monthly subscription fee to access your classes at a different rate than users who did not subscribe.</label> 
                                                                    <label for="recipient-name" class="text-white col-form-label semibold" style="font-size: 20px;">For every “On Demand” and “Live” Class, you will be able to set a different fee for users who subscribed and users who did not subscribe.</label> 
                                                                    <label for="recipient-name" class="text-white col-form-label semibold" style="font-size: 20px;">The monthly subscription fee <u> can be changed at any time </u> in your profile settings.</label> 
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer pt-0" style="border:none; justify-content: center;">
                                                            <button type="button" class="btn btn-danger" style="font-family:SF Pro Text !important; padding: 10px 45px; font-size: 20px !important;" data-bs-dismiss="modal"><b>OK</b></button>
                                                        </div>
                                                    </div>
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
                  </div>
                  <div style="overflow:auto;">
                     <div class="pb-4" style=" margin-top: 5px;">
                        <button type="button" class="previous" style=" margin-top: 10px;">
                        <i class="bi bi-chevron-left"></i>
                        </button>
                        <div class="text-center">
                           <button type="button" class="next btn btn-danger mt-2" style="padding: 1.5% 24%;">
                           <b>Next</b>
                           </button>
                        </div>
                        <div class="text-center">
                           <button type="button" class="btn btn-danger mt-2 submit" style="padding: 1.5% 24%;">
                           <b>Submit</b>
                           </button>
                        </div>
                        <!-- </div>   -->
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/multi-form.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>
<script>
   $(function() {
   
       $(".datepicker").datepicker({
   
           //dateFormat: 'dd/mm/yy',
            dateFormat: 'yy-mm-dd',
           changeYear: 'true',
           changeMonth: true, 
           yearRange: "-50:+0",
           maxDate: '0'
                 });
   
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   
   
   
       var val = {
   
           rules: {
   
               social_media_username: "required",
   
               firstname: "required",
   
               lastname: "required",
   
               birthdaydate: "required",
   
               nationality: "required",
   
               passport: "required",
   
               user_passport_id_image: "required",
   
               username: "required",
   
               phoneno: {
   
                   required: true,
   	           digits: true
   
               },
   
               email: {
   
                   required: true,
   
                   email: true
   
               },
   
               password: {
   
                   required: true,
   
                   minlength: 8,
   
                   maxlength: 25,
   
               },
   
               retypepassword: {
   
                   required: true,
   
                   minlength: 8,
   
                   maxlength: 25,
   
                    equalTo: "#password"
   
               },
               subscriber_fee:{
                  required: true,
   
               }
   
           },
   
           // Specify validation error messages
   
           messages: {
   
               social_media_username: "Please enter social media username",
   
               firstname: "Please enter your first name",
   
               lastname: "Please enter your last name",
   
               birthdaydate: "Please enter your birthday",
   
               nationality: "Please select your nationality",
   
               passport: "Please enter your passport/id number",
   
               user_passport_id_image: " Please upload a picture of your passport/id",
   
               username: "Please enter your username",
   
               phoneno: {
   
                   required: "Please enter phone number",
   
                   minlength: "Please enter 10 digit mobile number",
   
                   maxlength: "Please enter 10 digit mobile number",
   
                   digits: "Only numbers are allowed in this field"
   
               },
   
               email: { 
   
                   required: "Please enter email",
   
                   email: "Please enter a valid e-mail",
   
               },
   
               password: {
   
                   required: "Please enter password",
   
                   minlength: "Password should be minimum 8 characters",
   
                   maxlength: "Password should be maximum 25 characters",
   
               },
   
               retypepassword: {
   
                   required: "Please enter retype password",
   
               },
               subscriber_fee:{
                  required: "Please enter subscriber fee",
               }
           }
   
       }
   
   
   
       $("#myForm").multiStepForm({
   
           // defaultStep:0,
   
           beforeSubmit: function(form, submit) {
   
               console.log("called before submiting the form");
   
               console.log(form);
   
               console.log(submit);
   
           },
   
           validations: val,
   
       }).navigateTo(0);
   
   
   
   
   
       $("#myForm").submit(function(event) {
   
           event.preventDefault();
   
           $.ajaxSetup({
   
               headers: {
   
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   
               }
   
           });
   
           var formData = new FormData($("#myForm")[0]);

           formData.append('phonecode', jQuery('.selected-dial-code').html());
   
            $.ajax({
   
               url: "{{ route('saveCoachInfo') }}",
   
               method: 'POST',
   
               // dataType: "json",
   
                contentType:false,
                cache:false,
                processData:false,
   
               data: formData,
   
               success: function(response) {
   
                   var response = JSON.parse(response);
   
                   if (response.error) {
   
                       toastr.error(response.error);
   
                   } else {
   
                       $('#myForm').trigger('reset');
   
                       toastr.success(response.success);
   
                       window.location.href = "{{ route('successfullysigningup') }}";
   
                   }
   
               }
   
           });
   
       });
   
   
   
   });
   
</script>
<!-- --------------------  screen-16  ----------------------- -->
<script>
   $(function() {
   
       $('input[type="file"]').change(function() {
   
           if ($(this).val() != "") {
   
               $(this).css('color', '#fff');
   
           } else {
   
               $(this).css('color', 'transparent !important');
   
           }
   
       });
   
   })
   
</script>
<script>
   $(".dropdown img.flag").addClass("flagvisibility");
   
   $(".dropdown dt a").click(function() {
   
       $(".dropdown dd ul").toggle();
   
   });
   
   
   
   $(".dropdown dd ul li a").click(function() {
   
       var text = $(this).html();
       console.log($(this).data('value'));
       $('#socialmedia').val($(this).data('value'));
       $(".dropdown dt a span").html(text);
   
       $(".dropdown dd ul").hide();
   
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
<!-- -------------------- screen-20----------------------- -->
<script>
   let telInput2 = $("#phoneno")
   
   
   
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
@endsection