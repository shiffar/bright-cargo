<?php $title = 'location'; // Default title?>
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
                                                    Location </li>
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
                                            

                                            <div class="modal fade" tabindex="-1" id="addLocationModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Location</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="locationAddForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="name" name="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="address" name="address">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="city" name="city">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="zip_code">ZIP Code</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="zip_code" name="zip_code">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="country">Country</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="country" name="country">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="phone" name="phone">
                                                                        </div>
                                                                    </div>
                                                                   
                                                                   <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <select class="form-control form-control-lg form-control-solid" id="status" name="status">
                                                                                <option value="active">Active</option>
                                                                                <option value="inactive">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveLocation">
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

                                            <div class="modal fade" tabindex="-1" id="updateLocationModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Location</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="locationUpdateForm">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ename">Name</label>
                                                                            <input type="hidden" class="form-control form-control-lg form-control-solid" id="eid" name="eid" required>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ename" name="ename" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="eaddress">Address</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="eaddress" name="eaddress">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ecity">City</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ecity" name="ecity">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ezip_code">Zip Code</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ezip_code" name="ezip_code">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ecountry">Country</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ecountry" name="ecountry">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ephone">Phone</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="ephone" name="ephone">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="estatus">Status</label>
                                                                            <select class="form-control form-control-lg form-control-solid" id="estatus" name="estatus">
                                                                                <option value="active">Active</option>
                                                                                <option value="inactive">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateLocation">
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
                                                    <table id="locationTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-150px">Name</th>
                                                            <th class="min-w-150px">Address</th>
                                                            <th class="min-w-150px">City</th>
                                                            <th class="min-w-150px">Zip-code</th>
                                                            <th class="min-w-150px">Country</th>
                                                            <th class="min-w-150px">Phone</th>
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

                // DataTable initialization
                var table = $('#locationTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-location.php",
                    "type": "POST",
                    "data": { action: 'fetch' }, // Fetch HBL data
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "name" },
                    { "data": "address" },
                    { "data": "city" },
                    { "data": "zip_code" },
                    { "data": "country" },
                    { "data": "phone" },
                    { "data": "status" },
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
                                    buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editLocation" data-id="${data.location_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                }

                                // Render delete button if user has delete permission
                                if (<?php echo $can_delete || $can_add_delete || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                    buttons += `<a href="#" class="btn btn-active-icon-danger btn-text-danger deleteLocation" data-id="${data.location_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
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

                // Insert Location
                $("#saveLocation").click(function() {
                    $.post("code-location.php", $("#locationAddForm").serialize() + '&action=insert', function(response) {
                        // Refresh DataTable after insertion
                        Swal.fire({
                            icon: 'success',
                            padding: '2em',
                            title: 'Success!',
                            text: response,
                            showConfirmButton: true
                        }).then(function() {
                            // Close the modal
                            $('#addLocationModal').modal('hide');
                            // Clear the form fields
                            $('#locationAddForm')[0].reset();
                            table.ajax.reload();
                        });
                    });
                });

                // Edit Location
                $('#locationTable tbody').on('click', '.editLocation', function() {
                    var location_id = $(this).data("id");
                    $.post("code-location.php", { action: 'edit', location_id: location_id }, function(data) {
                        // Populate modal with location data for editing
                        $('#updateLocationModal').modal('show');
                        $('#eid').val(data.location_id);
                        $('#ename').val(data.name);
                        $('#eaddress').val(data.address);
                        $('#ecity').val(data.city);
                        $('#ezip_code').val(data.zip_code);
                        $('#ecountry').val(data.country);
                        $('#ephone').val(data.phone);
                        $('#estatus').val(data.status);
                    }, 'json');
                });

                // Update Location
                $("#updateLocation").click(function() {
                    $.post("code-location.php", $("#locationUpdateForm").serialize() + '&action=update', function(response) {
                        // Refresh DataTable after update
                        Swal.fire({
                            icon: 'success',
                            padding: '2em',
                            title: 'Success!',
                            text: response,
                            showConfirmButton: true
                        }).then(function() {
                            // Close the modal
                            $('#updateLocationModal').modal('hide');
                            // Clear the form fields
                            table.ajax.reload();
                        });
                    });
                });

                // Delete Agent
                $('#locationTable tbody').on('click', '.deleteLocation', function() {
                    var location_id = $(this).data("id");

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
                            $.post("code-location.php", { action: 'delete', location_id: location_id }, function(response) {
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