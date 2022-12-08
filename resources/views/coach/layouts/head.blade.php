<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/x-icon" href="{{ asset('assets/images/CoachCultureLogo.png') }}" />



<link href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap-icons/bootstrap-icons.scss') }}" rel="stylesheet">

<link href="{{ asset('assets/plugins/fonts/css2.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/fonts/font.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/fonts/kontanter.css') }}" rel="stylesheet">

<link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">

<title> {{ $title ? $title . ' | ' : '' }} CoachCulture </title>
