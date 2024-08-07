
<!DOCTYPE html>

<html lang="en" >
    <!--begin::Head-->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php include 'web-layouts/login-head.php' ?>
<link href="<?php echo $url; ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $url; ?>assets/plugins/global/plugins.bundle.js"></script>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body"  class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat" >
        <!--begin::Theme mode setup on page load-->
        <script>
            var defaultThemeMode = "light";
            var themeMode;

            if ( document.documentElement ) {
                if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if ( localStorage.getItem("data-bs-theme") !== null ) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }			
                }

                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }

                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }            
        </script>
        <!--end::Theme mode setup on page load-->
                            <!--Begin::Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!--End::Google Tag Manager (noscript) -->
                
                <!--begin::Root-->
        <div class="d-flex flex-column flex-root" id="kt_app_root">
            <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('<?php echo $url; ?>assets/login/media/auth/bg4.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?php echo $url; ?>assets/login/media/auth/bg4-dark.jpg');
            }
        </style>
        <!--end::Page bg image-->
            
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">              
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">              
                    <!--begin::Logo-->
                    
                    <h2 class="text-white fw-normal m-0"> 
                    </h2>  
                    <!--end::Title-->         
                </div>
                <!--begin::Aside-->    
            </div>
            <!--begin::Aside-->

            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
            
                    <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                        
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                            
                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="login_form">
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 fw-bolder mb-3">
                                        Sign In
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">
                                    </div>
                                    <!--end::Subtitle--->
                                </div>
                                <!--begin::Heading-->

                                <!--begin::Login options-->
                                <div class="row g-3 mb-9">
                                    <!--begin::Col-->
                                

                                                                    

                                    <!--end::Col-->
                                </div>
                                <!--end::Login options-->

                                <!--begin::Separator-->
                                <div class="separator separator-content my-14">
                                </div>
                                <!--end::Separator-->

                                <!--begin::Input group--->
                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/> 
                                    <!--end::Email-->
                                </div>

                                <!--end::Input group--->
                                <div class="fv-row mb-3">    
                                    <!--begin::Password-->
                                    <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent"/>
                                    <!--end::Password-->
                                </div>
                                <!--end::Wrapper-->    

                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="loginBtn" class="btn btn-primary" value="customer">
                                        
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">
                                            Sign In</span>
                                        <!--end::Indicator label-->

                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">
                                            Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                        <!--end::Indicator progress-->        
                                    </button>
                                </div>
                                <div class="d-grid">
    <a href="<?php echo $url; ?>view-track.php" class="btn btn-secondary">Track Your Shipment</a>
</div>
                                
                            </form>
                            <!--end::Form-->     

                        </div>
                        
                        <!--end::Footer-->
                    </div>
            </div>
            
            <!--end::Body-->
        </div>
        <?php include 'web-layouts/login-script.php'; ?>
        <script>
            $(document).ready(function(){
                $('#login_form').submit(function(event){
                    event.preventDefault(); // Prevent default form submission
                    
                    // Fetch form data
                    var formData = $(this).serialize();
                    
                    // Determine which button is clicked
                    var role = $(this).find('button[type="submit"]').data('role');
                    
                    // Add role to form data
                    formData += '&role=' + role;
                    
                    // AJAX request
                    $.ajax({
                        url: 'code-login.php', // PHP script for handling login
                        type: 'POST',
                        data: formData,
                        beforeSend: function(){
                            // Show loading indicator
                            $('#loginBtn .indicator-progress').show();
                        },
                        success: function(response){
                            if(response == 'success'){
                                // Redirect user based on role
                                if(role === 'customer') {
                                    window.location.href = '<?php echo $url; ?>cindex.php'; // Redirect customer to cindex.php
                                }
                            } else {
                                // Show error message if login fails
                                alert('Invalid email or password');
                            }
                        },

                        complete: function(){
                            // Hide loading indicator
                            $('#loginBtn .indicator-progress').hide();
                        }
                    });
                });

               

                $('#loginBtn').click(function() {
                    $('#loginBtn').data('role', 'customer');
                });
            });

            

        </script>
    </body>
    <!--end::Body-->
</html>