                <div id="kt_app_header" class="app-header  d-flex " data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
                    <!--begin::Header container-->
                    <div class="app-container  container-fluid d-flex align-items-stretch " id="kt_app_header_container">
                        <!--begin::Header wrapper-->
                        <div class="app-header-wrapper d-flex flex-stack w-100">
                            <!--begin::Logo wrapper-->
                            <div class="d-flex d-lg-none align-items-center">
                                <!--begin::Sidebar toggle-->
                                <div class="d-flex align-items-center ms-n2 me-2" title="Show sidebar menu">
                                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                                        <i class="ki-outline ki-abstract-14 fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Sidebar toggle-->
                                <!--begin::Logo-->
                                <div class="d-flex align-items-center me-3">
                                    <img alt="Logo" src="<?php echo $url; ?>assets/media/logo/logo.png" class="h-25px"/>
                                </div>
                                <!--end::Logo-->
                            </div>
                            <!--end::Logo wrapper-->
                            <!--begin::Page title wrapper-->
                            <div id="kt_app_header_page_title_wrapper">
                                <!--begin::Page title-->
                                <div data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_page_title_wrapper'}" class="page-title d-flex flex-column justify-content-center me-3 mb-6 mb-lg-0">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center me-3 my-0"></h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted"></li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Page title wrapper-->
                            <!--begin::Navbar-->
                            <div class="app-navbar flex-stack flex-shrink-0 " id="kt_app_aside_navbar">
                                
                                
                                <div class="app-navbar-item ms-3 ms-md-6" id="kt_header_user_menu_toggle">
                                    <!--begin::Menu wrapper-->
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                                                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                    </div>
                            
                                    <!--begin::User account menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true" style="">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                                                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                                                                            </svg>
                                                                        </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Username-->
                                                                    
                                                                            <div class="d-flex flex-column">
                                                                                <div class="fw-bold d-flex align-items-center fs-5">                   
                                                                                    <!-- Display "Pro" badge -->
                                                                                    <!-- Display role based on session -->
                                                                                    
                                                                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Super Admin</span>
                                                                                    
                                                                                </div>
                                                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7"></a>
                                                                            </div>
                                                                        
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu item-->
                                        
                                            
                                            <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                                <a href="#" class="menu-link px-5">
                                                    <span class="menu-title position-relative">
                                                        Mode 

                                                        <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                            <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                                            <i class="ki-outline ki-moon theme-dark-show fs-2"></i>                    
                                                        </span>
                                                    </span>
                                                </a>

                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu" style="">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 my-0">
                                                        <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode" data-kt-value="light">
                                                            <span class="menu-icon" data-kt-element="icon">
                                                                <i class="ki-outline ki-night-day fs-2"></i>
                                                            </span>
                                                            <span class="menu-title">
                                                                Light
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 my-0">
                                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                                            <span class="menu-icon" data-kt-element="icon">
                                                                <i class="ki-outline ki-moon fs-2"></i>
                                                            </span>
                                                            <span class="menu-title">
                                                                Dark
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 my-0">
                                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                                            <span class="menu-icon" data-kt-element="icon">
                                                                <i class="ki-outline ki-screen fs-2"></i>            
                                                            </span>
                                                            <span class="menu-title">
                                                                System
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->

                                            </div>
                                            <!--end::Menu item-->
                                        
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="admin-logout.php" class="menu-link px-5">
                                                    Sign Out
                                                </a>
                                            </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::User account menu-->
                                    <!--end::Menu wrapper-->
                                </div>
                                <!--end::Quick links-->
                            </div>
                            <!--end::Navbar-->
                        </div>
                        <!--end::Header wrapper-->
                    </div>
                    <!--end::Header container-->
                </div>


                
                
                