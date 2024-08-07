<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from_currency = $_POST['from_currency'];
    $to_currency = $_POST['to_currency'];

    // Example API: https://exchangerate-api.com/
    $apiKey = '5270dffa215a691e90ca4e07'; // Replace with your API key
    $url = "https://v6.exchangerate-api.com/v6/$apiKey/latest/$from_currency";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data && isset($data['conversion_rates'][$to_currency])) {
        $rate = $data['conversion_rates'][$to_currency];
        echo json_encode(['rate' => $rate]);
    } else {
        echo json_encode(['error' => 'Unable to fetch exchange rate']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
