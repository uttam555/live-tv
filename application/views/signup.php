<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="CHome Live TV Sign Upontent-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Sign Up</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>
<body>
	<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   <div class="container">
    	<div class="left_part">
         <?php $this->load->view('boxes/slider'); ?>
         	<div class="head_title">
            	<h1>Registration/Activation</h1>
                <div class="device_content">
                    <span class="error_note"><?php echo $this->common->getMsg('sign_up');?></span>                    
                    <form name="register_user" id="register_user" method="post">
                <ul class="inputfield">

                	<li>
                    	<label>Device Code: <span class="red">*</span></label>
                        <input type="text" name="device_code" id="device_code"/>

                    </li>
                    <li>
                    	<label>First Name: <span class="red">*</span></label>
                        <input type="text" name="firstname" id="firstname"/>
<!--                        <span class="error_note">Enter your email address</span>-->
                    </li>
                	<li>
                    	<label>Last Name: <span class="red">*</span></label>
                        <input type="text" name="lastname" id="lastname"/>
<!--                        <span class="error_note">Enter your email address</span>-->
                    </li>
                    <li>
                    	<label>Email ID: <span class="red">*</span></label>
                        <input type="text" name="email" id="email" />
                    </li>
                    <li>
                    	<label>Confirm Email ID: <span class="red">*</span></label>
                        <input type="text" name="confirmemail" id="confirmemail" />
                    </li>
                     <li>
                    	<label>Date of Birth:</label>
                        <input type="text" name="dob" id="dob" />
                    </li>
                     
                
                <li>
                    	<label>Gender: <span class="red">*</span></label>
                        <p><input type="radio" name="for_gender" value="0" id="male" checked="checked"/><label for="male">Male</label></p>
                         <p><input type="radio" name="for_gender" value="1" id="female" /><label for="female">Female</label></p>
                    </li>
                    <li>
                    	<label>Home No:</label>
                        <input type="text" name="homeno" id="homeno" />
                    </li>
                    <li>
                    	<label>Mobile no.: <span class="red">*</span></label>
                        <input type="text" name="mobileno" id="mobileno" />
                    </li>
                    <li>
                    	<label>Address: <span class="red">*</span></label>
                        <input type="text" name="address" id="address" />
                    </li>
                    <li>
                    	<label>City: <span class="red">*</span></label>
                        <input type="text" name="city" id="city" />
                    </li>
                    <li>
                    	<label>Country: <span class="red">*</span></label>
                        <select name="country" id="country">
                            <option value="">Select Country</option>
                            <?php
                            if(!empty($countryArr)){
                                foreach($countryArr as $country){
                                    ?>
                            <option value="<?php echo $country['country_name'];?>"><?php echo $country['country_name'];?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                    	<label>Password: <span class="red">*</span></label>
                        <input type="password" name="password" id="password" />
                    </li>
                     <li>
                    	<label>Confirm Password: <span class="red">*</span></label>
                        <input type="password" name="confirmpassword" id="confirmpassword" />
                    </li>
                    <li>
                    	<label>&nbsp;</label>
                        <input type="submit" name="register" value="Register" class="log_btn" />
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#register_user').validate({
    errorClass:"error_note",
    errorElement:"span",
    rules:{
        device_code:{required:true,maxlength:9},
        firstname:{required:true},
        lastname:{required:true},        
        email:{required:true,email:true},
        confirmemail:{required:true,equalTo:'#email'},        
        homeno:{required:true},
        mobileno:{required:true},
        password:{required:true,minlength:6},
        confirmpassword:{required:true,equalTo:'#password'}
    },
    messages:{
        device_code:{required:"Enter device code",minlength:"Enter 9 characters"},
        firstname:{required:"Enter firstname name"},
        lastname:{required:"Enter lastname name"},        
        email:{required:"Enter email address",email:"Enter valid email address"},
        confirmemail:{required:"Enter confirm email",equalTo:'Emails did not match'},         
        homeno:{required:"Enter home phone number"},
        mobileno:{required:"Enter mobile number"},
        password:{required:"Enter password",minlength:"Enter aleast 6 characters"},
        confirmpassword:{required:"Enter confirm password",equalTo:"Password did not match"}        
    }
})    
</script>
</html>