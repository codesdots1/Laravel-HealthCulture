@extends('coach.layouts.app')

@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/css/timepicker.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/multi-form.css') }}">

    <style>
        .btn-outline-secondary {
            font-size: 15px;
        }
        .allscreen-custom-height {
            height: 90vh;
            margin-top:6%;
        }
        select.form-select {
             height: 51.5px;
         }
         input {
              height: 51.5px;
          }
        .custom-Muscles-btn .mb-3 {
            margin-bottom: 0.7rem !important;
        }
        .btn-outline-secondary {
            color: #ffffff;
            border-color: #2c3a4a;
            background: #2c3a4a;
            padding: 10px 0px;
            border-radius: 6px;
            width: 100%;
        }
        input[type="checkbox"] {
            width: 0px !important;
        }
        .btn-outline-secondary:hover,
        .btn-check:active+.btn-outline-secondary,
        .btn-check:checked+.btn-outline-secondary,
        .btn-outline-secondary.active,
        .btn-outline-secondary.dropdown-toggle.show,
        .redBackground {
            color: #fff;
            background-color: #acbaca;
            border-color: #acbaca;
        }
        .mb-7 {
            margin-bottom: -7% !important;
        }
        #the-count {
    	position: absolute;
    	bottom: 10px;
    	float: left;
    	padding: 0.1rem 0 0 0;
    	font-size: 0.875rem;
    	right: 15px;
        }
        .sc13-border-custom-height {
            height: 45%;
        }
        @media screen and (max-width:1024px) {
            .sc13-border-custom-height {
                height: 50%;
            }
        }
        @media screen and (max-width: 991px) {
            button.btn.btn-danger.mt-2.submit,
            button.next.btn.btn-danger.mt-2 {
                margin-left: 30px;
            }
        }
        @media screen and (max-width:767px) {
            .sc13-border-custom-height {
                height: 10%;
            }
            .allscreen-custom-height {
                height: auto;
            }
        }

    </style>

