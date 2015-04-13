<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * Form Declaration
 *
 * Creates the opening portion of the form.
 *
 * @access	public
 * @param	string	the URI segments of the form destination
 * @param	array	a key/value pair of attributes
 * @param	array	a key/value pair hidden data
 * @return	string
 */
if (!function_exists('form_contact')) {

    function form_contact($action = '', $attributes = '', $name_data = array(), $email_data = array(), $textarea_data = array(), $submit_data = array(), $div_input = array(), $div_submit = array(), $div_textarea = array(), $hidden = array()) {
        $CI = & get_instance();

        if ($attributes == '') {
            $attributes = 'method="post"';
        }

        // If an action is not a full URL then turn it into one
        if ($action && strpos($action, '://') === FALSE) {
            $action = $CI->config->site_url($action);
        }

        // If no action is provided then set to the current url
        $action OR $action = $CI->config->site_url($CI->uri->uri_string());

        $form = '<form action="' . $action . '"';

        $form .= _attributes_to_string($attributes, TRUE);

        $form .= '>';

        $name_default = array('type' => 'text', 'name' => (( isset($name_data['name'])) ? $name_data['name'] : ''), 'class' => (( isset($name_data['class'])) ? $name_data['class'] : ''), 'placeholder' => (( isset($name_data['placeholder'])) ? $name_data['placeholder'] : ''));

        $email_default = array('type' => 'text', 'name' => (( isset($email_data['name'])) ? $email_data['name'] : ''), 'class' => (( isset($email_data['class'])) ? $email_data['class'] : ''), 'placeholder' => (( isset($email_data['placeholder'])) ? $email_data['placeholder'] : ''));

        $textarea_default = array('name' => (( isset($textarea_data['name'])) ? $textarea_data['name'] : ''), 'class' => (( isset($textarea_data['class'])) ? $textarea_data['class'] : ''), 'rows' => (( isset($textarea_data['rows'])) ? $textarea_data['rows'] : '10'), 'placeholder' => (( isset($textarea_data['placeholder'])) ? $textarea_data['placeholder'] : ''));

        $submit_default = array('type' => 'submit', 'class' => (( isset($submit_data['class'])) ? $submit_data['class'] : ''), 'value' => (( isset($submit_data['value'])) ? $submit_data['value'] : 'Submit'));

        $form .= '<div ' . _attributes_to_string($div_input) . ' />';

        $form .= '<input ' . _attributes_to_string($name_default) . ' />';

        $form .= '</div>';

        $form .= '<div ' . _attributes_to_string($div_input) . ' />';

        $form .= '<input ' . _attributes_to_string($email_default) . ' />';

        $form .= '</div>';

        $form .= '<div ' . _attributes_to_string($div_textarea) . ' />';

        $form .= '<textarea ' . _attributes_to_string($textarea_default) . ' /></textarea>';

        $form .= '</div>';

        $form .= '<div ' . _attributes_to_string($div_submit) . ' />';

        $form .= '<input ' . _attributes_to_string($submit_default) . ' />';

        $form .= '</div>';

        $form .= '</form>';

        // Add CSRF field if enabled, but leave it out for GET requests and requests to external websites	
        if ($CI->config->item('csrf_protection') === TRUE AND !(strpos($action, $CI->config->base_url()) === FALSE OR strpos($form, 'method="get"'))) {
            $hidden[$CI->security->get_csrf_token_name()] = $CI->security->get_csrf_hash();
        }

        if (is_array($hidden) AND count($hidden) > 0) {
            $form .= sprintf("<div style=\"display:none\">%s</div>", form_hidden($hidden));
        }

        return $form;
    }

}

