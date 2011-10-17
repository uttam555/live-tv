<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Add Package</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Add Package</h1>    
    <form name="add_package" id="add_package" method="post" enctype="multipart/form-data">      
        <div class="text_field"><label>Package Name:</label><input class="inputbox" type="text" name="package_name" id="package_name" /></div>
        <div class="text_field"><label>Description:</label><textarea class="inputbox" name="description" id="description"></textarea></div>
        <div class="text_field"><label>Subscription Period:</label><input type="text" class="inputbox" name="subscription_period" id="subscription_period"/></div>         
        <div class="text_field"><label>Price:</label><input type="text" class="inputbox" name="price" id="price"/></div>
        <div class="text_field"><label></label></div>
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Add Package" /></div>
    </form>
</div>
    
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#add_package').validate({
    rules:{
        package_name:{required:true},
        description:{required:true},
        subscription_period:{required:true,number:true},
        price:{required:true,number:true}
    },
    messages:{
        package_name:{required:"Enter package name"},
        description:{required:"Enter description"},
        subscription_period:{required:"Enter subscription period",number:"Enter number only"},
        price:{required:"Enter the price",number:"Enter number only"}
    }
})    
</script>
</html>
