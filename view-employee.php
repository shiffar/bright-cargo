<?php $title = 'employee'; // Default title?>
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
                                                    Employees </li>
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
    $employee_permissions = explode(', ', $_SESSION['auth_user']['employee']);

    // Check if user has add permission
    $can_add = in_array('emp_add', $employee_permissions);

    // Check if user has edit permission
    $can_edit = in_array('emp_edit', $employee_permissions);

    // Check if user has delete permission
    $can_delete = in_array('emp_delete', $employee_permissions);

    // Check if user has add and delete permissions combined
    $can_add_delete = in_array('emp_add,emp_delete', $employee_permissions);

    // Check if user has add and edit permissions combined
    $can_add_edit = in_array('emp_add,emp_edit', $employee_permissions);

    // Check if user has edit and delete permissions combined
    $can_edit_delete = in_array('emp_edit,emp_delete', $employee_permissions);

    // Check if user has add,edit and delete permissions combined
    $can_add_edit_delete = in_array('emp_add,emp_edit,emp_delete', $employee_permissions);

    $access_denied = in_array('emp_access_denied', $employee_permissions);
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
                                                        document.write('<a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>');
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </script>

                                            <div class="modal fade" tabindex="-1" id="addEmployeeModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Employee</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="employeeAddForm">
                                                                <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" class="form-control form-control-solid" id="name" name="name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="gender">Gender</label>
                                                                            <select class="form-control form-control-solid" id="gender" name="gender" required>
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                            <option value="Other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="mobile">Mobile</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" id="mobile" name="mobile" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" class="form-control form-control-solid" id="email" name="email" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phone">Phone</label>
                                                                            <input type="text" class="form-control form-control-solid" id="phone" name="phone">
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="credit_limit">Credit Limit</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="credit_limit" name="credit_limit">
                                                                        </div>
                                                                    </div>-->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <input type="text" class="form-control form-control-solid" id="address" name="address" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="city">City</label>
                                                                            <input type="text" class="form-control form-control-solid" id="city" name="city" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="zip_code">Zip Code</label>
                                                                            <input type="text" class="form-control form-control-solid" id="zip_code" name="zip_code" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="country">Country</label>
                                                                            <input type="text" class="form-control form-control-solid" id="country" name="country" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="employee_type">Employee Type</label>
                                                                            <select class="form-control form-control-solid" id="employee_type" name="employee_type" required>
                                                                            <option value="Full-time">Full-time</option>
                                                                            <option value="Part-time">Part-time</option>
                                                                            <option value="Contract">Contract</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="account_num">Account Number</label>
                                                                            <input type="text" class="form-control form-control-solid" id="account_num" name="account_num">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="username">Username</label>
                                                                            <input type="text" class="form-control form-control-solid" id="username" name="username" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="role">Role</label>
                                                                            <input type="text" class="form-control form-control-solid" id="role" name="role">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="location">Location</label>
                                                                            <input type="text" class="form-control form-control-solid" id="location" name="location">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="basic_salary">Basic Salary</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="basic_salary" name="basic_salary">
                                                                        </div>
                                                                    </div>
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="monthly_target">Monthly Target</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="monthly_target" name="monthly_target">
                                                                        </div>
                                                                    </div>-->
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="percentage">Percentage</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="percentage" name="percentage">
                                                                        </div>
                                                                    </div>-->
                                                                    <!--<div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="opening_balance">Opening Balance</label>
                                                                            <input type="number" step="0.01" class="form-control form-control-solid" id="opening_balance" name="opening_balance">
                                                                        </div>
                                                                    </div>-->
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveEmployee">
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

                                            <div class="modal fade" tabindex="-1" id="updateEmployeeModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Employee</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="employeeUpdateForm">
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="name">Name</label>
                                                                                <input type="hidden" class="form-control form-control-solid" id="eid" name="eid" required>
                                                                                <input type="text" class="form-control form-control-solid" id="ename" name="ename" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="gender">Gender</label>
                                                                                <select class="form-control form-control-solid" id="egender" name="egender" required>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                                <option value="Other">Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="mobile">Mobile</label>
                                                                                <input type="text" class="form-control form-control-solid" id="emobile" name="emobile" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" class="form-control form-control-solid" id="eemail" name="eemail" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="phone">Phone</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ephone" name="ephone">
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="credit_limit">Credit Limit</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="ecredit_limit" name="ecredit_limit">
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="address">Address</label>
                                                                                <input type="text" class="form-control form-control-solid" id="eaddress" name="eaddress" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="city">City</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ecity" name="ecity" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="zip_code">Zip Code</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ezip_code" name="ezip_code" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="country">Country</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ecountry" name="ecountry" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="employee_type">Employee Type</label>
                                                                                <select class="form-control form-control-solid" id="eemployee_type" name="eemployee_type" required>
                                                                                <option value="Full-time">Full-time</option>
                                                                                <option value="Part-time">Part-time</option>
                                                                                <option value="Contract">Contract</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="account_num">Account Number</label>
                                                                                <input type="text" class="form-control form-control-solid" id="eaccount_num" name="eaccount_num">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="username">Username</label>
                                                                                <input type="text" class="form-control form-control-solid" id="eusername" name="eusername" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="role">Role</label>
                                                                                <input type="text" class="form-control form-control-solid" id="erole" name="erole">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="location">Location</label>
                                                                                <input type="text" class="form-control form-control-solid" id="elocation" name="elocation">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="basic_salary">Basic Salary</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="ebasic_salary" name="ebasic_salary">
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="monthly_target">Monthly Target</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="emonthly_target" name="emonthly_target">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="percentage">Percentage</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="epercentage" name="epercentage">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="opening_balance">Opening Balance</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="eopening_balance" name="eopening_balance">
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="opening_balance">Status</label>
                                                                                <select class="form-control form-control-solid" id="estatus" name="estatus">
                                                                                    <option value="0">Inactive</option>
                                                                                    <option value="1">Active</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateEmployee">
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


                                            <div class="modal fade" tabindex="-1" id="updateEmployeePassModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Modal title</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <div class="modal-body">
                                                        <form id="employeePassForm">
                                                            <div class="input-group input-group-sm mb-5">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Username</label>
                                                                            <input type="hidden" class="form-control form-control-solid" id="eid2" name="eid2" required>
                                                                            <input type="text" class="form-control form-control-solid" id="pusername" name="pusername" disabled>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="percentage">Password</label>
                                                                            <input type="password" class="form-control form-control-solid" id="password" name="password">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="opening_balance">Confirm Password</label>
                                                                            <input type="password" class="form-control form-control-solid" id="confirm_password" name="confirm_password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                    
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateEmployeePass">
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

                                            <div class="modal fade" tabindex="-1" id="editUserAccessModal">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Access rights</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="userAccessInsertUpdateForm">
                                                                <div class="row">
                                                                    <input type="hidden" class="form-control" id="eid3" name="eid3" required>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Employee</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uaemployee" name="uaemployee[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="emp_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="emp_add">Add</option>
                                                                                        <option value="emp_edit">Edit</option>
                                                                                        <option value="emp_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Customer</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uacustomer" name="uacustomer[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="customer_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="customer_add">Add</option>
                                                                                        <option value="customer_edit">Edit</option>
                                                                                        <option value="customer_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Vendor</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uavendor" name="uavendor[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="vendor_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="vendor_add">Add</option>
                                                                                        <option value="vendor_edit">Edit</option>
                                                                                        <option value="vendor_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Location</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="ualocation" name="ualocation[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="location_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="location_add">Add</option>
                                                                                        <option value="location_edit">Edit</option>
                                                                                        <option value="location_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Account</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uaaccount" name="uaaccount[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="account_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="account_add">Add</option>
                                                                                        <option value="account_edit">Edit</option>
                                                                                        <option value="account_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Agent</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uaagent" name="uaagent[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="agent_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="agent_add">Add</option>
                                                                                        <option value="agent_edit">Edit</option>
                                                                                        <option value="agent_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div> 
                                                                        
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">HBL</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uahbl" name="uahbl[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="hbl_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="hbl_add">Add</option>
                                                                                        <option value="hbl_edit">Edit</option>
                                                                                        <option value="hbl_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>     
                                                                        
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Shipped</label>
                                                                            <select class="form-select form-select-solid" data-control="select2" id="uashipped" name="uashipped[]" data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple" data-dropdown-parent="#editUserAccessModal">
                                                                                    <option value="shipped_access_denied" selected>Access denied</option>
                                                                                    <optgroup label="Access">
                                                                                        <option value="shipped_add">Add</option>
                                                                                        <option value="shipped_edit">Edit</option>
                                                                                        <option value="shipped_delete">Delete</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                        </div>
                                                                    </div>         
                                                                        
                                                                       
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="insertUpdateUserAccess">
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
                                                    <table id="employeeTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                                <th class="min-w-150px">role</th>
                                                                <th class="min-w-150px">Name</th>
                                                                <th class="min-w-150px">Mobile</th>
                                                                <th class="min-w-150px">Email</th>
                                                                <th class="min-w-150px">Address</th>
                                                                <th class="min-w-150px">City</th>
                                                                <th class="min-w-300px">Action</th>
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

                $('#editUserAccessModal').on('hidden.bs.modal', function () {
                    location.reload();
                });

                $('#uaemployee').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uaemployee option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('emp_add') || selectedOptions.includes('emp_delete') || selectedOptions.includes('emp_edit'))) {
                        $('#uaemployee option[value="emp_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('emp_delete') && selectedOptions.includes('emp_edit')) {
                        $('#uaemployee option[value="emp_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('emp_access_denied')) {
                        $('#uaemployee option[value="emp_add"]').prop('disabled', true);
                        $('#uaemployee option[value="emp_delete"]').prop('disabled', true);
                        $('#uaemployee option[value="emp_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('emp_add')) {
                        $('#uaemployee option[value="emp_edit"]').prop('disabled', false);
                        $('#uaemployee option[value="emp_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uaemployee').select2();
                });

                $('#uacustomer').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uacustomer option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('customer_add') || selectedOptions.includes('customer_delete') || selectedOptions.includes('customer_edit'))) {
                        $('#uacustomer option[value="customer_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('customer_delete') && selectedOptions.includes('customer_edit')) {
                        $('#uacustomer option[value="customer_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('customer_access_denied')) {
                        $('#uacustomer option[value="customer_add"]').prop('disabled', true);
                        $('#uacustomer option[value="customer_delete"]').prop('disabled', true);
                        $('#uacustomer option[value="customer_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('customer_add')) {
                        $('#uaemployee option[value="customer_edit"]').prop('disabled', false);
                        $('#uaemployee option[value="customer_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uacustomer').select2();
                });

                $('#uavendor').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uavendor option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('vendor_add') || selectedOptions.includes('vendor_delete') || selectedOptions.includes('vendor_edit'))) {
                        $('#uavendor option[value="vendor_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('vendor_delete') && selectedOptions.includes('vendor_edit')) {
                        $('#uavendor option[value="vendor_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('vendor_access_denied')) {
                        $('#uavendor option[value="vendor_add"]').prop('disabled', true);
                        $('#uavendor option[value="vendor_delete"]').prop('disabled', true);
                        $('#uavendor option[value="vendor_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('vendor_add')) {
                        $('#uavendor option[value="vendor_edit"]').prop('disabled', false);
                        $('#uavendor option[value="vendor_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uavendor').select2();
                });

                $('#ualocation').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#ualocation option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('location_add') || selectedOptions.includes('location_delete') || selectedOptions.includes('location_edit'))) {
                        $('#ualocation option[value="location_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('location_delete') && selectedOptions.includes('location_add')) {
                        $('#ualocation option[value="location_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('location_access_denied')) {
                        $('#ualocation option[value="location_add"]').prop('disabled', true);
                        $('#ualocation option[value="location_delete"]').prop('disabled', true);
                        $('#ualocation option[value="location_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('location_add')) {
                        $('#ualocation option[value="location_edit"]').prop('disabled', false);
                        $('#ualocation option[value="location_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#ualocation').select2();
                });

                $('#uaaccount').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uaaccount option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('account_add') || selectedOptions.includes('account_delete') || selectedOptions.includes('account_edit'))) {
                        $('#uaaccount option[value="account_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('account_delete') && selectedOptions.includes('account_add')) {
                        $('#uaaccount option[value="account_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('account_access_denied')) {
                        $('#uaaccount option[value="account_add"]').prop('disabled', true);
                        $('#uaaccount option[value="account_delete"]').prop('disabled', true);
                        $('#uaaccount option[value="account_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('account_add')) {
                        $('#uaaccount option[value="account_edit"]').prop('disabled', false);
                        $('#uaaccount option[value="account_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uaaccount').select2();
                });

                $('#uaagent').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uaagent option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('agent_add') || selectedOptions.includes('agent_delete') || selectedOptions.includes('agent_edit'))) {
                        $('#uaagent option[value="agent_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('agent_delete') && selectedOptions.includes('agent_add')) {
                        $('#uaagent option[value="agent_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('agent_access_denied')) {
                        $('#uaagent option[value="agent_add"]').prop('disabled', true);
                        $('#uaagent option[value="agent_delete"]').prop('disabled', true);
                        $('#uaagent option[value="agent_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('agent_add')) {
                        $('#uaagent option[value="agent_edit"]').prop('disabled', false);
                        $('#uaagent option[value="agent_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uaagent').select2();
                });

                $('#uahbl').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uahbl option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('hbl_add') || selectedOptions.includes('hbl_delete') || selectedOptions.includes('hbl_edit'))) {
                        $('#uahbl option[value="hbl_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('hbl_delete') && selectedOptions.includes('hbl_add')) {
                        $('#uahbl option[value="hbl_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('hbl_access_denied')) {
                        $('#uahbl option[value="hbl_add"]').prop('disabled', true);
                        $('#uahbl option[value="hbl_delete"]').prop('disabled', true);
                        $('#uahbl option[value="hbl_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('hbl_add')) {
                        $('#uahbl option[value="hbl_add"]').prop('disabled', false);
                        $('#uahbl option[value="hbl_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uahbl').select2();
                });

                $('#uashipped').on('change', function() {
                    var selectedOptions = $(this).val();
                    
                    // Enable all options first
                    $('#uashipped option').prop('disabled', false);
                    
                    // If 'emp_delete' or 'emp_edit' is selected, disable 'access_denied'
                    if (selectedOptions && (selectedOptions.includes('shipped_add') || selectedOptions.includes('shipped_delete') || selectedOptions.includes('shipped_edit'))) {
                        $('#uashipped option[value="shipped_access_denied"]').prop('disabled', true);
                    }
                    
                    // If both 'emp_delete' and 'emp_edit' are selected, disable 'access_denied'
                    if (selectedOptions && selectedOptions.includes('shipped_delete') && selectedOptions.includes('shipped_add')) {
                        $('#uashipped option[value="shipped_access_denied"]').prop('disabled', true);
                    }
                    
                    // If 'emp_access_denied' is selected along with 'emp_delete' or 'emp_edit', disable them
                    if (selectedOptions && selectedOptions.includes('shipped_access_denied')) {
                        $('#uashipped option[value="shipped_add"]').prop('disabled', true);
                        $('#uashipped option[value="shipped_delete"]').prop('disabled', true);
                        $('#uashipped option[value="shipped_edit"]').prop('disabled', true);
                    }
                    
                    // If 'emp_add' is selected, enable 'emp_edit' and 'emp_delete'
                    if (selectedOptions && selectedOptions.includes('shipped_add')) {
                        $('#uashipped option[value="shipped_edit"]').prop('disabled', false);
                        $('#uashipped option[value="shipped_delete"]').prop('disabled', false);
                    }
                    
                    // Refresh Select2 to reflect changes
                    $('#uashipped').select2();
                });



                
                // DataTable initialization
                var table = $('#employeeTable').DataTable({
                    responsive: true,
                    "ajax": {
                        "url": "code-employee.php",
                        "type": "POST",
                        "data": { action: 'fetch' }, // Fetch HBL data
                        "dataSrc": ""
                    },
                    "columns": [
                        { "data": "role" },
                        { "data": "name" },
                        { "data": "mobile" },
                        { "data": "email" },
                        { "data": "address" },
                        { "data": "city" },
                        {
                            "data": null,
                            "render": function(data, type, full, meta) {
                                var accessDenied = <?php echo $access_denied ? 'true' : 'false'; ?>;
                                var isAdmin = <?php echo isset($_SESSION['is_admin']) ? 'true' : 'false'; ?>;
                                var buttons = '';

                                // Render the button regardless of access denied permission
                                if (isAdmin) {
                                    buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editUserAccess" data-id="${data.employee_id}"><i class="fad fa-ballot-check fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                }

                                // If user has access_denied permission, return the button
                                if (accessDenied) {
                                    return buttons;
                                }

                                // Render edit button if user has edit permission
                                if (<?php echo $can_edit || $can_add_edit || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                    buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editEmployee" data-id="${data.employee_id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                    <a href="#" class="btn btn-active-icon-primary btn-text-primary editEmployeePass" data-id="${data.employee_id}"><i class="fad fa-user-lock fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                }

                                // Render delete button if user has delete permission
                                if (<?php echo $can_delete || $can_add_delete || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                    buttons += `<a href="#" class="btn btn-active-icon-danger btn-text-danger deleteEmployee" data-id="${data.employee_id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
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

                 // Insert Employee
                $("#saveEmployee").click(function() {
                    $.post("code-employee.php", $("#employeeAddForm").serialize() + '&action=insert', function(response) {
                        // Refresh DataTable after insertion
                        Swal.fire({
                                        icon: 'success',
                                        padding: '2em',
                                        title: 'Success!',
                                        text: response,
                                        showConfirmButton: true
                                    }).then(function() {
                                        // Close the modal
                                        $('#addEmployeeModal').modal('hide');
                                        // Clear the form fields
                                        $('#employeeAddForm')[0].reset();
                                        table.ajax.reload();
                                    });
                    });
                });

                // Edit Employee
                $('#employeeTable tbody').on('click', '.editEmployee', function() {
                    var employee_id = $(this).data("id");
                    $.post("code-employee.php", { action: 'edit', employee_id: employee_id }, function(data) {
                        // Populate modal with employee data for editing
                        // For example:
                        $('#updateEmployeeModal').modal('show');
                        $('#eid').val(data.employee_id);
                        $('#ename').val(data.name);
                        $('#egender').val(data.gender);
                        $('#emobile').val(data.mobile);
                        $('#eemail').val(data.email);
                        $('#ephone').val(data.phone);
                        $('#ecredit_limit').val(data.credit_limit);
                        $('#eaddress').val(data.address);
                        $('#ecity').val(data.city);
                        $('#ezip_code').val(data.zip_code);
                        $('#ecountry').val(data.country);
                        $('#eemployee_type').val(data.employee_type);
                        $('#eaccount_num').val(data.account_num);
                        $('#eusername').val(data.username);
                        $('#erole').val(data.role);
                        $('#elocation').val(data.location);
                        $('#ebasic_salary').val(data.basic_salary);
                        $('#emonthly_target').val(data.monthly_target);
                        $('#epercentage').val(data.percentage);
                        $('#eopening_balance').val(data.percentage);
                        $('#estatus').val(data.status);
                        // Populate other fields similarly
                    }, 'json');
                });

                $('#employeeTable tbody').on('click', '.editEmployeePass', function() {
                    var employee_id = $(this).data("id");
                    $.post("code-employee.php", { action: 'edit_pass', employee_id: employee_id }, function(data) {
                        // Populate modal with employee data for editing
                        // For example:
                        $('#updateEmployeePassModal').modal('show');
                        $('#eid2').val(data.employee_id);
                        $('#pusername').val(data.username);
                        // Populate other fields similarly
                    }, 'json');
                });

                // Update Employee
                $("#updateEmployee").click(function() {
                    $.post("code-employee.php", $("#employeeUpdateForm").serialize() + '&action=update', function(response) {
                        // Refresh DataTable after update
                        Swal.fire({
                                        icon: 'success',
                                        padding: '2em',
                                        title: 'Success!',
                                        text: response,
                                        showConfirmButton: true
                                    }).then(function() {
                                        // Close the modal
                                        $('#updateEmployeeModal').modal('hide');
                                        // Clear the form fields
                                        table.ajax.reload();
                                    });
                    });
                });

                $("#updateEmployeePass").click(function() {
                    $.post("code-employee.php", $("#employeePassForm").serialize() + '&action=update_pass', function(response) {
                        // Refresh DataTable after update
                        if(response.includes('success')) {
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
                                $('#updateEmployeePassModal').modal('hide');
                                // Clear the form fields
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

                // Delete Agent
                $('#employeeTable tbody').on('click', '.deleteEmployee', function() {
                    var employee_id = $(this).data("id");

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
                            $.post("code-employee.php", { action: 'delete', employee_id: employee_id }, function(response) {
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


                $('#employeeTable tbody').on('click', '.editUserAccess', function() {
                    var employee_id = $(this).data("id");
                    $.post("code-employee.php", { action: 'edit_userAccess', employee_id: employee_id }, function(data) {
                        // Populate modal with employee data for editing
                        $('#editUserAccessModal').modal('show');
                        $('#eid3').val(data.employee_id);

                        var employee = JSON.parse(data.employee);
                        $('#uaemployee').val(employee).trigger('change');

                        // Populate multi-select field for customers
                        var customer = JSON.parse(data.customer);
                        $('#uacustomer').val(customer).trigger('change');

                        var vendor = JSON.parse(data.vendor);
                        $('#uavendor').val(vendor).trigger('change');

                        var location = JSON.parse(data.location);
                        $('#ualocation').val(location).trigger('change');

                        var account = JSON.parse(data.account);
                        $('#uaaccount').val(account).trigger('change');

                        var agent = JSON.parse(data.agent);
                        $('#uaagent').val(agent).trigger('change');

                        var hbl = JSON.parse(data.hbl);
                        $('#uahbl').val(hbl).trigger('change');

                        var shipped = JSON.parse(data.shipped);
                        $('#uashipped').val(shipped).trigger('change');

                        

                        // Populate other fields similarly
                    }, 'json');
                });


                $("#insertUpdateUserAccess").click(function() {
                $.post("code-employee.php", $("#userAccessInsertUpdateForm").serialize() + '&action=insert_update', function(response) {
                    // Refresh DataTable after insertion
                    Swal.fire({
                        icon: 'success',
                                        padding: '2em',
                                        title: 'Success!',
                                        text: response,
                                        showConfirmButton: true
                                }).then(function() {
                                    // Close the modal
                                    $('#editUserAccessModal').modal('hide');
                                    // Clear the form fields
                                });
                });
            });




            });

        </script>
    </body>
</html>
