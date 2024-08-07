<?php $title = 'cindex'; // Default title
?>
<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->
<?php include 'web-layouts/head.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .tracking-container {
        width: 100%;
        max-width: 95%;
        /* Adjust this value based on your design */
    }

    .tracking-bar {
        position: relative;
        width: 100%;
        height: 5px;
        background-color: #b5b5b5;
        /* Default color */
    }

    .tracking-bar::before {
        content: "";
        position: absolute;
        left: 0;
        width: calc(var(--progress) * 1%);
        height: 100%;
        background-color: var(--color);
        /* Color based on status */
    }

    .tracking-icon {
        position: absolute;
        top: calc(50% - 50px);
        /* Half of the icon height */
        left: calc(50%);
        /* Half of the dot width */
        font-size: 24px;
        color: #4b0a3f;
        /* Default icon color */
    }

    .tracking-dot {
        position: absolute;
        width: 12px;
        height: 12px;
        background: var(--color);
        /* Default dot color */
        border: 2px solid #fff;
        top: 50%;
        left: 50%;
        transform: translateY(-50%);
        border-radius: 2rem;
        transition: left 0.5s ease-in-out;
        z-index: 10;
    }

    .tracking-dot.completed {
        background: #28a745;
        /* Completed dot color */
        box-shadow: none;
        animation: none;
    }

    .tracking-dot.current {
        animation: pulse 1s infinite linear;
    }

    .tracking-dot.next {
        background: #b5b5b5;
        /* Next dot color */
        box-shadow: none;
        animation: none;
    }

    .tracking-status {
        position: absolute;
        top: 20px;
        /* Adjust this value as needed to position the status text */
        font-size: 0.8em;
        text-align: center;
        width: 100px;
        /* Adjust as necessary */
        margin-left: -50px;
        /* Adjust as necessary to properly center */
    }


    /* Animation for the pulse effect */
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0px rgba(255, 0, 0, 0.5);
            /* Change shadow color here */
        }

        100% {
            box-shadow: 0 0 0 8px rgba(255, 0, 0, 0);
            /* Change shadow color here */
        }
    }

    .timeline-icon img {
        transition: all 0.3s ease-in-out;
    }

    .timeline-icon img:hover {
        width: 60px;
        height: 60px;
    }

    .chart-container {
        width: 400px;
        /* Adjust the width as needed */
        height: 400px;
        /* Adjust the height as needed */
    }
