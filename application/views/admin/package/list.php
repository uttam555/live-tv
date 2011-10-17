<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Package</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Package</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/list_package');?></div>
<a class="add_btn btnalt " href="<?php echo base_url();?>admin/add_package">Add Package</a>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Device Name</li>
<li class="name">Description</li>
<li class="ids">Price</li>
<li class="action">Action</li>
</ul>
</div>
<div class="block-main">
<?php
if(!empty($packageArr)){
    $class=null;
    foreach($packageArr as $package){
		$class++;
        ?>
        <ul class="<?php echo $package['package_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $package['package_id'];?></li>
            <li class="name"><?php echo $package['package_name'];?></li>
            <li class="name"><?php echo character_limiter($package['package_description'],100);?></li>
            <li class="ids"><?php echo '$'.$package['price'];?></li>
            <li class="action"><a href="<?php echo base_url();?>admin/edit_package/<?php echo $package['package_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_package('<?php echo $package['package_id'];?>')">Delete</a></li>
        </ul>
        <?php
    }
}else{
    echo "No package found...";
}
?>
</div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript">
function delete_package(package_id){
    $.ajax({
        url:'<?php echo base_url();?>admin_ajax/delete_package',
        type:'POST',
        data: {package_id:package_id},
        success: function(msg){
            $('.'+package_id).remove();
        }
    })    
}
</script>
</html>
