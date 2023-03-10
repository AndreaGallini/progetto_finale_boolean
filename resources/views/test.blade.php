<?php

use Braintree\Gateway;

$gateway = new Braintree\gateway([
    'environment' => 'sandbox',
    'merchantId' => 'kbwtw62jd6k9gv73',
    'publicKey' => 'jnj5dxkfqh72w6c5',
    'privateKey' => '29f7bd74c1b5147e2cf98b65e51de6e8',
]);

    // 'merchantId' => '4hxx8vfgmz76x6kr',
    // 'publicKey' => ' w7spspwt43ngxrx9',
    // 'privateKey' => '8cad884c16b06d5cc94c1997efe4c2ac'

$clientToken = $gateway->clientToken()->generate([
    'customerId' => '1111',
]);

?>



<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>
</head>

<body>
    <form id="payment-form" action="{{ url('/success') }}" method="POST">
        @method('POST')
        @csrf
        <div id="dropin-container"></div>
        <input type="submit" />
        <input type="hidden" id="nonce" name="payment_method_nonce" />
    </form>
    <p id="dom"> <?php
    echo $clientToken;
    ?></p>


    <script type="text/javascript">
        const form = document.getElementById('payment-form');
        let key = document.getElementById('dom').textContent
        console.log(key)

        braintree.dropin.create({
            authorization: key,
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            if (error) console.error(error);

            form.addEventListener('submit', event => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);

                    // Step four: when the user is ready to complete their
                    //   transaction, use the dropinInstance to get a payment
                    //   method nonce for the user's selected payment method, then add
                    //   it a the hidden field before submitting the complete form to
                    //   a server-side integration
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
</body>
