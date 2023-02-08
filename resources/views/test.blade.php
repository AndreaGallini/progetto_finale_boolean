<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>
</head>

<body>
    <!-- Step one: add an empty container to your page -->
    <div id="dropin-container"></div>

    <script type="text/javascript">
        // Step two: create a dropin instance using that container (or a string
        //   that functions as a query selector such as `#dropin-container`)
        braintree.dropin.create({
            container: document.getElementById('dropin-container'),
            // ...plus remaining configuration
        }, (error, dropinInstance) => {
            // Use `dropinInstance` here
            // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        });
        braintree.dropin.create({
            // Step three: get client token from your server, such as via
            //    templates or async http request
            authorization: CLIENT_TOKEN_FROM_SERVER,
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            // Use `dropinInstance` here
            // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        });
    </script>
</body>
<?php
$gateway = new Braintree\Gateway([
    'environment' => 'sandbox',
    'merchantId' => 'kbwtw62jd6k9gv73',
    'publicKey' => 'jnj5dxkfqh72w6c5',
    'privateKey' => '29f7bd74c1b5147e2cf98b65e51de6e8',
]);
$clientToken = $gateway->clientToken()->generate([
    'customerId' => $aCustomerId,
]);
echo $clientToken = $gateway->clientToken()->generate();
?>