</style>



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
                        <?php

                        include 'connection.php';

                        // Fetch customer details based on session ID
                        $customerId = $_SESSION['id'];
                        $customerQuery = "SELECT * FROM customers WHERE id = $customerId";
                        $customerResult = $conn->query($customerQuery);

                        $hblCount = 0;
                        $shippingStatusCounts = [];
                        $hblStatusCounts = [];

                        if ($customerResult->num_rows > 0) {
                            // Fetch HBL count for the customer
                            $hblQuery = "SELECT COUNT(*) AS hblCount FROM hbl WHERE Cus_Reference = $customerId";
                            $hblResult = $conn->query($hblQuery);
                            $hblCount = $hblResult->fetch_assoc()['hblCount'];

                            // Fetch shipping status counts for the customer
                            $shippingStatusQuery = "SELECT scurrent_status, COUNT(*) AS statusCount FROM shipped_details_status 
                                            LEFT JOIN shipped_details ON shipped_details_status.shipped_details_id = shipped_details.shipped_details_id
                                            LEFT JOIN hbl ON shipped_details.shipped_details_id = hbl.container_id_fk
                                            WHERE hbl.Cus_Reference = $customerId GROUP BY scurrent_status";
                            $shippingStatusResult = $conn->query($shippingStatusQuery);
                            while ($row = $shippingStatusResult->fetch_assoc()) {
                                $shippingStatusCounts[$row['scurrent_status']] = $row['statusCount'];
                            }

                            // Fetch HBL status counts for the customer
                            $hblStatusQuery = "SELECT current_status, COUNT(*) AS statusCount FROM hbl_status
                                            LEFT JOIN hbl ON hbl_status.hbl_id = hbl.hbl_id 
                                            WHERE hbl.Cus_Reference = $customerId GROUP BY current_status";
                            $hblStatusResult = $conn->query($hblStatusQuery);
                            while ($row = $hblStatusResult->fetch_assoc()) {
                                $hblStatusCounts[$row['current_status']] = $row['statusCount'];
                            }
                        } else {
                            echo "No customer found for the provided session ID.";
                        }

                        // Close database connection

                        // Convert PHP arrays to JSON
                        $hblStatusCountsJson = json_encode($hblStatusCounts);
                        $shippingStatusCountsJson = json_encode($shippingStatusCounts);
                        ?>

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">


                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container  container-fluid ">
                                <!--begin::Form-->
                                <form id="search-form">
                                    <!--begin::Card-->
                                    <div class="card mb-7">
                                        <!--begin::Card body-->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
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
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="card-title">HBL Count</h5>
                                                    <p class="card-text">
                                                        <i class="fad fa-receipt text-info fs-3x"></i>
                                                        <span class="ms-2"><?php echo $hblCount; ?></span>
                                                    </p>
                                                </div>
                                            </div>



                                            <!--end::Compact form-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->
                                </form>


                                <div class="row g-5 gx-5 gx-xl-10">


                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h3>HBL Status</h3>
                                                <div class="chart-container">
                                                    <canvas id="statusChart"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h3>Shipping Status</h3>
                                                <div class="chart-container">
                                                    <canvas id="shippingChart"></canvas>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <script>
                                    const professionalColors = [
                                        '#1f77b4', '#ff7f0e', '#2ca02c', '#d62728',
                                        '#9467bd', '#8c564b', '#e377c2', '#7f7f7f',
                                        '#bcbd22', '#17becf'
                                    ];

                                    // HBL Status Chart
                                    const hblStatusCounts = <?php echo $hblStatusCountsJson; ?>;
                                    const statusLabels = Object.keys(hblStatusCounts);
                                    const statusData = Object.values(hblStatusCounts);

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

                                    // Shipping Status Chart
                                    const shippingStatusCounts = <?php echo $shippingStatusCountsJson; ?>;
                                    const shippingLabels = Object.keys(shippingStatusCounts);
                                    const shippingData = Object.values(shippingStatusCounts);

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
                                </script>
                                <div id="results-container"></div>
                                <div id="search-results"></div>
                                <!--end::Form-->
                                <div class="card">
                                    <!--begin::Card head-->
                                    <div class="card-header card-header-stretch">
                                        <!--begin::Title-->
                                        <div class="card-title d-flex align-items-center">
                                            <i class="ki-outline ki-calendar-8 fs-1 text-primary me-3 lh-0"></i>

                                            <h3 class="fw-bold m-0 text-gray-800">Jan 23, 2024</h3>
                                        </div>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->

                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Card head-->


                                    <!--begin::Card body-->
                                    <div class="card-body">
                                        <!--begin::Tab Content-->
                                        <div class="tab-content">
                                            <!--begin::Tab panel-->
                                            <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
                                                <!--begin::Timeline-->
                                                <div class="timeline timeline-border">

                                                    <!--begin::Timeline item-->
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line border-success"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon border-success">
                                                            <i class="ki-duotone ki-double-check fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">THANK YOU FOR YOUR BRIGHT CHOICE, YOUR CARGO WITH US AND ON
                                                                    PROCESS FOR LOADING:</div>
                                                                <!--end::Title-->


                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line border-success"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon border-success">
                                                            <i class="ki-duotone ki-double-check fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">YOUR CARGO LOADED TO CONTAINER BY BRIGHT CARGO:</div>
                                                                <!--end::Title-->


                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line border-success"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon border-success">
                                                            <i class="ki-duotone ki-double-check fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">YOUR SHIPMENT ON BOARD NOW AND SAILED FROM PORT OF LOADING:</div>
                                                                <!--end::Title-->


                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line border-success"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon border-success">
                                                            <i class="ki-duotone ki-double-check fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">YOUR CARGO REACHED IN PORT OF DISCHARGE AND READY FOR CLEARANCE:</div>
                                                                <!--end::Title-->

                                                                <!--begin::Description-->

                                                                <!--end::Description-->
                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line border-success" style="height: 100px;"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon border-success">
                                                            <i class="ki-duotone ki-double-check fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">YOUR CARGO HAS BEEN CLEARED FROM CUSTOMS AND BEING ARRANGED
                                                                    FOR DELIVERY:</div>
                                                                <!--end::Title-->


                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line border-gray" style="border-left-style: dotted; border-left-width: 3px;"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon border-success">
                                                            <img src="assets/media/tracking-icons/t1.png" alt="Delivery" style="width: 50px; height: 50px;">
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">YOUR CARGO OUT FOR DELIVERY AND WILL BE RECEIVED BY YOUR
                                                                    CONSIGNED PERSON AS SOON AS POSSIBLE:</div>
                                                                <!--end::Title-->


                                                                <!--end::Description-->
                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <div class="timeline-item">
                                                        <!--begin::Timeline line-->
                                                        <div class="timeline-line"></div>
                                                        <!--end::Timeline line-->

                                                        <!--begin::Timeline icon-->
                                                        <div class="timeline-icon">
                                                            <i class="ki-duotone ki-double-check fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Timeline icon-->

                                                        <!--begin::Timeline content-->
                                                        <div class="timeline-content mb-10 mt-n1">
                                                            <!--begin::Timeline heading-->
                                                            <div class="pe-3 mb-5">
                                                                <div class="mb-5 d-flex align-items-center mt-1 fs-6">
                                                                    <!--begin::Info-->
                                                                    <div class="fw-bold me-2 fs-7">23 Nov 2023, 15:15</div>

                                                                </div>
                                                                <!--begin::Title-->
                                                                <div class="fs-9 fw-semibold mb-6">YOUR CARGO DELIVERED. THANK YOU FOR SHIPPING WITH BRIGHT CARGO:</div>
                                                                <!--end::Title-->

                                                                <!--begin::Description-->

                                                                <!--end::Description-->
                                                            </div>

                                                        </div>
                                                        <!--end::Timeline content-->
                                                    </div>
                                                    <!--end::Timeline item-->
                                                    <!--begin::Timeline item-->

                                                    <!--end::Timeline item-->
                                                </div>
                                                <!--end::Timeline-->
                                            </div>
                                            <!--end::Tab panel-->


                                            <!--end::Tab panel-->
                                        </div>
                                        <!--end::Tab Content-->
                                    </div>
                                    <!--end::Card body-->
                                </div>


                                <!--begin::Toolbar-->

                                <!--end::Toolbar-->

                                <!--begin::Tab Content-->

                                <!--end::Tab Content-->
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

    <script>
        $(document).ready(function() {
            // Function to fetch notifications via AJAX
            function fetchNotifications() {
                $.ajax({
                    url: 'code-notifications.php',
                    type: 'POST',
                    data: {
                        action: 'fetch'
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Update notification count
                        var notificationCount = response.notificationCount;
                        var notificationCountBadge = $('#notificationCountBadge');
                        var pulseRing = $('#notification_ring');

                        if (notificationCount > 0) {
                            notificationCountBadge.text(notificationCount).removeClass('d-none');
                            pulseRing.removeClass('d-none');
                        } else {
                            notificationCountBadge.addClass('d-none');
                            pulseRing.addClass('d-none');
                        }

                        // Clear existing notifications
                        $('#notificationItems').empty();

                        // Add new notifications
                        $.each(response.notifications, function(index, notification) {
                            // Convert notification time to JavaScript Date object
                            var notificationTime = new Date(notification.time);

                            // Calculate the time difference in milliseconds
                            var timeDifference = Date.now() - notificationTime.getTime();

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
                            var notificationItem = `
									<div class="d-flex flex-stack py-4">
										<div class="d-flex align-items-center">
											<div class="symbol symbol-35px me-4">
												<span class="symbol-label bg-light-primary">      
													<i class="ki-outline ki-abstract-28 fs-2 text-primary"></i>                                                    
												</span>
											</div>
											<div class="mb-0 me-2">
												<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">${notification.notification}</a>
												<div class="text-gray-500 fs-7">${timeAgo}</div>
											</div>
										</div>
										<span class="badge badge-light fs-8">${notification.notification_status === '0' ? 'New' : 'Old'}</span>
										<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary ms-auto cancel_btn" data-notification-id="${notification.notification_id}">
											<i class="fad fa-times"></i>
										</button>
									</div>
								`;
                            $('#notificationItems').append(notificationItem);
                        });

                    }
                });
            }

            // Function to clear all notifications
            function clearAllNotifications() {
                $.ajax({
                    url: 'code-notifications.php',
                    type: 'POST',
                    data: {
                        action: 'clearAll'
                    },
                    dataType: 'json',
                    success: function(response) {
                        fetchNotifications(); // Refresh notifications after clearing all
                    }
                });
            }

            // Click event handler for the "Clear All" button
            $('#clearAllBtn').click(function() {
                clearAllNotifications();
            });

            // Click event handler for the cancel button
            $(document).on('click', '.cancel_btn', function() {
                var notificationId = $(this).data('notification-id');
                cancelNotification(notificationId);
            });

            // Function to cancel a single notification
            function cancelNotification(notificationId) {
                console.log('Notification ID:', notificationId); // Log the received notification ID
                $.ajax({
                    url: 'code-notifications.php',
                    type: 'POST',
                    data: {
                        action: 'cancel',
                        notificationId: notificationId
                    },
                    dataType: 'json',
                    success: function(response) {
                        fetchNotifications(); // Refresh notifications after canceling one
                    }
                });
            }

            // Call fetchNotifications function initially
            fetchNotifications();

            // Call fetchNotifications function every 5 seconds (for example)
            setInterval(fetchNotifications, 5000);

            $.ajax({
                url: 'code-tracking.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'tracking'
                },
                success: function(data) {
                    // Assuming `response` is the JSON data returned from the PHP file
                    // You can call your displayResults function here passing the `response` data
                    displayResults(data);
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });


            $('#search-form').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var formData = $(this).serialize(); // Serialize form data

                $.ajax({
                    type: "POST",
                    url: "code-tracking.php", // Path to your PHP file
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        displayResults(data);
                    },
                    error: function(xhr, status, error) {
                        var response = xhr.responseJSON;
                        if (response && response.error === 'missing_parameters') {
                            // Prompt user to enter mobile number, NIC, or passport
                            Swal.fire({
                                title: "Session ID not available",
                                text: "Please enter your mobile number, NIC, or passport:",
                                input: "text",
                                inputPlaceholder: "Mobile number, NIC, or passport",
                                showCancelButton: true,
                                confirmButtonText: "Search",
                                cancelButtonText: "Cancel",
                                icon: "info", // Add icon here
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Retry search with both HBL code and user input
                                    formData += '&customer_details=' + result.value;
                                    $.ajax({
                                        type: "POST",
                                        url: "code-tracking.php",
                                        data: formData, // Include both HBL code and user input
                                        dataType: 'json',
                                        success: function(data) {
                                            displayResults(data);
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText);
                                        }
                                    });
                                } else {
                                    console.error("User canceled the operation.");
                                }
                            });
                        } else {
                            console.error(xhr.responseText);
                        }
                    }
                });
            });



            function displayResults(data) {
                var resultsContainer = $('#search-results');
                var html = '';
                var displayedHBLs = [];
                var statuses = ['loading', 'container', 'ship', 'port', 'customs', 'vehicle', 'delivery'];

                // Create a map for hbl_code to its details
                var hblDetailsMap = {};
                $.each(data, function(index, item) {
                    if (!hblDetailsMap[item.hbl_code]) {
                        hblDetailsMap[item.hbl_code] = [];
                    }
                    hblDetailsMap[item.hbl_code].push(item);
                });

                $.each(data, function(index, item) {
                    if (displayedHBLs.indexOf(item.hbl_code) === -1) {
                        // Main HBL Card
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<div class="row align-items-center">';

                        html += '<div class="col-11">';
                        html += '<strong>RF: ' + item.hbl_code + '</strong><br>';
                        html += item.hbl_code;
                        html += '</div>';

                        html += '<div class="col-1 text-center">';
                        html += '<button class="btn btn-primary btn-sm more-btn" data-index="' + index + '">More</button>';
                        html += '</div>';

                        html += '<div class="col-12 mt-10"></div>';

                        html += '<div class="timeline timeline-border">';
                        statuses.forEach(function(status, idx) {
                            var statusClass = '';
                            var iconClass = '';
                            var borderColor = '';
                            var textColor = 'text-secondary';
                            var currentImage = getStatusImage(status);
                            var notStatusImage = getNotStatusImage(status);
                            var currentIndex = statuses.indexOf(status.replace('-pending', ''));

                            if (item.scurrent_status) {
                                var currentStatusIndex = statuses.indexOf(item.scurrent_status.replace('-pending', ''));
                                if (currentStatusIndex > currentIndex) {
                                    statusClass = 'text-success';
                                    iconClass = 'ki-duotone ki-double-check fs-2x text-success';
                                    borderColor = 'border-success';
                                    textColor = 'text-success';
                                    style = '';
                                    iconstyle = '';
                                } else if (currentStatusIndex === currentIndex) {
                                    statusClass = 'current';
                                    borderColor = 'border-success';
                                    textColor = 'text-dark fw-bold';
                                    style = '';
                                    iconstyle = 'animation: pulse 1s infinite linear;';
                                } else {
                                    iconClass = 'ki-duotone ki-double-check fs-2x text-gray';
                                    borderColor = 'border-gray';
                                    style = 'border-left-style: dotted; border-left-width: 3px;';
                                    textColor = 'text-dark';
                                    iconstyle = '';
                                }
                            }

                            html += '<div class="timeline-item" style="height: 6rem;">';
                            html += '<div class="timeline-line ' + borderColor + '" style="' + style + '"></div>';
                            html += '<div class="timeline-icon ' + borderColor + '" style="' + iconstyle + '">';
                            if (statusClass === 'current') {
                                html += '<img src="' + currentImage + '" class="img-fluid" alt="' + status + '" style="width: 25px; height: 25px;">';
                            } else if (statusClass === 'text-success') {
                                html += '<i class="' + iconClass + '"><span class="path1"></span><span class="path2"></span></i>';
                            } else {
                                html += '<img src="' + notStatusImage + '" class="img-fluid" alt="' + status + '" style="width: 25px; height: 25px; opacity: 0.3;">';
                            }
                            html += '</div>';
                            html += '<div class="timeline-content mb-10 mt-n1">';
                            if (statusClass === 'current') {
                                html += '<div class="pe-3 mb-5">';
                                html += '<div class="mb-5 d-flex align-items-center mt-1 fs-6">';
                                html += '<div class="fw-bold me-2 fs-7" style="font-size: 12px !important;">' + (item['step_' + (idx + 1) + '_dte'] ? item['step_' + (idx + 1) + '_dte'] : '') + '</div>';
                                html += '</div>';
                                html += '<div class="fs-9 fw-semibold mb-6 ' + textColor + '" style="font-size: 12px !important;">' + (item['step_' + (idx + 1)] ? item['step_' + (idx + 1)] : '') + '</div>';
                                html += '</div>';
                            } else {
                                html += '<div class="pe-3 mb-5">';
                                html += '<div class="mb-5 d-flex align-items-center mt-1 fs-6">';
                                html += '<div class="fw-bold me-2 fs-7">' + (item['step_' + (idx + 1) + '_dte'] ? item['step_' + (idx + 1) + '_dte'] : '') + '</div>';
                                html += '</div>';
                                html += '<div class="fs-9 fw-semibold mb-6 ' + textColor + '">' + (item['step_' + (idx + 1)] ? item['step_' + (idx + 1)] : '') + '</div>'; // Display step from shipping_steps
                                html += '</div>';
                            }
                            html += '</div>';
                            html += '</div>';
                        });
                        html += '</div>'; // end timeline

                        html += '<div class="col-12 mt-20 d-flex justify-content-between">';
                        html += '<div><strong>From: </strong>' + item.scountry + '</div>';
                        html += '<div><strong>To: </strong>' + item.rcountry + '</div>';
                        html += '</div>';

                        html += '</div>'; // end row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card

                        html += '<div id="hbl-details-' + index + '" class="hbl-details mt-3" style="display: none;">';

                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<div class="row">';

                        html += '<div class="col-2">';
                        html += '<strong>Carrier</strong><br>';
                        html += item.shipping_no;
                        html += '</div>';

                        html += '<div class="col-3">';
                        html += '<strong>From : </strong>' + item.scountry + '<br>';
                        html += '<strong>To : </strong>' + item.rcountry + '<br>';
                        html += '</div>';

                        html += '<div class="col-2">';
                        html += '<strong>Receiver</strong><br>';
                        html += item.Consignee_name;
                        html += '</div>';

                        html += '<div class="col-2 text-center">';
                        html += '<strong>Est Arrival</strong><br>';
                        html += item.sestimated_date + '<br>';
                        html += '</div>';

                        html += '<div class="col-2 text-center">';
                        html += '<strong>Status</strong><br>';
                        html += '<span class="badge badge-' + getStatusBadgeColor(item.current_status.toLowerCase()) + '">' + item.current_status + '</span>';
                        html += '</div>';




                        html += '</div>'; // end other details row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card


                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<div class="row">';


                        html += '<div class="col-sm-12 col-md-6 mb-2">';
                        html += '<h3><b class="text-danger">TRACKING ID</b> <span class="text-black">#' + item.hbl_code + '</span></h3>';
                        html += '</div>';
                        html += '<div class="row">';
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
                        html += '</div>'; // end other details row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card

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
                        html += '</div>'; // end row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card

                        // Receiver Details Card
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">Receiver Details</h5>';
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Receiver Name</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Consignee_name + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Receiver address</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.Consignee_address + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Receiver Mobile</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.rece_mobile + '</p>';
                        html += '</div>';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Receiver PP/NIC</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.sender_pp_nic + '</p>';
                        html += '</div>';
                        html += '</div>'; // end row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card

                        // Other Details Card
                        html += '<div class="card mb-3">';
                        html += '<div class="card-body">';
                        html += '<h5 class="card-title">Other Details</h5>';
                        html += '<div class="row">';
                        html += '<div class="col-sm-12 col-md-3 mb-2">';
                        html += '<h5><b>Agency</b></h5>';
                        html += '<p class="text-muted m-l-5">' + item.agent_name + '</p>';
                        html += '</div>';
                        html += '</div>'; // end row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card

                        // HBL Details Table
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

                        // Filter data for the current hbl_code
                        var filteredData = hblDetailsMap[item.hbl_code];

                        $.each(filteredData, function(index, detail) {
                            html += '<tr>';
                            html += '<td>' + detail.dDescription + '</td>';
                            html += '<td>' + detail.dCBM + '</td>';
                            html += '<td>' + detail.dWeight + '</td>';
                            html += '<td>' + detail.dQTY + '</td>';
                            html += '<td>' + detail.dAmount + '</td>';
                            html += '<td>' + detail.dCommission + '</td>';
                            html += '</tr>';

                            // Add values to totals
                            totalCBM += parseFloat(detail.dCBM);
                            totalWeight += parseFloat(detail.dWeight);
                            totalQTY += parseInt(detail.dQTY);
                            totalAmount += parseFloat(detail.dAmount);
                            totalCommission += parseFloat(detail.dCommission);
                        });

                        html += '</tbody>';
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
                        html += '</div>'; // end row
                        html += '</div>'; // end card-body
                        html += '</div>'; // end card


                        html += '</div>'; // end hidden details



                        // Add the current HBL code to the displayed list
                        displayedHBLs.push(item.hbl_code);
                    }
                });

                resultsContainer.html(html);

                // Toggle details on More button click
                $('.more-btn').on('click', function() {
                    var index = $(this).data('index');
                    $('#hbl-details-' + index).toggle();
                });
            }

            function getStatusImage(status) {
                switch (status) {
                    case 'loading':
                    case 'loading-pending':
                        return 'assets/media/tracking-icons/t1.png';
                    case 'container':
                    case 'container-pending':
                        return 'assets/media/tracking-icons/t2.png';
                    case 'ship':
                    case 'ship-pending':
                        return 'assets/media/tracking-icons/t3.png';
                    case 'port':
                    case 'port-pending':
                        return 'assets/media/tracking-icons/t4.png';
                    case 'customs':
                    case 'customs-pending':
                        return 'assets/media/tracking-icons/t5.png';
                    case 'vehicle':
                    case 'vehicle-pending':
                        return 'assets/media/tracking-icons/t6.png';
                    case 'delivery':
                    case 'delivery-pending':
                        return 'assets/media/tracking-icons/t7.png';
                    default:
                        return '';
                }
            }

            function getNotStatusImage(status) {
                switch (status) {
                    case 'loading':
                    case 'loading-pending':
                        return 'assets/media/tracking-icons/t1.png';
                    case 'container':
                    case 'container-pending':
                        return 'assets/media/tracking-icons/t2.png';
                    case 'ship':
                    case 'ship-pending':
                        return 'assets/media/tracking-icons/t3.png';
                    case 'port':
                    case 'port-pending':
                        return 'assets/media/tracking-icons/t4.png';
                    case 'customs':
                    case 'customs-pending':
                        return 'assets/media/tracking-icons/t5.png';
                    case 'vehicle':
                    case 'vehicle-pending':
                        return 'assets/media/tracking-icons/t6.png';
                    case 'delivery':
                    case 'delivery-pending':
                        return 'assets/media/tracking-icons/t7.png';
                    default:
                        return '';
                }
            }



            function formatDate(timestamp) {
                var date = new Date(timestamp);
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                return year + '-' + month + '-' + day; // Adjust the format as needed
            }




            // Function to get badge color based on status
            function getStatusBadgeColor(status) {
                var statusMap = {
                    'default': 'light ',
                    'on-hold': 'primary',
                    'on-hold-pending': 'warning',
                    'tbl': 'dark',
                    'tbl-pending': 'warning',
                    'loading': 'success',
                    'loading-pending': 'warning',
                    'shipped': 'info',
                    'shipped-pending': 'warning',
                    'delivered': 'light-success',
                    'delivered-pending': 'warning',
                    'completed': 'success'
                };

                return statusMap[status] || 'light ';
            }





            $(document).on('click', '.courier-item', function(e) {
                e.preventDefault();

                // Extract courier ID from data attribute
                var courierId = $(this).data('courier-id');

                // Store the courierId in sessionStorage
                sessionStorage.setItem('courierId', courierId);

                // Debugging: Check if courierId is set correctly
                console.log('Stored courierId in sessionStorage:', courierId);

                // Redirect to view-courier.php
                window.location.href = 'view-courier.php';
            });


            // Function to fetch couriers
            function fetchCouriers() {
                $.ajax({
                    url: 'code-courier.php',
                    type: 'POST',
                    data: {
                        action: 'courier_fetch'
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // Update notification count
                        var couriersCount = response.couriersCount; // Corrected variable name
                        var courierCountBadge = $('#courierCountBadge');
                        var pulseRing2 = $('#courier_ring');

                        if (couriersCount > 0) {
                            courierCountBadge.text(couriersCount).removeClass('d-none');
                            pulseRing2.removeClass('d-none');
                        } else {
                            courierCountBadge.addClass('d-none'); // Corrected variable name
                            pulseRing2.addClass('d-none');
                        }

                        // Clear existing notifications
                        $('#courierItems').empty();

                        // Add new notifications
                        $.each(response.couriers, function(index, courier) {
                            // Convert notification time to JavaScript Date object
                            var courierTime = new Date(courier.d_date);

                            // Calculate the time difference in milliseconds
                            var timeDifference = Date.now() - courierTime.getTime();

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

                            // Append courier item with data attribute for courier ID
                            var courierItem = `
                                    <div class="courier-item d-flex flex-stack py-4" data-courier-id="${courier.complete_delivery_id}">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">      
                                                    <i class="ki-outline ki-abstract-28 fs-2 text-primary"></i>                                                    
                                                </span>
                                            </div>
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">${courier.current_status}</a>
                                                <div class="text-gray-500 fs-7">${timeAgo}</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">${courier.view_status === '0' ? 'New' : 'Old'}</span>
                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary ms-auto cancel_btn" data-courier-id="${courier.complete_delivery_id}">
                                            <i class="fad fa-times"></i>
                                        </button>
                                    </div>
                                `;

                            $('#courierItems').append(courierItem);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + error);
                    }
                });
            }

            // Fetch couriers initially
            fetchCouriers();


            $(document).on('click', '.offer-item', function(e) {
                e.preventDefault();

                // Extract courier ID from data attribute
                var offerrId = $(this).data('offer-id');

                // Store the courierId in sessionStorage
                sessionStorage.setItem('offerrId', offerrId);

                // Debugging: Check if courierId is set correctly
                console.log('Stored offerrId in sessionStorage:', offerrId);

                // Redirect to view-courier.php
                window.location.href = 'view-offer.php';
            });


            // Function to fetch couriers
            function fetchOffers() {
                $.ajax({
                    url: 'code-customer.php',
                    type: 'POST',
                    data: {
                        action: 'offer_fetch'
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // Update notification count


                        // Clear existing notifications
                        $('#offerItems').empty();

                        // Add new notifications
                        $.each(response.offers, function(index, offer) {
                            // Convert notification time to JavaScript Date object
                            var offerTime = new Date(offer.crte_dte);

                            // Calculate the time difference in milliseconds
                            var timeDifference = Date.now() - offerTime.getTime();

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

                            // Append courier item with data attribute for courier ID
                            var offerItem = `
                                    <div class="offer-item d-flex flex-stack py-4" data-offer-id="${offer.offer_notification_id}">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">      
                                                    <i class="ki-outline ki-abstract-28 fs-2 text-primary"></i>                                                    
                                                </span>
                                            </div>
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">${offer.offer_name}</a>
                                                <div class="text-gray-500 fs-7">${timeAgo}</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                `;

                            $('#offerItems').append(offerItem);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + error);
                    }
                });
            }

            // Fetch couriers initially
            fetchOffers();



        });
    </script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->


</body>

</html>