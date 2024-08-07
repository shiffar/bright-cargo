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
                                    <?php
                                    if(isset($_SESSION['is_admin']) || isset($_SESSION['is_employee'])) {
                                        ?>
                                            <a href="<?php echo $url;?>index.php">
                                                <img alt="Logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" class="h-25px"/>
                                            </a>
                                        <?php
                                    }elseif(isset($_SESSION['is_customer'])) {

                                        ?>
                                            <a href="<?php echo $url;?>cindex.php">
                                                <img alt="Logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" class="h-25px"/>
                                            </a>
                                        <?php
                                    }else{
                                        ?>
                                            <a href="<?php echo $url;?>agent-dashboard.php">
                                                <img alt="Logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" class="h-25px"/>
                                            </a>
                                        <?php
                                    }
                                    
                                    ?>
                                    
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
                                <?php
                                    if(isset($_SESSION['is_customer'])) {
                                        ?>
                                            <div class="app-navbar-item ms-3 ms-md-6">
                                                <!--begin::Menu- wrapper-->
                                                <a href="#" class="btn btn-icon btn-light pulse pulse-primary" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-offset="-15px, 0">
                                                    <i class="ki-duotone ki-notification-on fs-1"> <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                    <span class="position-absolute top-100 start-100 translate-middle badge badge-circle badge-primary d-none" id="notificationCountBadge">5</span>
                                                    <span class="pulse-ring" id="notification_ring"></span>
                                                </a>

                                                
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications" style="">
                                                    <!--begin::Heading-->
                                                    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('assets/media/misc/menu-header-bg.jpg')">
                                                        <!--begin::Title-->                                   
                                                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                                                            Notifications <span id="notificationCount2" class="fs-8 opacity-75 ps-3"></span>
                                                        </h3>
                                                        <!--end::Title-->

                                                        <!--begin::Tabs-->
                                                        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1" aria-selected="false" tabindex="-1" role="tab">Alerts</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1" aria-selected="false" tabindex="-1" role="tab">Offers</a>
                                                            </li>
                                                        </ul>
                                                        <!--end::Tabs-->
                                                    </div>
                                                    <!--end::Heading-->

                                                    <!--begin::Tab content-->
                                                    <div class="tab-content">
                                                        <!--begin::Tab panel-->
                                                        <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                                                            <!--begin::Items-->
                                                            <div id="notificationItems" class="scroll-y mh-325px my-5 px-8">
                                                                <!-- Notifications will be inserted here dynamically -->
                                                            </div>

                                                            <div id="offerItems" class="scroll-y mh-325px my-5 px-8">
                                                                <!-- Notifications will be inserted here dynamically -->
                                                            </div>
                                                            <!--end::Items-->

                                                            <!--begin::View more-->
                                                            <div class="py-3 text-center border-top">
                                                                <a href="<?php echo $url; ?>view-cnotification.php" class="btn btn-color-gray-600 btn-active-color-primary">
                                                                    View All 
                                                                    <i class="ki-outline ki-arrow-right fs-5"></i>                
                                                                </a>			 
                                                            </div>
                                                            <!--end::View more--> 
                                                        </div>
                                                        <!--end::Tab panel-->
                                                    </div>
                                                    <!--end::Tab content-->
                                                </div>

                                                <!--end::Menu-->        
                                                <!--end::Menu wrapper-->
                                            </div>
                                            <div class="app-navbar-item ms-3 ms-md-6">
                                                <!--begin::Menu- wrapper-->
                                                <a href="#" class="btn btn-icon btn-light pulse pulse-primary" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-offset="-15px, 0">
                                                <i class="ki-duotone ki-delivery fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                    <span class="position-absolute top-100 start-100 translate-middle badge badge-circle badge-primary d-none" id="courierCountBadge">5</span>
                                                    <span class="pulse-ring" id="courier_ring"></span>
                                                </a>

                                                
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications2" style="">
                                                    <!--begin::Heading-->
                                                    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('assets/media/misc/menu-header-bg.jpg')">
                                                        <!--begin::Title-->                                   
                                                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                                                            Couriers <span id="notificationCount3" class="fs-8 opacity-75 ps-3"></span>
                                                        </h3>
                                                        <!--end::Title-->

                                                        <!--begin::Tabs-->
                                                        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3" aria-selected="false" tabindex="-1" role="tab">Alerts</a>
                                                            </li>
                                                        </ul>
                                                        <!--end::Tabs-->
                                                    </div>
                                                    <!--end::Heading-->

                                                    <!--begin::Tab content-->
                                                    <div class="tab-content">
                                                        <!--begin::Tab panel-->
                                                        <div class="tab-pane fade" id="kt_topbar_notifications_3" role="tabpanel">
                                                            <!--begin::Items-->
                                                            <div id="courierItems" class="scroll-y mh-325px my-5 px-8">
                                                                <!-- Notifications will be inserted here dynamically -->
                                                            </div>
                                                            <!--end::Items-->

                                                            <!--begin::View more-->
                                                            
                                                            <!--end::View more--> 
                                                        </div>
                                                        <!--end::Tab panel-->
                                                    </div>
                                                    <!--end::Tab content-->
                                                </div>

                                                <!--end::Menu-->        
                                                <!--end::Menu wrapper-->
                                            </div>
                                        <?php
                                    }
                                    
                                ?>

                                <?php
                                    if(isset($_SESSION['is_admin'])) {
                                        ?>
                                            <div class="app-navbar-item ms-3 ms-md-6">
                                                <a href="#" class="btn btn-icon btn-light pulse pulse-primary" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-offset="-15px, 0">
                                                    <i class="ki-duotone ki-notification-on fs-1"> <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                    <span class="position-absolute top-100 start-100 translate-middle badge badge-circle badge-primary d-none" id="requestsCountBadge">5</span>
                                                    <span class="pulse-ring d-none"></span>
                                                </a>

                                                <!-- Notification menu -->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications" style="">
                                                    <!-- Notification heading -->
                                                    <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('assets/media/misc/menu-header-bg.jpg')">
                                                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Requests <span id="requestCount2" class="fs-8 opacity-75 ps-3"></span></h3>
                                                        <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1" aria-selected="false" tabindex="-1" role="tab">Requests</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- Notification content -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                                                            <div id="requestItems" class="scroll-y mh-325px my-5 px-8"></div>
                                                            <div class="py-3 text-center border-top">
                                                                <a href="<?php echo $url; ?>view-request.php" class="btn btn-color-gray-600 btn-active-color-primary">
                                                                    View All <i class="ki-outline ki-arrow-right fs-5"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    
                                ?>
                                
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
                                                                    <?php
                                                                        // Check if the user is an admin or an employee
                                                                        if(isset($_SESSION['is_admin']) || isset($_SESSION['is_employee']) || isset($_SESSION['is_customer'])) {
                                                                        ?>
                                                                            <div class="d-flex flex-column">
                                                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                                                    <?php echo $_SESSION['username']; ?>                    
                                                                                    <!-- Display "Pro" badge -->
                                                                                    <!-- Display role based on session -->
                                                                                    <?php 
if(isset($_SESSION['is_admin'])) {
    echo '<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Admin</span>';
} elseif(isset($_SESSION['is_employee'])) {
    echo '<span class="badge badge-light-warning fw-bold fs-8 px-2 py-1 ms-2">Employee</span>';
} elseif(isset($_SESSION['is_customer'])) {
    echo '<span class="badge badge-light-warning fw-bold fs-8 px-2 py-1 ms-2">Customer</span>';
} else {
    echo '<span class="badge badge-light-warning fw-bold fs-8 px-2 py-1 ms-2">Delivery agent</span>';
}
?>

                                                                                </div>
                                                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7"></a>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                    ?>
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
                                                <?php 
                                                if(isset($_SESSION['is_admin']) || isset($_SESSION['is_employee']) || isset($_SESSION['is_customer'])) {
                                                    ?>
                                                    
                                                        <a href="<?php echo $url;?>logout.php" class="menu-link px-5">
                                                            Sign Out
                                                        </a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    
                                                        <a href="<?php echo $url;?>da-logout.php" class="menu-link px-5">
                                                            Sign Out
                                                        </a>
                                                    <?php
                                                }
                                                
                                                ?>
                                                
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


                
                
                