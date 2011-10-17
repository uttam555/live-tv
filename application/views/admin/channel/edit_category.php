<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Edit Category</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Edit Category</h1>     
<div class="error_msg"><?php echo $this->common->getMsg('admin/channel/edit_category');?></div>    
    <form name="edit_category" id="edit_category" method="post">
        <div class="text_field"><label>Category Name:</label><input class="inputbox" type="text" name="category_name" id="category_name" value="<?php echo $catRow['name'];?>" /></div>
        <div class="text_field"><label>&nbsp;</label><input class="inputbox" type="submit" name="submit" value="Edit Category" /></div>
    </form>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#edit_category').validate({
    rules:{
        category_name:{required:true}
    },
    messages:{
        category_name:{required:"Enter category name"}
    }
})    
</script>
</html>
