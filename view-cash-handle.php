<?php $title = 'cash - handle'; // Default title?>
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
                                                    Cash handle </li>
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
                            $location_permissions = explode(', ', $_SESSION['auth_user']['location']);

                            // Check if user has add permission
                            $can_add = in_array('location_add', $location_permissions);

                            // Check if user has edit permission
                            $can_edit = in_array('location_edit', $location_permissions);

                            // Check if user has delete permission
                            $can_delete = in_array('location_delete', $location_permissions);

                            // Check if user has add and delete permissions combined
                            $can_add_delete = in_array('location_add,location_delete', $location_permissions);

                            // Check if user has add and edit permissions combined
                            $can_add_edit = in_array('location_add,location_edit', $location_permissions);

                            // Check if user has edit and delete permissions combined
                            $can_edit_delete = in_array('location_edit,location_delete', $location_permissions);

                            // Check if user has add,edit and delete permissions combined
                            $can_add_edit_delete = in_array('location_add,location_edit,location_delete', $location_permissions);

                            $access_denied = in_array('location_access_denied', $location_permissions);
                        } else {
                            // User is not logged in or doesn't have access rights, set all to false
                            $can_add = false;
                            $can_edit = false;
                            $can_delete = false;
                            $can_add_delete = false;
                        }
                        ?>      
                                            <script>
                                                <?php if(!$access_denied): ?>
                                                    // Check PHP variables and render button visibility using JavaScript
                                                    <?php if ($can_add || $can_add_delete || $can_add_edit || $can_add_edit_delete ) : ?>
                                                        document.write('<a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addLocationModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>');
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </script>
                                            

                                            




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
                                                    <table id="cashHandleTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                                <th class="min-w-150px">HBL Code</th>
                                                                <th class="min-w-150px">Employee Name</th>
                                                                <th class="min-w-150px">Cash Amount</th>
                                                                <th class="min-w-150px">Collected Amount</th>
                                                                <th class="min-w-150px">Get date</th>
                                                                <th class="min-w-150px">Update date</th>
                                                                <th class="min-w-150px">Status</th>
                                                                <th class="min-w-150px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                                <th colspan="2"></th>
                                                                <th id="totalCashAmount" class="min-w-150px"></th>
                                                                <th colspan="4"></th>
                                                            </tr>
                                                        </tfoot>
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

                                            <div class="modal fade" tabindex="-1" id="updateCashHandleModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Cash handle</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="cashHandleUpdateForm">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4><label for="eaddress">Cash amount : </label><small><label id="ecash_amount2"></label></small></h4>
                                                                        
                                                                            
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="ename">Employee name</label>
                                                                            <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid" name="eid" required>
                                                                            <input type="hidden" id="ecash_amount" name="ecash_amount">
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ename" name="ename" required>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="eaddress">Collacted amount</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ecollected_amount" name="ecollected_amount">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="estatus">Status</label>
                                                                            <select class="form-control form-control-lg form-control-solid" id="ecollected" name="ecollected">
                                                                                <option value="0">Not Collected</option>
                                                                                <option value="1">Collected</option>
                                                                                
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateCashHandle">
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
            var table = $('#cashHandleTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-cash-handle.php",
                    "type": "POST",
                    "data": { action: 'fetch' }, // Fetch HBL data
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "code" },
                    { "data": "emp_name" },
                    { "data": "cash_amount" },
                    { "data": "handle_amount" },
                    { "data": "get_cash_dte" },
                    { "data": "updte" },
                    { 
                        "data": "collected",
                        "render": function(data, type, full, meta) {
                            var badgeClass = data == 1 ? 'badge badge-light-success' : 'badge badge-light-warning';
                            var badgeText = data == 1 ? 'Collected' : 'Not Collected';
                            return `<span class="${badgeClass}">${badgeText}</span>`;
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            var accessDenied = <?php echo $access_denied ? 'true' : 'false'; ?>;
                            var buttons = '';

                            // Render the button regardless of access denied permission

                            // If user has access_denied permission, return the button
                            if (accessDenied) {
                                return buttons;
                            }

                            // Render edit button if user has edit permission
                            if (<?php echo $can_edit || $can_add_edit || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editCashHandle" data-id="${data.cash_handle_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                            }

                            

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

            // Calculate and display total cash amount in the footer
            var cashAmountTotal = 0;
            table.rows().every(function () {
                var rowData = this.data();
                cashAmountTotal += parseFloat(rowData[2]);
            });
            $('#totalCashAmount').html('<strong>Total Cash Amount: ' + cashAmountTotal.toFixed(2) + '</strong>');


            $('#cashHandleTable tbody').on('click', '.editCashHandle', function() {
                    var cash_handle_id = $(this).data("id");
                    $.post("code-cash-handle.php", { action: 'edit', cash_handle_id: cash_handle_id }, function(data) {
                        // Populate modal with location data for editing
                        $('#updateCashHandleModal').modal('show');
                        $('#eid').val(data.cash_handle_id);
                        $('#ename').val(data.name);
                        $('#ecash_amount2').text(data.cash_amount);
                        $('#ecash_amount').val(data.cash_amount);
                        $('#ecollected_amount').val(data.handle_amount);
                        $('#ecollected').val(data.collected);
                    }, 'json');
                });


                $("#updateCashHandle").click(function(e) {
    e.preventDefault();
    
    let cashAmount = parseFloat(document.getElementById('ecash_amount').value);
    let collectedAmount = parseFloat(document.getElementById('ecollected_amount').value);
    
    if (isNaN(cashAmount) || isNaN(collectedAmount)) {
        alert('Please enter valid amounts.');
        return;
    }

    if (collectedAmount > cashAmount) {
        alert('Collected amount is greater than the cash amount.');
        return;
    }

    let status = (cashAmount === 0 || collectedAmount === cashAmount) ? 1 : 0;
    
    $.post("code-cash-handle.php", $("#cashHandleUpdateForm").serialize() + '&action=update', function(response) {
        Swal.fire({
            icon: 'success',
            padding: '2em',
            title: 'Success!',
            text: response,
            showConfirmButton: true
        }).then(function() {
            // Close the modal
            $('#updateCashHandleModal').modal('hide');
            // Clear the form fields
            table.ajax.reload();
            location.reload();
        });
    });
});

        });


        

      
        </script>
    </body>
</html>
