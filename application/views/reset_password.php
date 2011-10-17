<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Live TV</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>

<body>
	<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   
	<div class="container">
    	<div class="left_part">
         <?php $this->load->view('boxes/slider'); ?>
         <div class="head_title">
            	<h1>Reset Password</h1>
                <div class="device_content">
                    <div><?php echo $this->common->getMsg('reset_password');?></div>
                    <?php
                    if(!isset($msg)){
                    ?>
                    <form name="reset_password" id="reset_password" method="post">
                <ul class="inputfield">
                    <li>
                    	<label>Enter New  Password: </label>
                        <input type="password" name="new_password" id="new_password">
                    </li>                    
                    <li>
                    	<label>Confirm Password: </label>
                        <input type="password" name="confirmpassword" id="confirmpassword">
                    </li>
                                         <li>
                    	<label>&nbsp;</label>
                        <input type="submit" name="change" value="Change" class="log_btn">
                    </li>
             </ul>
                    </form>
                    <?php
                    }else{
                        echo $msg;
                    }
                    ?>
                    </div>
            </div>
         </div>
        <?php
        //edit_profile();die;
        if($this->session->userdata('user_id')==''){
            $this->load->view('boxes/right_part');
        }else{
            $this->load->view('boxes/right_log');
        }
        ?>
    </div>
    
     <?php $this->load->view('boxes/footer'); ?>
     </div>

</body>
<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#reset_password').validate({
    errorElement:"span",
    errorClass:"error_note",
    rules:{
        new_password:{required:true,minlength:6},
        confirmpassword:{required:true,equalTo:'#new_password'}        
    },
    messages:{
        new_password:{required:"Enter new password",minlength:"Enter atleast 6 characters"},
        confirmpassword:{required:"Enter confirm password",equalTo:"Password did not match"}        
    }
})
</script>
</html>
