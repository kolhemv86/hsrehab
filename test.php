<?php


$originalDate = "2010-03-21";
echo $newDate = date("d/m/Y", strtotime($originalDate));

echo $ipaddress = $_SERVER['REMOTE_ADDR'];

?>

<input type="date" name="date"/>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="hitskolhe@gmail.com">
  <input type="hidden" name="item_name" value="hat">
  <input type="hidden" name="item_number" value="123">
  <input type="hidden" name="amount" value="15.00">
  <input type="hidden" name="first_name" value="John">
  <input type="hidden" name="last_name" value="Doe">
  <input type="hidden" name="address1" value="9 Elm Street">
  <input type="hidden" name="address2" value="Apt 5">
  <input type="hidden" name="city" value="Berwyn">
  <input type="hidden" name="state" value="PA">
  <input type="hidden" name="zip" value="19312">
  <input type="hidden" name="night_phone_a" value="610">
  <input type="hidden" name="night_phone_b" value="555">
  <input type="hidden" name="night_phone_c" value="1234">
  <input type="hidden" name="email" value="ermanojkolhe@gmail.com">
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>




<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>
 
 
</body>
</html>

