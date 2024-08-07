<?php $title = 'Hbl'; // Default title
?>
<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php include 'web-layouts/head.php'; ?>
<script src="<?php echo $url; ?>assets/plugins/pdf/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

<style>
    .highlighted-text {
        background-color: black;
        color: white;
        padding: 10px;
        display: inline-block;
        font-size: 2.5rem;
        border-radius: 5px;
    }

    .company-details {
        font-size: 1.25rem;
        /* Slightly smaller font size */
        font-weight: bold;
        color: black;
        text-align: right;
    }

    .company-details small {
        display: block;
        margin-bottom: 5px;
    }

    .custom-modal-size {
        width: 6in;
        height: 8in;
        max-width: 100%;
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
                                                HBL </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        <?php
                                        if (isset($_SESSION['is_admin'])) {
                                            // Admin has all permissions
                                            $can_add = true;
                                            $can_edit = true;
                                            $can_delete = true;
                                            $can_add_delete = true;
                                            $can_add_edit = true;
                                            $can_edit_delete = true;
                                            $can_add_edit_delete = true;
                                            $access_denied = false;
                                        }
                                        // Check if user is logged in and has the required access rights
                                        if (isset($_SESSION['auth_user'])) {
                                            $hbl_permissions = explode(', ', $_SESSION['auth_user']['hbl']);

                                            // Check if user has add permission
                                            $can_add = in_array('hbl_add', $hbl_permissions);

                                            // Check if user has edit permission
                                            $can_edit = in_array('hbl_edit', $hbl_permissions);

                                            // Check if user has delete permission
                                            $can_delete = in_array('hbl_delete', $hbl_permissions);

                                            // Check if user has add and delete permissions combined
                                            $can_add_delete = in_array('hbl_add,hbl_delete', $hbl_permissions);

                                            // Check if user has add and edit permissions combined
                                            $can_add_edit = in_array('hbl_add,hbl_edit', $hbl_permissions);

                                            // Check if user has edit and delete permissions combined
                                            $can_edit_delete = in_array('hbl_edit,hbl_delete', $hbl_permissions);

                                            // Check if user has add,edit and delete permissions combined
                                            $can_add_edit_delete = in_array('hbl_add,hbl_edit,hbl_delete', $hbl_permissions);

                                            $access_denied = in_array('hbl_access_denied', $hbl_permissions);
                                        } else {
                                            // User is not logged in or doesn't have access rights, set all to false
                                            $can_add = false;
                                            $can_edit = false;
                                            $can_delete = false;
                                            $can_add_delete = false;
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <?php
                                                if (isset($_SESSION['is_admin'])) {
                                                ?>
                                                    <div aria-label="Status Buttons">
                                                        <a href="#" class="btn btn-outline btn-active-light-primary bg-body btn-active-icon-primary update-status" data-status="on-hold">
                                                            <i class="fad fa-pause fs-1"></i>
                                                            <span class="badge badge-light-primary">On Hold</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-dark update-status" data-status="tbl">
                                                            <i class="fad fa-people-carry fs-1"></i>
                                                            <span class="badge badge-light-secondary">TBL</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-success bg-body btn-active-icon-success update-status" data-status="loading">
                                                            <i class="fad fa-truck-loading fs-1"></i>
                                                            <span class="badge badge-light-success">Loading</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-info bg-body btn-active-icon-info update-status" data-status="shipped">
                                                            <i class="fad fa-ship fs-1"></i>
                                                            <span class="badge badge-light-info">Shipped</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-warning bg-body btn-active-icon-warning update-status" data-status="delivered">
                                                            <i class="fad fa-shipping-fast fs-1"></i>
                                                            <span class="badge badge-light-warning">Deliverd</span>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#fillter_modal"><i class="ki-duotone ki-filter-tick fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                                        <a href="#" class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" id="branch_bill"><i class="ki-duotone ki-printer fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i></a>


                                                        <script>
                                                            <?php if (!$access_denied) : ?>
                                                                // Check PHP variables and render button visibility using JavaScript
                                                                <?php if ($can_add || $can_add_delete || $can_add_edit || $can_add_edit_delete) : ?>
                                                                    document.write('<a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addHBLModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>');
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </script>

                                                        <button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>Export Report
                                                        </button>

                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if (isset($_SESSION['is_employee'])) {
                                                ?>
                                                    <div aria-label="Status Buttons">
                                                        <a href="#" class="btn btn-outline btn-active-light-primary bg-body btn-active-icon-primary update-status" data-status="on-hold-pending">
                                                            <i class="fad fa-pause fs-1"></i>
                                                            <span class="badge badge-light-primary">On Hold</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-dark update-status" data-status="tbl-pending">
                                                            <i class="fad fa-people-carry fs-1"></i>
                                                            <span class="badge badge-light-secondary">TBL</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-success bg-body btn-active-icon-success update-status" data-status="loading-pending">
                                                            <i class="fad fa-truck-loading fs-1"></i>
                                                            <span class="badge badge-light-success">Loading</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-info bg-body btn-active-icon-info update-status" data-status="shipped-pending">
                                                            <i class="fad fa-ship fs-1"></i>
                                                            <span class="badge badge-light-info">Shipped</span>
                                                        </a>

                                                        <a href="#" class="btn btn-outline btn-active-light-warning bg-body btn-active-icon-warning update-status" data-status="delivered-pending">
                                                            <i class="fad fa-shipping-fast fs-1"></i>
                                                            <span class="badge badge-light-warning">Deliverd</span>
                                                        </a>

                                                        <a href="#" class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#fillter_modal"><i class="ki-duotone ki-filter-tick fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                                        <a href="#" class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" id="branch_bill"><i class="ki-duotone ki-printer fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i></a>


                                                        <script>
                                                            <?php if (!$access_denied) : ?>
                                                                // Check PHP variables and render button visibility using JavaScript
                                                                <?php if ($can_add || $can_add_delete || $can_add_edit || $can_add_edit_delete) : ?>
                                                                    document.write('<a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addHBLModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>');
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </script>

                                                        <button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                            <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>Export Report
                                                        </button>

                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div id="kt_datatable_example_export_menu" data-kt-menu="true" class="
                                                menu 
                                                menu-sub 
                                                menu-sub-dropdown 
                                                menu-column 
                                                menu-rounded 
                                                menu-gray-600 
                                                menu-state-bg-light-primary 
                                                fw-semibold 
                                                fs-7 
                                                w-200px 
                                                py-4">

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="copy">
                                                    Copy to clipboard
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="excel">
                                                    Export as Excel
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="csv">
                                                    Export as CSV
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                                    Export as PDF
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <div id="kt_datatable_example_buttons" class="d-none"></div>






                                        <div class="modal bg-body fade" tabindex="-1" data-bs-focus="false" id="addHBLModal">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">HBL Add</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="hblAddForm">

                                                            <h5 class="modal-title my-10">HBL details</h5>
                                                            <!-- HBL Fields -->
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="CusReference">Cus Reference</label>
                                                                            <select class="form-control form-control-solid" id="cus_reference" name="cus_reference" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">select the customer</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Date">Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="date" name="date" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="BillNo">Bill No</label>
                                                                            <input type="text" class="form-control form-control-solid bill_no" id="bill_no" name="bill_no" required>
                                                                            <small id="bill_no_feedback" class="form-text"></small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="BillNo">Place of collection</label>
                                                                            <input type="text" class="form-control form-control-solid" id="location2" name="location2" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Sales Rep</label>
                                                                            <select class="form-control form-control-solid" id="sales_rep" name="sales_rep" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the employee</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Shipping</label>
                                                                            <select class="form-control form-control-solid" id="shipping" name="shipping" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the shipping</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Clearance</label>
                                                                            <select class="form-control form-control-solid" id="clearance" name="clearance" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the clearance</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Branch</label>
                                                                            <select class="form-control form-control-solid" id="agent_branch" name="agent_branch" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the branch</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="BillNo">Barnch Bill No</label>
                                                                            <input type="text" class="form-control form-control-solid bbill_no" id="bbill_no" name="bbill_no" required>
                                                                            <small id="bbill_no_feedback" class="form-text"></small>
                                                                        </div>
                                                                    </div>




                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Branch</label>
                                                                            <select class="form-control form-control-solid" id="company_branch" name="company_branch" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the branch</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>-->


                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Note">Note</label>
                                                                            <textarea class="form-control form-control-solid" id="note" name="note" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="HBLType">HBL Type</label>
                                                                            <input type="text" class="form-control form-control-solid" id="hbl_type" name="hbl_type" required>

                                                                        </div>
                                                                    </div>-->


                                                                </div>

                                                            </div>


                                                            <!--begin::Close-->
                                                            <div class="separator my-10"></div>
                                                            <h5 class="modal-title my-10">Sender details</h5>
                                                            <!--end::Close-->
                                                            <!-- Fields for editing Shipper -->
                                                            <div class="input-group input-group-sm mb-5">

                                                                <div class="row">

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperName">Shipper Name</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_name" name="shipper_name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperAddress">Shipper Address</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_address" name="shipper_address" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperMobile">Shipper Mobile</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_mobile" name="shipper_mobile" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperPPNIC">Shipper PP/NIC</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_ppnic" name="shipper_ppnic" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperCity">Shipper City</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_city" name="shipper_city" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperCountry">Shipper Country</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_country" name="shipper_country" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperEmail">Shipper Email</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipper_email" name="shipper_email" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--begin::Close-->

                                                            <div class="separator my-10"></div>
                                                            <h5 class="modal-title my-10">Reciver details</h5>

                                                            <!--end::Close-->
                                                            <!-- Fields for editing Consignee -->
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeName">Consignee Name</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_name" name="consignee_name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeAddress">Consignee Address</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_address" name="consignee_address" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeMobile">Consignee Mobile</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_mobile" name="consignee_mobile" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneePPNIC">Consignee PP/NIC</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_ppnic" name="consignee_ppnic" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeCity">Consignee City</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_city" name="consignee_city" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeCountry">Consignee Country</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_country" name="consignee_country" value="Sri Lanka" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">District</label>
                                                                            <select class="form-control form-control-solid" id="district" name="district" data-control="select2" data-dropdown-parent="#addHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeEmail">Consignee Email</label>
                                                                            <input type="text" class="form-control form-control-solid" id="consignee_email" name="consignee_email" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- HBL Details Table -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Description</th>
                                                                                    <th>CBM</th>
                                                                                    <th>Weight</th>
                                                                                    <th>QTY</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Commission</th>
                                                                                    <th><a href="#" class="btn btn-icon btn-primary" id="addRow1"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="editableTableBody1">
                                                                                <!-- Rows will be added dynamically here -->
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Total CBM: <span id="totalCBM1" class="total-underline">0.00</span></th>
                                                                                    <th>Total Weight: <span id="totalWeight1" class="total-underline">0.00</span></th>
                                                                                    <th>Total QTY: <span id="totalQTY1" class="total-underline">0.00</span></th>
                                                                                    <th>Total Amount: <span id="totalAmount1" class="total-underline">0.00</span></th>
                                                                                    <th>Total Commission: <span id="totalCommission1" class="total-underline">0.00</span></th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Description</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Commission</th>
                                                                                    <th><a href="#" class="btn btn-icon btn-primary" id="addRow2"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="editableTableBody2">
                                                                                <!-- Rows will be added dynamically here -->
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Total Amount: <span id="totalAmount2" class="total-underline">0.00</span></th>
                                                                                    <th>Total Commission: <span id="totalCommission2" class="total-underline">0.00</span></th>
                                                                                </tr>

                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="separator my-10"></div>
                                                            <h5 class="modal-title my-10">Payment details</h5>


                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Amount">Amount</label>
                                                                            <input type="text" class="form-control form-control-solid" id="mamount" name="mamount" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Discount">Discount</label>
                                                                            <input type="text" class="form-control form-control-solid" id="discount" name="discount" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Blance">Balance</label>
                                                                            <input type="text" class="form-control form-control-solid" id="balance" name="balance" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveHBL">
                                                            <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Save changes
                                                        </a>
                                                        <a href="#" class="btn btn-active-icon-dark btn-text-dark" data-bs-dismiss="modal">
                                                            <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Close
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" data-bs-focus="false" id="editHBLModal">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">HBL Edit</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="editHBLForm">

                                                            <h5 class="modal-title my-10">HBL details</h5>

                                                            <!-- Fields for editing HBL details -->
                                                            <input type="hidden" id="hbl_id" name="hbl_id">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="CusReference">Cus Reference</label>
                                                                            <select class="form-control form-control-solid" id="ecus_reference" name="ecus_reference" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Date">Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="edate" name="edate" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="BillNo">Bill No</label>
                                                                            <input type="text" class="form-control form-control-solid ebill_no" id="ebill_no" name="ebill_no" required>
                                                                            <small id="ebill_no_feedback" class="form-text"></small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="BillNo">Place of collection</label>
                                                                            <input type="text" class="form-control form-control-solid" id="elocation2" name="elocation2" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Sales Rep</label>
                                                                            <select class="form-control form-control-solid" id="esales_rep" name="esales_rep" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="CusReference">Shipping</label>
                                                                            <select class="form-control form-control-solid" id="eshipping" name="eshipping" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="CusReference">Clearance</label>
                                                                            <select class="form-control form-control-solid" id="eclearance" name="eclearance" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Branch</label>
                                                                            <select class="form-control form-control-solid" id="eagent_branch" name="eagent_branch" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="BillNo">Barnch Bill No</label>
                                                                            <input type="text" class="form-control form-control-solid ebbill_no" id="ebbill_no" name="ebbill_no" required>
                                                                            <small id="ebbill_no_feedback" class="form-text"></small>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="Note">Note</label>
                                                                            <input type="text" class="form-control form-control-solid" id="enote" name="enote" required>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="HBLType">HBL Type</label>
                                                                            <input type="text" class="form-control form-control-solid" id="ehbl_type" name="ehbl_type" required>
                                                                        </div>
                                                                    </div>-->
                                                                </div>
                                                            </div>


                                                            <!--begin::Close-->
                                                            <div class="separator my-10"></div>
                                                            <h5 class="modal-title my-10">Sender details</h5>

                                                            <!--end::Close-->
                                                            <!-- Fields for editing Shipper -->
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperName">Shipper Name</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_name" name="eshipper_name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperAddress">Shipper Address</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_address" name="eshipper_address" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperMobile">Shipper Mobile</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_mobile" name="eshipper_mobile" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperPPNIC">Shipper PP/NIC</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_ppnic" name="eshipper_ppnic" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperCity">Shipper City</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_city" name="eshipper_city" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperCountry">Shipper Country</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_country" name="eshipper_country" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ShipperEmail">Shipper Email</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipper_email" name="eshipper_email" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--begin::Close-->

                                                            <div class="separator my-10"></div>
                                                            <h5 class="modal-title my-10">Reciver details</h5>
                                                            <!--end::Close-->
                                                            <!-- Fields for editing Consignee -->
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeName">Consignee Name</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_name" name="econsignee_name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeAddress">Consignee Address</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_address" name="econsignee_address" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeMobile">Consignee Mobile</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_mobile" name="econsignee_mobile" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneePPNIC">Consignee PP/NIC</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_ppnic" name="econsignee_ppnic" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeCity">Consignee City</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_city" name="econsignee_city" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeCountry">Consignee Country</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_country" name="econsignee_country" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">District</label>
                                                                            <select class="form-control form-control-solid" id="edistrict" name="edistrict" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="ConsigneeEmail">Consignee Email</label>
                                                                            <input type="text" class="form-control form-control-solid" id="econsignee_email" name="econsignee_email" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Fields for editing HBL Details -->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Description</th>
                                                                                    <th>CBM</th>
                                                                                    <th>Weight</th>
                                                                                    <th>QTY</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Commission</th>
                                                                                    <th><a href="#" class="btn btn-icon btn-primary" id="eaddRow1"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="eeditableTableBody1">
                                                                                <!-- Rows will be added dynamically here -->
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th>Total CBM: <span id="totalECBM1" class="total-underline">0.00</span></th>
                                                                                    <th>Total Weight: <span id="totalEWeight1" class="total-underline">0.00</span></th>
                                                                                    <th>Total QTY: <span id="totalEQTY1" class="total-underline">0.00</span></th>
                                                                                    <th>Total Amount: <span id="totalEAmount1" class="total-underline">0.00</span></th>
                                                                                    <th>Total Commission: <span id="totalECommission1" class="total-underline">0.00</span></th>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Description</th>
                                                                                    <th>Amount</th>
                                                                                    <th>Commission</th>
                                                                                    <th><a href="#" class="btn btn-icon btn-primary" id="eaddRow2"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="eeditableTableBody2">
                                                                                <!-- Rows will be added dynamically here -->
                                                                            </tbody>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th></th>
                                                                                    <th>Total Amount: <span id="totalEAmount2" class="total-underline">0.00</span></th>
                                                                                    <th>Total Commission: <span id="totalECommission2" class="total-underline">0.00</span></th>
                                                                                </tr>

                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="separator my-10"></div>
                                                            <h5 class="modal-title my-10">Payment details</h5>
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Amount">Amount</label>
                                                                            <input type="text" class="form-control form-control-solid" id="emamount" name="emamount" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Discount">Discount</label>
                                                                            <input type="text" class="form-control form-control-solid" id="ediscount" name="ediscount" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Blance">Balance</label>
                                                                            <input type="text" class="form-control form-control-solid" id="ebalance" name="ebalance" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateHBL">
                                                            <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Save changes
                                                        </a>
                                                        <a href="#" class="btn btn-active-icon-dark btn-text-dark" data-bs-dismiss="modal">
                                                            <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Close
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" id="viewModal" data-bs-focus="false">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Shipping details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="shippingDetailsAddForm">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="shippingDate">Shipping Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipping_date" name="shipping_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Agent">Agent</label>
                                                                            <select class="form-control form-control-solid" id="agent" name="agent" data-control="select2" data-dropdown-parent="#viewModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the agent</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>-->

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Agent">Delivery agent</label>
                                                                            <select class="form-control form-control-solid" id="delivery_agent_branch" name="delivery_agent_branch" data-control="select2" data-dropdown-parent="#viewModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the agent</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Location">Location</label>
                                                                            <select class="form-control form-control-solid" id="location" name="location" data-control="select2" data-dropdown-parent="#viewModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>-->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Location">Location</label>
                                                                            <select class="form-control form-control-solid" id="dab_location" name="dab_location" data-control="select2" data-dropdown-parent="#viewModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Shipping By</label>
                                                                            <select class="form-control form-control-solid" id="shipping_by" name="shipping_by" data-control="select2" data-dropdown-parent="#viewModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="shippingType">Shipping Type</label>
                                                                            <select class="form-control form-control-solid" id="shipping_type" name="shipping_type" data-control="select2" data-dropdown-parent="#viewModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the shipping type</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="shippingNo">Shipping No</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipping_no" name="shipping_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="fileNo">File No</label>
                                                                            <input type="text" class="form-control form-control-solid" id="file_no" name="file_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="feetWeight">Feet/Weight</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="feet_weight" name="feet_weight" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="freightCharge">Freight Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="freight_charge" name="freight_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="clearanceCharge">Clearance Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="clearance_charge" name="clearance_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="bookingCharge">Booking Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="booking_charge" name="booking_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="loadingCharge">Loading Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="loading_charge" name="loading_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="seal">Seal</label>
                                                                            <input type="text" class="form-control form-control-solid" id="seal" name="seal" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="estimatedDate">Estimated Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="estimated_date" name="estimated_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="deliveredDate">Delivered Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="delivered_date" name="delivered_date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="shippingDescription">Shipping Description</label>
                                                                            <textarea class="form-control form-control-solid" id="shipping_description" name="shipping_description" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="confirmUpdate">
                                                                    <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                    Save changes
                                                                </a>
                                                                <a href="#" class="btn btn-active-icon-dark btn-text-dark" data-bs-dismiss="modal">
                                                                    <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                    Close
                                                                </a>
                                                            </div>
                                                        </form>
                                                        <div id="selectedRowData"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" tabindex="-1" id="view2Modal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Shipping details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="loadingAddForm">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div id="selectedRowData2"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="confirmUpdate2">
                                                                    <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                    Save changes
                                                                </a>
                                                                <a href="#" class="btn btn-active-icon-dark btn-text-dark" data-bs-dismiss="modal">
                                                                    <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                    Close
                                                                </a>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" id="viewHBLModal">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Shipping details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>



                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs justify-content-end">
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                            <li class="nav-item"><a id="generate-pdf" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-2" class="nav-link"><i class="fad fa-eye fa-2x"></i></a></li>
                                                        </ul>
                                                        <div class="tab-content"><br>
                                                            <div id="tab-1" class="tab-pane active">
                                                                <div id="pdf-table">
                                                                    <div class="tm_invoice tm_style1" id="tm_download_section">
                                                                        <div class="tm_invoice_in">
                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="col-6 text-start align-top">
                                                                                        <img class="img-fluid mb-2" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" alt="Company Logo" style="max-width: 80px;">

                                                                                    </div>
                                                                                    <div class="col-6 text-end align-top company-details">
                                                                                        <small style="line-height: 2; margin: 0; padding: 0; font-size: 10px;"><?php echo isset($_SESSION['c_name']) && $_SESSION['c_name'] ? $_SESSION['c_name'] : 'default'; ?></small>
                                                                                        <small style="line-height: 2; margin: 0; padding: 0; font-size: 10px;"><?php echo isset($_SESSION['c_address']) && $_SESSION['c_address'] ? $_SESSION['c_address'] : 'default'; ?></small>
                                                                                        <small style="line-height: 2; margin: 0; padding: 0; font-size: 10px;"><?php echo isset($_SESSION['c_email']) && $_SESSION['c_email'] ? $_SESSION['c_email'] : 'default'; ?></small>
                                                                                        <small style="line-height: 2; margin: 0; padding: 0; font-size: 10px;">TP: <?php echo isset($_SESSION['c_phone']) && $_SESSION['c_phone'] ? $_SESSION['c_phone'] : 'default'; ?></small>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>

                                                                            <div class="tm_invoice_info tm_mb10">
                                                                                <div class="tm_invoice_seperator tm_gray_bg" style="min-height: 10px !important;"></div>
                                                                                <div class="tm_invoice_info_list">
                                                                                    <p class="tm_invoice_number tm_m0" style="font-size: 10px;">HBL No: <b>#</b><b class="tm_primary_color" id="vcode"></b></p>
                                                                                    <p class="tm_invoice_number tm_m0" style="font-size: 10px;">HBL Bill No: <b>#</b><b class="tm_primary_color" id="vbill_no"></b></p>
                                                                                    <p class="tm_invoice_date tm_m0" style="font-size: 10px;">Date: <b class="tm_primary_color" id="vdate">01.07.2022</b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tm_invoice_head tm_mb5">
                                                                                <table style="width: 100%; font-size: 10px; line-height: 2; margin: 0; padding: 0;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="width:35%;vertical-align: top; line-height: 2; margin: 0; padding: 0;">
                                                                                                <table style="width: 100%" class="mb-2">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="vertical-align: top;text-align: left;line-height: 2; margin: 0; padding: 0;" colspan="3"><b>SHIPPER'S DETAIL</b></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;vertical-align: top;line-height: 2; margin: 0; padding: 0;"><b>NAME</b></td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_name"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;vertical-align: top;line-height: 2; margin: 0; padding: 0;"><b>ADDRESS</b></td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;"> : </td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_address" style="text-transform:uppercase !important;">,<label style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_city"></label>,<label style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_country"></label></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>MOBILE</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_mobile"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>NIC / PASSPORT</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_pp_nic"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>BRANCH</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vabranchcity"></td>
                                                                                                        </tr>

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td style="width:35%;vertical-align: top; line-height: 2; margin: 0; padding: 0;">
                                                                                                <table style="width: 100%" class="mb-2">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="vertical-align: top;text-align: left;line-height: 2; margin: 0; padding: 0;" colspan="3"><b>CONSIGNEE'S DETAIL</b></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;vertical-align: top;line-height: 2; margin: 0; padding: 0;"><b>NAME</b></td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vconsignee_name"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;vertical-align: top;line-height: 2; margin: 0; padding: 0;"><b>ADDRESS</b></td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vconsignee_address" style="text-transform:uppercase !important;">,<br> .</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>MOBILE</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vconsignee_mobile"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>NIC / PASSPORT</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vconsignee_ppnic"></td>
                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>BALANCE</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vbalance2"></td>
                                                                                                        </tr>

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td style="width:30%;vertical-align: top; line-height: 2; margin: 0; padding: 0;">
                                                                                                <table style="width: 100%" class="mb-2">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="width: 130px;line-height: 2; margin: 0; padding: 0;"><b>EMPLOYEE</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vemp_name"></td>
                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td style="width: 130px;line-height: 2; margin: 0; padding: 0;"><b>SHIPPING</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipping"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 130px; line-height: 2; margin: 0; padding: 0;"><b>CLEARANCE</b></td>
                                                                                                            <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vclearance"></td>
                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>Place of issue</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vshipper_city"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px;line-height: 2; margin: 0; padding: 0;"><b>Place of delivery</b></td>
                                                                                                            <td style="width: 10px;line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 10px;vertical-align: top;line-height: 2; margin: 0; padding: 0;" id="vddistrict"></td>
                                                                                                        </tr>


                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <table style="width: 100%; font-size:10px;" class="rounded-3">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="width:100%;vertical-align: top;">
                                                                                            <table style="width: 100%; border-width: 1px; border-color: black;" class="table table-bordered rounded-sm table-sm table_d">
                                                                                                <thead class="table-light" style="border-width: 1px; border-color: black;">
                                                                                                    <tr>
                                                                                                        <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                                        <td style="width:80px;font-weight: bold;" class="text-center">CBM</td>
                                                                                                        <td style="width:80px;font-weight: bold;" class="text-center">WEIGHT</td>
                                                                                                        <td style="width:80px;font-weight: bold;" class="text-center">QTY </td>
                                                                                                        <td style="width:90px;font-weight: bold;" class="text-center">AMOUNT</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="veditableTableBody1">
                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td class="text-right"><b>TOTAL [ SAR ]</b></td>
                                                                                                        <td id="cbmTotalFooter" class="text-end total"><b></b></td>
                                                                                                        <td id="weightTotalFooter" class="text-end total"><b></b></td>
                                                                                                        <td id="qtyTotalFooter" class="text-end total"><b></b> </td>
                                                                                                        <td id="amountTotalFooter" class="text-end total"><b></b></td>
                                                                                                    </tr>
                                                                                                </tfoot>

                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="width:100%;vertical-align: top;">
                                                                                            <table style="width: 100%; border-width: 1px; border-color: black;" class="table table-bordered rounded-sm table-sm table_d">
                                                                                                <thead class="table-light" style="border-width: 1px; border-color: black;">
                                                                                                    <tr class="selected_table_row">
                                                                                                        <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                                        <td style="width:90px;font-weight: bold;" class="text-center">AMOUNT</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="veditableTableBody2">

                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td class="text-start"><b>NET TOTAL [ SAR ] </b></td>
                                                                                                        <td id="netTotalFooter" class="text-end total"><b> 24,700.00</b></td>
                                                                                                    </tr>
                                                                                                </tfoot>

                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>


                                                                                </tbody>
                                                                            </table>
                                                                            <table style="width: 100%; font-size: 10px; line-height: 2; margin: 0; padding: 0; border-width: 1px; border-color: black;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="width:100%;vertical-align: top;">
                                                                                            <table style="width: 100%; border-width: 1px; border-color: black;" class="table table-bordered table-sm table_d">
                                                                                                <thead>
                                                                                                    <tr class="selected_table_row">
                                                                                                        <td style="font-weight: bold;">#</td>
                                                                                                        <td style="width:90px;font-weight: bold;"></td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="hbleditableTableBody2">

                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td class="text-left"><b>HBL TOTAL</b></td>
                                                                                                        <td id="hblamount" class="text-end total"><b> 24,700.00</b></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="text-right"><b>NET BAL </b></td>
                                                                                                        <td id="vbalance" class="text-end total"><b> 24,700.00</b></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="text-right"><b>DISCOUNT</b></td>
                                                                                                        <td id="vdiscount" class="text-end total"><b> 24,700.00</b></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="text-right"><b>NET TOTAL </b></td>
                                                                                                        <td id="hblamount2" class="text-end total"><b> 24,700.00</b></td>
                                                                                                    </tr>
                                                                                                </tfoot>

                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <div class="tm_padd_15_20 tm_round_border" id="terms-conditions-section" style="bottom: 0; font-size:9px;">
                                                                                <input type="checkbox" id="includeTerms" checked>
                                                                                <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
                                                                                <div><?php echo isset($_SESSION['trm_condi']) && $_SESSION['trm_condi'] ? $_SESSION['trm_condi'] : 'default'; ?></div>
                                                                            </div><!-- .tm_note -->
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div id="tab-2" class="tab-pane">
                                                                <div id="pdf-container"></div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" id="viewHBLModal2">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Shipping details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>



                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs justify-content-end">
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                            <li class="nav-item"><a id="generate-pdfd" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                        </ul>
                                                        <div class="tab-content"><br>
                                                            <div id="tab-1" class="tab-pane active">


                                                                <div id="pdf-table2">
                                                                    <div class="tm_invoice tm_style1" id="tm_download_section">
                                                                        <div class="tm_invoice_in">
                                                                            <div class="tm_invoice_head tm_align_center tm_mb20">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-3 text-left align-top">
                                                                                        </div>
                                                                                        <div class="col-6 text-center align-top">
                                                                                            <img class="img-fluid mb-2" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" alt="Company Logo" style="max-width: 100px;">

                                                                                        </div>
                                                                                        <div class="col-3 text-right align-top company-details">
                                                                                            <small style="line-height: 2; margin: 0; padding: 0;">SYSTEM CODE: <label id="vvcode"></label></small>
                                                                                            <small style="line-height: 2; margin: 0; padding: 0;">BILL NO: <label id="vvbill_no"></label></small>
                                                                                            <small style="line-height: 2; margin: 0; padding: 0;">CARGO : <label id="vvshipping"></label></small>
                                                                                            <small style="line-height: 2; margin: 0; padding: 0;">CLEARANCE : <label id="vvclearance"></label></small>
                                                                                            <small style="line-height: 2; margin: 0; padding: 0;">PALCE OF ISSUE : <label id="vvshipper_country"></label></small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div class="tm_invoice_info tm_mb20">
                                                                                <div class="tm_invoice_seperator tm_gray_bg"></div>
                                                                                <div class="tm_invoice_info_list">
                                                                                    <p class="tm_invoice_number tm_m0">HBL No: <b>#</b><b class="tm_primary_color" id="vvcode2"></b></p>
                                                                                    <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color" id="vvdate2">01.07.2022</b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tm_invoice_head tm_mb10">
                                                                                <table style="width: 100%; font-size:10px; line-height: 1.2; margin: 0; padding: 0;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="width:35%;vertical-align: top;">
                                                                                                <table style="width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="vertical-align: top;text-align: left; line-height: 2; margin: 0; padding: 0;" colspan="3"><b>SHIPPER'S DETAIL</b></td>
                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;"><b>ADDRESS</b></td>
                                                                                                            <td style="width: 10px;vertical-align: top; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvshipper_address" style="text-transform:uppercase !important;">,<label id="vvshipper_city"></label>,<label id="vshipper_country"></label></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>MOBILE</b></td>
                                                                                                            <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvshipper_mobile"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>NIC / PASSPORT</b></td>
                                                                                                            <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvshipper_pp_nic"></td>
                                                                                                        </tr>

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td style="width:35%;vertical-align: top;">
                                                                                                <table style="width: 100%">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="vertical-align: top;text-align: left; line-height: 2; margin: 0; padding: 0;" colspan="3"><b>CONSIGNEE'S DETAIL</b></td>
                                                                                                        </tr>

                                                                                                        <tr>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;"><b>ADDRESS</b></td>
                                                                                                            <td style="width: 10px;vertical-align: top; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvconsignee_address" style="text-transform:uppercase !important;">,<label id="vvconsignee_city"></label>,<label id="vvconsignee_country"></label></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>MOBILE</b></td>
                                                                                                            <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvconsignee_mobile"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>NIC / PASSPORT</b></td>
                                                                                                            <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                                                                            <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvconsignee_ppnic"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                            <table style="width: 100%;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="width:1000%;vertical-align: top; line-height: 2; margin: 0; padding: 0;">
                                                                                            <table style="width: 100%;" class="table table-bordered table-sm table_d">
                                                                                                <thead class="table-light">
                                                                                                    <tr>
                                                                                                        <td style="width:15px;font-weight: bold; line-height: 2; margin: 0; padding: 0;">#</td>
                                                                                                        <td style="font-weight: bold; line-height: 2; margin: 0; padding: 0;">DESCRIPTION</td>
                                                                                                        <td style="width:80px;font-weight: bold; line-height: 2; margin: 0; padding: 0;" class="text-right">CBM</td>
                                                                                                        <td style="width:80px;font-weight: bold; line-height: 2; margin: 0; padding: 0;" class="text-right">WEIGHT</td>
                                                                                                        <td style="width:80px;font-weight: bold; line-height: 2; margin: 0; padding: 0;" class="text-right">QTY </td>
                                                                                                        <td style="width:100px;font-weight: bold; line-height: 2; margin: 0; padding: 0;" class="text-right">AMOUNT</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="vveditableTableBody1">
                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td class="text-right line-height: 2; margin: 0; padding: 0;" colspan="2"><b>TOTAL [ SAR ]</b></td>
                                                                                                        <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvcbmTotalFooter" class="text-right total"><b></b></td>
                                                                                                        <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvweightTotalFooter" class="text-right total"><b></b></td>
                                                                                                        <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvqtyTotalFooter" class="text-right total"><b></b> </td>
                                                                                                        <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvamountTotalFooter" class="text-right total"><b></b></td>
                                                                                                    </tr>
                                                                                                </tfoot>

                                                                                            </table>
                                                                                        </td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <div class="tm_padd_15_20 tm_round_border" id="terms-conditions-section2" style="bottom: 0; font-size:9px;">
                                                                                <input type="checkbox" id="includeTerms2" checked>
                                                                                <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
                                                                                <div><?php echo isset($_SESSION['trm_condi']) && $_SESSION['trm_condi'] ? $_SESSION['trm_condi'] : 'default'; ?></div>
                                                                            </div><!-- .tm_note -->
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" id="viewHBLBranchModal">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Shipping details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>



                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs justify-content-end">
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                            <li class="nav-item"><a id="generate-pdf3" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                        </ul>
                                                        <div class="tab-content"><br>
                                                            <div id="tab-1" class="tab-pane active">
                                                                <div id="branch-bill-table">
                                                                    <div class="panel-body" id="tab_print_page">
                                                                        <pageheader name="page_header" content-right="HBL - CMC/AIR/DTD000060" header-style="font-weight:bold;color:#000000;" line="on"></pageheader>
                                                                        <setpageheader name="page_header" value="on" show-this-page="1"></setpageheader>
                                                                        <div class="table-responsive animated zoomIn m-t">
                                                                            <table style="width: 100%;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="width:33%;vertical-align: top;">
                                                                                            <h4>
                                                                                                <br><small><label id="c_branch_name"></label></small>
                                                                                                <br><small><label id="c_branch_location"></label></small>
                                                                                                <br>
                                                                                                <small<label id="c_branch_email"></label></small>
                                                                                                    <br>
                                                                                                    <small<label id="c_branch_contact"></label></small>
                                                                                            </h4>
                                                                                        </td>
                                                                                        <td style="width:30%;vertical-align: top;">
                                                                                            <center>
                                                                                                <img class="print_company_logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" height="100px">

                                                                                                <br>HOUSE BILL OF LADING
                                                                                            </center>
                                                                                        </td>
                                                                                        <td style="width:38%;text-align: right;vertical-align: top;">
                                                                                            <h4>
                                                                                                <?php echo isset($_SESSION['c_name']) && $_SESSION['c_name'] ? $_SESSION['c_name'] : 'default'; ?>
                                                                                                <br><small><?php echo isset($_SESSION['c_address']) && $_SESSION['c_address'] ? $_SESSION['c_address'] : 'default'; ?></small>
                                                                                                <br><small><?php echo isset($_SESSION['c_email']) && $_SESSION['c_email'] ? $_SESSION['c_email'] : 'default'; ?></small>
                                                                                                <br><small>TP : <?php echo isset($_SESSION['c_phone']) && $_SESSION['c_phone'] ? $_SESSION['c_phone'] : 'default'; ?></small>

                                                                                            </h4>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <hr>

                                                                            <table style="width: 100%;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="width:100%;vertical-align: top;">
                                                                                            <table style="width: 100%;" class="table table-bordered table-sm table_d">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <td style="width:15px;font-weight: bold;">#</td>
                                                                                                        <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                                        <td style="width:80px;font-weight: bold;" class="text-right">CBM</td>
                                                                                                        <td style="width:80px;font-weight: bold;" class="text-right">WEIGHT</td>
                                                                                                        <td style="width:80px;font-weight: bold;" class="text-right">QTY </td>
                                                                                                        <td style="width:100px;font-weight: bold;" class="text-right">AMOUNT</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="beditableTableBody1">
                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td class="text-right" colspan="2"><b>TOTAL [ SAR ]</b></td>
                                                                                                        <td id="bcbmTotalFooter" class="text-right total"><b></b></td>
                                                                                                        <td id="bweightTotalFooter" class="text-right total"><b></b></td>
                                                                                                        <td id="bqtyTotalFooter" class="text-right total"><b></b> </td>
                                                                                                        <td id="bamountTotalFooter" class="text-right total"><b></b></td>
                                                                                                    </tr>
                                                                                                </tfoot>

                                                                                            </table>
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="width:100%;vertical-align: top;">
                                                                                            <table style="width: 100%;" class="table table-bordered table-sm table_d">
                                                                                                <thead>
                                                                                                    <tr class="selected_table_row">
                                                                                                        <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                                        <td style="width:90px;font-weight: bold;" class="text-right">AMOUNT</td>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="beditableTableBody2">

                                                                                                </tbody>
                                                                                                <tfoot>
                                                                                                    <tr>
                                                                                                        <td class="text-right"><b>NET TOTAL [ SAR ] </b></td>
                                                                                                        <td id="bnetTotalFooter" class="text-right total"><b> 24,700.00</b></td>
                                                                                                    </tr>
                                                                                                </tfoot>

                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>



                                                                        <pagefooter name="page_footer" content-left="Print By ADMIN on {DATE jS \of M Y h:i A}" content-right="{PAGENO} / {nbpg}." footer-style="font-family:serif;font-size:7pt;font-weight:bold;color:#000000;" line="on"></pagefooter>
                                                                        <setpagefooter name="page_footer" value="on"></setpagefooter>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="modal fade" tabindex="-1" id="fillter_modal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Fillter</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="filter_form">
                                                            <!-- Consignee Fields -->
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row g-10">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Shipping</label>
                                                                            <select class="form-control form-control-solid" id="sshipping" name="sshipping" data-control="select2" data-dropdown-parent="#fillter_modal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Clearance</label>
                                                                            <select class="form-control form-control-solid" id="sclearance" name="sclearance" data-control="select2" data-dropdown-parent="#fillter_modal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="Amount">HBL status</label>
                                                                            <select class="form-control form-control-solid me-3" name="sstatus" id="sstatus">
                                                                                <option value="">choose</option>
                                                                                <option value="default">default</option>
                                                                                <option value="on-hold">on-hold</option>
                                                                                <option value="tbl">tbl</option>
                                                                                <option value="loading">loading</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="Amount">Date</label>
                                                                        <div class="form-group">
                                                                            <input type="date" class="form-control form-control-solid" name="sdate" id="sdate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Branch</label>
                                                                            <select class="form-control form-control-solid" id="sagent_branch" name="sagent_branch" data-control="select2" data-dropdown-parent="#fillter_modal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Employee</label>
                                                                            <select class="form-control form-control-solid" id="ssales_rep" name="ssales_rep" data-control="select2" data-dropdown-parent="#fillter_modal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" id="filter_button">Fillter</button>
                                                            </div>
                                                        </form>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" id="viewloadingModal">
                                            <div class="modal-dialog modal-fullscreen">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Shipping & container details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>



                                                    <div class="modal-body">
                                                        <ul class="nav nav-tabs justify-content-end">
                                                            <li class="nav-item">
                                                                <a data-bs-toggle="tab" href="#tab-1" class="nav-link active">
                                                                    <i class="fad fa-file-alt fa-2x"></i>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a id="generate-pdf2" target="_blank" class="nav-link" href="#">
                                                                    <i class="fad fa-download fa-2x"></i>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a data-bs-toggle="tab" href="#tab-3" class="nav-link">
                                                                    <i class="fad fa-eye fa-2x"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <br>
                                                            <div id="tab-1" class="tab-pane fade show active">
                                                                <div id="pdf-table-loading">
                                                                    <div class="table-responsive animated zoomIn m-t">
                                                                        <br>
                                                                        <table style="width: 100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="col-md-4 text-start align-top">
                                                                                        <h6>
                                                                                            <?php echo isset($_SESSION['c_name']) && $_SESSION['c_name'] ? $_SESSION['c_name'] : 'default'; ?>
                                                                                            <br><?php echo isset($_SESSION['c_address']) && $_SESSION['c_address'] ? $_SESSION['c_address'] : 'default'; ?>
                                                                                            <br><?php echo isset($_SESSION['c_email']) && $_SESSION['c_email'] ? $_SESSION['c_email'] : 'default'; ?>
                                                                                            <br>TP: <?php echo isset($_SESSION['c_phone']) && $_SESSION['c_phone'] ? $_SESSION['c_phone'] : 'default'; ?>
                                                                                        </h6>
                                                                                    </td>
                                                                                    <td class="col-md-4 text-center align-top">
                                                                                        <img class="img-fluid mb-2" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" alt="Company Logo" style="max-width: 80px;">
                                                                                    </td>
                                                                                    <td class="col-md-4 text-end align-top">
                                                                                        <h6>
                                                                                            <p style="line-height: 0.5; margin: 0; padding: 0; font-size: 10px;">DATE: ......................</p>
                                                                                            <br>
                                                                                            <p style="line-height: 0.5; margin: 0; padding: 0; font-size: 10px;">CONTAINER #: ...............</p>
                                                                                            <br>
                                                                                            <p style="line-height: 0.5; margin: 0; padding: 0; font-size: 10px;">FEET: ......................</p>
                                                                                            <br>
                                                                                            <p style="line-height: 0.5; margin: 0; padding: 0; font-size: 10px;">FILE #: ....................</p>
                                                                                        </h6>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table style="width: 100%;overflow: wrap;" class="table table-bordered table-sm table_d">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width:25px;font-size:11px !important;">#</th>
                                                                                    <th style="width:80px;font-size:11px !important;">HBL</th>
                                                                                    <th style="width:180px;font-size:11px !important;">SHIPPER</th>
                                                                                    <th style="width:180px;font-size:11px !important;">CONSIGNEE</th>
                                                                                    <th style="width:120px;font-size:11px !important;">DESCRIPTION</th>
                                                                                    <th style="width:60px;font-size:11px !important;">CBM</th>
                                                                                    <th style="width:65px;font-size:11px !important;">WEIGHT</th>
                                                                                    <th style="width:40px;font-size:11px !important;">QTY</th>
                                                                                    <th style="width:110px;font-size:11px !important;">DEST.UPB</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="veditableTableBody_loading"></tbody>
                                                                            <tfoot></tfoot>
                                                                        </table>
                                                                        <table style="width:70%;" class="table table-bordered table-sm table_d" align="right" id="warehouseInfoTable_loading">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align:center;font-size:11px!important;">WAREHOUSE INFO LOCATIONS</th>
                                                                                    <th style="text-align:center;font-size:11px!important;">CBM</th>
                                                                                    <th style="text-align:center;font-size:11px!important;">WEIGHT</th>
                                                                                    <th style="text-align:center;font-size:11px!important;">QTY</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody></tbody>
                                                                            <tfoot></tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="tab-3" class="tab-pane fade">
                                                                <div id="pdf-loading-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" tabindex="-1" id="viewSCModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">HBL, Sender & Reciver details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="loadingAddForm">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <h5 class="modal-title">HBL details</h5>
                                                                <div class="separator my-10"></div>
                                                                <!-- Fields for editing Shipper -->
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_name">Date : </label>
                                                                                <span id="shdate" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_address">Bill No : </label>
                                                                                <span id="sbill_no" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_mobile">HBL Code : </label>
                                                                                <span id="scode" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_ppnic">Shipping : </label>
                                                                                <span id="sshipping" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_city">Clearance : </label>
                                                                                <span id="sclearance" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_country">District : </label>
                                                                                <span id="sdistrict" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_email">Employee : </label>
                                                                                <span id="semployee" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_email">Customer : </label>
                                                                                <span id="scustomer_ref" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_email">Amount : </label>
                                                                                <span id="sh_amount" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_email">Balance : </label>
                                                                                <span id="sbalance" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h5 class="modal-title">Sender details</h5>
                                                                <div class="separator my-10"></div>
                                                                <!-- Fields for editing Shipper -->
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_name">Shipper Name : </label>
                                                                                <span id="sshipper_name" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_address">Shipper Address : </label>
                                                                                <span id="sshipper_address" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_mobile">Shipper Mobile : </label>
                                                                                <span id="sshipper_mobile" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_ppnic">Shipper PP/NIC : </label>
                                                                                <span id="sshipper_ppnic" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_city">Shipper City : </label>
                                                                                <span id="sshipper_city" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_country">Shipper Country : </label>
                                                                                <span id="sshipper_country" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_email">Shipper Email : </label>
                                                                                <span id="sshipper_email" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h5 class="modal-title">Receiver details</h5>
                                                                <div class="separator my-10"></div>
                                                                <!-- Fields for editing Consignee -->
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_name">Consignee Name : </label>
                                                                                <span id="sconsignee_name" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_address">Consignee Address : </label>
                                                                                <span id="sconsignee_address" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_mobile">Consignee Mobile : </label>
                                                                                <span id="sconsignee_mobile" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_ppnic">Consignee PP/NIC : </label>
                                                                                <span id="sconsignee_ppnic" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_city">Consignee City : </label>
                                                                                <span id="sconsignee_city" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_country">Consignee Country : </label>
                                                                                <span id="sconsignee_country" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_email">Consignee Email : </label>
                                                                                <span id="sconsignee_email" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <table style="width: 100%; font-size:10px;" class="rounded-3">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:100%;vertical-align: top;">
                                                                        <table style="width: 100%;" class="table table-bordered rounded-sm table-sm table_d">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                    <td style="width:80px;font-weight: bold;" class="text-right">CBM</td>
                                                                                    <td style="width:80px;font-weight: bold;" class="text-right">WEIGHT</td>
                                                                                    <td style="width:80px;font-weight: bold;" class="text-right">QTY </td>
                                                                                    <td style="width:100px;font-weight: bold;" class="text-right">AMOUNT</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="seditableTableBody1">
                                                                            </tbody>


                                                                        </table>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td style="width:100%;vertical-align: top;">
                                                                        <table style="width: 100%;" class="table table-bordered rounded-sm table-sm table_d">
                                                                            <thead class="table-light">
                                                                                <tr class="selected_table_row">
                                                                                    <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                    <td style="width:90px;font-weight: bold;" class="text-right">AMOUNT</td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="seditableTableBody2">

                                                                            </tbody>


                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-active-icon-dark btn-text-dark" data-bs-dismiss="modal">
                                                            <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Close
                                                        </a>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" tabindex="-1" id="viewBarcode">
                                            <div class="modal-dialog modal-dialog-centered mw-900px custom-modal-size">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Barcode</h5>
                                                        <!-- Begin::Close -->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </div>
                                                        <!-- End::Close -->
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="input-group input-group-sm mb-5">
                                                            <div class="row">
                                                                <!-- Begin::Barcode -->
                                                                
                                                                <!-- End::Barcode -->

                                                                <div class="col-md-12 mb-5 text-center">
                                                                    <div class="form-group">
                                                                        <label for="eshipper_name">Customer Name:</label>
                                                                        <span id="bcustomer" class="form-control-static"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-5 text-center">
                                                                    <div class="form-group">
                                                                        <label for="eshipper_name">Bill No:</label>
                                                                        <span id="bcbill_no" class="form-control-static"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-5 text-center">
                                                                    <div class="form-group">
                                                                        <label for="eshipper_name">Delivery Place:</label>
                                                                        <span id="bdelivery_place" class="form-control-static"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-5 text-center">
                                                                    <div class="form-group">
                                                                        <label for="eshipper_name">District:</label>
                                                                        <span id="bddistrict" class="form-control-static"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-5 text-center">
                                                                    <svg id="barcode"></svg> <!-- Placeholder for Barcode -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Print Button -->
                                                        <div class="text-center mt-3">
                                                            <button id="printButton" class="btn btn-primary">Print</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>








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
                                <div class="card card-flush mb-5 mb-xl-10">


                                    <!--begin::Card body-->
                                    <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">


                                        <!--begin::Table-->
                                        <div class="p-0">
                                            <div class="pt-5 pb-10">
                                                <table id="hblTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                    <thead>
                                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-100px"><input type="checkbox" id="select-all"></th> <!-- Added checkbox -->
                                                            <th class="min-w-20px"></th>
                                                            <th class="min-w-80px">Date</th>
                                                            <th class="min-w-80px">Bill No</th>
                                                            <th class="min-w-80px">Code</th>
                                                            <th class="min-w-80px">Shipping type</th>
                                                            <th class="min-w-80px">Shipper</th>
                                                            <th class="min-w-80px">Consignee</th>
                                                            <th class="min-w-80px">Destination</th>
                                                            <th class="min-w-80px">Total</th>
                                                            <th class="min-w-300px">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>









                                            </div>


                                            <!--end::Table-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>

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
            // Function to generate PDF
            function generatePDF() {
                const element = document.getElementById('pdf-table');
                const includeTerms = document.getElementById('includeTerms').checked;
                const termsSection = document.getElementById('terms-conditions-section');

                // Temporarily hide the terms and conditions section if the checkbox is not checked
                if (!includeTerms) {
                    termsSection.style.display = 'none';
                }

                // Get values for filename
                const shipperName = document.getElementById('vshipper_name').textContent.trim();
                const code2 = document.getElementById('vcode').textContent.trim();

                // Construct filename
                const filename = `${shipperName}_${code2}.pdf`;

                // Options for html2pdf
                const options = {
                    filename: filename, // Use the constructed filename
                    margin: 0.1, // Set margin in inches
                    image: {
                        type: 'jpeg',
                        quality: 1
                    }, // Use full quality JPEG images
                    html2canvas: {
                        scale: 3
                    }, // Increase scale for better quality
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: ['avoid-all', 'css', 'legacy']
                    }, // Enable page breaks
                    htmlContent: true // Ensure text is selectable
                };

                // Use html2pdf to generate PDF
                html2pdf()
                    .from(element)
                    .set(options)
                    .save()
                    .finally(() => {
                        // Show the terms and conditions section again after PDF generation
                        if (!includeTerms) {
                            termsSection.style.display = 'block';
                        }
                    });
            }

            // Add event listener to the button to trigger PDF generation
            document.getElementById('generate-pdf').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default button behavior
                generatePDF(); // Call function to generate PDF
            });
        </script>


        <script>
            // Function to generate PDF
            function generatePDF2() {
                const element = document.getElementById('pdf-table2');

                const includeTerms = document.getElementById('includeTerms2').checked;
                const termsSection = document.getElementById('terms-conditions-section2');

                // Temporarily hide the terms and conditions section if the checkbox is not checked
                if (!includeTerms) {
                    termsSection.style.display = 'none';
                }


                //const shipperName = document.getElementById('vvshipper_name').textContent.trim();
                const code2 = document.getElementById('vvcode2').textContent.trim();

                // Construct filename
                const filename = `${code2}.pdf`;

                // Options for html2pdf
                const options = {
                    filename: filename,
                    margin: 0.5, // Set margin in inches
                    image: {
                        type: 'jpeg',
                        quality: 1
                    }, // Use full quality JPEG images
                    html2canvas: {
                        scale: 3
                    }, // Increase scale for better quality
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: ['avoid-all', 'css', 'legacy']
                    }, // Enable page breaks
                    htmlContent: true // Ensure text is selectable
                };



                // Use html2pdf to generate PDF
                html2pdf()
                    .from(element)
                    .set(options)
                    .save();
            }

            // Add event listener to the link to trigger PDF generation
            document.getElementById('generate-pdfd').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior (redirect)
                generatePDF2(); // Call function to generate PDF
            });
        </script>

        <script>
            // Function to generate PDF
            function generatePDFl() {
                const element = document.getElementById('pdf-table-loading');

                // Options for html2pdf
                const options = {
                    filename: 'generated_pdf.pdf',
                    margin: 0.5, // Set margin in inches
                    image: {
                        type: 'jpeg',
                        quality: 1
                    }, // Use full quality JPEG images
                    html2canvas: {
                        scale: 3
                    }, // Increase scale for better quality
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: ['avoid-all', 'css', 'legacy']
                    }, // Enable page breaks
                    htmlContent: true // Ensure text is selectable
                };



                // Use html2pdf to generate PDF
                html2pdf()
                    .from(element)
                    .set(options)
                    .save();
            }

            // Add event listener to the link to trigger PDF generation
            document.getElementById('generate-pdf2').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior (redirect)
                generatePDFl(); // Call function to generate PDF
            });
        </script>

        <script>
            // Function to generate PDF
            function generatePDF3() {
                const element = document.getElementById('branch-bill-table');

                // Options for html2pdf
                const options = {
                    filename: 'branch-bill.pdf',
                    margin: 0.5, // Set margin in inches
                    image: {
                        type: 'jpeg',
                        quality: 1
                    }, // Use full quality JPEG images
                    html2canvas: {
                        scale: 3
                    }, // Increase scale for better quality
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: ['avoid-all', 'css', 'legacy']
                    }, // Enable page breaks
                    htmlContent: true // Ensure text is selectable
                };



                // Use html2pdf to generate PDF
                html2pdf()
                    .from(element)
                    .set(options)
                    .save();
            }

            // Add event listener to the link to trigger PDF generation
            document.getElementById('generate-pdf3').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior (redirect)
                generatePDF3(); // Call function to generate PDF
            });
        </script>

        <script>
            function generatePDFTAB(filename) {
                var element = document.getElementById('pdf-table');

                // Add CSS rule to make text smaller
                var style = document.createElement('style');
                style.innerHTML = '#pdf-table { font-size: 8px; }'; // Set the font size here
                document.head.appendChild(style);

                // Convert HTML to PDF and embed it in a container
                html2pdf().from(element).set({
                    margin: [0.1, 0.1, 0.1, 0.1], // Top, Right, Bottom, Left margins in inches
                    filename: filename, // Set the filename dynamically
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                }).outputPdf('datauristring').then(function(pdfAsString) {
                    var pdfContainer = document.getElementById('pdf-container');
                    var embed = document.createElement('embed');
                    embed.setAttribute('src', pdfAsString);
                    embed.setAttribute('type', 'application/pdf');
                    embed.setAttribute('width', '100%');
                    embed.setAttribute('height', '800px');
                    pdfContainer.appendChild(embed);

                    // Remove the added style after generating PDF
                    document.head.removeChild(style);

                });
            }
        </script>

        <script>
            function generateLOADINGPDFTAB(filename) {
                var element = document.getElementById('pdf-table-loading');

                // Add CSS rule to make text smaller
                var style = document.createElement('style');
                style.innerHTML = '#pdf-table-loading { font-size: 8px; }'; // Set the font size here
                document.head.appendChild(style);

                // Convert HTML to PDF and embed it in a container
                html2pdf().from(element).set({
                    margin: [0.1, 0.1, 0.1, 0.1], // Top, Right, Bottom, Left margins in inches
                    filename: filename, // Set the filename dynamically
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                }).outputPdf('datauristring').then(function(pdfAsString) {
                    var pdfContainer = document.getElementById('pdf-loading-container');
                    var embed = document.createElement('embed');
                    embed.setAttribute('src', pdfAsString);
                    embed.setAttribute('type', 'application/pdf');
                    embed.setAttribute('width', '100%');
                    embed.setAttribute('height', '800px');
                    pdfContainer.appendChild(embed);

                    // Remove the added style after generating PDF
                    document.head.removeChild(style);

                });
            }
        </script>


