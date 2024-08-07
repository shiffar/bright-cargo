<?php $title = 'Hbl'; // Default title
?>
<?php
// pdf-view.php

// Retrieve the hbl_id from the URL
$hbl_id = $_GET['hbl_id'];

// Use $hbl_id in your JavaScript
?>
<!DOCTYPE html>

<html lang="en">

<?php include 'web-layouts/head.php'; ?>

<style>

     /* Hide the entire body */
     body {
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height */
        }
    .highlighted-text {
        background-color: black;
        color: white;
        padding: 10px;
        display: inline-block;
        font-size: 2.5rem;
        border-radius: 5px;
    }

    .company-details {
        font-size: 1.25rem;
        /* Slightly smaller font size */
        font-weight: bold;
        color: black;
        text-align: right;
    }

    .company-details small {
        display: block;
        margin-bottom: 5px;
    }



   

        /* Style for the container to be full screen */
        #pdf-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #pdf-container embed {
            width: 100%;
            height: 100%;
        }
</style>
<script src="<?php echo $url; ?>assets/plugins/pdf/html2pdf.bundle.min.js"></script>

<!--end::Head-->
<!--begin::Body-->

<body>


    <div class="d-none">
        <div id="pdf-table2">
            <!-- Your existing HTML content here -->
            <div class="tm_invoice tm_style1" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_align_center tm_mb20">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 text-left align-top">
                                    <img class="img-fluid mb-2" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" alt="Company Logo" style="max-width: 80px;">
                                    
                                </div>
                                <div class="col-6 text-right align-top company-details">
                                    
                                    <small style="line-height: 2; margin: 0; padding: 0; font-size:10px">BILL NO: <label id="vvbill_no"></label></small>
                                    <small style="line-height: 2; margin: 0; padding: 0; font-size:10px">CARGO : <label id="vvshipping"></label></small>
                                    <small style="line-height: 2; margin: 0; padding: 0; font-size:10px">CLEARANCE : <label id="vvclearance"></label></small>
                                    <small style="line-height: 2; margin: 0; padding: 0; font-size:10px">PALCE OF ISSUE : <label id="vvshipper_country"></label></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb20">
                        <div class="tm_invoice_seperator tm_gray_bg" style="min-height: 10px !important;"></div>
                        <div class="tm_invoice_info_list">
                            <p class="tm_invoice_number tm_m0" style="font-size: 10px;">HBL No: <b>#</b><b class="tm_primary_color" id="vvcode2"></b></p>
                            <p class="tm_invoice_date tm_m0" style="font-size: 10px;">Date: <b class="tm_primary_color" id="vvdate2">01.07.2022</b></p>
                        </div>
                    </div>
                    <div class="tm_invoice_head tm_mb10">
                        <table style="width: 100%; font-size:10px; line-height: 1.2; margin: 0; padding: 0;">
                            <tbody>
                                <tr>
                                    <td style="width:35%;vertical-align: top;">
                                        <table style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align: top;text-align: left; line-height: 2; margin: 0; padding: 0;" colspan="3"><b>SHIPPER'S DETAIL</b></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;"><b>ADDRESS</b></td>
                                                    <td style="width: 10px;vertical-align: top; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvshipper_address" style="text-transform:uppercase !important;">,<label id="vvshipper_city"></label>,<label id="vshipper_country"></label></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>MOBILE</b></td>
                                                    <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvshipper_mobile"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>NIC / PASSPORT</b></td>
                                                    <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvshipper_pp_nic"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="width:35%;vertical-align: top;">
                                        <table style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align: top;text-align: left; line-height: 2; margin: 0; padding: 0;" colspan="3"><b>CONSIGNEE'S DETAIL</b></td>
                                                </tr>

                                                <tr>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;"><b>ADDRESS</b></td>
                                                    <td style="width: 10px;vertical-align: top; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvconsignee_address" style="text-transform:uppercase !important;">,<label id="vvconsignee_city"></label>,<label id="vvconsignee_country"></label></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>MOBILE</b></td>
                                                    <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvconsignee_mobile"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>NIC / PASSPORT</b></td>
                                                    <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvconsignee_ppnic"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>DISTRICT</b></td>
                                                    <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvddistrict"></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 50px; line-height: 2; margin: 0; padding: 0;"><b>BALANCE</b></td>
                                                    <td style="width: 10px; line-height: 2; margin: 0; padding: 0;">:</td>
                                                    <td style="width: 50px;vertical-align: top; line-height: 2; margin: 0; padding: 0;" id="vvbalance"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <table style="width: 100%; border-width: 1px; border-color: black;">
                        <tbody>
                            <tr>
                                <td style="width:100%;vertical-align: top; line-height: 2; margin: 0; padding: 0;">
                                    <table style="width: 100%; border-width: 1px; border-color: black;" class="table table-bordered table-sm table_d">
                                        <thead class="table-light" style=" border-width: 1px; border-color: black;">
                                            <tr>
                                                <td style="width:15px;font-weight: bold; line-height: 2; margin: 0; padding: 0;" class="text-center">#</td>
                                                <td style="font-weight: bold; line-height: 2; margin: 0; padding: 0;">DESCRIPTION</td>
                                                <td style="width:80px;font-weight: bold;" class="text-right">CBM</td>
                                                <td style="width:80px;font-weight: bold;" class="text-right">WEIGHT</td>
                                                <td style="width:80px;font-weight: bold;" class="text-right">QTY </td>
                                                <td style="width:100px;font-weight: bold;" class="text-right">AMOUNT</td>
                                            </tr>
                                        </thead>
                                        <tbody id="vveditableTableBody1">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-right line-height: 2; margin: 0; padding: 0;" colspan="2"><b>TOTAL [ SAR ]</b></td>
                                                <td style="width: 50px;vertical-align: top;" id="vvcbmTotalFooter" class="text-right total"><b></b></td>
                                                <td style="width: 50px;vertical-align: top;" id="vvweightTotalFooter" class="text-right total"><b></b></td>
                                                <td style="width: 50px;vertical-align: top;" id="vvqtyTotalFooter" class="text-right total"><b></b> </td>
                                                <td style="width: 50px;vertical-align: top;" id="vvamountTotalFooter" class="text-right total"><b></b></td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <!-- .tm_note -->
                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->


    <div id="pdf-container"></div>









    <?php include 'web-layouts/script.php'; ?>
