<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Help Video</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Help Video</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/list_help_video');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_help_video">Add Help Video</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Title</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($videoArr)){
    $class=null;
    foreach($videoArr as $video){
		$class++;
        ?>
        <ul class="<?php echo $video['video_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $video['video_id'];?></li>
            <li class="name"><?php echo $video['title'];?></li>
            <li class="action"><a href="<?php echo base_url();?>admin/edit_help_video/<?php echo $video['video_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_video('<?php echo $video['video_id'];?>')">Delete</a></li>
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
function delete_video(video_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_video',
        type:'POST',
        data: {video_id:video_id},
        success: function(msg){
            $('.'+video_id).remove();
        }
    })    
}
</script>
</html>
