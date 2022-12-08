@extends('coach.layouts.appwithoutheader')

@section('content')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/css/intlTelInput.css">

    <style>        
        .allscreen-custom-height {
            height: 90vh;
            margin-top: 8%;
        }
    </style>


    <section class="custom-padding blocktext">
        <div class="container">
            <div class="">
                <div class="row allscreen-custom-height" style="padding: 12px;">

                    <div class="col-12 m-auto">
                        <div class="p-3 custom_bg" style="background: #191e24d9; border-radius: 15px;">
                            <h4 class="text-md-center text-center text-white">
                                <b>Thank you for signing up. We are excited that you want to be part of the CoachCulture family.</b>
                            </h4>
                            <h4 class="text-md-center text-center text-white">
                                <b>We will verify the submitted information and come back to you via email soon.</b>
                            </h4>
                            <h4 class="text-md-center text-center text-white">
                                <b>In the meantime you can reach out to us via support<a href="mailto:support@coachculture.com" target="_blank">@coachculture.com</a>.</b>
                            </h4>
                        </div>
                        
                        <div class="text-center col-12 pt-2 mt-md-5 mt-4" > 
                            <img src="{{asset('assets/images/mainscreen-CoachCultureLogo.png')}}" alt="" style="max-width: 100%;">
                        </div> 
                    </div>    

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

@endsection