</body>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script>
    $(document).on('focus', '.select2.select2-container', function(e) {
        var isOriginalEvent = e.originalEvent; // Don't re-open on closing focus event
        var isSingleSelect = $(this).find(".select2-selection--single").length > 0; // Multi-select will pass focus to input

        if (isOriginalEvent && isSingleSelect) {
            $(this).siblings('select:enabled').select2('open');
        }
    });

    $(document).ready(function() {

        $('#addHBLModal').on('hidden.bs.modal', function(e) {
            // Reload the current page
            location.reload();
        });

        $('#viewHBLModal').on('hidden.bs.modal', function(e) {
            // Reload the current page
            location.reload();
        });
        //bill number validation start///////////////////////////////////////////////////////////////////////////////////////////////
        $('.bill_no').on('input', function() {
            var bill_no = $(this).val();
            var feedback = $('#bill_no_feedback');

            if (bill_no.length > 0) {
                $.ajax({
                    url: 'code-hbl.php',
                    type: 'POST',
                    data: {
                        bill_no: bill_no,
                        action: 'bill_check'
                    },
                    success: function(response) {
                        if (response.trim() == "Bill No already exists.") {
                            feedback.text(response).removeClass('text-success').addClass('text-danger');
                        } else {
                            feedback.text(response).removeClass('text-danger').addClass('text-success');
                        }
                    }
                });
            } else {
                feedback.text('').removeClass('text-danger text-success');
            }
        });

        $('.ebill_no').on('input', function() {
            var bill_no = $(this).val();
            var feedback = $('#ebill_no_feedback');

            if (bill_no.length > 0) {
                $.ajax({
                    url: 'code-hbl.php',
                    type: 'POST',
                    data: {
                        bill_no: bill_no,
                        action: 'bill_check'
                    },
                    success: function(response) {
                        if (response.trim() == "Bill No already exists.") {
                            feedback.text(response).removeClass('text-success').addClass('text-danger');
                        } else {
                            feedback.text(response).removeClass('text-danger').addClass('text-success');
                        }
                    }
                });
            } else {
                feedback.text('').removeClass('text-danger text-success');
            }
        });


        //bil validation end/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // date pickers start/////////////////////////////////////////////////////////////////////////////////////////////////
        $(function() {
            $("#delivered_date").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $(this).val(dateText);
                }
            }).on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    // If already in yyyy-mm-dd format, do nothing
                    return;
                }
                if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                    // If in yyyy-mmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                } else if (inputValue.match(/^\d{8}$/)) {
                    // If in yyyymmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                }
            });
        });

        $(function() {
            $("#estimated_date").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $(this).val(dateText);
                }
            }).on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    // If already in yyyy-mm-dd format, do nothing
                    return;
                }
                if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                    // If in yyyy-mmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                } else if (inputValue.match(/^\d{8}$/)) {
                    // If in yyyymmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                }
            });
        });

        $(function() {
            $("#shipping_date").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $(this).val(dateText);
                }
            }).on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    // If already in yyyy-mm-dd format, do nothing
                    return;
                }
                if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                    // If in yyyy-mmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                } else if (inputValue.match(/^\d{8}$/)) {
                    // If in yyyymmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                }
            });
        });

        $(function() {
            $("#date").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $(this).val(dateText);
                },
                beforeShow: function(input, inst) {
                    inst.dpDiv.css({
                        position: 'fixed',
                        top: $(input).offset().top + $(input).outerHeight(),
                        left: $(input).offset().left
                    });
                }
            }).on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    // If already in yyyy-mm-dd format, do nothing
                    return;
                }
                if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                    // If in yyyy-mmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                } else if (inputValue.match(/^\d{8}$/)) {
                    // If in yyyymmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                }
            });
        });


        $(function() {
            $("#edate").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $(this).val(dateText);
                }
            }).on('input', function() {
                var inputValue = $(this).val();
                if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                    // If already in yyyy-mm-dd format, do nothing
                    return;
                }
                if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                    // If in yyyy-mmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                } else if (inputValue.match(/^\d{8}$/)) {
                    // If in yyyymmdd format, convert to yyyy-mm-dd
                    var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                    $(this).val(formattedDate);
                }
            });
        });

        $.ajax({
            url: 'get_district.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, district_locations) {
                        options += '<option value="' + district_locations.district_location_id + '">' + district_locations.district + '</option>';
                    });
                    $('#district').append(options);
                } else {
                    $('#district').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_district.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, district_locations) {
                        options += '<option value="' + district_locations.district_location_id + '">' + district_locations.district + '</option>';
                    });
                    $('#edistrict').append(options);
                } else {
                    $('#edistrict').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
        // datepickers end /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // select 2 get data start ///////////////////////////////////////////////////////////////////////////////////////////////////
        $.ajax({
            url: 'get_agent.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, agent) {
                        options += '<option value="' + agent.agent_id + '">' + agent.name + '</option>';
                    });
                    $('#agent_branch').append(options);
                } else {
                    $('#agent_branch').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_agent.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, agent) {
                        options += '<option value="' + agent.agent_id + '">' + agent.name + '</option>';
                    });
                    $('#eagent_branch').append(options);
                } else {
                    $('#eagent_branch').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_shipping_type.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, shipping_types) {
                        options += '<option value="' + shipping_types.shipping_type + '">' + shipping_types.shipping_type + '</option>';
                    });
                    $('#shipping_type').append(options);
                } else {
                    $('#shipping_type').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $('#agent').on('change', function() {
            var agentId = $(this).val();

            // Make AJAX request to fetch agent address data
            $.ajax({
                url: 'get_location.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    agent_id: agentId
                }, // Pass selected agent ID to PHP script
                success: function(data) {
                    // Clear existing options
                    $('#location').empty();

                    if (data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, address) {
                            options += '<option value="' + address.agent_address_id + '">' + address.address + ', ' + address.city + ', ' + address.country + '</option>';
                        });
                        $('#location').append(options);
                    } else {
                        $('#location').append('<option value="">No addresses found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        $.ajax({
            url: 'get_customer.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, customers) {
                        options += '<option value="' + customers.id + '">' + customers.name + ' || ' + customers.mobile + '</option>';
                    });
                    $('#cus_reference').append(options);
                } else {
                    $('#cus_reference').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });


        $('#cus_reference').on('select2:select', function(e) {
            var customer_id = e.params.data.id;

            // Fetch customer details
            $.ajax({
                url: 'get_customer_details.php', // PHP script to fetch customer details by ID
                type: 'GET',
                dataType: 'json',
                data: {
                    customer_id: customer_id
                },
                success: function(data) {
                    // Update text boxes with customer details
                    $('#shipper_name').val(data.name);
                    $('#shipper_address').val(data.address);
                    $('#shipper_mobile').val(data.mobile);
                    $('#shipper_city').val(data.city);
                    $('#shipper_country').val(data.country);
                    $('#shipper_email').val(data.email);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $.ajax({
            url: 'get_customer.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, customers) {
                        options += '<option value="' + customers.id + '">' + customers.name + ' || ' + customers.mobile + '</option>';
                    });
                    $('#ecus_reference').append(options);
                } else {
                    $('#ecus_reference').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $('#ecus_reference').on('select2:select', function(e) {
            var customer_id = e.params.data.id;

            // Fetch customer details
            $.ajax({
                url: 'get_customer_details.php', // PHP script to fetch customer details by ID
                type: 'GET',
                dataType: 'json',
                data: {
                    customer_id: customer_id
                },
                success: function(data) {
                    // Update text boxes with customer details
                    $('#eshipper_name').val(data.name);
                    $('#eshipper_address').val(data.address);
                    $('#eshipper_mobile').val(data.mobile);
                    $('#eshipper_city').val(data.city);
                    $('#eshipper_country').val(data.country);
                    $('#eshipper_email').val(data.email);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $.ajax({
            url: 'get_employees.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, employees) {
                        options += '<option value="' + employees.employee_id + '">' + employees.name + ' || ' + employees.mobile + '</option>';
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

        $.ajax({
            url: 'get_employees.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, employees) {
                        options += '<option value="' + employees.employee_id + '">' + employees.name + ' || ' + employees.mobile + '</option>';
                    });
                    $('#esales_rep').append(options);
                } else {
                    $('#esales_rep').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_employees.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" disabled selected>Select a shipping by</option>';
                if (data && data.length > 0) {
                    $.each(data, function(index, employees) {
                        options += '<option value="' + employees.employee_id + '">' + employees.name + ' || ' + employees.mobile + '</option>';
                    });
                } else {
                    options += '<option value="">No sales representatives found</option>';
                }
                $('#shipping_by').html(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });



        $.ajax({
            url: 'get_branch.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, company_branchs) {
                        options += '<option value="' + company_branchs.company_branch_id + '">' + company_branchs.c_branch_name + '</option>';
                    });
                    $('#company_branch').append(options);
                } else {
                    $('#company_branch').append('<option value="">No branchs found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_branch.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, company_branchs) {
                        options += '<option value="' + company_branchs.company_branch_id + '">' + company_branchs.c_branch_name + '</option>';
                    });
                    $('#ecompany_branch').append(options);
                } else {
                    $('#ecompany_branch').append('<option value="">No branchs found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_branch.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, company_branchs) {
                        options += '<option value="' + company_branchs.company_branch_id + '">' + company_branchs.c_branch_name + '</option>';
                    });
                    $('#scompany_branch').append(options);
                } else {
                    $('#scompany_branch').append('<option value="">No branchs found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        /// search fillter modal select2 geting data////////////////////////////////////////////////////////////////////
        $.ajax({
            url: 'get_agent.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" disabled selected>Select an agent</option>';
                if (data && data.length > 0) {
                    $.each(data, function(index, agent) {
                        options += '<option value="' + agent.agent_id + '">' + agent.name + '</option>';
                    });
                } else {
                    options += '<option value="">No agents found</option>';
                }
                $('#sagent_branch').html(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_shipping_type.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" disabled selected>Select a shipping type</option>';
                if (data && data.length > 0) {
                    $.each(data, function(index, shipping_types) {
                        options += '<option value="' + shipping_types.shipping_type + '">' + shipping_types.shipping_type + '</option>';
                    });
                } else {
                    options += '<option value="">No shipping types found</option>';
                }
                $('#sshipping').html(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_clearance.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" disabled selected>Select a clearance type</option>';
                if (data && data.length > 0) {
                    $.each(data, function(index, clearances) {
                        options += '<option value="' + clearances.clearance + '">' + clearances.clearance + '</option>';
                    });
                } else {
                    options += '<option value="">No clearance types found</option>';
                }
                $('#sclearance').html(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_employees.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="" disabled selected>Select a sales representative</option>';
                if (data && data.length > 0) {
                    $.each(data, function(index, employees) {
                        options += '<option value="' + employees.employee_id + '">' + employees.name + ' || ' + employees.mobile + '</option>';
                    });
                } else {
                    options += '<option value="">No sales representatives found</option>';
                }
                $('#ssales_rep').html(options);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });


        // geting fillter seach select2 data end //////////////////////////////////////////////////////////////////////////////



        $.ajax({
            url: 'get_shipping_type.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, shipping_types) {
                        options += '<option value="' + shipping_types.shipping_type + '">' + shipping_types.shipping_type + '</option>';
                    });
                    $('#shipping').append(options);
                } else {
                    $('#shipping').append('<option value="">No shipping found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_shipping_type.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, shipping_types) {
                        options += '<option value="' + shipping_types.shipping_type + '">' + shipping_types.shipping_type + '</option>';
                    });
                    $('#eshipping').append(options);
                } else {
                    $('#eshipping').append('<option value="">No shipping found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_clearance.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, clearances) {
                        options += '<option value="' + clearances.clearance + '">' + clearances.clearance + '</option>';
                    });
                    $('#clearance').append(options);
                } else {
                    $('#clearance').append('<option value="">No clearance found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_clearance.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, clearances) {
                        options += '<option value="' + clearances.clearance + '">' + clearances.clearance + '</option>';
                    });
                    $('#eclearance').append(options);
                } else {
                    $('#eclearance').append('<option value="">No clearance found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: 'get_delivery_agent_address.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    var options = '';
                    $.each(data, function(index, delivery_agent_branches) {
                        options += '<option value="' + delivery_agent_branches.delivery_agent_id + '">' + delivery_agent_branches.da_name + '</option>';
                    });
                    $('#delivery_agent_branch').append(options);
                } else {
                    $('#delivery_agent_branch').append('<option value="">No agents found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });


        $('#delivery_agent_branch').on('change', function() {
            var delivery_agent_bid = $(this).val();

            // Make AJAX request to fetch agent address data
            $.ajax({
                url: 'get_dablocation.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    delivery_agent_bid: delivery_agent_bid
                }, // Pass selected agent ID to PHP script
                success: function(data) {
                    // Clear existing options
                    $('#dab_location').empty();

                    if (data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, dabaddress) {
                            options += '<option value="' + dabaddress.delivery_agent_bid + '">' + dabaddress.dabaddress + ', ' + dabaddress.dabcity + '</option>';
                        });
                        $('#dab_location').append(options);
                    } else {
                        $('#dab_location').append('<option value="">No addresses found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });


        //HBL ADD MODAL CALCULATION AND POPULATE TABLE CD START //

        $('#addHBLModal').on('click', '#addRow1', function(event) {
            var tableBody = $('#editableTableBody1');
            var newRow = `
                <tr>
                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="description[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control cbm" name="cbm[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control weight" name="weight[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control qty" name="qty[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control amount" name="amount[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control commission" name="commission[]" required></div></td>
                    <td><a href="#" class="btn btn-icon btn-danger removeRow1"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a></td>
                </tr>`;
            tableBody.append(newRow);
            attachInputChangeListener1();
            calculateTotals1();
        });

        // Function to add rows to Table 2
        $('#addHBLModal').on('click', '#addRow2', function(event) {
            var tableBody = $('#editableTableBody2');
            var newRow = `
                <tr>
                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="description2[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control amount2" name="amount2[]" required></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control commission2" name="commission2[]" required></div></td>
                    <td><a href="#" class="btn btn-icon btn-danger removeRow2"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a></td>
                </tr>`;
            tableBody.append(newRow);
            attachInputChangeListener2();
            calculateTotals2();
        });

        // Function to calculate totals for Table 1
        function calculateTotals1() {
            var totalCBM = 0;
            var totalWeight = 0;
            var totalQTY = 0;
            var totalAmount = 0;
            var totalCommission = 0;

            $('#editableTableBody1 tr').each(function() {
                var cbm = parseFloat($(this).find('.cbm').val()) || 0;
                var weight = parseFloat($(this).find('.weight').val()) || 0;
                var qty = parseFloat($(this).find('.qty').val()) || 0;
                var amount = parseFloat($(this).find('.amount').val()) || 0;
                var commission = parseFloat($(this).find('.commission').val()) || 0;

                totalCBM += cbm;
                totalWeight += weight;
                totalQTY += qty;
                totalAmount += amount;
                totalCommission += commission;
            });

            $('#totalCBM1').text(totalCBM.toFixed(2));
            $('#totalWeight1').text(totalWeight.toFixed(2));
            $('#totalQTY1').text(totalQTY.toFixed(2));
            $('#totalAmount1').text(totalAmount.toFixed(2));
            $('#totalCommission1').text(totalCommission.toFixed(2));
            updateMamount();
        }

        // Function to calculate totals for Table 2
        function calculateTotals2() {
            var totalAmount2 = 0;
            var totalCommission2 = 0;

            $('#editableTableBody2 tr').each(function() {
                var amount2 = parseFloat($(this).find('.amount2').val()) || 0;
                var commission2 = parseFloat($(this).find('.commission2').val()) || 0;

                totalAmount2 += amount2;
                totalCommission2 += commission2;
            });

            $('#totalAmount2').text(totalAmount2.toFixed(2));
            $('#totalCommission2').text(totalCommission2.toFixed(2));
            updateMamount();
        }

        // Function to update the mamount input field
        function updateMamount() {
            var totalAmount1 = parseFloat($('#totalAmount1').text()) || 0;
            var totalCommission1 = parseFloat($('#totalCommission1').text()) || 0;
            var totalAmount2 = parseFloat($('#totalAmount2').text()) || 0;
            var totalCommission2 = parseFloat($('#totalCommission2').text()) || 0;

            var finalAmount = (totalAmount1 + totalAmount2) - (totalCommission1 + totalCommission2);
            $('#mamount').val(finalAmount.toFixed(2));
        }

        // Attach input change listeners to new rows in Table 1
        function attachInputChangeListener1() {
            $('#editableTableBody1').on('input', '.cbm, .weight, .qty, .amount, .commission', function() {
                calculateTotals1();
            });
        }

        // Attach input change listeners to new rows in Table 2
        function attachInputChangeListener2() {
            $('#editableTableBody2').on('input', '.amount2, .commission2', function() {
                calculateTotals2();
            });
        }

        // Initial call to attach listeners to existing rows (if any)
        attachInputChangeListener1();
        attachInputChangeListener2();

        // Remove row and recalculate for Table 1
        $('#addHBLModal').on('click', '.removeRow1', function(event) {
            $(this).closest('tr').remove();
            calculateTotals1();
        });

        // Remove row and recalculate for Table 2
        $('#addHBLModal').on('click', '.removeRow2', function(event) {
            $(this).closest('tr').remove();
            calculateTotals2();
        });

        //HBL ADD MODAL CALCULATION AND POPULATE TABLE CD END //

        // DataTable initialization
        var table = $('#hblTable').DataTable({
            responsive: true,
            "ajax": {
                "url": "code-hbl.php",
                "type": "POST",
                "data": {
                    action: 'fetch'
                },
                "dataSrc": ""
            },
            "columns": [{
                    "data": "hbl_id",
                    "render": function(data, type, full, meta) {
                        return '<input type="checkbox" class="row-checkbox" value="' + data + '">';
                    }
                },
                {
                    "data": "current_status",
                    "render": function(data, type, full, meta) {
                        var status = full.current_status;
                        var icon = '';
                        var fontSizeClass = 'fs-2';

                        switch (status) {
                            case 'on-hold':
                                icon = '<i class="fad fa-pause ' + fontSizeClass + ' text-primary"></i>';
                                break;
                            case 'on-hold-pending':
                                icon = '<i class="fad fa-pause ' + fontSizeClass + ' text-warning"></i>';
                                break;
                            case 'tbl':
                                icon = '<i class="fad fa-people-carry ' + fontSizeClass + ' text-dark"></i>';
                                break;
                            case 'tbl-pending':
                                icon = '<i class="fad fa-people-carry ' + fontSizeClass + ' text-warning"></i>';
                                break;
                            case 'loading':
                                icon = '<i class="fad fa-truck-loading ' + fontSizeClass + ' text-success"></i>';
                                break;
                            case 'loading-pending':
                                icon = '<i class="fad fa-truck-loading ' + fontSizeClass + ' text-warning"></i>';
                                break;
                            case 'shipped':
                                icon = '<i class="fad fa-ship fs-1 ' + fontSizeClass + ' text-info"></i>';
                                break;
                            case 'shipped-pending':
                                icon = '<i class="fad fa-ship fs-1 ' + fontSizeClass + ' text-warning"></i>';
                                break;
                            case 'delivered':
                                icon = '<i class="fad fa-shipping-fast ' + fontSizeClass + ' text-warning"></i>';
                                break;
                            case 'delivered-pending':
                                icon = '<i class="fad fa-shipping-fast ' + fontSizeClass + ' text-danger"></i>';
                                break;
                            default:
                                icon = '<i class="fad fa-question-circle ' + fontSizeClass + '"></i>';
                                break;
                        }

                        return icon;
                    }
                },
                {
                    "data": "Date",
                },
                {
                    "data": "Bill_no"
                },
                {
                    "data": "code"
                },
                {
                    "data": "Shipping"
                },
                {
                    "data": "Shipper_name"
                },
                {
                    "data": "Consignee_name"
                },
                {
                    "data": "location2"
                },
                {
                    "data": "total_amount"
                },
                {
                    "data": null,
                    "render": function(data, type, full, meta) {
                        var accessDenied = <?php echo $access_denied ? 'true' : 'false'; ?>;
                        var buttons = '';

                        buttons += `<a href="#" class="btn btn-active-icon-gray-600 btn-text-gray-600 viewWidgt" data-id="${data.hbl_id}"><i class="ki-duotone ki-eye fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
                            <a href="#" class="btn btn-active-icon-gray-600 btn-text-gray-600 showWidgt" data-id="${data.hbl_id}"><i class="fad fa-receipt fs-2"></i></a>
                            <a href="pdf-view.php?hbl_id=${data.hbl_id}" target="_blank" class="btn btn-active-icon-gray-600 btn-text-gray-600 downloadWidgt"><i class="fad fa-shredder fs-2"></i></a>
                            <a href="#" class="btn btn-active-icon-gray-600 btn-text-gray-600 barcodedWidgt" data-id="${data.hbl_id}"><i class="fad fa-barcode fs-2"></i></a>`;

                        if (accessDenied) {
                            return buttons;
                        }

                        if (<?php echo $can_edit || $can_add_edit || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                            buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editWidgt" data-id="${data.hbl_id}"><i class="ki-duotone ki-notepad-edit fs-2"><span class="path1"></span><span class="path2"></span></i></a>`;
                        }

                        if (<?php echo $can_delete || $can_add_delete || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                            buttons += `<a href="#" class="btn btn-active-icon-danger btn-text-danger deleteWidgt" data-id="${data.hbl_id}"><i class="ki-duotone ki-delete-folder fs-2"><span class="path1"></span><span class="path2"></span></i></a>`;
                        }

                        return buttons;
                    }
                }
            ],
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row mb-2'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });

        $('#select-all').on('click', function() {
            var rows = table.rows({
                'search': 'applied'
            }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        $('#hblTable tbody').on('change', 'input[type="checkbox"]', function() {
            if (!this.checked) {
                var el = $('#select-all').get(0);
                if (el && el.checked && ('indeterminate' in el)) {
                    el.indeterminate = true;
                }
            }
        });


        $('#filter_button').click(function() {
            // Gather filter form data
            var formData = $('#filter_form').serialize();

            // Make an AJAX request to filter data
            $.ajax({
                url: "code-hbl.php",
                type: "POST",
                data: formData + "&action=filter", // Add action parameter for filtering
                success: function(response) {
                    // Log the posted data in the console
                    console.log("Posted data:", formData);

                    // Reload DataTable with filtered data
                    table.clear().rows.add(JSON.parse(response)).draw();
                    $('#fillter_modal').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });


        // Function to update status
        function updateStatus(selectedHblIds, status) {
            // Send Ajax request to update status
            $.ajax({
                url: 'update-status.php',
                type: 'POST',
                data: {
                    hblIds: selectedHblIds,
                    status: status
                },
                success: function(response) {
                    // Show success message using SweetAlert2
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: response,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    }).then(function() {
                        // Reload the DataTable
                        table.ajax.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        }

        var selectedHblIds = []; // Define selectedHblIds variable outside the event handlers

        // Check if checkbox values are correct
        console.log("Checkbox values:", selectedHblIds);

        $(document).on('click', '.remove-row', function() {
            var hblIdToRemove = $(this).data('hblid').toString(); // Convert to string for comparison
            console.log("Removing HBL ID:", hblIdToRemove);

            var index = selectedHblIds.indexOf(hblIdToRemove);

            if (index !== -1) {
                selectedHblIds.splice(index, 1); // Remove the HBL ID from the array
                console.log('HBL ID ' + hblIdToRemove + ' removed. Updated selected HBL IDs:', selectedHblIds);

                // Remove the corresponding row from the modal
                $(this).closest('tr').remove();
            } else {
                console.log('HBL ID ' + hblIdToRemove + ' not found in selected HBL IDs array.');
            }
        });

        $('.update-status').on('click', function() {
            // Reset selectedHblIds before collecting new values
            selectedHblIds = [];

            // Iterate over selected checkboxes and collect HBL IDs
            $('#hblTable tbody input[type="checkbox"].row-checkbox:checked').each(function() {
                selectedHblIds.push($(this).val());
            });

            // Check if checkbox values are correct after updating
            console.log("Updated Checkbox values:", selectedHblIds);

            if (selectedHblIds.length > 0) {
                // Show confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to update the status?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var status = $(this).data('status');

                        // Check if status is 'shipped' or 'shipped-pending'
                        if (status === 'shipped' || status === 'shipped-pending') {
                            // Send AJAX request to fetch data for selected HBL IDs
                            $.ajax({
                                url: 'update-status.php',
                                type: 'POST',
                                data: {
                                    selectedHblIds: JSON.stringify(selectedHblIds),
                                    action: 'selected_fetch'
                                },
                                success: function(response) {
                                    console.log(response);
                                    try {
                                        // Parse the JSON response
                                        var data = JSON.parse(response);

                                        // Check if response contains an error message
                                        if (data.hasOwnProperty('error')) {
                                            alert(data.error);
                                            return; // Stop further execution
                                        }

                                        // Populate the existing text boxes with the fetched shipping type and total weight
                                        $('#shipping_type').val(null).trigger('change').val(data.shippingType).trigger('change');
                                        $('#feet_weight').val(data.totalHBLWeight);

                                        // Populate the modal with the fetched table data
                                        $('#viewModal').modal('show');
                                        $('#selectedRowData').html(data.table);

                                        // When confirm button is clicked in modal, update status
                                        $('#confirmUpdate').off('click').on('click', function() {
                                            if ($('#shipping_date').val() === '', $('#agent').val() === '', $('#location').val() === '', $('#shipping_by').val() === '', $('#shipping_type').val() === '', $('#shipping_no').val() === '', $('#file_no').val() === '', $('#feet_weight').val() === '', $('#freight_charge').val() === '', $('#clearance_charge').val() === '', $('#booking_charge').val() === '', $('#loading_charge').val() === '', $('#seal').val() === '', $('#estimated_date').val() === '', $('#delivered_date').val() === '') {
                                                // Show an alert to the user
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Please fill all feilds!',
                                                });
                                                return; // Stop further execution
                                            }
                                            // Check if selectedHblIds array is empty
                                            if (selectedHblIds.length === 0) {
                                                alert('Please select at least one HBL.');
                                                return; // Stop further execution
                                            }

                                            // Collect shipping details from the form
                                            var formData = $('#shippingDetailsAddForm').serializeArray();

                                            // Add status and selected HBL IDs to formData
                                            formData.push({
                                                name: 'status',
                                                value: status
                                            });
                                            formData.push({
                                                name: 'hblIds',
                                                value: selectedHblIds
                                            });

                                            // Send AJAX request to insert shipping details
                                            $.ajax({
                                                url: 'update-status.php',
                                                type: 'POST',
                                                data: formData,
                                                success: function(response) {
                                                    // Show success message using SweetAlert2
                                                    Swal.fire({
                                                        toast: true,
                                                        icon: 'success',
                                                        title: response,
                                                        position: 'top-end',
                                                        showConfirmButton: false,
                                                        timer: 3000,
                                                        padding: '2em'
                                                    }).then(function() {
                                                        // Reload the DataTable
                                                        $('#viewModal').modal('hide');
                                                        table.ajax.reload();
                                                    });
                                                },
                                                error: function(xhr, status, error) {
                                                    // Handle error
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                        });
                                    } catch (error) {
                                        console.error('Error parsing JSON response: ', error);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(xhr.responseText);
                                }
                            });
                        } else if (status === 'loading' || status === 'loading-pending') {
                            // Send AJAX request to fetch data for selected HBL IDs
                            $.ajax({
                                url: 'update-status.php',
                                type: 'POST',
                                data: {
                                    selectedHblIds: JSON.stringify(selectedHblIds),
                                    action: 'selected_fetch2'
                                },
                                success: function(response) {
                                    // Check if response contains an error message
                                    if (response.startsWith('Mixed shipping types')) {
                                        alert(response);
                                        $('#confirmUpdate2').hide(); // Hide the confirm button if mixed shipping types are detected
                                        return; // Stop further execution
                                    } else {
                                        $('#confirmUpdate2').show(); // Show the confirm button if no mixed shipping types are detected
                                    }

                                    // Populate the modal with the fetched data
                                    $('#view2Modal').modal('show');
                                    $('#selectedRowData2').html(response);

                                    // When confirm button is clicked in modal, update status
                                    $('#confirmUpdate2').on('click', function() {
                                        // Check if selectedHblIds array is empty
                                        if (selectedHblIds.length === 0) {
                                            alert('Please select at least one HBL.');
                                            return; // Stop further execution
                                        }

                                        // Collect shipping details from the form
                                        var formData = $('#loadingAddForm').serializeArray();

                                        // Add status and selected HBL IDs to formData
                                        formData.push({
                                            name: 'status',
                                            value: status
                                        });
                                        formData.push({
                                            name: 'hblIds',
                                            value: selectedHblIds
                                        });

                                        // Send AJAX request to insert shipping details
                                        $.ajax({
                                            url: 'update-status.php',
                                            type: 'POST',
                                            data: formData,
                                            success: function(response) {
                                                // Show success message using SweetAlert2
                                                Swal.fire({
                                                    toast: true,
                                                    icon: 'success',
                                                    title: response,
                                                    position: 'top-end',
                                                    showConfirmButton: false,
                                                    timer: 3000,
                                                    padding: '2em'
                                                }).then(function() {
                                                    // Reload the DataTable
                                                    table.ajax.reload();
                                                    // Assuming this code is triggered when the modal for "loading" or "loading-pending" status is opened
                                                    $.post("fetch-loading-data.php", {
                                                        hblIds: JSON.stringify(selectedHblIds),
                                                        status: status
                                                    }, function(data) {
                                                        $('#viewloadingModal').modal('show');
                                                        console.log(data);
                                                        $('#lagent_name').text(data.a_name);
                                                        $('#lagent_name2').text(data.a_name);

                                                        // Clear previous data
                                                        $('#veditableTableBody_loading').empty();
                                                        $('#warehouseInfoTable_loading tbody').empty();
                                                        $('#warehouseInfoTable_loading tfoot').empty(); // Clear warehouse total

                                                        var rowNumber = 1;

                                                        // Populate table with data
                                                        if (data.hbl && data.hbl.length > 0) {
                                                            var processedIdsHBL = {}; // Object to store processed HBL IDs
                                                            var totalCBM = 0;
                                                            var totalWeight = 0;
                                                            var totalQty = 0;

                                                            $.each(data.hbl, function(index, hbl) {
                                                                // Check if the HBL ID is already processed
                                                                if (!processedIdsHBL.hasOwnProperty(hbl.id)) {
                                                                    var descriptions = hbl.hbl_details.map(detail => detail.Description).join('<br>');
                                                                    var weights = hbl.hbl_details.map(detail => {
                                                                        totalWeight += parseFloat(detail.Weight); // Accumulate total weight
                                                                        return detail.Weight;
                                                                    }).join('<br>');
                                                                    var cbms = hbl.hbl_details.map(detail => {
                                                                        totalCBM += parseFloat(detail.CBM); // Accumulate total CBM
                                                                        return detail.CBM;
                                                                    }).join('<br>');
                                                                    var qtys = hbl.hbl_details.map(detail => {
                                                                        totalQty += parseInt(detail.QTY); // Accumulate total quantity
                                                                        return detail.QTY;
                                                                    }).join('<br>');

                                                                    var newRow = `
                                                                        <tr>
                                                                            <td style="font-size:11px">${rowNumber++}</td>
                                                                            <td style="font-size:11px">${hbl.code}<br>${hbl.Bill_no}<br>${hbl.BBill_no}</td>
                                                                            <td style="font-size:11px">${hbl.Shipper.sname}<br>${hbl.Shipper.saddress}</td>
                                                                            <td style="font-size:11px">${hbl.Consignee.cname}<br>${hbl.Consignee.caddress}<br>${hbl.Consignee.cmobile}</td>
                                                                            <td style="font-size:11px">${descriptions}</td>
                                                                            <td style="font-size:11px">${cbms}</td>
                                                                            <td style="font-size:11px">${weights}</td>
                                                                            <td style="font-size:11px">${qtys}</td>
                                                                            <td style="font-size:11px">${hbl.agent.a_name}<br>${hbl.Shipping}</td>
                                                                        </tr>`;
                                                                    $('#veditableTableBody_loading').append(newRow);

                                                                    // Add the HBL ID to processedIdsHBL object
                                                                    processedIdsHBL[hbl.id] = true;
                                                                }
                                                            });

                                                            // Format totals
                                                            var formattedTotalCBM = totalCBM.toFixed(3);
                                                            var formattedTotalWeight = totalWeight.toFixed(2);
                                                            var formattedTotalQty = totalQty; // No need to format quantity


                                                            $('#warehouseInfoTable_loading tbody').append(`
                                                                <tr>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${data.a_name}</td>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${formattedTotalCBM}</td>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${formattedTotalWeight}</td>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${formattedTotalQty}</td>
                                                                </tr>
                                                            `);

                                                            // Calculate and display totals for the warehouse info table
                                                            $('#warehouseInfoTable_loading tfoot').append(`
                                                                <tr>
                                                                    <td class="text-end" style=" font-size:11px;">TOTAL</td>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${formattedTotalCBM}</td>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${formattedTotalWeight}</td>
                                                                    <td class="text-end" style="width:50px; font-size:11px;">${formattedTotalQty}</td>
                                                                </tr>
                                                            `);
                                                        }
                                                        generateLOADINGPDFTAB();
                                                    }, 'json');
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                // Handle error
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    });
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(xhr.responseText);
                                }
                            });

                        } else {
                            // For other statuses, directly update status
                            updateStatus(selectedHblIds, status);
                        }
                    }
                });
            } else {
                alert('Please select at least one row.');
            }

        });





        var exportButtons = () => {
            const documentTitle = 'HBL Orders Report';
            var buttons = new $.fn.dataTable.Buttons(table, {
                buttons: [{
                        extend: 'copyHtml5',
                        title: documentTitle,
                        customize: function(doc) {
                            // Remove the action column from the exported data
                            $(doc).find('th:last-child, td:last-child').remove();
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        title: documentTitle,
                        customize: function(xlsx) {
                            // Remove the action column from the exported data
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('row c', sheet).each(function() {
                                if ($(this).index() == 9) {
                                    $(this).remove();
                                }
                            });
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        title: documentTitle,
                        customize: function(csv) {
                            // Remove the action column from the exported data
                            return csv.replace(/,[^,]+$/gm, ''); // Remove last column
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: documentTitle,
                        customize: function(doc) {
                            // Remove the action column from the exported data
                            doc.content[1].table.body.forEach(row => {
                                row.splice(-1, 1);
                            });
                        }
                    }
                ]
            }).container().appendTo($('#kt_datatable_example_buttons'));

            // Hook dropdown menu click event to datatable export buttons
            const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
            exportButtons.forEach(exportButton => {
                exportButton.addEventListener('click', e => {
                    e.preventDefault();

                    // Get clicked export value
                    const exportValue = e.target.getAttribute('data-kt-export');
                    const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                    // Trigger click event on hidden datatable export buttons
                    target.click();
                });
            });
        };

        exportButtons(); // Call the function to initialize export buttons table export remove action column

        $("#shipping, #clearance").change(function() {
            // Get the value of the bill number
            var billNo = $("#bill_no").val();

            // Get the selected value of shipping and clearance dropdowns
            var shipping = $("#shipping").val();
            var clearance = $("#clearance").val();

            // Check if both shipping and clearance are selected
            if (shipping && clearance) {
                // Get the first letters of shipping and clearance
                var shippingInitial = shipping.charAt(0).toUpperCase();
                var clearanceInitial = clearance.charAt(0).toUpperCase();

                // Remove the first two characters if they are letters
                if (billNo.length > 1 && isNaN(billNo.substring(0, 2))) {
                    billNo = billNo.substring(2);
                }

                // Concatenate the letters with the existing bill number
                //$("#bill_no").val(shippingInitial + clearanceInitial + billNo);
            } else {
                // If either shipping or clearance is not selected, remove the letters from the bill number
                //$("#bill_no").val(billNo);
            }
        });

        $("#eshipping, #eclearance").change(function() {
            // Get the value of the bill number
            var billNo = $("#ebill_no").val();

            // Get the selected value of shipping and clearance dropdowns
            var shipping = $("#eshipping").val();
            var clearance = $("#eclearance").val();

            // Check if both shipping and clearance are selected
            if (shipping && clearance) {
                // Get the first letters of shipping and clearance
                var shippingInitial = shipping.charAt(0).toUpperCase();
                var clearanceInitial = clearance.charAt(0).toUpperCase();

                // Remove the first two characters if they are letters
                if (billNo.length > 1 && isNaN(billNo.substring(0, 2))) {
                    billNo = billNo.substring(2);
                }

                // Concatenate the letters with the existing bill number
                //$("#ebill_no").val(shippingInitial + clearanceInitial + billNo);
            } else {
                // If either shipping or clearance is not selected, remove the letters from the bill number
                //$("#ebill_no").val(billNo);
            }
        });



        // Insert Employee
        $("#saveHBL").click(function() {

            if ($('#date').val() === '') {
                // Show an alert to the user
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a date, paid amount and balance!',
                });
                return; // Stop further execution
            }
            $.post("code-hbl.php", $("#hblAddForm").serialize() + '&action=insert', function(response) {
                // Refresh DataTable after insertion
                Swal.fire({
                    icon: 'success',
                    padding: '2em',
                    title: 'Success!',
                    text: response,
                    showConfirmButton: true
                }).then(function() {
                    // Close the modal
                    $('#addHBLModal').modal('hide');
                    // Clear the form fields
                    $('#hblAddForm')[0].reset();
                    table.ajax.reload();
                });
            });
        });


        $('#hblTable tbody').on('click', '.editWidgt', function() {
            var hbl_id = $(this).data("id");
            $.post("code-hbl.php", {
                action: 'edit',
                hbl_id: hbl_id
            }, function(data) {
                console.log(data); // Check if data is received correctly
                $('#editHBLModal').modal('show');

                // Populate modal with data
                $('#hbl_id').val(data.hbl_id);
                $('#edate').val(data.Date);
                $('#ebill_no').val(data.Bill_no);
                $('#ebbill_no').val(data.BBill_no);
                $('#elocation2').val(data.location2);
                //$('#eshipping').val(data.Shipping);
                $('#eshipping').val(null).trigger('change').val(data.Shipping).trigger('change');
                $('#eclearance').val(null).trigger('change').val(data.Clearance).trigger('change');
                $('#esales_rep').val(null).trigger('change').val(data.Sales_rep).trigger('change');
                $('#ecus_reference').val(null).trigger('change').val(data.Cus_Reference).trigger('change');
                $('#edistrict').val(null).trigger('change').val(data.district).trigger('change');
                $('#eagent_branch').val(null).trigger('change').val(data.agent_id).trigger('change');
                $('#eestimated_date').val(data.Estimated_date);
                $('#edelivered_date').val(data.Delivered_date);
                $('#ediscount').val(data.Discount);
                $('#enote').val(data.Note);
                $('#ehbl_type').val(data.HBL_Type);
                $('#emamount').val(data.mAmount);
                $('#ebalance').val(data.balance);
                $('#eshipper_name').val(data.Shipper_name);
                $('#eshipper_address').val(data.Shipper_address);
                $('#eshipper_mobile').val(data.Shipper_mobile);
                $('#eshipper_ppnic').val(data.Shipper_pp_nic);
                $('#eshipper_city').val(data.Shipper_city);
                $('#eshipper_country').val(data.Shipper_country);
                $('#eshipper_email').val(data.Shipper_email);
                $('#econsignee_name').val(data.Consignee_name);
                $('#econsignee_address').val(data.Consignee_address);
                $('#econsignee_mobile').val(data.Consignee_mobile);
                $('#econsignee_ppnic').val(data.Consignee_pp_nic);
                $('#econsignee_city').val(data.Consignee_city);
                $('#econsignee_country').val(data.Consignee_country);
                $('#econsignee_email').val(data.Consignee_email);
                $('#eaddRow1').val(data.hbl_id);
                $('#eaddRow2').val(data.hbl_id);

                var addedDetailIds = [];
                var addedPaidIds = [];

                // Clear existing rows in the first table
                $('#eeditableTableBody1').empty();

                // Populate table rows for the first table
                if (data.hbl_details && data.hbl_details.length > 0) {
                    $.each(data.hbl_details, function(index, detail) {
                        if (addedDetailIds.indexOf(detail.id) === -1) {
                            var newRow = `
                                <tr>
                                    <td><div class="input-group input-group-sm mb-5"><input type="hidden" class="form-control" name="edetails_id[]" value="${detail.id}"></div></td>
                                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="edescription[]" value="${detail.dDescription}"></div></td>
                                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control ecbm" name="ecbm[]" value="${detail.CBM}"></div></td>
                                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control eweight" name="eweight[]" value="${detail.Weight}"></div></td>
                                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control eqty" name="eqty[]" value="${detail.QTY}"></div></td>
                                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control eamount" name="eamount1[]" value="${detail.Amount}"></div></td>
                                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control ecommission" name="ecommission[]" value="${detail.dCommission}"></div></td>
                                    <td><a class="btn btn-icon btn-danger eremoveRow1"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></button></a></td>
                                </tr>`;
                            $('#eeditableTableBody1').append(newRow);
                            addedDetailIds.push(detail.id);
                        }
                    });
                }

                // Clear existing rows in the second table
                $('#eeditableTableBody2').empty();

                // Populate table rows for the second table
                if (data.hbl_paid && data.hbl_paid.length > 0) {
                    $.each(data.hbl_paid, function(index, paid) {
                        if (addedPaidIds.indexOf(paid.id) === -1) {
                            var newRow = `
                                    <tr>
                                        <td><div class="input-group input-group-sm mb-5"><input type="hidden" class="form-control" name="epaid_id[]" value="${paid.id}"></div></td>
                                        <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="edescription2[]" value="${paid.pDescription}"></div></td>
                                        <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control eamount2" name="eamount2[]" value="${paid.Amount}"></div></td>
                                        <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control ecommission2" name="ecommission2[]" value="${paid.pCommission}"></div></td>
                                        <td><a class="btn btn-icon btn-danger eremoveRow2"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>
                                    </tr>`;
                            $('#eeditableTableBody2').append(newRow);
                            addedPaidIds.push(paid.id);
                        }
                    });
                }

                // Attach input change listeners and recalculate totals
                attachInputChangeListenerE1();
                attachInputChangeListenerE2();
                calculateETotals1();
                calculateETotals2();
            }, 'json');
        });

        // Function to add rows to Table 1 in Edit Modal

        $('#hblTable tbody').on('click', '.viewWidgt', function() {
            // Assuming you want to edit details for the first table
            var hbl_id = $(this).data("id");
            $.post("code-hbl.php", {
                action: 'view',
                hbl_id: hbl_id
            }, function(data) {
                // Populate modal with expense data for editing
                $('#viewHBLModal').modal('show');
                console.log(data); // Log received data in console
                // Populate modal fields with data
                $('#vhbl_id').val(data.hbl_id);
                $('#vcode').text(data.code);
                $('#vdate').text(data.Date);
                $('#vcode2').text(data.code);
                $('#vdate2').text(data.Date);
                $('#vemp_name').text(data.emp_name);
                $('#vbill_no').text(data.Bill_no);
                $('#hblamount').text(data.currency + ' ' + data.hbl_amount);
                $('#vdiscount').text(data.currency + ' ' + data.Discount);
                $('#vbalance').text(data.currency + ' ' + data.Balance);
                $('#vbalance2').text(data.currency + ' ' + data.Balance);
                $('#vshipping').text(data.Shipping);
                $('#vclearance').text(data.Clearance);
                $('#vabranchcity').text(data.abranchcity);
                $('#vc_branch_name').text(data.c_branch_name);
                $('#vc_branch_location').text(data.c_branch_location);
                $('#vc_branch_email').text(data.c_branch_email);
                $('#vc_branch_contact').text(data.c_branch_contact);
                $('#vhbl_type').text(data.HBL_Type);
                $('#vshipper_name').text(data.Shipper_name);
                $('#vshipper_address').text(data.Shipper_address);
                $('#vshipper_mobile').text(data.Shipper_mobile);
                $('#vshipper_pp_nic').text(data.Shipper_pp_nic);
                $('#vshipper_city').text(data.Shipper_city);
                $('#vshipper_country').text(data.Shipper_country);
                $('#vshipper_email').text(data.Shipper_email);
                $('#vconsignee_name').text(data.Consignee_name);
                $('#vconsignee_address').text(data.Consignee_address);
                $('#vconsignee_mobile').text(data.Consignee_mobile);
                $('#vconsignee_ppnic').text(data.Consignee_pp_nic);
                $('#vconsignee_city').text(data.Consignee_city);
                $('#vconsignee_country').text(data.Consignee_country);
                $('#vconsignee_email').text(data.Consignee_email);
                $('#vddistrict').text(data.ddistrict);
                var currency = data.currency;

                // Clear existing rows in the first table
                $('#veditableTableBody1').empty();

                // Populate table rows for the first table
                if (data.hbl_details && data.hbl_details.length > 0) {
                    // Clear existing rows
                    $('#veditableTableBody1').empty();

                    var processedIds = []; // Array to store processed IDs

                    $.each(data.hbl_details, function(index, detail) {
                        // Check if the ID is already processed
                        if (processedIds.indexOf(detail.id) === -1) {
                            var newRow = `
                                    <tr>
                                        <td><label name="vdescription[]">${detail.dDescription}</label></td>
                                        <td class="text-end"><label name="vcbm[]">${detail.CBM}</label></td>
                                        <td class="text-end"><label name="vweight[]">${detail.Weight}</label></td>
                                        <td class="text-end"><label name="vqty[]">${detail.QTY}</label></td>
                                       <td class="text-end">${currency} <label name="vamount1[]">${detail.Amount.toFixed(2)}</label></td>
                                    </tr>`;
                            $('#veditableTableBody1').append(newRow);

                            // Add the ID to processedIds array
                            processedIds.push(detail.id);
                        }
                    });
                }


                // Clear existing rows in expense_paid table
                $('#veditableTableBody2').empty();

                // Populate table rows for expense_paid
                if (data.hbl_paid && data.hbl_paid.length > 0) {
                    // Clear existing rows
                    $('#veditableTableBody2').empty();

                    var processedIdsPaid = {}; // Object to store processed IDs

                    $.each(data.hbl_paid, function(index, paid) {
                        // Check if the ID is already processed
                        if (!processedIdsPaid.hasOwnProperty(paid.id)) {
                            var newRow = `
                                    <tr>
                                        <td><label name="vdescription2[]">${paid.pDescription}</label></td>
                                        <td class="text-end">${currency} <label name="vamount2[]">${paid.Amount.toFixed(2)}</label></td>
                                    </tr>`;
                            $('#veditableTableBody2').append(newRow);

                            // Add the ID to processedIdsPaid object
                            processedIdsPaid[paid.id] = true;
                        }
                    });
                } else {
                    $('#eeditableTable2').hide(); // Hide the table if there is no data
                }


                // Calculate and display totals for the first table
                // Calculate and display totals for the first table
                var cbmTotal = 0;
                var weightTotal = 0;
                var qtyTotal = 0;
                var amountTotal = 0;

                $('#veditableTableBody1 tr').each(function() {
                    cbmTotal += parseFloat($(this).find('label[name="vcbm[]"]').text());
                    weightTotal += parseFloat($(this).find('label[name="vweight[]"]').text());
                    qtyTotal += parseFloat($(this).find('label[name="vqty[]"]').text());
                    amountTotal += parseFloat($(this).find('label[name="vamount1[]"]').text().replace(currency + ' ', ''));
                });

                $('#cbmTotalFooter').text(cbmTotal.toFixed(3));
                $('#weightTotalFooter').text(weightTotal.toFixed(2));
                $('#qtyTotalFooter').text(Math.round(qtyTotal)); // Display qtyTotal as an integer
                $('#amountTotalFooter').text(`${currency} ${amountTotal.toFixed(2)}`);

                // Calculate and display total for the second table
                var netTotal = 0;

                $('#veditableTableBody2 tr').each(function() {
                    netTotal += parseFloat($(this).find('label[name="vamount2[]"]').text().replace(currency + ' ', ''));
                });

                $('#netTotalFooter').text(`${currency} ${netTotal.toFixed(2)}`);

                var hblAmount = parseFloat(data.hbl_amount);
                var discount = parseFloat(data.Discount);
                var hblBalance = parseFloat(data.hbl_balance);
                var totalHblAmount = hblAmount - discount - hblBalance;

                $('#hblamount2').text(`${currency} ${totalHblAmount.toFixed(2)}`);

                generatePDFTAB();
            }, 'json');
        });

        $(document).ready(function() {
        // Global variable to store the current hbl_id
        var currentHblId;

        $('#hblTable tbody').on('click', '.barcodedWidgt', function() {
            // Assuming you want to edit details for the first table
            currentHblId = $(this).data("id"); // Store the hbl_id in a global variable

            // Send AJAX request to fetch data for the clicked row
            $.post("code-hbl.php", {
                action: 'view',
                hbl_id: currentHblId
            }, function(data) {
                // Log received data in console
                console.log(data);

                // Populate modal fields with received data
                $('#bcustomer').text(data.Consignee_name);
                $('#bcbill_no').text(data.Bill_no);
                $('#bdelivery_place').text(data.Consignee_city);
                $('#bddistrict').text(data.ddistrict);

                // Concatenate details for the barcode
                const barcodeData = `${data.Consignee_name}-${data.Bill_no}`;

                // Generate barcode with JsBarcode
                JsBarcode("#barcode", barcodeData, {
                    format: "CODE128",
                    lineColor: "#000",
                    width: 2,
                    height: 100,
                    displayValue: true,
                    textAlign: "center"
                });

                // Show the modal
                $('#viewBarcode').modal('show');
            }, 'json');
        });

        // Print Button Click Event
        $('#printButton').on('click', function() {
            // Send the hbl_id to barcode_pdf.php
            window.open(`barcode_pdf.php?hbl_id=${currentHblId}`, '_blank');
        });
    });




        $('#branch_bill').on('click', function() {
            selectedHblIds = [];

            // Iterate over selected checkboxes and collect HBL IDs
            $('#hblTable tbody input[type="checkbox"].row-checkbox:checked').each(function() {
                selectedHblIds.push($(this).val());
            });

            // Assuming you want to edit details for the first table
            var hbl_ids = selectedHblIds;
            console.log(hbl_ids);

            // Check if selected HBLs are from the same branch
            $.post("code-hbl.php", {
                action: 'check_branch',
                hbl_ids: JSON.stringify(hbl_ids)
            }, function(response) {
                if (response.success) {
                    // Proceed with the AJAX request to get HBL details
                    $.post("code-hbl.php", {
                        action: 'branch_bill_view',
                        hbl_ids: JSON.stringify(hbl_ids)
                    }, function(data) {
                        // Populate modal with expense data for editing
                        $('#viewHBLBranchModal').modal('show');
                        console.log(data); // Log received data in console
                        // Populate modal fields with data

                        $('#c_branch_name').text(data.c_branch_name);
                        $('#c_branch_location').text(data.c_branch_location);
                        $('#c_branch_email').text(data.c_branch_email);
                        $('#c_branch_contact').text(data.c_branch_contact);
                        var currency = data.currency;
                        // Clear existing rows in the first table
                        $('#beditableTableBody1').empty();

                        // Populate table rows for the first table
                        if (data.hbl_details && data.hbl_details.length > 0) {
                            // Clear existing rows
                            $('#beditableTableBody1').empty();

                            var processedIds = []; // Array to store processed IDs

                            $.each(data.hbl_details, function(index, detail) {
                                // Check if the ID is already processed
                                if (processedIds.indexOf(detail.id) === -1) {
                                    var newRow = `
                                <tr>
                                    <td><label name="bdetails_id[]">${detail.id}</label></td>
                                    <td><label name="bdescription[]">${detail.dDescription}</label></td>
                                    <td><label name="bcbm[]">${detail.CBM}</label></td>
                                    <td><label name="bweight[]">${detail.Weight}</label></td>
                                    <td><label name="bqty[]">${detail.QTY}</label></td>
                                    <td>${currency}<label name="bamount1[]">${detail.Amount}</label></td>
                                </tr>`;
                                    $('#beditableTableBody1').append(newRow);

                                    // Add the ID to processedIds array
                                    processedIds.push(detail.id);
                                }
                            });
                        }

                        // Clear existing rows in expense_paid table
                        $('#beditableTableBody2').empty();

                        // Populate table rows for expense_paid
                        if (data.hbl_paid && data.hbl_paid.length > 0) {
                            // Clear existing rows
                            $('#beditableTableBody2').empty();

                            var processedIdsPaid = {}; // Object to store processed IDs

                            $.each(data.hbl_paid, function(index, paid) {
                                // Check if the ID is already processed
                                if (!processedIdsPaid.hasOwnProperty(paid.id)) {
                                    var newRow = `
                                <tr>
                                    <td><label name="bdescription2[]">${paid.pDescription}</label></td>
                                    <td><b>${currency}<label name="bamount2[]">${paid.Amount}</label></b></td>
                                </tr>`;
                                    $('#beditableTableBody2').append(newRow);

                                    // Add the ID to processedIdsPaid object
                                    processedIdsPaid[paid.id] = true;
                                }
                            });
                        } else {
                            $('#beditableTable2').hide(); // Hide the table if there is no data
                        }

                        // Calculate and display totals for the first table
                        var cbmTotal = 0;
                        var weightTotal = 0;
                        var qtyTotal = 0;
                        var amountTotal = 0;

                        $('#beditableTableBody1 tr').each(function() {
                            cbmTotal += parseFloat($(this).find('label[name="bcbm[]"]').text());
                            weightTotal += parseFloat($(this).find('label[name="bweight[]"]').text());
                            qtyTotal += parseFloat($(this).find('label[name="bqty[]"]').text());
                            amountTotal += parseFloat($(this).find('label[name="bamount1[]"]').text().replace(currency + ' ', ''));
                        });

                        $('#bcbmTotalFooter').text(cbmTotal.toFixed(2));
                        $('#bweightTotalFooter').text(weightTotal.toFixed(2));
                        $('#bqtyTotalFooter').text(qtyTotal.toFixed(2));
                        $('#bamountTotalFooter').text(`${currency} ${amountTotal.toFixed(2)}`);


                        // Calculate and display total for the second table
                        var netTotal = 0;

                        $('#beditableTableBody2 tr').each(function() {
                            netTotal += parseFloat($(this).find('label[name="bamount2[]"]').text().replace(currency + ' ', ''));
                        });

                        $('#bnetTotalFooter').text(`${currency} ${netTotal.toFixed(2)}`);



                    }, 'json');
                } else {
                    // Show SweetAlert notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Selection Error',
                        text: 'Please select hbl from the same branch.',
                    });
                }
            }, 'json');
        });


        ///////////////////////////////////////////here now this is not in use///////////////////////////
        $('#hblTable tbody').on('click', '.downloadWidgtt', function() {
            // Assuming you want to edit details for the first table
            var hbl_id = $(this).data("id");
            $.post("code-hbl.php", {
                action: 'view',
                hbl_id: hbl_id
            }, function(data) {
                // Populate modal with expense data for editing
                // Populate modal fields with data
                $('#vvhbl_id').val(data.hbl_id);
                $('#vvcode').text(data.code);
                $('#vvdate').text(data.Date);
                $('#vvcode2').text(data.code);
                $('#vvdate2').text(data.Date);
                $('#vvbill_no').text(data.Bill_no);
                $('#vvshipping').text(data.Shipping);
                $('#vvclearance').text(data.Clearance);
                $('#vvagent').text(data.Agent);

                $('#vvshipper_address').text(data.Shipper_address);
                $('#vvshipper_mobile').text(data.Shipper_mobile);
                $('#vvshipper_city').text(data.Shipper_city);
                $('#vvshipper_country').text(data.Shipper_country);
                $('#vvshipper_pp_nic').text(data.Shipper_pp_nic);

                $('#vvconsignee_address').text(data.Consignee_address);
                $('#vvconsignee_mobile').text(data.Consignee_mobile);
                $('#vvconsignee_city').text(data.Consignee_city);
                $('#vvconsignee_country').text(data.Consignee_country);
                $('#vvconsignee_ppnic').text(data.Consignee_pp_nic);
                var currency = data.currency;
                // Clear existing rows in the first table
                $('#vveditableTableBody1').empty();

                // Populate table rows for the first table
                if (data.hbl_details && data.hbl_details.length > 0) {
                    // Clear existing rows
                    $('#vveditableTableBody1').empty();

                    var processedIdsDetails = {}; // Object to store processed IDs

                    $.each(data.hbl_details, function(index, detail) {
                        // Check if the ID is already processed
                        if (!processedIdsDetails.hasOwnProperty(detail.id)) {
                            var newRow = `
                                    <tr>
                                        <td><label name="vvdetails_id[]">${detail.id}</label></td>
                                        <td><label name="vvdescription[]">${detail.dDescription}</label></td>
                                        <td><label name="vvcbm[]">${detail.CBM}</label></td>
                                        <td><label name="vvweight[]">${detail.Weight}</label></td>
                                        <td><label name="vvqty[]">${detail.QTY}</label></td>
                                        <td>${currency}<label name="vvamount1[]">${detail.Amount}</label></td>
                                    </tr>`;
                            $('#vveditableTableBody1').append(newRow);

                            // Add the ID to processedIdsDetails object
                            processedIdsDetails[detail.id] = true;
                        }
                    });
                }


                // Clear existing rows in expense_paid table
                $('#vveditableTableBody2').empty();

                // Populate table rows for expense_paid
                if (data.hbl_paid && data.hbl_paid.length > 0) {
                    // Clear existing rows
                    $('#vveditableTableBody2').empty();

                    var processedIdsPaid = {}; // Object to store processed IDs

                    $.each(data.hbl_paid, function(index, paid) {
                        // Check if the ID is already processed
                        if (!processedIdsPaid.hasOwnProperty(paid.hbl_id)) {
                            var newRow = `
                                    <tr>
                                        <td><label class="form-control" name="vdescription2[]">${paid.pDescription}</label></td>
                                        <td><b>${currency}<label class="form-control" name="vamount2[]">${paid.Amount}</label></b></td>
                                    </tr>`;
                            $('#vveditableTableBody2').append(newRow);

                            // Add the ID to processedIdsPaid object
                            processedIdsPaid[paid.hbl_id] = true;
                        }
                    });
                } else {
                    $('#eeditableTable2').hide(); // Hide the table if there is no data
                }


                // Calculate and display totals for the first table
                // Calculate and display totals for the first table
                var vcbmTotal = 0;
                var vweightTotal = 0;
                var vqtyTotal = 0;
                var vamountTotal = 0;

                $('#vveditableTableBody1 tr').each(function() {
                    vcbmTotal += parseFloat($(this).find('label[name="vvcbm[]"]').text());
                    vweightTotal += parseFloat($(this).find('label[name="vvweight[]"]').text());
                    vqtyTotal += parseFloat($(this).find('label[name="vvqty[]"]').text());
                    vamountTotal += parseFloat($(this).find('label[name="vvamount1[]"]').text().replace(currency + ' ', ''));
                });

                $('#vvcbmTotalFooter').text(vcbmTotal.toFixed(3));
                $('#vvweightTotalFooter').text(vweightTotal.toFixed(2));
                $('#vvqtyTotalFooter').text(Math.round(vqtyTotal));
                $('#vvamountTotalFooter').text(`${currency} ${vamountTotal.toFixed(2)}`);

                // Calculate and display total for the second table
                var netTotal = 0;

                $('#veditableTableBody2 tr').each(function() {
                    netTotal += parseFloat($(this).find('label[name="Vvdmount2[]"]').text().replace(currency + ' ', ''));
                });

                $('#netTotalFooter').text(`${currency} ${netTotal.toFixed(2)}`);


            }, 'json');
        });
        //////////////////////////////////////////////////////not in use end/////////////////////////////
        $('#hblTable tbody').on('click', '.showWidgt', function() {
            // Assuming you want to edit details for the first table
            var hbl_id = $(this).data("id");
            $.post("code-booking.php", {
                action: 'view',
                hbl_id: hbl_id
            }, function(data) {
                // Populate modal with expense data for editing
                $('#viewSCModal').modal('show');
                console.log(data); // Log received data in console
                // Populate modal fields with data
                $('#shdate').text(data.hbl_date);
                $('#sbill_no').text(data.Bill_no);
                $('#scode').text(data.code);
                $('#sshipping').text(data.Shipping);
                $('#sclearance').text(data.Clearance);
                $('#semployee').text(data.Sales_rep);
                $('#scustomer_ref').text(data.Cus_Reference);
                $('#sdistrict').text(data.district);
                $('#shbl_type').text(data.HBL_Type);
                $('#sh_amount').text(data.currency + ' ' + data.h_amount);
                $('#sbalance').text(data.currency + ' ' + data.balance);
                $('#sshipper_name').text(data.Shipper_name);
                $('#sshipper_address').text(data.Shipper_address);
                $('#sshipper_mobile').text(data.Shipper_mobile);
                $('#sshipper_pp_nic').text(data.Shipper_pp_nic);
                $('#sshipper_city').text(data.Shipper_city);
                $('#sshipper_country').text(data.Shipper_country);
                $('#sshipper_email').text(data.Shipper_email);
                $('#sconsignee_name').text(data.Consignee_name);
                $('#sconsignee_address').text(data.Consignee_address);
                $('#sconsignee_mobile').text(data.Consignee_mobile);
                $('#sconsignee_ppnic').text(data.Consignee_pp_nic);
                $('#sconsignee_city').text(data.Consignee_city);
                $('#sconsignee_country').text(data.Consignee_country);
                $('#sconsignee_email').text(data.Consignee_email);
                var currency = data.currency;
                // Clear existing rows in the first table

                $('#seditableTableBody1').empty();

                // Populate table rows for the first table
                if (data.hbl_details && data.hbl_details.length > 0) {
                    // Clear existing rows
                    $('#seditableTableBody1').empty();

                    var processedIds = []; // Array to store processed IDs

                    $.each(data.hbl_details, function(index, detail) {
                        // Check if the ID is already processed
                        if (processedIds.indexOf(detail.id) === -1) {
                            var newRow = `
                                    <tr>
                                        <td><label name="vdescription[]">${detail.dDescription}</label></td>
                                        <td><label name="vcbm[]">${detail.CBM}</label></td>
                                        <td><label name="vweight[]">${detail.Weight}</label></td>
                                        <td><label name="vqty[]">${detail.QTY}</label></td>
                                        <td>${currency}<label name="vamount1[]">${detail.Amount}</label></td>
                                    </tr>`;
                            $('#seditableTableBody1').append(newRow);

                            // Add the ID to processedIds array
                            processedIds.push(detail.id);
                        }
                    });
                }


                // Clear existing rows in expense_paid table
                $('#seditableTableBody2').empty();

                // Populate table rows for expense_paid
                if (data.hbl_paid && data.hbl_paid.length > 0) {
                    // Clear existing rows
                    $('#seditableTableBody2').empty();

                    var processedIdsPaid = {}; // Object to store processed IDs

                    $.each(data.hbl_paid, function(index, paid) {
                        // Check if the ID is already processed
                        if (!processedIdsPaid.hasOwnProperty(paid.id)) {
                            var newRow = `
                                    <tr>
                                        <td><label name="vdescription2[]">${paid.pDescription}</label></td>
                                        <td><b>${currency}<label name="vamount2[]">${paid.Amount}</label></b></td>
                                    </tr>`;
                            $('#seditableTableBody2').append(newRow);

                            // Add the ID to processedIdsPaid object
                            processedIdsPaid[paid.id] = true;
                        }
                    });
                }



            }, 'json');
        });


        // Add row in expense_details table
        // Add row in HBL details table
        $('#editHBLModal').on('click', '#eaddRow1', function(event) {
            var tableBody = $('#eeditableTableBody1');
            var buttonValue = $(this).val();
            var newRow = `
            <tr>
                <td><div class="input-group input-group-sm mb-5"><input type="hidden" class="form-control" name="hbl_id_fk1[]" value="${buttonValue}" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="edescription[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control ecbm" name="ecbm[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control eweight" name="eweight[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control eqty" name="eqty[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control eamount" name="eamount[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control ecommission" name="ecommission[]" required></div></td>
                <td><a class="btn btn-icon btn-success eaddedRow1"><i class="fad fa-check-circle fs-2qx"></i></a></td>
                <td><a class="btn btn-icon btn-danger eremoveRow1"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>
            </tr>`;
            tableBody.append(newRow);
            attachInputChangeListenerE1();
            calculateETotals1();
        });

        // Function to remove rows from Table 1 in Edit Modal
        $('#editHBLModal').on('click', '.eremoveRow1', function(event) {
            $(this).closest('tr').remove();
            calculateETotals1();
        });

        // Function to add rows to Table 2 in Edit Modal
        $('#editHBLModal').on('click', '#eaddRow2', function(event) {
            var tableBody = $('#eeditableTableBody2');
            var buttonValue = $(this).val();
            var newRow = `
            <tr>
                <td><div class="input-group input-group-sm mb-5"><input type="hidden" class="form-control" name="hbl_id_fk2[]" value="${buttonValue}" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="edescription2[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control eamount2" name="eamount2[]" required></div></td>
                <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control ecommission2" name="ecommission2[]" required></div></td>
                <td><a class="btn btn-icon btn-success eaddedRow2"><i class="fad fa-check-circle fs-2qx"></i></a></td>
                <td><a class="btn btn-icon btn-danger eremoveRow2"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>
            </tr>`;
            tableBody.append(newRow);
            attachInputChangeListenerE2();
            calculateETotals2();
        });

        // Function to remove rows from Table 2 in Edit Modal
        $('#editHBLModal').on('click', '.eremoveRow2', function(event) {
            $(this).closest('tr').remove();
            calculateETotals2();
        });

        // Function to calculate totals for Table 1 in Edit Modal
        function calculateETotals1() {
            var totalECBM = 0;
            var totalEWeight = 0;
            var totalEQTY = 0;
            var totalEAmount = 0;
            var totalECommission = 0;

            $('#eeditableTableBody1 tr').each(function() {
                var ecbm = parseFloat($(this).find('.ecbm').val()) || 0;
                var eweight = parseFloat($(this).find('.eweight').val()) || 0;
                var eqty = parseFloat($(this).find('.eqty').val()) || 0;
                var eamount = parseFloat($(this).find('.eamount').val()) || 0;
                var ecommission = parseFloat($(this).find('.ecommission').val()) || 0;

                totalECBM += ecbm;
                totalEWeight += eweight;
                totalEQTY += eqty;
                totalEAmount += eamount;
                totalECommission += ecommission;
            });

            $('#totalECBM1').text(totalECBM.toFixed(2));
            $('#totalEWeight1').text(totalEWeight.toFixed(2));
            $('#totalEQTY1').text(totalEQTY.toFixed(2));
            $('#totalEAmount1').text(totalEAmount.toFixed(2));
            $('#totalECommission1').text(totalECommission.toFixed(2));
            updateEmamount();
        }

        // Function to calculate totals for Table 2 in Edit Modal
        function calculateETotals2() {
            var totalEAmount2 = 0;
            var totalECommission2 = 0;

            $('#eeditableTableBody2 tr').each(function() {
                var eamount2 = parseFloat($(this).find('.eamount2').val()) || 0;
                var ecommission2 = parseFloat($(this).find('.ecommission2').val()) || 0;

                totalEAmount2 += eamount2;
                totalECommission2 += ecommission2;
            });

            $('#totalEAmount2').text(totalEAmount2.toFixed(2));
            $('#totalECommission2').text(totalECommission2.toFixed(2));
            updateEmamount();
        }

        // Function to update the emamount input field
        function updateEmamount() {
            var totalEAmount1 = parseFloat($('#totalEAmount1').text()) || 0;
            var totalECommission1 = parseFloat($('#totalECommission1').text()) || 0;
            var totalEAmount2 = parseFloat($('#totalEAmount2').text()) || 0;
            var totalECommission2 = parseFloat($('#totalECommission2').text()) || 0;

            var finalEAmount = (totalEAmount1 + totalEAmount2) - (totalECommission1 + totalECommission2);
            $('#emamount').val(finalEAmount.toFixed(2));
        }

        // Attach input change listeners to new rows in Table 1 (Edit Modal)
        function attachInputChangeListenerE1() {
            $('#eeditableTableBody1').on('input', '.ecbm, .eweight, .eqty, .eamount, .ecommission', function() {
                calculateETotals1();
            });
        }

        // Attach input change listeners to new rows in Table 2 (Edit Modal)
        function attachInputChangeListenerE2() {
            $('#eeditableTableBody2').on('input', '.eamount2, .ecommission2', function() {
                calculateETotals2();
            });
        }

        // Initial call to attach listeners to existing rows (if any)
        attachInputChangeListenerE1();
        attachInputChangeListenerE2();

        // Add row in expense_details table
        $('#editHBLModal').on('click', '.eaddedRow1', function(event) {
            var rowData = {
                hbl_id: $(this).closest('tr').find('input[name="hbl_id_fk1[]"]').val(),
                ddescription: $(this).closest('tr').find('input[name="edescription[]"]').val(),
                cbm: $(this).closest('tr').find('input[name="ecbm[]"].form-control.ecbm').val(),
                weight: $(this).closest('tr').find('input[name="eweight[]"].form-control.eweight').val(),
                qty: $(this).closest('tr').find('input[name="eqty[]"].form-control.eqty').val(),
                amount: $(this).closest('tr').find('input[name="eamount[]"].form-control.eamount').val(),
                commission: $(this).closest('tr').find('input[name="ecommission[]"].form-control.ecommission').val()
            };

            attachInputChangeListenerE1();
            calculateETotals1();

            $.post("insert_hbl_details.php", {
                rowData: rowData
            }, function(response) {
                // Handle response from server
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: 'Expense paid details added successfully',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em'
                });
            });
        });

        // Add row in expense_paid table
        $('#editHBLModal').on('click', '.eaddedRow2', function(event) {
            var rowData = {
                hbl_id: $(this).closest('tr').find('input[name="hbl_id_fk2[]"]').val(),
                description: $(this).closest('tr').find('input[name="edescription2[]"]').val(),
                amount: $(this).closest('tr').find('input[name="eamount2[]"].form-control.eamount2').val(),
                commission: $(this).closest('tr').find('input[name="ecommission2[].form-control.ecommission2"]').val()
            };

            attachInputChangeListenerE2();
            calculateETotals2();

            $.post("insert_hbl_paid.php", {
                rowData: rowData
            }, function(response) {
                // Handle response from server
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: 'Expense paid details added successfully',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em'
                });
            });
        });

        // Update Employee
        $("#updateHBL").click(function() {
            $.post("code-hbl.php", $("#editHBLForm").serialize() + '&action=update', function(response) {
                // Refresh DataTable after update
                Swal.fire({
                    icon: 'success',
                    padding: '2em',
                    title: 'Success!',
                    text: 'Record updated succesfull',
                    showConfirmButton: true
                }).then(function() {
                    $('#editHBLModal').modal('hide');
                    // Clear the form fields
                    table.ajax.reload();
                });
            });
        });

        // Remove row in expense_details table
        $('#editHBLModal').on('click', '.eremoveRow1', function(event) {
            $(this).closest('tr').remove();
            // Call function to delete row from database
            deleteTableRow('hbl_details', $(this).closest('tr').find('input[name="edetails_id[]"]').val());
        });

        // Remove row in expense_paid table
        $('#editHBLModal').on('click', '.eremoveRow2', function(event) {
            $(this).closest('tr').remove();
            // Call function to delete row from database
            deleteTableRow('hbl_paid', $(this).closest('tr').find('input[name="epaid_id[]"]').val());
        });

        // Function to delete row from database via AJAX
        function deleteTableRow(table, id) {
            $.post("code-hbl.php", {
                action: 'table_delete',
                table: table,
                id: id
            }, function(data) {
                // Check if deletion was successful
                if (data.success) {
                    // Display success toast message
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    });

                    toast({
                        type: 'success',
                        title: 'Row deleted successfully',
                        padding: '2em',
                    });

                    console.log('Row deleted successfully');
                } else {
                    console.error('Error deleting row:', data.error);
                }
            }, 'json');
        }



        // Delete Employee



        $('#hblTable tbody').on('click', '.deleteWidgt', function() {
            var widgt_id = $(this).data("id");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("code-hbl.php", {
                        action: 'delete',
                        widgt_id: widgt_id
                    }, function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        table.ajax.reload();
                    });
                }
            });
        });



    });
</script>

</body>

</html>