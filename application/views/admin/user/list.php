<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List User</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List User</h1> 
<div class="error_msg"><?php echo $this->common->getMsg('admin/channel_category');?></div>
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">ID</li>
<li class="name">Name</li>
<li class="name">Email</li>
<li class="name">Gender</li>
<!--<li class="action">Action</li>-->
</ul>
</div>
<div class="block-main">
<?php
if(!empty($userArr)){
    $class=null;
    foreach($userArr as $user){
		$class++;
        ?>
        <ul class="<?php echo $user['user_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids"><?php echo $user['user_id'];?></li>
            <li class="name"><?php echo $user['fullname'];?></li>
            <li class="name"><?php echo $user['email'];?></li>
            <li class="name"><?php echo $user['gender']==0?'Male':'Female';?></li>
<!--            <li class="action"><a href="<?php echo base_url();?>admin/edit_channel/<?php echo $user['channel_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_channel('<?php echo $user['channel_id'];?>')">Delete</a></li>-->
        </ul>
        <?php
    }
}else{
    echo "No user found...";
}
?>
</div>
<div><?php echo $pagination;?></div>
</div>
</body>
</html>
