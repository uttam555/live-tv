<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo SITE_NAME;?> | Contact Us</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/import.css" /> 
</head>
<body>
<div class="wrapper">    
<?php $this->load->view('boxes/header');?>
	<div class="container">
    	<div class="left_part"> 
           <?php $this->load->view('boxes/slider'); ?>
        <div class="device_list">  
        <h1>Contact Us</h1> 
        <div class="device_content">
            <span class="error_note"><?php echo $this->common->getMsg('contact');?></span>
         <form name="contact" action="" method="post" id="contact">
         	<ul class="contact_field">
           
            	<li><label>Full Name *:</label>
                <input type="text" id="fullname" name="fullname" />
                </li>
                <li><label>Contact Number *:</label>
                <input type="text" id="number" name="number" />
                </li>
                 <li><label>Email ID *:</label>
                <input type="text" id="email" name="email" />
                </li>
                <li><label>Country *:</label>
                <select id="country" name="country">
	<option value="">-- select ---</option>
	<option value="Afghanistan">Afghanistan</option>
	<option value="Albania">Albania</option>
	<option value="Algeria">Algeria</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antarctica">Antarctica</option>
	<option value="Antigua and Barbuda">Antigua and Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Armenia">Armenia</option>
	<option value="Aruba">Aruba</option>
	<option value="Ascension Island">Ascension Island</option>
	<option value="Australia">Australia</option>
	<option value="Austria">Austria</option>
	<option value="Azerbaijan">Azerbaijan</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrain">Bahrain</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belarus">Belarus</option>
	<option value="Belgium">Belgium</option>
	<option value="Belize">Belize</option>
	<option value="Benin">Benin</option>
	<option value="Bermuda">Bermuda</option>
	<option value="Bhutan">Bhutan</option>
	<option value="Bolivia">Bolivia</option>
	<option value="Bophuthatswana">Bophuthatswana</option>
	<option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
	<option value="Botswana">Botswana</option>
	<option value="Bouvet Island">Bouvet Island</option>
	<option value="Brazil">Brazil</option>
	<option value="British Indian Ocean">British Indian Ocean</option>
	<option value="British Virgin Islands">British Virgin Islands</option>
	<option value="Bulgaria">Bulgaria</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="Cambodia">Cambodia</option>
	<option value="Cameroon">Cameroon</option>
	<option value="Canada">Canada</option>
	<option value="Cape Verde Island">Cape Verde Island</option>
	<option value="Cayman Islands">Cayman Islands</option>
	<option value="Central Africa">Central Africa</option>
	<option value="Chad">Chad</option>
	<option value="Channel Islands">Channel Islands</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Christmas Island">Christmas Island</option>
	<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
	<option value="Colombia">Colombia</option>
	<option value="Comoros Islands">Comoros Islands</option>
	<option value="Congo">Congo</option>
	<option value="Cook Islands">Cook Islands</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Croatia">Croatia</option>
	<option value="Cuba">Cuba</option>
	<option value="Cyprus">Cyprus</option>
	<option value="Czech Republic">Czech Republic</option>
	<option value="Denmark">Denmark</option>
	<option value="Djibouti">Djibouti</option>
	<option value="Dominica">Dominica</option>
	<option value="Dominican Republic">Dominican Republic</option>
	<option value="Easter Island">Easter Island</option>
	<option value="Ecuador">Ecuador</option>
	<option value="Egypt">Egypt</option>
	<option value="El Salvador">El Salvador</option>
	<option value="England">England</option>
	<option value="Equatorial Guinea">Equatorial Guinea</option>
	<option value="Estonia">Estonia</option>
	<option value="Ethiopia">Ethiopia</option>
	<option value="Faeroe Islands">Faeroe Islands</option>
	<option value="Falkland Islands">Falkland Islands</option>
	<option value="Fiji">Fiji</option>
	<option value="Finland">Finland</option>
	<option value="France">France</option>
	<option value="French Guyana">French Guyana</option>
	<option value="French Polynesia">French Polynesia</option>
	<option value="Gabon">Gabon</option>
	<option value="Gambia">Gambia</option>
	<option value="Georgia Republic">Georgia Republic</option>
	<option value="Germany">Germany</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Greece">Greece</option>
	<option value="Greenland">Greenland</option>
	<option value="Grenada">Grenada</option>
	<option value="Guadeloupe (French)">Guadeloupe (French)</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernsey Island">Guernsey Island</option>
	<option value="Guinea">Guinea</option>
	<option value="Guinea Bissau">Guinea Bissau</option>
	<option value="Guyana">Guyana</option>
	<option value="Haiti">Haiti</option>
	<option value="Heard and McDonald Isls">Heard and McDonald Isls</option>
	<option value="Honduras">Honduras</option>
	<option value="Hong Kong">Hong Kong</option>
	<option value="Hungary">Hungary</option>
	<option value="Iceland">Iceland</option>
	<option value="India">India</option>
	<option value="Indonesia">Indonesia</option>
	<option value="Iran">Iran</option>
	<option value="Iraq">Iraq</option>
	<option value="Ireland">Ireland</option>
	<option value="Isle of Man">Isle of Man</option>
	<option value="Israel">Israel</option>
	<option value="Italy">Italy</option>
	<option value="Ivory Coast">Ivory Coast</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Japan">Japan</option>
	<option value="Jersey Island">Jersey Island</option>
	<option value="Jordan">Jordan</option>
	<option value="Kazakhstan">Kazakhstan</option>
	<option value="Kenya">Kenya</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Laos">Laos</option>
	<option value="Latvia">Latvia</option>
	<option value="Lebanon">Lebanon</option>
	<option value="Lesotho">Lesotho</option>
	<option value="Liberia">Liberia</option>
	<option value="Libya">Libya</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Lithuania">Lithuania</option>
	<option value="Luxembourg">Luxembourg</option>
	<option value="Macao">Macao</option>
	<option value="Macedonia">Macedonia</option>
	<option value="Madagascar">Madagascar</option>
	<option value="Malawi">Malawi</option>
	<option value="Malaysia">Malaysia</option>
	<option value="Maldives">Maldives</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Martinique (French)">Martinique (French)</option>
	<option value="Mauritania">Mauritania</option>
	<option value="Mauritius">Mauritius</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Mexico">Mexico</option>
	<option value="Micronesia">Micronesia</option>
	<option value="Moldavia">Moldavia</option>
	<option value="Monaco">Monaco</option>
	<option value="Mongolia">Mongolia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Morocco">Morocco</option>
	<option value="Mozambique">Mozambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="Namibia">Namibia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Netherlands">Netherlands</option>
	<option value="Netherlands Antilles">Netherlands Antilles</option>
	<option value="New Caledonia">New Caledonia</option>
	<option value="New Zealand">New Zealand</option>
	<option value="Nicaragua">Nicaragua</option>
	<option value="Niger">Niger</option>
	<option value="Niue">Niue</option>
	<option value="Norfolk Island">Norfolk Island</option>
	<option value="North Korea">North Korea</option>
	<option value="Northern Ireland">Northern Ireland</option>
	<option value="Norway">Norway</option>
	<option value="Oman">Oman</option>
	<option value="Pakistan">Pakistan</option>
	<option value="Panama">Panama</option>
	<option value="Papua New Guinea">Papua New Guinea</option>
	<option value="Paraguay">Paraguay</option>
	<option value="Peru">Peru</option>
	<option value="Philippines">Philippines</option>
	<option value="Pitcairn Island">Pitcairn Island</option>
	<option value="Poland">Poland</option>
	<option value="Polynesia (French)">Polynesia (French)</option>
	<option value="Portugal">Portugal</option>
	<option value="Puerto Rico">Puerto Rico</option>
	<option value="Qatar">Qatar</option>
	<option value="Reunion Island">Reunion Island</option>
	<option value="Romania">Romania</option>
	<option value="Rwanda">Rwanda</option>
	<option value="S.Georgia Sandwich Isls">S.Georgia Sandwich Isls</option>
	<option value="San Marino">San Marino</option>
	<option value="Sao Tome, Principe">Sao Tome, Principe</option>
	<option value="Saudi Arabia">Saudi Arabia</option>
	<option value="Scotland">Scotland</option>
	<option value="Senegal">Senegal</option>
	<option value="Serbia">Serbia</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Shetland">Shetland</option>
	<option value="Sierra Leone">Sierra Leone</option>
	<option value="Singapore">Singapore</option>
	<option value="Slovak Republic">Slovak Republic</option>
	<option value="Slovenia">Slovenia</option>
	<option value="Solomon Islands">Solomon Islands</option>
	<option value="Somalia">Somalia</option>
	<option value="South Africa">South Africa</option>
	<option value="Republic of Korea ">Republic of Korea </option>
	<option value="Spain">Spain</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="St. Helena">St. Helena</option>
	<option value="St. Kitts Nevis Anguilla">St. Kitts Nevis Anguilla</option>
	<option value="St. Lucia">St. Lucia</option>
	<option value="St. Martins">St. Martins</option>
	<option value="St. Pierre Miquelon">St. Pierre Miquelon</option>
	<option value="St. Vincent Grenadines">St. Vincent Grenadines</option>
	<option value="Sudan">Sudan</option>
	<option value="Suriname">Suriname</option>
	<option value="Svalbard Jan Mayen">Svalbard Jan Mayen</option>
	<option value="Swaziland">Swaziland</option>
	<option value="Sweden">Sweden</option>
	<option value="Switzerland">Switzerland</option>
	<option value="Syria">Syria</option>
	<option value="Tahiti">Tahiti</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tajikistan">Tajikistan</option>
	<option value="Tanzania">Tanzania</option>
	<option value="Thailand">Thailand</option>
	<option value="Togo">Togo</option>
	<option value="Tokelau">Tokelau</option>
	<option value="Tonga">Tonga</option>
	<option value="Trinidad and Tobago">Trinidad and Tobago</option>
	<option value="Tunisia">Tunisia</option>
	<option value="Turkmenistan">Turkmenistan</option>
	<option value="Turks and Caicos Isls">Turks and Caicos Isls</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Uganda">Uganda</option>
	<option value="Ukraine">Ukraine</option>
	<option value="United Arab Emirates">United Arab Emirates</option>
	<option value="United Kingdom">United Kingdom</option>
	<option value="United States">United States</option>
	<option value="Uruguay">Uruguay</option>
	<option value="Uzbekistan">Uzbekistan</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Vatican City State">Vatican City State</option>
	<option value="Venezuela">Venezuela</option>
	<option value="Vietnam">Vietnam</option>
	<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
	<option value="Wales">Wales</option>
	<option value="Wallis Futuna Islands">Wallis Futuna Islands</option>
	<option value="Western Sahara">Western Sahara</option>
	<option value="Western Samoa">Western Samoa</option>
	<option value="Yemen">Yemen</option>
	<option value="Zambia">Zambia</option>
	<option value="Zimbabwe">Zimbabwe</option>
	<option value="Nigeria">Nigeria</option>
	<option value="Turkey">Turkey</option>
	<option value="US Virgin Islands">US Virgin Islands</option>

