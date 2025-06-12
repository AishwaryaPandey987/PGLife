<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>
<title>Payment</title>
<?php
include "includes/head_links.php";
?>

<body id="payment-form" class="bg-light" style="min-height:8000px;">

  <div class="container">
    <div class="py-5 text-center">
      <h2>Payment</h2>
      <p class="lead">Fill the information correctly.</p>
    </div>
  </div>

  <div class="container">
    <h4 class="mb-3"> Billing Address</h4>
    <form id="payment-form" class="form" role="form"  method="post" action="api/payment_submit.php">
      <div class="row g-3">
        <div class="col-sm-6">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" name="fullname" class="form-control" placeholder="John Smith" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>

        <div class="col-12">
          <label for="email" class="form-label">Email</label>
          <div class="input-group">

            <input type="email" name="email" class="form-control" placeholder="Jsmith@gmail.com" required>
          </div>

          <div class="invalid-feedback">
            Valid username is required.
          </div>
        </div>
        <div class="col-md-5">
          <label for="country" class="form-label">Country</label>
          <select id="country" class="form-control">
            <option value=""> Choose...

            </option>
            <option value="India">India

            </option>

          </select>
          <div class="invalid-feedback">
            Valid country is required.
          </div>

        </div>
        <div class="col-md-4">
          <label for="city" class="form-label">City</label>
          <select id="city" class="form-control">
            <option value=""> Choose...

            </option>
            <option value="Prayagraj">Prayagraj

            </option>

          </select>
          <div class="invalid-feedback">
            Valid state is required.
          </div>

        </div>
        <div class="col-md-3">
          <label for="postcode" class="form-label">Postcode</label>

          <input id="postcode" type="number" class="form-control" placeholder="1234" required>
        </div>

        <div class="invalid-feedback">
          Valid postcode is required.
        </div>
      </div>
      <hr class="my-4">
      <div class="col-12">

        <div class="form-check">
          <input id="safeinfo" type="checkbox" class="form-check-input">
          <label class="form-check-label" for="safeinfo"> Safe this info
          </label>
        </div>
      </div>
      <hr class="my-4">
      <h4 class="mb-3"> Payments</h4>
      <div class="form check">
        <input id="creditcard" name="paymentmethod" type="radio" class="form-check-input" checked required>
        <label for="creditcard">Credit Card</label>
      </div>
      <div class="form check">
        <input id="directdebit" name="paymentmethod" type="radio" class="form-check-input" checked required>
        <label for="directdebit">Direct Debit</label>
      </div>
      <div class="form check">
        <input id="paypal" name="paymentmethod" type="radio" class="form-check-input" checked required>
        <label for="paypal">PayPal</label>
      </div>
      <div class="row my-3 gy-3">
        <div class="col-md-6">
          <label for="full_name" class="form-label">
            Name on Card
          </label>
          <input name="full_name" type="text" class="form-control">
          <small class="text-muted">
            Full name as displayed on card.
          </small>
          <div class="invalid-feedback">
            Name on card is required.
          </div>
        </div>
        <div class="col-md-6">
          <label for="cc_number" class=form-label>
            Credit Card Number
          </label>
          <input name="card_number" type="text" class="form-control">
          <div class="invalid-feedback">
            Credit Card number is required.
          </div>
        </div>
        <div class="col-md-3">
          <label for="cc-expire" class=form-label>
            Expiration
          </label>
          <input type="text" name="card_expire" class="form-control">
          <div class="invalid-feedback">
            Expiration is required.
          </div>

        </div>
        <div class="col-md-3">
          <label for="cc-cvv" class=form-label>
            CVV
          </label>
          <input type="text" name="card_cvv" class="form-control">
          <div class="invalid-feedback">
            CVV is required.
          </div>

        </div>
      </div>
      <hr class="my-4">
      <button type="submit" class="btm-primary btn-lg btn-block">Pay

      </button>
  </div>
  </form>
  </div>

  <script src="js/2.bb328bef.chunk.js"> </script>
  <script src="js/main.d86a88e7.chunk.js"></script>
</body>

</html>