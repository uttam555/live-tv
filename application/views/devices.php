<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo SITE_NAME;?> | Devices</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>
<body>
<div class="wrapper">    
<?php $this->load->view('boxes/header');?>
	<div class="container">
    	<div class="left_part"> 
           <?php $this->load->view('boxes/slider'); ?>
        <div class="device_list">  
        <h1>Device List</h1> 
        <div class="device_content">
<?php
if(!empty($deviceArr)){
    foreach($deviceArr as $device){
        ?>
        <div class="device_detail">
        <form name="device_form_<?php echo $device['device_id'];?>" method="post" action="<?php echo site_url('billing_info');?>">
          <input type="hidden" name="device_name" value="<?php echo $device['device_id'];?>"/>
          <input type="hidden" name="item_name" value="<?php echo $device['name'];?>" />
          <input type="hidden" name="item_price" value="<?php echo $device['price'];?>" />            
            <img src="<?php echo base_url();?>images/device/thumb/<?php echo $device['image'];?>"/>
            <h2><?php echo $device['name'];?></h2>
            <p><?php echo $device['description'];?></p>
            <div class="order"><a href="javascript:;" onclick="document.device_form_<?php echo $device['device_id'];?>.submit()">Order Now @ $<?php echo $device['price'];?></a></div>
        </form>
        </div>
    <?php
    }
}
?></div>
</div>
        </div>
         <?php 
         if($is_login<=0){
             $this->load->view('boxes/right_part');
         }else{
             $this->load->view('boxes/right_log');             
         }
         ?>
        </div>
<?php $this->load->view('boxes/footer');?>
</div>
</body>
</html>
