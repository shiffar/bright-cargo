<?php $title = 'index'; // Default title
?>
<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
                                                Dashboard </li>
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

                            <!--<div id="kt_app_content_container" class="app-container  container-fluid ">

                                    <div class="card card-flush mb-5 mb-xl-10">

                                        <div class="container mt-5">
                                            <h2 class="text-left">Expanse Report</h2>
                                            
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div id="result"></div>
                                                </div>
                                            </div>
                                        </div>

                                    

                                    
                                    </div>
                                </div>
                                begin::Content container-->
                            <div id="kt_app_content_container" class="app-container  container-fluid ">
                                   
                                    <?php
                                    // Assuming you have established the database connection and set up the session already
                                    include 'connection.php';
                                    // Define status array with default count as 0
                                    $statusCounts = [
                                        'default' => 0,
                                        'on-hold' => 0,
                                        'on-hold-pending' => 0,
                                        'tbl' => 0,
                                        'tbl-pending' => 0,
                                        'loading' => 0,
                                        'loading-pending' => 0,
                                        'shipped' => 0,
                                        'shipped-pending' => 0,
                                        'delivered' => 0,
                                        'delivered-pending' => 0,
                                        'completed' => 0
                                    ];

                                    // Initialize counts for employees and customers
                                    $employeeCount = 0;
                                    $customerCount = 0;

                                    // Check if session companyId is set and not empty
                                    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
                                        $company_id = $_SESSION['company_id'];

                                        // Construct SQL query to count statuses
                                        $sql = "SELECT current_status, COUNT(*) AS status_count FROM hbl_status hs
                                                    INNER JOIN hbl h ON hs.hbl_id = h.hbl_id
                                                    WHERE h.company_id = $company_id
                                                    GROUP BY current_status";

                                        // Execute SQL query
                                        $result = $conn->query($sql);

                                        // Update status counts based on query result
                                        while ($row = $result->fetch_assoc()) {
                                            $statusCounts[$row['current_status']] = $row['status_count'];
                                        }

                                        // Count employees
                                        $sqlEmployee = "SELECT COUNT(*) AS employee_count FROM employees WHERE company_id = $company_id";
                                        $resultEmployee = $conn->query($sqlEmployee);
                                        $rowEmployee = $resultEmployee->fetch_assoc();
                                        $employeeCount = $rowEmployee['employee_count'];

                                        // Count customers
                                        $sqlCustomer = "SELECT COUNT(*) AS customer_count FROM customers WHERE company_id = $company_id";
                                        $resultCustomer = $conn->query($sqlCustomer);
                                        $rowCustomer = $resultCustomer->fetch_assoc();
                                        $customerCount = $rowCustomer['customer_count'];
                                    }

                                    // Display status counts, employee count, and customer count within the card
                                    ?>
                                        <div class="row g-5 gx-5 gx-xl-10">
                                            <?php
                                            // Define icon classes for each status
                                            $statusIcons = [
                                                'default' => 'fad fa-circle text-muted',
                                                'on-hold' => 'fad fa-pause-circle text-primary',
                                                'on-hold-pending' => 'fad fa-pause-circle text-warning',
                                                'tbl' => 'fad fa-box text-secondary',
                                                'tbl-pending' => 'fad fa-box text-warning',
                                                'loading' => 'fad fa-truck-loading text-success',
                                                'loading-pending' => 'fad fa-truck-loading text-warning',
                                                'shipped' => 'fad fa-shipping-fast text-info',
                                                'shipped-pending' => 'fad fa-shipping-fast text-warning',
                                                'delivered' => 'fad fa-check-circle text-warning',
                                                'delivered-pending' => 'fad fa-check-circle text-warning',
                                                'completed' => 'fad fa-check-circle text-success'
                                            ];

                                            foreach ($statusCounts as $status => $count) :
                                            ?>
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo ucfirst($status); ?></h5>
                                                            <p class="card-text">-
                                                                <i class="<?php echo $statusIcons[$status]; ?> fs-3x"></i>
                                                                <span class="ms-2"><?php echo $count; ?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
