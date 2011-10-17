<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Device</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Device</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/list_device');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_device">Add Device</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Device Name</li>
<li class="name">Description</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($deviceArr)){
    $class=null;
    foreach($deviceArr as $device){
		$class++;
        ?>
        <ul class="<?php echo $device['device_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $device['device_id'];?></li>
            <li class="name"><?php echo $device['name'];?></li>
            <li class="name"><?php echo character_limiter($device['description'],100);?></li>
            <li class="action"><a href="<?php echo base_url();?>admin/edit_device/<?php echo $device['device_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_device('<?php echo $device['device_id'];?>')">Delete</a></li>
        </ul>
        <?php
    }
}else{
    echo "No channel found...";
}
?>
</div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript">
function delete_device(device_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_device',
        type:'POST',
        data: {device_id:device_id},
        success: function(msg){
            $('.'+device_id).remove();
        }
    })    
}
</script>
</html>
