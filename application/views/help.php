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
<?php 
if(!empty($videoArr)){
    foreach($videoArr as $video){
?>
<object id="flowplayer" width="635" height="300" data="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf" type="application/x-shockwave-flash">
    <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf" /> 
    <param name="allowfullscreen" value="true" />
    <param name="flashvars" value='config={"clip":"<?php echo site_url('video/'.$video['name'])?>"}' />
</object>
<?php } 
}else{
    echo "No video found...";
}
?>
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
