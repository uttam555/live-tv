<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Edit VOD</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Edit VOD</h1>    
    <div class="error_msg"><?php echo $this->common->getMsg('admin/vod/edit');?></div> 
    <form name="edit_device" id="edit_device" method="post" enctype="multipart/form-data">      
        <div class="text_field"><label>Title:</label><input class="inputbox" type="text" name="title" id="title" value="<?php echo $vodRow['title'];?>"/></div>      
        <div class="text_field"><label>Image:</label><input class="inputbox" type="file" name="image" id="image" value=""/></div>          
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
        title:{required:"Enter title"}
    }
})    
</script>
</html>
