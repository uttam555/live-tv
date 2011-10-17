<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Package_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->lang->load('msg', 'messages');        
    }
    
    function add_package(){
        $rs = $this->db->insert('tbl_package', array('package_name'=>$this->input->post('package_name'),'package_description'=>$this->input->post('description'),'price'=>$this->input->post('price'),'subscription_period'=>  $this->input->post('subscription_period')));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/list_package',sprintf($this->lang->line('msg_success_add'),"Package"));
            return TRUE;
        }
    }
    
    function edit_package($package_id){
        $rs = $this->db->update('tbl_package', array('package_name'=>$this->input->post('package_name'),'package_description'=>$this->input->post('description'),'price'=>$this->input->post('price'),'subscription_period'=>  $this->input->post('subscription_period')),array('package_id'=>$package_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/package/edit',sprintf($this->lang->line('msg_success_edit'),"Package"));
            return TRUE;
        }        
    }
        
    function edit_category($cat_id){
        $rs = $this->db->update('tbl_channel_cat', array('name'=>$this->input->post('category_name')),array('category_id'=>$cat_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/channel/edit_category',sprintf($this->lang->line('msg_success_edit'),"Category"));
            return TRUE;
        }        
    }
    
    function edit_channel($channel_id){
        $arr = array(
                    'cat_id'=>$this->input->post('category'),
                    'name'=>$this->input->post('channel_name')
                    );
        
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=''){
            $config['upload_path'] = FCPATH.'images/channel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('file')){
                if(!is_dir(FCPATH.'images/channel/')){
                    @mkdir(FCPATH.'images/channel/');
                    @mkdir(FCPATH.'images/channel/thumb/');
                }                
                $channelRow = $this->db->query("SELECT * FROM tbl_channel WHERE channel_id='".$channel_id."'")->row_array();
                @unlink(FCPATH.'images/channel/'.$channelRow['image']);
                @unlink(FCPATH.'images/channel/thumb/'.$channelRow['image']);
                
                $data = $this->upload->data();

                $conf['fileName'] = FCPATH.'images/channel/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('160','145',"crop");
                $this->image->saveImage(FCPATH.'images/channel/thumb/'.$data['file_name'],100);

                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->update('tbl_channel',$arr,array('channel_id'=>$channel_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/channel/edit',sprintf($this->lang->line('msg_success_edit'),"Channel"));
            return TRUE;
        }           
    }
    
    function list_category(){
        $rs = $this->db->query("SELECT * FROM tbl_channel_cat ORDER BY category_id DESC")->result_array();
        return $rs;
    }
    
    function list_channel($cat_id, $limit, $offset){
        if($cat_id<=0 || $cat_id==''){
            $rs = $this->db->query("SELECT a.channel_id,a.cat_id,a.name as channel,b.category_id,b.name as category FROM tbl_channel AS a LEFT JOIN tbl_channel_cat AS b ON a.cat_id=b.category_id ORDER BY a.channel_id DESC LIMIT $limit,$offset")->result_array();            
        }else{
            $rs = $this->db->query("SELECT * FROM tbl_channel AS a LEFT JOIN tbl_channel_cat AS b ON a.cat_id=b.category_id WHERE a.cat_id='$cat_id' ORDER BY channel_id DESC LIMIT $limit,$offset")->result_array();
        }
        return $rs;        
    }
    
    function list_package(){
        $rs = $this->db->query("SELECT * FROM tbl_package ORDER BY package_id DESC")->result_array();
        return $rs;        
    }
}

