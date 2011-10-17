<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_ajax extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function delete_category(){
        if(!$this->_is_admin()) echo "fail";
        
        $cat_id = $this->input->post('cat_id');
        $channelArr = $this->db->query("SELECT * FROM tbl_channel WHERE cat_id='".$cat_id."'")->result_array();
        if(!empty($channelArr)){
            foreach($channelArr as $channel){
                @unlink(FCPATH.'images/channel/'.$channel['image']);
                @unlink(FCPATH.'images/channel/thumb/'.$channel['image']);
            }
        }
        $this->db->delete('tbl_channel',array('cat_id'=>$cat_id));
        $rs = $this->db->delete('tbl_channel_cat',array('category_id'=>$cat_id));
        if(!empty($rs)) echo "success";
        else echo "fail";
    }
    
    function delete_channel(){
        if(!$this->_is_admin()) echo "fail";
        
        $channel_id = $this->input->post('channel_id');
        $channelRow = $this->db->query("SELECT * FROM tbl_channel WHERE channel_id='".$channel_id."'")->row_array();
        @unlink(FCPATH.'images/channel/'.$channelRow['image']);
        @unlink(FCPATH.'images/channel/thumb/'.$channelRow['image']);
        $rs = $this->db->delete('tbl_channel',array('channel_id'=>$channel_id));
        if(!empty($rs)) echo "success";
        else echo "fail";        
    }
    
    function delete_device(){
        if(!$this->_is_admin()) echo "fail"; 
        
        $device_id = $this->input->post('device_id');
        $deviceRow = $this->db->query("SELECT * FROM tbl_device WHERE device_id='".$device_id."'")->row_array();
        @unlink(FCPATH.'images/device/'.$deviceRow['image']);
        @unlink(FCPATH.'images/device/thumb/'.$deviceRow['image']);
        $rs = $this->db->delete('tbl_device',array('device_id'=>$device_id));
        if(!empty($rs)) echo "success";
        else echo "fail";         
    }
    
    function delete_package(){
        if(!$this->_is_admin()) echo "fail";
        
        $package_id= $this->input->post('package_id');
        $rs = $this->db->delete('tbl_package',array('package_id'=>$package_id));
        if(!empty($rs)) echo "success";
        else echo "fail";           
    }
    
    function delete_banner(){
        if(!$this->_is_admin()) echo "fail"; 
        
        $banner_id = $this->input->post('banner_id');
        $bannerRow = $this->db->query("SELECT * FROM tbl_banner WHERE banner_id='".$banner_id."'")->row_array();
        @unlink(FCPATH.'images/banner/'.$bannerRow['image']);
        @unlink(FCPATH.'images/banner/thumb/'.$bannerRow['image']);
        $rs = $this->db->delete('tbl_banner',array('banner_id'=>$banner_id));
        if(!empty($rs)) echo "success";
        else echo "fail";          
    }
    
    function add_channel(){
        if(!$this->_is_admin()) echo "fail";
        
        $arr = $_POST['ch_arr'];
        $package_id = $this->input->post('package_id');
        if(!empty($arr)){
            $chArr = @implode(',', $arr);
        }
        $str = null;
        $insArr = array();
        $chlist = $this->db->query("SELECT * FROM tbl_channel WHERE channel_id IN(".$chArr.") ")->result_array();
        if(!empty($chlist)){
            foreach($chlist as $channel){
                $res = $this->db->query("SELECT * FROM tbl_package_channel WHERE package_id='".$package_id."' AND channel_id='".$channel['channel_id']."'")->row_array();
                if(empty($res)){
                    $this->db->insert('tbl_package_channel',array('package_id'=>$package_id,'channel_id'=>$channel['channel_id']));
                    $str .= "<div class='rem-ch ".$channel['channel_id']."' onclick='rem_ch(".$channel['channel_id'].")'><img src='".base_url().'images/channel/thumb/'.$channel['image']."'/><label>".$channel['name']."</label></div>";
                }
            }
        }

        echo $str;
    }
    
    function rem_channel(){
        if(!$this->_is_admin()) echo "fail";
        
        $arr = $_POST['ch_arr'];
        $package_id = $this->input->post('package_id');
        if(!empty($arr)){
            $chArr = @implode(',', $arr);
        }
        $str = null;
        $insArr = array();
        $chlist = $this->db->query("SELECT * FROM tbl_channel WHERE channel_id IN(".$chArr.") ")->result_array();
        if(!empty($chlist)){
            foreach($chlist as $channel){
                $str .= "<div class='add-ch ".$channel['channel_id']."' onclick='add_ch(".$channel['channel_id'].")'><img src='".base_url().'images/channel/thumb/'.$channel['image']."'/><label>".$channel['name']."</label></div>";
                $this->db->delete('tbl_package_channel',array('package_id'=>$package_id,'channel_id'=>$channel['channel_id']));                
            }
        }

        echo $str;        
    }
    
    function delete_video(){
        if(!$this->_is_admin()) echo "fail"; 
        
        $video_id = $this->input->post('video_id');
        $videoRow = $this->db->query("SELECT * FROM tbl_video WHERE video_id='".$video_id."'")->row_array();
        @unlink(FCPATH.'video/'.$videoRow['name']);
        $rs = $this->db->delete('tbl_video',array('video_id'=>$video_id));
        if(!empty($rs)) echo "success";
        else echo "fail";        
    }
    
    function delete_vod(){
        if(!$this->_is_admin()) echo "fail"; 
        
        $vod_id = $this->input->post('vod_id');
        $vodRow = $this->db->query("SELECT * FROM tbl_vod WHERE vod_id='".$vod_id."'")->row_array();
        @unlink(FCPATH.'images/vod/'.$vodRow['image']);
        @unlink(FCPATH.'images/vod/thumb/'.$vodRow['image']);
        $rs = $this->db->delete('tbl_vod',array('vod_id'=>$vod_id));
        if(!empty($rs)) echo "success";
        else echo "fail";        
    }
    
    function _is_admin(){
        if($this->session->userdata('admin_id')!='') return TRUE;
        else return FALSE; 
    }
}