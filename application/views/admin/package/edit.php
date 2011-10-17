<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Admin | Edit Package</title>
</head>
<body>
<?php $this->load->view('admin/boxes/top'); ?>

<?php $this->load->view('admin/boxes/header'); ?>

<div id="rightside">
    <h1>Edit Package</h1>
    <div class="error_msg"><?php echo $this->common->getMsg('admin/package/edit');?></div>
    <form name="edit_package" id="edit_package" method="post" enctype="multipart/form-data">      
        <div class="text_field"><label>Package Name:</label><input class="inputbox" type="text" name="package_name" id="package_name" value="<?php echo $packageRow['package_name'];?>"/></div>
        <div class="text_field"><label>Description:</label><textarea class="inputbox" name="description" id="description"><?php echo $packageRow['package_description'];?></textarea></div>
        <div class="text_field"><label>Subscription Period:</label><input type="text" class="inputbox" name="subscription_period" id="subscription_period" value="<?php echo $packageRow['subscription_period'];?>"/></div>         
        <div class="text_field"><label>Price:</label><input type="text" class="inputbox" name="price" id="price" value="<?php echo $packageRow['price'];?>"/></div>
        <div class="channel_list1">
        <div class="channel_list inputbox" style="clear:left;overflow-y: scroll;height:300px;width:300px;">
            <?php
            if(!empty($remainArr)){
                foreach($remainArr as $channel){
                    ?>
            <div class="add-ch <?php echo $channel['channel_id'];?>" onClick="add_ch('<?php echo $channel['channel_id'];?>')">
                <img src="<?php echo base_url();?>images/channel/thumb/<?php echo $channel['image'];?>" /><label><?php echo $channel['name'];?></label>
            </div>            
            <?php
                }
            }
            ?>
            
        </div>
         <input class="clearboth btnalt btnalt1 " style="display:block" type="button" value="Add" onClick="add_channel();"/>
       </div>
         <div class="channel_list1">
        <div class="sel_list channel_list inputbox" style="overflow-y: scroll;height:300px;width:300px">
            <?php
            if(!empty($addedArr)){
                foreach($addedArr as $channel){
                    ?>
            <div class="rem-ch <?php echo $channel['channel_id'];?>" onClick="rem_ch('<?php echo $channel['channel_id'];?>')">
                <img src="<?php echo base_url();?>images/channel/thumb/<?php echo $channel['image'];?>" /><label><?php echo $channel['name'];?></label>
            </div>            
            <?php
                }
            }
            ?>
        </div>   
           <input class="clearboth btnalt btnalt1 " style="display:block"  type="button" value="Remove" onClick="rem_channel();"/>
         </div>      
        <div class="text_field"><label>&nbsp;</label><input class="btnalt " type="submit" name="submit" value="Edi Package" /></div>
    </form>
</div>
    
</body>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#edit_package').validate({
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
var add_list = Array();
var rem_list = Array();
function add_ch(ch_id){
    pos = in_array(add_list,ch_id);
    if(pos<0){
        add_list.push(ch_id);
        $('.channel_list .'+ch_id).addClass('border');
    }else{
        $('.channel_list .'+ch_id).removeClass('border');        
        add_list.splice(pos,1);
        //alert('rem'+add_list);
    }
}

function rem_ch(ch_id){
    pos = in_array(rem_list,ch_id);
    if(pos<0){
        rem_list.push(ch_id);
        $('.sel_list .'+ch_id).addClass('border');        
        //alert(rem_list);        
    }else{
        $('.sel_list .'+ch_id).removeClass('border');          
        rem_list.splice(pos,1);
    }    
}

function in_array(arr, val){
    for(var i=0; i<arr.length; i++) {
        if (arr[i] == val) {         
            //alert(i);
            return i;
        }
    } 
    return -1;
}

function add_channel(){
    $.ajax({
        url:"<?php echo base_url();?>admin_ajax/add_channel",
        data:{ch_arr:add_list,package_id:<?php echo $packageRow['package_id'];?>},
        type:"post",
        success:function(msg){
            if(msg!='fail'){
                for(var j=0;j<=add_list.length-1;j++){
                    $('.channel_list .'+add_list[j]).remove();
                }
                add_list = [];
                $(msg).appendTo('.sel_list');
            }
        }
    })
}
function rem_channel(){
    $.ajax({
        url:"<?php echo base_url();?>admin_ajax/rem_channel",
        data:{ch_arr:rem_list,package_id:<?php echo $packageRow['package_id'];?>},
        type:"post",
        success:function(msg){
            if(msg!='fail'){
                for(var j=0;j<=rem_list.length-1;j++){
                    $('.sel_list .'+rem_list[j]).remove();
                }
                rem_list = [];
                $(msg).appendTo('.channel_list');
            }
        }
    })
}
</script>
</html>
