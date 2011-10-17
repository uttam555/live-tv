<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Channel Category</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Category</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/channel_category');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_channel_category">Add Channel Category</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Category Name</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($catArr)){
    $class=null;
    foreach($catArr as $cat){
		$class++;
        ?>
        <ul class="<?php echo $cat['category_id'];?> <?php echo $class%2==0?'even':'odd';?>">
        <li class="ids"><?php echo $cat['category_id'];?></li>
        <li class="name"><?php echo $cat['name'];?></li>
        <li class="action"><a href="<?php echo base_url();?>admin/edit_channel/<?php echo $cat['category_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_category('<?php echo $cat['category_id'];?>')">Delete</a></li>
        </ul>
        <?php
    }
}else{
    echo "No category found...";
}
?>
</div>

</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript">
function delete_category(cat_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_category',
        type:'POST',
        data: {cat_id:cat_id},
        success: function(msg){
            $('.'+cat_id).remove();
        }
    })    
}
</script>
</html>
