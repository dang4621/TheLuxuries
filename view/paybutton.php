<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
  </head>

  <body>
    <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AXZgZLv6VTSs5zFkGmenvubEjPxRfOB4rnHDjcQ5MdNV3CDsO1_prH0_beOAQ6LcKa29pJS9xd2-XVx1&currency=USD"></script>

    <!-- Set up a container element for the button -->
    <?php if (!empty($_SESSION['shopping_cart'])) {
									$total = 0;
									$a = 1;
									foreach ($_SESSION['shopping_cart'] as $value) {
										extract($value);
										$tt[$a] = $gia * $quantity;
								?>
	
								<?php $a++;
									}
								} 
                if (!empty($a)) {
                  for ($j = 1; $j < $a; $j++) {
                    $total += $tt[$j];
                  }
                }
                ?>

    <input type="hidden" value="<?= $total?>" name="sethang2" id="sethang2"> 

    <div id="paypal-button-container"></div>



    <script>
     
      
      paypal.Buttons({
         
        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: document.getElementById('sethang2').value // Can reference variables or functions. Example: `value: document.getElementById('...').value`
              
              }
            }]
          });
        },

        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            window.location.assign("http://localhost/TheLuxuries/index.php?act=checkout2")
          });
        }
      }).render('#paypal-button-container');


      

    </script>

<script> 



</script>
  </body>
</html>