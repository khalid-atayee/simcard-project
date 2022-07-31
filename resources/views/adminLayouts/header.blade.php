<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">

			<!-- BEGIN: Brand -->
			<div class="m-stack__item m-brand  m-brand--skin-dark ">
				<div class="m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-stack__item--middle m-brand__logo">
						<a href="https://moi.gov.af/" target="blank" class="m-brand__logo-wrapper">
							<img alt="" width="50px" src="{{ asset('loginImage/7.jpg') }}" />
						</a>
					</div>
					<div class="m-stack__item m-stack__item--middle m-brand__tools">

						<!-- BEGIN: Left Aside Minimize Toggle -->
						<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
							<span></span>
						</a>

						<!-- END -->

						<!-- BEGIN: Responsive Aside Left Menu Toggler -->
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>

						<!-- END -->

						<!-- BEGIN: Responsive Header Menu Toggler -->
						{{-- <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a> --}}

						<!-- END -->

						<!-- BEGIN: Topbar Toggler -->
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
							<i class="flaticon-more"></i>
						</a>

						<!-- BEGIN: Topbar Toggler -->
					</div>
				</div>
			</div>

			<!-- END: Brand -->
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

				<!-- BEGIN: Horizontal Menu -->
				<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
			

				<!-- BEGIN: Topbar -->
				<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">
							
							<li class="m-nav__item m-topbar__languages m-dropdown m-dropdown--small m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width" m-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-nav__link-text">
										<img class="m-topbar__language-selected-img" src="loginImage/emarat_image.png">
									</span>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
											<span class="m-dropdown__header-subtitle">Select your language</span>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
										{{-- @php $locale = session()->get('locale'); @endphp --}}

													<li class="m-nav__item m-nav__item--active">
														<a href="{{ url('lang/en') }}" class="m-nav__link m-nav__link--active">
															{{-- <span class="m-nav__link-icon"><img class="m-topbar__language-img" src="assets/app/media/img/flags/020-flag.svg"></span> --}}
															<span class="m-nav__link-title m-topbar__language-text m-nav__link-text">
																English
																
															</span>
														</a>
													</li>

													<li class="m-nav__item m-nav__item--active">
														<a href="{{ url('lang/pa') }}" class="m-nav__link m-nav__link--active">
															{{-- <span class="m-nav__link-icon"><img class="m-topbar__language-img" src="assets/app/media/img/flags/020-flag.svg"></span> --}}
															<span class="m-nav__link-title m-topbar__language-text m-nav__link-text">
																Pashto
																
															</span>
														</a>
													</li>

													<li class="m-nav__item m-nav__item--active">
														<a href="{{ url('lang/dr') }}" class="m-nav__link m-nav__link--active">
															{{-- <span class="m-nav__link-icon"><img class="m-topbar__language-img" src="assets/app/media/img/flags/020-flag.svg"></span> --}}
															<span class="m-nav__link-title m-topbar__language-text m-nav__link-text">
																Dari
																
															</span>
														</a>
													</li>
													{{-- <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }} --}}
													{{-- <li class="m-nav__item">
														<a href="#" class="m-nav__link">
															<span class="m-nav__link-icon"><img class="m-topbar__language-img" src="assets/app/media/img/flags/014-japan.svg"></span>
															<span class="m-nav__link-title m-topbar__language-text m-nav__link-text">Japan</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="#" class="m-nav__link">
															<span class="m-nav__link-icon"><img class="m-topbar__language-img" src="assets/app/media/img/flags/017-germany.svg"></span>
															<span class="m-nav__link-title m-topbar__language-text m-nav__link-text">Germany</span>
														</a>
													</li> --}}
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
							 m-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									<span class="m-topbar__userpic">
										<img class="m--img-rounded m--marginless" @if(Auth::user()->image) ? src="userImage/{{ Auth::user()->image }}" @else src="assets/app/media/img/users/user4.jpg" @endif   alt="" />
									</span>
									<span class="m-topbar__username m--hide">Nick</span>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
											<div class="m-card-user m-card-user--skin-dark">
												<div class="m-card-user__pic">
													<img @if (Auth::user()->image) src="userImage/{{ Auth::user()->image }}"
													@else src = "assets/app/media/img/users/user4.jpg" @endif class="m--img-rounded "  />
													 
													
													<!--
			<span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
			-->
												</div>
												<div class="m-card-user__details">
													<span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
													<a href="" class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
												</div>
											</div>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
													<li class="m-nav__item">
														<a href="{{ route('users.userProfile') }}" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-profile-1"></i>
															<span class="m-nav__link-title">
																<span class="m-nav__link-wrap">
																	<span class="m-nav__link-text">My Profile</span>
																	<span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
																</span>
															</span>
														</a>
													</li>
																									<li class="m-nav__item">
														<a class="m-nav__link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
															<i class="m-nav__link-icon fa flaticon-logout"></i>
															<span class="m-nav__link-title">
																<span class="m-nav__link-wrap">
																	<span class="m-menu__link-text-custom">Logout</span>
																</span>
															</span>
														</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li id="m_quick_sidebar_toggle" class="m-nav__item">
								<a href="{{ url('/dashboard') }}" class="m-nav__link m-dropdown__toggle">
									<span class="m-nav__link-icon"><i class="flaticon-grid-menu"></i></span>
								</a>
							</li>
						</ul>
					</div>
				</div>

				<!-- END: Topbar -->
			</div>
		</div>
	</div>
</header>
