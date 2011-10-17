<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
    
    function __construct(){
        parent::__construct();      
    }
    
    function paypal_ipn(){
        $url = 'https://sandbox.paypal.com/cgi-bin/webscr';
        $postdata = '';
        foreach($_POST as $i => $v) {
                $postdata .= $i.'='.urlencode($v).'&';
        }
        $postdata .= 'cmd=_notify-validate';

        $web = parse_url($url);
        if ($web['scheme'] == 'https') { 
                $web['port'] = 443;  
                $ssl = 'ssl://'; 
        } else { 
                $web['port'] = 80;
                $ssl = ''; 
        }
        $fp = fsockopen($ssl.$web['host'], $web['port'], $errnum, $errstr, 30);

        if (!$fp) { 
                echo $errnum.': '.$errstr;
        } else {
                fputs($fp, "POST ".$web['path']." HTTP/1.1\r\n");
                fputs($fp, "Host: ".$web['host']."\r\n");
                fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
                fputs($fp, "Content-length: ".strlen($postdata)."\r\n");
                fputs($fp, "Connection: close\r\n\r\n");
                fputs($fp, $postdata . "\r\n\r\n");

                while(!feof($fp)) { 
                        $info[] = @fgets($fp, 1024); 
                }
                fclose($fp);
                $info = implode(',', $info);

                if (eregi('VERIFIED', $info)) { 
                        // yes valid, f.e. change payment status 
                    $transactionID=$_POST["txn_id"];
                    $item=$_POST["item_name"];
                    $amount=$_POST["mc_gross"];
                    $currency=$_POST["mc_currency"];
                    $datefields=explode(" ",$_POST["payment_date"]);
                    $time=$datefields[0];
                    $date=str_replace(",","",$datefields[2])." ".$datefields[1]." ".$datefields[3];
                    $timestamp=strtotime($date." ".$time);
                    $status=$_POST["payment_status"];
                    $firstname=$_POST["first_name"];
                    $lastname=$_POST["last_name"];
                    $email=$_POST["payer_email"];
                    $custom=$_POST["custom"];
                    //$data = unserialize($_POST['custom']);

                    $arr = array(
                                'txn_id'=>$transactionID,
                                'item_name'=>$item,
                                'amount'=>$amount,
                                'currency'=>$currency,
                                'date'=>$date,
                                'status'=>$status,
                                'first_name'=>$firstname,
                                'last_name'=>$lastname,
                                'payer_email'=>$email,
                                );
                    if ($transactionID AND $amount)
                      {
                      // query to save data
                          $this->db->update('tbl_transaction',$arr,array('transaction_id'=>$custom));
$message .= '<table width="580" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center" style="width:580px;background-color:#F1FAFE;border-top:1px solid #DDD;border-bottom:1px solid #DDD">
		<tbody><tr>
			<td style="padding-top:34px;padding-left:39px;padding-right:39px;text-align:left;border-left-width:1px;border-left-style:solid;border-left-color:#DDD;border-right-width:1px;border-right-style:solid;border-right-color:#DDD">
				<h2 style="font-family:Arial, Helvetica, sans-serif;font-size:25px;color:#262626;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0">Hello,'.ucwords($data['fullname']).'</h2>
				<h3 style="font-family:Arial, Helvetica, sans-serif;font-size:16px;color:#3e434a;font-weight:normal;margin-top:0;margin-bottom:19px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;line-height:25px">Thanks for ordering package from our site. Details of the order is given below.</h3>
			</td>
		</tr>
		<tr>
			<td align="left" style="background-color:#fff;font-size:14px;color:#1f1f1f;border-top-width:1px;border-top-style:solid;border-top-color:#DAE3EA;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#DAE3EA;border-left-width:1px;border-left-style:solid;border-left-color:#DDD;border-right-width:1px;border-right-style:solid;border-right-color:#DDD;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:20px;padding-bottom:20px;padding-right:39px;padding-left:39px;text-align:left">
				<table width="500" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Package Name:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">Service Plan1</td>
					</tr>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Price:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">$'.$data['price'].'</td>
					</tr>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Phone:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['phone'].'</td>
					</tr>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Address1:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['address1'].'</td>
					</tr>                                        
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>City:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['city'].'</td>
					</tr>  
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Country:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['country'].'</td>
					</tr>                                        
				</tbody>
                                </table>
			</td>
		</tr>
		<tr>
	</tr></tbody></table>';                          
                          $this->common->sendEmail(array($data['email']=>$data['fullname']),array(ADMIN_EMAIL=>ADMIN_NAME),"Billing info",$message,'');
                          return TRUE;
                      //return $this->insertID;
                      }
                                            return 1;
                } else {
                        // invalid, log error or something
                                return 0;
                }
        } 
    }
    
    function test(){
        $data['fullname']="uttam Manandhar";
        $data['email'] = "ootam.rules@gmail.com";
        $data['address1'] = "Madhyapur, Thimi";
        $data['address2'] = "";
        $data['city'] = 'Bhaktapur';
        $data['country'] = "Nepal";
        $data['price']= "380";
        $data['phone'] = "9849463534";
        $message = null;
        //$message = "<table align='center' width='500px' style='border:1px solid #ccc;font:bold 12px \"Verdana\"'><tr><td style='background:#aaa'><p>Hello, ".ucwords($data['fullname'])."</p><p></p></td></tr></table>";
        $message .= '<table width="580" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center" style="width:580px;background-color:#F1FAFE;border-top:1px solid #DDD;border-bottom:1px solid #DDD">
		<tbody><tr>
			<td style="padding-top:34px;padding-left:39px;padding-right:39px;text-align:left;border-left-width:1px;border-left-style:solid;border-left-color:#DDD;border-right-width:1px;border-right-style:solid;border-right-color:#DDD">
				<h2 style="font-family:Arial, Helvetica, sans-serif;font-size:25px;color:#262626;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0">Hello,'.ucwords($data['fullname']).'</h2>
				<h3 style="font-family:Arial, Helvetica, sans-serif;font-size:16px;color:#3e434a;font-weight:normal;margin-top:0;margin-bottom:19px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;line-height:25px">Thanks for ordering package from our site. Details of the order is given below.</h3>
			</td>
		</tr>
		<tr>
			<td align="left" style="background-color:#fff;font-size:14px;color:#1f1f1f;border-top-width:1px;border-top-style:solid;border-top-color:#DAE3EA;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#DAE3EA;border-left-width:1px;border-left-style:solid;border-left-color:#DDD;border-right-width:1px;border-right-style:solid;border-right-color:#DDD;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:20px;padding-bottom:20px;padding-right:39px;padding-left:39px;text-align:left">
				<table width="500" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Package Name:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">Service Plan1</td>
					</tr>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Price:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">$'.$data['price'].'</td>
					</tr>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Phone:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['phone'].'</td>
					</tr>
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Address1:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['address1'].'</td>
					</tr>                                        
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>City:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['city'].'</td>
					</tr>  
                                        <tr>
						<td width="100" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#666;font-weight:normal;margin-top:0;margin-bottom:13px;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;letter-spacing:0"><strong>Country:</strong></td>
						<td align="left" style="font-family:Arial, Helvetica, sans-serif;padding-left:9px;font-size:12px">'.$data['country'].'</td>
					</tr>                                        
				</tbody>
                                </table>
			</td>
		</tr>
		<tr>
	</tr></tbody></table>';
        echo $message;        
    }    
}

