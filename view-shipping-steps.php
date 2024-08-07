<?php $title = 'Shipping steps'; // Default title
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
                                                Shipping steps </li>
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
                                                <!--begin::Image textarea placeholder-->

                                                <!--end::Image textarea placeholder-->

                                                <!--begin::Image textarea-->


                                                <form id="shippingStepsForm">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 1</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_1" name="step_1" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 2</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_2" name="step_2" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 3</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_3" name="step_3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 4</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_4" name="step_4" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 5</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_5" name="step_5" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 6</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_6" name="step_6" required></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="name">Step 7</label>
                                                                <textarea type="text" class="form-control form-control-lg form-control-solid" id="step_7" name="step_7" required></textarea>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveShippingSteps">
                                                            <i class="ki-duotone ki-add-folder fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            Save changes
                                                        </a>
                                                    </div>
                                                </form>




                                                <!--end::Image textarea-->
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
        



        function fetchDataAndPopulateForm() {
            // Make an AJAX request to fetch the data
            $.ajax({
                url: "code-shipping-steps.php",
                type: "POST", // Use POST method
                data: {
                    action: 'fetch'
                }, // Specify action as 'fetch'
                dataType: "json",
                success: function(response) {
                    // Populate the form fields with the fetched data
                    $("#step_1").val(response.step_1);
                    $("#step_2").val(response.step_2);
                    $("#step_3").val(response.step_3);
                    $("#step_4").val(response.step_4);
                    $("#step_5").val(response.step_5);
                    $("#step_6").val(response.step_6);
                    $("#step_7").val(response.step_7);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        // Fetch and populate form data when needed
        fetchDataAndPopulateForm();

        // Handle form submission
        $('#saveShippingSteps').click(function(event) {
            event.preventDefault();


            // Create a FormData object to handle file uploads
            const formData = new FormData($('#shippingStepsForm')[0]);
            formData.append('action', 'insert');

            $.ajax({
                url: "code-shipping-steps.php",
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