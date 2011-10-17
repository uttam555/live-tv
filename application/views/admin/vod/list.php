<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List VOD</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List VOD</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/list_vod');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_vod">Add VOD</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Title</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($vodArr)){
    $class=null;
    foreach($vodArr as $vod){
		$class++;
        ?>
        <ul class="<?php echo $vod['vod_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $vod['vod_id'];?></li>
            <li class="name"><?php echo $vod['title'];?></li>
            <li class="action"><a href="<?php echo base_url();?>admin/edit_vod/<?php echo $vod['vod_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_vod('<?php echo $vod['vod_id'];?>')">Delete</a></li>
        </ul>
        <?php
    }
}else{
    echo "No vod found...";
}
?>
</div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript">
function delete_vod(vod_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_vod',
        type:'POST',
        data: {vod_id:vod_id},
        success: function(msg){
            $('.'+vod_id).remove();
        }
    })    
}
</script>
</html>
