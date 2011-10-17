<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Edit Help Video</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Edit Help Video</h1>    
    <div class="error_msg"><?php echo $this->common->getMsg('admin/device/edit');?></div> 
    <form name="edit_device" id="edit_device" method="post" enctype="multipart/form-data">      
        <div class="text_field"><label>Video Name:</label><input class="inputbox" type="text" name="title" id="title" value="<?php echo $videoRow['title'];?>"/></div>      
        <div class="text_field"><label>Image:</label><input class="inputbox" type="file" name="video" id="video" value=""/></div>          
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Edit Device" /></div>
    </form>
</div>
    
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#edit_device').validate({
    rules:{
        title:{required:true}
    },
    messages:{
        title:{required:"Enter video title"}
    }
})    
</script>
</html>
