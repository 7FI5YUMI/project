<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/payment.css">
    <title>Payment</title>
</head>

<body>
    payment:
    <button id="payment-button">
        <!-- <img src="./assets/icons/khalti.png" alt="khalti-logo" class="khalti-img"> -->
        Pay with Khalti
    </button>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script>
       
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_34c055d5e6e84201acacaaf00bfa025b",
            "productIdentity": "1234567890",
            "productName": "vehicle-parking",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verfication
                    $.ajax({
                        url: "{'verify_payment'}",
                        type: 'POST',
                        data: payload,
                        dataType: 'json',
                        success: function (response) {
                            alert(respone)
                        },
                        error: function (error) {
                            alert(error.responseJSON['message'])
                        }

                        });

                    console.log(payload);
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({ amount: 1000 });
        }
    </script>
</body>

</html>