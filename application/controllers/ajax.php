<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function serialize(){
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $address1 = $this->input->post('address1');
        $city = $this->input->post('city');
        $country = $this->input->post('country');
        $address2 = $this->input->post('address2');
        $package_id = $this->input->post('package_id');
        $device_id = $this->input->post('device_id');

        $arr = array('user_id'=>$this->session->userdata('user_id'),'b_fullname'=>$fullname,'b_email'=>$email,'b_phone'=>$phone,'b_address1'=>$address1,'b_address2'=>$address1,'b_city'=>$city,'b_country'=>$country,'b_package_id'=>$package_id,'b_device_id'=>$device_id);
        $rs = $this->db->insert('tbl_transaction',$arr);
        echo $this->db->insert_id();
    }
       
    function _is_admin(){
        if($this->session->userdata('admin_id')!='') return TRUE;
        else return FALSE; 
    }
}