<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="100px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle" style="margin-left: 10px !important;">
    <!--begin::Logo-->
    <div class="app-sidebar-logo d-none d-lg-flex flex-center pt-10 mb-3" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <?php
        if (isset($_SESSION['is_admin']) || isset($_SESSION['is_employee'])) {
        ?>
            <a href="<?php echo $url; ?>index">
                <img alt="Logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" class="h-50px rounded" />
            </a>
        <?php
        } elseif (isset($_SESSION['is_customer'])) {
        ?>
            <a href="<?php echo $url; ?>cindex">
                <img alt="Logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" class="h-50px rounded" />
            </a>
        <?php
        } else {
        ?>
            <a href="<?php echo $url; ?>agent-dashboard">
                <img alt="Logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" class="h-50px rounded" />
            </a>
        <?php
        }
        ?>


        <!--end::Logo image-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu d-flex flex-center overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper d-flex hover-scroll-overlay-y scroll-ps mx-2 my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu, #kt_app_sidebar" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="
                                    menu 
                                    menu-column 
                                    menu-rounded   
                                    menu-active-bg 
                                    menu-title-gray-700  
                                    menu-arrow-gray-500 
                                    menu-icon-gray-500 
                                    menu-bullet-gray-500 
                                    menu-state-primary                
                                    my-auto 
                                " id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->

                <?php
                if (isset($_SESSION['is_admin']) || isset($_SESSION['is_employee'])) {
                ?>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToIndex()">
                        <!--begin:Menu link-->
                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                <i class="ki-outline ki-home-2 fs-3"></i>
                            </span>
                        </span>
                        <!--end:Menu sub-->
                    </div>

                    <script>
                        function redirectToIndex() {
                            var url = "<?php echo $url; ?>index";
                            window.location.href = url;
                        }
                    </script>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2">
                        <!--begin:Menu link-->
                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                <i class="fad fa-cogs fs-3"></i>
                            </span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu content-->
                                <div class="menu-content ">
                                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Configure</span>
                                </div>
                                <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if (!$loc_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-company" onclick="updateTitle('<?php echo isset($_SESSION['c_name']) ? $_SESSION['c_name'] : 'Company'; ?>')">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Company</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>

                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="<?php echo $url; ?>view-district">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">District</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if (!$account_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-account">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Account</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="<?php echo $url; ?>view-shipping-type">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Shipping type</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="<?php echo $url; ?>view-shipping-steps">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Shipping steps</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="<?php echo $url; ?>view-clearance">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Clearance</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="<?php echo $url; ?>view-expanses-type">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Expanses type</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if (!$agent_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-agent">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Branch</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="<?php echo $url; ?>view-notification">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Notification</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->

                        </div>
                        <!--end:Menu sub-->
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2">
                        <!--begin:Menu link-->
                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                <i class="fad fa-users-crown fs-3"></i>
                            </span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu content-->
                                <div class="menu-content ">
                                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">HRM</span>
                                </div>
                                <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php
                            if (isset($_SESSION['is_admin'])) {
                            ?>
                                <?php if (!$emp_access_denied) : ?>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?php echo $url; ?>view-employee">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Employee</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                <?php endif; ?>
                            <?php
                            }
                            ?>



                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if (!$cus_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-customer">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Customer</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <?php if (!$ven_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-vendor">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Vendor</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <?php if (!$ven_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-booking-status">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Booking</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>

                            <?php if (!$ven_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-quatation">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Quatation</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <?php if (!$ven_access_denied) : ?>
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="<?php echo $url; ?>view-cash-handle">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Cash handle</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                            <?php endif; ?>
                            <!--end:Menu item-->

                        </div>
                        <!--end:Menu sub-->
                    </div>

                    <?php if (!$hbl_access_denied) : ?>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToHBL()">
                            <!--begin:Menu link-->
                            <span class="menu-link menu-center">
                                <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                    <i class="fad fa-receipt fs-3"></i>
                                </span>
                            </span>
                            <!--end:Menu sub-->
                        </div>

                        <script>
                            function redirectToHBL() {
                                var url = "<?php echo $url; ?>view-hbl";
                                window.location.href = url;
                            }
                        </script>
                    <?php endif; ?>
                    <?php if (!$shipped_access_denied) : ?>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToContainer()">
                            <!--begin:Menu link-->
                            <span class="menu-link menu-center">
                                <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                    <i class="ki-duotone ki-ship fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                </span>
                            </span>
                            <!--end:Menu sub-->
                        </div>

                        <script>
                            function redirectToContainer() {
                                var url = "<?php echo $url; ?>view-container";
                                window.location.href = url;
                            }
                        </script>
                    <?php endif; ?>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToExpenses()">
                        <!--begin:Menu link-->
                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                <i class="fad fa-hand-holding-usd fs-3"></i>
                            </span>
                        </span>
                        <!--end:Menu sub-->
                    </div>

                    <script>
                        function redirectToExpenses() {
                            var url = "<?php echo $url; ?>view-expanses";
                            window.location.href = url;
                        }
                    </script>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2">
                        <!--begin:Menu link-->
                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                <i class="fad fa-analytics fs-3"></i>
                            </span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu content-->
                                <div class="menu-content ">
                                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Reports</span>
                                </div>
                                <!--end:Menu content-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="<?php echo $url; ?>view-expanse-report">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Expense report</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="<?php echo $url; ?>view-income-report">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Income report</span>
                                </a>
                                <!--end:Menu link-->
                            </div>

                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="<?php echo $url; ?>view-filtered-report">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Filtered report</span>
                                </a>
                                <!--end:Menu link-->
                            </div>



                            <!--end:Menu item-->
                            <!--begin:Menu item-->

                            <!--end:Menu item-->

                        </div>
                        <!--end:Menu sub-->
                    </div>


                    <?php
                    if (isset($_SESSION['is_admin'])) {
                    ?>

                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectBooking()">
                            <!--begin:Menu link-->
                            <span class="menu-link menu-center">
                                <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                    <i class="fad fa-calendar-alt fs-3"></i>
                                </span>
                            </span>
                            <!--end:Menu sub-->
                        </div>

                        <script>
                            function redirectBooking() {
                                var url = "<?php echo $url; ?>view-booking-status";
                                window.location.href = url;
                            }
                        </script>

                    <?php
                    }


                    ?>
                    <?php
                } else {
                    if (isset($_SESSION['is_customer'])) {
                    ?>
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToCIndex()">
                            <!--begin:Menu link-->
                            <span class="menu-link menu-center">
                                <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                    <i class="ki-outline ki-home-2 fs-3"></i>
                                </span>
                            </span>
                            <!--end:Menu sub-->
                        </div>

                        <script>
                            function redirectToCIndex() {
                                var url = "<?php echo $url; ?>cindex";
                                window.location.href = url;
                            }
                        </script>

                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectNotification()">
                            <!--begin:Menu link-->
                            <span class="menu-link menu-center">
                                <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                    <i class="ki-duotone ki-notification-on fs-3"> <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </span>
                            </span>
                            <!--end:Menu sub-->
                        </div>

                        <script>
                            function redirectNotification() {
                                var url = "<?php echo $url; ?>view-cnotification";
                                window.location.href = url;
                            }
                        </script>

                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectBooking()">
                            <!--begin:Menu link-->
                            <span class="menu-link menu-center">
                                <span class="menu-icon me-0" style="height: 40px !important; width: 40px !important;">
                                    <i class="ki-duotone ki-receipt-square fs-3"><span class="path1"></span><span class="path2"></span></i>
                                </span>
                            </span>
                            <!--end:Menu sub-->
                        </div>

                        <script>
                            function redirectBooking() {
                                var url = "<?php echo $url; ?>view-booking";
                                window.location.href = url;
                            }
                        </script>


                <?php
                    }
                }
                ?>



            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer d-flex flex-center flex-column-auto pt-6 mb-7" id="kt_app_sidebar_footer">
        <!--begin::Menu-->

        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>