<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper(array('string', 'url'));
	}

	public function index()
    {
        redirect('manage/auth/login');
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
            }
            else {
                $lokasi = NULL;
            }
            $this->proccess_login($lokasi);
        } else {
            $this->load->view('user/login');
        }
    }

    public function proccess_login($lokasi = '')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $this->db->from('user');
            $this->db->where('user_name', $username);
            $this->db->where('user_password', sha1($password));
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                $this->session->set_userdata('logged', TRUE);
                $this->session->set_userdata('uid', $query->row('user_id'));
                $this->session->set_userdata('uname', $query->row('user_name'));
                $this->session->set_userdata('uroleid', $query->row('user_role_id'));
                $this->session->set_userdata('uemail', $query->row('user_email'));
                $this->session->set_userdata('ufullname', $query->row('user_full_name'));

                if ($lokasi != '') {
                    header("Location:" . htmlspecialchars($lokasi));
                } else {
                    redirect('manage');
                }
            } else {
                if ($lokasi != '') {
                    $this->session->set_flashdata('failed', 'Maaf, username atau password salah!');
                    header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($lokasi));
                } else {
                    $this->session->set_flashdata('failed', 'Maaf, username atau password salah!');
                    redirect('manage/auth/login');
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'Maaf, Username dan password belum lengkap!');
            redirect('manage/auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('uname');
        $this->session->unset_userdata('uroleid');
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