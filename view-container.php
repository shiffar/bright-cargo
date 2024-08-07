<?php $title = 'container'; // Default title
?>
<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php include 'web-layouts/head.php'; ?>
<script src="<?php echo $url; ?>assets/plugins/pdf/html2pdf.bundle.min.js"></script>
<style>
    .highlighted-text {
        background-color: black;
        color: white;
        padding: 10px;
        display: inline-block;
        font-size: 2.5rem;
        border-radius: 5px;
    }

    .details h4 {
        font-size: 1.25rem;
        font-weight: bold;
        color: black;
    }

    .details small {
        display: block;
        margin-bottom: 5px;
    }

    .company-details-center {
        text-align: center;
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
                                                Shipped </li>
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
                                            $shipped_permissions = explode(', ', $_SESSION['auth_user']['shipped']);

                                            // Check if user has add permission
                                            $can_add = in_array('shipped_add', $shipped_permissions);

                                            // Check if user has edit permission
                                            $can_edit = in_array('shipped_edit', $shipped_permissions);

                                            // Check if user has delete permission
                                            $can_delete = in_array('shipped_delete', $shipped_permissions);

                                            // Check if user has add and delete permissions combined
                                            $can_add_delete = in_array('shipped_add,shipped_delete', $shipped_permissions);

                                            // Check if user has add and edit permissions combined
                                            $can_add_edit = in_array('shipped_add,shipped_edit', $shipped_permissions);

                                            // Check if user has edit and delete permissions combined
                                            $can_edit_delete = in_array('shipped_edit,shipped_delete', $shipped_permissions);

                                            // Check if user has add,edit and delete permissions combined
                                            $can_add_edit_delete = in_array('shipped_add,shipped_edit,shipped_delete', $shipped_permissions);

                                            $access_denied = in_array('shipped_access_denied', $shipped_permissions);
                                        } else {
                                            // User is not logged in or doesn't have access rights, set all to false
                                            $can_add = false;
                                            $can_edit = false;
                                            $can_delete = false;
                                            $can_add_delete = false;
                                        }
                                        ?>

                                        <?php
                                        if (isset($_SESSION['is_admin'])) {
                                        ?>
                                            <div aria-label="Status Buttons">

                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-dark update-status" data-status="container">
                                                    <img src="assets/media/tracking-icons/t2.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Container</span>
                                                </a>

                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="ship">
                                                    <img src="assets/media/tracking-icons/t3.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Ship</span>
                                                </a>

                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="port">
                                                    <img src="assets/media/tracking-icons/t4.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Port</span>
                                                </a>

                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="customs">
                                                    <img src="assets/media/tracking-icons/t5.png" alt="Tracking Icon" style="width: 20px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Customs</span>
                                                </a>
                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="vehicle">
                                                    <img src="assets/media/tracking-icons/t6.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Delivery</span>
                                                </a>


                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($_SESSION['is_employee'])) {
                                        ?>
                                            <div aria-label="Status Buttons">


                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-dark update-status" data-status="container-pending">
                                                    <img src="assets/media/tracking-icons/t2.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">container</span>
                                                </a>

                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="ship-pending">
                                                    <img src="assets/media/tracking-icons/t3.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">ship</span>
                                                </a>

                                                <a href="#" class="btn btn-outline btn-active-light-info bg-body btn-active-icon-info update-status" data-status="port-pending">
                                                    <img src="assets/media/tracking-icons/t4.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-info">Port</span>
                                                </a>

                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="customs-pending">
                                                    <img src="assets/media/tracking-icons/t5.png" alt="Tracking Icon" style="width: 20px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Customs</span>
                                                </a>
                                                <a href="#" class="btn btn-outline btn-active-light-secondary bg-body btn-active-icon-secondary update-status" data-status="vehicle-pending">
                                                    <img src="assets/media/tracking-icons/t6.png" alt="Tracking Icon" style="width: 40px; height: 40px;">
                                                    <span class="badge badge-light-secondary">Delivery</span>
                                                </a>


                                            </div>
                                        <?php
                                        }
                                        ?>



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
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="shippingDate">Shipping Date</label>
                                                                            <input type="date" class="form-control form-control-solid" id="shipping_date" name="shipping_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="shippingBy">Shipping By</label>
                                                                            <input type="text" class="form-control form-control-solid" id="shipping_by" name="shipping_by" required>
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
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="freight_charge" name="freight_charge" required>
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
                                                                            <input type="date" class="form-control form-control-solid" id="estimated_date" name="estimated_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="deliveredDate">Delivered Date</label>
                                                                            <input type="date" class="form-control form-control-solid" id="delivered_date" name="delivered_date">
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
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveShippingDetails">
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

                                        <div class="modal fade" tabindex="-1" id="updateShippingDetailsModal" data-bs-focus="false">
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
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingDate">Shipping Date</label>
                                                                            <input type="hidden" id="eid" name="eid">
                                                                            <input type="text" class="form-control form-control-solid" id="eshipping_date" name="eshipping_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Agent">Agent</label>
                                                                            <select class="form-control form-control-solid" id="eagent" name="eagent" data-control="select2" data-dropdown-parent="#updateShippingDetailsModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the agent</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>-->

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Agent">Delivery agent</label>
                                                                            <select class="form-control form-control-solid" id="edelivery_agent_branch" name="edelivery_agent_branch" data-control="select2" data-dropdown-parent="#updateShippingDetailsModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the agent</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="Location">Location</label>
                                                                            <select class="form-control form-control-solid" id="elocation" name="elocation" data-control="select2" data-dropdown-parent="#updateShippingDetailsModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>-->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Location">Location</label>
                                                                            <select class="form-control form-control-solid" id="edab_location" name="edab_location" data-control="select2" data-dropdown-parent="#updateShippingDetailsModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="SalesRep">Shipping By</label>
                                                                            <select class="form-control form-control-solid" id="eshipping_by" name="eshipping_by" data-control="select2" data-dropdown-parent="#updateShippingDetailsModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                            </select>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Agent">Shipping Type</label>
                                                                            <select class="form-control form-control-solid" id="eshipping_type" name="eshipping_type" data-control="select2" data-dropdown-parent="#updateShippingDetailsModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                <option value="">please select the shipping type</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingNo">Shipping No</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eshipping_no" name="eshipping_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateFileNo">File No</label>
                                                                            <input type="text" class="form-control form-control-solid" id="efile_no" name="efile_no" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateFeetWeight">Feet/Weight</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="efeet_weight" name="efeet_weight" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateFreightCharge">Freight Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="efreight_charge" name="efreight_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateClearanceCharge">Clearance Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="eclearance_charge" name="eclearance_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateBookingCharge">Booking Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="ebooking_charge" name="ebooking_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateLoadingCharge">Loading Charge</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="eloading_charge" name="eloading_charge" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateSeal">Seal</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eseal" name="eseal" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateEstimatedDate">Estimated Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="eestimated_date" name="eestimated_date" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateDeliveredDate">Delivered Date</label>
                                                                            <input type="text" class="form-control form-control-solid" id="edelivered_date" name="edelivered_date">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="updateShippingDescription">Shipping Description</label>
                                                                            <textarea class="form-control form-control-solid" id="eshipping_description" name="eshipping_description" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateShippingDetails">
                                                                    <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                    Save changes
                                                                </a>
                                                                <a href="#" class="btn btn-active-icon-dark btn-text-dark" data-bs-dismiss="modal">
                                                                    <i class="ki-duotone ki-abstract-11 fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                    Close
                                                                </a>
                                                            </div>
                                                        </form>
                                                        <div class="input-group input-group-sm mb-5">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-3">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control form-control-solid" id="hblSearchInput" placeholder="Enter Code or Bill Number">
                                                                        <a class="btn btn-icon btn-primary" id="addHBLRow"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div id="hblTableContainer">
                                                            <!-- Table will be dynamically generated here -->
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal bg-body fade" tabindex="-1" id="viewShippedModal">
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
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                            <li class="nav-item"><a id="generate-pdf" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-2" class="nav-link"><i class="fad fa-eye fa-2x"></i></a></li>
                                                        </ul>
                                                        <div class="tab-content"><br>
                                                            <div id="tab-1" class="tab-pane active">
                                                                <div id="pdf-table">
                                                                    <div class="tm_invoice tm_style1" id="tm_download_section">
                                                                        <div class="tm_invoice_in">
                                                                            <div class="tm_invoice_head tm_align_center tm_mb20">
                                                                                <div class="container">
                                                                                    <div class="row align-items-center">
                                                                                        <!-- Agent Details -->
                                                                                        <div class="col-md-4 details">
                                                                                            <h6>
                                                                                                <small><label id="vagent_name"></label></small>
                                                                                                <small><label id="vagent_address"></label></small>
                                                                                                <small><label id="vagent_contact"></label></small>
                                                                                                <small><label id="vagent_email"></label></small>
                                                                                            </h6>
                                                                                        </div>

                                                                                        <!-- Company Details Centered -->
                                                                                        <div class="col-md-4 text-center details">
                                                                                            <h6>
                                                                                                <small><?php echo isset($_SESSION['c_name']) ? $_SESSION['c_name'] : 'default'; ?></small>
                                                                                                <small><?php echo isset($_SESSION['c_address']) ? $_SESSION['c_address'] : 'default'; ?></small>
                                                                                                <small><?php echo isset($_SESSION['c_email']) ? $_SESSION['c_email'] : 'default'; ?></small>
                                                                                            </h6>
                                                                                            <img class="img-fluid mb-3" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" alt="Company Logo" style="max-width: 80px;">
                                                                                            <h6>CARGO MANIFEST</h6>
                                                                                        </div>

                                                                                        <!-- Other Details -->
                                                                                        <div class="col-md-4 text-end details">
                                                                                            <h6>
                                                                                                <small><label id="vst"></label> BILL NO: <label id="vshp_no"></label></small>
                                                                                                <small>WEIGHT: <label id="vfeet_weight"></label></small>
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div class="tm_invoice_info tm_mb20">
                                                                                <div class="tm_invoice_seperator tm_gray_bg" style="min-height: 10px !important;"></div>
                                                                                <div class="tm_invoice_info_list">
                                                                                    <p class="tm_invoice_number tm_m0" style="font-size: 10px;">File No: <b>#</b><b class="tm_primary_color" id="vfile_no"></b></p>
                                                                                    <p class="tm_invoice_date tm_m0" style="font-size: 10px;">Date: <b class="tm_primary_color" id="vdate2">01.07.2022</b></p>
                                                                                </div>
                                                                            </div>

                                                                            <table style="width: 100%;overflow: wrap; border-width: 1px; border-color: black;" class="table table-bordered table-sm table_d">
                                                                                <thead class="table-light" style="border-width: 1px; border-color: black;">
                                                                                    <tr>
                                                                                        <th class="text-center" style="width:25px;line-height: 2; font-size:10px !important;">#</th>
                                                                                        <th class="text-center" style="width:80px;line-height: 2; font-size:10px !important;">HBL</th>
                                                                                        <th class="text-center" style="width:180px;line-height: 2; font-size:10px !important;">SHIPPER</th>
                                                                                        <th class="text-center" style="width:180px;line-height: 2; font-size:10px !important;">CONSIGNEE</th>
                                                                                        <th class="text-center" style="width:120px;line-height: 2; font-size:10px !important;">DESCRIPTION</th>
                                                                                        <th class="text-center" style="width:60px;line-height: 2; font-size:10px !important;">CBM</th>
                                                                                        <th class="text-center" style="width:65px;line-height: 2; font-size:10px !important;">WEIGHT</th>
                                                                                        <th class="text-center" style="width:40px;line-height: 2; font-size:10px !important;">QTY</th>
                                                                                        <th class="text-center" style="width:110px;line-height: 2; font-size:10px !important;">DEST.UPB</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="veditableTableBody1">
                                                                                </tbody>
                                                                                <tfoot>

                                                                                </tfoot>
                                                                            </table>
                                                                            <div style="display: flex; justify-content: flex-end; width: 100%;">
                                                                                <table style="width:70%; border-width: 1px; border-color: black;" class="table table-bordered table-sm table_d" id="warehouseInfoTable">
                                                                                    <thead class="table-light" style="border-width: 1px; border-color: black;">
                                                                                        <tr>
                                                                                            <th class="text-center" style="font-size:10px;">WAREHOUSE</th>
                                                                                            <th class="text-center" style="font-size:10px;">NO</th>
                                                                                            <th class="text-center" style="font-size:10px;">CBM</th>
                                                                                            <th class="text-center" style="font-size:10px;">WEIGHT</th>
                                                                                            <th class="text-center" style="font-size:10px;">QTY</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    </tbody>
                                                                                    <tfoot>

                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>



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

                                        <div class="modal bg-body fade" tabindex="-1" id="viewShippedModalFNC">
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
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                            <li class="nav-item"><a id="shipping-file-pdf" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                        </ul>
                                                        <div class="tab-content"><br>
                                                            <div id="tab-1" class="tab-pane active">
                                                                <div id="pdf-table-file">

                                                                    <setpageheader name="page_header" value="on" show-this-page="1"></setpageheader>
                                                                    <div class="table-responsive animated zoomIn m-t">
                                                                        <table style="width: 100%; line-height: 1.2; margin: 0; padding: 0;">
                                                                            <tbody>
                                                                                <tr>

                                                                                    <td style="width:100%;text-align: center;vertical-align: top;">
                                                                                        <h1>MANIFEST DETAIL REPORT</h1>
                                                                                        <h2>
                                                                                            <label id="shbl"></label> / <label id="sshipping_type"></label><label id="sfile_no"></label> - <label id="sshipping_date"></label>
                                                                                        </h2>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                        <br>
                                                                        <table style="width: 100%;overflow: wrap;" class="table table-bordered table-sm table_d">
                                                                            <thead class="table-light">
                                                                                <tr>
                                                                                    <th style="width:25px;line-height: 2; font-size:10px !important;">#</th>
                                                                                    <th style="width:80px;line-height: 2; font-size:10px !important;">DATE</th>
                                                                                    <th style="width:80px;line-height: 2; font-size:10px !important;">HBL</th>
                                                                                    <th style="width:60px;line-height: 2; font-size:10px !important;">COUNT</th>
                                                                                    <th style="width:180px;line-height: 2; font-size:10px !important;">LOCATION</th>
                                                                                    <th style="width:80px;line-height: 2; font-size:10px !important;">TOTAL CBM</th>
                                                                                    <th style="width:180px;line-height: 2; font-size:10px !important;">AMOUNT</th>
                                                                                    <th style="width:65px;line-height: 2; font-size:10px !important;">RCVD BY</th>
                                                                                    <th style="width:40px;line-height: 2; font-size:10px !important;">REMARKS</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="feditableTableBody1">
                                                                            </tbody>
                                                                            <tfoot>

                                                                            </tfoot>
                                                                        </table>



                                                                    </div>




                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="modal bg-body fade" tabindex="-1" id="viewShippedModal2">
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
                                                            <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                            <li class="nav-item"><a id="generate-pdfd" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                        </ul>
                                                        <div class="tab-content"><br>
                                                            <div id="tab-1" class="tab-pane active">

                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="modal fade" tabindex="-1" id="statusModal" data-bs-focus="false">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Update Status</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>



                                                    <div class="modal-body">
                                                        <form id="statusForm">
                                                            <div class="form-group">
                                                                <label for="step_1">Step 1</label>
                                                                <textarea type="text" class="form-control" id="step_1" name="step_1"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_1_dte">Step 1 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_1_dte" name="step_1_dte">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="step_2">Step 2</label>
                                                                <textarea type="text" class="form-control" id="step_2" name="step_2"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_2_dte">Step 2 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_2_dte" name="step_2_dte">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="step_3">Step 3</label>
                                                                <textarea type="text" class="form-control" id="step_3" name="step_3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_3_dte">Step 3 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_3_dte" name="step_3_dte">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="step_4">Step 4</label>
                                                                <textarea type="text" class="form-control" id="step_4" name="step_4"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_4_dte">Step 4 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_4_dte" name="step_4_dte">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="step_5">Step 5</label>
                                                                <textarea type="text" class="form-control" id="step_5" name="step_5"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_5_dte">Step 5 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_5_dte" name="step_5_dte">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="step_6">Step 6</label>
                                                                <textarea type="text" class="form-control" id="step_6" name="step_6"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_6_dte">Step 6 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_6_dte" name="step_6_dte">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="step_7">Step 7</label>
                                                                <textarea type="text" class="form-control" id="step_7" name="step_7"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="step_7_dte">Step 7 Date</label>
                                                                <input type="text" class="form-control form-control-solid" id="step_7_dte" name="step_7_dte">
                                                            </div>

                                                            <input type="hidden" class="form-control" id="statusMessage" name="statusMessage">




                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveChanges">
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
                                                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                        <th class="min-w-150px"><input type="checkbox" id="selectAll"></th>
                                                        <th class="min-w-100px"></th>
                                                        <th class="min-w-150px">Shipping Date</th>
                                                        <th class="min-w-150px">Shipping By</th>
                                                        <th class="min-w-150px">Shipping Type</th>
                                                        <th class="min-w-150px">Shipping No</th>
                                                        <th class="min-w-150px">File No</th>
                                                        <th class="min-w-150px">Feet/Weight</th>
                                                        <th class="min-w-150px">Seal</th>
                                                        <th class="min-w-150px">Estimated Date</th>
                                                        <th class="min-w-150px">Delivered Date</th>
                                                        <th class="min-w-150px">Action</th>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script>
        $(document).on('focus', '.select2.select2-container', function(e) {
            var isOriginalEvent = e.originalEvent; // Don't re-open on closing focus event
            var isSingleSelect = $(this).find(".select2-selection--single").length > 0; // Multi-select will pass focus to input

            if (isOriginalEvent && isSingleSelect) {
                $(this).siblings('select:enabled').select2('open');
            }
        });

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
        // Function to generate PDF
        function generatePDF() {
            const element = document.getElementById('pdf-table');

            const file_no = document.getElementById('vfile_no').textContent.trim();

            const filename = `${file_no}.pdf`;

            // Options for html2pdf
            const options = {
                filename: filename,
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
                .save();
        }

        // Add event listener to the link to trigger PDF generation
        document.getElementById('generate-pdf').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior (redirect)
            generatePDF(); // Call function to generate PDF
        });
    </script>

    <script>
        // Function to generate PDF
        function generatePDF2() {
            const element = document.getElementById('pdf-table-file');

            const shbl = document.getElementById('shbl').textContent.trim();
            const sshipping_type = document.getElementById('sshipping_type').textContent.trim();
            const sfile_no = document.getElementById('sfile_no').textContent.trim();
            const sshipping_date = document.getElementById('sshipping_date').textContent.trim();

            const filename2 = `${shbl}/${sfile_no}/${sshipping_type}-${sshipping_date}.pdf`;

            // Options for html2pdf
            const options = {
                filename: filename2,
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
                .save();
        }

        // Add event listener to the link to trigger PDF generation
        document.getElementById('shipping-file-pdf').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior (redirect)
            generatePDF2(); // Call function to generate PDF
        });
    </script>
    <script>
        $(document).ready(function() {

            $(function() {
                $("#edelivered_date").datepicker({
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
                $("#eestimated_date").datepicker({
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
                $("#eshipping_date").datepicker({
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


            // status steps dates/////////////////////////////////


            $(function() {
                $("#step_1_dte").datepicker({
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
                $("#step_2_dte").datepicker({
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
                $("#step_3_dte").datepicker({
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
                $("#step_4_dte").datepicker({
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
                $("#step_5_dte").datepicker({
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
                $("#step_6_dte").datepicker({
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
                $("#step_7_dte").datepicker({
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




            ///status steps dates end ///////////////////////////////////////////













            $.ajax({
                url: 'get_shipping_type.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, shipping_types) {
                            options += '<option value="' + shipping_types.shipping_type_id + '">' + shipping_types.shipping_type + '</option>';
                        });
                        $('#eshipping_type').append(options);
                    } else {
                        $('#eshipping_type').append('<option value="">No agents found</option>');
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
                        $('#eshipping_by').append(options);
                    } else {
                        $('#eshipping_by').append('<option value="">No agents found</option>');
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
                    data: {
                        agent_id: agentId
                    }, // Pass selected agent ID to PHP script
                    success: function(data) {
                        // Clear existing options
                        $('#elocation').empty();

                        if (data && data.length > 0) {
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
                url: 'get_delivery_agent_address.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data && data.length > 0) {
                        var options = '';
                        $.each(data, function(index, delivery_agent_branches) {
                            options += '<option value="' + delivery_agent_branches.delivery_agent_bid + '">' + delivery_agent_branches.da_name + '</option>';
                        });
                        $('#edelivery_agent_branch').append(options);
                    } else {
                        $('#edelivery_agent_branch').append('<option value="">No agents found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });


            $('#edelivery_agent_branch').on('change', function() {
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
                        $('#edab_location').empty();

                        if (data && data.length > 0) {
                            var options = '';
                            $.each(data, function(index, dabaddress) {
                                options += '<option value="' + dabaddress.delivery_agent_bid + '">' + dabaddress.dabaddress + ', ' + dabaddress.dabcity + '</option>';
                            });
                            $('#edab_location').append(options);
                        } else {
                            $('#edab_location').append('<option value="">No addresses found</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });



            // DataTable initialization
            var table = $('#shippingDetailsTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-container.php",
                    "type": "POST",
                    "data": {
                        action: 'fetch'
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return `<input type="checkbox" class="row-checkbox" data-id="${full.shipped_details_id}">`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            var iconSrc = getIconSrc(full.scurrent_status); // Function to determine icon based on status
                            return `<img src="${iconSrc}" alt="Tracking Icon" style="width: 40px; height: 40px;">`;
                        }
                    },
                    {
                        "data": "shipping_date"
                    },
                    {
                        "data": "name"

                    },
                    {
                        "data": "shipping_type"
                    },
                    {
                        "data": "shipping_no",
                        "render": function(data, type, full, meta) {
                            return `<a href="#" class="viewShippingFile text-primary fw-bold" data-id="${full.shipped_details_id}">${data}</a>`;
                        }
                    },
                    {
                        "data": "file_no"
                    },
                    {
                        "data": "feet_weight"
                    },
                    {
                        "data": "seal"
                    },
                    {
                        "data": "estimated_date"
                    },
                    {
                        "data": "delivered_date"
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            var accessDenied = <?php echo $access_denied ? 'true' : 'false'; ?>;
                            var buttons = '';

                            if (accessDenied) {
                                return buttons;
                            }

                            if (<?php echo $can_edit || $can_add_edit || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editShippingDetail" data-id="${data.shipped_details_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                <a href="#" class="btn btn-active-icon-gray-600 btn-text-gray-600 viewWidgt" data-id="${data.shipped_details_id}"><i class="ki-duotone ki-eye fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
                                <a href="container-pdf-view.php?shipped_details_id=${data.shipped_details_id}" target="_blank" class="btn btn-active-icon-gray-600 btn-text-gray-600 downloadWidgt"><i class="fad fa-shredder fs-1"></i></a>`;
                            }

                            if (<?php echo $can_delete || $can_add_delete || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                buttons += `<a href="#" class="btn btn-active-icon-danger btn-text-danger deleteShippingDetail" data-id="${data.shipped_details_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
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

            // Function to get icon source based on status
            function getIconSrc(status) {
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


            $('#selectAll').on('click', function() {
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                console.log("Select All clicked");
            });

            // Handle row checkbox clicks
            $('#shippingDetailsTable tbody').on('change', 'input.row-checkbox', function() {
                if (!this.checked) {
                    var el = $('#selectAll').get(0);
                    if (el && el.checked && ('indeterminate' in el)) {
                        el.indeterminate = true;
                    }
                }
                console.log("Row checkbox clicked");
            });

            $('.update-status').on('click', function(e) {
                e.preventDefault();
                var status = $(this).data('status');
                var selectedIds = [];

                $('.row-checkbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });

                console.log("Selected IDs:", selectedIds);

                if (selectedIds.length > 0) {
                    $.ajax({
                        url: 'check-steps.php',
                        type: 'POST',
                        data: {
                            shippedDetailsIds: selectedIds.join(','),
                            action: 'check_steps'
                        },
                        success: function(response) {
                            console.log("Response:", response);
                            try {
                                var res = JSON.parse(response);
                                if (res.success) {
                                    // Open the modal and populate it with data
                                    $('#statusModal').modal('show');
                                    // Populate modal fields with res.data
                                    for (var key in res.data) {
                                        if (res.data.hasOwnProperty(key)) {
                                            $('#' + key).val(res.data[key]);
                                        }
                                    }
                                    $('#statusMessage').val(status);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: res.message
                                    });
                                }
                            } catch (e) {
                                console.error("Parsing error:", e);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed to parse response'
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX error:", textStatus, errorThrown);
                        }
                    });
                } else {
                    Swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'Please select at least one item.',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    });
                }
            });

            $('#saveChanges').on('click', function() {
                var formData = new FormData(document.getElementById('statusForm'));
                formData.append('action', 'shipping_status');

                var selectedIds = [];
                $('.row-checkbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });
                formData.append('shippedDetailsIds', selectedIds.join(','));

                $.ajax({
                    url: 'update-status.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        try {
                            var res = JSON.parse(response);
                            Swal.fire({
                                toast: true,
                                icon: res.success ? 'success' : 'error',
                                title: res.success ? 'Status updated successfully' : 'Failed to update status',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em'
                            }).then(function() {
                                if (res.success) {
                                    $('#statusModal').modal('hide');
                                    // Reload the DataTable
                                    table.ajax.reload();
                                }
                            });
                        } catch (e) {
                            console.error("Parsing error:", e);
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: 'Failed to parse response',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em'
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX error:", textStatus, errorThrown);
                    }
                });
            });





            $('#shippingDetailsTable tbody').on('click', '.viewWidgt', function() {
                var shipped_details_id = $(this).data("id");
                $.post("code-container.php", {
                    action: 'view',
                    shipped_details_id: shipped_details_id
                }, function(data) {
                    $('#viewShippedModal').modal('show');
                    console.log(data);
                    $('#vhbl_id').val(data.shipped_details_id);
                    $('#vdate').text(data.shipping_date);
                    $('#vdate2').text(data.shipping_date);
                    $('#vshp_no').text(data.shipping_no);
                    $('#vst').text(data.shipping_type);
                    $('#vshp_no2').text(data.shipping_no);
                    $('#vfile_no').text(data.file_no);
                    $('#vclearance').text(data.Clearance);
                    $('#vagent_email').text(data.agent_email);
                    $('#vagent_name').text(data.da_name);
                    $('#vagent_contact').text(data.da_conatct);
                    var address = data.agent_address;
                    var formattedAddress = address.replace(/,/g, ',<br>');
                    $('#vagent_address').html(formattedAddress);
                    $('#vhbl_type').text(data.HBL_Type);
                    var currency = data.currency;

                    // Clear previous data
                    $('#veditableTableBody1').empty();
                    $('#warehouseInfoTable tbody').empty();
                    $('#warehouseInfoTable tfoot').empty(); // Clear warehouse total
                    var rowNumber = 1;
                    var totalCBM = 0;
                    var totalWeight = 0;
                    var totalQty = 0;
                    var agentCityCount = {}; // Object to track the count and totals of each agent city
                    var totalCityCount = 0; // Track the total number of cities

                    // Populate table with data
                    if (data.hbl && data.hbl.length > 0) {
                        var displayedHblIds = []; // Array to keep track of displayed HBL IDs
                        $.each(data.hbl, function(index, hbl) {
                            // Check if the HBL ID has been displayed already
                            if (!displayedHblIds.includes(hbl.id)) {
                                var descriptions = hbl.hbl_details.map(detail => detail.Description).join('<br>');
                                var weights = hbl.hbl_details.map(detail => detail.Weight).join('<br>');
                                var cbms = hbl.hbl_details.map(detail => detail.CBM).join('<br>');
                                var qtys = hbl.hbl_details.map(detail => detail.QTY).join('<br>');

                                // Calculate totals
                                hbl.hbl_details.forEach(function(detail) {
                                    totalCBM += parseFloat(detail.CBM) || 0;
                                    totalWeight += parseFloat(detail.Weight) || 0;
                                    totalQty += parseInt(detail.QTY) || 0;
                                });

                                // Track agent city count and totals
                                var agentCity = hbl.agents_address.ddistrict;
                                if (!agentCityCount[agentCity]) {
                                    agentCityCount[agentCity] = {
                                        count: 0,
                                        totalCBM: 0,
                                        totalWeight: 0,
                                        totalQty: 0
                                    };
                                }
                                agentCityCount[agentCity].count++;
                                hbl.hbl_details.forEach(function(detail) {
                                    agentCityCount[agentCity].totalCBM += parseFloat(detail.CBM) || 0;
                                    agentCityCount[agentCity].totalWeight += parseFloat(detail.Weight) || 0;
                                    agentCityCount[agentCity].totalQty += parseInt(detail.QTY) || 0;
                                });

                                var newRow = `
                                        <tr>
                                            <td class="text-start" style="line-height: 2; font-size:10px;">${rowNumber++}</td>
                                            <td class="text-start" style="line-height: 2; font-size:10px;">${hbl.hbl_code}<br>${hbl.Bill_no}<br>${hbl.BBill_no}</td>
                                            <td class="text-start" style="line-height: 2; font-size:10px;">${hbl.Shipper.sname}<br>${hbl.Shipper.saddress}<br>${hbl.Shipper.s_city}<br>${hbl.Shipper.s_country}<br>${hbl.Shipper.s_ppnic}<br>${hbl.Shipper.s_mobile}</td>
                                            <td class="text-start" style="line-height: 2; font-size:10px;">${hbl.Consignee.cname}<br>${hbl.Consignee.caddress}<br>${hbl.Consignee.co_city}<br>${hbl.Consignee.co_country}<br>${hbl.Consignee.cppnic}<br>${hbl.Consignee.cmobile}</td>
                                            <td class="text-start" style="line-height: 2; font-size:10px;">${descriptions}</td>
                                            <td class="text-end" style="line-height: 2; font-size:10px;">${cbms}</td>
                                            <td class="text-end" style="line-height: 2; font-size:10px;">${weights}</td>
                                            <td class="text-end" style="line-height: 2; font-size:10px;">${qtys}</td>
                                            <td class="text-start" style="line-height: 2; font-size:10px;">${hbl.agents_address.ddistrict}<br>${hbl.agents_address.co_city}<br>${hbl.agents_address.clearance2}</td>
                                        </tr>`;
                                $('#veditableTableBody1').append(newRow);
                                displayedHblIds.push(hbl.id); // Add the displayed HBL ID to the array
                            }
                        });
                    }

                    // Append total row for the main table
                    $('#veditableTableBody1').append(`
                            <tr>
                                <td class="text-end" colspan="5" style="line-height: 2; font-size:10px !important;">TOTAL CALCULATION</td>
                                <td class="text-end" style="line-height: 2; font-size:10px !important;">${totalCBM.toFixed(3)}</td>
                                <td class="text-end" style="line-height: 2; font-size:10px !important;">${totalWeight.toFixed(2)}</td>
                                <td class="text-end" style="line-height: 2; font-size:10px !important;">${totalQty}</td>
                                <td class="text-end" style="line-height: 2; font-size:10px !important;"></td>
                            </tr>
                        `);

                    // Populate warehouse info table with data
                    for (var city in agentCityCount) {
                        $('#warehouseInfoTable tbody').append(`
                                <tr>
                                    <td class="text-end" style="line-height: 2; font-size:10px;">${city}</td>
                                    <td class="text-end" style="line-height: 2; font-size:10px;">${agentCityCount[city].count}</td>
                                    <td class="text-end" style="width:50px;line-height: 2; font-size:10px;">${agentCityCount[city].totalCBM.toFixed(3)}</td>
                                    <td class="text-end" style="width:50px;line-height: 2; font-size:10px;">${agentCityCount[city].totalWeight.toFixed(2)}</td>
                                    <td class="text-end" style="width:50px;line-height: 2; font-size:10px;">${agentCityCount[city].totalQty}</td>
                                </tr>
                            `);
                        totalCityCount += agentCityCount[city].count;
                    }

                    // Append total row for the warehouse info table
                    $('#warehouseInfoTable tfoot').append(`
                            <tr>
                                <td class="text-end" style="line-height: 2; font-size:10px">TOTAL</td>
                                <td class="text-end" style="width:50px;line-height: 2; font-size:10px">${totalCityCount}</td>
                                <td class="text-end" style="width:50px;line-height: 2; font-size:10px">${totalCBM.toFixed(3)}</td>
                                <td class="text-end" style="width:50px;line-height: 2; font-size:10px">${totalWeight.toFixed(2)}</td>
                                <td class="text-end" style="width:50px;line-height: 2; font-size:10px">${totalQty}</td>
                            </tr>
                        `);

                    // Update total weight display
                    $('#vfeet_weight').text(totalWeight.toFixed(2));
                    generatePDFTAB();
                }, 'json');
            });

            function formatDate(dateStr) {
                var date = new Date(dateStr);
                var day = date.getDate();
                var month = date.toLocaleString('default', {
                    month: 'long'
                });
                var year = date.getFullYear();

                // Function to get the ordinal suffix for the day
                function getOrdinalSuffix(day) {
                    if (day > 3 && day < 21) return 'th'; // All teen numbers get 'th'
                    switch (day % 10) {
                        case 1:
                            return 'st';
                        case 2:
                            return 'nd';
                        case 3:
                            return 'rd';
                        default:
                            return 'th';
                    }
                }

                var dayWithSuffix = day + getOrdinalSuffix(day);
                return `${dayWithSuffix} ${month} ${year}`;
            }




            $('#shippingDetailsTable tbody').on('click', '.viewShippingFile', function() {
                var shipped_details_id = $(this).data("id");
                $.post("code-container.php", {
                    action: 'view',
                    shipped_details_id: shipped_details_id
                }, function(data) {
                    $('#viewShippedModalFNC').modal('show');
                    console.log(data);
                    $('#shbl').text(data.hbl_code);
                    $('#sshipping_type').text(data.sshipping_type);
                    $('#sfile_no').text(data.file_no);
                    $('#sshipping_date').text(formatDate(data.shipping_date));
                    var currency = data.currency;
                    // Clear previous data
                    $('#feditableTableBody1').empty();
                    $('#fwarehouseInfoTable tbody').empty();
                    $('#fwarehouseInfoTable tfoot').empty(); // Clear warehouse total
                    var rowNumber = 1;
                    var totalCBM = 0;
                    var totalWeight = 0;
                    var totalQty = 0;
                    var totalFAmount = 0; // Initialize total FAmount
                    var warehouseCount = {}; // Object to track the count of warehouses

                    // Populate table with data
                    if (data.hbl && data.hbl.length > 0) {
                        var displayedHblIds = []; // Array to keep track of displayed HBL IDs
                        $.each(data.hbl, function(index, hbl) {
                            // Check if the HBL ID has been displayed already
                            if (!displayedHblIds.includes(hbl.id)) {
                                var descriptions = hbl.hbl_details.map(detail => detail.Description).join('<br>');
                                var cbms = hbl.hbl_details.map(detail => detail.CBM).join('<br>');

                                // Calculate totals
                                hbl.hbl_details.forEach(function(detail) {
                                    totalCBM += parseFloat(detail.CBM) || 0;
                                });

                                totalFAmount += parseFloat(hbl.FAmount) || 0; // Add FAmount to the total

                                // Track warehouse count
                                var warehouse = hbl.agents_address.acity;
                                if (!warehouseCount[warehouse]) {
                                    warehouseCount[warehouse] = 0;
                                }
                                warehouseCount[warehouse]++;

                                var newRow = `
                        <tr>
                            <td style="line-height: 2; font-size:10px">${rowNumber++}</td>
                            <td style="line-height: 2; font-size:10px">${hbl.shipping_date}</td>
                            <td style="line-height: 2; font-size:10px">${hbl.hbl_code}</td>
                            <td style="line-height: 2; font-size:10px">${warehouseCount[warehouse]}</td>
                            <td style="line-height: 2; font-size:10px">${warehouse}</td>
                            <td class="text-end" style="line-height: 2; font-size:10px">${cbms}</td>
                            <td class="text-end" style="line-height: 2; font-size:10px">${currency} ${hbl.FAmount.toFixed(2)}</td>
                            <td style="line-height: 2; font-size:10px">${hbl.Consignee_name}</td>
                            <td style="line-height: 2; font-size:10px">${hbl.shipping_description}</td>
                        </tr>`;
                                $('#feditableTableBody1').append(newRow);
                                displayedHblIds.push(hbl.id); // Add the displayed HBL ID to the array
                            }
                        });
                    }

                    // Append total row for the main table
                    $('#feditableTableBody1').append(`
            <tr>
                <td colspan="3" style="text-align: right;line-height: 2; font-size:10px !important;">TOTAL CALCULATION</td>
                <td></td>
                <td></td>
                <td style="text-align: right;line-height: 2; font-size:10px !important;">${totalCBM.toFixed(3)}</td>
                <td style="text-align: right;line-height: 2; font-size:10px !important;">${currency} ${totalFAmount.toFixed(2)}</td>
                <td style="text-align: right;line-height: 2; font-size:10px !important;"></td>
            </tr>
        `);

                    // Populate warehouse info table with data

                    // Append total row for the warehouse info table
                    $('#fwarehouseInfoTable tfoot').append(`
            <tr>
                <td style="text-align: right;line-height: 2; font-size:10px">TOTAL</td>
                <td></td>
                <td></td>
                <td style="text-align: right;width:50px;line-height: 2; font-size:10px">${totalCBM.toFixed(3)}</td>
                <td style="text-align: right;width:50px;line-height: 2; font-size:10px">${currency} ${totalFAmount.toFixed(2)}</td>
                <td style="text-align: right;width:50px;line-height: 2; font-size:10px"></td>
            </tr>
        `);
                }, 'json');
            });



            $('#shippingDetailsTable tbody').on('click', '.downloadWidgt', function() {
                var shipped_details_id = $(this).data("id");
                $.post("code-container.php", {
                    action: 'view',
                    shipped_details_id: shipped_details_id
                }, function(data) {
                    console.log(data);
                    $('#vhbl_id').val(data.shipped_details_id);
                    $('#vvdate').text(data.shipping_date);
                    $('#vvdate2').text(data.shipping_date);
                    $('#vvshp_no').text(data.shipping_no);
                    $('#vvst').text(data.shipping_type);
                    $('#vvfeet_weight').text(data.feet_weight);
                    $('#vvfile_no').text(data.file_no);
                    $('#vvfile_no2').text(data.file_no);
                    $('#vvclearance').text(data.Clearance);
                    $('#vvagent_name').text(data.agent_name);
                    $('#vvagent_email').text(data.agent_email);
                    $('#vvagent_address').text(data.agent_address);
                    $('#vvhbl_type').text(data.HBL_Type);
                    // Clear previous data
                    $('#vveditableTableBody1').empty();
                    $('#vwarehouseInfoTable tbody').empty();
                    $('#vwarehouseInfoTable tfoot').empty(); // Clear warehouse total
                    var rowNumber = 1;
                    var totalCBM = 0;
                    var totalWeight = 0;
                    var totalQty = 0;
                    var warehouseCount = {}; // Object to track the count of warehouses

                    // Populate table with data
                    if (data.hbl && data.hbl.length > 0) {
                        var displayedHblIds = []; // Array to keep track of displayed HBL IDs
                        $.each(data.hbl, function(index, hbl) {
                            // Check if the HBL ID has been displayed already
                            if (!displayedHblIds.includes(hbl.id)) {
                                var descriptions = hbl.hbl_details.map(detail => detail.Description).join('<br>');
                                var weights = hbl.hbl_details.map(detail => detail.Weight).join('<br>');
                                var cbms = hbl.hbl_details.map(detail => detail.CBM).join('<br>');
                                var qtys = hbl.hbl_details.map(detail => detail.QTY).join('<br>');

                                // Calculate totals
                                hbl.hbl_details.forEach(function(detail) {
                                    totalCBM += parseFloat(detail.CBM) || 0;
                                    totalWeight += parseFloat(detail.Weight) || 0;
                                    totalQty += parseInt(detail.QTY) || 0;
                                });

                                // Track warehouse count
                                var warehouse = hbl.agents_address.acity;
                                if (!warehouseCount[warehouse]) {
                                    warehouseCount[warehouse] = 0;
                                }
                                warehouseCount[warehouse]++;

                                var newRow = `
                                        <tr>
                                            <td>${rowNumber++}</td>
                                            <td>${hbl.hbl_code}</td>
                                            <td>${hbl.hbl_district}</td>
                                            <td>${hbl.Shipper.sname}<br>${hbl.Shipper.saddress}, ${hbl.Shipper.s_city}, ${hbl.Shipper.s_country}</td>
                                            <td>${hbl.Consignee.cname}<br>${hbl.Consignee.caddress}, ${hbl.Consignee.co_city}, ${hbl.Consignee.co_country}<br>${hbl.Consignee.cmobile}</td>
                                            <td>${descriptions}</td>
                                            <td>${cbms}</td>
                                            <td>${weights}</td>
                                            <td>${qtys}</td>
                                            <td>${hbl.agents_address.acity}<br>${hbl.Clearance}<br>${hbl.balance}</td>
                                        </tr>`;
                                $('#vveditableTableBody1').append(newRow);
                                displayedHblIds.push(hbl.id); // Add the displayed HBL ID to the array
                            }
                        });
                    }

                    // Append total row for the main table
                    $('#vveditableTableBody1').append(`
                            <tr>
                                <td colspan="6" style="text-align: right;font-size:12px !important;">TOTAL CALCULATION</td>
                                <td style="text-align: right;font-size:12px !important;">${totalCBM.toFixed(3)}</td>
                                <td style="text-align: right;font-size:12px !important;">${totalWeight.toFixed(2)}</td>
                                <td style="text-align: right;font-size:12px !important;">${totalQty}</td>
                                <td style="text-align: right;font-size:12px !important;"></td>
                            </tr>
                        `);

                    // Populate warehouse info table with data
                    for (var warehouse in warehouseCount) {
                        $('#vwarehouseInfoTable tbody').append(`
                                <tr>
                                    <td style="text-align: right;">${warehouse}</td>
                                    <td style="text-align: right;">${warehouseCount[warehouse]}</td>
                                    <td style="text-align: right;width:50px">${totalCBM.toFixed(3)}</td>
                                    <td style="text-align: right;width:50px">${totalWeight.toFixed(2)}</td>
                                    <td style="text-align: right;width:50px">${totalQty}</td>
                                </tr>
                            `);
                    }

                    // Append total row for the warehouse info table
                    $('#vwarehouseInfoTable tfoot').append(`
                            <tr>
                                <td style="text-align: right;">TOTAL</td>
                                <td style="text-align: right;width:50px">${Object.keys(warehouseCount).length}</td>
                                <td style="text-align: right;width:50px">${totalCBM.toFixed(3)}</td>
                                <td style="text-align: right;width:50px">${totalWeight.toFixed(2)}</td>
                                <td style="text-align: right;width:50px">${totalQty}</td>
                            </tr>
                        `);


                }, 'json');
            });



            // Insert Agent
            $("#saveShippingDetails").click(function() {
                $.post("code-container.php", $("#shippingDetailsAddForm").serialize() + '&action=insert', function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#addShippingDetailsModal').modal('hide');
                        // Clear the form fields
                        $('#shippingDetailsAddForm')[0].reset();
                        table.ajax.reload();
                    });
                });
            });

            // Edit Shipping Detail
            $('#shippingDetailsTable tbody').on('click', '.editShippingDetail', function() {
                var shipped_details_id = $(this).data("id");
                $.post("code-container.php", {
                    action: 'edit',
                    shipped_details_id: shipped_details_id
                }, function(data) {
                    $('#updateShippingDetailsModal').modal('show');
                    $('#eid').val(data.shipped_details_id);
                    $('#eshipping_date').val(data.shipping_date);
                    $('#eshipping_by').val(null).trigger('change').val(data.shipping_by).trigger('change');
                    $('#eagent').val(data.agent);
                    // Clear previous selected option
                    $('#eagent').val(null).trigger('change');

                    // Set selected option in Select2 dropdown
                    $('#eagent').val(data.agent).trigger('change');
                    $('#edelivery_agent_branch').val(null).trigger('change').val(data.delivery_agent_bid).trigger('change');
                    $('#edab_location').val(null).trigger('change').val(data.dab_location).trigger('change');
                    $('#elocation').val(data.location);
                    // Clear previous selected option
                    $('#elocation').val(null).trigger('change');

                    // Set selected option in Select2 dropdown
                    $('#elocation').val(data.location).trigger('change');
                    $('#estep').val(data.step);
                    $('#eshipping_by').val(data.shipping_by);
                    $('#eshipping_type').val(null).trigger('change').val(data.shipping_type).trigger('change');
                    $('#eshipping_no').val(data.shipping_no);
                    $('#efile_no').val(data.file_no);
                    $('#efeet_weight').val(data.feet_weight);
                    $('#efreight_charge').val(data.freight_charge);
                    $('#eclearance_charge').val(data.clearance_charge);
                    $('#ebooking_charge').val(data.booking_charge);
                    $('#eloading_charge').val(data.loading_charge);
                    $('#eseal').val(data.seal);
                    $('#eestimated_date').val(data.estimated_date);
                    $('#edelivered_date').val(data.delivered_date);
                    $('#eshipping_description').val(data.shipping_description);

                    // Now, retrieve corresponding rows from hbl table
                    $.post("code-container.php", {
                        action: 'get_hbl_rows',
                        shipped_details_id: shipped_details_id
                    }, function(hbl_data) {
                        // Process the hbl data, e.g., populate a table within the modal
                        if (hbl_data.length > 0) {
                            var tableHtml = '<div class="table-responsive">';
                            tableHtml += '<table class="table table-hover table-rounded table-striped border gy-7 gs-7">';
                            tableHtml += '<thead><tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">';
                            // Define your table headers here
                            tableHtml += '<th>HBL ID</th><th>Date</th><th>Bill No</th><th>Action</th>'; // Add Action column
                            tableHtml += '</tr></thead>';
                            tableHtml += '<tbody>';
                            $.each(hbl_data, function(index, row) {
                                tableHtml += '<tr id="hblRow_' + row.hbl_id + '">';
                                // Populate your table cells with the fetched data
                                tableHtml += '<td>' + row.hbl_id + '</td>';
                                tableHtml += '<td>' + row.Date + '</td>';
                                tableHtml += '<td>' + row.Bill_no + '</td>';
                                // Add Remove button in Action column
                                tableHtml += '<td><a class="btn btn-icon btn-danger removeContainer" data-hblid="' + row.hbl_id + '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>';
                                tableHtml += '</tr>';
                            });
                            tableHtml += '</tbody></table></div>';

                            $('#hblTableContainer').html(tableHtml);

                            // Add click event for Remove button
                            $('.removeContainer').click(function() {
                                var hbl_id = $(this).data('hblid');
                                var rowToRemove = $('#hblRow_' + hbl_id); // Reference to the row
                                // Nullify the container_id_fk in hbl table for the corresponding hbl_id
                                $.post("code-container.php", {
                                    action: 'remove_container',
                                    hbl_id: hbl_id
                                }, function(response) {
                                    // Handle the response, e.g., reload the table
                                    console.log(response);
                                    // Hide the table row
                                    rowToRemove.hide(); // Hide the specified table row
                                });
                            });
                        } else {
                            $('#hblTableContainer').html('<p>No data available.</p>');
                        }
                    }, 'json');
                }, 'json');
            });





            $(document).ready(function() {
                // Function to handle adding a new HBL row to the table
                function addHBLRow(response) {
                    // Check if the table is empty
                    if ($('#hblTableContainer table tbody').children().length === 0) {
                        // If the table is empty, create a new table
                        var tableHtml = '<div class="table-responsive">';
                        tableHtml += '<table class="table table-hover table-rounded table-striped border gy-7 gs-7">';
                        tableHtml += '<thead><tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">';
                        tableHtml += '<th>HBL ID</th><th>Date</th><th>Bill No</th><th>Action</th>'; // Add Action column
                        tableHtml += '</tr></thead><tbody>';

                        // Add the retrieved row to the new table
                        tableHtml += '<tr id="hblRow_' + response.hbl_id + '">';
                        tableHtml += '<td>' + response.hbl_id + '</td>';
                        tableHtml += '<td>' + response.Date + '</td>';
                        tableHtml += '<td>' + response.Bill_no + '</td>';
                        tableHtml += '<td><a class="btn btn-icon btn-danger removeContainer" data-hblid="' + response.hbl_id + '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>';
                        tableHtml += '</tr>';

                        tableHtml += '</tbody></table></div>';
                        $('#hblTableContainer').html(tableHtml);
                    } else {
                        // If the table already contains rows, append the new row
                        var newRowHtml = '<tr id="hblRow_' + response.hbl_id + '">';
                        newRowHtml += '<td>' + response.hbl_id + '</td>';
                        newRowHtml += '<td>' + response.Date + '</td>';
                        newRowHtml += '<td>' + response.Bill_no + '</td>';
                        newRowHtml += '<td><a class="btn btn-icon btn-danger removeContainer" data-hblid="' + response.hbl_id + '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>';
                        newRowHtml += '</tr>';
                        $('#hblTableContainer table tbody').append(newRowHtml);
                    }

                    // Add click event for Remove button
                    $('#hblRow_' + response.hbl_id + ' .removeContainer').click(function() {
                        var hbl_id = $(this).data('hblid');
                        var rowToRemove = $('#hblRow_' + hbl_id); // Reference to the row
                        // Nullify the container_id_fk in hbl table for the corresponding hbl_id
                        $.post("code-container.php", {
                            action: 'remove_container',
                            hbl_id: hbl_id
                        }, function(response) {
                            // Handle the response, e.g., reload the table
                            console.log(response);
                            // Hide the table row
                            rowToRemove.hide(); // Hide the specified table row
                        });
                    });

                    // Show SweetAlert to add HBL to container
                    Swal.fire({
                        title: "Add HBL to Container",
                        text: "Do you want to add this HBL to a container?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Add click event for Add button
                            $.post("code-container.php", {
                                action: 'update_container_id_fk',
                                hbl_id: response.hbl_id,
                                shipped_details_id: $('#eid').val()
                            }, function(updateResponse) {
                                // Handle the update response if needed
                                console.log(updateResponse);
                                Swal.fire({
                                    title: "Container ID Updated",
                                    text: "Container ID updated successfully.",
                                    icon: "success",
                                    button: "OK",
                                });
                            });
                        }
                    });
                }

                // Add click event to the add button
                $('#addHBLRow').click(function() {
                    var codeOrBillNumber = $('#hblSearchInput').val();

                    // Make an AJAX request to search for the entered code or bill number
                    $.post("code-container.php", {
                        action: 'search_hbl',
                        code_or_bill_number: codeOrBillNumber
                    }, function(response) {
                        // Handle the response, if any
                        if (response.success) {
                            // Call function to add HBL row to the table
                            addHBLRow(response);
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                                button: "OK",
                            });
                        }
                    }, 'json');
                });

                // Your existing code for editing shipping details...
            });


            // Update Shipping Detail
            $("#updateShippingDetails").click(function() {
                $.post("code-container.php", $("#shippingDetailsUpdateForm").serialize() + '&action=update', function(response) {
                    // Refresh DataTable after update
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#updateShippingDetailsModal').modal('hide');
                        // Clear the form fields
                        table.ajax.reload();
                    });
                });
            });

            // Delete Agent
            $('#shippingDetailsTable tbody').on('click', '.deleteShippingDetail', function() {
                var shipped_details_id = $(this).data("id");

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
                        $.post("code-container.php", {
                            action: 'delete',
                            shipped_details_id: shipped_details_id
                        }, function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            table.ajax.reload();
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        Swal.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        );
                    }
                });
            });


        });
    </script>
</body>

</html>