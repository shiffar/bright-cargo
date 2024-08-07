<?php $title = 'courier'; // Default title?>
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
                                                    Courier </li>
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
            // Fetch the courierId from sessionStorage
var courierId = sessionStorage.getItem('courierId');

// Check if courierId is not null or undefined
if (courierId) {
    // Call the fetchCourierDetails function with the courierId
    fetchCourierDetails(courierId);
    console.log(courierId);
} else {
    // Handle the case where courierId is not available
    console.error('Courier ID not found in sessionStorage');
}

        // Function to fetch and display courier details
        function fetchCourierDetails(courierId) {
            $.ajax({
                url: 'code-view_courier.php',
                type: 'GET',
                data: { courier_id: courierId },
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
                    if (displayedHBLs.indexOf(item.hbl_code) === -1) {
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';

                        // Invoice Header
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-6 mb-2">';
                        html += '<h3><b class="text-danger">TRACKING ID</b> <span class="text-black">#' + item.hbl_code + '</span></h3>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-6 mb-2 me-3">';
                        html += '<b class="me-3">Package Status</b>';
                        html += '<span class="badge badge-light-success me-auto">' + item.current_status + '</span>';
                        html += '</div>';
                        html += '</div>';
                        html += '<br>';

                        // Other Details
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Agency</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.agent_name + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>HBL Type</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.HBL_Type + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Shipping mode</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Shipping + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Estimated delivery date</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.sestimated_date + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Delivery time</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.sdelivered_date + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Payment</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Amount + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Note</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Note + '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        // Shipper Details Card
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">Shipper Details</h5>';
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Sender Name</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Shipper_name + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Sender address</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Shipper_address + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Sender Mobile</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.sender_mobile + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Sender PP/NIC</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.sender_pp_nic + '</p>';
                        html += '</div>';
                        html += '</div>'; // row
                        html += '</div>'; // card-body
                        html += '</div>'; // card

                        // Receiver Details Card
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">Receiver Details</h5>';
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Reciver Name</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Consignee_name + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Reciver address</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Consignee_address + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Reciver Mobile</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.rece_mobile + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Reciver PP/NIC</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.sender_pp_nic + '</p>';
                        html += '</div>';
                        html += '</div>'; // row
                        html += '</div>'; // card-body
                        html += '</div>'; // card

                        // Other Details Card
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">Other Details</h5>';
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Agency</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.agent_name + '</p>';
                        html += '</div>';
                        // Add more other details here
                        html += '</div>'; // row
                        html += '</div>'; // card-body
                        html += '</div>'; // card

                        html += '<div class="card mb-3">';
html += '<div class="card-body">';
html += '<h5 class="card-title">Other Details</h5>';
html += '<div class="row">';
html += '<div class="col-sm-12 col-md-3 mb-2">';
html += '<h5><b>Delivery Proof</b></h5>';
// Display image from the uploads folder
html += '<img src="uploads/' + item.image + '" alt="Delivery Proof" class="img-fluid">';
html += '</div>';
html += '<div class="col-sm-12 col-md-3 mb-2">';
html += '<h5><b>Signature</b></h5>';
// Display signature using base64 data
html += '<img src="'+ item.signature + '" alt="Signature" class="img-fluid">';
html += '</div>';
html += '</div>'; // row
html += '</div>'; // card-body
html += '</div>'; // card

                        // Add more other details here
                        html += '</div>'; // row
                        html += '</div>'; // card-body
                        html += '</div>'; // card

                        // Add the current HBL code to the displayed list
                        displayedHBLs.push(item.hbl_code);
                    }
                });

                // Display HBL Details Table outside the loop
                html += '<div class="card mb-3">';
                html += '<div class="card-body">';
                html += '<h5 class="card-title">HBL Details</h5>';
                html += '<div class="row">';
                html += '<div class="col-md-12">';
                html += '<table class="table table-striped">';
                html += '<thead>';
                html += '<tr><th>Description</th><th>CBM</th><th>Weight</th><th>QTY</th><th>Amount</th><th>Commission</th></tr>';
                html += '</thead>';
                html += '<tbody>';

                // Variables to store totals
                var totalCBM = 0;
                var totalWeight = 0;
                var totalQTY = 0;
                var totalAmount = 0;
                var totalCommission = 0;

                $.each(data, function(index, item) {
                    // Display HBL details table for each item
                    html += '<tr>';
                    html += '<td>' + item.dDescription + '</td>';
                    html += '<td>' + item.dCBM + '</td>';
                    html += '<td>' + item.dWeight + '</td>';
                    html += '<td>' + item.dQTY + '</td>';
                    html += '<td>' + item.dAmount + '</td>';
                    html += '<td>' + item.dCommission + '</td>';
                    html += '</tr>';

                    // Add values to totals
                    totalCBM += parseFloat(item.dCBM);
                    totalWeight += parseFloat(item.dWeight);
                    totalQTY += parseInt(item.dQTY);
                    totalAmount += parseFloat(item.dAmount);
                    totalCommission += parseFloat(item.dCommission);
                });

                html += '</tbody>';
                // Display totals in table footer row
                html += '<tfoot>';
                html += '<tr>';
                html += '<td><b>Total</b></td>';
                html += '<td>' + totalCBM + '</td>';
                html += '<td>' + totalWeight + '</td>';
                html += '<td>' + totalQTY + '</td>';
                html += '<td>' + totalAmount + '</td>';
                html += '<td>' + totalCommission + '</td>';
                html += '</tr>';
                html += '</tfoot>';

                html += '</table>';
                html += '</div>';
                html += '</div>'; // row
                html += '</div>'; // card-body
                html += '</div>'; // card

                resultsContainer.html(html);
            } else {
                resultsContainer.html('<div class="alert alert-info" role="alert">No results found.</div>');
            }
        }

        // Example usage: fetch courier details for courier with ID 123
        fetchCourierDetails(courierId);
    </script>

    </body>
</html>
