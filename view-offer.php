<?php $title = 'offer'; // Default title?>
<!DOCTYPE html>

<html lang="en">
    <!--begin::Head-->
    
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    
    <?php include 'web-layouts/head.php'; ?>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
        <!--begin::Theme mode setup on page load-->
        <?php include 'web-layouts/dl_script.php'; ?>
        <!--end::Theme mode setup on page load-->
        <!--Begin::Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!--End::Google Tag Manager (noscript) -->
        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
                <!--begin::Header-->
                <?php include 'web-layouts/header.php'; ?>
                <!--end::Header-->
                <!--begin::Wrapper-->
                <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                    <!--begin::Sidebar-->
                    <?php include 'web-layouts/side_bar.php'; ?>
                    <!--end::Sidebar-->
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                        <!--begin::Content wrapper-->
                        

                        <div class="d-flex flex-column flex-column-fluid">

                            <!--begin::Toolbar-->
                            <div id="kt_app_toolbar" class="app-toolbar " data-kt-sticky="true" data-kt-sticky-name="app-toolbar-sticky" data-kt-sticky-offset="{default: 'false', lg: '300px'}">

                                <!--begin::Toolbar container-->
                                <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                                    <!--begin::Toolbar wrapper-->
                                    <div class="app-toolbar-wrapper d-flex flex-stack w-100">


                                        <!--begin::Page title-->
                                        <div class="page-title d-flex flex-column justify-content-center me-3 mb-0">
                                            <!--begin::Title-->
                                            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center me-3 my-0">
                                                Default
                                            </h1>
                                            <!--end::Title-->


                                            <!--begin::Breadcrumb-->
                                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item text-muted">
                                                    <a href="index.php" class="text-muted text-hover-primary">
                                                        Home </a>
                                                </li>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <li class="breadcrumb-item">
                                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                                </li>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <li class="breadcrumb-item text-muted">
                                                    Offers </li>
                                                <!--end::Item-->

                                            </ul>
                                            <!--end::Breadcrumb-->
                                        </div>
                                        <!--end::Page title-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        
                                            





                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Toolbar wrapper-->
                                </div>
                                <!--end::Toolbar container-->
                            </div>
                            <!--end::Toolbar-->

                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content  flex-column-fluid ">


                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container  container-fluid ">
                                    <!--begin::Row-->
                                    <div class="row gx-5 gx-xl-10">
                                        <!--begin::Col-->

                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-xxl-6 mb-5 mb-xl-10">
                                            <!--begin::Chart widget 28-->
                                            <div class="card card-flush h-xl-100">
                                                <!--begin::Header-->

                                                <!--end::Header-->

                                                <!--begin::Body-->

                                                <!--end::Body-->
                                            </div>
                                            <!--end::Chart widget 28-->


                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->


                                    <!--begin::Table Widget 5-->
                                    <div id="search-results"></div>
                                    <!--end::Table Widget 5-->
                                    <!--begin::Row-->

                                    <!--end::Row-->




                                </div>
                                <!--end::Content container-->
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->
                        <?php include 'web-layouts/footer.php'; ?>
                        <!--end::Footer-->
                    </div>

                    
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        
        <!--end::Modal - Sitemap-->
        <!--end::Engage modals-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>
        <!--begin::Javascript-->
        <?php include 'web-layouts/script.php'; ?>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->

        <script>
            // Fetch the offerrId from sessionStorage
var offerrId = sessionStorage.getItem('offerrId');

// Check if offerrId is not null or undefined
if (offerrId) {
    // Call the fetchCourierDetails function with the offerrId
    fetchCourierDetails(offerrId);
    console.log(offerrId);
} else {
    // Handle the case where offerrId is not available
    console.error('Courier ID not found in sessionStorage');
}

        // Function to fetch and display courier details
        function fetchCourierDetails(offerrId) {
            $.ajax({
                url: 'code-view_offer.php',
                type: 'GET',
                data: { offer_id: offerrId },
                dataType: 'json',
                success: function(response) {
                    displayResults(response);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error: ' + error);
                }
            });
        }

        // Function to display the courier details
        function displayResults(data) {
            var resultsContainer = $('#search-results');
            resultsContainer.empty(); // Clear previous results

            if (data.length > 0) {
                var html = '';
                // Keep track of already displayed HBL codes
                var displayedHBLs = [];

                $.each(data, function(index, item) {
                    // Check if the current HBL code is already displayed
                    if (displayedHBLs.indexOf(item.offer_notification_id) === -1) {
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';

                        // Invoice Header
                        

                        // Other Details
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Offer name</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.offer_name + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Offer title</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.offer_t + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Offer subject</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.offer_s + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Offer end</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.offer_end_date + '</p>';
                        html += '</div>';
                       
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        // Shipper Details Card
                        

                        // Add more other details here
                        html += '</div>'; // row
                        html += '</div>'; // card-body
                        html += '</div>'; // card

                        // Add the current HBL code to the displayed list
                        displayedHBLs.push(item.offer_notification_id);
                    }
                });

                

                resultsContainer.html(html);
            } else {
                resultsContainer.html('<div class="alert alert-info" role="alert">No results found.</div>');
            }
        }

        // Example usage: fetch courier details for courier with ID 123
        fetchCourierDetails(offerrId);
    </script>

    </body>
</html>
