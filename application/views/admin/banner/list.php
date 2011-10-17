<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Banner</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Banner</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/list_banner');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_banner">Add Banner</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Banner Name</li>
<li class="name">Link</li>
<li class="ids">Image</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($bannerArr)){
    $class=null;
    foreach($bannerArr as $banner){
		$class++;
        ?>
        <ul class="<?php echo $banner['banner_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $banner['banner_id'];?></li>
            <li class="name">&nbsp;<?php echo $banner['name'];?></li>
            <li class="name">&nbsp;<?php echo $banner['link'];?></li>
            <li class="ids">&nbsp;
            <img src="<?php echo base_url();?>images/banner/thumb/<?php echo $banner['image'];?>" /></li>
            <li class="action"><a href="<?php echo base_url();?>admin/edit_banner/<?php echo $banner['banner_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_banner('<?php echo $banner['banner_id'];?>')">Delete</a></li>
        </ul>
        <?php
    }
}else{
    echo "No banner found...";
}
?>
</div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript">
function delete_banner(banner_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_banner',
        type:'POST',
        data: {banner_id:banner_id},
        success: function(msg){
            $('.'+banner_id).remove();
        }
    })    
}
</script>
</html>
