<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$CI = & get_instance();
$CI->load->model('setting/Setting_model');

$email_contact = $CI->Setting_model->get(array('name' => 'email_contact'));
$from_name = $CI->Setting_model->get(array('name' => 'from_name'));
$protocol = $CI->Setting_model->get(array('name' => 'protocol'));
$smtp_host = $CI->Setting_model->get(array('name' => 'smtp_host'));
$smtp_port = $CI->Setting_model->get(array('name' => 'smtp_port'));
$smtp_user = $CI->Setting_model->get(array('name' => 'smtp_user'));
$smtp_pass = $CI->Setting_model->get(array('name' => 'smtp_pass'));
$smtp_timeout = $CI->Setting_model->get(array('name' => 'smtp_timeout'));

$config['email_contact'] = $email_contact['setting_value'];
$config['from_name'] = $from_name['setting_value'];
$config['protocol'] = $protocol['setting_value'];
$config['smtp_host'] = $smtp_host['setting_value'];
$config['smtp_port'] = $smtp_port['setting_value'];
$config['smtp_user'] = $smtp_user['setting_value'];
$config['smtp_pass'] = $smtp_pass['setting_value'];
$config['smtp_timeout'] = $smtp_timeout['setting_value'];
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
$config['wordwrap'] = TRUE;

/* End of file email.php */
/* Location: ./application/config/email.php */