-
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Employees</h5>
                                                        <p class="card-text">-
                                                            <i class="fad fa-users text-success fs-3x"></i>
                                                            <span class="ms-2"><?php echo $employeeCount; ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Customers</h5>
                                                        <p class="card-text">
                                                            <i class="fad fa-user-friends text-info fs-3x"></i>
                                                            <span class="ms-2"><?php echo $customerCount; ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                    




                                </div>


                            <!--<div id="kt_app_content_container" class="app-container container-fluid">
                                <?php
                                include 'connection.php';

                                // Status counts initialization
                                $statusCounts = [
                                    'default' => 0,
                                    'on-hold' => 0,
                                    'on-hold-pending' => 0,
                                    'tbl' => 0,
                                    'tbl-pending' => 0,
                                    'loading' => 0,
                                    'loading-pending' => 0,
                                    'shipped' => 0,
                                    'shipped-pending' => 0,
                                    'delivered' => 0,
                                    'delivered-pending' => 0,
                                    'completed' => 0
                                ];

                                // Employee and customer count initialization
                                $employeeCount = 0;
                                $customerCount = 0;

                                if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
                                    $company_id = $_SESSION['company_id'];

                                    // Fetch HBL status counts
                                    $sql = "SELECT current_status, COUNT(*) AS status_count FROM hbl_status hs
                    INNER JOIN hbl h ON hs.hbl_id = h.hbl_id
                    WHERE h.company_id = $company_id
                    GROUP BY current_status";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                        $statusCounts[$row['current_status']] = $row['status_count'];
                                    }

                                    // Fetch employee count
                                    $sqlEmployee = "SELECT COUNT(*) AS employee_count FROM employees WHERE company_id = $company_id";
                                    $resultEmployee = $conn->query($sqlEmployee);
                                    $rowEmployee = $resultEmployee->fetch_assoc();
                                    $employeeCount = $rowEmployee['employee_count'];

                                    // Fetch customer count
                                    $sqlCustomer = "SELECT COUNT(*) AS customer_count FROM customers WHERE company_id = $company_id";
                                    $resultCustomer = $conn->query($sqlCustomer);
                                    $rowCustomer = $resultCustomer->fetch_assoc();
                                    $customerCount = $rowCustomer['customer_count'];
                                }

                                // Fetch shipping status counts
                                $shippingCounts = [
                                    'container' => 0,
                                    'container-pending' => 0,
                                    'ship' => 0,
                                    'ship-pending' => 0,
                                    'port' => 0,
                                    'port-pending' => 0,
                                    'customs' => 0,
                                    'customs-pending' => 0,
                                    'vehicle' => 0,
                                    'vehicle-pending' => 0,
                                    'loading' => 0,
                                    'loading-pending' => 0,
                                    'completed' => 0
                                ];

                                $sqlShipping = "SELECT scurrent_status, COUNT(*) AS shipping_count FROM shipped_details_status
                        GROUP BY scurrent_status";
                                $resultShipping = $conn->query($sqlShipping);

                                while ($row = $resultShipping->fetch_assoc()) {
                                    $shippingCounts[$row['scurrent_status']] = $row['shipping_count'];
                                }

                                // JSON encode data for JavaScript
                                $statusLabels = json_encode(array_keys($statusCounts));
                                $statusData = json_encode(array_values($statusCounts));
                                $shippingLabels = json_encode(array_keys($shippingCounts));
                                $shippingData = json_encode(array_values($shippingCounts));
                                ?>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">HBL Status</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="statusChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Users</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="userChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Shipping Status</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="shippingChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>



                    </div>-->
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
        const professionalColors = [
            '#1f77b4', '#ff7f0e', '#2ca02c', '#d62728',
            '#9467bd', '#8c564b', '#e377c2', '#7f7f7f',
            '#bcbd22', '#17becf'
        ];

        // HBL Status Chart
        const statusLabels = <?php echo $statusLabels; ?>;
        const statusData = <?php echo $statusData; ?>;
        const ctxStatus = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctxStatus, {
            type: 'doughnut',
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Status Count',
                    data: statusData,
                    backgroundColor: professionalColors.slice(0, statusLabels.length),
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    hoverBorderColor: '#000000',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif',
                                color: '#333333'
                            },
                            padding: 20,
                            boxWidth: 15
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.raw !== null) {
                                    label += context.raw;
                                }
                                return label;
                            }
                        },
                        backgroundColor: '#ffffff',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderColor: '#dddddd',
                        borderWidth: 1
                    }
                },
                cutout: '60%',
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });

        // User Chart (Employees + Customers)
        const ctxUser = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctxUser, {
            type: 'doughnut',
            data: {
                labels: ['Employees', 'Customers'],
                datasets: [{
                    label: 'User Count',
                    data: [<?php echo $employeeCount; ?>, <?php echo $customerCount; ?>],
                    backgroundColor: [professionalColors[0], professionalColors[1]],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    hoverBorderColor: '#000000',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif',
                                color: '#333333'
                            },
                            padding: 20,
                            boxWidth: 15
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.raw !== null) {
                                    label += context.raw;
                                }
                                return label;
                            }
                        },
                        backgroundColor: '#ffffff',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderColor: '#dddddd',
                        borderWidth: 1
                    }
                },
                cutout: '60%',
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });

        // Shipping Status Chart
        const shippingLabels = <?php echo $shippingLabels; ?>;
        const shippingData = <?php echo $shippingData; ?>;
        const ctxShipping = document.getElementById('shippingChart').getContext('2d');
        const shippingChart = new Chart(ctxShipping, {
            type: 'doughnut',
            data: {
                labels: shippingLabels,
                datasets: [{
                    label: 'Shipping Status Count',
                    data: shippingData,
                    backgroundColor: professionalColors.slice(0, shippingLabels.length),
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    hoverBorderColor: '#000000',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif',
                                color: '#333333'
                            },
                            padding: 20,
                            boxWidth: 15
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.raw !== null) {
                                    label += context.raw;
                                }
                                return label;
                            }
                        },
                        backgroundColor: '#ffffff',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderColor: '#dddddd',
                        borderWidth: 1
                    }
                },
                cutout: '60%',
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        });

        // Additional Charts (if needed)
        // You can add more charts following a similar structure as above if required.





        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "code-hbl.php",
                data: {
                    action: 'show_expense2'
                },
                dataType: "json",
                success: function(response) {
                    // Clear previous results
                    $('#result').empty();

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
        });







        $(document).ready(function() {
            // Function to fetch notifications via AJAX
            function fetchNotifications() {
                $.ajax({
                    url: 'code-request.php',
                    type: 'POST',
                    data: {
                        action: 'fetch'
                    },
                    dataType: 'json',
                    success: function(response) {
                        var requestsCountBadge = $('#requestsCountBadge');
                        var pulseRing = $('.pulse-ring');

                        if (response.requestsCount > 0) {
                            requestsCountBadge.text(response.requestsCount).removeClass('d-none');
                            pulseRing.removeClass('d-none');
                        } else {
                            requestsCountBadge.addClass('d-none');
                            pulseRing.addClass('d-none');
                        }

                        $('#requestItems').empty();

                        $.each(response.requests, function(index, request) {
                            // Convert notification time to JavaScript Date object
                            var requestTime = new Date(request.time);

                            // Calculate the time difference in milliseconds
                            var timeDifference = Date.now() - requestTime.getTime();

                            // Calculate time units
                            var seconds = Math.floor(timeDifference / 1000);
                            var minutes = Math.floor(seconds / 60);
                            var hours = Math.floor(minutes / 60);
                            var days = Math.floor(hours / 24);
                            var weeks = Math.floor(days / 7);
                            var months = Math.floor(days / 30);
                            var years = Math.floor(days / 365);

                            // Define time unit labels
                            var timeLabels = ['year', 'month', 'week', 'day', 'hour', 'minute', 'second'];
                            var timeValues = [years, months, weeks, days, hours, minutes, seconds];

                            // Find the most appropriate time unit
                            var timeUnit = '';
                            var timeValue = 0;
                            for (var i = 0; i < timeValues.length; i++) {
                                if (timeValues[i] > 0) {
                                    timeUnit = timeLabels[i];
                                    timeValue = timeValues[i];
                                    break;
                                }
                            }

                            // Display time difference
                            var timeAgo = timeValue + ' ' + timeUnit + (timeValue !== 1 ? 's' : '') + ' ago';

                            // Append notification item
                            var requestItem = `
                        <div class="d-flex flex-stack py-4">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-35px me-4">
                                    <span class="symbol-label bg-light-primary">      
                                        <i class="ki-outline ki-abstract-28 fs-2 text-primary"></i>                                                    
                                    </span>
                                </div>
                                <div class="mb-0 me-2">
                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">${request.current_status}</a>
                                    <div class="text-gray-500 fs-7">${timeAgo}</div>
                                </div>
                            </div>
                            <span class="badge badge-light fs-8" style="margin-right: 10px;">${request.request_status === '0' ? 'New' : 'Old'}</span>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary ms-auto eye-btn" data-notification-id="${request.hbl_status_id}">
                                <i class="fad fa-eye"></i> <!-- Eye icon button -->
                            </button>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary ms-2 double-tick-btn" data-notification-id="${request.hbl_status_id}">
                                <i class="fad fa-check-double"></i> <!-- Double tick icon button -->
                            </button>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary ms-2 cancel_btn" data-notification-id="${request.hbl_status_id}">
                                <i class="fad fa-times"></i> <!-- Cancel icon button -->
                            </button>
                        </div>
                    `;
                            $('#requestItems').append(requestItem);
                        });
                    }
                });
            }

            // Call fetchNotifications function when the page loads
            fetchNotifications();

            $(document).on('click', '.eye-btn', function() {
                var notificationId = $(this).data('notification-id');

                // Send AJAX request to update request_status to 1
                $.ajax({
                    url: 'code-request.php', // Update the URL accordingly
                    type: 'POST',
                    data: {
                        action: 'update',
                        notificationId: notificationId
                    },
                    dataType: 'json',
                    success: function(response) {
                        // If update is successful, fetch notifications again to update the UI
                        fetchNotifications();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error if necessary
                    }
                });
            });

            $(document).on('click', '.double-tick-btn', function() {
                var notificationId = $(this).data('notification-id');

                // Send AJAX request to update the notification status
                $.ajax({
                    url: 'code-request.php',
                    type: 'POST',
                    data: {
                        action: 'update2',
                        notificationId: notificationId
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Check if the update was successful
                        if (response.success) {
                            // Reload notifications after successful update
                            fetchNotifications();
                        } else {
                            // Handle the error if the update fails
                            console.error('Failed to update notification status: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + error);
                    }
                });
            });

            $(document).on('click', '.cancel_btn', function() {
                var notificationId = $(this).data('notification-id');

                // Send AJAX request to update the notification status
                $.ajax({
                    url: 'code-request.php',
                    type: 'POST',
                    data: {
                        action: 'cancel',
                        notificationId: notificationId
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Check if the cancellation was successful
                        if (response.success) {
                            // Reload notifications after successful cancellation
                            fetchNotifications();
                        } else {
                            // Handle the error if the cancellation fails
                            console.error('Failed to cancel notification: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + error);
                    }
                });
            });




        });
    </script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->


</body>
<!--end::Body-->

</html>