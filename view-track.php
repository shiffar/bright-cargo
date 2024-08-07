
<!DOCTYPE html>

<html lang="en" >
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
                    <div class="d-grid">
                                        <a href="<?php echo $url; ?>login.php" class="btn btn-primary">Home</a>
                                    </div>
                        <form id="search-form">
                            <!--begin::Card-->
                            <div class="card mb-7">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Compact form-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Input group-->
                                        <div class="position-relative w-md-400px me-md-2">
                                            <i class="ki-outline ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6"></i>
                                            <input type="text" class="form-control form-control-solid ps-10" name="search" placeholder="Search" />
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin:Action-->
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <!--end:Action-->
                                    </div>
                                    <!--end::Compact form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </form>

                        <div id="search-results"></div>
                            
                    </div>
            </div>
            
            <!--end::Body-->
        </div>
        <?php include 'web-layouts/login-script.php'; ?>
        <script>
            

            $('#search-form').submit(function(e) {
    e.preventDefault(); // Prevent form submission

    var formData = $(this).serialize(); // Serialize form data

    $.ajax({
        type: "POST",
        url: "code-tracking.php", // Path to your PHP file
        data: formData,
        dataType: 'json',
        success: function(data) {
            if (data.error && data.error === 'missing_parameters') {
                // Prompt user for NIC or mobile number
                Swal.fire({
                    title: "Enter NIC or Mobile Number",
                    input: "text",
                    inputPlaceholder: "NIC or Mobile Number",
                    showCancelButton: true,
                    confirmButtonText: "Search",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform search with NIC or Mobile Number
                        formData += '&customer_details=' + result.value;
                        $.ajax({
                            type: "POST",
                            url: "code-tracking.php",
                            data: formData,
                            dataType: 'json',
                            success: function(data) {
                                displayResults(data);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            } else {
                displayResults(data);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});


            function displayResults(data) {
                var resultsContainer = $('#search-results');
                resultsContainer.empty(); // Clear previous results

                if (data.length > 0) {
    var html = '';
    $.each(data, function(index, item) {
        html += '<div class="card mb-3">';
        html += '<div class="card-body">';

        // Invoice Header
        html += '<div class="row">';
        html += '<div class="col-sm-12 col-md-6 mb-2">';
        html += '<h3><b class="text-danger">TRACKING ID</b> <span class="text-black">#' + item.hbl_code + '</span>';
        html += '<span class="badge badge-light-success ms-2">' + item.current_status + '</span>'; // Package Status badge
        html += '</h3>';
        html += '</div>';

        // Invoice Actions
        html += '<div class="col-sm-12 col-md-6 mb-2">';
        html += '<div class="pull-right">';
        html += '<div class="btn-group">';
        html += '<div class="dropdown-menu scrollable-menu">';
        // Dropdown items
        html += '<a class="dropdown-item" target="_blank" href="print_inv_ship.php?id=' + item.invoice_id + '">';
        html += '<i style="color:#343a40" class="ti-printer"></i>&nbsp;Print Shipment</a>';
        html += '<a class="dropdown-item" href="print_label_ship.php?id=' + item.invoice_id + '" target="_blank">';
        html += '<i style="color:#343a40" class="ti-printer"></i>&nbsp;Print Label</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        // Other Details
        html += '<div class="row">';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>Branch Name</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.c_branch_name + '</p>';
        html += '</div>';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>HBL Type</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.HBL_Type + '</p>';
        html += '</div>';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>Shipping mode</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.Shipping + '</p>';
        html += '</div>';
        html += '</div>';

        html += '<div class="row">';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>Estimated delivery date</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.sestimated_date + '</p>';
        html += '</div>';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>Delivery time</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.sdelivered_date + '</p>';
        html += '</div>';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>Payment</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.Amount + '</p>';
        html += '</div>';
        html += '<div class="col-md-12 mb-2">';
        html += '<h5><b>Note</b></h5>';
        html += '<p class="text-muted m-l-5">' + item.Note + '</p>';
        html += '</div>';
        html += '</div>';
        html += '</div>'; // card-body
        html += '</div>'; // card
    });
    resultsContainer.html(html);
} else {
    resultsContainer.html('<div class="alert alert-info" role="alert">No results found.</div>');
}

            }

        </script>
    </body>
</html>