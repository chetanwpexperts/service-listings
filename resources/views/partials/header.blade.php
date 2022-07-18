<!doctype html>
<html lang="en">

<head>
	<title>Bizbook Admin Panel</title>
	<!--== META TAGS ==-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#76cef1" />
	<!--== FAV ICON(BROWSER TAB ICON) ==-->
	@php 
	$imgsrc = '';
	if(!empty($websettings) && $websettings['fav_icon'] != "")
	{
		$imgsrc = asset('public/public/admin/settings/'.$websettings['fav_icon']);
	}
	@endphp
	<link rel="shortcut icon" href="{{ $imgsrc }}" type="image/x-icon">
	<!--== GOOGLE FONTS ==-->
	<link href="https://fonts.googleapis.com/css?family=Oswald:700|Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
	<!--== WEB ICON FONTS ==-->
	<link rel="preload" as="font" href="{{ asset('public/css/icon.woff2') }}" type="font/woff2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--== CSS FILES ==-->
	<link rel="stylesheet" href="{{ asset('public/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('public/admin/css/admin-style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/fonts.css') }}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="{{ asset('public/js/html5shiv.js') }}"></script>
    <script src="{{ asset('public/js/respond.min.js') }}"></script>
    <![endif]-->
	<style>
	.chosen-container .chosen-drop {
		width: 100% !important;
	}
	</style>
	<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-msg') }}">
</head>

<body>