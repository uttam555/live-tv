<link rel="stylesheet" href="<?php echo base_url();?>css/page.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?php echo base_url();?>css/fader.css" type="text/css" media="screen" />
<script src="<?php echo base_url();?>js/jquery.anythingfader.js" type="text/javascript" charset="utf-8"></script> 
 
<script type="text/javascript"> 

    function formatText(index, panel) {
              return index + "";
        }

    $(function () {

        $('.anythingFader').anythingFader({
            autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
            delay: 5000,                    // How long between slide transitions in AutoPlay mode
            startStopped: false,            // If autoPlay is on, this can force it to start stopped
            animationTime: 500,				// How long the slide transition takes
                            buildArrows : true,
                            forwardText : "&amp;raquo;", // Link text used to move the slider forward (hidden by CSS, replaced with arrow image)
                             backText : "&amp;laquo;",
            hashTags: true,                 // Should links change the hashtag in the URL?
            //buildNavigation: false,          // If true, builds and list of anchor links to link to each slide
            pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
            //startText: "Play",                // Start text
            //stopText: "Stop",               // Stop text
            navigationFormatter: formatText   // Details at the top of the file on this use (advanced use)
        });

        $("#slide-jump").click(function(){
            $('.anythingFader').anythingFader(6);
        });

    });
</script>

<div id="slider">
    <div id="page-wrap"> 
        <div class="anythingFader"> 
        
          <div class="slidewrapper"> 
            <ul>
               <?php
               if(!empty($bannerArr)){
                   foreach($bannerArr as $banner){
                       ?>
               <li><img src="<?php echo base_url();?>images/banner/<?php echo $banner['image'];?>" alt="" /></li>                 
                <?php
                   }
               }
               ?>      
            </ul>        
          </div> 
        </div> <!-- END AnythingFader --> 
    </div>
</div>