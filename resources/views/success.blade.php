<?php

$nonceFromTheClient = $_POST['payment_method_nonce'];

$result = $gateway->transaction()->sale([
    'amount' => '10.00',
    'paymentMethodNonce' => $nonceFromTheClient,
    'deviceData' => $deviceDataFromTheClient,
    'options' => [
        'submitForSettlement' => true,
    ],
]);
?>
<h1>ciao</h1>
