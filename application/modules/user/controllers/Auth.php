<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		redirect('user/auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('logged')) {
            redirect('manage');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            if ($this->input->post('location')) {
                $lokasi = $this->input->post('location');
            } else {
                $lokasi = NULL;
            }
            $this->login_process($lokasi);
        } else {
            $this->load->view('manage/login');
        }
	}

	public function login_proccess($lokasi = '')
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            
            $user = $this->User_model->get(array('username' => $username, 'password' => sha1($password)));

            if (count($user) > 0) {
            	$this->session->set_userdata('logged', TRUE);
                $this->session->set_userdata('uid', $user[0]['user_id']);
                $this->session->set_userdata('uname', $user[0]['user_name']);
                $this->session->set_userdata('urole', $user[0]['user_role_id']);
                $this->session->set_userdata('uemail', $user[0]['user_email']);
                $this->session->set_userdata('ufullname', $user[0]['user_full_name']);
                if ($lokasi != '') {
                    header("Location:" . htmlspecialchars($lokasi));
                } else {
                    redirect('manage');
                }
            } else {
                if ($lokasi != '') {
                    $this->session->set_flashdata('message', 'Sorry, username and password do not match');
                    header("Location:" . site_url('user/auth/login') . "?location=" . urlencode($lokasi));
                } else {
                    $this->session->set_flashdata('message', 'Sorry, username and password do not match');
                    redirect('user/auth/login');
                }
            }
		} else {
			$this->session->set_flashdata('message', 'Maaf, Username dan password belum lengkap!');
            redirect('user/auth/login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged');
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('uname');
        $this->session->unset_userdata('urole');
        $this->session->unset_userdata('uemail');
        $this->session->unset_userdata('ufullname');
        if ($this->input->post('location')) {
            $lokasi = $this->input->post('location');
        } else {
            $lokasi = NULL;
        }
        header("Location:" . $lokasi);
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/user/controllers/Auth.php */