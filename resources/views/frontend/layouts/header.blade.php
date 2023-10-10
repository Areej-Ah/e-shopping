<!doctype html>
<html class="no-js" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
	<meta name="keywords" content="Confirmation Lab" />
	<meta name="description" content="Confirmation Lab">

	@if(lang() == "ar")
    <title>{!! setting()->sitename_ar !!}</title>
    @else
    <title>{!! setting()->sitename_en !!}</title>
    @endif

	<link rel="apple-touch-icon" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="144x144">
	<link rel="apple-touch-icon" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="114x114">
	<link rel="apple-touch-icon" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="72x72">
	<link rel="apple-touch-icon" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="57x57">

	<link rel="icon" type="image/png" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="16x16">
	<link rel="icon" type="image/png" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="32x32">
	<link rel="icon" type="image/png" href="{{asset('frontend/lab/images/favicons/favicon-16x16.png')}}" sizes="96x96">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    @if(lang() == "ar")
    <link rel="stylesheet" href="{{asset('frontend/lab/css/bootstrap.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/css/template.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/css/responsive.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/css/custom.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('frontend/lab/css/sliders/ios/style.css')}}" type="text/css" media="all">
    @else
    <link rel="stylesheet" href="{{asset('frontend/lab/E/css/bootstrap.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/E/css/template.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/E/css/responsive.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/E/css/custom.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('frontend/lab/E/css/sliders/ios/style.css')}}" type="text/css" media="all">

    @endif

	<link rel="stylesheet" href="{{asset('frontend/lab/css/base-sizing.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/lab/css/niches/custom-dental.css')}}" type="text/css" />

	<script type="text/javascript" src="{{URL::asset('frontend/lab/js/modernizr.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('frontend/lab/js/jquery.js')}}"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="">

	<div id="page_wrapper">
