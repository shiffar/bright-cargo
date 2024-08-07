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
                                                    Register </li>
                                                <!--end::Item-->

                                            </ul>
                                            <!--end::Breadcrumb-->
                                        </div>
                                        <!--end::Page title-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        
                                            
                                                <a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addRegisterModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                                  
                                        
                                            

                                            <div class="modal fade" tabindex="-1" id="addRegisterModal">
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
                                                            <form id="registerAddForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="username">Username</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="username" name="username" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" class="form-control form-control-lg form-control-solid" id="email" name="email" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="password">Password</label>
                                                                            <input type="password" class="form-control form-control-lg form-control-solid" id="password" name="password" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="role_as">Role</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="role_as" name="role_as">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select class="form-control form-control-lg form-control-solid" id="status" name="status">
                                                                                <option value="1">Active</option>
                                                                                <option value="0">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveRegister">
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


                                            <div class="modal fade" tabindex="-1" id="editRegisterModal">
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
                                                            <form id="registerUpdateForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="username">Username</label>
                                                                            <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid" name="eid" required>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="eusername" name="eusername" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" class="form-control form-control-lg form-control-solid" id="eemail" name="eemail" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="password">Password</label>
                                                                            <input type="password" class="form-control form-control-lg form-control-solid" id="epassword" name="epassword" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="role_as">Role</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="erole_as" name="erole_as">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select class="form-control form-control-lg form-control-solid" id="estatus" name="estatus">
                                                                                <option value="1">Active</option>
                                                                                <option value="0">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateRegister">
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
                                                            <th class="min-w-150px">Username</th>
                                                            <th class="min-w-150px">Email</th>
                                                            <th class="min-w-150px">Password</th>
                                                            <th class="min-w-150px">Role</th>
                                                            <th class="min-w-150px">Status</th>
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
    var table = $('#registerTable').DataTable({
    responsive: true,
    "ajax": {
        "url": "code-register.php", // Update the URL to the PHP script handling registration data
        "type": "POST",
        "data": { action: 'fetch' }, // Send fetch action to retrieve data
        "dataSrc": ""
    },
    "columns": [
        { "data": "username" }, // Update to username field from the database
        { "data": "email" }, // Update to email field from the database
        { "data": "password" }, // Update to password field from the database
        { "data": "role_as" }, // Update to role_as field from the database
        { "data": "status" }, // Update to status field from the database
        {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return`<a href="#" class="btn btn-active-icon-primary btn-text-primary editRegister" data-id="${data.id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                            <a href="#" class="btn btn-active-icon-danger btn-text-danger deleteRegister" data-id="${data.id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                
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


                $("#saveRegister").click(function() {
                    $.post("code-register.php", $("#registerAddForm").serialize() + '&action=insert', function(response) {
                        // Refresh DataTable after insertion
                        Swal.fire({
                            icon: 'success',
                            padding: '2em',
                            title: 'Success!',
                            text: response,
                            showConfirmButton: true
                        }).then(function() {
                            // Close the modal
                            $('#addRegisterModal').modal('hide');
                            // Clear the form fields
                            $('#registerAddForm')[0].reset();
                            table.ajax.reload();
                        });
                    });
                });


                $('#registerTable tbody').on('click', '.editRegister', function() {
                    var register_id = $(this).data("id");
                    $.post("code-register.php", { action: 'edit', register_id: register_id }, function(data) {
                        // Populate modal with location data for editing
                        $('#editRegisterModal').modal('show');
                        $('#eid').val(data.id);
                        $('#eusername').val(data.username);
                        $('#eemail').val(data.email);
                        $('#epassword').val(data.password);
                        $('#erole_as').val(data.role_as);
                        $('#estatus').val(data.status);
                    }, 'json');
                });

                $("#updateRegister").click(function() {
                    $.post("code-register.php", $("#registerUpdateForm").serialize() + '&action=update', function(response) {
                        // Refresh DataTable after update
                        Swal.fire({
                            icon: 'success',
                            padding: '2em',
                            title: 'Success!',
                            text: response,
                            showConfirmButton: true
                        }).then(function() {
                            // Close the modal
                            $('#editRegisterModal').modal('hide');
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
                            $.post("code-register.php", { action: 'delete', register_id: register_id }, function(response) {
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