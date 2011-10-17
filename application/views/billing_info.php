<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Billing info</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>
<body>
	<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   <div class="container">
    	<div class="left_part">
         <?php $this->load->view('boxes/slider'); ?>
         	<div class="head_title">
            	<h1>Billing info</h1>
                <div class="device_content">                 
                    <form name="billing_info" action="https://sandbox.paypal.com/cgi-bin/webscr" id="billing_info" method="post">
                <ul class="inputfield">
                    <li>
                        <label>Full Name:<span class="red">*</span></label>
                        <input type="text" name="fullname" id="fullname" />
                    </li>
                    <li>
                        <label>Email:<span class="red">*</span></label>
                        <input type="text" name="email" id="email" />
                    </li>                    
                    <li>
                        <label>Phone:<span class="red">*</span></label>
                        <input type="text" name="phone" id="phone" />                        
                    </li>
                    <li>
                        <label>Address1:<span class="red">*</span></label>
                        <input type="text" name="address1" id="address1" />
                    </li>
                    <li>
                        <label>Address2:</label>
                        <input type="text" name="address2" id="address2" />
                    </li>                    
                    <li>
                    	<label>City: <span class="red">*</span></label>
                        <input type="text" name="city" id="city" />                        
                    </li>
                    <li>
                        <label>Country:<span class="red">*</span></label>
                        <select name="country" id="country">
                            <option value="">Select Country</option>
                            <?php
                            if(!empty($countryArr)){
                                foreach($countryArr as $country){
                                    ?>
                            <option value="<?php echo $country['id']?>"><?php echo $country['country_name']?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                    	<label>&nbsp;</label>
                        <input type="button" value="Save billing info" onclick="save_billing()" />                        
                        <input type="submit" name="register" value="Submit" class="log_btn" style="display:none;"/>
                    </li>
             </ul>

    <input type="hidden" name="business" value="<?php echo PAYPAL_ACC;?>" />
    <input type="hidden" name="cmd" value="_xclick" />
    <!-- the next three need to be created -->
    <input type="hidden" name="image_url" value="<?php echo base_url();?>images/logo.png" />
    <input type="hidden" name="return" value="<?php echo base_url();?>" />
    <input type="hidden" name="cancel_return" value="<?php echo base_url();?>" />
    <input type="hidden" name="notify_url" value="<?php echo base_url();?>payment" />
    <input type="hidden" name="rm" value="2" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="lc" value="US" />
    <input type="hidden" name="bn" value="toolkit-php" />
    <input type="hidden" name="cbt" value="Continue" />
    <input type="hidden" name="custom" id="custom" value="" />
    
    <!-- Payment Page Information -->
    <input type="hidden" name="no_shipping" value="0" />
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="cn" value="Comments" />
    <input type="hidden" name="cs" value="" />
    
    <!-- Product Information -->
    <input type="hidden" name="item_name" value="<?php echo $item_name;?>" />
    <input type="hidden" name="amount" value="<?php echo $price;?>" />
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="item_number" value="" />
    <input type="hidden" name="undefined_quantity" value="" />
    <input type="hidden" name="on0" value="" />
    <input type="hidden" name="os0" value="" />
    <input type="hidden" name="on1" value="" />
    <input type="hidden" name="os1" value="" />
    
    <input type="hidden" name="package_id" id="package_id" value="<?php echo isset($package_id) && $package_id!=''?$package_id:'';?>" />
    <input type="hidden" name="device_id" id="device_id" value="<?php echo isset($device_id) && $device_id!=''?$device_id:'';?>" />    
    

<!--<input type="submit" name="Submit" value="Process Payment" />-->
<noscript><p>Your browser doesn't support Javscript, click the button below to process the transaction.</p>
<!--<input type="submit" name="Submit" value="Process Payment" />-->
</noscript>
                   
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
//<![CDATA[
$('#billing_info').validate({
    errorClass:"error_note",
    errorElement:"span",
    rules:{
        fullname:{required:true},
        email:{required:true,email:true},
        phone:{required:true},
        address1:{required:true},
        city:{required:true},
        country:{required:true}
    },
    messages:{
        fullname:{required:"Enter full name"},
        email:{required:"Enter email address",email:"Enter valid email address"},
        phone:{required:"Enter phone number"},
        password:{required:"Enter password",minlength:"Enter aleast 6 characters"},
        confirmpassword:{required:"Enter confirm password",equalTo:"Password did not match"},
        address1:{required:"Enter address"},
        city:{required:"Enter city"},
        country:{required:"Enter country"}
    }
})

function save_billing(){
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address1 = $('#address1').val();
        var city = $('#city').val();
        var country = $('#country').val();
        var address2 = $('#address2').val();
        var package_id = $('#package_id').val();
        var device_id = $('#device_id').val();
        //if(fullname=='' && email=='' && phone=='' && address1=='' && city=='' && country==''){
            //return false;
        //}
        $.ajax({
            url:'<?php echo base_url();?>ajax/serialize',
            type:'post',
            data:{fullname:fullname,email:email,phone:phone,address1:address1,city:city,country:country,address2:address2,package_id:package_id,device_id:device_id},
            success: function(msg){
                $('#custom').val(msg);
                $('#billing_info').submit();
            }
        });
}
//]]>
</script>
</html>