</body>

<script>
    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var hbl_id = urlParams.get('hbl_id');

        $.post("code-hbl.php", {
            action: 'view',
            hbl_id: hbl_id
        }, function(data) {
            // Populate the HTML with fetched data
            $('#vvhbl_id').val(data.hbl_id);
            $('#vvcode').text(data.code);
            $('#vvdate').text(data.Date);
            $('#vvcode2').text(data.code);
            $('#vvdate2').text(data.Date);
            $('#vvbill_no').text(data.Bill_no);
            $('#vvbalance').text(data.currency + ' ' + data.Balance);
            $('#vvshipping').text(data.Shipping);
            $('#vvclearance').text(data.Clearance);
            $('#vvagent').text(data.Agent);
            $('#vvddistrict').text(data.ddistrict);

            $('#vvshipper_address').text(data.Shipper_address);
            $('#vvshipper_mobile').text(data.Shipper_mobile);
            $('#vvshipper_city').text(data.Shipper_city);
            $('#vvshipper_country').text(data.Shipper_country);
            $('#vvshipper_pp_nic').text(data.Shipper_pp_nic);

            $('#vvconsignee_address').text(data.Consignee_address);
            $('#vvconsignee_mobile').text(data.Consignee_mobile);
            $('#vvconsignee_city').text(data.Consignee_city);
            $('#vvconsignee_country').text(data.Consignee_country);
            $('#vvconsignee_ppnic').text(data.Consignee_pp_nic);

            var currency = data.currency;
            $('#vveditableTableBody1').empty();
            if (data.hbl_details && data.hbl_details.length > 0) {
                var processedIdsDetails = {};
                $.each(data.hbl_details, function(index, detail) {
                    if (!processedIdsDetails.hasOwnProperty(detail.id)) {
                        var newRow = `
                            <tr>
                                <td><label name="vvdetails_id[]">${detail.id}</label></td>
                                <td><label name="vvdescription[]">${detail.dDescription}</label></td>
                                <td><label name="vvcbm[]">${detail.CBM}</label></td>
                                <td><label name="vvweight[]">${detail.Weight}</label></td>
                                <td><label name="vvqty[]">${detail.QTY}</label></td>
                                <td>${currency}<label name="vvamount1[]">${detail.Amount}</label></td>
                            </tr>`;
                        $('#vveditableTableBody1').append(newRow);
                        processedIdsDetails[detail.id] = true;
                    }
                });
            }

            $('#vveditableTableBody2').empty();
            if (data.hbl_paid && data.hbl_paid.length > 0) {
                var processedIdsPaid = {};
                $.each(data.hbl_paid, function(index, paid) {
                    if (!processedIdsPaid.hasOwnProperty(paid.hbl_id)) {
                        var newRow = `
                            <tr>
                                <td><label class="form-control" name="vdescription2[]">${paid.pDescription}</label></td>
                                <td><b>${currency}<label class="form-control" name="vamount2[]">${paid.Amount}</label></b></td>
                            </tr>`;
                        $('#vveditableTableBody2').append(newRow);
                        processedIdsPaid[paid.hbl_id] = true;
                    }
                });
            } else {
                $('#eeditableTable2').hide();
            }

            var vcbmTotal = 0;
            var vweightTotal = 0;
            var vqtyTotal = 0;
            var vamountTotal = 0;
            $('#vveditableTableBody1 tr').each(function() {
                vcbmTotal += parseFloat($(this).find('label[name="vvcbm[]"]').text());
                vweightTotal += parseFloat($(this).find('label[name="vvweight[]"]').text());
                vqtyTotal += parseFloat($(this).find('label[name="vvqty[]"]').text());
                vamountTotal += parseFloat($(this).find('label[name="vvamount1[]"]').text().replace(currency + ' ', ''));
            });
            $('#vvcbmTotalFooter').text(vcbmTotal.toFixed(3));
            $('#vvweightTotalFooter').text(vweightTotal.toFixed(2));
            $('#vvqtyTotalFooter').text(Math.round(vqtyTotal));
            $('#vvamountTotalFooter').text(`${currency} ${vamountTotal.toFixed(2)}`);

            var netTotal = 0;
            $('#veditableTableBody2 tr').each(function() {
                netTotal += parseFloat($(this).find('label[name="Vvdmount2[]"]').text().replace(currency + ' ', ''));
            });
            $('#netTotalFooter').text(`${currency} ${netTotal.toFixed(2)}`);

            // Call generatePDF() after populating the data
            generatePDF();
        }, 'json');
    });

    function generatePDF(filename) {
        var element = document.getElementById('pdf-table2');

        // Add CSS rule to make text smaller
        var style = document.createElement('style');
        style.innerHTML = '#pdf-table2 { font-size: 8px; }'; // Set the font size here
        document.head.appendChild(style);

        // Convert HTML to PDF and embed it in a container
        html2pdf().from(element).set({
            margin: [0.1, 0.1, 0.1, 0.1], // Top, Right, Bottom, Left margins in inches
            filename: filename, // Set the filename dynamically
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        }).outputPdf('datauristring').then(function(pdfAsString) {
            var pdfContainer = document.getElementById('pdf-container');
            var embed = document.createElement('embed');
            embed.setAttribute('src', pdfAsString);
            embed.setAttribute('type', 'application/pdf');
            embed.setAttribute('width', '100%');
            embed.setAttribute('height', '800px');
            pdfContainer.appendChild(embed);

            // Remove the added style after generating PDF
            document.head.removeChild(style);

        });
    }
</script>



</body>

</html>