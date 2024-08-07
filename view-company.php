<?php $title = 'company'; // Default title
?>
<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

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
                                                Company </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">







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
                                                <!--begin::Image input placeholder-->

                                                <!--end::Image input placeholder-->

                                                <!--begin::Image input-->


                                                <form id="companyForm" enctype="multipart/form-data">
                                                    <div class="row mb-5">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/avatars/blank.svg)">
                                                                    <!--begin::Image preview wrapper-->
                                                                    <div class="image-input-wrapper w-125px h-125px"></div>
                                                                    <!--end::Image preview wrapper-->

                                                                    <!--begin::Edit button-->
                                                                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change avatar">
                                                                        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                                                                        <!--begin::Inputs-->
                                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                                        <input type="hidden" name="avatar_remove" />
                                                                        <!--end::Inputs-->
                                                                    </label>
                                                                    <!--end::Edit button-->

                                                                    <!--begin::Cancel button-->
                                                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar">
                                                                        <i class="ki-outline ki-cross fs-3"></i>
                                                                    </span>
                                                                    <!--end::Cancel button-->

                                                                    <!--begin::Remove button-->
                                                                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
                                                                        <i class="ki-outline ki-cross fs-3"></i>
                                                                    </span>
                                                                    <!--end::Remove button-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" id="name" name="name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" id="address" name="address" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" id="phone" name="phone">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" id="email" name="email">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="wrk_days">Working days</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" id="wrk_days" name="wrk_days">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="wrk_hours">Working hours</label>
                                                                <input type="text" class="form-control form-control-lg form-control-solid" id="wrk_hours" name="wrk_hours">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="currency">Currency</label>
                                                                <select class="form-control form-control-lg form-control-solid" id="currency" name="currency">
                                                                    <option value="QAR">Qatar Riyal (QAR)</option>
                                                                    <option value="SAR">Saudi Riyal (SAR)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="trm_condi">Terms & Conditions</label>
                                                                <textarea class="form-control form-control-solid trm_condi" id="trm_condi" name="trm_condi" required></textarea>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveCompany">
                                                            <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Save changes
                                                        </a>
                                                    </div>
                                                </form>




                                                <!--end::Image input-->
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
        let editorInstance;

        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#trm_condi'), {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'link',
                        '|', 'alignment',
                        '|', 'bulletedList', 'numberedList', 'outdent', 'indent',
                        '|', 'insertTable'
                    ],
                    shouldNotGroupWhenFull: true
                }
            })
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });



        function fetchDataAndPopulateForm() {
            // Make an AJAX request to fetch the data
            $.ajax({
                url: "code-company.php",
                type: "POST", // Use POST method
                data: {
                    action: 'fetch'
                }, // Specify action as 'fetch'
                dataType: "json",
                success: function(response) {
                    // Populate the form fields with the fetched data
                    $("#name").val(response.c_name);
                    $("#address").val(response.c_address);
                    $("#phone").val(response.c_phone);
                    $("#email").val(response.c_email);
                    $("#wrk_days").val(response.working_days);
                    $("#wrk_hours").val(response.working_hours);
                    $("#currency").val(response.currency);
                    // Update CKEditor content
                    if (editorInstance) {
                        editorInstance.setData(response.trm_condi);
                    }

                    // Set the background image of the div
                    var imageUrl = "company_logos/" + response.avatar;
                    $(".image-input-wrapper").css("background-image", "url(" + imageUrl + ")");
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        // Fetch and populate form data when needed
        fetchDataAndPopulateForm();

        // Handle form submission
        $('#saveCompany').click(function(event) {
            event.preventDefault();

            // Get the CKEditor data
            const trmCondi = editorInstance.getData();

            // Create a FormData object to handle file uploads
            const formData = new FormData($('#companyForm')[0]);
            formData.append('trm_condi', trmCondi);
            formData.append('action', 'insert');

            $.ajax({
                url: "code-company.php",
                type: "POST",
                data: formData,
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                contentType: false,
                success: function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        icon: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    });
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>

</html>