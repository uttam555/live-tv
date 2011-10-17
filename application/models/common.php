<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function setMsg($item, $value){
        $this->session->set_userdata($item,$value);	
    }
    
    function getMsg($item){
        if($this->session->userdata($item) !=''){
		  $val = $this->session->userdata($item);
		  $this->session->unset_userdata($item);
		  return $val;
        }
    }

    function generateUrl($string){
        $string = strtolower($string);
        $string = preg_replace("/[^a-z0-9\s-]/", "", $string);
        $string = trim(preg_replace("/[\s-]+/", " ", $string));
        $string = preg_replace("/\s/", "-", $string);
        return $string;
    }
    

    /**
     * Gets array of data of table by id of table
     *
     * @access	public
     * @param	string	table name
     * @param   ID of the table
     * @return	array
     */
     
    function getRowById($table, $idField, $id){
        $query = $this->db->query("SELECT * FROM $table WHERE $idField='$id'")->row_array();
        return $query;
    }
    
    function getArrayById($table, $idField, $id){
        $query = $this->db->query("SELECT * FROM $table WHERE $idField='$id'")->result_array();
        return $query;        
    }
    
    function getcountry(){
        $rs = $this->db->query("SELECT * FROM countries")->result_array();
        return $rs;
    }

    /**
     * Sends email
     *
     * @access	public
     * @param	array	to
     * @param   array   from
     * @param   string  subject of message
     * @param   string  HTML message
     * @param   string  plain message
     * @return	boolean
     */    
    function sendEmail($to, $from, $subject, $htmlMsg, $plainMsg)
    {
        require_once APPPATH.'my_classes/swift_required.php';
        //Pass it as a parameter when you create the message
        
        $transport = Swift_SmtpTransport::newInstance(MAIL_HOST, 587)
        ->setUsername(SMTP_MAIL)
        ->setPassword(PASSWORD);
       
        $mailer = Swift_Mailer::newInstance($transport);
        //Send the message
        if(is_array($to) && count($to)>1){
            $message = Swift_Message::newInstance()
              ->setSubject($subject)
              ->setFrom(array(SMTP_MAIL => 'NepBay'))
              ->setBody($htmlMsg,'text/html')
              ->addPart($htmlMsg, 'text/html')
            ;
            $failedRecipients = array();
            $numSent = 0;
            foreach($to as $key=>$val){              
                $message->setTo($val);
                if($mailer->send($message, $failedRecipients)){
                    $numSent++;
                    $default = $this->load->database('default', TRUE);
                    $default->insert('tbl_invitation_list',array('user_id'=>$this->session->userdata('user_id'),'email'=>$val));
                }
            }
            if($numSent>1) return TRUE;
        }else{
            //print_r($to);die;
            $message = new Swift_Message($subject);
            $message->setBody($htmlMsg,'text/html'); // Plain text version
            $message->setFrom($from);            
            $message->setTo($to);
            
            return $mailer->send($message);  
        }
              
    }    
}

