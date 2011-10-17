<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>

<body>
	<div class="wrapper">
    	
        <?php $this->load->view('boxes/header'); ?>
   
	<div class="container">
    	<div class="left_part">
         <?php $this->load->view('boxes/slider'); ?>
        	
            <div id="channel_tab">
            	 <ul class='tabs'>
        <li class="first_tab"><a href='#tab1'>Indian Channels</a></li>
        <li class="second_tab"><a href='#tab2'>Nepali Channels</a></li>
         <li class="third_tab"><a href='#tab3'>Pakistani Channels</a></li>        
    </ul>
            <div class="tab_container">
    <div class="tab_content" id="tab1" style="display: block;">
    		<ul>
                    <?php
                    if(!empty($indianArr)){
                        foreach($indianArr as $indian){
                            ?>
                    <li><img src="<?php echo base_url();?>images/channel/thumb/<?php echo $indian['image'];?>" alt="<?php echo htmlentities($indian['name']);?>"/></li>
                        <?php
                        }
                    }
                    ?>                        
            </ul>
    </div>
     <div class="tab_content" id="tab2" style="display: block;">
    		<ul>
                <?php
                if(!empty($nepaliArr)){
                    foreach($nepaliArr as $nepali){
                        ?>
                    <li><img src="<?php echo base_url();?>images/channel/thumb/<?php echo $nepali['image'];?>" alt="<?php echo htmlentities($nepali['name']);?>"/></li>
                    <?php
                    }
                }
                ?>                        
            </ul>
    </div>
     <div class="tab_content" id="tab3" style="display: block;">
    		<ul>
                <?php
                if(!empty($pakistaniArr)){
                    foreach($pakistaniArr as $pakistani){
                        ?>
                    <li><img src="<?php echo base_url();?>images/channel/thumb/<?php echo $pakistani['image'];?>" alt="<?php echo htmlentities($pakistani['name']);?>"/></li>
                    <?php
                    }
                }
                ?>                      
            </ul>
    </div>
    </div>
            
            </div>
        </div>
        <?php
        //edit_profile();die;
        if($this->session->userdata('user_id')==''){
            $this->load->view('boxes/right_part');
        }else{
            $this->load->view('boxes/right_log');
        }
        ?>
    </div>
    
     <?php $this->load->view('boxes/footer'); ?>
     </div>
     <script type="text/javascript">
$(document).ready(function() {
    //Default Action
    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("active").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content

    //On Click Event
    $("ul.tabs li").click(function() {
        $("ul.tabs li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });
});
</script>
</body>
</html>
