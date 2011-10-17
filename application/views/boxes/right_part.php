<div class="right_part">
        	<div class="log_box">
            <form action="<?php echo base_url();?>my_account" method="post" name="login_form" id="login_form">
            	<h1>Member Login</h1>
                    <label><?php echo $this->common->getMsg('home');?></label>                
                <ul>
                    <li>
                        <label>Email:</label>
                    	<input type="text" value="" name="email" id="email"  />
                    </li>
                    <li>
                    	<label>Password:</label>
                    	<input type="password" value="" name="password" id="password" />
                    </li>
                    <li>
                    	<input type="submit" class="log_btn" value="Login" name="submit" />
                    </li>
                    <li><p><a href="<?php echo base_url();?>forgot_password">Forgot Your Password?</a></p></li>
                </ul>
                </form>
            </div>
            <div class="right_box">
           	<div class="sign_up_bg">
            <div class="sign_up">
            	<img src="<?php base_url();?>images/sign_up.png" />
                	<h2><a href="<?php echo base_url();?>sign_up">Sign me Up</a></h2>
                    <p>Create New Account And 
Connect with Our Service.</p>
               
            </div>
            </div>
            <div class="online_bg">
            <div class="online">
            <img src="<?php base_url();?>images/live_suooprt_online.gif" />
            	<h2><a href="#">Live Support</a></h2>
                <p>Live Support is Onine
Click here to contact with us</p>
          
            </div>
           </div>
            </div>
        </div>