@extends('coach.layouts.appwithoutheader')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">
 

<div class="container" style="  max-width: 100%;">
<section class="custom-padding blocktext newslettersubscribe row" style="padding-left: 5%; padding-right: 5%;">
    <div class="col-lg-5 col-md-6 col-12 pb-md-0 pb-3 custom-buttom m-auto text-center" style="z-index:1;">
        <img src="{{asset('assets/images/CoachCultureLogo.png')}}" alt="" class="p-3" style="width: 90%;">
    </div>
 
        <div class="col-md-1 d-lg-block d-none"></div>	 
        <div class=" col-md-6 col-12 m-md-auto ">
        <div class="p-4 mb-md-5 mb-4 newslettersubscribe-content semibold">
                        <h5 class="text-md-center text-center text-white ps-2 pe-2 mb-3 heavy" >
                         It won’t be the same without you!
                        </h5>
                        <div class="NewsletterUnsubscribe_content ps-3 pe-3">
                        <p class="text-md-center text-center" >
                        We are sad to see you leave our newsletter subscribers.
                        </p>
                        <p class="text-md-center text-center">
                        Did you press the unsubscribe button on purpose?
                        </p>
                        <p class="text-md-center text-center">
                        Just making sure, that you want to miss out on valuable information that can improve your diet, workouts and ultimately your health.
                        </p>
                        </div>

                        <div class="NewsletterUnsubscribe_content mt-4 ps-3 pe-3">
                                <p class="text-md-center text-center" >
                                If you still want to unsubscribe, please enter and submit your email address below : 
                                </p>
                                <form id="NewsletterUnsubscribe" class="screen5-form needs-validation mt-2" method="post" role="form" data-toggle="validator" novalidate>
                                {{ csrf_field() }}
                                <div class="input-group has-feedback custom-email-form">
                                    <div class="input-group has-validation">
                                        <input type="email" pattern="^[_A-z0-9@.]{1,}$" class="form-control" id="Emailaddress"
                                            name="email" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger mt-2">
                                        <b>Submit</b>
                                    </button>
                                </div>
                            </form>             
                        </div>
                       </div>
                </div>

            </div>
        </div>
        </section>
    </div>
@endsection

@section('script')
 <script>
    $(document).ready(function() {

$("#NewsletterUnsubscribe").validate({
    rules: {
        field: {
            required: true,
            email: true
        }
    },
    messages: {
        email: {
            required: "Email is required",
            email: "Please enter a valid e-mail",
        },
    },
submitHandler: function(form) {
    $.ajax({
       type: "POST",
       url: "{{route('saveNewsletterUnsubscribe')}}",
       data:     $("#NewsletterUnsubscribe").serializeArray(),
       success: function(response) {
           var response = JSON.parse(response);

              if (response.error) {

                  toastr.error(response.error);

              } else {

                  $('#NewsletterUnsubscribe').trigger('reset');

                  toastr.success(response.success);

                  window.location.href = "{{ route('NewsletterResubscribe') }}";

              }

       }           
   });
}
});
});
 </script>

@endsection