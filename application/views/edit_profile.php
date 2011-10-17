<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Edit Profile</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" />
</head>

<body>

<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   <div class="container">
    	<div class="left_part">
			<div class="head_title">
            	<h1>Registration</h1>
                <div class="device_content">
                    <span class="error_note"><?php echo $this->common->getMsg('edit_profile');?></span>                    
                    <form method="post" id="edit_profile" name="edit_profile">
                <ul class="inputfield">

                    <li>
                    	<label>Full name: <span class="red">*</span></label>
                        <input type="text" id="firstname" name="firstname" value="<?php echo $userRow['firstname'];?>" />
<!--                        <span class="error_note">Enter your email address</span>-->
                    </li>
                    <li>
                    	<label>Last name: <span class="red">*</span></label>
                        <input type="text" id="lastname" name="lastname" value="<?php echo $userRow['lastname'];?>"/>
                    </li>                    
                    <li>
                    	<label>Email: <span class="red">*</span></label>
                        <input type="text" id="email" name="email" value="<?php echo $userRow['email'];?>"/>
                    </li>
                     
                
                    <li>
                    	<label>Gender: <span class="red">*</span></label>
                        <p><input type="radio" <?php echo $userRow['gender']==0?"checked='checked'":'';?> id="male" value="0" name="for_gender" /><label for="male">Male</label></p>
                         <p><input type="radio" <?php echo $userRow['gender']==1?"checked='checked'":'';?> id="female" value="1" name="for_gender"/><label for="female">Female</label></p>
                    </li>
                    <li>
                    	<label>Home no.: <span class="red">*</span></label>
                        <input type="text" id="homeno" name="homeno" value="<?php echo $userRow['home_no'];?>"/>
                    </li>
                    <li>
                    	<label>Mobile no.: <span class="red">*</span></label>
                        <input type="text" id="mobileno" name="mobileno" value="<?php echo $userRow['mobile_no'];?>"/>
                    </li>                    
                     <li>
                    	<label>Date of Birth:</label>
                        <input type="text" id="dob" name="dob" value="<?php echo $userRow['dob'];?>" />
                    </li>
                    <li>
                    	<label>Address: <span class="red">*</span></label>
                        <input type="text" name="address" id="address" value="<?php echo $userRow['address'];?>" />
                    </li>
                    <li>
                    	<label>City: <span class="red">*</span></label>
                        <input type="text" name="city" id="city" value="<?php echo $userRow['city'];?>" />
                    </li>
                    <li>
                    	<label>Country: <span class="red">*</span></label>
                        <select name="country" id="country">
                            <option value="">Select Country</option>
                            <?php
                            if(!empty($countryArr)){
                                foreach($countryArr as $country){
                                    ?>
                            <option value="<?php echo $country['country_name'];?>" <?php echo $country['country_name']==$userRow['country']?"selected='selected'":"";?>><?php echo $country['country_name'];?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </li>                    
                    <li>
                    	<label>&nbsp;</label>
                        <input type="submit" class="log_btn" value="Save Changes" name="submit"/>
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
$('#edit_profile').validate({
    errorClass:"error_note",
    errorElement:"span",
    rules:{
        fullname:{required:true},
        email:{required:true,email:true},
        phone:{required:true}
    },
    messages:{
        fullname:{required:"Enter full name"},
        email:{required:"Enter email address",email:"Enter valid email address"},
        phone:{required:"Enter phone number"}       
    }
})    
</script>    
</html>
