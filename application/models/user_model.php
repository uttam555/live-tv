<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }

    function checkAdmin($username, $password){
        $query = $this->db->get("tbl_admin");
        $res = $query->row_array();
        
        if($username == $res['username'] && md5($password) == $res['password']){
            $this->session->set_userdata('admin_id',$res['admin_id']);
            return TRUE;
        }
            return FALSE;
    }
    
    function login_user($username, $password){
        $userArr = $this->db->get("tbl_user")->result_array();

        foreach($userArr as $user){
            if($user['email'] == $username && $user['password'] == md5($password)){
                $this->session->set_userdata('user_id',$user['user_id']);
                $this->session->set_userdata('email',$user['email']);
                $this->session->set_userdata('fullname',ucwords($user['firstname'].' '.$user['lastname']));

                return TRUE;
            }
        }
        $this->common->setMsg('home','Incorrect username and password');
	return FALSE;             
    }

    function register_user(){
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $gender = $this->input->post('for_gender');
        $homeno = $this->input->post('homeno');
        $mobileno = $this->input->post('mobileno');
        $dob = $this->input->post('dob');
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirmpassword');
        $device_code = $this->input->post('device_code');
        $address=$this->input->post('address');
        $city=$this->input->post('city');
        $country=$this->input->post('country');
        
        if($password!='' && $password!=$confirm){
            $this->common->setMsg('sign_up','Password did not match');
            return FALSE;
        }
        elseif(!$firstname || !$lastname || !$email || !$homeno || !$device_code){
            $this->common->setMsg('sign_up','Missing some values');
            return FALSE;
        }
        $rs = $this->db->query("SELECT * FROM tbl_user WHERE email='".$email."'")->row_array();
        if(!empty($rs)){
            $this->common->setMsg('sign_up','User already exists');
            return FALSE;            
        }
        
        $code = random_string('alpha',6);
        $arr = array(
                    'firstname' => $firstname,
                    'lastname'=>$lastname,
                    'email'=>$email,
                    'gender'=>$gender,
                    'dob'=>$dob,
                    'home_no'=>$homeno,
                    'mobile_no'=>$mobileno,
                    'password'=>md5($password),
                    'device_code'=>$device_code,
                    'address'=>$address,
                    'city'=>$city,
                    'country'=>$country,
                    'activation_code'=>$code,
                    'reg_date'=>date('Y-m-d')
                    );
        $stat = $this->db->insert('tbl_user',$arr);
        if(!empty($stat)) {
            $this->common->setMsg('sign_up','Thank you for registration.');
            return TRUE;
        }
    }
    
    function change_password($user_id){
        $oldpass = $this->input->post('old_password');
        $pass = $this->input->post('password');
        $confirmpass = $this->input->post('confirmpassword');
        if(!$pass && $pass!=$confirmpass){
            $this->common->setMsg('change_password','Password did not match');
            return FALSE;
        }
        $rs = $this->db->query("SELECT * FROM tbl_user WHERE user_id='".$user_id."' AND password='".md5($oldpass)."'")->row_array();

        if(empty($rs)){
            $this->common->setMsg('change_password','Incorrect old password');
            return FALSE; 
        }
        $stat = $this->db->update('tbl_user',array('password'=>md5($pass)),array('user_id'=>$user_id));
        if(!empty($stat)){
            $this->common->setMsg('change_password','Password changed successfully');
        } 
    }
    
    function edit_profile($user_id){
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $gender = $this->input->post('for_gender');
        $homeno = $this->input->post('homeno');
        $mobileno = $this->input->post('mobileno');
        $dob = $this->input->post('dob');
        $address=$this->input->post('address');
        $city=$this->input->post('city');
        $country=$this->input->post('country');
        
        if(!$firstname || !$lastname || !$email || !$homeno){
            $this->common->setMsg('edit_profile','Missing some values');
            return FALSE;
        }
        $arr = array(
                    'firstname' => $firstname,
                    'lastname'=>$lastname,
                    'email'=>$email,
                    'gender'=>$gender,
                    'dob'=>$dob,
                    'home_no'=>$homeno,
                    'mobile_no'=>$mobileno,            
                    'address'=>$address,
                    'city'=>$city,
                    'country'=>$country,            
                    );
        $stat = $this->db->update('tbl_user',$arr,array('user_id'=>$user_id));
        if(!empty($stat)){
            $this->common->setMsg('edit_profile','Edited successfully');
            return TRUE;
        }
    }
    
    function getTransactions($user_id){
        $rs = $this->db->query("SELECT a.*,b.*,c.user_id,c.device_code FROM tbl_transaction AS a LEFT JOIN tbl_package AS b ON a.b_package_id=b.package_id LEFT JOIN tbl_user AS c ON a.user_id=c.user_id WHERE a.user_id='".$user_id."' LIMIT 0,1")->result_array();
        return $rs;
    }
    
    function forgot_password($email){
        $user = $this->db->query("SELECT * FROM tbl_user WHERE email='".$email."'")->row_array();
        if(empty($user)){
            $this->common->setMsg('forgot_password','No user exists with this email');
            return FALSE;
        }else{
            
            //$this->email->from('no-reply@nepbay.com', 'NepBay');
            //$this->email->to($email,'User');

            $subject='Password reset';
            $message='<p>Hello, '.$email.'</p><p>You have requested for password reset at '.base_url().'</p><p>Click on the link below to reset password.</p><p><a href="'.base_url().'reset_password/'.$user['user_id'].'/'.$user['activation_code'].'">'.base_url().'reset_password/'.$user['user_id'].'/'.$user['activation_code'].'</a></p>';
            $stat = $this->common->sendEmail($email,array(ADMIN_EMAIL=>ADMIN_NAME),$subject,$message,'');
            if(!empty($stat)){
                $this->common->setMsg('forgot_password','Check your email address to reset password');
                return FALSE;                
            }
        }
    }
    
    function checkUser($user_id,$code){
        $user = $this->db->query("SELECT * FROM tbl_user WHERE user_id='".$user_id."' AND activation_code='".$code."'")->row_array();
        if(!empty($user)) return TRUE;
        else return FALSE;
    }
    
    function reset_password($user_id,$newpassword,$confirmpassword){

        if($newpassword=='' || $newpassword!=$confirmpassword || $confirmpassword==''){
            $this->common->setMsg('reset_password','Password did not match');
            return FALSE;
        }
        
        $stat = $this->db->update('tbl_user',array('password'=>md5($newpassword)),array('user_id'=>$user_id));
        if(!empty($stat)){
            $this->common->setMsg('reset_password','Password changed successfully');
            return TRUE;
        }
    }
    
    function contact(){
        $fullname = $this->input->post('fullname');
        $number = $this->input->post('number');
        $country = $this->input->post('country');
        $topic = $this->input->post('topic');
        $inquiry = $this->input->post('inquiry');
        $email = $this->input->post('email');
        $subject = "You have an inquiry";
        $message = "<p>Hello, ".ADMIN_NAME."</p><p>Here is the details of the inquiry.</p><table><tr><td>Fullname:</td><td>".$fullname."</td></tr><tr><td>Email:</td><td>".$email."</td></tr><tr><td>Contact Number:</td><td>".$number."</td></tr><tr><td>Country:</td><td>".$country."</td></tr><tr><td>Topic:</td><td>".$topic."</td></tr><tr><td>Inquiry:</td><td>".$inquiry."</td></tr></table>";
        $rs = $this->common->sendEmail(array(ADMIN_EMAIL=>ADMIN_NAME),array(ADMIN_EMAIL=>ADMIN_NAME),$subject,$message,'');
        $this->common->setMsg('contact','Thanks for the inquiry.');
    }
    
    function list_user($limit, $offset){
        $rs = $this->db->query("SELECT * FROM tbl_user ORDER BY user_id DESC LIMIT $limit,$offset")->result_array();            
        return $rs;        
    }
    
    function list_order($limit,$offset){
        $rs = $this->db->query("SELECT * FROM tbl_transaction AS a LEFT JOIN tbl_user AS b ON a.user_id=b.user_id ORDER BY a.transaction_id DESC LIMIT $limit,$offset")->result_array();            
        return $rs;        
    }
    
    function getCountries(){
        $rs = $this->db->query("SELECT * FROM countries")->result_array();
        return $rs;
    }
    
    function getExpiryDate($user_id){
        $rs = $this->db->query("SELECT * FROM tbl_transaction AS a LEFT JOIN tbl_package AS b ON b.package_id=a.b_package_id WHERE a.status='Completed' AND user_id='".$user_id."' ORDER BY transaction_id DESC LIMIT 0,1")->row_array();
        $sdate = strtotime($rs['date'])+$rs['subscription_period']*30*24*60*60;
        //echo time();die;
        $remDate = $sdate-time();
        $remDate = floor($remDate/(60*60*24));

        if($remDate<=0) $result = "Package expired";
        elseif($remDate==1) $result = "1 Day left";
        else{
            $result = $remDate." Days left";
        }
        return $result;
        //$days=
    }
}

