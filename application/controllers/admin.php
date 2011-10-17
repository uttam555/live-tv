<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    
    function index(){
        if($this->_is_logged_in()) redirect('admin/dashboard');
        
        if($this->input->post('submit')){
            if($this->user_model->checkAdmin($this->input->post('username'), $this->input->post('password'))){
                $this->load->view('admin/dashboard');
            }else{
                $data['msg'] = "Username and password did not match !";
                $this->load->view('admin/login',$data);                
            }
        }else{
            $this->load->view('admin/login');
        }
    }
    
    function dashboard(){
        if(!$this->_is_logged_in()) redirect('admin');
        
        $this->load->view('admin/dashboard');
    }
    
    function add_banner(){
        if(!$this->_is_logged_in()) redirect('admin');
        
        if($this->input->post('submit')){
            $this->load->model('banner_model');
            $this->banner_model->add_banner();
            redirect('admin/list_banner');
        }else{
            $this->load->view('admin/banner/add');
        }           
    }
    
    function add_channel(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('channel_model');
        
        if($this->input->post('submit')){
            $this->channel_model->add_channel();
            redirect('admin/list_channel');
        }else{
            $data['catArr'] = $this->channel_model->list_category();
            $this->load->view('admin/channel/add',$data);
        }        
    }
    
    function add_channel_category(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('channel_model');
        
        if($this->input->post('submit')){
            $this->channel_model->add_category();
            redirect('admin/channel_category');
        }else{
            $this->load->view('admin/channel/add_category');
        }
    }
    
    function add_device(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('device_model');
        
        if($this->input->post('submit')){
            $this->device_model->add_device();
            redirect('admin/list_device');
        }else{
            //$data['deviceArr'] = $this->channel_model->list_device();
            $this->load->view('admin/device/add');
        }         
    }
    
    function add_package(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('package_model');
        
        if($this->input->post('submit')){
            $this->package_model->add_package();
            redirect('admin/list_package');
        }else{
            //$data['deviceArr'] = $this->channel_model->list_device();
            $this->load->view('admin/package/add');
        }            
    }
    
    function add_vod(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('video_model');
        
        if($this->input->post('submit')){
            $this->video_model->add_vod();
            redirect('admin/list_vod');
        }else{
            //$data['deviceArr'] = $this->channel_model->list_device();
            $this->load->view('admin/vod/add');
        }         
    }
    
    function channel_category(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('channel_model');
        
        $data['catArr'] = $this->channel_model->list_category();
        $this->load->view('admin/channel/list_category', $data);        
    }
    
    function edit_banner($banner_id){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('banner_model');
        
        if($this->input->post('submit')){
            $this->banner_model->edit_banner($banner_id);         
            $data['bannerRow'] = $this->common->getRowById('tbl_banner', 'banner_id', $banner_id);
            $this->load->view('admin/banner/edit',$data);
        }else{
           
            $data['bannerRow'] = $this->common->getRowById('tbl_banner', 'banner_id', $banner_id);  
            $this->load->view('admin/banner/edit',$data);
        }           
    }
    
    function edit_channel($channel_id){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('channel_model');
        
        if($this->input->post('submit')){
            $this->channel_model->edit_channel($channel_id);
            $data['catArr'] = $this->channel_model->list_category();            
            $data['channelRow'] = $this->common->getRowById('tbl_channel', 'channel_id', $channel_id);
            $this->load->view('admin/channel/edit',$data);
        }else{
            $data['catArr'] = $this->channel_model->list_category();            
            $data['channelRow'] = $this->common->getRowById('tbl_channel', 'channel_id', $channel_id);  
            $this->load->view('admin/channel/edit',$data);
        }         
    }
    
    function edit_channel_category($cat_id){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('channel_model');
        
        if($this->input->post('submit')){
            $this->channel_model->edit_category($cat_id);
            $data['catRow'] = $this->common->getRowById('tbl_channel_cat', 'category_id', $cat_id);
            $this->load->view('admin/channel/edit_category',$data);
        }else{
            $data['catRow'] = $this->common->getRowById('tbl_channel_cat', 'category_id', $cat_id);            
            $this->load->view('admin/channel/edit_category',$data);
        }        
    }
    
    function edit_device($device_id){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('device_model');
        
        if($this->input->post('submit')){
            $this->device_model->edit_device($device_id);         
            $data['deviceRow'] = $this->common->getRowById('tbl_device', 'device_id', $device_id);
            $this->load->view('admin/device/edit',$data);
        }else{
           
            $data['deviceRow'] = $this->common->getRowById('tbl_device', 'device_id', $device_id);  
            $this->load->view('admin/device/edit',$data);
        }             
    }
    
    function edit_package($package_id){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('package_model');
        $this->load->model('channel_model');
        $data['addedArr'] = $this->channel_model->getAddedList($package_id);
        $data['remainArr'] = $this->channel_model->getRemainList($package_id);
        if($this->input->post('submit')){
            $this->package_model->edit_package($package_id);           
            $data['packageRow'] = $this->common->getRowById('tbl_package', 'package_id', $package_id);
            $this->load->view('admin/package/edit',$data);
        }else{            
            $data['packageRow'] = $this->common->getRowById('tbl_package', 'package_id', $package_id);  
            $this->load->view('admin/package/edit',$data);
        }           
    }
    
    function edit_vod($vod_id){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('video_model');
        
        if($this->input->post('submit')){          
            $this->video_model->edit_vod($vod_id);
            $data['vodRow'] = $this->common->getRowById('tbl_vod', 'vod_id', $vod_id);              
            $this->load->view('admin/vod/edit',$data);
        }else{
            $data['vodRow'] = $this->common->getRowById('tbl_vod', 'vod_id', $vod_id);
            $this->load->view('admin/vod/edit',$data);
        }            
    }
    
    function list_banner(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('banner_model');
        
        $data['bannerArr'] = $this->banner_model->list_banner();
        $this->load->view('admin/banner/list',$data);
    }
    
    function list_channel($id=0){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('channel_model');        
        //$this->db->count_all_results('tbl_channel');
        $count = $this->db->count_all_results('tbl_channel');
        
        $config['current_page'] = $this->uri->segment(3) != ''? $this->uri->segment(3):'1';
        $config['items_total'] = $count;
        $config['items_per_page'] = ITEM_ADMIN;
        $config['url'] = base_url().'admin/list_channel';

        $this->load->library('pagination', $config);
        $this->pagination->paginate();

        $data['pagination'] = $this->pagination->display_pages(); 
        
        
        if($config['current_page']<=0) $offset = 0;
        else $offset = ($config['current_page'] - 1)* ITEM_ADMIN;
        $limit = ITEM_ADMIN;

        $data['channelArr'] = $this->channel_model->list_channel('',$offset, $limit);
        $this->load->view('admin/channel/list', $data);            
    }
    
    function list_device(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('device_model');
        
        $data['deviceArr'] = $this->device_model->list_device();
        $this->load->view('admin/device/list', $data);          
    }
    
    function list_package(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('package_model');
        
        $data['packageArr'] = $this->package_model->list_package();
        $this->load->view('admin/package/list',$data);
    }
    
    function list_user($pid=0){
        if(!$this->_is_logged_in()) redirect('admin');
        
        $this->load->model('user_model');
        
        $count = $this->db->count_all_results('tbl_user');
        
        //$config['current_page'] = $this->uri->segment(3) != ''? $this->uri->segment(3):'1';
        $config['current_page'] = $pid;
        $config['items_total'] = $count;
        $config['items_per_page'] = ITEM_ADMIN;
        $config['url'] = base_url().'admin/list_user';

        $this->load->library('pagination', $config);
        $this->pagination->paginate();

        $data['pagination'] = $this->pagination->display_pages(); 
          
        if($config['current_page']<=0) $offset = 0;
        else $offset = ($config['current_page'] - 1)* ITEM_ADMIN;
        $limit = ITEM_ADMIN;

        $data['userArr'] = $this->user_model->list_user($offset, $limit);
        $this->load->view('admin/user/list', $data);         
    }
    
    function list_order($pid=0){
        if(!$this->_is_logged_in()) redirect('admin');
        
        $this->load->model('user_model');
        
        $count = $this->db->count_all_results('tbl_transaction');
        
        //$config['current_page'] = $this->uri->segment(3) != ''? $this->uri->segment(3):'1';
        $config['current_page'] = $pid;
        $config['items_total'] = $count;
        $config['items_per_page'] = ITEM_ADMIN;
        $config['url'] = base_url().'admin/list_order';

        $this->load->library('pagination', $config);
        $this->pagination->paginate();

        $data['pagination'] = $this->pagination->display_pages(); 
          
        if($config['current_page']<=0) $offset = 0;
        else $offset = ($config['current_page'] - 1)* ITEM_ADMIN;
        $limit = ITEM_ADMIN;

        $data['orderArr'] = $this->user_model->list_order($offset, $limit);
        $this->load->view('admin/order/list', $data);         
    }
    
    function list_vod(){
        if(!$this->_is_logged_in()) redirect('admin');
        
        $this->load->model('video_model');
        $data['vodArr'] = $this->video_model->list_vod();
        $this->load->view('admin/vod/list',$data);
    }
    
    function add_item(){
        if(!$this->_is_logged_in()) redirect('admin');
        
        if($this->input->post('submit')){
            if($this->auction_model->add_item()){
                $this->session->set_flashdata('admin/items/list','Item added successfully !');
                redirect('admin/list_item');
            }
        }else{
            $this->load->view('admin/items/add');
        }        
    }
    
    function edit_item($item_id){
        if(!$this->_is_logged_in()) redirect('admin');
        
        $this->load->model('common');        
        
        if($this->input->post('submit')){
            if($this->auction_model->edit_item($item_id)){
                $data['itemData'] = $this->auction_model->getItemDetails($item_id);

                $this->common->set_message('admin/edit_item/'.$item_id,'Item edited successfully !');
                $this->load->view('admin/items/edit', $data);
            }
        }else{
            $data['itemData'] = $this->auction_model->getItemDetails($item_id);
            $this->load->view('admin/items/edit', $data);
        }          
    }
    
    function list_item(){
        if(!$this->_is_logged_in()) redirect('admin');
        
        $items = $this->auction_model->list_item_pagination();
        
        $config['current_page'] = $this->uri->segment(3) != ''? $this->uri->segment(3):'1';
		$config['items_total'] = count($items);
		$config['items_per_page'] = ITEM_PER_PAGE; 
		
 		$this->load->library('pagination', $config);
		$this->pagination->paginate();

		$data['pagination'] = $this->pagination->display_pages(); 
        if($page = $this->input->get('page')<=0) $offset = 0;
        else $offset = ($this->input->get('page') - 1)* ITEM_PER_PAGE;
        $limit = ITEM_PER_PAGE;

        $data['itemArr'] = $this->auction_model->list_item_pagination($offset, $limit);
        $this->load->view('admin/items/list', $data);        
    }
    
    function list_help_video(){
        if(!$this->_is_logged_in()) redirect('admin');
        $this->load->model('video_model');
        $data['videoArr'] = $this->video_model->list_video();
        $this->load->view('admin/help/list', $data);          
    }
    
    function add_help_video(){
        if(!$this->_is_logged_in()) redirect('admin');
        
        if($this->input->post('submit')){
            $this->load->model('video_model');
            $this->video_model->add_video();
            redirect('admin/list_help_video');
        }else{
            $this->load->view('admin/help/add');             
        }
    }
    
    function edit_help_video($video_id){
        if(!$this->_is_logged_in()) redirect('admin');
                
        if($this->input->post('submit')){
            $this->load->model('video_model');
            $this->video_model->edit_video($video_id);
            $data['videoRow'] = $this->common->getRowById('tbl_video', 'video_id', $video_id);
            $this->load->view('admin/help/edit',$data);
        }else{
            $data['videoRow'] = $this->common->getRowById('tbl_video', 'video_id', $video_id);
            $this->load->view('admin/help/edit',$data);            
        }
    }
    
    function _is_logged_in(){
        if($this->session->userdata('admin_id')!='') return TRUE;
        else return FALSE; 
    }
    
    function logout(){
        $this->session->unset_userdata('admin_id');
        redirect('admin');
    }
}