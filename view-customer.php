<?php $title = 'customer'; // Default title?>
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
                                                    Customer </li>
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
    $customer_permissions = explode(', ', $_SESSION['auth_user']['customer']);

    // Check if user has add permission
    $can_add = in_array('customer_add', $customer_permissions);

    // Check if user has edit permission
    $can_edit = in_array('customer_edit', $customer_permissions);

    // Check if user has delete permission
    $can_delete = in_array('customer_delete', $customer_permissions);

    // Check if user has add and delete permissions combined
    $can_add_delete = in_array('customer_add,customer_delete', $customer_permissions);

    // Check if user has add and edit permissions combined
    $can_add_edit = in_array('customer_add,customer_edit', $customer_permissions);

    // Check if user has edit and delete permissions combined
    $can_edit_delete = in_array('customer_edit,customer_delete', $customer_permissions);

    // Check if user has add,edit and delete permissions combined
    $can_add_edit_delete = in_array('customer_add,customer_edit,customer_delete', $customer_permissions);

    $access_denied = in_array('customer_access_denied', $customer_permissions);
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
                                                        document.write('<a href="#"class="btn btn-icon btn-active-color-primary flex-shrink-0 bg-body w-40px h-40px fs-7 fw-bold" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="ki-duotone ki-abstract-10 fs-1"><span class="path1"></span><span class="path2"></span></i></a>');
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </script>

                                            <div class="modal fade" tabindex="-1" id="addCustomerModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Customer</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="customerAddForm">
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
                                                                                <input type="text" class="form-control form-control-solid" id="mobile" name="mobile" required>
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
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="employee">Employee</label>
                                                                                <select class="placeholder js-states form-control form-control-solid" id="employee" name="employee"  data-control="select2" data-dropdown-parent="#addCustomerModal" required>
                                                                                    <option>Choose...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="account_num">Account Number</label>
                                                                                <input type="text" class="form-control form-control-solid" id="account_num" name="account_num">
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="role">Type</label>
                                                                                <input type="text" class="form-control form-control-solid" id="type" name="type">
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="location">Payment term</label>
                                                                                <input type="text" class="form-control form-control-solid" id="payment_term" name="payment_term">
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="username">Username</label>
                                                                                <input type="text" class="form-control form-control-solid" id="username" name="username" required>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="opening_balance">Opening Balance</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="opening_balance" name="opening_balance">
                                                                            </div>
                                                                        </div>-->
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="saveCustomer">
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

                                            <div class="modal fade" tabindex="-1" id="updateCustomerModal">
                                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Customer</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="customerUpdateForm">
                                                                <div class="input-group input-group-sm mb-5">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="ename">Name</label>
                                                                                <input type="hidden" class="form-control form-control-solid" id="eid" name="eid" required>
                                                                                <input type="text" class="form-control form-control-solid" id="ename" name="ename" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="egender">Gender</label>
                                                                                <select class="form-control form-control-solid" id="egender" name="egender" required>
                                                                                    <option value="Male">Male</option>
                                                                                    <option value="Female">Female</option>
                                                                                    <option value="Other">Other</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="emobile">Mobile</label>
                                                                                <input type="text" class="form-control form-control-solid" id="emobile" name="emobile" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="eemail">Email</label>
                                                                                <input type="email" class="form-control form-control-solid" id="eemail" name="eemail" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="ephone">Phone</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ephone" name="ephone">
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="ecredit_limit">Credit Limit</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="ecredit_limit" name="ecredit_limit">
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="eaddress">Address</label>
                                                                                <input type="text" class="form-control form-control-solid" id="eaddress" name="eaddress" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="ecity">City</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ecity" name="ecity" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="ezip_code">Zip Code</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ezip_code" name="ezip_code" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="ecountry">Country</label>
                                                                                <input type="text" class="form-control form-control-solid" id="ecountry" name="ecountry" required>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="eemployee">Employee Type</label>
                                                                                <select class="form-control form-control-solid" id="eemployee" name="eemployee"  data-control="select2" data-dropdown-parent="#updateCustomerModal" required>
                                                                                    <option>Choose...</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="eaccount_num">Account Number</label>
                                                                                <input type="text" class="form-control form-control-solid" id="eaccount_num" name="eaccount_num">
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="etype">Type</label>
                                                                                <input type="text" class="form-control form-control-solid" id="etype" name="etype">
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="epayment_term">Payment Term</label>
                                                                                <input type="text" class="form-control form-control-solid" id="epayment_term" name="epayment_term">
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="eusername">Username</label>
                                                                                <input type="text" class="form-control form-control-solid" id="eusername" name="eusername" required>
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="eopening_balance">Opening Balance</label>
                                                                                <input type="number" step="0.01" class="form-control form-control-solid" id="eopening_balance" name="eopening_balance">
                                                                            </div>
                                                                        </div>-->
                                                                    </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateCustomer">
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

                                            <div class="modal fade" tabindex="-1" id="updateCustomerPassModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">Customer account</h3>

                                                            <!--begin::Close-->
                                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            </div>
                                                            <!--end::Close-->
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="customerPassForm">
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
                                                                        <a href="#" class="btn btn-active-icon-primary btn-text-primary" id="updateCustomerPass">
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
                                                    <table id="customerTable" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                                            <th class="min-w-150px">Name</th>
                                                            <th class="min-w-150px">Mobile</th>
                                                            <th class="min-w-150px">Email</th>
                                                            <th class="min-w-150px">Address</th>
                                                            <th class="min-w-150px">City</th>
                                                            <th class="min-w-150px">Opening balance</th>
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
                var table = $('#customerTable').DataTable({
                responsive: true,
                "ajax": {
                    "url": "code-customer.php",
                    "type": "POST",
                    "data": { action: 'fetch' }, // Fetch HBL data
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "customer_name" },
                    { "data": "mobile" },
                    { "data": "email" },
                    { "data": "address" },
                    { "data": "city" },
                    { "data": "opening_balance" },
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
                                    buttons += `<a href="#" class="btn btn-active-icon-primary btn-text-primary editCustomerPass" data-id="${data.id}"><i class="fad fa-user-lock fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                <a href="#" class="btn btn-active-icon-primary btn-text-primary editCustomer" data-id="${data.id}"><i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
                                }

                                // Render delete button if user has delete permission
                                if (<?php echo $can_delete || $can_add_delete || $can_edit_delete || $can_add_edit_delete ? 'true' : 'false'; ?>) {
                                    buttons += `<a href="#" class="btn btn-active-icon-danger btn-text-danger deleteCustomer" data-id="${data.id}"><i class="ki-duotone ki-delete-folder fs-1"><span class="path1"></span><span class="path2"></span></i></a>`;
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
                 $("#saveCustomer").click(function() {
                    $.post("code-customer.php", $("#customerAddForm").serialize() + '&action=insert', function(response) {
                        // Refresh DataTable after insertion
                        Swal.fire({
                                        icon: 'success',
                                        padding: '2em',
                                        title: 'Success!',
                                        text: response,
                                        showConfirmButton: true
                                    }).then(function() {
                                        // Close the modal
                                        $('#addCustomerModal').modal('hide');
                                        // Clear the form fields
                                        $('#customerAddForm')[0].reset();
                                        table.ajax.reload();
                                    });
                    });
                });

                // Edit Employee
                $('#customerTable tbody').on('click', '.editCustomer', function() {
                    var id = $(this).data("id");
                    $.post("code-customer.php", { action: 'edit', id: id }, function(data) {
                        // Populate modal with customer data for editing
                        $('#updateCustomerModal').modal('show');
                        $('#eid').val(data.id);
                        $('#ename').val(data.name);
                        $('#egender').val(data.gender);
                        $('#emobile').val(data.mobile);
                        $('#eemail').val(data.email);
                        $('#ephone').val(data.phone);
                        $('#ecredit_limit').val(data.credit_limit);
                        $('#eaddress').val(data.address);
                        $('#ecity').val(data.city);
                        $('#ezip_code').val(data.zipcode);
                        $('#ecountry').val(data.country);
                        $('#epayment_term').val(data.payment_term);
                        $('#etype').val(data.type);
                        $('#eusername').val(data.username);
                        $('#eaccount_num').val(data.account_number);
                        $('#eopening_balance').val(data.opening_balance);
                        
                        // Clear previous selected option
                        $('#eemployee').val(null).trigger('change');

                        // Set selected option in Select2 dropdown
                        $('#eemployee').val(data.employee).trigger('change');
                    }, 'json');
                });

                $('#customerTable tbody').on('click', '.editCustomerPass', function() {
                    var customer_id = $(this).data("id");
                    $.post("code-customer.php", { action: 'edit_pass', customer_id: customer_id }, function(data) {
                        // Populate modal with employee data for editing
                        // For example:
                        $('#updateCustomerPassModal').modal('show');
                        $('#eid2').val(data.id);
                        $('#pusername').val(data.username);
                        // Populate other fields similarly
                    }, 'json');
                });

                $("#updateCustomerPass").click(function() {
                    $.post("code-customer.php", $("#customerPassForm").serialize() + '&action=update_pass', function(response) {
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
                                $('#updateCustomerPassModal').modal('hide');
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


                // Update Employee
                $("#updateCustomer").click(function() {
                    $.post("code-customer.php", $("#customerUpdateForm").serialize() + '&action=update', function(response) {
                        // Refresh DataTable after update
                        Swal.fire({
                                        icon: 'success',
                                        padding: '2em',
                                        title: 'Success!',
                                        text: response,
                                        showConfirmButton: true
                                    }).then(function() {
                                        // Close the modal
                                        $('#updateCustomerModal').modal('hide');
                                        // Clear the form fields
                                        table.ajax.reload();
                                    });
                    });
                });

                // Delete Agent
                $('#customerTable tbody').on('click', '.deleteCustomer', function() {
                    var id = $(this).data("id");

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
                            $.post("code-customer.php", { action: 'delete', id: id }, function(response) {
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
