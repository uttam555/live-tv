<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Add VOD</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Add VOD</h1>    
    <form name="add_vod" id="add_vod" method="post" enctype="multipart/form-data">      
        <div class="text_field"><label>Title:</label><input class="inputbox" type="text" name="title" id="title" /></div>      
        <div class="text_field"><label>Image:</label><input class="inputbox" type="file" name="image" id="image" value=""/></div>          
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Add VOD" /></div>
    </form>
</div>
    
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#add_device').validate({
    rules:{
        title:{required:true},
        image:{required:true}
    },
    messages:{
        title:{required:"Enter title"},
        image:{required:"Enter image"}
    }
})    
</script>
</html>
