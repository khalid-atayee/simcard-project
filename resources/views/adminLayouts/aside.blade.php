<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
        class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
        m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true"><a href="{{ url('/dashboard') }}"
                    class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span
                        class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span
                                class="m-menu__link-text">{{ __('message.dashboard') }}</span>
                            {{-- <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span> --}}
                        </span></span></a></li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Components</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">{{ __('message.simcard-management') }}</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        {{-- <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"><span
                                class="m-menu__link"><span class="m-menu__link-text">مدیریت سیکارت ها</span></span>
						</li> --}}
                        <li style="font-size: 25px" class="m-menu__item " aria-haspopup="true"><a
                                href="{{ route('searchStaff.data') }}" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">{{ __('message.search-staff') }}</span></a>
						</li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('distribution.data') }}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">{{ __('message.distribution-simcards') }}</span></a>
						</li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('unit.data') }}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">{{ __('message.unit-management') }}</span></a>
						</li>
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('rank.data') }}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">{{ __('message.rank-managemnt') }}</span></a>
						</li>
                    </ul>
                </div>
            </li>
       
			@can('report-view')
			
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a
                    href="javascript:;" class="m-menu__link m-menu__toggle"><i
                        class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">{{ __('language.reports') }}</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>

					@endcan
					@can('report-unit')
					
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true"><a href="{{ route('report.unit') }}"
                                class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">{{ __('message.unit-reports') }}</span></a></li>
                    </ul>
						
					@endcan
                </div>
            </li>
				
			{{-- @endrole

            @role('admin') --}}
			
			@php
				$count=0;
			@endphp
                <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover" id="user_management"><a 
                        href="javascript:;" class="m-menu__link m-menu__toggle"><i
                            class="m-menu__link-icon flaticon-web"></i><span class="m-menu__link-text">{{ __('message.users-management') }}</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                        				   
						   @can('users-view')
							@php
								$count++;
							@endphp
						   
								<li class="m-menu__item " aria-haspopup="true"><a href="{{ route('user.index') }}"
										class="m-menu__link "><i
											class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
											class="m-menu__link-text">{{ __('message.user-management') }}</span></a></li>

							@endcan
							@can('roles-view')
							@php
								$count++;
							@endphp
								
								
								<li class="m-menu__item " aria-haspopup="true"><a href="{{ route('role.index') }}"
										class="m-menu__link "><i
											class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
											class="m-menu__link-text">{{ __('message.roles') }}</span></a></li>
							@endcan


							@can('permissions-view')
								@php
									$count++;
								@endphp
							
								<li class="m-menu__item " aria-haspopup="true"><a href="{{ route('permission.index') }}"
										class="m-menu__link ">

										<i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
											class="m-menu__link-text">{{ __('message.permissions') }}</span></a></li>
							@endcan

                        </ul>
						{{-- <input type="hidden" id="count_value" value="{{ $count }}"> --}}
                    </div>
                </li>
				{{-- @endrole --}}




            </ul>
        </div>

        <!-- END: Aside Menu -->
    </div>

	<script>
		var count = parseInt("{{ $count }}");
		if(count==0){
			var count_input = document.getElementById('user_management');
			if(count_input!=null){
				count_input.outerHTML ="";
			}
		}
		
		

	</script>

