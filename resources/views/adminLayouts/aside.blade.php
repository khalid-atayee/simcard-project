<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="index.html" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span>
											<span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span> </span></span></a></li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">Components</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li  class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">مدیریت سیمکارت ها</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a> 
									 <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li  class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">مدیریت سیکارت ها</span></span></li>
											<li style="font-size: 25px" class="m-menu__item " aria-haspopup="true"><a href="{{ route('searchStaff.data') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">جستجوی کارمندان</span></a></li>
											<li class="m-menu__item " aria-haspopup="true"><a href="{{ route('distribution.data') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">توزیع سیمکارت ها</span></a></li>
											<li class="m-menu__item " aria-haspopup="true"><a href="{{ route('unit.data') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">مدیریت قطعات</span></a></li>
											<li class="m-menu__item " aria-haspopup="true"><a href="{{ route('rank.data') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">مدیریت رتبه</span></a></li>
										</ul>
									</div>
								</li>
								{{-- <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">مدیریت سیکارت ها</span></span></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/state.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">State Colors</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/typography.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Typography</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/stack.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Stack</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/tables.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tables</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/progress.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Progress</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/modal.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Modal</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/alerts.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Alerts</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/popover.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Popover</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/tooltip.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tooltip</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/blockui.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Block UI</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/spinners.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Spinners</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/scrollable.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Scrollable</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/dropdown.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Dropdown</span></a></li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
												 class="m-menu__link-text">Tabs</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
											<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true"><a href="components/base/tabs/bootstrap.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Bootstrap Tabs</span></a></li>
													<li class="m-menu__item " aria-haspopup="true"><a href="components/base/tabs/line.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Line Tabs</span></a></li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/accordions.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Accordions</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/navs.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Navs</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/lists.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Lists</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/treeview.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tree View</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/bootstrap-notify.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Bootstrap Notify</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/toastr.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Toastr</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/base/sweetalert2.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">SweetAlert2</span></a></li>
									</ul>
								</div>
							</li> --}}
							{{-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">Icons</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="components/icons/flaticon.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Flaticon</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/icons/fontawesome5.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Fontawesome 5</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/icons/lineawesome.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Lineawesome</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/icons/socicons.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Socicons</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-web"></i><span class="m-menu__link-text">Buttons</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Buttons</span></span></li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
												 class="m-menu__link-text">Button Base</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
											<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/default.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Default Style</span></a></li>
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/square.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Square Style</span></a></li>
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/pill.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pill Style</span></a></li>
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/air.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Air Style</span></a></li>
												</ul>
											</div>
										</li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/group.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Button Group</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/dropdown.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Button Dropdown</span></a></li>
										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
												 class="m-menu__link-text">Button Icon</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
											<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
												<ul class="m-menu__subnav">
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/icon/lineawesome.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Lineawesome
																Icons</span></a></li>
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/icon/fontawesome.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Fontawesome
																Icons</span></a></li>
													<li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/icon/flaticon.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Flaticon Icons</span></a></li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-1"></i><span class="m-menu__link-text">Portlets</span><i
									 class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Portlets</span></span></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/base.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Base Portlets</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/advanced.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Advanced Portlets</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/creative.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Creative Portlets</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/tabbed.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tabbed Portlets</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/draggable.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Draggable Portlets</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/tools.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Portlet Tools</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="components/portlets/sticky-head.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Sticky Head</span></a></li>
									</ul>
								</div>
							</li> --}}
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">راپور ها</span><i
								class="m-menu__ver-arrow la la-angle-right"></i></a>
						   <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
							   <ul class="m-menu__subnav">
								   <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('report.unit') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">راپور قطعات</span></a></li>
								  </ul>
						   </div>
					   </li>


					   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-web"></i><span class="m-menu__link-text">مدیریت کاربران</span><i
						class="m-menu__ver-arrow la la-angle-right"></i></a>
				   <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
					   <ul class="m-menu__subnav">
						   <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span class="m-menu__link"><span class="m-menu__link-text">Buttons</span></span></li>
						   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Button Base</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
							   <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
								   <ul class="m-menu__subnav">
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/default.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Default Style</span></a></li>
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/square.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Square Style</span></a></li>
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/pill.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pill Style</span></a></li>
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/base/air.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Air Style</span></a></li>
								   </ul>
							   </div>
						   </li>
						   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/group.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Button Group</span></a></li>
						   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/dropdown.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Button Dropdown</span></a></li>
						   <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
									class="m-menu__link-text">Button Icon</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
							   <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
								   <ul class="m-menu__subnav">
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/icon/lineawesome.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Lineawesome
												   Icons</span></a></li>
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/icon/fontawesome.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Fontawesome
												   Icons</span></a></li>
									   <li class="m-menu__item " aria-haspopup="true"><a href="components/buttons/icon/flaticon.html" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Flaticon Icons</span></a></li>
								   </ul>
							   </div>
						   </li>
					   </ul>
				   </div>
			   </li>
							


							
						</ul>
					</div>

					<!-- END: Aside Menu -->
				</div>