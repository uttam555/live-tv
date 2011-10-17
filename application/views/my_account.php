<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | My account</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>

<body>
<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   <div class="container">
    	<div class="left_part">
			
            <div class="head_title">
            	<h1><?php echo ucwords($userRow['firstname'].' '.$userRow['lastname']);?>'s Profile</h1>
                <div class="device_content">
                   
                <ul class="inputfield">                    
                    <li>
                    	<label>First name:</label>
                        <label><?php echo $userRow['firstname'];?></label>
                    </li>
                    <li>
                    	<label>Last name:</label>
                        <label><?php echo $userRow['lastname'];?></label>
                    </li>
                    <li>
                    	<label>Device Code No.:</label>
                        <label><?php echo $userRow['device_code'];?></label>
                    </li>
                    <li>
                    	<label>Registered Date:</label>
                        <label><?php echo $userRow['reg_date'];?></label>
                    </li>                     
                    <li>
                    	<label>Expiry:</label>
                        <label><?php echo $expirydate;?></label>
                    </li>                    
                    <li>
                    	<label>Email ID: </label>
                        <label><?php echo $userRow['email'];?></label>
                    </li>
                    <li>
                    	<label>Gender: </label>
                        <label><?php echo $userRow['gender']==0?'Male':'Female';?></label>
                    </li>
                    <li>
                    	<label>Home no.: <span class="red"></span></label>
                        <label><?php echo $userRow['home_no'];?></label>
                    </li>
                    <li>
                    	<label>Mobile no.: <span class="red"></span></label>
                        <label><?php echo $userRow['mobile_no'];?></label>
                    </li>                    
                     <li>
                    	<label>Date of Birth:</label>
                        <label><?php echo $userRow['dob'];?></label>
                    </li>
                     <li>
                    	<label>Address:</label>
                        <label><?php echo $userRow['address'];?></label>
                    </li>
                     <li>
                    	<label>City:</label>
                        <label><?php echo $userRow['city'];?></label>
                    </li>
                     <li>
                    	<label>Country:</label>
                        <label><?php echo $userRow['country'];?></label>
                    </li>
             </ul>
                 
                    </div>
            </div>
       </div>
        <?php $this->load->view('boxes/right_log'); ?>
            </div>
 		<?php $this->load->view('boxes/footer'); ?>
</div>
</body>
</html>
