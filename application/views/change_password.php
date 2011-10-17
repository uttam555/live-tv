<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Change Password</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>

<body>
<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   <div class="container">
    	<div class="left_part">
			
            <div class="head_title">
            	<h1>Change Password</h1>
                <div class="device_content">
                    <span class="error_note"><?php echo $this->common->getMsg('change_password');?></span>                    
                    <form method="post" id="chng_password" name="chng_password">
                <ul class="inputfield">
                    <li>
                    	<label>Old Password: <span class="red">*</span></label>
                        <input type="password" id="old_password" name="old_password">
                    </li>                    
                    <li>
                    	<label>Password: <span class="red">*</span></label>
                        <input type="password" id="password" name="password">
                    </li>
                     <li>
                    	<label>Confirm Password: <span class="red">*</span></label>
                        <input type="password" id="confirmpassword" name="confirmpassword">
                    </li>
                    <li>
                    	<label>&nbsp;</label>
                        <input type="submit" class="log_btn" value="Change" name="change">
                    </li>
             </ul>
                    </form>
                    </div>
            </div>
            </div>
		 <?php $this->load->view('boxes/right_log'); ?>
   </div>
   <?php $this->load->view('boxes/footer'); ?>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#chng_password').validate({
    errorElement:'span',
    errorClass:'error_note',
    rules:{
        old_password:{required:true},
        password:{required:true},
        confirmpassword:{required:true,equalTo:'#password'}
    },
    messages:{
        old_password:{required:"Enter old password"},
        password:{required:"Enter password"},
        confirmpassword:{required:"Enter confirm password",equalTo:"Password did not match"}
    }
})
</script>
</html>
