<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Channel</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Channel</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/channel_category');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_channel">Add Channel</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Category Name</li>
<li class="name">Channel Name</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($channelArr)){
    $class=null;
    foreach($channelArr as $channel){
		$class++;
        ?>
        <ul class="<?php echo $channel['channel_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $channel['channel_id'];?></li>
            <li class="name"><?php echo $channel['category'];?></li>
            <li class="name"><?php echo stripslashes($channel['channel']);?></li>
            <li class="action"><a href="<?php echo base_url();?>admin/edit_channel/<?php echo $channel['channel_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_channel('<?php echo $channel['channel_id'];?>')">Delete</a></li>
        </ul>
        <?php
    }
}else{
    echo "No channel found...";
}
?>
</div>
<div><?php echo $pagination;?></div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript">
function delete_channel(channel_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_channel',
        type:'POST',
        data: {channel_id:channel_id},
        success: function(msg){
            $('.'+channel_id).remove();
        }
    })    
}
</script>
</html>
