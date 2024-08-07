<?php $title = 'Filtered - report'; // Default title?>
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
                                                    Filtered Report </li>
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

                                    <form action="#">
                                        <!--begin::Card-->
                                        <div class="card mb-7">
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <!--begin::Compact form-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Input group-->
                                                    <div class="position-relative w-md-400px me-md-2">
                                                        <label for="start_date">Start Date:</label>
                                                        <input type="date" id="start_date" class="form-control">
                                                    </div>
                                                    <div class="position-relative w-md-400px me-md-2">
                                                        <label for="end_date">End Date:</label>
                                                        <input type="date" id="end_date" class="form-control">
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin:Action-->
                                                    <div class="d-flex align-items-center">               
                                                        
                                                        <a href="#" id="kt_horizontal_search_advanced_link" class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#kt_advanced_search_form" aria-expanded="false">Advanced Search</a>
                                                    </div>
                                                    <!--end:Action-->
                                                </div>
                                                <!--end::Compact form-->

                                                <!--begin::Advance form-->
                                                <div class="collapse" id="kt_advanced_search_form" style="">
                                                    <!--begin::Separator-->
                                                    <div class="separator separator-dashed mt-9 mb-6"></div>
                                                    <!--end::Separator-->

                                                    <!--begin::Row-->
                                                            <div class="row g-8">
                                                                <!--begin::Col-->
                                                                
                                                                <!--end::Col-->

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="fs-6 form-label fw-bold text-gray-900">Employee</label>
                                                                        <select class="form-control form-control-solid" id="sales_rep" name="sales_rep" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <!--begin::Col-->
                                                                <div class="col-md-4">
                                                                    <label class="fs-6 form-label fw-bold text-gray-900">Select shipping</label>

                                                                    <!--begin::Radio group-->
                                                                    <div class="nav-group nav-group-fluid">       
                                                                        <!--begin::Option-->     
                                                                        
                                                                        <!--end::Option-->

                                                                        <!--begin::Option-->          
                                                                        <label>  
                                                                            <input type="radio" class="btn-check" name="shipping_type" value="sea">
                                                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">
                                                                                Sea
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Option-->

                                                                        <!--begin::Option-->        
                                                                        <label>    
                                                                            <input type="radio" class="btn-check" name="shipping_type" value="air">
                                                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">
                                                                                Air
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Radio group-->
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label class="fs-6 form-label fw-bold text-gray-900">Select Hbl type</label>

                                                                    <!--begin::Radio group-->
                                                                    <div class="nav-group nav-group-fluid">       
                                                                        <!--begin::Option-->     
                                                                        
                                                                        <!--end::Option-->

                                                                        <!--begin::Option-->          
                                                                        <label>  
                                                                            <input type="radio" class="btn-check" name="hbl_type" value="office">
                                                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">
                                                                                Office
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Option-->

                                                                        <!--begin::Option-->        
                                                                        <label>    
                                                                            <input type="radio" class="btn-check" name="hbl_type" value="dtd">
                                                                            <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">
                                                                                Door to Door
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Option-->
                                                                    </div>
                                                                    <!--end::Radio group-->
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                
                                                    <!--end::Row-->

                                                    <!--begin::Row-->
                                                    
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Advance form--> 
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div id="result"></div>
                                                </div>
                                            </div>
                                            <!--end::Card body--> 
                                        </div>
                                        <!--end::Card-->
                                    </form>

                                    <!--<div class="card card-flush mb-5 mb-xl-10">

                                        <div class="container mt-5">
                                            <h2 class="text-center">Select Date Range</h2>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                Add Font Awesome icon button here 
                                                <div class="col-md-4">
                                                    <button type="button" id="generate_report" class="btn btn-primary mt-3 mt-md-6">
                                                        <i class="fad fa-file-chart-line"></i> Generate Report
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div id="result"></div>
                                                </div>
                                            </div>
                                        </div>

                                       
                                    </div>-->

                                    

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

            $.ajax({
                url: 'get_employees.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, employees) {
                            options += '<option value="' + employees.employee_id + '">' + employees.name + '</option>';
                        });
                        $('#sales_rep').append(options);
                    } else {
                        $('#sales_rep').append('<option value="">No agents found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });



            

            $('#start_date, #end_date, #sales_rep, input[name="shipping_type"], input[name="hbl_type"]').on('change', function() {
    // Call fetchData function whenever any filter changes
    fetchData();
});

function fetchData() {
    var startDate = $('#start_date').val();
    var endDate = $('#end_date').val();
    var selectedEmployee = $('#sales_rep').val(); // Get selected employee
    var selectedShippingType = $("input[name='shipping_type']:checked").val(); // Get selected shipping type
    var selectedHblType = $("input[name='hbl_type']:checked").val(); // Get selected HBL type

    $.ajax({
        url: 'code-hbl.php',
        type: 'post',
        dataType: 'json',
        data: {
            action: 'show_filtered',
            start_date: startDate,
            end_date: endDate,
            sales_rep: selectedEmployee,
            shipping_type: selectedShippingType,
            hbl_type: selectedHblType
        },
        success: function(response) {
            // Clear previous results
            $('#result').empty();

            // Check if response contains an error
            if (response.error) {
                console.error('Error:', response.error);
                return;
            }

            // Initialize totals for hbl_details
            var grandTotalAmountDetails = 0;
            var grandTotalCommissionDetails = 0;
            var grandTotalCBMDetails = 0;
            var grandTotalQtyDetails = 0;
            var grandTotalWeightDetails = 0;

            // Initialize totals for hbl_paid
            var grandTotalAmountPaid = 0;
            var grandTotalCommissionPaid = 0;

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
            $('<th>').text('Amount').appendTo(headerRow);
            $('<th>').text('Commission').appendTo(headerRow);

            // Display combined data
            response.forEach(function(hbl) {
                if (hbl.hbl_details.length || hbl.hbl_paid.length) {
                    var hblTotalAmountDetails = 0;
                    var hblTotalCommissionDetails = 0;
                    var hblTotalCBMDetails = 0;
                    var hblTotalQtyDetails = 0;
                    var hblTotalWeightDetails = 0;

                    var hblTotalAmountPaid = 0;
                    var hblTotalCommissionPaid = 0;

                    // Iterate over hbl_details and hbl_paid arrays
                    var maxRowCount = Math.max(hbl.hbl_details.length, hbl.hbl_paid.length);
                    for (var i = 0; i < maxRowCount; i++) {
                        var hblRow = $('<tr>').appendTo(tbody);

                        // Display hbl code only in the first row
                        if (i === 0) {
                            $('<td>').text(hbl.hbl.code).appendTo(hblRow);
                        } else {
                            $('<td>').appendTo(hblRow);
                        }

                        // Display hbl_details data
                        var detail = hbl.hbl_details[i];
                        if (detail) {
                            $('<td>').text(detail.CBM).appendTo(hblRow);
                            $('<td>').text(detail.Qty).appendTo(hblRow);
                            $('<td>').text(detail.Weight).appendTo(hblRow);
                            $('<td>').text(detail.Amount).appendTo(hblRow);
                            $('<td>').text(detail.Commission).appendTo(hblRow);

                            // Update hbl_details subtotals
                            hblTotalAmountDetails += parseFloat(detail.Amount);
                            hblTotalCommissionDetails += parseFloat(detail.Commission);
                            hblTotalCBMDetails += parseFloat(detail.CBM);
                            hblTotalQtyDetails += parseInt(detail.Qty);
                            hblTotalWeightDetails += parseFloat(detail.Weight);
                        } else {
                            $('<td>').appendTo(hblRow).attr('colspan', 5);
                        }

                        // Display hbl_paid data
                        var paid = hbl.hbl_paid[i];
                        if (paid) {
                            $('<td>').text(paid.Amount).appendTo(hblRow);
                            $('<td>').text(paid.Commission).appendTo(hblRow);

                            // Update hbl_paid totals
                            hblTotalAmountPaid += parseFloat(paid.Amount);
                            hblTotalCommissionPaid += parseFloat(paid.Commission);
                        } else {
                            $('<td>').appendTo(hblRow).attr('colspan', 2);
                        }
                    }

                    // Add hbl_details subtotals to grand totals
                    grandTotalAmountDetails += hblTotalAmountDetails;
                    grandTotalCommissionDetails += hblTotalCommissionDetails;
                    grandTotalCBMDetails += hblTotalCBMDetails;
                    grandTotalQtyDetails += hblTotalQtyDetails;
                    grandTotalWeightDetails += hblTotalWeightDetails;
                    grandTotalAmountPaid += hblTotalAmountPaid;
                    grandTotalCommissionPaid += hblTotalCommissionPaid;

                    // Add subtotal row for current hbl
                    var subtotalRow = $('<tr>').appendTo(tbody);
                    $('<td>').text('Subtotal').appendTo(subtotalRow);
                    $('<td>').text(hblTotalCBMDetails.toFixed(2)).appendTo(subtotalRow);
                    $('<td>').text(hblTotalQtyDetails).appendTo(subtotalRow);
                    $('<td>').text(hblTotalWeightDetails.toFixed(2)).appendTo(subtotalRow);
                    $('<td>').text(hblTotalAmountDetails.toFixed(2)).appendTo(subtotalRow);
                    $('<td>').text(hblTotalCommissionDetails.toFixed(2)).appendTo(subtotalRow);
                    $('<td>').text(hblTotalAmountPaid.toFixed(2)).appendTo(subtotalRow);
                    $('<td>').text(hblTotalCommissionPaid.toFixed(2)).appendTo(subtotalRow);
                }
            });

            // Add grand total row for hbl_details
            var grandTotalRowDetails = $('<tr>').appendTo(tbody);
            $('<td>').text('Grand Total (Details)').appendTo(grandTotalRowDetails);
            $('<td>').text(grandTotalCBMDetails.toFixed(2)).appendTo(grandTotalRowDetails);
            $('<td>').text(grandTotalQtyDetails).appendTo(grandTotalRowDetails);
            $('<td>').text(grandTotalWeightDetails.toFixed(2)).appendTo(grandTotalRowDetails);
            $('<td>').text(grandTotalAmountDetails.toFixed(2)).appendTo(grandTotalRowDetails);
            $('<td>').text(grandTotalCommissionDetails.toFixed(2)).appendTo(grandTotalRowDetails);
            $('<td>').text('').appendTo(grandTotalRowDetails);
            $('<td>').text('').appendTo(grandTotalRowDetails);

            // Add grand total row for hbl_paid
            var grandTotalRowPaid = $('<tr>').appendTo(tbody);
            $('<td>').text('Grand Total (Paid)').appendTo(grandTotalRowPaid);
            $('<td>').text('').appendTo(grandTotalRowPaid);
            $('<td>').text('').appendTo(grandTotalRowPaid);
            $('<td>').text('').appendTo(grandTotalRowPaid);
            $('<td>').text(grandTotalAmountPaid.toFixed(2)).appendTo(grandTotalRowPaid);
            $('<td>').text(grandTotalCommissionPaid.toFixed(2)).appendTo(grandTotalRowPaid);
            $('<td>').text('').appendTo(grandTotalRowPaid);
            $('<td>').text('').appendTo(grandTotalRowPaid);
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
