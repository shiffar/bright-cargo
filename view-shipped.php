<?php $title = 'shipped'; // Default title?>
<!DOCTYPE html>

<html lang="en">
    
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
                                                    Shipped </li>
                                                <!--end::Item-->

                                            </ul>
                                            <!--end::Breadcrumb-->
                                        </div>
                                        <!--end::Page title-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        <?php
                                        if(isset($_SESSION['is_admin'])) {
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
if(isset($_SESSION['auth_user'])) {
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
                                        
                                           
                                            <?php
                                                if(isset($_SESSION['is_admin'])) {
                                                    ?>
                                                        <div aria-label="Status Buttons">
                                                            <a href="#" class="btn btn-outline btn-active-light-warning bg-body btn-active-icon-warning update-status" data-status="delivered">
                                                                <i class="fad fa-shipping-fast fs-1"></i>
                                                                <span class="badge badge-light-warning">Deliverd</span>
                                                            </a>

                                                            
                                                        </div>
                                                    <?php
                                                }
                                            ?>

                                            <?php
                                                if(isset($_SESSION['is_employee'])) {
                                                    ?>
                                                        <div aria-label="Status Buttons">
                                                        <a href="#" class="btn btn-outline btn-active-light-warning bg-body btn-active-icon-warning update-status" data-status="delivered-pending">
                                                            <i class="fad fa-shipping-fast fs-1"></i>
                                                            <span class="badge badge-light-warning">Deliverd</span>
                                                        </a>

                                                            

                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                            

                                            <button type="button" class="btn btn-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>Export Report
                                            </button>
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

                                            
                                            <div class="modal bg-body fade" tabindex="-1" id="editHBLModal">
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
                                                           
                                                                <h5 class="modal-title">HBL details</h5>

                                                                <div class="separator my-10"></div>
                                                                <!-- Fields for editing HBL details -->
                                                                <input type="hidden" id="hbl_id" name="hbl_id">
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="Date">Date</label>
                                                                                <input type="date" class="form-control form-control-solid" id="edate" name="edate" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="BillNo">Bill No</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ebill_no" name="ebill_no" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="Shipping">Shipping</label>
                                                                                <select class="form-control form-control-solid" id="eshipping" name="eshipping">
                                                                                    <option value="sea">Sea</option>
                                                                                    <option value="air">Air</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="Clearance">Clearance</label>
                                                                                <select class="form-control form-control-solid" id="eclearance" name="eclearance">
                                                                                    <option value="own">Own</option>
                                                                                    <option value="dtd">DTD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="Agent">Agent</label>
                                                                                <select class="form-control form-control-solid" id="eagent" name="eagent" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="Location">Location</label>
                                                                                <select class="form-control form-control-solid" id="elocation" name="elocation" data-control="select2" data-dropdown-parent="#editHBLModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                </select>
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
                                                                                <label for="Discount">Discount</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ediscount" name="ediscount" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="Note">Note</label>
                                                                                <input type="text" class="form-control form-control-solid" id="enote" name="enote" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="HBLType">HBL Type</label>
                                                                                <select class="form-control form-control-solid" id="ehbl_type" name="ehbl_type">
                                                                                    <option value="office">Office</option>
                                                                                    <option value="dtd">Door to Door</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <h5 class="modal-title">Sender details</h5>
                                                                <div class="separator my-10"></div>
                                                                    <!--begin::Close-->
                                                                    
                                                                    <!--end::Close-->
                                                                <!-- Fields for editing Shipper -->
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
                                                                <h5 class="modal-title">Reciver details</h5>
                                                                <div class="separator my-10"></div>
                                                                    <!--begin::Close-->
                                                                    
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
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h5 class="modal-title">Payment details</h5>
                                                                <div class="separator my-10"></div>
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="Amount">Amount</label>
                                                                                <input type="text" class="form-control form-control-solid" id="emamount" name="emamount" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
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
                                                            <a href="#" class="btn btn-active-icon-dark btn-text-dark"  data-bs-dismiss="modal">
                                                                <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                Close
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" tabindex="-1" id="addShippingDetailsModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Shipping details</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="shippingDetailsAddForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="shippingDate">Shipping Date</label>
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="shipping_date" name="shipping_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="shippingBy">Shipping By</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="shipping_by" name="shipping_by" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="shippingType">Shipping Type</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="shipping_type" name="shipping_type" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="shippingNo">Shipping No</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="shipping_no" name="shipping_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="fileNo">File No</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="file_no" name="file_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="feetWeight">Feet/Weight</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="feet_weight" name="feet_weight" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="freightCharge">Freight Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="freight_charge" name="freight_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="clearanceCharge">Clearance Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="clearance_charge" name="clearance_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="bookingCharge">Booking Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="booking_charge" name="booking_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="loadingCharge">Loading Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="loading_charge" name="loading_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="seal">Seal</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="seal" name="seal" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="estimatedDate">Estimated Date</label>
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="estimated_date" name="estimated_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="deliveredDate">Delivered Date</label>
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="delivered_date" name="delivered_date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="shippingDescription">Shipping Description</label>
                                                                            <textarea class="form-control form-control-lg form-control-solid" id="shipping_description" name="shipping_description" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveShippingDetails">
                                                                        <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                        Save changes
                                                                    </a>
                                                                    <a href="#" class="btn btn-active-icon-dark btn-text-dark"  data-bs-dismiss="modal">
                                                                        <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                        Close
                                                                    </a>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" tabindex="-1" id="updateShippingDetailsModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Update Shipping details</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="shippingDetailsUpdateForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingDate">Shipping Date</label>
                                                                            <input type="hidden" id="eid" name="eid">
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="eshipping_date" name="eshipping_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingBy">Shipping By</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="eshipping_by" name="eshipping_by" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingType">Shipping Type</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="eshipping_type" name="eshipping_type" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingNo">Shipping No</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="eshipping_no" name="eshipping_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateFileNo">File No</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="efile_no" name="efile_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateFeetWeight">Feet/Weight</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="efeet_weight" name="efeet_weight" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateFreightCharge">Freight Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="efreight_charge" name="efreight_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateClearanceCharge">Clearance Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="eclearance_charge" name="eclearance_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateBookingCharge">Booking Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="ebooking_charge" name="ebooking_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateLoadingCharge">Loading Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-lg form-control-solid" id="eloading_charge" name="eloading_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateSeal">Seal</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="eseal" name="eseal" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateEstimatedDate">Estimated Date</label>
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="eestimated_date" name="eestimated_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateDeliveredDate">Delivered Date</label>
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="edelivered_date" name="edelivered_date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingDescription">Shipping Description</label>
                                                                            <textarea class="form-control form-control-lg form-control-solid" id="eshipping_description" name="eshipping_description" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateShippingDetails">
                                                                        <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                        Save changes
                                                                    </a>
                                                                    <a href="#" class="btn btn-active-icon-dark btn-text-dark"  data-bs-dismiss="modal">
                                                                        <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                        Close
                                                                    </a>
                                                                </div>
                                                            </form>
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
                                                    <table id="shippingDetailsTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                        <th class="min-w-100px">#</th>
                                                                <th>Date</th>
                                                                <th>Bill No</th>
                                                                <th>Code</th>
                                                                <th>Sales Rep</th>
                                                                <th>Agent</th>
                                                                <th>Shipper</th>
                                                                <th>Consignee</th>
                                                                <th>Destination</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
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
            $(document).ready(function() {

                $.ajax({
                    url: 'get_agent.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if(data && data.length > 0) {
                            var options = '';
                            $.each(data, function(index, agent) {
                                options += '<option value="' + agent.agent_id + '">' + agent.name + '</option>';
                            });
                            $('#eagent').append(options);
                        } else {
                            $('#eagent').append('<option value="">No agents found</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

                $('#eagent').on('change', function() {
                    var agentId = $(this).val();
                    
                    // Make AJAX request to fetch agent address data
                    $.ajax({
                        url: 'get_location.php',
                        type: 'GET',
                        dataType: 'json',
                        data: { agent_id: agentId }, // Pass selected agent ID to PHP script
                        success: function(data) {
                            // Clear existing options
                            $('#elocation').empty();
                            
                            if(data && data.length > 0) {
                                var options = '';
                                $.each(data, function(index, address) {
                                    options += '<option value="' + address.agent_address_id + '">' + address.address + ', ' + address.city + ', ' + address.country + '</option>';
                                });
                                $('#elocation').append(options);
                            } else {
                                $('#elocation').append('<option value="">No addresses found</option>');
                            }
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
                    if(data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, employees) {
                            options += '<option value="' + employees.employee_id + '">' + employees.name + '</option>';
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
                url: 'get_customer.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, customers) {
                            options += '<option value="' + customers.id + '">' + customers.name + '</option>';
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

                $('#ecus_reference').on('select2:select', function (e) {
                    var customer_id = e.params.data.id;

                    // Fetch customer details
                    $.ajax({
                        url: 'get_customer_details.php', // PHP script to fetch customer details by ID
                        type: 'GET',
                        dataType: 'json',
                        data: { customer_id: customer_id },
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


                // DataTable initialization
                var table = $('#shippingDetailsTable').DataTable({
                    responsive: true,
                "ajax": {
                    "url": "code-shipped-details.php",
                    "type": "POST",
                    "data": { action: 'fetch' }, // Fetch HBL data
                    "dataSrc": ""
                },
                "columns": [
                    { 
                        "data": "hbl_id",
                        "render": function(data, type, full, meta) {
                            return '<input type="checkbox" class="row-checkbox" value="' + data + '">';
                        }
                    },
                    { "data": "Date", },
                    { "data": "Bill_no" },
                    { "data": "code" },
                    { "data": "emp_name" },
                    { "data": "agent_name" },
                    { "data": "Shipper_name" },
                    { "data": "Consignee_name" },
                    { "data": "lcity" },
                    { "data": "total_amount" }, // Total Amount
                    { 
                        "data": "current_status",
                        "render": function(data, type, full, meta) {
                        var badgeClass = '';
                        var badgeText = '';

                        switch(data) {
                            case 'shipped':
                                badgeClass = 'badge badge-light-info';
                                badgeText = 'Shipped';
                                break;
                            case 'delivered':
                                badgeClass = 'badge badge-light-warning';
                                badgeText = 'Delivered';
                                break;
                            case 'shipped-pending':
                                badgeClass = 'badge badge-light-warning';
                                badgeText = 'Shipped-pending';
                                break;
                            case 'delivered-pending':
                                badgeClass = 'badge badge-light-warning';
                                badgeText = 'Delivered-pending';
                                break;
                        }

                        return '<span class="' + badgeClass + '">' + badgeText + '</span>';
                    }

                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                                var accessDenied = <?php echo $access_denied ? 'true' : 'false'; ?>;
                                var buttons = '';

                                // If user has access_denied permission, return the button
                                if (accessDenied) {
                                    return buttons;
                                }

                                // Render edit button if user has edit permission
                                if (<?php echo $can_edit || $can_add_edit || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                    buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editWidgt" data-id="${data.hbl_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                }

                                // Render delete button if user has delete permission
                                

                                // Return the buttons
                                return buttons;
                            }
                    }

                    ],
                    "language": {
                        "lengthMenu": "Show _MENU_",
                    },
                    "dom":
                        "<'row mb-2'" +
                        "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                        "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                        ">" +
                        "<'table-responsive'tr>" +
                        "<'row'" +
                        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                        ">"
                });

                 // Handle row checkbox click event
             $('.update-status').on('click', function() {
                var selectedHblIds = [];

                // Iterate over selected checkboxes and collect HBL IDs
                $('#shippingDetailsTable tbody input[type="checkbox"].row-checkbox:checked').each(function() {
                    selectedHblIds.push($(this).val());
                });

                if (selectedHblIds.length > 0) {
                    var status = $(this).data('status');

                    // Send Ajax request to update status
                    $.ajax({
                        url: 'update-status.php',
                        type: 'POST',
                        data: { hblIds: selectedHblIds, status: status },
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
                                table_load.ajax.reload();
                                table_deliverd.ajax.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    alert('Please select at least one row.');
                }
            });

            var exportButtons = () => {
                const documentTitle = 'HBL Orders Report';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
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
                                $('row c', sheet).each(function () {
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



            $('#shippingDetailsTable tbody').on('click', '.editWidgt', function() {
                // Assuming you want to edit details for the first table
                var hbl_id = $(this).data("id");
                $.post("code-hbl.php", { action: 'edit', hbl_id: hbl_id }, function(data) {
                    console.log(data); // Check if data is received correctly
                    // Populate modal with expense data for editing
                    $('#editHBLModal').modal('show');
                    $('#hbl_id').val(data.hbl_id);
                    $('#edate').val(data.Date);
                    $('#ebill_no').val(data.Bill_no);
                    $('#eshipping').val(data.Shipping);
                    $('#eclearance').val(data.Clearance);
                    $('#eagent').val(data.Agent);
                    // Clear previous selected option
                    $('#eagent').val(null).trigger('change');

                    // Set selected option in Select2 dropdown
                    $('#eagent').val(data.Agent).trigger('change');
                    $('#elocation').val(data.Location);
                    // Clear previous selected option
                    $('#elocation').val(null).trigger('change');

                    // Set selected option in Select2 dropdown
                    $('#elocation').val(data.Location).trigger('change');


                    $('#esales_rep').val(data.Sales_rep);
                    // Clear previous selected option
                    $('#esales_rep').val(null).trigger('change');

                    // Set selected option in Select2 dropdown
                    $('#esales_rep').val(data.Sales_rep).trigger('change');


                    $('#ecus_reference').val(data.Cus_Reference);
                    // Clear previous selected option
                    $('#ecus_reference').val(null).trigger('change');

                    // Set selected option in Select2 dropdown
                    $('#ecus_reference').val(data.Cus_Reference).trigger('change');


                    $('#eestimated_date').val(data.Estimated_date);
                    $('#edelivered_date').val(data.Delivered_date);
                    $('#ediscount').val(data.Discount);
                    $('#enote').val(data.Note);
                    $('#ehbl_type').val(data.HBL_Type);
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
                                    <td><input type="text" class="form-control" name="edetails_id[]" value="${detail.id}"></td>
                                    <td><input type="text" class="form-control" name="edescription[]" value="${detail.dDescription}"></td>
                                    <td><input type="text" class="form-control" name="ecbm[]" value="${detail.CBM}"></td>
                                    <td><input type="text" class="form-control" name="eweight[]" value="${detail.Weight}"></td>
                                    <td><input type="text" class="form-control" name="eqty[]" value="${detail.QTY}"></td>
                                    <td><input type="text" class="form-control" name="eamount1[]" value="${detail.Amount}"></td>
                                    <td><input type="text" class="form-control" name="ecommission[]" value="${detail.dCommission}"></td>
                                    <td><button type="button" class="btn btn-danger eremoveRow1"><i class="fad fa-trash-alt"></i></button></td>
                                </tr>`;
                            $('#eeditableTableBody1').append(newRow);
                            // Add the detail ID to the list of added IDs
                            addedDetailIds.push(detail.id);
                            }
                            
                        });
                    } else {
                        // If no data in hbl_details, add a single empty row
                        var emptyRow = `
                            <tr>
                                <td><input type="text" class="form-control" name="edetails_id[]" value=""></td>
                                <td><input type="text" class="form-control" name="edescription[]" value=""></td>
                                <td><input type="text" class="form-control" name="ecbm[]" value=""></td>
                                <td><input type="text" class="form-control" name="eweight[]" value=""></td>
                                <td><input type="text" class="form-control" name="eqty[]" value=""></td>
                                <td><input type="text" class="form-control" name="eamount1[]" value=""></td>
                                <td><input type="text" class="form-control" name="ecommission[]" value=""></td>
                                <td><button type="button" class="btn btn-danger eremoveRow1"><i class="fad fa-trash-alt"></i></button></td>
                            </tr>`;
                        $('#eeditableTableBody1').append(emptyRow);
                    }

                    // Clear existing rows in expense_paid table
                    $('#eeditableTableBody2').empty();
                    // Populate table rows for expense_paid
                    if (data.hbl_paid && data.hbl_paid.length > 0) {
                        $.each(data.hbl_paid, function(index, paid) {
                            // Check if the paid ID has already been added
                            if (addedPaidIds.indexOf(paid.id) === -1) {
                                var newRow = `
                                    <tr>
                                        <td><input type="text" class="form-control" name="epaid_id[]" value="${paid.id}"></td>
                                        <td><input type="text" class="form-control" name="edescription2[]" value="${paid.pDescription}"></td>
                                        <td><input type="text" class="form-control" name="eamount2[]" value="${paid.Amount}"></td>
                                        <td><input type="text" class="form-control" name="ecommission2[]" value="${paid.pCommission}"></td>
                                        <td><button type="button" class="btn btn-danger eremoveRow2"><i class="fad fa-trash-alt"></i></button></td>
                                    </tr>`;
                                $('#eeditableTableBody2').append(newRow);
                                // Add the paid ID to the list of added IDs
                                addedPaidIds.push(paid.id);
                            }
                        });
                    } else {
                        $('#eeditableTable2').hide(); // Hide the table if there is no data
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
                        <td><input type="text" class="form-control" name="hbl_id_fk1[]" value="${buttonValue}" required></td>
                        <td><input type="text" class="form-control" name="edescription[]" required></td>
                        <td><input type="text" class="form-control" name="ecbm[]" required></td>
                        <td><input type="text" class="form-control" name="eweight[]" required></td>
                        <td><input type="text" class="form-control" name="eqty[]" required></td>
                        <td><input type="text" class="form-control" name="eamount[]" required></td>
                        <td><input type="text" class="form-control" name="ecommission[]" required></td>
                        <td><button type="button" class="btn btn-success eaddedRow1"><i class="fad fa-check-circle"></i></button></td>
                        <td><button type="button" class="btn btn-danger eremoveRow1"><i class="fad fa-trash-alt"></i></button></td>
                    </tr>`;
                
                tableBody.append(newRow);
            });

            // Remove row in HBL details table
            $('#editHBLModal').on('click', '.eremoveRow3', function(event) {
                $(this).closest('tr').remove();
            });

            // Add row in HBL paid table
            $('#editHBLModal').on('click', '#eaddRow2', function(event) {
                var tableBody = $('#eeditableTableBody2');
                var buttonValue = $(this).val();

                var newRow = `
                    <tr>
                        <td><input type="text" class="form-control" name="hbl_id_fk2[]" value="${buttonValue}" required></td>
                        <td><input type="text" class="form-control" name="edescription2[]" required></td>
                        <td><input type="text" class="form-control" name="eamount2[]" required></td>
                        <td><input type="text" class="form-control" name="ecommission2[]" required></td>
                        <td><button type="button" class="btn btn-success eaddedRow2"><i class="fad fa-check-circle"></i></button></td>
                        <td><button type="button" class="btn btn-danger eremoveRow4"><i class="fad fa-trash-alt"></i></button></td>
                    </tr>`;
                
                tableBody.append(newRow);
            });

            // Remove row in HBL paid table
            $('#editHBLModal').on('click', '.eremoveRow4', function(event) {
                $(this).closest('tr').remove();
            });


            // Add row in expense_details table
            $('#editHBLModal').on('click', '.eaddedRow1', function(event) {
                var rowData = {
                    hbl_id: $(this).closest('tr').find('input[name="hbl_id_fk1[]"]').val(),
                    ddescription: $(this).closest('tr').find('select[name="edescription[]"]').val(),
                    cbm: $(this).closest('tr').find('input[name="ecbm[]"]').val(),
                    weight: $(this).closest('tr').find('input[name="eweight[]"]').val(),
                    qty: $(this).closest('tr').find('input[name="eqty[]"]').val(),
                    amount: $(this).closest('tr').find('input[name="eamount[]"]').val(),
                    commission: $(this).closest('tr').find('input[name="ecommission[]"]').val()
                };

                $.post("insert_hbl_details.php", { rowData: rowData }, function(response) {
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
                    amount: $(this).closest('tr').find('input[name="eamount2[]"]').val(),
                    commission: $(this).closest('tr').find('input[name="ecommission2[]"]').val()
                };

                $.post("insert_hbl_paid.php", { rowData: rowData }, function(response) {
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
                        text: response,
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


            });

        </script>
    </body>
</html>
