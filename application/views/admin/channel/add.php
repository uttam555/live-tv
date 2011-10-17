<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Add Channel</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Add Channel</h1>    
    <form name="add_channel" id="add_channel" method="post" enctype="multipart/form-data">
        <div class="text_field"><label>Category:</label>
            <select class="inputbox" name="category" id="category">
                <option value="">Select Category</option>
                <?php
                if(!empty($catArr)){
                    foreach($catArr as $cat){
                        ?>
                <option value="<?php echo $cat['category_id'];?>"><?php echo $cat['name'];?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>        
        <div class="text_field"><label>Channel Name:</label><input class="inputbox" type="text" name="channel_name" id="channel_name" /></div>
        <div class="text_field"><label>Image:</label><input class="inputbox" type="file" name="file" id="file" value="0"/></div>
        <div class="text_field"><label>&nbsp;</label>Standard size 80px * 65px</div>
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Add Channel" /></div>
    </form>
</div>
    
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#add_channel').validate({
    rules:{
        category:{required:true},
        channel_name:{required:true},
        file:{required:true}
    },
    messages:{
        category:{required:"Select category"},
        channel_name:{required:"Enter channel name"},
        file:{required:"Select image"}
    }
})    
</script>
</html>
