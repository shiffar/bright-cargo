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
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

<!--end::Head-->
<!--begin::Body-->

<body>


    <div class="d-none">
        <div id="pdf-table2">
            <!-- Your existing HTML content here -->
            <div class="input-group input-group-sm mb-5">
                <div class="row">
                    <!-- Begin::Barcode -->

                    <!-- End::Barcode -->

                    <div class="col-md-12 mb-5 text-center">
                        <div class="form-group">
                            <label for="eshipper_name">Customer Name:</label>
                            <span id="bcustomer" class="form-control-static"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <div class="form-group">
                            <label for="eshipper_name">Bill No:</label>
                            <span id="bcbill_no" class="form-control-static"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <div class="form-group">
                            <label for="eshipper_name">Delivery Place:</label>
                            <span id="bdelivery_place" class="form-control-static"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <div class="form-group">
                            <label for="eshipper_name">District:</label>
                            <span id="bddistrict" class="form-control-static"></span>
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <svg id="barcode"></svg> <!-- Placeholder for Barcode -->
                    </div>
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
            console.log(data);
            // Populate the HTML with fetched data
            $('#bcustomer').text(data.Consignee_name);
            $('#bcbill_no').text(data.Bill_no);
            $('#bdelivery_place').text(data.Consignee_city);
            $('#bddistrict').text(data.ddistrict);

            // Concatenate details for the barcode
            const barcodeData = `${data.Consignee_name}-${data.Bill_no}`;

            // Generate barcode with JsBarcode
            JsBarcode("#barcode", barcodeData, {
                format: "CODE128",
                lineColor: "#000",
                width: 2,
                height: 100,
                displayValue: true,
                textAlign: "center"
            });
            generatePDF();
        }, 'json');
    });

    function generatePDF(filename) {
        var element = document.getElementById('pdf-table2');

        // Add CSS rule to make text smaller
        var style = document.createElement('style');
        style.innerHTML = '#pdf-table2 { font-size: 12px; }'; // Set the font size here
        document.head.appendChild(style);

        // Convert HTML to PDF and embed it in a container
        html2pdf().from(element).set({
            margin: [0.1, 0.1, 0.1, 0.1], // Top, Right, Bottom, Left margins in inches
            filename: filename, // Set the filename dynamically
            html2canvas: {
                scale: 2 // Increase scale for better resolution
            },
            jsPDF: {
                unit: 'in',
                format: [6, 8], // Set custom width and height in inches
                orientation: 'portrait'
            }
        }).outputPdf('datauristring').then(function(pdfAsString) {
            var pdfContainer = document.getElementById('pdf-container');
            pdfContainer.innerHTML = ""; // Clear existing content if any
            var embed = document.createElement('embed');
            embed.setAttribute('src', pdfAsString);
            embed.setAttribute('type', 'application/pdf');
            embed.setAttribute('width', '100%');
            embed.setAttribute('height', '50px');
            pdfContainer.appendChild(embed);

            // Remove the added style after generating PDF
            document.head.removeChild(style);
        });
    }
</script>



</body>

</html>