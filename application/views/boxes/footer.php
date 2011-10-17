<div id="footer">
    <div class="weaccept">
    <a href="#"><img src="<?php echo base_url();?>images/paypal.png"  alt="Paypal"/></a>
    </div>
    <div class="copy_info">
    <p>Copyrights @ 2011 Home Live TV. All Rights Reserved.  <a href="<?php echo base_url();?>">Home</a><span>|</span><a href="<?php echo base_url();?>contact">Contact</a><span>|</span><a href="#">Terms & Conditions</a><span>|</span><a href="#">Privacy Policy</a></p>
    <p>Powered By : <a href="http://www.sabaiko.com/">Sabaiko Technologies</a></p>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#login_form').validate({
    rules:{
        email:{required:true,email:true},
        password:{required:true,minlength:6}
    },
    messages:{
        email:{required:"Enter your email",email:"Enter valid email"},
        password:{required:"Enter your password",minlength:"Enter atleast 6 characters"}
    }
})    
</script>