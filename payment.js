window.addEventListener("load", function () {
  var payment_form = document.getElementById("payment-form");
  payment_form.addEventListener("submit", function (event) {
     var XHR = new XMLHttpRequest();
      var form_data = new FormData(payment_form);

      // On success
      XHR.addEventListener("load", payment_success);

      // On error
      XHR.addEventListener("error", on_error);

      // Set up request
      XHR.open("POST", "api/payment_submit.php");

      // Form data is sent with request
      XHR.send(form_data);

      document.getElementById("loading").style.display = 'block';
      event.preventDefault();
  });
});

var payment_success = function (event) {
  document.getElementById("loading").style.display = 'none';

  var response = JSON.parse(event.target.responseText);
  if (response.success) {
    alert(response.message);
    window.location.href = "property_detail.php";
  } else {
      alert(response.message);
  }
};

var on_error = function (event) {
  document.getElementById("loading").style.display = 'none';

  alert('Oops! Something went wrong.');
};