if (!function_exists('pretty_date')) {

    function pretty_date($date = '', $format = '', $timezone = TRUE) {
        $date_str = strtotime($date);

        if (empty($format)) {
            $date_pretty = date('l, d/m/Y H:i', $date_str);
        } else {
            $date_pretty = date($format, $date_str);
        }

        if ($timezone) {
            $date_pretty .= ' WIB';
        }

        $date_pretty = str_replace('Sunday', 'Minggu', $date_pretty);
        $date_pretty = str_replace('Monday', 'Senin', $date_pretty);
        $date_pretty = str_replace('Tuesday', 'Selasa', $date_pretty);
        $date_pretty = str_replace('Wednesday', 'Rabu', $date_pretty);
        $date_pretty = str_replace('Thursday', 'Kamis', $date_pretty);
        $date_pretty = str_replace('Friday', 'Jumat', $date_pretty);
        $date_pretty = str_replace('Saturday', 'Sabtu', $date_pretty);

        $date_pretty = str_replace('January', 'Januari', $date_pretty);
        $date_pretty = str_replace('February', 'Februari', $date_pretty);
        $date_pretty = str_replace('March', 'Maret', $date_pretty);
        $date_pretty = str_replace('April', 'April', $date_pretty);
        $date_pretty = str_replace('May', 'Mei', $date_pretty);
        $date_pretty = str_replace('June', 'Juni', $date_pretty);
        $date_pretty = str_replace('July', 'Juli', $date_pretty);
        $date_pretty = str_replace('August', 'Agustus', $date_pretty);
        $date_pretty = str_replace('September', 'September', $date_pretty);
        $date_pretty = str_replace('October', 'Oktober', $date_pretty);
        $date_pretty = str_replace('November', 'November', $date_pretty);
        $date_pretty = str_replace('December', 'Desember', $date_pretty);

        return $date_pretty;
    }

}

if (!function_exists('menu_url')) {

    function menu_url($menu = array()) {
        if (stristr($menu['url'], '://') !== FALSE) {
            return $menu['url'];
        }

        return site_url($menu['url']);
    }

}

if (!function_exists('page_tree_url_to_page_edit_url')) {

    function page_tree_url_to_page_edit_url($page = array()) {
        $status = is_page($page);

        if ($status) {
            list($page, $id) = explode('/', $page['url']);
            return site_url('manage/page/edit/' . $id);
        }

        return '#';
    }

}

if (!function_exists('is_page')) {

    function is_page($page = array()) {
        return (stristr($page['url'], 'page/') === FALSE) ? FALSE : TRUE;
    }

}

if (!function_exists('page_url')) {

    function page_url($page = array()) {
        return site_url('page/' . $page['page_id'] . '/' . url_title($page['page_name'], '-', TRUE) . '.html');
    }

}

if (!function_exists('posts_url')) {

    function posts_url($posts = array()) {
        if (isset($posts['posts_url'])) {
            return $posts['posts_url'];
        } else {
            list($date, $time) = explode(' ', $posts['posts_published_date']);
            list($year, $month, $day) = explode('-', $date);
            return site_url('posts/read/' . $year . '/' . $month . '/' . $day . '/' . $posts['posts_id'] . '/' . url_title($posts['posts_title'], '-', TRUE) . '.html');
        }
    }

}

if (!function_exists('favicon')) {

    function favicon() {
        $CI = & get_instance();
        $CI->load->model('Setting_model');

        $return = $CI->Setting_model->get(array('id' => 1));
        if ($return['setting_value'] != '-') {
            return $return['setting_value'];
        } else {
            return base_url('media/ico/favicon.png');
        }
    }

}

if (!function_exists('template_media_url')) {

    function template_media_url($name = '') {
        return base_url('media/templates/' . config_item('template') . '/' . $name);
    }

}

if (!function_exists('upload_url')) {

    function upload_url($name = '') {
        if (stristr($name, '://') !== FALSE) {
            return $name;
        } else {
            return base_url('uploads/' . $name);
        }
    }

}

if (!function_exists('media_url')) {

    function media_url($name = '') {
        return base_url('media/' . $name);
    }

}