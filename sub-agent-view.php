<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php include 'web-layouts/delivery-agent-head.php'; ?>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <?php include 'web-layouts/dl_script.php'; ?>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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

                <?php include 'web-layouts/side_bar.php'; ?>




                <!--begin::Sidebar-->

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
                                                Delivery Sub Agent </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                                        <a href="#" class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addDASRegisterModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>

                                        <div class="modal fade" tabindex="-1" id="addDASRegisterModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Register</h3>
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="registerDASAddForm">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery sub agent name</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="das_name" name="das_name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery sub agent contact</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="das_conatct" name="das_conatct" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery sub agent email</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="das_email" name="das_email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Delivery agent location</label>
                                                                        <input type="email" class="form-control form-control-lg form-control-solid" id="das_location" name="das_location" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Username</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="das_uername" name="das_uername" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" class="form-control form-control-lg form-control-solid" id="das_pass" name="das_pass" required>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveDASRegister">
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


                                        <div class="modal fade" tabindex="-1" id="editDASRegisterModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Edit Register</h3>
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="registerDASUpdateForm">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery sub agent name</label>
                                                                        <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid" name="eid" required>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="edas_name" name="edas_name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery sub agent contact</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="edas_conatct" name="edas_conatct" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery sub agent email</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="edas_email" name="edas_email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Delivery sub agent location</label>
                                                                        <input type="email" class="form-control form-control-lg form-control-solid" id="edas_location" name="edas_location" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Username</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="edas_uername" name="edas_uername" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" class="form-control form-control-lg form-control-solid" id="edas_pass" name="edas_pass" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateDASRegister">
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
                                                <table id="subregisterTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                    <thead>
                                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-150px">Delivery sub agent name</th>
                                                            <th class="min-w-150px">Contact</th>
                                                            <th class="min-w-150px">Email</th>
                                                            <th class="min-w-150px">Location</th>
                                                            <th class="min-w-150px">Username</th>
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
    <!--end::App-->



    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Modals-->
    <!--begin::Modal - Users Search-->

    <!--end::Modal - Users Search-->
    <!--begin::Modal - Invite Friends-->

    <!--end::Modal - Invite Friend--> <!--end::Modals-->

    <!--begin::Javascript-->


    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <?php include 'web-layouts/script.php'; ?>
    <script>
        $(document).ready(function() {

            var table = $('#subregisterTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-subregister.php", // Update the URL to the PHP script handling registration data
                    "type": "POST",
                    "data": {
                        action: 'das_fetch'
                    }, // Send fetch action to retrieve data
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "das_name"
                    }, // Update to username field from the database
                    {
                        "data": "das_conatct"
                    }, // Update to email field from the database
                    {
                        "data": "das_email"
                    }, // Update to password field from the database
                    {
                        "data": "das_location"
                    }, // Update to role_as field from the database
                    {
                        "data": "das_uername"
                    }, // Update to status field from the database
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return `<a href="#" class="btn btn-active-icon-primary btn-text-primary editRegister" data-id="${data.sub_delivery_agent_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                            <a href="#" class="btn btn-active-icon-danger btn-text-danger deleteRegister" data-id="${data.sub_delivery_agent_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;

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



            $("#saveDASRegister").click(function() {
                $.post("code-subregister.php", $("#registerDASAddForm").serialize() + '&action=insert_das', function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#addDASRegisterModal').modal('hide');
                        // Clear the form fields
                        $('#registerDASAddForm')[0].reset();
                        table.ajax.reload();
                    });
                });
            });


            $('#subregisterTable tbody').on('click', '.editRegister', function() {
                var sub_delivery_agent_id = $(this).data("id");
                $.post("code-subregister.php", {
                    action: 'das_edit',
                    sub_delivery_agent_id: sub_delivery_agent_id
                }, function(data) {
                    // Populate modal with location data for editing
                    $('#editDASRegisterModal').modal('show');
                    $('#eid').val(data.sub_delivery_agent_id);
                    $('#edas_name').val(data.das_name);
                    $('#edas_conatct').val(data.das_conatct);
                    $('#edas_email').val(data.das_email);
                    $('#edas_location').val(data.das_location);
                    $('#edas_uername').val(data.das_uername);
                    $('#edas_pass').val(data.das_pass);

                    $.post("code-subregister.php", {
                        action: 'get_hbl_rows',
                        sub_delivery_agent_id: sub_delivery_agent_id
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
                                $.post("code-subregister.php", {
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
                        tableHtml += '<td>' +
                            '<a href="#" class="btn btn-icon btn-danger removeContainer" data-hblid="' + response.hbl_id + '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a>' +
                            '</td>';
                        tableHtml += '</tr>';

                        tableHtml += '</tbody></table></div>';
                        $('#hblTableContainer').html(tableHtml);
                    } else {
                        // If the table already contains rows, append the new row
                        var newRowHtml = '<tr id="hblRow_' + response.hbl_id + '">';
                        newRowHtml += '<td>' + response.hbl_id + '</td>';
                        newRowHtml += '<td>' + response.Date + '</td>';
                        newRowHtml += '<td>' + response.Bill_no + '</td>';
                        newRowHtml += '<td>' +
                            '<a href="#" class="btn btn-icon btn-danger removeContainer" data-hblid="' + response.hbl_id + '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a>' +
                            '</td>';
                        newRowHtml += '</tr>';
                        $('#hblTableContainer table tbody').append(newRowHtml);
                    }

                    // Add click event for Remove button
                    $('#hblRow_' + response.hbl_id + ' .removeContainer').click(function() {
                        var hbl_id = $(this).data('hblid');
                        var rowToRemove = $('#hblRow_' + hbl_id); // Reference to the row
                        // Nullify the container_id_fk in hbl table for the corresponding hbl_id
                        $.post("code-subregister.php", {
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
                        title: "Add HBL to Sub agent",
                        text: "Do you want to add this HBL to a sub agent?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Add click event for Add button
                            $.post("code-subregister.php", {
                                action: 'update_container_id_fk',
                                hbl_id: response.hbl_id,
                                sub_delivery_agent_id: $('#eid').val()
                            }, function(updateResponse) {
                                // Handle the update response if needed
                                console.log(updateResponse);
                                Swal.fire({
                                    title: "Sub agent Updated",
                                    text: "Sub agent updated successfully.",
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
                    $.post("code-subregister.php", {
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

            $("#updateDASRegister").click(function() {
                $.post("code-subregister.php", $("#registerDASUpdateForm").serialize() + '&action=das_update', function(response) {
                    // Refresh DataTable after update
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#editDASRegisterModal').modal('hide');
                        // Clear the form fields
                        table.ajax.reload();
                    });
                });
            });

            $('#subregisterTable tbody').on('click', '.deleteRegister', function() {
                var register_id = $(this).data("id");

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
                        $.post("code-subregister.php", {
                            action: 'delete',
                            register_id: register_id
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
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>

</html>