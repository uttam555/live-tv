<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo SITE_NAME;?> | Packages</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>
<body>
<div class="wrapper">    
<?php $this->load->view('boxes/header');?>
	<div class="container">
    	<div class="left_part">
         <?php $this->load->view('boxes/slider'); ?>
         <div class="clearboth">
            <div class="package_plan">
<?php
if(!empty($packageArr)){
    foreach($packageArr as $package){
        ?>
                <form name="package_form_<?php echo $package['package_id'];?>" method="post" id="package_form" action="<?php echo site_url('billing_info');?>">
      <div class="channel_plan"> 
          <input type="hidden" name="package_name" value="<?php echo $package['package_id'];?>"/>
          <input type="hidden" name="item_name" value="<?php echo $package['package_name'];?>" />
          <input type="hidden" name="item_price" value="<?php echo $package['price'];?>" />
    <h1 class="clearboth"><?php echo $package['package_name'];?></h1>
    <ul class="package_list">
    <li><?php echo $package['package_description'];?></li>
    <li>Free VOD </li>
    <li> US <?php echo '$'.$package['price'];?> for <?php echo $package['subscription_period'].' months';?></li>
    
    
    <div class="order floatleft clearleft"><a href="javascript:;" onclick="document.package_form_<?php echo $package['package_id'];?>.submit()">Subscribe</a></div>
    </ul>
<!--    <ul class="package_channel">
    <?php
                $channelArr = $this->channel_model->get_channel($package['package_id']);
        if(!empty($channelArr)){
            foreach($channelArr as $channel){
			if($channel['cat_id']!=''){
                ?>
                
                <li><img src="<?php echo base_url();?>images/channel/thumb/<?php echo $channel['image'];?>" alt="<?php echo htmlentities($channel['name']);?>" title="<?php echo htmlentities($channel['name']);?>"/></li>
               
              
            <?php }
            }
        }else{
            echo "No channel found...";
        }
		?>
 </ul> -->
 </div> 
            </form>                    
 <?php
    }
}else{
    echo "No package found...";
}
?>

<!--    <input type="submit" name="submit" class="check_btn" value="Checkout" />    -->

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
<script type="text/javascript">
function sel_plan(){
    document.package_form.submit();
}
</script>
</div> 
</body>
</html>
