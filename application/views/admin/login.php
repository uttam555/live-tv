<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin_style.css" />
</head>

<body>

<div id="logincontainer">

<div id="loginbox"> 
<div id="loginheader">
    <h1><?php echo SITE_NAME;?> Admin Login</h1>
</div>
<div class="error_log"><?php //echo $msg;?></div>
<form name="admin_login" id="admin_login" method="post" > 
    <div class="login_field"><label>Username:</label><input class="logininput" type="text" name="username" id="username" /></div>
    <div class="login_field"><label>Password:</label><input class="logininput" type="password" name="password" id="password" /></div>
    <div class="login_field"><input class="loginbtn" type="submit" name="submit" id="submit" value="Login" /></div>
</form>
</div>
</div>
</body>
</html>