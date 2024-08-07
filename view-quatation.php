<?php $title = 'quatation'; // Default title?>
<!DOCTYPE html>

<html lang="en">
    
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    
    <?php include 'web-layouts/head.php'; ?>
    <script src="<?php echo $url; ?>assets/plugins/pdf/html2pdf.bundle.min.js"></script>
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
                                                    Quatation </li>
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
                                            <div class="form-container">
                                                <div class="row">
                                                    
                                                    <div class="col-md-3">
                                                        <a id="add-new-button" class="btn btn-icon btn-primary"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a>
                                                    </div>
                                                </div>
                                            
                                            
                                            
                                                <div class="table-responsive">
                                                    <table id="product-table" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Description</th>
                                                                <th>CBM</th>
                                                                <th>Weight</th>
                                                                <th>Quantity</th>
                                                                <th>Amount</th>
                                                                <th>Commission</th>
                                                                <th>Actions</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Table rows will be added here dynamically using JavaScript -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                

                                                <div class="row">
                                                    
                                                    <div class="col-md-3">
                                                        <a id="add-new-button2" class="btn btn-icon btn-primary"><i class="ki-duotone ki-plus-circle fs-2qx"><span class="path1"></span><span class="path2"></span></i></a>
                                                    </div>
                                                </div>
                                            
                                            
                                            
                                                <div class="table-responsive">
                                                    <table id="product-table2" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Description</th>
                                                                <th>Amount</th>
                                                                <th>Commission</th>
                                                                <th>Actions</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Table rows will be added here dynamically using JavaScript -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a id="submit-button" class="btn btn-icon btn-success"><i class="fad fa-check-double fs-1"></i></a>

                                                <div class="modal bg-body fade" tabindex="-1" id="viewQuatationModal">
                                                    <div class="modal-dialog modal-fullscreen">
                                                        <div class="modal-content shadow-none">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Quatation details</h5>
                                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul class="nav nav-tabs justify-content-end">
                                                                    <li class="nav-item"><a data-bs-toggle="tab" href="#tab-1" class="nav-link active"><i class="fad fa-file-alt fa-2x"></i></a></li>
                                                                    <li class="nav-item"><a id="generate-quatation-pdf" target="_blank" class="nav-link" href="#"><i class="fad fa-download fa-2x"></i></a></li>
                                                                </ul>
                                                                <div class="tab-content"><br>
                                                                    <div id="tab-1" class="tab-pane active">
                                                                        <div id="pdf-table">
                                                                            <div class="panel-body" id="tab_print_page">
                                                                                <pageheader name="page_header" content-right="HBL - CMC/AIR/DTD000060" header-style="font-weight:bold;color:#000000;" line="on"><h4 style="text-align: center; text-transform: uppercase;"><?php echo $_SESSION['c_name'];?> Quatation</h4></pageheader>
                                                                                <setpageheader name="page_header" value="on" show-this-page="1"></setpageheader>
                                                                                <div class="table-responsive animated zoomIn m-t">
                                                                                    <table style="width: 100%">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="width:35%;vertical-align: top;">
                                                                                                    
                                                                                                </td>
                                                                                                <td style="width:30%;vertical-align: top;text-align: center;">
                                                                                                    <h4><?php echo $_SESSION['c_name'];?>
                                                                                                        <br><small><?php echo $_SESSION['c_address'];?></small>
                                                                                                        <br>
                                                                                                        <small><?php echo $_SESSION['c_email'];?></small></h4>
                                                                                                    <center>
                                                                                                        <img class="print_company_logo" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" height="100px">
                                                                                                    </center>
                                                                                                </td>
                                                                                                <td style="width:35%;text-align: right;vertical-align: top;">
                                                                                                    
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <hr>
                                                                                    <table style="width: 100%;">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="width:100%;vertical-align: top;">
                                                                                                    <table style="width: 100%;" class="table table-bordered table-sm table_d">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <td style="width:15px;font-weight: bold;">#</td>
                                                                                                                <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                                                <td style="width:80px;font-weight: bold;" class="text-right">CBM</td>
                                                                                                                <td style="width:80px;font-weight: bold;" class="text-right">WEIGHT</td>
                                                                                                                <td style="width:80px;font-weight: bold;" class="text-right">QTY </td>
                                                                                                                <td style="width:100px;font-weight: bold;" class="text-right">AMOUNT</td>
                                                                                                                <td style="width:100px;font-weight: bold;" class="text-right">COMMISSION</td>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody id="veditableTableBody1">
                                                                                                        </tbody>
                                                                                                        <tfoot>
                                                                                                            <tr>
                                                                                                                <td class="text-right" colspan="2"><b>TOTAL [ SAR ]</b></td>
                                                                                                                <td id="cbmTotalFooter" class="text-right total"><b></b></td>
                                                                                                                <td id="weightTotalFooter" class="text-right total"><b></b></td>
                                                                                                                <td id="qtyTotalFooter" class="text-right total"><b></b> </td>
                                                                                                                <td id="amountTotalFooter" class="text-right total"><b></b></td>
                                                                                                                <td id="commissionTotalFooter" class="text-right total"><b></b></td>
                                                                                                            </tr>
                                                                                                        </tfoot>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td style="width:100%;vertical-align: top;">
                                                                                                    <table style="width: 100%;" class="table table-bordered table-sm table_d">
                                                                                                        <thead>
                                                                                                            <tr class="selected_table_row">
                                                                                                                <td style="font-weight: bold;">DESCRIPTION</td>
                                                                                                                <td style="width:90px;font-weight: bold;" class="text-right">AMOUNT</td>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody id="veditableTableBody2">
                                                                                                        </tbody>
                                                                                                        <tfoot>
                                                                                                            <tr>
                                                                                                                <td class="text-right"><b>NET TOTAL  [ SAR ] </b></td>
                                                                                                                <td id="netTotalFooter" class="text-right total"><b></b></td>
                                                                                                            </tr>
                                                                                                        </tfoot>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <pagefooter name="page_footer" content-left="Print By ADMIN on {DATE jS \of M Y h:i A}" content-right="{PAGENO} / {nbpg}." footer-style="font-family:serif;font-size:7pt;font-weight:bold;color:#000000;" line="on"></pagefooter>
                                                                                <setpagefooter name="page_footer" value="on"></setpagefooter>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
        // Function to generate PDF
        function generatePDF() {
            const element = document.getElementById('pdf-table');

            // Options for html2pdf
            const options = {
                filename: 'quation.pdf',
                margin: 0.5, // Set margin in inches
                image: { type: 'jpeg', quality: 1 }, // Use full quality JPEG images
                html2canvas: { scale: 3 }, // Increase scale for better quality
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }, // Enable page breaks
                htmlContent: true // Ensure text is selectable
            };



            // Use html2pdf to generate PDF
            html2pdf()
                .from(element)
                .set(options)
                .save();
        }

        // Add event listener to the link to trigger PDF generation
        document.getElementById('generate-quatation-pdf').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior (redirect)
            generatePDF(); // Call function to generate PDF
        });
    </script>
        <script>
        document.getElementById('add-new-button').addEventListener('click', function() {
            var table = document.getElementById('product-table').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);

            cell1.innerHTML = table.rows.length; // This will be the S.No
            cell2.innerHTML = '<input type="text" class="form-control" placeholder="Description">';
            cell3.innerHTML = '<input type="text" class="form-control" placeholder="CBM">';
            cell4.innerHTML = '<input type="number" class="form-control" placeholder="Weight">';
            cell5.innerHTML = '<input type="number" class="form-control" placeholder="Quantity">';
            cell6.innerHTML = '<input type="number" class="form-control" placeholder="Amount">';
            cell7.innerHTML = '<input type="number" class="form-control" placeholder="Commission">';
            cell8.innerHTML = '<a class="btn btn-icon btn-danger" onclick="removeRow(this)"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a>';
        });

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        document.getElementById('add-new-button2').addEventListener('click', function() {
            var table = document.getElementById('product-table2').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.innerHTML = table.rows.length; // This will be the S.No
            cell2.innerHTML = '<input type="text" class="form-control" placeholder="Description">';
            cell3.innerHTML = '<input type="number" class="form-control" placeholder="Amount">';
            cell4.innerHTML = '<input type="number" class="form-control" placeholder="Commission">';
            cell5.innerHTML = '<a class="btn btn-icon btn-danger" onclick="removeRow2(this)"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a>';
        });

        function removeRow2(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        $(document).ready(function() {
            $('#submit-button').click(function() {
                // Gather data from the first table
                var table1Data = [];
                $('#product-table tbody tr').each(function(index, row) {
                    var rowData = {
                        description: $(row).find('td:eq(1) input').val(),
                        cbm: $(row).find('td:eq(2) input').val(),
                        weight: $(row).find('td:eq(3) input').val(),
                        quantity: $(row).find('td:eq(4) input').val(),
                        amount: $(row).find('td:eq(5) input').val(),
                        commission: $(row).find('td:eq(6) input').val()
                    };
                    table1Data.push(rowData);
                });

                // Gather data from the second table
                var table2Data = [];
                $('#product-table2 tbody tr').each(function(index, row) {
                    var rowData = {
                        description: $(row).find('td:eq(1) input').val(),
                        amount: $(row).find('td:eq(2) input').val()
                    };
                    table2Data.push(rowData);
                });

                // Populate modal with table1 data
                var table1Body = $('#veditableTableBody1');
                table1Body.empty(); // Clear previous data
                var cbmTotal = 0, weightTotal = 0, qtyTotal = 0, amountTotal = 0, commissionTotal = 0;

                $.each(table1Data, function(index, data) {
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${data.description}</td>
                        <td class="text-right">${data.cbm}</td>
                        <td class="text-right">${data.weight}</td>
                        <td class="text-right">${data.quantity}</td>
                        <td class="text-right">${data.amount}</td>
                        <td class="text-right">${data.commission}</td>
                    </tr>`;
                    table1Body.append(row);

                    cbmTotal += parseFloat(data.cbm) || 0;
                    weightTotal += parseFloat(data.weight) || 0;
                    qtyTotal += parseFloat(data.quantity) || 0;
                    amountTotal += parseFloat(data.amount) || 0;
                    commissionTotal += parseFloat(data.commission) || 0;
                });

                $('#cbmTotalFooter').text(cbmTotal.toFixed(2));
                $('#weightTotalFooter').text(weightTotal.toFixed(2));
                $('#qtyTotalFooter').text(qtyTotal.toFixed(2));
                $('#amountTotalFooter').text(amountTotal.toFixed(2));
                $('#commissionTotalFooter').text(commissionTotal.toFixed(2));

                // Populate modal with table2 data
                var table2Body = $('#veditableTableBody2');
                table2Body.empty(); // Clear previous data
                var netTotal = 0;

                $.each(table2Data, function(index, data) {
                    var row = `<tr>
                        <td>${data.description}</td>
                        <td class="text-right">${data.amount}</td>
                    </tr>`;
                    table2Body.append(row);

                    netTotal += parseFloat(data.amount) || 0;
                });

                $('#netTotalFooter').text(netTotal.toFixed(2));

                // Show the modal
                $('#viewQuatationModal').modal('show');
            });
        });
    </script>


               
    </body>
</html>
