<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Sim Card Management System | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
		<base href="/public">

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		{{-- <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" /> --}}

		{{-- RTL version: --}}
		<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
		{{-- <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" /> --}}

		{{-- RTL version: --}}
		<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		{{-- <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /> --}}

		{{-- RTL version: --}}
		<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />

		  {{-- bootstrap --}}
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
		{{-- sweetalert --}}
		{{-- <link rel="stylesheet" href="{{ asset('plugin/sweetAlert2/sweetalert2.min.css') }}"> --}}
		{{-- <link rel="stylesheet" href="{{ asset('plugin/bahij-nassim/Bahij Nassim-Bold.ttf') }}">
		<link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.css') }}"> --}}
		{{-- select2 --}}
		{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/> --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />


		
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body style="direction: rtl" class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			<!-- BEGIN: Header -->
			@extends('adminLayouts.header')

			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<!-- BEGIN: Left Aside -->
				



                @extends('adminLayouts.aside')

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
                    {{-- @extends('layout.subheader') --}}
				

					<!-- END: Subheader -->
					<div class="m-content">
						@yield('content')
					
						 {{-- <x-app-layout>
    
						</x-app-layout> --}}
						
						
                        

						<!--Begin::Section-->
						

						<!--End::Section-->
					</div>
				</div>
			</div>

			<!-- end:: Body -->

			<!-- begin::Footer -->
            @extends('adminLayouts.footer')
			

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Sidebar -->
		

		<!-- end::Quick Sidebar -->

		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end::Scroll Top -->

		<!-- begin::Quick Nav -->
		{{-- <ul class="m-nav-sticky" style="margin-top: 30px;">
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
				<a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
			</li>
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
				<a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
			</li>
			<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="right">
				<a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank"><i class="la la-life-ring"></i></a>
			</li>
		</ul> --}}

		<!-- begin::Quick Nav -->

		<!--begin::Global Theme Bundle -->
		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors -->
		<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts -->
		<script src="assets/app/js/dashboard.js" type="text/javascript"></script>

		<!--end::Page Scripts -->
		{{-- sweet alert script--}}
		{{-- <script src="{{ asset ('plugin/sweetAlert2/sweetalert2.min.css') }}"></script> --}}

		{{-- jquery --}}
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		{{-- <script src="{{ asset('plugin/select2/js/i18n/af.js') }}"></script> --}}
		{{-- select2 --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

		
		
		
		@yield('script')
	</body>

	<!-- end::Body -->
</html>