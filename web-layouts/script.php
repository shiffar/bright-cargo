
        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="<?php echo $url; ?>assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo $url; ?>assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Vendors Javascript(used for this page only)-->
        <script src="<?php echo $url; ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <script src="<?php echo $url; ?>assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
        <!--end::Vendors Javascript-->
        <!--begin::Custom Javascript(used for this page only)-->
        <script src="<?php echo $url; ?>assets/js/widgets.bundle.js"></script>
        <script src="<?php echo $url; ?>assets/js/custom/widgets.js"></script>
        <script src="<?php echo $url; ?>assets/js/custom/apps/chat/chat.js"></script>
        <script src="<?php echo $url; ?>assets/js/custom/utilities/modals/users-search.js"></script>


        <script src="<?php echo $url; ?>assets/js/custom/utilities/modals/new-target.js"></script>
        <script src="<?php echo $url; ?>assets/js/custom/utilities/search/horizontal.js"></script>
        <script src="<?php echo $url; ?>assets/js/custom/apps/projects/users/users.js"></script>
        <script>
        // Check if session timeout variable is set (indicating session timed out)
        <?php if(isset($_SESSION['session_timeout'])): ?>
            // Display sweet alert
            Swal.fire({
                icon: 'warning',
                title: 'Session Timeout',
                text: 'Your session has timed out due to inactivity. Please log in again.',
                confirmButtonText: 'OK',
                allowOutsideClick: false, // Prevent clicking outside alert to dismiss
                allowEscapeKey: false // Prevent dismissing alert with Escape key
            }).then((result) => {
                // Redirect to login page after clicking OK
                window.location.href = "<?php echo $url ?>login.php";
            });
            // Unset session timeout variable to prevent repeated alerts
            <?php unset($_SESSION['session_timeout']); ?>
        <?php endif; ?>
    </script><!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
<script src="<?php echo $url; ?>assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>