<?php $title = 'expanse - report'; // Default title?>
<!DOCTYPE html>

<html lang="en">
    <!--begin::Head-->
    
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <!-- /Added by HTTrack -->
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
                                                    Expanse Report </li>
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

                                <div id="kt_app_content_container" class="app-container  container-fluid ">

                                    <div class="card card-flush mb-5 mb-xl-10">

                                        <div class="container mt-5">
                                            <h2 class="text-center">Select Date Range</h2>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="start_date">Start Date:</label>
                                                        <input type="date" id="start_date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="end_date">End Date:</label>
                                                        <input type="date" id="end_date" class="form-control">
                                                    </div>
                                                </div>
                                                <!-- Add Font Awesome icon button here 
                                                <div class="col-md-4">
                                                    <button type="button" id="generate_report" class="btn btn-primary mt-3 mt-md-6">
                                                        <i class="fad fa-file-chart-line"></i> Generate Report
                                                    </button>
                                                </div>-->
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div id="result"></div>
                                                </div>
                                            </div>
                                        </div>

                                    <!--begin::Card body-->

                                    <!--end::Card body-->
                                    </div>
                                </div>
                                <!--begin::Content container-->
                               

                                
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
        <script>
            $('#start_date, #end_date').on('input', function() {
    // Call fetchData function
    fetchData();
});

