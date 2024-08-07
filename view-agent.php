<?php $title = 'branch'; // Default title
?>
<!DOCTYPE html>

<html lang="en">

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
                                                Branch </li>
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
                                            $agent_permissions = explode(', ', $_SESSION['auth_user']['agent']);

                                            // Check if user has add permission
                                            $can_add = in_array('agent_add', $agent_permissions);

                                            // Check if user has edit permission
                                            $can_edit = in_array('agent_edit', $agent_permissions);

                                            // Check if user has delete permission
                                            $can_delete = in_array('agent_delete', $agent_permissions);

                                            // Check if user has add and delete permissions combined
                                            $can_add_delete = in_array('agent_add,agent_delete', $agent_permissions);

                                            // Check if user has add and edit permissions combined
                                            $can_add_edit = in_array('agent_add,agent_edit', $agent_permissions);

                                            // Check if user has edit and delete permissions combined
                                            $can_edit_delete = in_array('agent_edit,agent_delete', $agent_permissions);

                                            // Check if user has add,edit and delete permissions combined
                                            $can_add_edit_delete = in_array('agent_add,agent_edit,agent_delete', $agent_permissions);

                                            $access_denied = in_array('agent_access_denied', $agent_permissions);
                                        } else {
                                            // User is not logged in or doesn't have access rights, set all to false
                                            $can_add = false;
                                            $can_edit = false;
                                            $can_delete = false;
                                            $can_add_delete = false;
                                        }
                                        ?>
                                        <script>
                                            <?php if (!$access_denied) : ?>
                                                // Check PHP variables and render button visibility using JavaScript
                                                <?php if ($can_add || $can_add_delete || $can_add_edit || $can_add_edit_delete) : ?>
                                                    document.write('<a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addAgentModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i> </a>');
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </script>


                                        <div class="modal fade" tabindex="-1" id="addAgentModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Branch</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="agentAddForm">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group input-group-sm mb-5">

                                                                        <label>Code</label>
                                                                        <input type="text" class="form-control form-control-solid" id="code" name="code" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group input-group-sm mb-5">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control form-control-solid" id="name" name="name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group input-group-sm mb-5">
                                                                        <label>Status</label>
                                                                        <select class="form-control form-control-solid" id="status" name="status">
                                                                            <option value="active">Active</option>
                                                                            <option value="inactive">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveAgent">
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

                                        <div class="modal fade" tabindex="-1" id="updateAgentModal">
                                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Edit Branch</h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">
                                                        <form id="agentUpdateForm">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group input-group-sm mb-5">
                                                                        <label>Code</label>
                                                                        <input type="hidden" class="form-control form-control-solid" id="eid" name="eid" required>
                                                                        <input type="text" class="form-control form-control-solid" id="ecode" name="ecode" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group input-group-sm mb-5">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control form-control-solid" id="ename" name="ename" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group input-group-sm mb-5">
                                                                        <label>Status</label>
                                                                        <select class="form-control form-control-solid" id="estatus" name="estatus">
                                                                            <option value="active">Active</option>
                                                                            <option value="inactive">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateAgent">
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

                                        <div class="modal fade" tabindex="-1" id="addAgentAddressModal">
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
                                                <table id="agentTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                    <thead>
                                                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th>Code</th>
                                                            <th>Name</th>
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
    <script src="<?php echo $url; ?>assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    <script>
        $(document).ready(function() {

            $('#addAgentAddressModal').on('hidden.bs.modal', function(e) {
                // Reload the current page
                location.reload();
            });
            $('#updateAgentAddress').hide();
            // DataTable initialization
            var table = $('#agentTable').DataTable({
                "ajax": {
                    "url": "code-agent.php",
                    "type": "POST",
                    "data": {
                        action: 'fetch'
                    }, // Fetch agents
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "code"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "status"
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
                                buttons += `
                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary addtAgent" data-id="${data.agent_id}"><i class="fad fa-clipboard-list-check fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary editAgent" data-id="${data.agent_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                            }

                            // Render delete button if user has delete permission
                            if (<?php echo $can_delete || $can_add_delete || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                buttons += `<a href="#" class="btn btn-active-icon-danger btn-text-danger deleteAgent" data-id="${data.agent_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                            }



                            // Return the buttons
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


            $("#updateAgentAddress").click(function() {
                $.post("code-agent-branch.php", $("#agentAddressAddForm").serialize() + '&action=update', function(response) {
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

            $("#saveAgent").click(function() {
                $.post("code-agent.php", $("#agentAddForm").serialize() + '&action=insert', function(response) {
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
                        $('#addAgentModal').modal('hide');
                        // Clear the form fields
                        $('#agentAddForm')[0].reset();
                        table.ajax.reload();
                    });
                });
            });

            // Edit Agent
            $('#agentTable tbody').on('click', '.editAgent', function() {
                var agent_id = $(this).data("id");
                $.post("code-agent.php", {
                    action: 'edit',
                    agent_id: agent_id
                }, function(data) {
                    // Populate modal with agent data for editing
                    // For example:
                    $('#updateAgentModal').modal('show');
                    $('#eid').val(data.agent_id);
                    $('#ecode').val(data.code);
                    $('#ename').val(data.name);
                    $('#estatus').val(data.status);
                    // Populate other fields similarly
                }, 'json');
            });



            $(document).ready(function() {
                // Event listener for "Add" button click
                $('#agentTable tbody').on('click', '.addtAgent', function() {
                    var agent_id = $(this).data("id");
                    $('#addAgentAddressModal').modal('show');
                    $('#agent_id').val(agent_id);

                    // Event listener for creating a new repeater item
                    $('#agentAddressRepeater').on('click', '[data-repeater-create]', function() {
                        var newFormGroup =
                            '<div class="form-group">' +
                            '<div data-repeater-list="agent_address_items">' +
                            '<div data-repeater-item>' +
                            '<div class="form-group row mb-5">' +


                            '<input type="hidden" class="form-control" data-kt-repeater="agent_id" name="agent_id[]" placeholder="Enter agent ID" value="' + agent_id + '"/>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Address:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="address" name="address[]" placeholder="Enter address" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">City:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="city" name="city[]" placeholder="Enter city" />' +
                            '</div>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Country:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="country" name="country[]" placeholder="Enter city" />' +
                            '</div>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Phone:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="phone" placeholder="Enter phone number" name="phone[]" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">Fax:</label>' +
                            '<input type="text" class="form-control" data-kt-repeater="fax" placeholder="Enter fax number" name="fax[]" />' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            '<label class="form-label">Email:</label>' +
                            '<input type="email" class="form-control" data-kt-repeater="email" placeholder="Enter email address" name="email[]" />' +
                            '</div>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Status:</label>' +
                            '<select class="form-select" data-placeholder="Select status" name="status[]">' +
                            '<option></option>' +
                            '<option value="0">Inactive</option>' +
                            '<option value="1">Active</option>' +
                            // Add more options as needed
                            '</select>' +
                            '</div>' +

                            '<div class="col-md-4">' +
                            '<label class="form-label">Head Of:</label>' +
                            '<select class="form-select" data-placeholder="Select head office" name="head_of[]">' +
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
                        $.post("code-agent-branch.php", form.serialize() + '&action=insert', function(response) {
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
                    $.post("code-agent-branch.php", {
                        action: 'edit',
                        agent_id: agent_id
                    }, function(data) {
                        // Loop through each row of data and populate the form fields
                        $.each(data, function(index, row) {
                            var newFormGroup =
                                '<div class="form-group">' +
                                '<div data-repeater-list="agent_address_items">' +
                                '<div data-repeater-item>' +
                                '<div class="form-group row mb-5">' +


                                '<input type="hidden" class="form-control" data-kt-repeater="agent_id" name="agent_id" placeholder="Enter agent ID" value="' + row.agent_id_fk + '"/>' +

                                '<div class="form-group row mb-5">' +


                                '<input type="hidden" class="form-control eaaid" data-kt-repeater="agent_address_id" name="agent_address_id[]" placeholder="Enter agent ID" value="' + row.agent_address_id + '"/>' +

                                '<div class="col-md-4">' +
                                '<label class="form-label">Address:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="address" name="eaddress[]" placeholder="Enter address" value="' + row.address + '"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<label class="form-label">City:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="city" name="ecity[]" placeholder="Enter city" value="' + row.city + '"/>' +
                                '</div>' +

                                '<div class="col-md-4">' +
                                '<label class="form-label">Country:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="country" name="ecountry[]" placeholder="Enter city" value="' + row.country + '"/>' +
                                '</div>' +

                                '<div class="col-md-4">' +
                                '<label class="form-label">Phone:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="phone" placeholder="Enter phone number" name="ephone[]" value="' + row.phone + '"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<label class="form-label">Fax:</label>' +
                                '<input type="text" class="form-control" data-kt-repeater="fax" placeholder="Enter fax number" name="efax[]" value="' + row.fax + '"/>' +
                                '</div>' +
                                '<div class="col-md-4">' +
                                '<label class="form-label">Email:</label>' +
                                '<input type="email" class="form-control" data-kt-repeater="email" placeholder="Enter email address" name="eemail[]" value="' + row.email + '"/>' +
                                '</div>' +

                                '<div class="col-md-4">' +
                                '<label class="form-label">Status:</label>' +
                                '<select class="form-select" data-placeholder="Select status" name="estatus[]">' +
                                '<option></option>' +
                                '<option value="0" ' + (row.status === '0' ? 'selected' : '') + '>Inactive</option>' +
                                '<option value="1" ' + (row.status === '1' ? 'selected' : '') + '>Active</option>' +
                                // Add more options as needed
                                '</select>' +
                                '</div>' +


                                '<div class="col-md-4">' +
                                '<label class="form-label">Head Of:</label>' +
                                '<select class="form-select" data-placeholder="Select head office" name="ehead_of[]">' +
                                '<option></option>' +
                                '<option value="head_office" ' + (row.head_of === 'head_office' ? 'selected' : '') + '>Head office</option>' +
                                '<option value="branch" ' + (row.head_of === 'branch' ? 'selected' : '') + '>Branch</option>' +
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
                $.post("code-agent-branch.php", {
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



            // Update Agent
            $("#updateAgent").click(function() {
                $.post("code-agent.php", $("#agentUpdateForm").serialize() + '&action=update', function(response) {
                    // Refresh DataTable after update
                    Swal.fire({
                        type: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#updateAgentModal').modal('hide');
                        // Clear the form fields
                        table.ajax.reload();
                    });
                });
            });

            // Delete Agent
            $('#agentTable tbody').on('click', '.deleteAgent', function() {
                var agent_id = $(this).data("id");

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
                        $.post("code-agent.php", {
                            action: 'delete',
                            agent_id: agent_id
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