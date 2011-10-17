<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?> | Transactions</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" />
</head>

<body>

<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   <div class="container">
    	<div class="left_part">
            <ul class="tranc_head tranc_title">
            	<li class="ten">A/C No.</li>
                <li class="twentyfive">Package Name</li>
                <li class="ten">Price</li>
                <li class="twentyfive">Time Period</li>
                <li class="twenty">Clint  code </li>
                <li class="ten">Download</li>
            </ul>
            <div class="tranc_detail">
                <?php
                if(!empty($tranArr)){
                    foreach($tranArr as $txn){
                        ?>
                        <ul class="tranc_head">
                            <li class="ten"><?php echo $txn['device_code'];?></li>
                            <li class="twentyfive"><?php echo $txn['package_name'];?></li>
                            <li class="ten"><?php echo '$'.$txn['price'];?></li>
                            <li class="twentyfive"><?php echo $txn['subscription_period'].' months';?> / <?php echo $expirydate;?></li>
                            <li class="twenty">Clint  code </li>
                        </ul>                
                <?php
                    }
                }
                ?>

            </div>
            <ul class="tranc_head tranc_title">
            	<li class="ten">A/C No.</li>
                <li class="twentyfive">Package Name</li>
                <li class="ten">Price</li>
                <li class="twentyfive">Time Period</li>
                <li class="twenty">Clint  code </li>
                <li class="ten">Download</li>
            </ul>  
            <div class="tranc_detail">
              
                <?php
                if(!empty($tranArr)){
                    foreach($tranArr as $txn){
                        ?>
                        <ul class="tranc_head">
                            <li class="ten"><?php echo $txn['transaction_id'];?></li>
                            <li class="twentyfive"><?php echo $txn['package_name'];?></li>
                            <li class="ten"><?php echo '$'.$txn['price'];?></li>
                            <li class="twentyfive"><?php echo $txn['subscription_period'].' months';?></li>
                            <li class="twenty">Clint  code </li>
                        </ul>                
                <?php
                    }
                }
                ?>

            </div>            
</div>
         <?php $this->load->view('boxes/right_log'); ?>
            </div>
       

 		<?php $this->load->view('boxes/footer'); ?>
</div>
</body>
</html>
