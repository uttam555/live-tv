<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Add Device</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Add Device</h1>    
    <form name="add_device" id="add_device" method="post" enctype="multipart/form-data">      
        <div class="text_field"><label>Device Name:</label><input class="inputbox" type="text" name="device_name" id="device_name" /></div>
        <div class="text_field"><label>Description:</label><textarea class="inputbox" name="description" id="description"></textarea></div>
        <div class="text_field"><label>Price:</label><input type="text" class="inputbox" name="price" id="price" /></div>        
        <div class="text_field"><label>Image:</label><input class="inputbox" type="file" name="image" id="image" value=""/></div>          
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Add Device" /></div>
    </form>
</div>
    
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview",
        //theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",

        // Style formats
        style_formats : [
                {title : 'Bold text', inline : 'b'},
                {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                {title : 'Example 1', inline : 'span', classes : 'example1'},
                {title : 'Example 2', inline : 'span', classes : 'example2'},
                {title : 'Table styles'},
                {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
        ],

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        },onchange_callback: function(editor) {
                tinyMCE.triggerSave();
                $("#" + editor.id).valid();
        }
});
</script>

<script type="text/javascript">
$('#add_device').validate({
    rules:{
        device_name:{required:true},
        description:{required:true},
        price:{required:true,number:true},
        image:{required:true}
    },
    messages:{
        device_name:{required:"Enter device name"},
        description:{required:"Enter description"},
        price:{required:"Enter price",number:"Enter digits only"},
        image:{required:"Enter image"}
    }
})    
</script>
</html>
