<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php include '../web-layouts/admin-head.php'; ?>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <?php include '../web-layouts/dl_script.php'; ?>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->


    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


            <!--begin::Header-->
            <?php include '../web-layouts/admin-header.php'; ?>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <?php include '../web-layouts/admin-side_bar.php'; ?>




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
                                                Delivery Agent Register </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                                        <a href="#" class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addDARegisterModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>

                                        <div class="modal fade" tabindex="-1" id="addDARegisterModal">
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
                                                        <form id="registerDAAddForm">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery agent name</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="da_name" name="da_name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery agent contact</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="da_conatct" name="da_conatct" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery agent email</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="da_email" name="da_email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Delivery agent location</label>
                                                                        <input type="email" class="form-control form-control-lg form-control-solid" id="da_location" name="da_location" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Username</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="da_uername" name="da_uername" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" class="form-control form-control-lg form-control-solid" id="da_pass" name="da_pass" required>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveDARegister">
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


                                        <div class="modal fade" tabindex="-1" id="editDARegisterModal">
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
                                                        <form id="registerDAUpdateForm">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery agent name</label>
                                                                        <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid" name="eid" required>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="eda_name" name="eda_name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery agent contact</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="eda_conatct" name="eda_conatct" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="username">Delivery agent email</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="eda_email" name="eda_email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="email">Delivery agent location</label>
                                                                        <input type="email" class="form-control form-control-lg form-control-solid" id="eda_location" name="eda_location" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Username</label>
                                                                        <input type="text" class="form-control form-control-lg form-control-solid" id="eda_uername" name="eda_uername" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" class="form-control form-control-lg form-control-solid" id="eda_pass" name="eda_pass" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateDARegister">
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

                                        <div class="modal fade" tabindex="-1" id="addDAgentAddressModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Agent Branch</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="agentAddressAddForm">
                                                            <!--begin::Repeater-->
                                                            <!--begin::Repeater-->
                                                            <div id="agentAddressRepeater">
                                                                <!--begin::Form group-->

                                                                <!--end::Form group-->

                                                                <!--begin::Form group-->
                                                                <div class="row ">

                                                                </div>
                                                                <div class="form-group">
                                                                    <a href="javascript:;" data-repeater-create class="btn btn-flex btn-light-primary">
                                                                        <i class="ki-duotone ki-plus fs-3"></i>
                                                                        Add
                                                                    </a>
                                                                </div>
                                                                <!--end::Form group-->
                                                            </div>
                                                            <!--end::Repeater-->



                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateAgentAddress">
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
                                                <table id="registerTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                    <thead>
                                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-150px">Delivery agent name</th>
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
                    <?php include '../web-layouts/footer.php'; ?>
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
    <?php include '../web-layouts/script.php'; ?>
    <script>
        $(document).ready(function() {
            $('#addDAgentAddressModal').on('hidden.bs.modal', function(e) {
                // Reload the current page
                location.reload();
            });
            var table = $('#registerTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-register.php", // Update the URL to the PHP script handling registration data
                    "type": "POST",
                    "data": {
                        action: 'da_fetch'
                    }, // Send fetch action to retrieve data
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "da_name"
                    }, // Update to username field from the database
                    {
                        "data": "da_conatct"
                    }, // Update to email field from the database
                    {
                        "data": "da_email"
                    }, // Update to password field from the database
                    {
                        "data": "da_location"
                    }, // Update to role_as field from the database
                    {
                        "data": "da_uername"
                    }, // Update to status field from the database
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return `<a href="#" class="btn btn-active-icon-primary btn-text-primary addtAgentB" data-id="${data.delivery_agent_id}"><i class="fad fa-clipboard-list-check fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                            <a href="#" class="btn btn-active-icon-primary btn-text-primary editRegister" data-id="${data.delivery_agent_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                            <a href="#" class="btn btn-active-icon-danger btn-text-danger deleteRegister" data-id="${data.delivery_agent_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;

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

            $(document).ready(function() {
                // Event listener for "Add" button click
                $('#registerTable tbody').on('click', '.addtAgentB', function() {
                    var delivery_agent_id = $(this).data("id");
                    $('#addDAgentAddressModal').modal('show');
                    $('#delivery_agent_id').val(delivery_agent_id);

                    // Event listener for creating a new repeater item
                    $('#agentAddressRepeater').on('click', '[data-repeater-create]', function() {
                        var newFormGroup =
                            '<div class="form-group">' +
                            '<div data-repeater-list="agent_address_items">' +
                            '<div data-repeater-item>' +
                            '<div class="form-group row mb-5">' +


                            '<input type="hidden" class="form-control" data-kt-repeater="delivery_agent_id" name="delivery_agent_id[]" placeholder="Enter agent ID" value="' + delivery_agent_id + '"/>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Address:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="dabaddress" name="dabaddress[]" placeholder="Enter address" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">City:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="dabcity" name="dabcity[]" placeholder="Enter city" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">Phone:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="dabphone" placeholder="Enter phone number" name="dabphone[]" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">Fax:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="dabfax" placeholder="Enter fax number" name="dabfax[]" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">Email:</label>' +
                            '<input type="email" class="form-control" data-kt-repeater="dabemail" placeholder="Enter email address" name="dabemail[]" />' +
                            '</div>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Status:</label>' +
                            '<select class="form-select" data-placeholder="Select status" name="dabstatus[]">' +
                            '<option></option>' +
                            '<option value="0">Inactive</option>' +
                            '<option value="1">Active</option>' +
                            // Add more options as needed
                            '</select>' +
                            '</div>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Head Of:</label>' +
                            '<select class="form-select" data-placeholder="Select head office" name="dabhead_of[]">' +
                            '<option></option>' +
                            '<option value="head_office">Head office</option>' +
                            '<option value="branch">Branch</option>' +
                            // Add more options as needed
                            '</select>' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<a href="javascript:;" data-repeater-save class="btn btn-flex btn-sm btn-light-success mt-3 mt-md-9 saveAgentAddress">' +
                            '<i class="ki-duotone ki-trash fs-3"></i>' +
                            'save' +
                            '</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        // Append the new form group to the repeater
                        $('#agentAddressRepeater').append(newFormGroup);
                    });

                    // Event listener for deleting a repeater item
                    $('#agentAddressRepeater').on('click', '[data-repeater-delete]', function() {
                        $(this).closest('[data-repeater-item]').remove();
                    });

                    $('#agentAddressRepeater').on('click', '.saveAgentAddress', function() {
                        var form = $(this).closest('form');
                        $.post("code-dagent-branch.php", form.serialize() + '&action=insert', function(response) {
                            // Handle response
                            Swal.fire({
                                text: response,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function() {
                                // Close the modal
                                $('#addAgentAddressModal').modal('hide');
                                // Clear the form fields
                                table.ajax.reload();
                            });
                        });
                    });

                    // Fetch data from the database
                    $.post("code-dagent-branch.php", {
                        action: 'edit',
                        delivery_agent_id: delivery_agent_id
                    }, function(data) {
                        // Loop through each row of data and populate the form fields
                        $.each(data, function(index, row) {
                            var newFormGroup =
                                '<div class="form-group">' +
                                '<div data-repeater-list="agent_address_items">' +
                                '<div data-repeater-item>' +
                                '<div class="form-group row mb-5">' +


                                '<input type="hidden" class="form-control" data-kt-repeater="edelivery_agent_id" name="edelivery_agent_id" placeholder="Enter agent ID" value="' + row.delivery_agent_id + '"/>' +

                                '<div class="form-group row mb-5">' +


                                '<input type="hidden" class="form-control eaaid" data-kt-repeater="delivery_agent_bid" name="delivery_agent_bid[]" placeholder="Enter agent ID" value="' + row.delivery_agent_bid + '"/>' +

                                '<div class="col-md-4">' +
                                '<label class="form-label">Address:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="address" name="edabaddress[]" placeholder="Enter address" value="' + row.dabaddress + '"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<label class="form-label">City:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="city" name="edabcity[]" placeholder="Enter city" value="' + row.dabcity + '"/>' +
                                '</div>' +



                                '<div class="col-md-4">' +
                                '<label class="form-label">Phone:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="phone" placeholder="Enter phone number" name="edabphone[]" value="' + row.dabphone + '"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<label class="form-label">Fax:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="fax" placeholder="Enter fax number" name="edabfax[]" value="' + row.dabfax + '"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<label class="form-label">Email:</label>' +
                                '<input type="email" class="form-control" data-kt-repeater="email" placeholder="Enter email address" name="edabemail[]" value="' + row.dabemail + '"/>' +
                                '</div>' +

                                '<div class="col-md-4">' +
                                '<label class="form-label">Status:</label>' +
                                '<select class="form-select" data-placeholder="Select status" name="edabstatus[]">' +
                                '<option></option>' +
                                '<option value="0" ' + (row.dabstatus === '0' ? 'selected' : '') + '>Inactive</option>' +
                                '<option value="1" ' + (row.dabstatus === '1' ? 'selected' : '') + '>Active</option>' +
                                // Add more options as needed
                                '</select>' +
                                '</div>' +


                                '<div class="col-md-4">' +
                                '<label class="form-label">Head Of:</label>' +
                                '<select class="form-select" data-placeholder="Select head office" name="edabhead_of[]">' +
                                '<option></option>' +
                                '<option value="head_office" ' + (row.dabhead_of === 'head_office' ? 'selected' : '') + '>Head office</option>' +
                                '<option value="branch" ' + (row.dabhead_of === 'branch' ? 'selected' : '') + '>Branch</option>' +
                                // Add more options as needed
                                '</select>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<a href="javascript:;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 mt-md-9">' +
                                '<i class="ki-duotone ki-trash fs-3"></i>' +
                                'Delete' +
                                '</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            // Append the new form group to the repeater
                            $('#agentAddressRepeater').append(newFormGroup);
                        });


                        if (data && data.length > 0) {
                            $('#updateAgentAddress').show();
                        } else {
                            $('#updateAgentAddress').hide();
                        }


                    }, 'json');
                });


            });

            $(document).on('click', '[data-repeater-delete]', function() {
                // Find the closest repeater item to the delete button that was clicked
                var repeaterItem = $(this).closest('[data-repeater-item]');

                // Optionally, you can retrieve the ID of the item you want to delete
                var agentIdToDelete = repeaterItem.find('.eaaid').val(); // Assuming eaaid contains the unique identifier

                // Perform a POST request to delete the item from the database
                $.post("code-dagent-branch.php", {
                    action: 'delete',
                    agent_address_id: agentIdToDelete
                }, function(response) {
                    // If deletion is successful, remove the repeater item from the DOM
                    repeaterItem.remove();
                    // Show SweetAlert success message
                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Row deleted successfully',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                    });
                }).fail(function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                });
            });

            $("#updateAgentAddress").click(function() {
                $.post("code-dagent-branch.php", $("#agentAddressAddForm").serialize() + '&action=update', function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        text: response,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        // Close the modal
                        $('#addAgentAddressModal').modal('hide');
                        // Clear the form fields
                        table.ajax.reload();
                    });
                });
            });





            $("#saveDARegister").click(function() {
                $.post("code-register.php", $("#registerDAAddForm").serialize() + '&action=insert_da', function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#addDARegisterModal').modal('hide');
                        // Clear the form fields
                        $('#registerDAAddForm')[0].reset();
                        table.ajax.reload();
                    });
                });
            });


            $('#registerTable tbody').on('click', '.editRegister', function() {
                var delivery_agent_id = $(this).data("id");
                $.post("code-register.php", {
                    action: 'da_edit',
                    delivery_agent_id: delivery_agent_id
                }, function(data) {
                    // Populate modal with location data for editing
                    $('#editDARegisterModal').modal('show');
                    $('#eid').val(data.delivery_agent_id);
                    $('#eda_name').val(data.da_name);
                    $('#eda_conatct').val(data.da_conatct);
                    $('#eda_email').val(data.da_email);
                    $('#eda_location').val(data.da_location);
                    $('#eda_uername').val(data.da_uername);
                    $('#eda_pass').val(data.da_pass);
                }, 'json');
            });

            $("#updateDARegister").click(function() {
                $.post("code-register.php", $("#registerDAUpdateForm").serialize() + '&action=da_update', function(response) {
                    // Refresh DataTable after update
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#editDARegisterModal').modal('hide');
                        // Clear the form fields
                        table.ajax.reload();
                    });
                });
            });

            $('#registerTable tbody').on('click', '.deleteRegister', function() {
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
                        $.post("code-register.php", {
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