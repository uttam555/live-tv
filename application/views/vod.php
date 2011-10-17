<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo SITE_NAME;?> | Video On Demand</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>
<body>
<div class="wrapper">    
<?php $this->load->view('boxes/header');?>
	<div class="container">
    	<div class="left_part"> 
           <?php $this->load->view('boxes/slider'); ?>
        <div class="device_list">  
        <h1>Video On Demand</h1> 
        <div class="device_content">
            <ul class="vodlist">
            <?php
            if(!empty($vodArr)){
                foreach($vodArr as $vod){
                    ?>
<li><h2><?php echo $vod['title'];?></h2><a href="#"><img src="<?php echo base_url();?>images/vod/thumb/<?php echo $vod['image'];?>" /></a></li>            
            <?php
                }
            }
            ?>
            </ul>
</div>
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
