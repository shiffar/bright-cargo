<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="100px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                        <!--begin::Logo-->
                        <div class="app-sidebar-logo d-none d-lg-flex flex-center pt-10 mb-3" id="kt_app_sidebar_logo">
                            <!--begin::Logo image-->
                                    <a href="<?php echo $url;?>admin/index.php">
                                        <img alt="Logo" src="<?php echo $url; ?>assets/media/logo/logo.png" class="h-50px"/>
                                    </a>
                                
                            
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

                                  
                                    
                                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToIndex()">
                                        <!--begin:Menu link-->
                                            <span class="menu-link menu-center">
                                                <span class="menu-icon me-0">
                                                    <i class="ki-outline ki-home-2 fs-2x"></i>
                                                </span>
                                            </span>
                                            <!--end:Menu sub-->
                                        </div>

                                        <script>
                                            function redirectToIndex() {
                                                var url = "<?php echo $url; ?>admin/index.php";
                                                window.location.href = url;
                                            }
                                        </script>

                                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToRegister()">
                                        <!--begin:Menu link-->
                                            <span class="menu-link menu-center">
                                                <span class="menu-icon me-0">
                                                <i class="ki-duotone ki-user fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                </span>
                                            </span>
                                            <!--end:Menu sub-->
                                        </div>

                                        <script>
                                            function redirectToRegister() {
                                                var url = "<?php echo $url; ?>admin/admin-register.php";
                                                window.location.href = url;
                                            }
                                        </script>

                                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2" onclick="redirectToDARegister()">
                                        <!--begin:Menu link-->
                                            <span class="menu-link menu-center">
                                                <span class="menu-icon me-0">
                                                    <i class="fad fa-truck-moving fs-2x"></i>
                                                </span>
                                            </span>
                                            <!--end:Menu sub-->
                                        </div>

                                        <script>
                                            function redirectToDARegister() {
                                                var url = "<?php echo $url; ?>admin/admin-da-register.php";
                                                window.location.href = url;
                                            }
                                        </script>
                                        
                                   
                                    
                                    
                                    
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