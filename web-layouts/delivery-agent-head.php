<?php 
    $url="http://localhost/admin_cargo_3/";

?>
<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['da_loggedin'])) {
    header('Location: delivery-agent-login.php');
    exit();
}
?>

    <head>
        <title>Bright Crgo</title>
        <meta charset="utf-8"/>
        
        <link rel="shortcut icon" href="<?php echo $url; ?>assets/media/logo/logo.png"/>
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


        </style>

        
    </head>