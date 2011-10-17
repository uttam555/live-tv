<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<body>
<?php
// put your code here
?>
<form action="https://sandbox.paypal.com/cgi-bin/webscr" method="post" id="payPalForm">

<input type="hidden" name="item_number" value="1">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="business" value="seller_1314858670_biz@sabaiko.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="http://192.168.1.103/live/">

Item Details:<br /><input name="item_name" type="text" id="item_name"  size="45">
<br /><br />
Amount: <br /><input name="amount" type="text" id="amount" size="45">
<br /><br />
<input type="submit" name="Submit" value="Submit">

</form>    
</body>
</html>
