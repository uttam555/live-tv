<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->lang->load('msg', 'messages');        
    }
    
    function add_device(){
        $arr = array(
                    'name'=>$this->input->post('device_name'),
                    'description'=>$this->input->post('description'),
                    'price'=>$this->input->post('price')
                    );
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
            $config['upload_path'] = FCPATH.'images/device/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image')){

                if(!is_dir(FCPATH.'images/device/')){
                    @mkdir(FCPATH.'images/device/');
                    @mkdir(FCPATH.'images/device/thumb/');
                }                
                $data = $this->upload->data();

                $conf['fileName'] = FCPATH.'images/device/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('160','145',"crop");
                $this->image->saveImage(FCPATH.'images/device/thumb/'.$data['file_name'],100);

                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->insert('tbl_device',$arr);
        
        if(!empty($rs)){
            $this->common->setMsg('admin/list_device',sprintf($this->lang->line('msg_success_add'),"Device"));
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
    
    function edit_device($device_id){
        $arr = array(
                    'name'=>$this->input->post('device_name'),
                    'description'=>$this->input->post('description'),
                    'price'=>$this->input->post('price')            
                    );
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
            $config['upload_path'] = FCPATH.'images/device/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image')){
                if(!is_dir(FCPATH.'images/device/')){
                    @mkdir(FCPATH.'images/device/');
                    @mkdir(FCPATH.'images/device/thumb/');
                }                
                $channelRow = $this->db->query("SELECT * FROM tbl_device WHERE device_id='".$device_id."'")->row_array();
                @unlink(FCPATH.'images/device/'.$channelRow['image']);
                @unlink(FCPATH.'images/device/thumb/'.$channelRow['image']);
                
                $data = $this->upload->data();

                $conf['fileName'] = FCPATH.'images/device/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('160','145',"crop");
                $this->image->saveImage(FCPATH.'images/device/thumb/'.$data['file_name'],100);

                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->update('tbl_device',$arr,array('device_id'=>$device_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/device/edit',sprintf($this->lang->line('msg_success_edit'),"Device"));
            return TRUE;
        }           
    }
    
    function list_device(){
        $rs = $this->db->query("SELECT * FROM tbl_device ORDER BY device_id DESC")->result_array();
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
}

