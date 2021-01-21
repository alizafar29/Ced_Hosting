<?php
    // session_start();
    // $price;
    // foreach($_SESSION["cart"] as $key => $value){
    //   $price += $value["price"];
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
  <div id="paypal-button-container"></div>

  <script src="https://www.paypal.com/sdk/js?client-id=AbGHaQTZAz9k8M3TLwF4XxnRkIV_hzy4nmreYa-qlWRU0vTvCG9IDRbWu2kKrg2WdGOplP6b_kG_iY4Q"></script>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '100',
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        <?php

        ?>
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    },
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
</body>
</html>