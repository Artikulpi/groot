<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$CI = & get_instance();
$CI->load->model('Setting_model');

$config['from'] = $CI->Setting_model->get(array('name' => 'from'))['setting_value'];
$config['from_name'] = $CI->Setting_model->get(array('name' => 'from_name'))['setting_value'];
$config['protocol'] = $CI->Setting_model->get(array('name' => 'protocol'))['setting_value'];
$config['smtp_host'] = $CI->Setting_model->get(array('name' => 'smtp_host'))['setting_value'];
$config['smtp_port'] = $CI->Setting_model->get(array('name' => 'smtp_port'))['setting_value'];
$config['smtp_user'] = $CI->Setting_model->get(array('name' => 'smtp_user'))['setting_value'];
$config['smtp_pass'] = $CI->Setting_model->get(array('name' => 'smtp_pass'))['setting_value'];
$config['smtp_timeout'] = $CI->Setting_model->get(array('name' => 'smtp_timeout'))['setting_value'];
$config['mailtype'] = $CI->Setting_model->get(array('name' => 'mailtype'))['setting_value'];
$config['charset'] = $CI->Setting_model->get(array('name' => 'charset'))['setting_value'];
$config['newline'] = $CI->Setting_model->get(array('name' => 'newline'))['setting_value'];
$config['crlf'] = $CI->Setting_model->get(array('name' => 'crlf'))['setting_value'];

/* End of file email.php */
/* Location: ./application/config/email.php */
