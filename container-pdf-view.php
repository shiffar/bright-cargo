<?php $title = 'Container'; // Default title
?>
<?php
// pdf-view.php

// Retrieve the hbl_id from the URL
$shipped_details_id = $_GET['shipped_details_id'];

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
        overflow: hidden;
        /* Prevent scrolling */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Full height */
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
            <div class="tm_invoice tm_style1" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_align_center tm_mb20">


                        <div class="container">
                            <div class="row align-items-center">
                                <!-- Agent Details -->
                                <div class="col-md-4 text-start details">
                                    <h4>
                                        <small style="font-size: 10px;"><label id="vvagent_name"></label></small>
                                        <small style="font-size: 10px;"><label id="vvagent_address"></label></small>
                                        <small style="font-size: 10px;"><label id="vvagent_email"></label></small>
                                    </h4>
                                </div>

                                <!-- Company Details Centered -->
                                <div class="col-md-4 text-center details">
                                    <h6>
                                        <small style="font-size: 10px;"><?php echo isset($_SESSION['c_name']) ? $_SESSION['c_name'] : 'default'; ?></small><br>
                                        <small style="font-size: 10px;"><?php echo isset($_SESSION['c_address']) ? $_SESSION['c_address'] : 'default'; ?></small><br>
                                        <small style="font-size: 10px;"><?php echo isset($_SESSION['c_email']) ? $_SESSION['c_email'] : 'default'; ?></small>
                                    </h6>
                                    <img class="img-fluid mb-3" src="<?php echo $url; ?>company_logos/<?php echo isset($_SESSION['avatar']) && $_SESSION['avatar'] ? $_SESSION['avatar'] : 'default.png'; ?>" alt="Company Logo" style="max-width: 80px;">
                                    <h6 style="font-size: 10px;">CARGO MANIFEST</h6>
                                </div>

                                <!-- Other Details -->
                                <div class="col-md-4 text-end details">
                                    <h6>
                                        <small><label id="vvst"></label> BILL NO: <label id="vvshp_no"></label></small><br>
                                        <small>WEIGHT: <label id="vvfeet_weight"></label></small>
                                    </h6>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tm_invoice_info tm_mb20">
                        <div class="tm_invoice_seperator tm_gray_bg" style="min-height: 10px !important;"></div>
                        <div class="tm_invoice_info_list">
                            <p class="tm_invoice_number tm_m0" style="font-size: 10px;">File No: <b>#</b><b class="tm_primary_color" id="vvfile_no2"></b></p>
                            <p class="tm_invoice_date tm_m0" style="font-size: 10px;">Date: <b class="tm_primary_color" id="vvdate2">01.07.2022</b></p>
                        </div>
                    </div>
                    <table style="width: 100%;overflow: wrap; border-width: 1px; border-color: black;" class="table table-bordered table-sm table_d">
                        <thead class="table-light" style="border-width: 1px; border-color: black;">
                            <tr>
                                <th class="text-center" style="width:25px;font-size:10px !important;">#</th>
                                <th class="text-center" style="width:80px;font-size:10px !important;">HBL</th>
                                <th class="text-center" style="width:180px;font-size:10px !important;">SHIPPER</th>
                                <th class="text-center" style="width:180px;font-size:10px !important;">CONSIGNEE</th>
                                <th class="text-center" style="width:120px;font-size:10px !important;">DESCRIPTION</th>
                                <th class="text-center" style="width:60px;font-size:10px !important;">CBM</th>
                                <th class="text-center" style="width:65px;font-size:10px !important;">WEIGHT</th>
                                <th class="text-center" style="width:40px;font-size:10px !important;">QTY</th>
                                <th class="text-center" style="width:110px;font-size:10px !important;">DEST.UPB</th>
                            </tr>
                        </thead>
                        <tbody id="vveditableTableBody1">
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                    <table style="width:70%; border-width: 1px; border-color: black;" class="table table-bordered table-sm table_d" align="right" id="vwarehouseInfoTable">
                        <thead class="table-light" style="border-width: 1px; border-color: black;">
                            <tr>
                                <th class="text-center" style="font-size:10px!important;">WAREHOUSE</th>
                                <th class="text-center" style="font-size:10px!important;">NO</th>
                                <th class="text-center" style="font-size:10px!important;">CBM</th>
                                <th class="text-center" style="font-size:10px!important;">WEIGHT</th>
                                <th class="text-center" style="font-size:10px!important;">QTY</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>


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
        var shipped_details_id = urlParams.get('shipped_details_id');

        $.post("code-container.php", {
            action: 'view',
            shipped_details_id: shipped_details_id
        }, function(data) {
            console.log(data);
            $('#vhbl_id').val(data.shipped_details_id);
            $('#vvdate').text(data.shipping_date);
            $('#vvdate2').text(data.shipping_date);
            $('#vvshp_no').text(data.shipping_no);
            $('#vvst').text(data.shipping_type);
            $('#vvfeet_weight').text(data.feet_weight);
            $('#vvfile_no').text(data.file_no);
            $('#vvfile_no2').text(data.file_no);
            $('#vvclearance').text(data.Clearance);
            $('#vvagent_name').text(data.agent_name);
            $('#vvagent_email').text(data.agent_email);
            $('#vvagent_address').text(data.agent_address);
            $('#vvhbl_type').text(data.HBL_Type);
            // Clear previous data
            $('#vveditableTableBody1').empty();
            $('#vwarehouseInfoTable tbody').empty();
            $('#vwarehouseInfoTable tfoot').empty(); // Clear warehouse total
            var rowNumber = 1;
            var totalCBM = 0;
            var totalWeight = 0;
            var totalQty = 0;
            var warehouseCount = {}; // Object to track the count of warehouses

            // Populate table with data
            if (data.hbl && data.hbl.length > 0) {
                var displayedHblIds = []; // Array to keep track of displayed HBL IDs
                $.each(data.hbl, function(index, hbl) {
                    // Check if the HBL ID has been displayed already
                    if (!displayedHblIds.includes(hbl.id)) {
                        var descriptions = hbl.hbl_details.map(detail => detail.Description).join('<br>');
                        var weights = hbl.hbl_details.map(detail => detail.Weight).join('<br>');
                        var cbms = hbl.hbl_details.map(detail => detail.CBM).join('<br>');
                        var qtys = hbl.hbl_details.map(detail => detail.QTY).join('<br>');

                        // Calculate totals
                        hbl.hbl_details.forEach(function(detail) {
                            totalCBM += parseFloat(detail.CBM) || 0;
                            totalWeight += parseFloat(detail.Weight) || 0;
                            totalQty += parseInt(detail.QTY) || 0;
                        });

                        // Track warehouse count
                        var warehouse = hbl.agents_address.acity;
                        if (!warehouseCount[warehouse]) {
                            warehouseCount[warehouse] = 0;
                        }
                        warehouseCount[warehouse]++;

                        var newRow = `
                                        <tr>
                                            <td class="text-start" style="font-size: 10px;">${rowNumber++}</td>
                                            <td class="text-start" style="font-size: 10px;">${hbl.hbl_code}<br>${hbl.Bill_no}<br>${hbl.BBill_no}</td>
                                            <td class="text-start" style="font-size: 10px;">${hbl.Shipper.sname}<br>${hbl.Shipper.saddress}<br>${hbl.Shipper.s_city}<br>${hbl.Shipper.s_country}</td>
                                            <td class="text-start" style="font-size: 10px;">${hbl.Consignee.cname}<br>${hbl.Consignee.caddress}<br>${hbl.Consignee.co_city}<br>${hbl.Consignee.co_country}<br>${hbl.Consignee.cmobile}<br>${hbl.hbl_district}</td>
                                            <td class="text-start" style="font-size: 10px;">${descriptions}</td>
                                            <td class="text-end" style="font-size: 10px;">${cbms}</td>
                                            <td class="text-end" style="font-size: 10px;">${weights}</td>
                                            <td class="text-end" style="font-size: 10px;">${qtys}</td>
                                            <td class="text-start" style="font-size: 10px;">${hbl.agents_address.acity}<br>${hbl.Clearance}<br>${hbl.balance}</td>
                                        </tr>`;
                        $('#vveditableTableBody1').append(newRow);
                        displayedHblIds.push(hbl.id); // Add the displayed HBL ID to the array
                    }
                });
            }

            // Append total row for the main table
            $('#vveditableTableBody1').append(`
                            <tr>
                                <td colspan="5" class="text-end" style="font-size:10px !important;">TOTAL CALCULATION</td>
                                <td class="text-end" style="font-size:10px !important;">${totalCBM.toFixed(3)}</td>
                                <td class="text-end" style="font-size:10px !important;">${totalWeight.toFixed(2)}</td>
                                <td class="text-end" style="font-size:10px !important;">${totalQty}</td>
                                <td class="text-end" style="font-size:10px !important;"></td>
                            </tr>
                        `);

            // Populate warehouse info table with data
            for (var warehouse in warehouseCount) {
                $('#vwarehouseInfoTable tbody').append(`
                                <tr>
                                    <td class="text-end" style="font-size: 10px;">${warehouse}</td>
                                    <td class="text-end" style=font-size: 10px;">${warehouseCount[warehouse]}</td>
                                    <td class="text-end" style="font-size: 10px; width:50px">${totalCBM.toFixed(3)}</td>
                                    <td class="text-end" style="font-size: 10px; width:50px">${totalWeight.toFixed(2)}</td>
                                    <td class="text-end" style="font-size: 10px; width:50px">${totalQty}</td>
                                </tr>
                            `);
            }

            // Append total row for the warehouse info table
            $('#vwarehouseInfoTable tfoot').append(`
                            <tr>
                                <td class="text-end" style="font-size: 10px; ">TOTAL</td>
                                <td class="text-end" style="font-size: 10px; width:50px">${Object.keys(warehouseCount).length}</td>
                                <td class="text-end" style="font-size: 10px; width:50px">${totalCBM.toFixed(3)}</td>
                                <td class="text-end" style="font-size: 10px; width:50px">${totalWeight.toFixed(2)}</td>
                                <td class="text-end" style="font-size: 10px; width:50px">${totalQty}</td>
                            </tr>
                        `);

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