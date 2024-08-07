<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php include 'web-layouts/delivery-agent-head.php'; ?>
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
                                                Delivery agent </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">


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

                                        <div class="modal fade" tabindex="-1" id="signatureModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Complete delivery</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="signatureAddForm" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <!-- Name and File Upload Section -->
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="name">Name</label>
                                                                        <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid" name="eid" required>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="hname" name="hname" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hbl_balance">HBL Balance</label>
                                                                        <!-- Use a span element to display the hbl_balance value -->
                                                                        <span id="ehbl_balance" class="font-weight-bold"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hbl_balance">HBL Paid Amount</label>
                                                                        <!-- Use a span element to display the hbl_balance value -->
                                                                        <span id="ehbl_paidamount" class="font-weight-bold"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="balance_status">Balance Status</label>
                                                                        <select class="form-control form-control-lg form-control-solid" id="ebalance_status" name="balance_status">
                                                                            <option value="0">Balance</option>
                                                                            <option value="1">Paid</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="mobile">Delivery complete image</label>
                                                                        <input type="file" class="form-control form-control-lg form-control-solid" id="dcimage" name="dcimage" required>
                                                                    </div>
                                                                </div>
                                                                <!-- Signature Section -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="signature">Signature</label>
                                                                        <div id="signatureContainer">
                                                                            <canvas id="signatureCanvas" class="border rounded mt-3"></canvas>
                                                                        </div>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <a href="#" class="btn btn-light-danger hover-scale" id="clearSignature">Clear Signature</a>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a href="#" class="btn btn-light-warning hover-scale" id="disable">Disable</a>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" id="signatureDataURL" name="signatureDataURL">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveSignature">
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

                                        <div class="modal fade" tabindex="-1" id="editsignatureModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Edit complete delivery</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="signatureEditForm" enctype="multipart/form-data">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <!-- Name and File Upload Section -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="hidden" class="form-control form-control-solid" id="complete_delivery_id" name="complete_delivery_id" required>
                                                                            <input type="text" class="form-control form-control-solid" id="ehname" name="ehname" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mobile">Delivery complete image</label>
                                                                            <input type="file" class="form-control form-control-solid" id="edcimage" name="edcimage" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div id="uploadedImageContainer" class="mb-3">
                                                                            <label for="uploadedImage">Uploaded Image</label>
                                                                            <img id="uploadedImage" src="" alt="Uploaded Image" class="img-fluid" style="max-width: 200px; height: auto;">
                                                                        </div>
                                                                    </div>
                                                                    <!-- Signature Section -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="signature">Signature</label>
                                                                            <div id="signatureContainer">
                                                                                <canvas id="esignatureCanvas" class="border rounded mt-3"></canvas>
                                                                            </div>
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-6">
                                                                                    <a href="#" class="btn btn-light-danger hover-scale" id="eclearSignature">Clear Signature</a>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <a href="#" class="btn btn-light-warning hover-scale" id="disable">Disable</a>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" id="esignatureDataURL" name="esignatureDataURL">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!-- Modal Footer -->
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="editSignature">
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

                                        <div class="modal fade" tabindex="-1" id="viewSCModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content shadow-none">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Sender & Reciver details</h5>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="loadingAddForm">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <h5 class="modal-title">Sender details</h5>
                                                                <div class="separator my-10"></div>
                                                                <!-- Fields for editing Shipper -->
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_name">Shipper Name</label>
                                                                                <span id="eshipper_name" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_address">Shipper Address</label>
                                                                                <span id="eshipper_address" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_mobile">Shipper Mobile</label>
                                                                                <span id="eshipper_mobile" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_ppnic">Shipper PP/NIC</label>
                                                                                <span id="eshipper_ppnic" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_city">Shipper City</label>
                                                                                <span id="eshipper_city" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_country">Shipper Country</label>
                                                                                <span id="eshipper_country" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="eshipper_email">Shipper Email</label>
                                                                                <span id="eshipper_email" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h5 class="modal-title">Receiver details</h5>
                                                                <div class="separator my-10"></div>
                                                                <!-- Fields for editing Consignee -->
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_name">Consignee Name</label>
                                                                                <span id="econsignee_name" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_address">Consignee Address</label>
                                                                                <span id="econsignee_address" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_mobile">Consignee Mobile</label>
                                                                                <span id="econsignee_mobile" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_ppnic">Consignee PP/NIC</label>
                                                                                <span id="econsignee_ppnic" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_city">Consignee City</label>
                                                                                <span id="econsignee_city" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_country">Consignee Country</label>
                                                                                <span id="econsignee_country" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-5">
                                                                            <div class="form-group">
                                                                                <label for="econsignee_email">Consignee Email</label>
                                                                                <span id="econsignee_email" class="form-control-static"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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




                                <div class="card card-flush mb-5 mb-xl-10 ">
                                    <div class="card-header card-header-stretch">
                                        <h3 class="card-title"></h3>
                                        <div class="card-toolbar">
                                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">Deliverd</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">Completed</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                                                <div class="p-0">
                                                    <div class="pt-5 pb-10">
                                                        <table id="shippingDetailsTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                            <thead>
                                                                <th>Comapny</th>
                                                                <th>HBL Code</th>
                                                                <th>Date</th>
                                                                <th>Bill No</th>
                                                                <th>Code</th>
                                                                <th>Sales Rep</th>
                                                                <th>Shipper</th>
                                                                <th>Consignee</th>
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
                                            </div>

                                            <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                                                <div class="p-0">
                                                    <div class="pt-5 pb-10">
                                                        <table id="signatureTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                            <thead>
                                                                <th>Date</th>
                                                                <th>Bill No</th>
                                                                <th>Code</th>
                                                                <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <script src="<?php echo $url; ?>assets/plugins/signature/signature_pad.min.js"></script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->

        <script>
            $(document).ready(function() {



            });


            $(document).ready(function() {

                var canvas = document.getElementById('signatureCanvas');
                var signaturePad = new SignaturePad(canvas);

                $('#clearSignature').on('click', function() {
                    signaturePad.clear();
                });

                var canvas = document.getElementById('esignatureCanvas');
                var signaturePad = new SignaturePad(canvas);

                $('#eclearSignature').on('click', function() {
                    signaturePad.clear();
                });
                // DataTable initialization
                var table = $('#shippingDetailsTable').DataTable({
                    responsive: true,
                    "ajax": {
                        "url": "code-deliverd.php",
                        "type": "POST",
                        "data": {
                            action: 'fetch'
                        }, // Fetch HBL data
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "c_name",
                        },
                        {
                            "data": "code",
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
                            "data": "emp_name"
                        },
                        {
                            "data": "Shipper_name"
                        },
                        {
                            "data": "Consignee_name"
                        },
                        {
                            "data": "hAmount"
                        }, // Total Amount
                        {
                            "data": "current_status",
                            "render": function(data, type, full, meta) {
                                var badgeClass = '';
                                var badgeText = '';

                                switch (data) {
                                    case 'shipped':
                                        badgeClass = 'badge badge-light-info';
                                        badgeText = 'Shipped';
                                        break;
                                    case 'delivered':
                                        badgeClass = 'badge badge-light-warning';
                                        badgeText = 'Delivered';
                                        break;
                                    case 'completed':
                                        badgeClass = 'badge badge-light-warning';
                                        badgeText = 'Completed';
                                        break;
                                }

                                return '<span class="' + badgeClass + '">' + badgeText + '</span>';
                            }

                        },
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                                return `<a href="#" class="btn btn-active-icon-success btn-text-success editWidgt" data-id="${data.hbl_id}"><i class="fad fa-check-double fs-1"></i></a>
                                    <a href="#" class="btn btn-active-icon-gray-600 btn-text-gray-600 viewWidgt" data-id="${data.hbl_id}"><i class="ki-duotone ki-eye fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>`;
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

                var table2 = $('#signatureTable').DataTable({
                    responsive: true,
                    "ajax": {
                        "url": "code-signature.php",
                        "type": "POST",
                        "data": {
                            action: 'fetch'
                        }, // Fetch HBL data
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "name"
                        },
                        {
                            "data": "image",
                            "render": function(data, type, full, meta) {
                                return '<img src="uploads/' + data + '" alt="Image" style="max-width: 100px; max-height: 100px;">';
                            }
                        },
                        {
                            "data": "signature",
                            "render": function(data, type, full, meta) {
                                return '<img src="' + data + '" alt="Signature" style="max-width: 100px; max-height: 100px;">';
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                                return '<a href="#" class="btn btn-active-icon-success btn-text-success editWidgt2" data-id="' + data.complete_delivery_id + '"><i class="fad fa-check-double fs-1"></i></a>';
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





                $('#shippingDetailsTable tbody').on('click', '.editWidgt', function() {
                    var hbl_id = $(this).data("id");

                    // Fetch HBL data
                    $.post("code-signature.php", {
                        action: 'view_bal',
                        hbl_id: hbl_id
                    }, function(data) {
                        console.log(data);

                        var fromCurrency = data.currency; // Get currency from data
                        var toCurrency = 'LKR'; // Convert to Sri Lankan Rupees

                        // Fetch exchange rate
                        $.ajax({
                            url: 'exchange-rate.php',
                            type: 'POST',
                            data: {
                                from_currency: fromCurrency,
                                to_currency: toCurrency
                            },
                            dataType: 'json',
                            success: function(rateData) {
                                if (rateData.error) {
                                    console.error('Error fetching exchange rate:', rateData.error);
                                    return;
                                }

                                var exchangeRate = rateData.rate;

                                // Convert amounts to LKR
                                var balanceLKR = (parseFloat(data.hbl_balance) * exchangeRate).toFixed(2);
                                var amountLKR = (parseFloat(data.HBLAmount) * exchangeRate).toFixed(2);

                                // Update modal content with received data
                                $('#signatureModal').modal('show');
                                $('#eid').val(hbl_id);
                                $('#ehbl_balance').text(data.hbl_balance + ' ' + fromCurrency + ' (' + balanceLKR + ' LKR)');
                                $('#ehbl_paidamount').text(data.HBLAmount + ' ' + fromCurrency + ' (' + amountLKR + ' LKR)');

                                if (data.hbl_balance === '1') {
                                    $('#ehbl_balance').addClass('text-danger font-weight-bold'); // Add red color and bold styling
                                } else {
                                    $('#ehbl_balance').removeClass('text-danger font-weight-bold'); // Remove styling if not needed
                                }

                                // Pre-select an option in the select dropdown based on balance_status value
                                $('#ebalance_status').val(data.balance_status); // Assuming balance_status is provided by the server
                            },
                            error: function(xhr, status, error) {
                                console.error('Error in AJAX request:', error);
                            }
                        });
                    }, 'json');
                });






                $(document).ready(function() {
                    // Initialize signature pad
                    var canvas = document.getElementById('signatureCanvas');
                    var signaturePad = new SignaturePad(canvas);

                    // Handle form submission when saveSignature button is clicked
                    $('#saveSignature').click(function(event) {
                        // Prevent default button behavior
                        event.preventDefault();

                        // Get signature data as base64
                        var signatureData = signaturePad.toDataURL();

                        // Append signature data to form data
                        var formData = new FormData($('#signatureAddForm')[0]);
                        formData.append('action', 'insert'); // Add the 'action' parameter
                        formData.append('signatureDataURL', signatureData);

                        // Send AJAX request
                        $.ajax({
                            url: 'code-signature.php', // Your PHP file handling the form submission
                            type: 'POST',
                            data: formData, // Combine action and form data
                            async: false,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                // Handle success response
                                //console.log(response);
                                // Show sweet alert
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Signature Saved',
                                    text: 'Your signature has been saved successfully!',
                                    showConfirmButton: true
                                }).then(function(result) {
                                    // Close modal after the user clicks the OK button in the SweetAlert dialog
                                    if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                                        $('#signatureModal').modal('hide');
                                        table.ajax.reload();
                                    }
                                });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                // Handle error
                                console.log(textStatus, errorThrown);
                            }
                        });
                    });
                });


                $('#signatureTable tbody').on('click', '.editWidgt2', function() {
                    var complete_delivery_id = $(this).data("id");

                    // Send a POST request to code-signature.php to fetch delivery details for editing
                    $.post("code-signature.php", {
                        action: 'edit',
                        complete_delivery_id: complete_delivery_id
                    }, function(data) {
                        // Check if data is retrieved successfully
                        if (data) {
                            // Populate modal with delivery data for editing
                            $('#editsignatureModal').modal('show');
                            $('#complete_delivery_id').val(complete_delivery_id);
                            $('#ehname').val(data.name);

                            // Display uploaded image
                            if (data.dcimage) {
                                var uploadedImageUrl = 'uploads/' + data.dcimage; // Assuming 'uploads/' is the directory where images are stored
                                $('#uploadedImage').attr('src', uploadedImageUrl);
                                $('#uploadedImageContainer').show();
                            } else {
                                // If no image is uploaded, hide the image container
                                $('#uploadedImageContainer').hide();
                            }

                            // Set signature data to signature canvas
                            var signatureData = data.signatureDataURL;
                            var canvas = document.getElementById('esignatureCanvas');
                            var ctx = canvas.getContext('2d');
                            var image = new Image();
                            image.onload = function() {
                                ctx.drawImage(image, 0, 0);
                            };
                            image.src = signatureData;

                            // You might need to handle file input separately
                        } else {
                            // Handle case where data is not retrieved or invalid
                            console.error("Error: No data retrieved for editing");
                            // Optionally, display an error message to the user
                        }
                    }, 'json').fail(function(xhr, textStatus, errorThrown) {
                        // Handle AJAX request failure
                        console.error("Error:", textStatus, errorThrown);
                        // Optionally, display an error message to the user
                    });
                });



                $('#edcimage').change(function() {
                    var input = this;
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#uploadedImage').attr('src', e.target.result);
                            $('#uploadedImageContainer').show();
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                });

                $(document).ready(function() {
                    $('#editSignature').click(function(e) {
                        e.preventDefault();

                        // Get signature data URL from canvas
                        var signatureData = $('#esignatureCanvas')[0].toDataURL();

                        // Collect form data
                        var formData = new FormData($('#signatureEditForm')[0]);
                        formData.append('action', 'update'); // Add action parameter
                        formData.append('esignatureDataURL', signatureData); // Add signature data

                        // Send form data via AJAX
                        $.ajax({
                            url: 'code-signature.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                //console.log(response); // Handle response as needed
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Signature Saved',
                                    text: 'Your signature has been updated successfully!',
                                    showConfirmButton: true
                                }).then(function(result) {
                                    // Close modal after the user clicks the OK button in the SweetAlert dialog
                                    if (result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                                        $('#editsignatureModal').modal('hide'); // Close modal on success
                                        // Optionally, reload or update any related data
                                        table2.ajax.reload(); // Example: Reload DataTable
                                    }
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                console.error("Error:", textStatus, errorThrown);
                                // Optionally, display an error message to the user
                            }
                        });
                    });
                });



                $('#shippingDetailsTable tbody').on('click', '.viewWidgt', function() {
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

                        $('#eshipper_name').text(data.Shipper_name);
                        $('#eshipper_address').text(data.Shipper_address);
                        $('#eshipper_mobile').text(data.Shipper_mobile);
                        $('#eshipper_pp_nic').text(data.Shipper_pp_nic);
                        $('#eshipper_city').text(data.Shipper_city);
                        $('#eshipper_country').text(data.Shipper_country);
                        $('#eshipper_email').text(data.Shipper_email);
                        $('#econsignee_name').text(data.Consignee_name);
                        $('#econsignee_address').text(data.Consignee_address);
                        $('#econsignee_mobile').text(data.Consignee_mobile);
                        $('#econsignee_ppnic').text(data.Consignee_pp_nic);
                        $('#econsignee_city').text(data.Consignee_city);
                        $('#econsignee_country').text(data.Consignee_country);
                        $('#econsignee_email').text(data.Consignee_email);

                        // Clear existing rows in the first table



                    }, 'json');
                });




            });
        </script>
</body>

</html>