</select>
                </li>
                <li><label>Topic of inquiry *:</label>
               <select name="topic" id="topic">
	<option value="">-- select ---</option>
	<option value="My Order">My Order</option>
	<option value="Subscription &amp; Billing">Subscription &amp; Billing</option>
	<option value="Sales">Sales</option>
	<option value="PC-Viewing Tech">PC-Viewing Tech</option>
	<option value="TV-Box Tech">TV-Box Tech</option>
	<option value="Other">Other</option>

</select>
                </li>
                <li><label>Inquiry Description *:</label>
                <textarea name="inquiry" id="inquiry"></textarea>
                </li>
                <li class="clearboth">
                <input class="log_btn" type="submit" value="Submit" name="submit" /></li>
            </ul>
            </form>
            </div>
        </div>
        </div>
         <?php 
         if($is_login<=0){
             $this->load->view('boxes/right_part');
         }else{
             $this->load->view('boxes/right_log');             
         }
         ?>
        </div>
<?php $this->load->view('boxes/footer');?>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.pack.js"></script>
<script type="text/javascript">
$('#contact').validate({
    errorElement:"span",
    errorClass:"error_note",
    rules:{
        fullname:{required:true},
        number:{required:true},
        email:{required:true,email:true},
        country:{required:true},
        topic:{required:true},
        inquiry:{required:true,minlength:50}
    },
    messages:{
        fullname:{required:"Enter fullname"},
        number:{required:"Enter your contact number"},
        email:{required:"Enter email address",email:"Enter valid email"},        
        country:{required:"Select your country"},
        topic:{required:"Select topic"},        
        inquiry:{required:"Enter your inquiry",minlength:"Enter atleast 50 characters"}        
    }
});
</script>
</div>
</body>
</html>
