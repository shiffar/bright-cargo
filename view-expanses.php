<?php $title = 'Expanses'; // Default title?>
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
                                                    Expanses</li>
                                                <!--end::Item-->

                                            </ul>
                                            <!--end::Breadcrumb-->
                                        </div>
                                        <!--end::Page title-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                                         
                                            

                                            <a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addExpansesModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                            

                                            <div class="modal fade" tabindex="-1" id="addExpansesModal">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content shadow-none">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Expanses type</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="expansesAddForm">
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="DateReference">Date Reference</label>
                                                                                <input type="text" class="form-control form-control-solid" id="date_reference" name="date_reference" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="Reference">Reference</label>
                                                                                <input type="text" class="form-control form-control-solid" id="reference" name="reference" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="SalesRep">Employee</label>
                                                                                <select class="form-control form-control-solid" id="employee" name="employee" data-control="select2" data-dropdown-parent="#addExpansesModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                    <option value="">please select the employee</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="Description">Description</label>
                                                                                <textarea class="form-control form-control-solid" id="description" name="description" required></textarea>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div  class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="min-w-150px">Type</th>
                                                                                        <th class="min-w-80px">Description</th>
                                                                                        <th class="min-w-80px">Amount</th>
                                                                                        <th class="min-w-80px">VAT No</th>
                                                                                        <th class="min-w-80px">VAT Amount</th>
                                                                                        <th><a href="#" class="btn btn-icon btn-primary" id="addRow1"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th> <!-- This is for the add row button -->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="editableTableBody1">
                                                                                    <!-- Rows will be added dynamically here -->
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div  class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="min-w-80px">Account</th>
                                                                                        <th class="min-w-80px">Cq Number</th>
                                                                                        <th class="min-w-80px">Cheque Date</th>
                                                                                        <th class="min-w-80px">Amount</th>
                                                                                        <th><a href="#" class="btn btn-icon btn-primary" id="addRow2"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th> <!-- This is for the add row button -->
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="editableTableBody2">
                                                                                    <!-- Rows will be added dynamically here -->
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveExpense">
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

                                            <div class="modal fade" tabindex="-1" id="editExpenseModal">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content shadow-none">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Edit Expanses Type</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="editExpenseForm">
                                                                <!-- Fields for editing expense details -->
                                                                <input type="hidden" id="expens_id" name="expens_id">
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="DateReference">Date Reference</label>
                                                                                <input type="text" class="form-control form-control-solid" id="edate_reference" name="edate_reference" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="Reference">Reference</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ereference" name="ereference" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="SalesRep">Employee</label>
                                                                                <select class="form-control form-control-solid" id="eemployee" name="eemployee" data-control="select2" data-dropdown-parent="#editExpenseModal" data-placeholder="Select an option" data-allow-clear="true">
                                                                                    <option value="">please select the employee</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="Description">Description</label>
                                                                                <textarea class="form-control form-control-solid" id="edescription" name="edescription" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th></th>
                                                                                        <th class="min-w-150px">Type</th>
                                                                                        <th class="min-w-80px">Description</th>
                                                                                        <th class="min-w-80px">Amount</th>
                                                                                        <th class="min-w-80px">VAT No</th>
                                                                                        <th>VAT Amount</th><th><a href="#" class="btn btn-icon btn-primary" id="eaddRow1"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="eeditableTableBody1">
                                                                                    <!-- Rows will be added dynamically here -->
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th></th>
                                                                                        <th class="min-w-150px">Account</th>
                                                                                        <th class="min-w-80px">Cq Number</th>
                                                                                        <th class="min-w-80px">Cheque Date</th>
                                                                                        <th class="min-w-80px">Amount</th>
                                                                                        <th><a href="#" class="btn btn-icon btn-primary" id="eaddRow2"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="eeditableTableBody2">
                                                                                    <!-- Rows will be added dynamically here -->
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateExpense">
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
                                                    <table id="expensesTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-150px">Date Reference</th>
                                                            <th class="min-w-150px">Reference</th>
                                                            <th class="min-w-150px">Employee</th>
                                                            <th class="min-w-150px">Description</th>
                                                            <th class="min-w-150px">Total Amount</th>
                                                            <th class="min-w-150px">Total Paid</th>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            $(document).ready(function() {

                $.ajax({
                    url: 'get_employees.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if(data && data.length > 0) {
                            var options = '';
                            $.each(data, function(index, employees) {
                                options += '<option value="' + employees.employee_id + '">' + employees.name + '</option>';
                            });
                            $('#employee').append(options);
                        } else {
                            $('#employee').append('<option value="">No agents found</option>');
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
                            $.each(data, function(index, employees) {
                                options += '<option value="' + employees.employee_id + '">' + employees.name + '</option>';
                            });
                            $('#eemployee').append(options);
                        } else {
                            $('#eemployee').append('<option value="">No agents found</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });


                $(function() {
                    $("#date_reference").datepicker({
                        dateFormat: 'yy-mm-dd',
                        onSelect: function(dateText) {
                        $(this).val(dateText);
                        }
                    }).on('input', function() {
                        var inputValue = $(this).val();
                        if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                        // If already in yyyy-mm-dd format, do nothing
                        return;
                        }
                        if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                        // If in yyyy-mmdd format, convert to yyyy-mm-dd
                        var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                        $(this).val(formattedDate);
                        } else if (inputValue.match(/^\d{8}$/)) {
                        // If in yyyymmdd format, convert to yyyy-mm-dd
                        var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                        $(this).val(formattedDate);
                        }
                    });
                });

                $(function() {
                    $("#edate_reference").datepicker({
                        dateFormat: 'yy-mm-dd',
                        onSelect: function(dateText) {
                        $(this).val(dateText);
                        }
                    }).on('input', function() {
                        var inputValue = $(this).val();
                        if (inputValue.match(/^\d{4}-\d{2}-\d{2}$/)) {
                        // If already in yyyy-mm-dd format, do nothing
                        return;
                        }
                        if (inputValue.match(/^\d{4}-\d{2}\d{2}$/)) {
                        // If in yyyy-mmdd format, convert to yyyy-mm-dd
                        var formattedDate = inputValue.replace(/(\d{4})-(\d{2})(\d{2})/, '$1-$2-$3');
                        $(this).val(formattedDate);
                        } else if (inputValue.match(/^\d{8}$/)) {
                        // If in yyyymmdd format, convert to yyyy-mm-dd
                        var formattedDate = inputValue.replace(/(\d{4})(\d{2})(\d{2})/, '$1-$2-$3');
                        $(this).val(formattedDate);
                        }
                    });
                });

                function loadExpenseTypes(selectElement, selectedValue) {
                    $.ajax({
                        url: 'get_expenses_type.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            var $selectElement = $(selectElement);
                            $selectElement.empty(); // Clear existing options
                            if (data && data.length > 0) {
                                var options = '';
                                $.each(data, function(index, expenseType) {
                                    var selected = (expenseType.expanses_type_id == selectedValue) ? 'selected' : '';
                                    options += '<option value="' + expenseType.expanses_type_id + '" ' + selected + '>' + expenseType.expanses_type + '</option>';
                                });
                                $selectElement.append(options);
                            } else {
                                $selectElement.append('<option value="">No expense types found</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching expense types:', error);
                        }
                    });
                }

                // Call the function for each select element class


                function loadExpenseTypes2(selectElementClass) {
                    $.ajax({
                        url: 'get_expenses_type.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            var $selectElement = $('.' + selectElementClass);
                            $selectElement.empty(); // Clear existing options
                            if(data && data.length > 0) {
                                var options = '';
                                $.each(data, function(index, expenseType) {
                                    options += '<option value="' + expenseType.expanses_type_id + '">' + expenseType.expanses_type + '</option>';
                                });
                                $selectElement.append(options);
                            } else {
                                $selectElement.append('<option value="">No expense types found</option>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching expense types:', error);
                        }
                    });
                }

                


                // Event listener to add a new row
                $('#addExpansesModal').on('click', '#addRow1', function(event) {
                    event.preventDefault();

                    var tableBody = $('#editableTableBody1');
                    var newRow = `
                        <tr>
                            <td><div class="form-group"><div class="input-group input-group-sm mb-5"><select class="form-control custom-select acc_type" id="type" name="type[]" style="width: 100%;"></select></div></td>
                            <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="adescription[]" required></div></td>
                            <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="amount[]" required></div></td>
                            <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="vat_no[]" required></div></td>
                            <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="vat_amount[]" required></div></td>
                            <td><a href="#" class="btn btn-icon btn-danger removeRow1"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a></td>
                        </tr>`;

                    var appendedRow = $(newRow).appendTo(tableBody);

                    // Load expense types for the new select element
                    loadExpenseTypes2('acc_type'); // for the first select element

                });

                    $('#addExpansesModal').on('click', '#addRow2', function(event) {
                        var tableBody = $('#editableTableBody2');
                        var newRow = `
                            <tr>
                            <td>
                                <div class="form-group"><div class="input-group input-group-sm mb-5">
                                    <select class="form-control custom-select" id="account" name="account[]" style="width: 100%;">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </td>
                            <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="cq_number[]" required></div></td>
                            <td><div class="input-group input-group-sm mb-5"><input type="date" class="form-control" name="cheque_date[]" required></div></td>
                            <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="amount2[]" required></div></td>
                            <td><a href="#" class="btn btn-icon btn-danger removeRow2"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a></td>
                            </tr>`;
                        tableBody.append(newRow);
                    });



                    $('#addExpansesModal').on('click', '.removeRow1', function(event) {
                        $(this).closest('tr').remove();
                    });

                    // Remove row and recalculate for Table 2
                    $('#addExpansesModal').on('click', '.removeRow2', function(event) {
                        $(this).closest('tr').remove();
                    });
                

                

                // DataTable initialization
                var table = $('#expensesTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-expenses.php",
                    "type": "POST",
                    "data": { action: 'fetch' }, // Fetch HBL data
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "DateReference" },
                    { "data": "Reference" },
                    { "data": "Employee" },
                    { "data": "Description" },
                    { "data": "total_amount" }, // Show total amount
                    { "data": "total_paid" },   // Show total paid
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            return `<a href="#" class="btn btn-active-icon-primary btn-text-primary editWidgt" data-id="${data.expens_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                            <a href="#" class="btn btn-active-icon-danger btn-text-danger deleteWidgt" data-id="${data.expens_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
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

            $("#saveExpense").click(function() {
                $.post("code-expenses.php", $("#expansesAddForm").serialize() + '&action=insert', function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        type: 'success',
                        padding: '2em',
                        title: 'Success!',
                        text: response,
                        showConfirmButton: true
                    }).then(function() {
                        // Close the modal
                        $('#addExpansesModal').modal('hide');
                        // Clear the form fields
                        $('#expansesAddForm')[0].reset();
                    });
                });
            });


            
            // Edit Employee
            // Edit expense
            $('#expensesTable tbody').on('click', '.editWidgt', function() {
    var expens_id = $(this).data("id");
    $.post("code-expenses.php", { action: 'edit', expens_id: expens_id }, function(data) {
        console.log(data); // Check if data is received correctly
        // Populate modal with expense data for editing
        $('#editExpenseModal').modal('show');
        $('#expens_id').val(data.expens_id);
        $('#edate_reference').val(data.DateReference);
        $('#ereference').val(data.Reference);
        $('#eemployee').val(data.Employee);
        $('#edescription').val(data.eDescription);
        $('#eaddRow1').val(data.expens_id);
        $('#eaddRow2').val(data.expens_id);
        // Clear existing rows in expense_details table
        $('#eeditableTableBody1').empty();

// Initialize arrays to store IDs of rows already added
var addedDetailIds = [];
var addedPaidIds = [];

// Clear existing rows in expense_details table
// Clear existing rows in expense_details table
$('#eeditableTableBody1').empty();
// Populate table rows for expense_details
if (data.expense_details && data.expense_details.length > 0) {
    $.each(data.expense_details, function(index, detail) {
        // Check if the detail ID has already been added
        if (addedDetailIds.indexOf(detail.id) === -1) {
            var newRow = `
                <tr>
                    <td><div class="input-group input-group-sm mb-5"><input type="hidden" class="form-control" name="edetails_id[]" value="${detail.id}"></div></td>
                    <td><div class="form-group"><div class="input-group input-group-sm mb-5"><select class="form-control custom-select eacc_type" id="type" name="etype[]" style="width: 100%;"></select></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="eedescription[]" value="${detail.Description}"></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="eamount[]" value="${detail.Amount}"></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="evat_no[]" value="${detail.vat_no}"></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="evat_amount[]" value="${detail.vat_amount}"></div></td>
                    <td><a href="#" class="btn btn-icon btn-danger eremoveRow1"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a></td>
                </tr>`;
            $('#eeditableTableBody1').append(newRow);
            // Add the detail ID to the list of added IDs
            loadExpenseTypes($('#eeditableTableBody1 tr:last .eacc_type'), detail.Type); // for the third select element
            addedDetailIds.push(detail.id);
        }
    });
}
// Clear existing rows in expense_paid table
$('#eeditableTableBody2').empty();
// Populate table rows for expense_paid
if (data.expense_paid && data.expense_paid.length > 0) {
    $.each(data.expense_paid, function(index, paid) {
        // Check if the paid ID has already been added
        if (addedPaidIds.indexOf(paid.id) === -1) {
            var newRow = `
                <tr>
                    <td><div class="input-group input-group-sm mb-5"><input type="hidden" class="form-control" name="epaid_id[]" value="${paid.id}"></div></td>
                    <td>
                        <div class="input-group input-group-sm mb-5">
                            <select class="form-control" name="eaccount[]">
                                <option value="active" ${paid.account === 'active' ? 'selected' : ''}>Active</option>
                                <option value="not-active" ${paid.account === 'not-active' ? 'selected' : ''}>Not Active</option>
                            </select>
                        </div>
                    </td>
                    <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="ecq_number[]" value="${paid.cq_number}"></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="date" class="form-control" name="echeque_date[]" value="${paid.cheque_date}"></div></td>
                    <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="eamount2[]" value="${paid.amount}"></td>
                    <td><a href="#" class="btn btn-icon btn-danger eremoveRow2"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></a></td>
                </tr>`;
            $('#eeditableTableBody2').append(newRow);
            // Add the paid ID to the list of added IDs
            addedPaidIds.push(paid.id);
        }
    });
} else {
    $('#eeditableTable2').hide(); // Hide the table if there is no data
}



    }, 'json');
});




// Add row in expense_details table
$('#editExpenseModal').on('click', '#eaddRow1', function(event) {
    var tableBody = document.getElementById('eeditableTableBody1');
    var newRow = document.createElement('tr');
    
    // Retrieve the value of the eaddRow1 button
    var buttonValue = $(this).val();

    newRow.innerHTML = `
        <td><input type="hidden" class="form-control" name="aexpense_id1[]" value="${buttonValue}" required></td>
        <td><div class="form-group"><div class="input-group input-group-sm mb-5"><select class="form-control custom-select eeacc_type" id="type" name="type[]" style="width: 100%;"></select></div></td>
        <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="edescription[]" required></div></td>
        <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="eamount[]" required></div></td>
        <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="evat_no[]" required></div></td>
        <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="evat_amount[]" required></div></td>
        <td><a class="btn btn-icon btn-success eaddedRow1"><i class="fad fa-check-circle fs-2qx"></i></a></td>
        <td><a class="btn btn-icon btn-danger eremoveRow1"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>
    `;
    tableBody.appendChild(newRow);
    loadExpenseTypes2('eeacc_type'); // for the second select element

});


// Remove row in expense_details table
$('#editExpenseModal').on('click', '.eremoveRow1', function(event) {
    $(this).closest('tr').remove();
});

// Add row in expense_paid table
$('#editExpenseModal').on('click', '#eaddRow2', function(event) {
    var tableBody = document.getElementById('eeditableTableBody2');
    var newRow = document.createElement('tr');

    var buttonValue = $(this).val();

    newRow.innerHTML = `
        <td><input type="hidden" class="form-control" name="aexpense_id2[]" value="${buttonValue}" required></td>
        <td>
            <div class="form-group"><div class="input-group input-group-sm mb-5">
                <select class="form-control custom-select" id="account" name="account[]" style="width: 100%;">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </td>
        <td><div class="input-group input-group-sm mb-5"><input type="text" class="form-control" name="ecq_number[]" required></div></td>
        <td><div class="input-group input-group-sm mb-5"><input type="date" class="form-control" name="echeque_date[]" required></div></td>
        <td><div class="input-group input-group-sm mb-5"><input type="number" class="form-control" name="eamount2[]" required></div></td>
        <td><a class="btn btn-icon btn-success eaddedRow2"><i class="fad fa-check-circle fs-2qx"></i></a></td>
        <td><a class="btn btn-icon btn-danger eremoveRow2"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>
    `;
    tableBody.appendChild(newRow);
});

// Remove row in expense_paid table
$('#editExpenseModal').on('click', '.eremoveRow2', function(event) {
    $(this).closest('tr').remove();
});


// Add row in expense_details table
$('#editExpenseModal').on('click', '.eaddedRow1', function(event) {
    var rowData = {
        aexpense_id: $(this).closest('tr').find('input[name="aexpense_id1[]"]').val(),
        type: $(this).closest('tr').find('select[name="type[]"]').val(),
        description: $(this).closest('tr').find('input[name="edescription[]"]').val(),
        amount: $(this).closest('tr').find('input[name="eamount[]"]').val(),
        vat_no: $(this).closest('tr').find('input[name="evat_no[]"]').val(),
        vat_amount: $(this).closest('tr').find('input[name="evat_amount[]"]').val()
    };

    $.post("insert_expense_details.php", { rowData: rowData }, function(response) {
        // Handle response from server
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            padding: '2em'
        });

        toast({
            icon: 'success',
            title: 'Expense details added successfully',
            padding: '2em',
        });
    });
});


// Add row in expense_paid table
$('#editExpenseModal').on('click', '.eaddedRow2', function(event) {
    var rowData = {
        aexpense_id: $(this).closest('tr').find('input[name="aexpense_id2[]"]').val(),
        account: $(this).closest('tr').find('select[name="account[]"]').val(),
        cq_number: $(this).closest('tr').find('input[name="ecq_number[]"]').val(),
        cheque_date: $(this).closest('tr').find('input[name="echeque_date[]"]').val(),
        amount: $(this).closest('tr').find('input[name="eamount2[]"]').val()
    };

    $.post("insert_expense_paid.php", { rowData: rowData }, function(response) {
        // Handle response from server
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            padding: '2em'
        });

        toast({
            type: 'success',
            title: 'Expense paid details added successfully',
            padding: '2em',
        });
    });
});




            // Update Employee
            $("#updateExpense").click(function() {
                $.post("code-expenses.php", $("#editExpenseForm").serialize() + '&action=update', function(response) {
                    // Refresh DataTable after update
                    Swal.fire({
                                    icon: 'success',
                                    padding: '2em',
                                    title: 'Success!',
                                    text: response,
                                    showConfirmButton: true
                                }).then(function() {
                                    // Close the modal
                                    $('#editExpenseModal').modal('hide');
                                    // Clear the form fields
                                    table.ajax.reload();
                                });
                });
            });

            // Remove row in expense_details table
            $('#editExpenseModal').on('click', '.eremoveRow1', function(event) {
                $(this).closest('tr').remove();
                // Call function to delete row from database
                deleteTableRow('expense_details', $(this).closest('tr').find('input[name="edetails_id[]"]').val());
            });

            // Remove row in expense_paid table
            $('#editExpenseModal').on('click', '.eremoveRow2', function(event) {
                $(this).closest('tr').remove();
                // Call function to delete row from database
                deleteTableRow('expense_paid', $(this).closest('tr').find('input[name="epaid_id[]"]').val());
            });

            // Function to delete row from database via AJAX
            function deleteTableRow(table, id) {
    $.post("code-expenses.php", { action: 'table_delete', table: table, id: id }, function(data) {
        // Check if deletion was successful
        if(data.success) {
            // Display success toast message
            const toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                padding: '2em'
            });

            toast({
                icon: 'success',
                title: 'Row deleted successfully',
                padding: '2em',
            });

            console.log('Row deleted successfully');
        } else {
            console.error('Error deleting row:', data.error);
        }
    }, 'json');
}

                // Delete Agent
                $('#expensesTable tbody').on('click', '.deleteWidgt', function() {
                    var expensesTable = $(this).data("id");

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
                            $.post("code-exeanses.php", { action: 'delete', expensesTable: expensesTable }, function(response) {
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
