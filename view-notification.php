<?php $title = 'notification'; // Default title?>
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
                                                    Notification </li>
                                                <!--end::Item-->

                                            </ul>
                                            <!--end::Breadcrumb-->
                                        </div>
                                        <!--end::Page title-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        <a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" id="offer_notification"><i class="fad fa-tags fs-1"></i></a>

                                            <div class="modal fade" tabindex="-1" id="customerNotificationModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Notification</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <div class="modal-body">
                                                        <form id="customerNotofiForm">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Notification</label>
                                                                            <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid2" name="eid2" required>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="notification" name="notification">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                    
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="sendCustomerNotification">
                                                                            <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                            Send notification
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

                                            <div class="modal fade" tabindex="-1" id="customerOfferModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Offer Notification</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <div class="modal-body">
                                                        <form id="customerOfferForm">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Offer name</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="offer_name" name="offer_name">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Offer title</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="offer_t" name="offer_t">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Offer subject</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="offer_s" name="offer_s">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Offer end date</label>
                                                                            <input type="date" class="form-control form-control-lg form-control-solid" id="offer_end_date" name="offer_end_date">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                    
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="sendOfferNotification">
                                                                            <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                            Send offer
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
                                                    <table id="customerTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-150px">#</th>
                                                            <th class="min-w-150px">Name</th>
                                                            <th class="min-w-150px">Mobile</th>
                                                            <th class="min-w-150px">Email</th>
                                                            <th class="min-w-150px">Address</th>
                                                            <th class="min-w-150px">City</th>
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
        <!--end::Custom Javascript-->
        <!--end::Javascript-->

        <script>
            $(document).ready(function() {


                $.ajax({
                    url: 'get_employees.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if(data && data.length > 0) {
                            var options = '';
                            $.each(data, function(index, employee) {
                                options += '<option value="' + employee.employee_id + '">' + employee.name + '</option>';
                            });
                            $('#employee').append(options);
                        } else {
                            $('#employee').append('<option value="">No employees found</option>');
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
                        if(data && data.length > 0) {
                            var options = '';
                            $.each(data, function(index, employee) {
                                options += '<option value="' + employee.employee_id + '">' + employee.name + '</option>';
                            });
                            $('#eemployee').append(options);
                        } else {
                            $('#eemployee').append('<option value="">No employees found</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
                // DataTable initialization
                var table = $('#customerTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-customer.php",
                    "type": "POST",
                    "data": { action: 'fetch' }, // Fetch HBL data
                    "dataSrc": ""
                },
                "columns": [
                    { 
                        "data": "id",
                        "render": function(data, type, full, meta) {
                            return '<input type="checkbox" class="row-checkbox" value="' + data + '">';
                        }
                    },
                    { "data": "customer_name" },
                    { "data": "mobile" },
                    { "data": "email" },
                    { "data": "address" },
                    { "data": "city" },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return`<a href="#" class="btn btn-active-icon-primary btn-text-primary customerNotification" data-id="${data.id}"><i class="fad fa-comment-alt fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                
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

               

                $('#customerTable tbody').on('click', '.customerNotification', function() {
                    var customer_id = $(this).data("id");
                    $.post("code-customer.php", { action: 'edit_pass', customer_id: customer_id }, function(data) {
                        // Populate modal with employee data for editing
                        // For example:
                        $('#customerNotificationModal').modal('show');
                        $('#eid2').val(data.id);
                        // Populate other fields similarly
                    }, 'json');
                });

                $('#offer_notification').on('click', function() {
                    
                    $('#customerOfferModal').modal('show');
                        // Populate other fields similarly
                   
                });

                $("#sendOfferNotification").click(function() {
    let selectedIds = [];

    // Iterate over selected checkboxes and collect HBL IDs
    $('#customerTable tbody input[type="checkbox"].row-checkbox:checked').each(function() {
        selectedIds.push($(this).val());
    });

    console.log(selectedIds);

    // Combine form data with selectedIds
    let formData = $("#customerOfferForm").serializeArray();
    let data = {};
    $.each(formData, function() {
        data[this.name] = this.value;
    });
    data['selectedIds'] = JSON.stringify(selectedIds);
    data['action'] = 'send_offer';

    $.post("code-customer.php", data, function(response) {
        // Refresh DataTable after update
        if (response.includes('success')) {
            Swal.fire({
                toast: true,
                icon: 'success',
                title: response,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                padding: '2em'
            }).then(function() {
                // Close the modal
                $('#customerOfferModal').modal('hide');
                // Clear the form fields
                $('#customerOfferForm')[0].reset();
                // Reload the DataTable
                table.ajax.reload();
            });
        } else {
            Swal.fire({
                toast: true,
                icon: 'warning',
                title: response,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                padding: '2em'
            });
        }
    });
});








            });

        </script>
    </body>
</html>
