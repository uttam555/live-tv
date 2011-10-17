<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | List Order</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>List Order</h1> 
<div class="block-header" id="head-title">
<ul class="list_listing">
<li class="ids">Txn ID</li>
<li class="name">Package</li>
<li class="name">Price</li>
<li class="name">Name</li>
<li class="name">Email</li>
<!--<li class="action">Action</li>-->
</ul>
</div>
<div class="block-main">
<?php
if(!empty($orderArr)){
    $class=null;
    foreach($orderArr as $order){
		$class++;
        ?>
        <ul class="<?php echo $order['user_id'];?> <?php echo $class%2==0?'even':'odd';?>">
            <li class="ids">&nbsp;<?php echo $order['txn_id'];?></li>
            <li class="name">&nbsp;<?php echo $order['item_name'];?></li>
            <li class="name">&nbsp;<?php echo $order['amount'];?></li>
            <li class="name">&nbsp;<?php echo $order['firstname'].' '.$order['lastname'];?></li>
            <li class="name">&nbsp;<?php echo $order['email'];?></li>
<!--            <li class="action"><a href="<?php echo base_url();?>admin/edit_channel/<?php echo $user['channel_id'];?>">Edit</a> | <a href="javascript:;" onClick="delete_channel('<?php echo $user['channel_id'];?>')">Delete</a></li>-->
        </ul>
        <?php
    }
}else{
    echo "No order found...";
}
?>
</div>
<div><?php echo $pagination;?></div>
</div>
</body>
</html>
