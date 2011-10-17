<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->lang->load('msg', 'messages');        
    }
    
    function add_video(){
        $arr = array(
                    'title'=>$this->input->post('title')
                    );
        
        if(isset($_FILES['video']['name']) && $_FILES['video']['name']!=''){
            $config['upload_path'] = FCPATH.'video/';
            $config['allowed_types'] = 'flv|avi|mpeg|mpg|3gp|mov|mp4';
            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('video')){

                if(!is_dir(FCPATH.'video/')){
                    @mkdir(FCPATH.'video/');
                }                
                $data = $this->upload->data();

                $arr['name'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->insert('tbl_video',$arr);
        
        if(!empty($rs)){
            $this->common->setMsg('admin/list_help_video',sprintf($this->lang->line('msg_success_add'),"Help Video"));
            return TRUE;
        }        
    }
    
    function edit_video($video_id){
        $arr = array(
                    'title'=>$this->input->post('title')
                    );
        
        if(isset($_FILES['video']['name']) && $_FILES['video']['name']!=''){
            $config['upload_path'] = FCPATH.'video/';
            $config['allowed_types'] = 'avi|mpeg|mpg|3gp|mov|mp4|flv';

            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('video')){
                if(!is_dir(FCPATH.'video/')){
                    @mkdir(FCPATH.'video/');
                }                
                $videoRow = $this->db->query("SELECT * FROM tbl_video WHERE video_id='".$video_id."'")->row_array();
                @unlink(FCPATH.'video/'.$videoRow['name']);
                
                $data = $this->upload->data();

                $arr['name'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->update('tbl_video',$arr,array('video_id'=>$video_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/help/edit_help_video',sprintf($this->lang->line('msg_success_edit'),"Help Video"));
            return TRUE;
        }           
    }
    
    function list_video(){
        $rs = $this->db->query("SELECT * FROM tbl_video ORDER BY video_id DESC")->result_array();
        return $rs;
    }
    
    function add_vod(){
        $arr = array(
                    'title'=>$this->input->post('title')
                    );
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
            $config['upload_path'] = FCPATH.'images/vod/';
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image')){

                if(!is_dir(FCPATH.'images/vod/')){
                    @mkdir(FCPATH.'images/vod/');
                }                
                $data = $this->upload->data();
                
                $conf['fileName'] = FCPATH.'images/vod/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('265','149',"crop");
                $this->image->saveImage(FCPATH.'images/vod/thumb/'.$data['file_name'],100);
                
                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->insert('tbl_vod',$arr);
        
        if(!empty($rs)){
            $this->common->setMsg('admin/list_vod',sprintf($this->lang->line('msg_success_add'),"Vod"));
            return TRUE;
        }        
    }
    
    function edit_vod($vod_id){
        $arr = array(
                    'title'=>$this->input->post('title')
                    );
        
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
            $config['upload_path'] = FCPATH.'images/vod/';
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $this->load->library('upload', $config);

            if ( $this->upload->do_upload('image')){

                if(!is_dir(FCPATH.'images/vod/')){
                    @mkdir(FCPATH.'images/vod/');
                }                
                $data = $this->upload->data();
                $vodRow = $this->db->query("SELECT * FROM tbl_vod WHERE vod_id='".$vod_id."'")->row_array();                
                @unlink(FCPATH.'images/vod/'.$vodRow['image']);
                @unlink(FCPATH.'images/vod/thumb/'.$vodRow['image']);
                $conf['fileName'] = FCPATH.'images/vod/'.$data['file_name']; 
                $this->load->library('image', $conf);
                $this->image->resizeImage('265','149',"crop");
                $this->image->saveImage(FCPATH.'images/vod/thumb/'.$data['file_name'],100);
                
                $arr['image'] = $data['file_name'];
            }else{
                echo $this->upload->display_errors();
                echo "upload failed";die;	
            }            
        }
        $rs = $this->db->update('tbl_vod',$arr,array('vod_id'=>$vod_id));
        
        if(!empty($rs)){
            $this->common->setMsg('admin/list_vod',sprintf($this->lang->line('msg_success_add'),"VOD"));
            return TRUE;
        }        
    }    
    
    function list_vod(){
        $rs = $this->db->query("SELECT * FROM tbl_vod ORDER BY vod_id DESC")->result_array();
        return $rs;
    }
}