function fetchData() {
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;

    $.ajax({
        url: 'code-hbl.php',
        type: 'post',
        dataType: 'json',
        data: { action: 'show_expense', start_date: startDate, end_date: endDate },
        success: function(response) {
            // Clear previous results
            $('#result').empty();

            if (response && Array.isArray(response)) {
                // Initialize totals
                var grandTotalCBMDetails = 0;
                var grandTotalQtyDetails = 0;
                var grandTotalWeightDetails = 0;
                var grandTotalAmountDetails = 0;
                var grandTotalCommissionDetails = 0;
                var grandTotalAmountPaid = 0;
                var grandTotalCommissionPaid = 0;
                var grandTotalExpenseAmountDetails = 0;
                var grandTotalExpenseVatAmountDetails = 0;
                var grandTotalExpenseAmountPaid = 0;

                // Create table headers
                var table = $('<table>').addClass('table table-hover table-rounded table-striped border gy-7 gs-7').appendTo('<div>').addClass('table-responsive').appendTo('#result');
                var thead = $('<thead>').appendTo(table);
                var tbody = $('<tbody>').appendTo(table);

                // Create table header row
                var headerRow = $('<tr>').addClass('fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200').appendTo(thead);
                $('<th>').text('Code').appendTo(headerRow);
                $('<th>').text('CBM').appendTo(headerRow);
                $('<th>').text('Qty').appendTo(headerRow);
                $('<th>').text('Weight').appendTo(headerRow);
                $('<th>').text('Amount').appendTo(headerRow);
                $('<th>').text('Commission').appendTo(headerRow);
                $('<th>').text('Amount (Paid)').appendTo(headerRow);
                $('<th>').text('Commission (Paid)').appendTo(headerRow);
                $('<th>').text('Expense Amount').appendTo(headerRow);
                $('<th>').text('VAT Amount').appendTo(headerRow);
                $('<th>').text('Expense Amount (Paid)').appendTo(headerRow);

                // Display combined data
                response.forEach(function(data) {
                    // Check if data is valid
                    if (data && typeof data === 'object') {
                        var hblDetailsLength = data.hbl_details ? data.hbl_details.length : 0;
                        var hblPaidLength = data.hbl_paid ? data.hbl_paid.length : 0;
                        var expenseDetailsLength = data.expense_details ? data.expense_details.length : 0;
                        var expensePaidLength = data.expense_paid ? data.expense_paid.length : 0;

                        var maxRowCount = Math.max(hblDetailsLength, hblPaidLength, expenseDetailsLength, expensePaidLength);

                        for (var i = 0; i < maxRowCount; i++) {
                            var dataRow = $('<tr>').appendTo(tbody);

                            if (i === 0 && data.hbl) {
                                $('<td>').text(data.hbl.code).appendTo(dataRow);
                            } else {
                                $('<td>').appendTo(dataRow);
                            }

                            // Display data for hbl_details
                            var hblDetail = data.hbl_details ? data.hbl_details[i] : null;
                            if (hblDetail) {
                                $('<td>').text(hblDetail.CBM).appendTo(dataRow);
                                $('<td>').text(hblDetail.Qty).appendTo(dataRow);
                                $('<td>').text(hblDetail.Weight).appendTo(dataRow);
                                $('<td>').text(hblDetail.Amount).appendTo(dataRow);
                                $('<td>').text(hblDetail.Commission).appendTo(dataRow);

                                // Update totals
                                grandTotalCBMDetails += parseFloat(hblDetail.CBM);
                                grandTotalQtyDetails += parseInt(hblDetail.Qty);
                                grandTotalWeightDetails += parseFloat(hblDetail.Weight);
                                grandTotalAmountDetails += parseFloat(hblDetail.Amount);
                                grandTotalCommissionDetails += parseFloat(hblDetail.Commission);
                            } else {
                                $('<td colspan="5"></td>').appendTo(dataRow);
                            }

                            // Display data for hbl_paid
                            var hblPaid = data.hbl_paid ? data.hbl_paid[i] : null;
                            if (hblPaid) {
                                $('<td>').text(hblPaid.Amount).appendTo(dataRow);
                                $('<td>').text(hblPaid.Commission).appendTo(dataRow);

                                // Update totals
                                grandTotalAmountPaid += parseFloat(hblPaid.Amount);
                                grandTotalCommissionPaid += parseFloat(hblPaid.Commission);
                            } else {
                                $('<td colspan="2"></td>').appendTo(dataRow);
                            }

                            // Display data for expense_details
                            var expenseDetail = data.expense_details ? data.expense_details[i] : null;
                            if (expenseDetail) {
                                $('<td>').text(expenseDetail.Amount).appendTo(dataRow);
                                $('<td>').text(expenseDetail.vat_amount).appendTo(dataRow);

                                // Update totals
                                grandTotalExpenseAmountDetails += parseFloat(expenseDetail.Amount);
                                grandTotalExpenseVatAmountDetails += parseFloat(expenseDetail.vat_amount);
                            } else {
                                $('<td colspan="2"></td>').appendTo(dataRow);
                            }

                            // Display data for expense_paid
                            var expensePaid = data.expense_paid ? data.expense_paid[i] : null;
                            if (expensePaid) {
                                $('<td>').text(expensePaid.amount).appendTo(dataRow);

                                // Update totals
                                grandTotalExpenseAmountPaid += parseFloat(expensePaid.amount);
                            } else {
                                $('<td></td>').appendTo(dataRow);
                            }
                        }
                    }
                });

                // Subtract expense totals from grand totals
                grandTotalAmountDetails -= grandTotalExpenseAmountDetails;
                grandTotalAmountPaid -= grandTotalExpenseAmountPaid;

                // Add grand total row
                var grandTotalRow = $('<tr>').appendTo(tbody);
                $('<td>').text('Grand Total').appendTo(grandTotalRow);
                $('<td>').text(grandTotalCBMDetails.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalQtyDetails).appendTo(grandTotalRow);
                $('<td>').text(grandTotalWeightDetails.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalAmountDetails.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalCommissionDetails.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalAmountPaid.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalCommissionPaid.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalExpenseAmountDetails.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalExpenseVatAmountDetails.toFixed(2)).appendTo(grandTotalRow);
                $('<td>').text(grandTotalExpenseAmountPaid.toFixed(2)).appendTo(grandTotalRow);
            }
        },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }




           






        </script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->

        
    </body>
    <!--end::Body-->
 
</html>
