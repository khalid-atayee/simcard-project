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
		<title>MOI Simcards Distributions | سیمکارت</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


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

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		<link href="../../../assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link href="../../../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Global Theme Styles -->
		<link rel="shortcut icon" href="../../../assets/demo/default/media/img/logo/favicon.ico" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="loginImage/7.jpg" style="width: 120px">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">{{ __('message.sign in to admin') }}</h3>
							</div>
							<form method="POST" class="m-login__form m-form" action="{{ route('login') }}">
								@csrf
					
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" id="user_email" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" id="user_password" type="password" placeholder="Password" name="password">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox--focus">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
									</div>
									<div class="col m--align-right m-login__form-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
									</div>

									
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" style="background: 
									#9816f4" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
								</div>
							</form>
						</div>
					
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!--begin::Global Theme Bundle -->
		{{-- <script src="../../../assets/vendors/base/vendors.bundle.js" type="text/javascript"></script> --}}
		{{-- <script src="../../../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script> --}}

		<!--end::Global Theme Bundle -->

		<!--begin::Page Scripts -->
		{{-- <script src="../../../assets/snippets/custom/pages/user/login.js" type="text/javascript"></script> --}}
		{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script>
			$(document).on('click','#m_login_signin_submit', function () {
				// var data = {
				// 	'email': $('#user_email').val(),
				// 	'password':$('#user_password').val()
				// }
				$.ajax({
					type: "POST",
					url: "/login",

					success: function (response) {
						
						
					}
				});
				
			});
		</script> --}}

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>









