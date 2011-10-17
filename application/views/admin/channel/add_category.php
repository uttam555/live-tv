<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Add Category</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
        <h1>Add Category</h1>
    <form name="add_category" id="add_category" method="post">
        <div class="text_field"><label>Category Name:</label><input class="inputbox" type="text" name="category_name" id="category_name" /></div>
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Add Category" /></div>
    </form>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#add_category').validate({
    rules:{
        category_name:{required:true}
    },
    messages:{
        category_name:{required:"Enter category name"}
    }
})    
</script>
</html>
