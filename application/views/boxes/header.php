<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/iepngfix_tilebg.js"></script>
<style type="text/css">
img, div, input { 
    .behavior: url("<?php echo base_url();?>iepngfix.htc")
}
</style>
<div id="header">
        <div class="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo.png" title="<?php echo base_url();?>" alt="<?php echo base_url();?>" /></a></div>
    <div class="right_header">
        
        <div class="navbar">
                <ul>
                <li><a href="<?php echo base_url();?>" class="<?php echo $pcode==1?'active':'';?>"><h3>Home</h3></a></li>
                <li><a href="<?php echo base_url();?>packages" class="<?php echo $pcode==2?'active':'';?>"><h3>Packages </h3></a></li>
                <li><a href="<?php echo base_url();?>my_account" class="<?php echo $pcode==3?'active':'';?>"><h3>My Account</h3></a></li>
                <li><a href="<?php echo base_url();?>vod" class="<?php echo $pcode==4?'active':'';?>"><h3>VOD</h3></a></li>
                <li><a href="<?php echo base_url();?>devices" class="<?php echo $pcode==5?'active':'';?>"><h3>Devices</h3></a></li>
                 <li><a href="<?php echo base_url();?>contact" class="<?php echo $pcode==6?'active':'';?>"><h3>Contact</h3></a></li>
            </ul>
        </div>
    </div>
</div>