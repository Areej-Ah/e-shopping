<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="INSPIRO" />
	<meta name="description" content="Daamah">
	<link rel="icon" type="image/png" href="{{ Storage::url(setting()->icon) }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	@if(lang() == "ar")
		<title>{!! setting()->sitename_ar !!}</title>
		<link href="{{asset('frontend/daamah/css/plugins.css')}}" rel="stylesheet">
		<link href="{{asset('frontend/daamah/css/style.css')}}" rel="stylesheet">
	@else
		<title>{!! setting()->sitename_en !!}</title>
		<link href="{{asset('frontend/daamah/en/css/plugins.css')}}" rel="stylesheet">
		<link href="{{asset('frontend/daamah/en/css/style.css')}}" rel="stylesheet">
	@endif
</head>

<body>
