<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['Sandbox'] = TRUE;
$config['APIVersion'] = '66.0';
$config['APIUsername'] = $config['Sandbox'] ? 'seller_1314858670_biz_api1.sabaiko.com' : 'PRODUCTION_USERNAME_GOES_HERE';
$config['APIPassword'] = $config['Sandbox'] ? '1314858708' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['APISignature'] = $config['Sandbox'] ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31ApyNs3WhMJgVF-y8appOnPavC2JN' : 'PRODUCTION_SIGNATURE_GOES_HERE';

/* End of file paypal_pro.php */
/* Location: ./system/application/config/paypal_pro.php */