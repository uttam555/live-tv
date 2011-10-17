<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Add Banner</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Add Banner</h1>    
    <form name="add_banner" id="add_banner" method="post" enctype="multipart/form-data">    
        <div class="text_field"><label>Banner Name:</label><input class="inputbox" type="text" name="banner_name" id="banner_name" /></div>
        <div class="text_field"><label>Banner Link:</label><input class="inputbox" type="text" name="banner_link" id="banner_link" /></div>        
        <div class="text_field"><label>Image:</label><input class="inputbox" type="file" name="image" id="image" value="0"/></div>
        <div class="text_field"><label>&nbsp;</label>Standard size 636px * 302px</div>
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Add Banner" /></div>
    </form>
</div>
    
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#add_banner').validate({
    rules:{
        banner_name:{required:true},
        banner_link:{url:true},
        image:{required:true}
    },
    messages:{
        banner_name:{required:"Enter channel name"},
        banner_link:{url:"Enter valid url"},
        image:{required:"Select image"}
    }
})    
</script>
</html>
