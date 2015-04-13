<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** 
* Auth controllers class
 *
 * @package     GROOT
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper('string');
        $this->load->helper('url');
    }

    function index() {
        redirect('gadmin/auth/login');
    }

    function login() {
        if ($this->session->userdata('logged_admin')) {
            redirect('gadmin');
        }
        $this->load->view('user/login');
    }

    // Login Prosessing
    function process_login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $this->db->from('g_user');
            $this->db->where('user_name', $username);
            $this->db->where('user_password', sha1($password));
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->session->set_userdata('logged_admin', TRUE);
                $this->session->set_userdata('admin_role', 'admin');
                $this->session->set_userdata('user_id_admin', $query->row('user_id'));
                $this->session->set_userdata('user_name_admin', $query->row('user_name'));
                $this->session->set_userdata('user_role_admin', $query->row('user_role'));
                $this->session->set_userdata('user_email_admin', $query->row('user_email'));
                $this->session->set_userdata('user_full_name_admin', $query->row('user_full_name'));
                redirect('gadmin');
            } else {
                $this->session->set_flashdata('failed', 'Maaf, Username dan password tidak cocok!');
                redirect('gadmin/auth/login');
            }
        } else {
            $this->session->set_flashdata('failed', 'Maaf, Username dan password belum lengkap!');
            redirect('gadmin/auth/login');
        }
    }

    // Logout Processing
    function logout() {
        $this->session->unset_userdata('logged_admin');
        $this->session->unset_userdata('admin_role');
        $this->session->unset_userdata('user_id_admin');
        $this->session->unset_userdata('user_name_admin');
        $this->session->unset_userdata('user_role_admin');
        $this->session->unset_userdata('user_email_admin');
        $this->session->unset_userdata('user_full_name_admin');
        redirect('gadmin/auth', 'refresh');
    }

}
