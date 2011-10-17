<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->lang->load('msg', 'messages');        
    }
    
    function add_banner(){
        $arr = array(
                    'name'=>$this->input->post('banner_name'),
                    'link'=>$this->input->post('banner_link')
                    );
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){

            if(!is_dir(FCPATH.'images/banner')){
                mkdir(FCPATH.'images/banner/');
                mkdir(FCPATH.'images/banner/thumb/');
            }            
            $config['upload_path'] = FCPATH.'images/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image')){
                
                $data = $this->upload->data();

                $conf['fileName'] = FCPATH.'images/banner/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('636','302',"crop");
                $this->image->saveImage(FCPATH.'images/banner/'.$data['file_name'],100);
                
                $this->image->resizeImage('100','75',"crop");
                $this->image->saveImage(FCPATH.'images/banner/thumb/'.$data['file_name'],100);

                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->insert('tbl_banner',$arr);
        
        if(!empty($rs)){
            $this->common->setMsg('admin/list_banner',sprintf($this->lang->line('msg_success_add'),"Banner"));
            return TRUE;
        }        
    }

    function edit_banner($banner_id){
        $arr = array(
                    'name'=>$this->input->post('banner_name'),
                    'link'=>$this->input->post('banner_link')
                    );
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
            $config['upload_path'] = FCPATH.'images/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image')){                
                $bannerRow = $this->db->query("SELECT * FROM tbl_banner WHERE banner_id='".$banner_id."'")->row_array();
                @unlink(FCPATH.'images/banner/'.$bannerRow['image']);
                @unlink(FCPATH.'images/banner/thumb/'.$bannerRow['image']);
                
                $data = $this->upload->data();

                $conf['fileName'] = FCPATH.'images/banner/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('636','302',"crop");
                $this->image->saveImage(FCPATH.'images/banner/'.$data['file_name'],100);
                
                $this->image->resizeImage('100','75',"crop");
                $this->image->saveImage(FCPATH.'images/banner/thumb/'.$data['file_name'],100);

                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->update('tbl_banner',$arr,array('banner_id'=>$banner_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/banner/edit',sprintf($this->lang->line('msg_success_edit'),"Banner"));
            return TRUE;
        }           
    }
    
    function list_banner(){
        $rs = $this->db->query("SELECT * FROM tbl_banner ORDER BY banner_id DESC")->result_array();
        return $rs;
    }
}