@endsection
@section('content')


    <section class="screen13 custom-padding blocktext" style="height:100%; margin-top: 5%;">
        <div class="container">
            <div class="">
                <div class="row allscreen-custom-height">

                    <div class="col-md-5 col-12 m-md-auto mb-4 pt-md-0 pt-5 pr-custom">
                        <div class="pt-0 p-3">
                            <form id="thumbnail_image-form" class="uploader">
                                <input id="thumbnail_image" type="file" name="thumbnail_image" accept="image/*"/>
                                <span class="badge custom-badge bg-danger text-white heavy">Live</span>

                                <label for="thumbnail_image" id="file-drag">

                                    <img id="file-image" src="#" alt="Preview" class="hidden">

                                    <div id="start">
                                        <i class="bi bi-cloud-upload" style="font-size: 58px;"></i>
                                        <div>Upload Thumbnail for Live Class</div>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                    </div>

                                    <div id="response" class="hidden">
                                        <div id="messages"></div>
                                    </div>

                                </label>
                            </form>
                        </div>
                    </div>

                    <!-- <div class="col-1 custom-border sc13-border-custom-height m-auto " style="margin-bottom: 56px;"></div> -->
                      <div class="col-md-1 col-0  custom-buttom-right sc13-border-custom-height  m-auto custom-h-50">
	    <img src="{{ asset('assets/images/red-border.png') }}" style=" height: 100%;" />
	 </div>
                    <div class="col-md-5 col-12 m-auto custom-buttom">

                        <form id="myForm" class="screen5-form" action="#" method="POST">
                            @csrf

                            <!-- ------------------- screen-8 ------------------- -->
                            <div class="tab">
	<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                <select class="form-select " aria-label="Default select example" name="class_type_id" required>
                                    <option value="">Class Type</option>
                                    @foreach ($class_type as $single)
                                    <option value="{{ $single->id }}">
                                        {{ $single->class_type_name }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                                </div>

	  <div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                <input type="text" name="class_subtitle" class="form-control " id="exampleFormControlInput1" placeholder="Class Subtitle" required>
                                </div>
                                </div>

	<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                <select class="form-select" name="class_difficulty_id" aria-label="Default select example" required>
                                    <option value="">Class Difficulty</option>
                                    @foreach ($class_difficulty as $single)
                                    <option value="{{ $single->id }}">
                                        {{ $single->class_difficulty_name }}
                                    </option>
                                    @endforeach
                                </select>
	</div>
	</div>

                                {{-- <input type="date" name="class_date" class="form-control mb-2"
                                    style="text-transform: uppercase;" required> --}}

	<div class="input-group has-feedback" style="margin-bottom: 14px !important;">
                        <div class="input-group has-validation">
                                        <label class="input-group-prepend" for="datepicker">
                                            <div class="input-group-text custom-clock-icon">
                                                <i class="bi bi-calendar2-week-fill" style="   font-size: 21px !important;"></i>
                                            </div>
                                        </label>
                                        <input type="text" class="form-control unstyled datepicker" name="class_date" id="datepicker" placeholder="Date" required />
                                    </div>
                                </div>

                                {{-- <input type="time" name="class_time" class="form-control  timepicker" value="15:35" id="inputMDEx1"> --}}

                                <div class="input-group has-feedback " style="margin-bottom: 14px !important;">
                                    <div class="input-group has-validations">
                                        <label class="input-group-prepend" for="timepicker">
                                            <div class="input-group-text custom-clock-icon"><i class="bi bi-alarm" style=" font-size: 21px !important;"></i>
                                            </div>
                                        </label>
                                        <input type="text" class="form-control bs-timepicker" id="timepicker" name="class_time" placeholder="Time" required />
                                    </div>
                                </div>

                                <div class="input-group has-feedback " style="margin-bottom: 14px !important;">
                                    <div class="input-group has-validations">
                                    <label class="input-group-prepend" for="duration">
                                        <div class="input-group-text custom-clock-icon"><i class="bi bi-alarm" style="font-size: 21px !important;"></i></div>
                                    </label>

                                    <input type="number" step="5" max="150" min="0" class="form-control" name="duration" id="duration" placeholder='Class Duration' class="form-control" required="required">
                                </div>
                                </div>


                                <div class="input-group has-feedback " style="margin-bottom: 14px !important;">
                                    <div class="input-group has-validations custom-placeholder-center ">
                                    <label class="input-group-prepend" for="subscriber_fee">
 

                                        <select class="form-select" name="Nationality" id="nationality1" style="background-color: #526070 !important; border-radius: 8px 0px 0px 8px;width: 70px; font-size: 21px !important;">
                                             @foreach ($Nationality as $value)
                                            <option value="{{ $value->currency }}">
                                                {{ $value->currency_symbol }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </label>
                                    <input type="number" class="form-control" id="subscriber_fee" name="subscriber_fee" placeholder="Subscriber Fee" required>
                                </div>
                                </div>

                                <div class="input-group has-feedback " style="margin-bottom: 14px !important;">
                                    <div class="input-group has-validations custom-placeholder-center ">

                                    <label class="input-group-prepend" for="non_subscriber_fee">

                                        <select class="form-select" name="Nationality" id="nationality1" style="background-color: #526070 !important; border-radius: 8px 0px 0px 8px;width: 70px; font-size: 21px !important;">
                                        @foreach ($Nationality as $value)
                                           <option value="{{ $value->currency }}">
                                                {{ $value->currency_symbol }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </label>
                                    <input type="number" class="form-control" id="non_subscriber_fee" name="non_subscriber_fee" placeholder="Non-Subscriber Fee" required>
                                </div>
                                </div>
                            </div>

                            <!-- ------------------- screen-9 ------------------- -->
                            <div class="tab">
                                <div class="text-white mt-5 mb-3">
                                    <h4 class="blod" style=" font-size: 26px !important;"><b> Used Muscles </b></h4>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 col-6 text-end ">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="width:50%;" height="250"
                                            viewBox="0 0 90.921 186.555">
                                            <g id="Group_54469" data-name="Group 54469" transform="translate(0.141 0.15)">
                                                <path id="Path_12229" class="frist" data-name="Path 12229"
                                                    d="M206.8,153.53c-4.379.248-8.128,2.273-9.372,5.129-.537,1.233-1.391,4.418-.671,6.35.017.045.35.937.183,1.028s-.7-.862-1.036-.786c-.544.124-.779,2.518-.183,4.6a8.937,8.937,0,0,0,2.927,4.354l.122,7.741c-5.225,1.371-9.743,2.755-13.474,3.991-2.652.879-5.051,1.731-6.4,4-.693,1.168-.86,2.394-1.193,4.845-.426,3.134-.029,4.291-.708,7.1A21.348,21.348,0,0,1,176,204.908c-1.478,3.9-.44,5.9-1.122,13.2a14.114,14.114,0,0,1-.75,3.841,40.19,40.19,0,0,1-2.092,4.026,21.256,21.256,0,0,0-1.471,4.373,67.592,67.592,0,0,0-1.67,12.75c-.057,1.83-.03,3.337-1.121,4.41s-2.394.659-3.209,1.938c-.788,1.237-.068,1.914-.7,3.6-.9,2.4-3.073,2.92-2.79,4.29a1.51,1.51,0,0,0,.977,1.107c.168.049.792.186,1.953-.83,1.89-1.655,2.234-3.8,2.511-3.736s-.2,2.117,0,4.727a16.733,16.733,0,0,0,.57,3.252,8.9,8.9,0,0,0,.951,2.31c.678,1.152,1.983,2.768,2.466,2.545.845-.389-.952-6.35-.9-6.363s2.04,5.246,3.581,6.488c.178.144.588.474.983.354.461-.139.6-.789.626-.886-1.737-4.19-2.237-5.4-2.234-5.406a10.21,10.21,0,0,0,3.127,4.254c.907.675,1.3.642,1.519.532.377-.193.533-.8.447-1.506l-3.037-4.342c2.31,2.644,3.177,3.011,3.529,2.814.329-.185.42-.981.157-1.5-.23-.454-.593-.425-1.093-1.037a5.168,5.168,0,0,1-.58-1.05,9.606,9.606,0,0,1-.7-1.731,5.925,5.925,0,0,1-.113-1.971c.22-4.1.364-4.739-.117-5.553a5.916,5.916,0,0,1-.674-1.234h0a14.951,14.951,0,0,1-.237-2.431c-.078-2.7,3.135-4.306,5.194-8.462a20.075,20.075,0,0,0,1.58-5.252c.835-3.94.295-4.994,1.393-7.693.853-2.1,1.336-1.847,2.346-4.311,1.289-3.143,1.146-5.106,1.739-5.175.955-.11,2.259,5.169,2.45,5.959a50.324,50.324,0,0,1,1.308,12.055,29.731,29.731,0,0,1-.333,6.2,46.01,46.01,0,0,1-1.923,6.443c-.133.407-.236.713-.323.964,0,0-.194.566-.393,1.123-.5,1.386-1.608,3.847-1.608,3.847a33.541,33.541,0,0,0-1.686,5.08,59.7,59.7,0,0,0-1.346,5.921c-.187,1.055-1.006,4.539-1.441,14.586a90.166,90.166,0,0,1-.812,9.6c-.362,2.416-.6,3.685-.8,4.922-.845,5.094-.254,7.551.55,22.811a75.187,75.187,0,0,1,0,7.95,29.334,29.334,0,0,1-.418,4.523c-.385,1.793-1.63,5.428-6.745,9.136a2.251,2.251,0,0,0-.226,1.9c.374.787,1.432,1.007,2.226,1.128a72.313,72.313,0,0,0,10.833.295,1.965,1.965,0,0,0,1.435-.834,1.9,1.9,0,0,0,.247-1.472q-.173-2.4-.346-4.808a5.844,5.844,0,0,0,.841-1.668,5.278,5.278,0,0,0,.248-1.276,4.707,4.707,0,0,0-1.039-2.993c.06-1.254.171-2.565.346-3.925a50.013,50.013,0,0,1,3.552-13.075,47.671,47.671,0,0,0,3.459-15.54,33.073,33.073,0,0,1,.814-7.064,34.7,34.7,0,0,1,2.441-6.862c3.687-8.283,5.531-12.424,6.341-15.08.3-1,.513-1.8.652-2.378,0,0,.08-.333.158-.681.249-1.117.694-4.054,1.171-7.986"
                                                    transform="translate(-161.047 -153.53)" fill="none" stroke="#fff"
                                                    stroke-miterlimit="10" stroke-width="0.3" />
                                                <path id="Path_12230" class="Neck" data-name="Path 12230"
                                                    d="M261.061,232c.388-.359.212-1.132.137-1.463-.546-2.423-.938-4.885-1.633-7.27-.5-1.729-.607-2.158-.743-2.146-.391.034-.4,3.638-.331,6.949-4.391,1.281-6.872,1.955-8.212,2.269-.3.069-1.17.27-1.16.485.009.2.749.309,1.07.359,3.327.519,6.7.627,10.052.992A1.047,1.047,0,0,0,261.061,232Z"
                                                    transform="translate(-220.542 -198.981)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12231" class="Shoulder" data-name="Path 12231"
                                                    d="M223.832,253.666c.176.428-2.661,1.175-3.609,3.914a18.321,18.321,0,0,0-.565,3.131c-.232,1.679-.226,2.291-.3,2.783-.558,3.506-6.254,6.535-7.479,5.479-.512-.442.087-1.312.609-4.783.592-3.941.051-4.359.565-5.7C214.822,253.881,223.533,252.938,223.832,253.666Z"
                                                    transform="translate(-195.251 -221.01)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12232" class="Biceps" data-name="Path 12232"
                                                    d="M215.228,292.81c-.734-.147-1.119.976-3.641,2.994-2.894,2.315-3.472,1.7-4.531,2.913-2.257,2.577-1.158,7.848,1.133,18.285.069.313.126.568.162.728a17.489,17.489,0,0,0,1.618-1.214,20.231,20.231,0,0,0,6.311-10.6C217.773,300.011,216.96,293.157,215.228,292.81Z"
                                                    transform="translate(-191.29 -247.609)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12233" class="Forearm" data-name="Path 12233"
                                                    d="M192.539,355.371c.266-.005.321,1.157.976,2.755a18.669,18.669,0,0,0,1.722,2.927c1.351,2.673-1.261,6.744-3.493,10.222-1.422,2.217-2.482,3.3-4.313,6.6-.559,1.005-.987,1.85-1.263,2.411.017-.587.049-1.395.115-2.354a68.542,68.542,0,0,1,1.058-7.864c.746-4.068,1.138-6.129,2.042-7.461a16.609,16.609,0,0,0,1.722-2.468C192.353,357.635,192.169,355.378,192.539,355.371Z"
                                                    transform="translate(-177.94 -289.88)" fill="#CC2936"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12234" class="Forearm" data-name="Path 12234"
                                                    d="M197.969,377.669c-.638-.276-2.522,3.625-6.685,10.2-3.313,5.228-6.528,9.714-5.623,10.593.4.388,1.21-.312,2.7.184,1.42.474,2,1.554,2.39,1.348s-.212-1.295-.123-2.635c.143-2.143,2.067-3.479,4.167-6.374a6.227,6.227,0,0,0,.78-1.411,6.132,6.132,0,0,0,.346-1.27c.326-1.931,1.08-3.488,1.7-6.844C198.06,379.022,198.283,377.8,197.969,377.669Z"
                                                    transform="translate(-177.495 -304.923)" fill="#CC2936"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12235" class="Chest" data-name="Path 12235"
                                                    d="M243.032,254.983a6.557,6.557,0,0,0-3.139,2.149c-.313.376-1.408,1.772-1.762,5.142-.26,2.475-.633,6.031,1.545,9.537.436.7,2.494,4.013,6.2,4.9.179.043.38.078.773.145,4.957.849,9.019,1.545,10.522-.29a3.188,3.188,0,0,0,.6-2.3c-.055-1.55-.138-4.171-.189-7.457-.085-5.5.017-6.543-.9-7.854-1.561-2.242-4.5-2.991-7.137-3.663a18.061,18.061,0,0,0-3.923-.517A7.756,7.756,0,0,0,243.032,254.983Z"
                                                    transform="translate(-213.01 -221.914)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12236" class="Oblique" data-name="Path 12236"
                                                    d="M245.355,314.731c.29-.078.491.666,1.58,1.624,1.066.938,1.517.791,1.931,1.316.852,1.083-.225,2.777-1.1,5.836-1.084,3.8-.748,5.85-1.229,5.88-.625.039-1.629-3.387-1.624-6.67,0-1.113.118-.987.176-2.9C245.187,316.651,244.911,314.851,245.355,314.731Z"
                                                    transform="translate(-217.68 -262.394)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12237" class="Oblique" data-name="Path 12237"
                                                    d="M255.706,325.808c.948-.3,2.222.713,2.834,1.667a4.749,4.749,0,0,1,.584,3c-.277,4.53-.92,5.7-1,8.334-.079,2.586.5,1.911.667,6.251.156,4.038-.377,4.4.25,6.334.267.823.666,1.685.25,2.417-.541.953-2.072,1-2.334,1a4.2,4.2,0,0,1-2.834-1.167c-1.36-1.322-1.022-3.1-1.084-6.918-.1-6.087-1.032-6.2-.5-10,.258-1.846.381-1.118,1.333-5.584C254.64,327.546,254.766,326.107,255.706,325.808Z"
                                                    transform="translate(-222.726 -269.886)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12238" data-name="Path 12238"
                                                    d="M287.168,457.347c-.345-.661-.935-.765-1.927-1.356-1.965-1.171-2.286-2.334-2.759-2.188-.846.262-.142,4.093.119,8.3.474,7.635-.836,11.293-.143,11.465,1.068.265,2.819-8.74,4.662-14.01A2.848,2.848,0,0,0,287.168,457.347Z"
                                                    transform="translate(-242.778 -356.338)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12239" data-name="Path 12239"
                                                    d="M260.96,420.917c-.172.154.548,1.035,1.307,2.52a21.515,21.515,0,0,1,1.773,5.506A71.093,71.093,0,0,1,266,441.729a67.253,67.253,0,0,1-.466,12.319c-.587,4.473-1.467,7.612-1.307,7.653s1.494-3.507,2.333-7.839a53.751,53.751,0,0,0,.467-16.239c-.341-2.777-.542-2.567-.933-5.88-.5-4.211-.311-5.72-1.493-7.653C263.313,421.987,261.208,420.7,260.96,420.917Z"
                                                    transform="translate(-228.504 -334.23)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12240" class="Quadriceps" data-name="Path 12240"
                                                    d="M239.235,426.386c-.286.052.609,2.779-.437,5.434-1.225,3.108-4.551,4.7-7.12,5.558a51.719,51.719,0,0,0-2.561,25.168c.835,1.914,1.6,2.4,2.186,2.436.908.054,1.283-.984,2.5-1a3.53,3.53,0,0,1,2.248,1.062c1.115.974.972,1.753,1.936,2.186a2.492,2.492,0,0,0,1.811.062c1.2-.433,1.724-1.842,2-2.748a41.615,41.615,0,0,0,1.5-12.428c-.389-7.708-.584-11.562-1.436-16.238C240.841,430.307,239.58,426.323,239.235,426.386Z"
                                                    transform="translate(-206.668 -337.944)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12241" class="Calfs" data-name="Path 12241"
                                                    d="M223.614,552.5a43.6,43.6,0,0,1,1.622,12.5c-.087,4.483-.84,5.765-1.717,13.453-.867,7.594-.769,11.927-1.05,11.926-.4,0-.645-8.851-.858-16.6a89.606,89.606,0,0,1,0-9.255A63.338,63.338,0,0,1,223.614,552.5Z"
                                                    transform="translate(-201.869 -423.347)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12242" class="Calfs" data-name="Path 12242"
                                                    d="M241.465,624.535c-.743.034-.881,16.1-.242,16.116.3.009-.375-3.559,1.5-8.082.821-1.981,2.2-4.322,1.355-5.275-.3-.342-.669-.251-1.307-.775C241.707,625.646,241.662,624.526,241.465,624.535Z"
                                                    transform="translate(-214.91 -471.788)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12243" class="Calfs" data-name="Path 12243"
                                                    d="M251.073,559.091a13.731,13.731,0,0,0-4.88,5.448c-.54,1.123-.84,3.129-1.42,7.1-.773,5.293-.687,6.683-.055,8.111a8.3,8.3,0,0,0,2.262,2.96,48.867,48.867,0,0,0,2.75-8.486,27.786,27.786,0,0,0,.682-3.714c.355-3.544-.307-5.255.188-8.929A23.349,23.349,0,0,1,251.073,559.091Z"
                                                    transform="translate(-217.216 -427.489)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12244" class="Abdominals" data-name="Path 12244"
                                                    d="M283.706,330.3c-.478-.393-1.2-.242-1.964-.081a5.68,5.68,0,0,0-2.453,1.115c-1.363,1.083-2.839,3.307-2.162,4.417.305.5,2.1.41,5.679.228a1.538,1.538,0,0,0,.994-.322c.385-.341.4-.838.313-2.957C284.036,330.845,284,330.54,283.706,330.3Z"
                                                    transform="translate(-239.328 -272.722)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12245" class="Abdominals" data-name="Path 12245"
                                                    d="M277.761,350.707a2.119,2.119,0,0,0-1.291.541,1.827,1.827,0,0,0-.4.64,7.715,7.715,0,0,0-.282,2.983c.007.937.016,1.411.266,1.664a1.489,1.489,0,0,0,1.082.333q1.993.022,3.987-.021a2.5,2.5,0,0,0,2.05-.853c.071-.115.129-.246.208-1.374a24.176,24.176,0,0,0,0-2.664,1.511,1.511,0,0,0-.25-1,1.4,1.4,0,0,0-1.027-.413A37.339,37.339,0,0,0,277.761,350.707Z"
                                                    transform="translate(-238.537 -286.554)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12246" class="Abdominals" data-name="Path 12246"
                                                    d="M277.33,371.718a2.122,2.122,0,0,0-1.29.541,1.834,1.834,0,0,0-.4.639,7.712,7.712,0,0,0-.282,2.984c.007.937.015,1.411.266,1.664a1.487,1.487,0,0,0,1.082.333q1.992.021,3.987-.022a2.5,2.5,0,0,0,2.05-.853c.071-.115.128-.246.208-1.374a23.922,23.922,0,0,0,0-2.664,1.51,1.51,0,0,0-.25-1,1.4,1.4,0,0,0-1.027-.413A37.326,37.326,0,0,0,277.33,371.718Z"
                                                    transform="translate(-238.246 -300.741)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12247" class="Abdominals" data-name="Path 12247"
                                                    d="M276.185,393.516a2.04,2.04,0,0,0-.946.453,1.992,1.992,0,0,0-.521.782,5.312,5.312,0,0,0,0,3.059c.186,1.008.358,1.584.358,1.584,1.15,3.851,1.725,5.776,2.776,7.357.532.8,2.22,3.333,3.372,2.972.642-.2.766-1.233,1.068-3.106q.1-2.662.2-5.323c.072-2.711.1-4.853.123-6.227.007-.374.022-1.181-.48-1.55a1.517,1.517,0,0,0-.933-.192c-1.042-.022-1.563-.033-2.126-.014A14.283,14.283,0,0,0,276.185,393.516Z"
                                                    transform="translate(-237.678 -315.466)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12248" data-name="Path 12248"
                                                    d="M300.244,153.53c4.4.25,8.159,2.288,9.4,5.149.533,1.226,1.392,4.416.671,6.35-.017.045-.35.937-.183,1.028s.7-.862,1.037-.786c.544.124.779,2.518.183,4.6a8.935,8.935,0,0,1-2.926,4.354q-.061,3.87-.122,7.741c5.225,1.371,9.743,2.755,13.474,3.992,2.652.879,5.051,1.731,6.4,4,.693,1.168.86,2.394,1.193,4.845.426,3.134.03,4.291.708,7.1a21.4,21.4,0,0,0,1.007,3.032c1.478,3.9.44,5.905,1.122,13.2a14.133,14.133,0,0,0,.751,3.841,40.048,40.048,0,0,0,2.092,4.025,21.254,21.254,0,0,1,1.471,4.373,67.59,67.59,0,0,1,1.67,12.75c.057,1.83.03,3.337,1.12,4.41s2.394.659,3.209,1.938c.788,1.237.068,1.914.7,3.6.9,2.4,3.073,2.92,2.79,4.29a1.51,1.51,0,0,1-.976,1.107c-.168.049-.792.186-1.953-.83-1.89-1.655-2.234-3.8-2.512-3.737s.2,2.117,0,4.727a16.755,16.755,0,0,1-.57,3.252,8.908,8.908,0,0,1-.951,2.31c-.678,1.151-1.983,2.768-2.466,2.545-.845-.389.952-6.35.9-6.363s-2.04,5.246-3.581,6.488c-.178.143-.588.474-.983.354-.461-.14-.6-.789-.625-.886,1.736-4.19,2.237-5.4,2.233-5.406a10.207,10.207,0,0,1-3.127,4.254c-.907.674-1.3.642-1.519.531-.377-.193-.532-.8-.447-1.506l3.038-4.342c-2.31,2.644-3.177,3.011-3.529,2.814-.329-.184-.42-.981-.156-1.5.23-.453.593-.425,1.093-1.037a5.156,5.156,0,0,0,.58-1.049,9.627,9.627,0,0,0,.7-1.732,5.913,5.913,0,0,0,.113-1.97c-.22-4.1-.364-4.739.117-5.553a5.934,5.934,0,0,0,.674-1.234h0a15,15,0,0,0,.237-2.431c.078-2.7-3.136-4.306-5.194-8.462a20.083,20.083,0,0,1-1.58-5.252c-.835-3.94-.3-4.995-1.393-7.693-.853-2.1-1.336-1.847-2.346-4.311-1.288-3.143-1.146-5.107-1.739-5.175-.955-.11-2.259,5.169-2.45,5.959a50.31,50.31,0,0,0-1.308,12.055,29.708,29.708,0,0,0,.333,6.2,46.019,46.019,0,0,0,1.923,6.443c.133.407.236.712.323.963,0,0,.194.566.393,1.124.5,1.385,1.608,3.847,1.608,3.847a33.49,33.49,0,0,1,1.686,5.08,59.715,59.715,0,0,1,1.346,5.922c.187,1.054,1.006,4.538,1.441,14.585a90.08,90.08,0,0,0,.812,9.6c.362,2.416.6,3.685.8,4.922.845,5.094.254,7.551-.55,22.811a75.226,75.226,0,0,0,0,7.95,29.3,29.3,0,0,0,.418,4.523c.385,1.793,1.63,5.428,6.745,9.136a2.249,2.249,0,0,1,.226,1.9c-.374.788-1.432,1.007-2.226,1.129a72.344,72.344,0,0,1-10.833.294,1.964,1.964,0,0,1-1.434-.834,1.9,1.9,0,0,1-.248-1.472q.173-2.4.347-4.808a5.847,5.847,0,0,1-.841-1.668,5.3,5.3,0,0,1-.247-1.276,4.7,4.7,0,0,1,1.039-2.993c-.06-1.254-.171-2.565-.347-3.925a50.021,50.021,0,0,0-3.551-13.075A47.662,47.662,0,0,1,312,294.113a33.1,33.1,0,0,0-.814-7.064,34.678,34.678,0,0,0-2.442-6.862c-3.687-8.283-5.53-12.424-6.341-15.08-.3-1-.513-1.8-.652-2.378,0,0-.081-.336-.158-.681-.248-1.115-.656-4.053-1.045-7.993"
                                                    transform="translate(-255.392 -153.53)" fill="none" stroke="#fff"
                                                    stroke-miterlimit="10" stroke-width="0.3" />
                                                <path id="Path_12249" class="Neck" data-name="Path 12249"
                                                    d="M315.013,232.056c-.388-.359-.212-1.132-.137-1.463.546-2.423.938-4.886,1.633-7.27.5-1.729.607-2.157.743-2.146.391.034.4,3.638.331,6.949,4.391,1.281,6.872,1.955,8.212,2.269.3.069,1.17.27,1.16.485-.009.2-.749.309-1.07.36-3.327.519-6.705.627-10.052.992A1.047,1.047,0,0,1,315.013,232.056Z"
                                                    transform="translate(-264.892 -199.021)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12250" class="Shoulder" data-name="Path 12250"
                                                    d="M352.292,253.727c-.176.428,2.661,1.175,3.609,3.913a18.286,18.286,0,0,1,.565,3.131c.232,1.679.226,2.291.3,2.783.558,3.507,6.254,6.535,7.479,5.479.512-.441-.087-1.312-.609-4.783-.592-3.941-.051-4.359-.565-5.7C361.3,253.942,352.591,253,352.292,253.727Z"
                                                    transform="translate(-290.234 -221.051)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12251" class="Biceps" data-name="Path 12251"
                                                    d="M362.781,292.871c.734-.147,1.12.976,3.641,2.993,2.894,2.315,3.472,1.7,4.531,2.913,2.257,2.578,1.158,7.848-1.133,18.285-.069.313-.126.569-.162.728a17.535,17.535,0,0,1-1.618-1.214,20.232,20.232,0,0,1-6.311-10.6C360.237,300.072,361.049,293.218,362.781,292.871Z"
                                                    transform="translate(-296.08 -247.65)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12252" class="Forearm" data-name="Path 12252"
                                                    d="M389.172,355.431c-.266,0-.321,1.157-.976,2.755a18.672,18.672,0,0,1-1.722,2.927c-1.351,2.673,1.261,6.744,3.493,10.222,1.422,2.217,2.482,3.3,4.313,6.6.559,1.005.987,1.85,1.263,2.411-.017-.587-.049-1.395-.115-2.353a68.612,68.612,0,0,0-1.057-7.864c-.746-4.068-1.138-6.129-2.042-7.462a16.6,16.6,0,0,1-1.722-2.468C389.358,357.695,389.542,355.438,389.172,355.431Z"
                                                    transform="translate(-313.131 -289.92)" fill="#CC2936"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12253" class="Forearm" data-name="Path 12253"
                                                    d="M377.233,377.729c.638-.276,2.522,3.625,6.685,10.2,3.313,5.228,6.528,9.714,5.623,10.592-.4.388-1.21-.312-2.7.184-1.42.474-2,1.554-2.39,1.348s.212-1.3.122-2.635c-.143-2.143-2.067-3.479-4.167-6.374a6.229,6.229,0,0,1-.78-1.411,6.155,6.155,0,0,1-.347-1.27c-.325-1.931-1.079-3.488-1.695-6.844C377.141,379.082,376.918,377.865,377.233,377.729Z"
                                                    transform="translate(-307.067 -304.963)" fill="#CC2936"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12254" class="Chest" data-name="Path 12254"
                                                    d="M317.291,255.043a6.557,6.557,0,0,1,3.139,2.149c.313.376,1.408,1.772,1.763,5.143.26,2.475.633,6.031-1.545,9.536-.436.7-2.494,4.013-6.2,4.9-.179.043-.38.078-.773.145-4.957.849-9.019,1.545-10.522-.291a3.188,3.188,0,0,1-.6-2.3c.055-1.55.138-4.171.189-7.457.085-5.5-.017-6.542.9-7.854,1.561-2.242,4.5-2.991,7.137-3.662a18.074,18.074,0,0,1,3.923-.517A7.756,7.756,0,0,1,317.291,255.043Z"
                                                    transform="translate(-256.674 -221.954)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12255" class="Oblique" data-name="Path 12255"
                                                    d="M346.991,314.792c-.29-.078-.491.666-1.58,1.623-1.066.938-1.517.791-1.931,1.317-.852,1.083.225,2.777,1.1,5.836,1.084,3.8.748,5.85,1.229,5.88.625.039,1.629-3.387,1.624-6.67,0-1.113-.118-.987-.176-2.9C347.158,316.711,347.435,314.911,346.991,314.792Z"
                                                    transform="translate(-284.026 -262.434)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12256" class="Oblique" data-name="Path 12256"
                                                    d="M330.821,325.868c-.948-.3-2.222.712-2.834,1.667a4.748,4.748,0,0,0-.583,3c.277,4.53.92,5.7,1,8.334.079,2.586-.5,1.911-.667,6.251-.156,4.037.377,4.4-.25,6.334-.267.823-.665,1.685-.25,2.417.541.954,2.072,1,2.334,1A4.2,4.2,0,0,0,332.4,353.7c1.359-1.322,1.022-3.1,1.083-6.918.1-6.087,1.032-6.2.5-10-.259-1.846-.381-1.119-1.334-5.584C331.888,327.607,331.762,326.168,330.821,325.868Z"
                                                    transform="translate(-273.162 -269.927)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12257" data-name="Path 12257"
                                                    d="M303.035,457.408c.345-.661.935-.765,1.926-1.356,1.965-1.171,2.286-2.335,2.759-2.188.846.261.142,4.093-.119,8.3-.474,7.635.836,11.292.142,11.464-1.068.265-2.819-8.739-4.662-14.01A2.848,2.848,0,0,1,303.035,457.408Z"
                                                    transform="translate(-256.786 -356.379)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12258" data-name="Path 12258"
                                                    d="M326.8,420.978c.172.154-.549,1.035-1.306,2.52A21.494,21.494,0,0,0,323.725,429a71.125,71.125,0,0,0-1.96,12.786,67.278,67.278,0,0,0,.467,12.319c.587,4.473,1.467,7.613,1.307,7.653s-1.494-3.507-2.333-7.84a53.766,53.766,0,0,1-.466-16.239c.341-2.777.542-2.566.933-5.88.5-4.211.311-5.72,1.493-7.653C324.453,422.047,326.557,420.757,326.8,420.978Z"
                                                    transform="translate(-268.622 -334.271)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12259" class="Quadriceps" data-name="Path 12259"
                                                    d="M331.579,426.446c.286.053-.609,2.779.437,5.434,1.224,3.108,4.551,4.7,7.12,5.558a51.72,51.72,0,0,1,2.561,25.169c-.835,1.914-1.6,2.4-2.186,2.435-.908.054-1.283-.984-2.5-1a3.528,3.528,0,0,0-2.248,1.061c-1.116.974-.972,1.754-1.936,2.186a2.492,2.492,0,0,1-1.811.063c-1.2-.433-1.724-1.842-2-2.748a41.621,41.621,0,0,1-1.5-12.428c.389-7.708.584-11.562,1.436-16.238C329.973,430.367,331.234,426.384,331.579,426.446Z"
                                                    transform="translate(-273.507 -337.984)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12260" class="Calfs" data-name="Path 12260"
                                                    d="M369.8,552.562a43.6,43.6,0,0,0-1.622,12.5c.087,4.483.84,5.766,1.717,13.453.867,7.594.769,11.927,1.049,11.926.4,0,.645-8.851.859-16.6a89.691,89.691,0,0,0,0-9.255A63.328,63.328,0,0,0,369.8,552.562Z"
                                                    transform="translate(-300.902 -423.388)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12261" class="Calfs" data-name="Path 12261"
                                                    d="M352.382,624.595c.743.034.881,16.1.242,16.116-.3.008.375-3.559-1.5-8.082-.821-1.981-2.205-4.322-1.355-5.275.3-.341.669-.251,1.307-.774C352.139,625.706,352.185,624.586,352.382,624.595Z"
                                                    transform="translate(-288.298 -471.828)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12262" class="Calfs" data-name="Path 12262"
                                                    d="M335.946,559.152a13.732,13.732,0,0,1,4.88,5.447c.54,1.123.841,3.129,1.42,7.1.773,5.293.687,6.683.055,8.111a8.3,8.3,0,0,1-2.263,2.961,48.929,48.929,0,0,1-2.75-8.486,27.839,27.839,0,0,1-.682-3.714c-.355-3.544.307-5.255-.188-8.928A23.4,23.4,0,0,0,335.946,559.152Z"
                                                    transform="translate(-279.163 -427.53)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12263" class="Abdominals" data-name="Path 12263"
                                                    d="M302.6,330.363c.479-.393,1.2-.242,1.964-.082a5.684,5.684,0,0,1,2.453,1.116c1.362,1.083,2.839,3.307,2.162,4.417-.306.5-2.1.41-5.679.229a1.541,1.541,0,0,1-.994-.323c-.384-.341-.4-.838-.313-2.957C302.275,330.905,302.316,330.6,302.6,330.363Z"
                                                    transform="translate(-256.344 -272.762)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12264" class="Abdominals" data-name="Path 12264"
                                                    d="M307.662,350.767a2.123,2.123,0,0,1,1.29.541,1.837,1.837,0,0,1,.4.64,7.718,7.718,0,0,1,.282,2.984c-.007.937-.016,1.411-.267,1.664a1.485,1.485,0,0,1-1.082.333q-1.993.022-3.987-.021a2.5,2.5,0,0,1-2.05-.853c-.072-.115-.129-.246-.208-1.374a24.006,24.006,0,0,1,0-2.664,1.508,1.508,0,0,1,.25-1,1.4,1.4,0,0,1,1.027-.413A37.349,37.349,0,0,1,307.662,350.767Z"
                                                    transform="translate(-256.247 -286.594)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12265" class="Abdominals" data-name="Path 12265"
                                                    d="M308.094,371.779a2.12,2.12,0,0,1,1.291.541,1.828,1.828,0,0,1,.4.64,7.716,7.716,0,0,1,.282,2.983c-.007.937-.016,1.411-.266,1.664a1.488,1.488,0,0,1-1.082.333q-1.993.022-3.987-.021a2.5,2.5,0,0,1-2.05-.853c-.071-.115-.129-.246-.208-1.374a24.159,24.159,0,0,1,0-2.664,1.511,1.511,0,0,1,.25-1,1.4,1.4,0,0,1,1.027-.413A37.363,37.363,0,0,1,308.094,371.779Z"
                                                    transform="translate(-256.539 -300.782)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                                <path id="Path_12266" class="Abdominals" data-name="Path 12266"
                                                    d="M308.257,393.576a2.04,2.04,0,0,1,.947.452,1.99,1.99,0,0,1,.521.782,5.305,5.305,0,0,1,0,3.058c-.186,1.008-.358,1.584-.358,1.584-1.15,3.851-1.725,5.776-2.776,7.357-.532.8-2.22,3.332-3.372,2.972-.642-.2-.766-1.233-1.069-3.105q-.1-2.662-.2-5.324c-.072-2.71-.1-4.853-.123-6.227-.007-.374-.023-1.181.48-1.55a1.52,1.52,0,0,1,.933-.192c1.042-.022,1.563-.033,2.126-.014A14.253,14.253,0,0,1,308.257,393.576Z"
                                                    transform="translate(-256.125 -315.506)" fill="#fff"
                                                    stroke="rgba(0,0,0,0)" stroke-width="0.3" />
                                            </g>
                                        </svg>
                                    </div>

                                    <div class="col-md-6 col-6 text-start ">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 50%;" height="250"
                                            height="186.714" viewBox="0 0 91.551 186.714">
                                            <g id="Group_54470" data-name="Group 54470" transform="translate(0.236 0.25)">
                                                <path id="Path_12268" class="Oblique" data-name="Path 12268"
                                                    d="M249.106,306.794c-.183.081.061.784.358,2.745.072.474.248,1.636.328,2.745.188,2.6-.217,4,.209,4.148.39.136.717-1.044,2.029-1.462.848-.271,1.368.013,1.641-.358.117-.16.258-.535-.418-1.91a13.186,13.186,0,0,0-1.611-2.477C249.9,307.99,249.359,306.682,249.106,306.794Z"
                                                    transform="translate(-219.813 -236.97)" fill="#fff" />
                                                <path id="Path_12269" class="frist" data-name="Path 12269"
                                                    d="M258.358,337.247c-.066.4-5.123-.807-6.573,1.013a3.689,3.689,0,0,1-1.715,1.24c-.183.057-.542.166-.665.018-.2-.243.348-1.032.612-1.36a5.582,5.582,0,0,1,3.3-1.8C255.977,335.852,258.4,336.963,258.358,337.247Z"
                                                    transform="translate(-220.036 -257.539)" fill="#fff" />
                                                <path id="Path_12270" class="Glutes" data-name="Path 12270"
                                                    d="M261.188,345.631a7.3,7.3,0,0,0-1.387-1.45,7.844,7.844,0,0,0-4.1-1.513c-1.145-.134-5.648-.662-8.069,2.207-.817.968-1.049,1.969-1.513,3.972a15.056,15.056,0,0,0-.063,7.375,9.065,9.065,0,0,0,1.7,3.909c2.754,3.309,7.887,3.106,10.78,2.143a5.347,5.347,0,0,0,2.585-1.576c.9-1.083.985-2.284,1.072-4.413C262.516,348.482,262.138,346.952,261.188,345.631Z"
                                                    transform="translate(-217.424 -261.952)" fill="#fff" />
                                                <path id="Path_12271" class="Hamstrings" data-name="Path 12271"
                                                    d="M232.674,409.667c1.363-.067,1.754,1.158,4.052,1.426,2.174.253,2.826-.725,3.827-.3,2.132.9,2.267,6.648,1.126,11.257-.871,3.517-2.815,6.507-4.352,10.431-.1.252-.486,1.247-1.042,2.618-.47,1.159-.716,1.733-.905,2.2a35.421,35.421,0,0,0-1.509,4.657,10.553,10.553,0,0,0-.733-3.794c-.539-1.353-1.07-1.828-1.552-2.932a8.817,8.817,0,0,1-.508-4.992,9.173,9.173,0,0,1-3.254,4.752c-1.033.742-1.717.827-2.945,1.592a11.822,11.822,0,0,0-3.8,3.892,84.422,84.422,0,0,1,2.979-15.619,62.482,62.482,0,0,1,3.124-7.93C230.283,410.27,231.822,409.708,232.674,409.667Z"
                                                    transform="translate(-200.276 -308.851)" fill="#fff" />
                                                <path id="Path_12272" class="Calfs" data-name="Path 12272"
                                                    d="M228.552,511.979a2.986,2.986,0,0,0-2.336.836,4.257,4.257,0,0,0-1.451,2.066,4.773,4.773,0,0,0-1.058-2.681c-.25-.3-1.364-1.636-2.645-1.441-.628.1-1.17.541-1.791,1.493-1.4,2.141-1.759,4.633-1.86,8.409-.014.507-.018.706.025,4.673,0,0,.005.2.262,9.731.089,3.322.1,4.161.524,4.3.611.2,1.892-1.084,4.6-6.25,1.309,5.553,2.2,6.655,2.77,6.624.275-.014.607-.3,1.684-3.593a50.882,50.882,0,0,0,2.133-7.522c.211-1.185.041-.538.537-4.21.173-1.28.519-3.769.751-6.84.141-1.862.182-3.162-.6-4.359A2.6,2.6,0,0,0,228.552,511.979Z"
                                                    transform="translate(-197.705 -379.474)" fill="#fff" />
                                                <path id="Path_12273" class="LowerBack" data-name="Path 12273"
                                                    d="M242.747,245.211c-1.877-.652-2.777,1.122-5.631,1.024-3.2-.11-4.79-2.438-5.529-1.843-.761.612.926,3.072,2.559,7.986,2.019,6.075,1.1,7.3,3.174,9.931a33.978,33.978,0,0,1,3.583,4.4c1.233,1.956,1.309,2.73,1.843,2.866,1.151.294,3.5-2.606,8.6-15.049a18.918,18.918,0,0,1-5.119-4.812C244.483,247.288,244.325,245.759,242.747,245.211Z"
                                                    transform="translate(-207.486 -193.305)" fill="#fff" />
                                                <path id="Path_12274" class="Forearm" data-name="Path 12274"
                                                    d="M183.511,313.995c-.844-.021-1.848,3.1-3.856,9.347a40.554,40.554,0,0,0-1.64,5.951c-.363,2.2-.166,2.645-.729,3.886-.243.536-1.144,2.358-1.032,3.218a2.4,2.4,0,0,0,.476,1.153s.03.037.06.067c.929.926,3.349.6,4.448-.692,1.384-1.631-.455-3.471.1-6.919.642-4,3.549-4.222,4.349-8.2C186.436,318.069,184.718,314.025,183.511,313.995Z"
                                                    transform="translate(-168.948 -242.005)" fill="#CC2936" />
                                                <path id="Path_12275" class="Forearm" data-name="Path 12275"
                                                    d="M184.836,308.685c.352.057.311,2.5.068,4.411a21.636,21.636,0,0,1-2.546,7.707,35.514,35.514,0,0,1,.773-7C183.579,311.692,184.434,308.62,184.836,308.685Z"
                                                    transform="translate(-173.22 -238.295)" fill="#CC2936" />
                                                <path id="Path_12276" data-name="Path 12276"
                                                    d="M202.142,224.662c1.062.332.14,3.6,1.208,7.854.916,3.649,2.226,3.755,2.568,6.041.949,6.353-8.054,12.942-9.137,12.158-.633-.458,1.139-3.656,0-6.721-.252-.677-.48-.9-.68-.906-.456-.006-.726,1.16-1.435,2.945-.512,1.29-1.444,3.385-1.661,3.323-.236-.068.821-2.79,1.208-6.645.378-3.755-.308-4.319.244-8.167.361-2.515.592-3.988,1.759-5.361.614-.723.788-.6,3.475-2.8C201.522,224.884,201.778,224.548,202.142,224.662Z"
                                                    transform="translate(-180.634 -179.573)" fill="#fff" />
                                                <path id="Path_12277" data-name="Path 12277"
                                                    d="M228.437,223.132c-.778.37-.581,2.292-.565,2.442a4.476,4.476,0,0,0,.974,2.274,5.791,5.791,0,0,0,2.833,1.723,9.064,9.064,0,0,0,4.033.587c.573-.051,2.973-.264,3.069-.981.115-.854-3.236-.963-6.961-3.829C230.131,224.048,229.156,222.79,228.437,223.132Z"
                                                    transform="translate(-204.997 -178.479)" fill="#fff" />
                                                <path id="Path_12278" data-name="Path 12278"
                                                    d="M236.77,212.207a9.717,9.717,0,0,0,6.413-4.138,17.876,17.876,0,0,0,1.918,9.565,43.263,43.263,0,0,0-8.331-5.426Z"
                                                    transform="translate(-211.238 -167.994)" fill="#fff" />
                                                <path id="Path_12279" class="Shoulder" data-name="Path 12279"
                                                    d="M203.5,200.117c.211-1.237.515-3.151.788-5.512.516-4.464.314-5.249,1.1-6.437,1.565-2.376,5.031-3.265,7.772-2.842,1.859.287,5.313,1.477,5.718,4.006.335,2.094-1.609,3.909-1.986,4.245-1.983,1.769-3.935,1.274-6.916,2.26A15.617,15.617,0,0,0,203.5,200.117Z"
                                                    transform="translate(-187.99 -152.032)" fill="#fff" />
                                                <path id="Path_12280" class="UpperBack" data-name="Path 12280"
                                                    d="M252.484,144.514c.559-.554,1.529-.937,2.077-.58.426.278.476.924.478,1.482a18.529,18.529,0,0,1-2.171,7.794c-.546.979-1.091,1.791-.811,2.667a2.582,2.582,0,0,0,1.363,1.363c1.261.714,2.3,6.47,2.044,25.515a17.225,17.225,0,0,1-6.89-6.814c-1.48-2.8-1.138-4.364-3.786-12.493-.742-2.277-1.355-3.953-2.953-5.451a10.243,10.243,0,0,0-5.148-2.5,20.39,20.39,0,0,1,9.322-2.89c1.5-.048,2.836-.111,3.775-1.122,1.136-1.224,1.673-3.962,1.951-5.379A2.9,2.9,0,0,1,252.484,144.514Z"
                                                    transform="translate(-211.18 -123.085)" fill="#fff" />
                                                <path id="Path_12282" class="Oblique" data-name="Path 12282"
                                                    d="M346.284,306.837c.183.082-.061.784-.358,2.745-.072.474-.248,1.636-.328,2.745-.188,2.6.217,4-.209,4.148-.39.137-.717-1.044-2.029-1.462-.848-.271-1.368.014-1.641-.358-.117-.16-.258-.535.418-1.91a13.2,13.2,0,0,1,1.611-2.477C345.494,308.033,346.031,306.725,346.284,306.837Z"
                                                    transform="translate(-284.498 -237)" fill="#fff" />
                                                <path id="Path_12283" data-name="Path 12283"
                                                    d="M327.129,337.29c.065.4,5.123-.807,6.573,1.013a3.685,3.685,0,0,0,1.715,1.24c.183.058.542.166.665.018.2-.243-.349-1.032-.612-1.36a5.586,5.586,0,0,0-3.3-1.8C329.511,335.9,327.083,337.006,327.129,337.29Z"
                                                    transform="translate(-274.373 -257.569)" fill="#fff" />
                                                <path id="Path_12284" class="Glutes" data-name="Path 12284"
                                                    d="M306.47,345.674a7.29,7.29,0,0,1,1.387-1.45,7.841,7.841,0,0,1,4.1-1.513c1.145-.134,5.648-.662,8.069,2.206.817.968,1.049,1.969,1.513,3.971a15.058,15.058,0,0,1,.063,7.376,9.066,9.066,0,0,1-1.7,3.909c-2.753,3.309-7.887,3.106-10.78,2.143a5.35,5.35,0,0,1-2.585-1.576c-.9-1.084-.984-2.285-1.072-4.413C305.141,348.526,305.52,346.995,306.47,345.674Z"
                                                    transform="translate(-259.156 -261.983)" fill="#fff" />
                                                <path id="Path_12285" class="Hamstrings" data-name="Path 12285"
                                                    d="M324.258,409.71c-1.363-.067-1.754,1.158-4.052,1.426-2.173.253-2.825-.725-3.827-.3-2.132.9-2.267,6.648-1.126,11.257.871,3.517,2.815,6.507,4.353,10.431.1.252.485,1.247,1.042,2.618.47,1.159.716,1.733.905,2.2A35.448,35.448,0,0,1,323.062,442a10.558,10.558,0,0,1,.733-3.794c.539-1.353,1.07-1.828,1.552-2.932a8.819,8.819,0,0,0,.508-4.992,9.174,9.174,0,0,0,3.254,4.752c1.033.742,1.717.827,2.945,1.592a11.82,11.82,0,0,1,3.8,3.893,84.409,84.409,0,0,0-2.979-15.619,62.458,62.458,0,0,0-3.124-7.93C326.65,410.313,325.111,409.751,324.258,409.71Z"
                                                    transform="translate(-265.578 -308.881)" fill="#fff" />
                                                <path id="Path_12286" class="Calfs" data-name="Path 12286"
                                                    d="M346.771,512.023a2.984,2.984,0,0,1,2.336.836,4.258,4.258,0,0,1,1.451,2.066,4.773,4.773,0,0,1,1.058-2.681c.25-.3,1.364-1.636,2.645-1.441.628.1,1.17.541,1.791,1.493,1.4,2.14,1.759,4.632,1.859,8.409.014.507.019.707-.024,4.673,0,0-.005.2-.262,9.731-.089,3.322-.1,4.161-.524,4.3-.611.2-1.891-1.084-4.6-6.25-1.309,5.553-2.2,6.654-2.77,6.624-.275-.014-.607-.3-1.684-3.593a50.889,50.889,0,0,1-2.133-7.523c-.211-1.185-.041-.538-.537-4.21-.173-1.281-.519-3.77-.752-6.84-.141-1.862-.182-3.162.6-4.359A2.6,2.6,0,0,1,346.771,512.023Z"
                                                    transform="translate(-286.54 -379.505)" fill="#fff" />
                                                <path id="Path_12287" class="LowerBack" data-name="Path 12287"
                                                    d="M317.346,245.254c1.877-.653,2.778,1.122,5.631,1.024,3.2-.11,4.789-2.438,5.528-1.843.761.612-.926,3.072-2.559,7.986-2.019,6.075-1.1,7.3-3.174,9.931a34.031,34.031,0,0,0-3.583,4.4c-1.233,1.956-1.309,2.73-1.843,2.867-1.151.294-3.5-2.606-8.6-15.05a18.915,18.915,0,0,0,5.119-4.812C315.61,247.332,315.768,245.8,317.346,245.254Z"
                                                    transform="translate(-261.529 -193.335)" fill="#fff" />
                                                <path id="Path_12288" class="Forearm" data-name="Path 12288"
                                                    d="M400.521,314.039c.844-.021,1.848,3.1,3.857,9.347a40.528,40.528,0,0,1,1.639,5.951c.363,2.2.166,2.645.729,3.886.243.536,1.144,2.358,1.032,3.218a2.394,2.394,0,0,1-.476,1.153s-.03.037-.06.067c-.93.925-3.349.6-4.448-.692-1.384-1.631.455-3.471-.1-6.919-.642-4-3.549-4.223-4.349-8.2C397.6,318.112,399.315,314.069,400.521,314.039Z"
                                                    transform="translate(-324.006 -242.036)" fill="#CC2936" />
                                                <path id="Path_12289" class="Forearm" data-name="Path 12289"
                                                    d="M415.173,308.729c-.352.057-.311,2.5-.068,4.41a21.632,21.632,0,0,0,2.546,7.707,35.467,35.467,0,0,0-.773-7C416.43,311.736,415.575,308.664,415.173,308.729Z"
                                                    transform="translate(-335.711 -238.325)" fill="#CC2936" />
                                                <path id="Path_12290" data-name="Path 12290"
                                                    d="M374.022,224.7c-1.062.332-.14,3.6-1.208,7.854-.917,3.649-2.226,3.755-2.567,6.041-.949,6.353,8.054,12.942,9.137,12.158.634-.458-1.139-3.655,0-6.721.252-.677.48-.9.68-.906.456-.006.726,1.16,1.435,2.945.512,1.29,1.444,3.386,1.662,3.323.236-.068-.821-2.79-1.208-6.645-.377-3.756.308-4.32-.244-8.167-.361-2.516-.592-3.988-1.759-5.361-.614-.722-.788-.6-3.475-2.8C374.642,224.927,374.386,224.591,374.022,224.7Z"
                                                    transform="translate(-304.451 -179.603)" fill="#fff" />
                                                <path id="Path_12291" data-name="Path 12291"
                                                    d="M352.528,223.176c.777.37.581,2.292.565,2.442a4.481,4.481,0,0,1-.974,2.273,5.8,5.8,0,0,1-2.834,1.723,9.065,9.065,0,0,1-4.033.586c-.573-.051-2.973-.264-3.069-.981-.115-.854,3.236-.963,6.961-3.829C350.834,224.092,351.809,222.834,352.528,223.176Z"
                                                    transform="translate(-284.889 -178.509)" fill="#fff" />
                                                <path id="Path_12292" data-name="Path 12292"
                                                    d="M350.261,212.251a9.716,9.716,0,0,1-6.413-4.139,17.875,17.875,0,0,1-1.918,9.565,43.293,43.293,0,0,1,8.331-5.426Z"
                                                    transform="translate(-284.715 -168.024)" fill="#fff" />
                                                <path id="Path_12293" class="Shoulder" data-name="Path 12293"
                                                    d="M367.113,200.16c-.211-1.237-.515-3.151-.788-5.512-.516-4.464-.313-5.249-1.1-6.437-1.565-2.376-5.032-3.266-7.772-2.842-1.859.287-5.313,1.477-5.718,4.006-.335,2.094,1.609,3.909,1.986,4.245,1.983,1.769,3.935,1.274,6.916,2.26A15.614,15.614,0,0,1,367.113,200.16Z"
                                                    transform="translate(-291.542 -152.062)" fill="#fff" />
                                                <path id="Path_12294" class="UpperBack" data-name="Path 12294"
                                                    d="M310.236,144.557c-.559-.554-1.529-.938-2.077-.58-.426.278-.476.924-.477,1.482a18.529,18.529,0,0,0,2.171,7.794c.546.979,1.091,1.791.811,2.667a2.583,2.583,0,0,1-1.363,1.363c-1.261.714-2.3,6.47-2.044,25.514a17.225,17.225,0,0,0,6.889-6.814c1.48-2.8,1.138-4.365,3.786-12.492.742-2.277,1.355-3.954,2.953-5.451a10.245,10.245,0,0,1,5.148-2.5,20.392,20.392,0,0,0-9.322-2.889c-1.5-.048-2.836-.112-3.775-1.122-1.136-1.224-1.673-3.963-1.951-5.379A2.9,2.9,0,0,0,310.236,144.557Z"
                                                    transform="translate(-260.461 -123.115)" fill="#fff" />
                                                <path id="Path_12281" data-name="Path 12281"
                                                    d="M303.118,75.1c4.342.248,8.06,2.273,9.294,5.129.533,1.232,1.38,4.417.665,6.349-.017.045-.347.937-.181,1.028s.7-.862,1.028-.786c.539.124.772,2.518.181,4.6a8.946,8.946,0,0,1-2.9,4.353q.116,3.3.232,6.591a18.164,18.164,0,0,1,5.988.57c3.12.85,3.275,1.844,7.556,3.279a19.976,19.976,0,0,1,4.625,1.76,9.189,9.189,0,0,1,3.216,2.659c1.4,2.083.525,3.75.842,8.042.093,1.258.11.332,1.3,6.784,1.182,6.434,1.26,7.871,1.283,8.839.024.989,0,1.943.143,3.564a27.883,27.883,0,0,0,.713,4.562,25.2,25.2,0,0,0,1.711,4.42c1.915,4.56,1.859,10.212,1.813,14.856a5.594,5.594,0,0,0,.7,3.4c1.072,1.616,2.55,1.255,3.6,3,.551.919.154,1.042,1,3a13.137,13.137,0,0,0,1.3,2.5c.871,1.264,1.622,1.775,1.434,2.335a1.1,1.1,0,0,1-.86.615c-1.625.277-3.108-2.869-3.851-2.54-.258.114-.221.553-.287,1.352a11.819,11.819,0,0,1-1.311,4.671,5.324,5.324,0,0,1-2.253,2.212c-.673.325-1.758.645-1.967.328-.282-.428,1.39-1.475,2.254-3.728a7.7,7.7,0,0,0,.491-2.335,11.447,11.447,0,0,1-4.694,6.359c-.443.127-1.176.3-1.336.037s.326-.822.5-1.029a35.394,35.394,0,0,0,3.36-5.449,24.129,24.129,0,0,1-4.75,5.587c-.48.372-1,.691-1.262.519-.324-.209-.123-1.057-.074-1.262a4.086,4.086,0,0,1,.928-1.744,20.78,20.78,0,0,0,2.524-3.414,24.958,24.958,0,0,1-4.49,3.637c-.955.522-1.144.38-1.188.334-.128-.134.017-.471.111-.668.744-1.558,2.258-2.672,2.961-4.028a6.979,6.979,0,0,0,.384-4.321c-.256-1.28-.8-2.137-.365-3.066a2.429,2.429,0,0,1,1.211-1.11,64.815,64.815,0,0,0-2.118-6.456c-1.228-3.173-1.588-3.368-3.026-7-1.524-3.853-1.448-4.465-2.755-7.124-1.208-2.457-1.49-2.376-2.327-4.31-1.7-3.923-1.511-6.507-2.093-6.533-.873-.04-1.8,5.677-2.062,7.317a46.843,46.843,0,0,0-.7,12.33c.162,1.838.429,3.457.681,4.984.52,3.143,1.082,5.5,1.317,6.457.322,1.306.618,2.367.81,3.054.229.816.573,2.01,1.136,3.8,1.215,3.868,1.163,3.262,1.672,5.079a60.015,60.015,0,0,1,1.335,5.92c.085.483.177.945.225,1.22.819,4.622.939,9.716,1.648,16.28.249,2.3.36,2.847.649,5.735,0,0,.311,3.11.508,5.864.361,5.047.07,11.036-.545,22.806a75.687,75.687,0,0,0,0,7.948,29.547,29.547,0,0,0,.414,4.522c.382,1.792,1.617,5.427,6.689,9.135a2.266,2.266,0,0,1,.224,1.9c-.371.788-1.42,1.007-2.207,1.128a71.19,71.19,0,0,1-10.743.294,1.945,1.945,0,0,1-1.423-.834,1.917,1.917,0,0,1-.245-1.472l.343-4.807a5.867,5.867,0,0,1-.834-1.668,5.331,5.331,0,0,1-.245-1.276,4.729,4.729,0,0,1,1.03-2.992c-.06-1.254-.17-2.564-.343-3.924a50.329,50.329,0,0,0-3.522-13.072,47.992,47.992,0,0,1-3.43-15.537,33.368,33.368,0,0,0-.807-7.062,34.873,34.873,0,0,0-2.421-6.861c-3.656-8.281-5.485-12.421-6.289-15.077-.3-1-.508-1.8-.647-2.377,0,0-.08-.333-.157-.681-.247-1.117-.689-4.053-1.161-7.984"
                                                    transform="translate(-257.596 -75.085)" fill="none" stroke="#fff"
                                                    stroke-miterlimit="10" stroke-width="0.5" />
                                                <path id="Path_12267" data-name="Path 12267"
                                                    d="M197.583,75.055c-4.342.247-8.06,2.273-9.294,5.128-.533,1.233-1.379,4.417-.665,6.349.017.045.348.936.181,1.028s-.7-.862-1.028-.786c-.54.124-.773,2.517-.181,4.6a8.943,8.943,0,0,0,2.9,4.354q-.116,3.3-.232,6.591a18.164,18.164,0,0,0-5.987.57c-3.12.85-3.274,1.844-7.556,3.279a19.965,19.965,0,0,0-4.625,1.76,9.188,9.188,0,0,0-3.216,2.659c-1.4,2.083-.525,3.751-.842,8.042-.093,1.258-.11.332-1.3,6.784-1.182,6.433-1.26,7.871-1.283,8.839-.024.99,0,1.943-.143,3.564a27.887,27.887,0,0,1-.713,4.562,25.17,25.17,0,0,1-1.711,4.419c-1.915,4.561-1.859,10.212-1.813,14.857a5.6,5.6,0,0,1-.7,3.4c-1.072,1.617-2.55,1.255-3.6,3-.551.918-.154,1.042-1,3a13.124,13.124,0,0,1-1.3,2.5c-.871,1.264-1.622,1.775-1.434,2.336a1.1,1.1,0,0,0,.86.615c1.625.277,3.107-2.869,3.851-2.54.257.114.221.553.287,1.352a11.811,11.811,0,0,0,1.311,4.671,5.329,5.329,0,0,0,2.254,2.212c.672.325,1.757.645,1.966.328.282-.429-1.39-1.475-2.253-3.728a7.693,7.693,0,0,1-.492-2.335,11.446,11.446,0,0,0,4.694,6.359c.443.126,1.176.3,1.336.037s-.326-.822-.5-1.029a35.383,35.383,0,0,1-3.36-5.449,24.129,24.129,0,0,0,4.75,5.587c.48.372,1,.691,1.262.52.324-.209.123-1.057.074-1.262a4.088,4.088,0,0,0-.928-1.744,20.806,20.806,0,0,1-2.524-3.414,24.969,24.969,0,0,0,4.49,3.637c.955.522,1.144.38,1.188.334.128-.134-.017-.47-.111-.668-.744-1.559-2.258-2.672-2.961-4.029a6.978,6.978,0,0,1-.384-4.32c.256-1.28.8-2.137.365-3.066a2.433,2.433,0,0,0-1.211-1.11,64.871,64.871,0,0,1,2.119-6.456c1.228-3.174,1.588-3.368,3.026-7,1.524-3.853,1.448-4.465,2.755-7.124,1.208-2.457,1.49-2.376,2.327-4.31,1.7-3.923,1.512-6.507,2.094-6.533.872-.04,1.8,5.677,2.061,7.317a46.823,46.823,0,0,1,.7,12.33c-.161,1.838-.429,3.458-.682,4.984-.52,3.143-1.082,5.5-1.317,6.457-.322,1.306-.618,2.366-.81,3.054-.228.816-.573,2.01-1.136,3.8-1.215,3.868-1.163,3.262-1.672,5.079a60.129,60.129,0,0,0-1.335,5.92c-.085.483-.177.946-.225,1.22-.82,4.622-.939,9.716-1.648,16.281-.248,2.3-.36,2.847-.649,5.734,0,0-.311,3.11-.508,5.864-.361,5.047-.07,11.036.545,22.807a75.7,75.7,0,0,1,0,7.948,29.517,29.517,0,0,1-.414,4.522c-.382,1.792-1.616,5.427-6.689,9.134a2.266,2.266,0,0,0-.224,1.9c.371.788,1.42,1.007,2.208,1.128a71.176,71.176,0,0,0,10.743.294,1.944,1.944,0,0,0,1.423-.834,1.915,1.915,0,0,0,.245-1.471l-.343-4.808a5.867,5.867,0,0,0,.834-1.668,5.315,5.315,0,0,0,.245-1.275,4.727,4.727,0,0,0-1.03-2.992c.06-1.254.17-2.565.343-3.925a50.324,50.324,0,0,1,3.522-13.072,47.991,47.991,0,0,0,3.43-15.537,33.325,33.325,0,0,1,.807-7.062,34.843,34.843,0,0,1,2.421-6.861c3.656-8.281,5.484-12.422,6.289-15.077.3-1,.508-1.8.647-2.377,0,0,.08-.333.156-.681.247-1.117.689-4.053,1.161-7.984"
                                                    transform="translate(-152.027 -75.055)" fill="none" stroke="#fff"
                                                    stroke-miterlimit="10" stroke-width="0.5" />
                                            </g>
                                        </svg>
                                    </div>
                                </div>

                                <div class="row custom-Muscles-btn mb-2">

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3 muscle_group_error">
                                        <input type="checkbox" class="btn-check btn-secondary" style="font-family: SF Pro Text;" name="muscle_group_id[]" id="Neck" value="1" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Neck">
                                            <b>Neck</b>
                                        </label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="2" name="muscle_group_id[]" id="Shoulders" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Shoulders">
                                            <b>Shoulders</b>
                                        </label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="3" name="muscle_group_id[]" id="Chest" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Chest">
                                            <b>Chest</b>
                                        </label>
                                    </div>

                                    <div class=" col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary"  value="4" name="muscle_group_id[]" id="Biceps" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Biceps">
                                            <b>Biceps</b>
                                        </label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="5" name="muscle_group_id[]" id="Forearm" autocomplete="off" checked>
                                        <label class="btn btn-outline-secondary" for="Forearm"><b>Forearm</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="6" name="muscle_group_id[]" id="Abdominals" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Abdominals"> <b>Abdominals</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="7" name="muscle_group_id[]" id="Oblique" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Oblique"><b>Oblique</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="8" name="muscle_group_id[]" id="UpperBack" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="UpperBack"><b>Upper Back</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="9" name="muscle_group_id[]"  id="LowerBack" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="LowerBack"><b>Lower Back</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="10" name="muscle_group_id[]" id="Quadriceps" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Quadriceps"> <b>Quadriceps</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="11" name="muscle_group_id[]" id="Hamstrings" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Hamstrings"> <b>Hamstrings</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary"  value="12" name="muscle_group_id[]" id="Calfs" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Calfs"><b>Calfs</b></label>
                                    </div>

                                    <div class="col-md-6 col-lg-4 col-6 text-center mb-3">
                                        <input type="checkbox" class="btn-check btn-secondary" value="13" name="muscle_group_id[]" id="Glutes" autocomplete="off">
                                        <label class="btn btn-outline-secondary" for="Glutes"><b>Glutes</b></label>
                                    </div>

                                </div>

                            </div>

                            <!-- ------------------- screen-10 ------------------- -->
                            <div class="tab">
                                <p class="col-md-5 col-12 custom-buttom mt-3" style="z-index: 1 ;">
                                    <div class="row mt-4">
                                        <div class="col-md-6 col-12">
                                            <div class="text-white mt-md-0 mt-2">
                                                <h4 class="mb-3 text-lg-start text-center">
                                                    <b>Equipment</b>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 d-md-block d-none">
                                            <div class="text-center ">
                                                <div class="text-white">
                                                    <h4  style="padding-bottom: 25px;">
                                                        <b> Burnt Calories </b>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4 text-center">
                                        <div class="col-md-6 col-12 text-center " id="style-4" style="height:200PX; overflow: auto;">

                                            <div class="text-white mb-3">
                                                <div class="copy hide p-0" style="display: none">
                                                    <div class="control-group input-group d-block">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 col-2 p-0">
                                                                <button class="btn text-white remove-btn remove" type="button">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-10 ">
                                                                <select class="form-select mb-2 text-center" name="equipment[]" aria-label="Default select example" required>
                                                                    <option selected value="">Equipment</option>
                                                                    @foreach ($equipment as $single)
                                                                        <option value="{{ $single->id }}">
                                                                            {{ $single->equipment_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="hide p-0">
                                                    <div class="control-group input-group d-block">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 col-2 p-0">
                                                                <button class="btn text-white remove-btn remove" type="button">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-lg-10 col-md-10 col-10 ">
                                                                <select class="form-select mb-2 text-center" name="equipment[]"  aria-label="Default select example" required>
                                                                        <option selected value="">Equipment</option>
                                                                    @foreach ($equipment as $single)
                                                                        <option value="{{ $single->id }}">
                                                                            {{ $single->equipment_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="after-add-more w-100">
                                                        <div class="input-group-btn">
                                                            <div class="row">
                                                                <div class="col-2"></div>
                                                                <div class="col-10 mb-4">
  <button class="btn add-more w-100" type="button" style=" border-radius: 6px; background-color: #526070  !important; color:#fff;">
                                                                    <i class="bi bi-plus-circle" style="padding-right: 10px;"></i> Add
                                                                </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 text-start ps-lg-3 ps-md-4 mt-md-0 mt-2">
                                            <div class="text-center d-block d-md-none">
                                                <div class="text-white">
                                                    <h5 style="padding-bottom: 25px;">
                                                        <b>Burnt Calories</b>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="mb-3 custom-screen7-bgimg" style="display: flex; justify-content: center;">
                                                <div class="screen5-form select m-auto">
                                                    <div class="input-group" style="width: 155px;">
                                                        <input type="number" name="burn_calories" min="0" max="99999" maxlength="4" class="form-control form-select burn_calories" placeholder="Edit…" id="zipCode">
                                                        <button class="btn btn-secondary" type="button">kcal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="screen5-form select">
                                        <div class="form-floating mb-2">
                                            <textarea class="form-control py-4" maxlength="500" placeholder="Leave a comment here" rows="7" name="description" id="description" style="height: 210px;resize: none;  padding: 0.75rem !important;"required></textarea>

                                            <label for="description" class="text-white custom-textarealable" style="font-size: 18px;padding: 0.75rem !important;" required>Edit Description…</label>

                                            <div id="the-count">
                                                <span id="current" style="color: #fff;">500</span>
                                                <span id="maximum" style="color: #fff;">/ 500</span>
                                            </div>

                                        </div>
                                    </div>
                                </p>
                            </div>


                            <div style="overflow:auto;">
                                <div class="mb-4" style=" margin-top: 5px;">
                                    <div class="text-start">
                                        <button type="button" class="previous">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="next btn btn-danger mt-2" style="padding: 1.5% 24%;">
                                            <b>Next</b>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger mt-2 submit" style="padding: 1.5% 24%;">
                                            <b>Save</b>
                                        </button>
                                    </div>
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
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/multi-form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/timepicker.min.js')}}"></script>

    <script>
        $("input[type='checkbox']").change(function() {
            if ($("input[id='Neck']").is(":checked")) {
                $('label[for="Neck"]').addClass("redBackground");
            }else {
                $('label[for="Neck"]').removeClass("redBackground");
            }
        });
    </script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: 'dd/mm/yy',
                changeYear: true,
            });

            $('.bs-timepicker').timepicker({
                defaultTime: '15:35',
                startTime: '10:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            var val = {
                rules: {
                    'class_type_id': "required",
                    'class_subtitle': "required",
                    'class_difficulty_id': "required",
                    'class_date': "required",
                    'class_time': "required",
                    'duration': {
                        "required": true,
                        "step": 5
                    },
                    'subscriber_fee': "required",
                    'non_subscriber_fee': "required",
                    'description': "required",
                    'muscle_group_id[]': "required",
                    'equipment[]': "required",
                    'burn_calories': {
                        required: true,
                        minlength: 0,
                        maxlength: 4,
                        digits: true
                    },
                },
                // Specify validation error messages
                messages: {
                    'class_type_id': "Please select class type",
                    'class_subtitle': "Please enter a class subtitle",
                    'class_difficulty_id': "Please select class difficulty",
                    'class_date': "Please select class date",
                    'class_time': "Please select class time",
                    'duration': {
                        "required": "Please enter class duration time",
                        "step": "Please enter valid class duration time"
                    },
                    'subscriber_fee': "Please enter subscribers fee",
                    'non_subscriber_fee': "Please enter nonsubscribers fee",
                    'muscle_group_id[]': "Please select muscle group",
                    'equipment[]': "Please select equipment",
                    'burn_calories': {
                        required: "kcal is required",
                        digits: "kcal should be a number"
                    }
                }
            }

            $("#myForm").multiStepForm({
                // defaultStep: 0,
                beforeSubmit: function(form, submit) {
                    alert();
                    console.log("called before submiting the form");
                    console.log(form);
                    console.log(submit);
                },
                validations: val,
            }).navigateTo(0);


            $("#myForm").submit(function(event) {
                event.preventDefault();

                if ($('#thumbnail_image-form #thumbnail_image').val().length === 0) {
                    toastr.error("Please upload thumbnail image");
                } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    var formData = new FormData($("#thumbnail_image-form")[0]);
                    var poData = jQuery(document.forms['myForm']).serializeArray();
                    for (var i = 0; i < poData.length; i++)
                        formData.append(poData[i].name, poData[i].value);

                    $.ajax({
                        url: "{{ route('saveScheduleLiveVideo') }}",
                        method: 'POST',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {
                            var response = JSON.parse(response);
                            if (response.error) {
                                toastr.error(response.error);
                            } else {
                                $('#myForm').trigger('reset');
                                toastr.success(response.success);
                                window.location.href = "{{ route('uploadsuccess') }}";
                            }
                        }
                    });
                }
            });



            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").before(html);
            });

            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });

            $("body").on("click", ".remove", function(e) {
                $(".next-referral").last().remove();
            });

            //1 Neck
            $('[id*=Neck]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Neck").css("fill", "#CC2936");
                } else {
                    $(".Neck").css("fill", "#fff");
                }
            });
            //2 Shoulder
            $('[id*=Shoulder]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Shoulder").css("fill", "#CC2936");
                } else {
                    $(".Shoulder").css("fill", "#fff");
                }
            });
            //3 Chest
            $('[id*=Chest]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Chest").css("fill", "#CC2936");
                } else {
                    $(".Chest").css("fill", "#fff");
                }
            });
            //4 Biceps
            $('[id*= Biceps]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Biceps").css("fill", "#CC2936");
                } else {
                    $(".Biceps").css("fill", "#fff");
                }
            });
            //5 Forearm
            $('[id*= Forearm]').click(function() {

                if ($(this).is(":checked")) {
                    $(".Forearm").css("fill", "#CC2936");
                } else {
                    $(".Forearm").css("fill", "#fff");
                }
            });
            //6 Abdominals
            $('[id*= Abdominals]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Abdominals").css("fill", "#CC2936");
                } else {
                    $(".Abdominals").css("fill", "#fff");
                }
            });
            //7 Oblique
            $('[id*=Oblique]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Oblique").css("fill", "#CC2936");
                } else {
                    $(".Oblique").css("fill", "#fff");
                }
            });
            //8 Upper Back
            $('[id*=UpperBack]').click(function() {
                if ($(this).is(":checked")) {
                    $(".UpperBack").css("fill", "#CC2936");
                } else {
                    $(".UpperBack").css("fill", "#fff");
                }
            });
            //9 LowerBack
            $('[id*=LowerBack]').click(function() {
                if ($(this).is(":checked")) {
                    $(".LowerBack").css("fill", "#CC2936");
                } else {
                    $(".LowerBack").css("fill", "#fff");
                }
            });
            //10 Quadriceps
            $('[id*=Quadriceps]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Quadriceps").css("fill", "#CC2936");
                } else {
                    $(".Quadriceps").css("fill", "#fff");
                }
            });
            //11 Hamstrings
            $('[id*=Hamstrings]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Hamstrings").css("fill", "#CC2936");
                } else {
                    $(".Hamstrings").css("fill", "#fff");
                }
            });
            // 12 Calfs
            $('[id*=Calfs]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Calfs").css("fill", "#CC2936");
                } else {
                    $(".Calfs").css("fill", "#fff");
                }
            });
            //13 Glutes
            $('[id*=Glutes]').click(function() {
                if ($(this).is(":checked")) {
                    $(".Glutes").css("fill","#cc2936");
                }else{
                    $(".Glutes").css("fill","#fff");
                }
            });

        });

        var maxLength = 500;
        $('textarea').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#current').text(textlen);
        });

        var inputQuantity = [];
        $(function() {
            $(".burn_calories").on("keyup", function(e) {
                var $field = $(this),
                    val = this.value,
                    $thisIndex = parseInt($field.data("idx"), 10);
                if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid")) {
                    this.value = inputQuantity[$thisIndex];
                    return;
                }
                if (val.length > Number($field.attr("maxlength"))) {
                    val = val.slice(0, 4);
                    $field.val(val);
                }
                inputQuantity[$thisIndex] = val;
            });
        });

        // File Upload//
        function ekUpload() {
            function Init() {

                console.log("Upload Initialised");

                var fileSelect = document.getElementById('thumbnail_image'),
                    fileDrag = document.getElementById('file-drag'),
                    submitButton = document.getElementById('submit-button');

                fileSelect.addEventListener('change', fileSelectHandler, false);

                // Is XHR2 available?
                var xhr = new XMLHttpRequest();
                if (xhr.upload) {
                    // File Drop
                    fileDrag.addEventListener('dragover', fileDragHover, false);
                    fileDrag.addEventListener('dragleave', fileDragHover, false);
                    fileDrag.addEventListener('drop', fileSelectHandler, false);
                }
            }

            function fileDragHover(e) {
                var fileDrag = document.getElementById('file-drag');

                e.stopPropagation();
                e.preventDefault();

                fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body thumbnail_image');
            }

            function fileSelectHandler(e) {
                // Fetch FileList object
                var files = e.target.files || e.dataTransfer.files;

                // Cancel event and hover styling
                fileDragHover(e);

                // Process all File objects
                for (var i = 0, f; f = files[i]; i++) {
                    parseFile(f);
                    uploadFile(f);
                }
            }

            // Output
            function output(msg) {
                // Response
                var m = document.getElementById('messages');
                m.innerHTML = msg;
            }

            function parseFile(file) {


                console.log(file.name);

                output(
                    '<strong>' + encodeURI(file.name) + '</strong>'
                );
                var imageName = file.name;

                var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
                if (isGood) {
                    alert("uploaded successfully!");
                    document.getElementById('start').classList.add("hidden");
                    document.getElementById('response').classList.remove("hidden");
                    document.getElementById('notimage').classList.add("hidden");
                    // Thumbnail Preview
                    document.getElementById('file-image').classList.remove("hidden");
                    document.getElementById('file-image').src = URL.createObjectURL(file);
                } else {
                    document.getElementById('file-image').classList.add("hidden");
                    document.getElementById('notimage').classList.remove("hidden");
                    document.getElementById('start').classList.remove("hidden");
                    document.getElementById('response').classList.add("hidden");
                    document.getElementById("thumbnail_image-form").reset();
                }
            }

            function setProgressMaxValue(e) {
                var pBar = document.getElementById('file-progress');

                if (e.lengthComputable) {
                }
            }

            function updateFileProgress(e) {
                var pBar = document.getElementById('file-progress');

                if (e.lengthComputable) {
                }
            }

            function uploadFile(file) {

                var xhr = new XMLHttpRequest(),
                    fileInput = document.getElementById('class-roster-file'),
                    pBar = document.getElementById('file-progress'),
                    fileSizeLimit = 1024; // In MB
                if (xhr.upload) {
                    // Check if file is less than x MB
                    if (file.size <= fileSizeLimit * 1024 * 1024) {
                        // Progress bar
                        // pBar.style.display = 'block';
                        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                        xhr.upload.addEventListener('progress', updateFileProgress, false);

                        // File received / failed
                        xhr.onreadystatechange = function(e) {
                            if (xhr.readyState == 4) {
                            }
                        };

                        // Start upload
                        xhr.open('POST', document.getElementById('thumbnail_image-form').action, true);
                        xhr.setRequestHeader('X-File-Name', file.name);
                        xhr.setRequestHeader('X-File-Size', file.size);
                        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                        // xhr.send(file);
                    } else {
                        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                    }
                }
            }
            // Check for the various File API support.
            if (window.File && window.FileList && window.FileReader) {
                Init();
            } else {
                document.getElementById('file-drag').style.display = 'none';
            }
        }
        ekUpload();
    </script>


@endsection
