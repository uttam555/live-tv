<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    
    function index(){
        //$this->load->model('channel_model');
        $data['pcode'] = 1;        
        if($this->input->post('submit')){
            
        }else{

            $this->load->model('banner_model');
            $data['bannerArr'] = $this->banner_model->list_banner();
            $data['indianArr'] = $this->common->getArrayById('tbl_channel', 'cat_id', '4');
            $data['nepaliArr'] = $this->common->getArrayById('tbl_channel', 'cat_id', '5');
            $data['pakistaniArr'] = $this->common->getArrayById('tbl_channel', 'cat_id', '6');
            $this->load->view('index',$data);
        }
    }
    
    function packages(){
        $data['pcode'] = 2;
        $data['is_login'] = $this->_is_logged_in();        
        $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner();
        
        if($this->input->post('package_name')){
            $data['countryArr'] = $this->common->getcountry();
            if(!$this->_is_logged_in()){
                $this->common->setMsg('home','You need to login to view this page');
                redirect();
            }else{
                $data['package_id'] = $this->input->post('package_name');
                $data['packageRow'] = $this->common->getRowById('tbl_package', 'package_id', $this->input->post('package_name'));
                $this->load->view('billing_info',$data);
            }
        }else{
            $this->load->model('channel_model');
        
            $this->load->model('package_model');
            //$this->load->model('channel_model');   
            //$data['channelArr'] = $this->channel_model->get_channel();
            $data['packageArr'] = $this->package_model->list_package();
            $this->load->view('package',$data);            
        }
    }
    
    function billing_info(){
        $data['pcode'] = 2;
        $data['is_login'] = $this->_is_logged_in();        
        $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner();
        
        if($this->input->post('package_name')){
            if(!$this->_is_logged_in()){               
                $this->common->setMsg('home','You need to login to view this page');
                redirect();
            }else{
                $data['countryArr'] = $this->common->getcountry();                 
                $data['package_id'] = $this->input->post('package_name');
                $data['item_name'] = $this->input->post('item_name');
                $data['price'] = $this->input->post('item_price');                
                //$data['itemRow'] = $this->common->getRowById('tbl_package', 'package_id', $this->input->post('package_name'));
                $this->load->view('billing_info',$data);
            }
        }elseif($this->input->post('device_name')){
            $data['countryArr'] = $this->common->getcountry();                
            $data['device_id'] = $this->input->post('device_name');
            $data['item_name'] = $this->input->post('item_name');
            $data['price'] = $this->input->post('item_price');
            //$data['itemRow'] = $this->common->getRowById('tbl_package', 'package_id', $this->input->post('device_name'));
            $this->load->view('billing_info',$data);        
        }   
    }
    
    function devices(){
        $data['pcode'] = 5; 
        $data['is_login'] = $this->_is_logged_in();        
        $this->load->model('device_model');
        $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner();        
        $data['deviceArr'] = $this->device_model->list_device();
        $this->load->view('devices',$data);
    }
    
    function my_account(){
        $data['pcode'] = 3;        
        if($this->input->post('submit')){
            if($this->user_model->login_user($this->input->post('email'),$this->input->post('password'))){
                $data['expirydate'] = $this->user_model->getExpiryDate($this->session->userdata('user_id'));                
                $data['userRow'] = $this->common->getRowById('tbl_user', 'user_id', $this->session->userdata('user_id'));
                $this->load->view('my_account',$data);
            }else{
                redirect();
            }
        }else{
            if(!$this->_is_logged_in()){
                $this->common->setMsg('home','You need to login to view this page');
                redirect('home');
            }else{
                $data['expirydate'] = $this->user_model->getExpiryDate($this->session->userdata('user_id'));
                //print_r($data['expirydate']);die;
                $data['userRow'] = $this->common->getRowById('tbl_user', 'user_id', $this->session->userdata('user_id'));
                $this->load->view('my_account',$data);
            }
        }
    }
    
    function sign_up(){
        $data['pcode'] = 0;
        if($this->input->post('register')){
            $this->user_model->register_user();
            $data['countryArr'] = $this->user_model->getCountries();
            $this->load->model('banner_model');
            $data['bannerArr'] = $this->banner_model->list_banner();         
            $this->load->view('signup',$data);            
        }else{
            $data['countryArr'] = $this->user_model->getCountries();            
            $this->load->model('banner_model');
            $data['bannerArr'] = $this->banner_model->list_banner();         
            $this->load->view('signup',$data);            
        }
    }
    
    function change_password(){
        if(!$this->_is_logged_in()) redirect('home');
        $data['pcode'] = 3;
        if($this->input->post('change')){
            $this->user_model->change_password($this->session->userdata('user_id'));
            $this->load->view('change_password',$data);
        }else{
            $this->load->view('change_password',$data);            
        }
    }
    
    function forgot_password(){
        $data['pcode'] = 0;
        $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner();
        if($this->input->post('submit')){
            $this->load->model('user_model');
            $this->user_model->forgot_password($this->input->post('email'));
            $this->load->view('forgot_password',$data);
        }else{
            $this->load->view('forgot_password',$data);
        }
    }
    
    function reset_password($user_id,$code){
        $data['pcode'] = 0;
        $this->load->model('user_model');
        $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner();         
        if($this->user_model->checkUser($user_id,$code)){
            if($this->input->post('change')){
                $this->user_model->reset_password($user_id,$this->input->post('new_password'),$this->input->post('confirmpassword'));
                $this->load->view('reset_password',$data);
            }else{
                $this->load->view('reset_password',$data);                
            }
        }else{
            $data['msg'] = 'Incorrect activation code for the user';
            $this->load->view('reset_password',$data);
        }
        
    }
    
    function edit_profile(){
        $data['pcode'] = 3;
            $data['countryArr'] = $this->user_model->getCountries();         
        if($this->input->post('submit')){
            $this->load->model('user_model');
            $this->user_model->edit_profile($this->session->userdata('user_id'));
            $data['userRow'] = $this->common->getRowById('tbl_user', 'user_id', $this->session->userdata('user_id'));
            $this->load->view('edit_profile',$data);
        }else{
            $data['userRow'] = $this->common->getRowById('tbl_user', 'user_id', $this->session->userdata('user_id'));
            $this->load->view('edit_profile',$data);            
        }
    }
    
    function transactions(){
        if(!$this->_is_logged_in()) redirect('home');        
        $data['pcode'] = 3;
        $data['expirydate'] = $this->user_model->getExpiryDate($this->session->userdata('user_id'));
        $data['tranArr'] = $this->user_model->getTransactions($this->session->userdata('user_id'));
        $this->load->view('transactions',$data);        
    }
    
    function payment(){
        $this->load->model('payment_model');
        $this->payment_model->paypal_ipn();
        //$this->load->view('payment');
    }
    
    function vod(){
        $data['pcode'] = 4;
               $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner();
        $data['is_login'] = $this->_is_logged_in();
        $this->load->model('video_model');
        $data['vodArr'] = $this->video_model->list_vod();        
        $this->load->view('vod',$data);
    }
    
    function contact(){
        $data['pcode'] = 6;
        $data['is_login'] = $this->_is_logged_in();
        $this->load->model('banner_model');
        $data['bannerArr'] = $this->banner_model->list_banner(); 
        if($this->input->post('submit')){
            $this->user_model->contact();
        }
        $this->load->view('contact',$data);            
    }
    
    function test(){
        $this->load->model('payment_model');
        $this->payment_model->test('test');
    }
    
    function help(){
        $data['pcode'] = 6;
        $data['is_login'] = $this->_is_logged_in();
        $this->load->model('banner_model');
        $this->load->model('video_model');
        $data['bannerArr'] = $this->banner_model->list_banner(); 
        $data['videoArr'] = $this->video_model->list_video();
        $this->load->view('help',$data);
    }
    
    function _is_logged_in(){
        if($this->session->userdata('user_id')!='') return TRUE;
        else return FALSE; 
    }
    
    function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('email');
        redirect();
    }
}