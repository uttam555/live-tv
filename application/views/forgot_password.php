<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Forgot Password</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>

<body>
	<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   
	<div class="container">
    	<div class="left_part">
         <?php $this->load->view('boxes/slider'); ?>
         <div class="head_title">
            	<h1>Forgot Password</h1>

                <div class="device_content">
                <div><?php echo $this->common->getMsg('forgot_password');?></div>                                     
                    <form name="forgot_password" id="forgot_password" method="post">
                <ul class="inputfield">
                    <li>
                    	<label>Email ID: </label>
                        <input type="text" name="email" id="email" />
                    </li>                    
                    <li>
                    	<label>&nbsp;</label>
                        <input type="submit" name="submit" value="Change" class="log_btn" />
                    </li>
             </ul>
                    </form>
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
$('#forgot_password').validate({
    errorElement:"span",
    errorClass:"error_note",
    rules:{
        email:{required:true,email:true}
    },
    messages:{
        email:{required:"Enter email address",email:"Enter valid email address"}
    }
})
</script>
</html>
