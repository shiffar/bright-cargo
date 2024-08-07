<?php 
// Set the session timeout period (in seconds)
$session_timeout = 3000; // 2 minutes

$url = "http://localhost/admin_cargo_3/";

// Start session
session_start();

// Check if user is not logged in, redirect to login page
if(!isset($_SESSION['loggedin'])){
    echo '<meta http-equiv="refresh" content="0;url=' . $url . 'login">';
    exit();
}

// Check if last activity time is set
if(isset($_SESSION['last_activity'])){
    // Calculate time difference between current time and last activity time
    $inactive_time = time() - $_SESSION['last_activity'];

    // If inactive time exceeds session timeout period, destroy the session and redirect to login page
    if($inactive_time >= $session_timeout){
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
        header('Location: ' . $url . 'login'); // Redirect to login page
        exit();
    }
}

// Update last activity time to current time
$_SESSION['last_activity'] = time();

// If user is logged in and session is active, continue to display the index page content
?>

<?php
// Default access_denied to false
$access_denied = false;
$emp_access_denied = false;
$cus_access_denied = false;
$ven_access_denied = false;
$loc_access_denied = false;
$agent_access_denied = false;
$hbl_access_denied = false;
$account_access_denied = false;
$shipped_access_denied = false;
// Check if user is logged in and has the required access rights
if (isset($_SESSION['auth_user'])) {
    // Check if any of the specified roles are present
    if (isset($_SESSION['auth_user']['employee']) || 
        isset($_SESSION['auth_user']['customer']) || 
        isset($_SESSION['auth_user']['vendor']) || 
        isset($_SESSION['auth_user']['location']) || 
        isset($_SESSION['auth_user']['agent']) || 
        isset($_SESSION['auth_user']['hbl']) || 
        isset($_SESSION['auth_user']['account']) || 
        isset($_SESSION['auth_user']['shipped'])) {

        // Check employee permissions
        if (isset($_SESSION['auth_user']['employee'])) {
            $employee_permissions = explode(', ', $_SESSION['auth_user']['employee']);
            $emp_access_denied = in_array('emp_access_denied', $employee_permissions);
            if ($emp_access_denied) {
                $access_denied = true;
            }
        }

        // Check customer permissions
        if (isset($_SESSION['auth_user']['customer'])) {
            $customer_permissions = explode(', ', $_SESSION['auth_user']['customer']);
            $cus_access_denied = in_array('customer_access_denied', $customer_permissions);
            if ($cus_access_denied) {
                $access_denied = true;
            }
        }

        // Check vendor permissions
        if (isset($_SESSION['auth_user']['vendor'])) {
            $vendor_permissions = explode(', ', $_SESSION['auth_user']['vendor']);
            $ven_access_denied = in_array('vendor_access_denied', $vendor_permissions);
            if ($ven_access_denied) {
                $access_denied = true;
            }
        }

        // Check location permissions
        if (isset($_SESSION['auth_user']['location'])) {
            $location_permissions = explode(', ', $_SESSION['auth_user']['location']);
            $loc_access_denied = in_array('location_access_denied', $location_permissions);
            if ($loc_access_denied) {
                $access_denied = true;
            }
        }

        // Check agent permissions
        if (isset($_SESSION['auth_user']['agent'])) {
            $agent_permissions = explode(', ', $_SESSION['auth_user']['agent']);
            $agent_access_denied = in_array('agent_access_denied', $agent_permissions);
            if ($agent_access_denied) {
                $access_denied = true;
            }
        }

        // Check hbl permissions
        if (isset($_SESSION['auth_user']['hbl'])) {
            $hbl_permissions = explode(', ', $_SESSION['auth_user']['hbl']);
            $hbl_access_denied = in_array('hbl_access_denied', $hbl_permissions);
            if ($hbl_access_denied) {
                $access_denied = true;
            }
        }

        // Check account permissions
        if (isset($_SESSION['auth_user']['account'])) {
            $account_permissions = explode(', ', $_SESSION['auth_user']['account']);
            $account_access_denied = in_array('account_access_denied', $account_permissions);
            if ($account_access_denied) {
                $access_denied = true;
            }
        }

        // Check shipped permissions
        if (isset($_SESSION['auth_user']['shipped'])) {
            $shipped_permissions = explode(', ', $_SESSION['auth_user']['shipped']);
            $shipped_access_denied = in_array('shipped_access_denied', $shipped_permissions);
            if ($shipped_access_denied) {
                $access_denied = true;
            }
        }
    }
}

// If the user is an admin, no access denied
if (isset($_SESSION['is_admin'])) {
    $access_denied = false;
}
?>





    <head>
    <title><?php echo isset($_SESSION['c_name']) && $_SESSION['c_name'] ? $_SESSION['c_name'] . ' - ' . $title : 'default'; ?></title>

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>">
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <!--end::Fonts-->
        <!--begin::Vendor Stylesheets(used for this page only)-->
        <link href="<?php echo $url; ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $url; ?>assets/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css"/>
        <!--end::Vendor Stylesheets-->
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="<?php echo $url; ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $url; ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $url; ?>assets/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $url; ?>assets/css/pdf-styles.css">
        <!--end::Global Stylesheets Bundle-->
        <!--begin::Google tag-->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-37564768-1');
        </script>
        <!--end::Google tag-->
        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>
        <style>
            .total-underline {
                border-bottom: 3px double blue;
            }
            
            .form-control {
                border: 1px solid #000 !important;
            }

            @media print {
                .no-print {
                    display: none;
                }
            }
            body{
                text-transform: uppercase;

            }
        </style>


        
    </head>