<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** 
* Profile controllers class
 *
 * @package     GROOT
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Profile_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL) redirect('gadmin/auth/login');
        $this->load->model(array('Activity_log_model', 'User_model'));
        $this->load->helper(array('form', 'url'));
    }

    // Manage view in list
    public function index($offset = NULL) {
        $data['user'] = $this->User_model->get(array('id' => $this->session->userdata('user_id_admin')));
        $data['title'] = 'Detail Profil';
        $data['main'] = 'profile/profile';
        $this->load->view('admin/layout', $data);
    }

    // Add Manage and Update
    public function edit() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'Username', 'required');
        $this->form_validation->set_rules('user_full_name', 'Name', 'required');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            $params['user_id'] = $this->input->post('user_id');
            $params['user_role'] = $this->input->post('user_role');
            $params['user_last_update'] = date('Y-m-d H:i:s');
            $params['user_name'] = $this->input->post('user_name');
            $params['user_full_name'] = $this->input->post('user_full_name');
            $params['user_description'] = $this->input->post('user_description');
            $params['user_email'] = $this->input->post('user_email');
            $status = $this->User_model->add($params);

            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Pengguna',
                        'activity_log_action' => $data['operation'],
                        'activity_log_info' => 'ID:null;Title:' . $params['user_name']
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' Pengguna berhasil');
            redirect('gadmin/profile');
        } else {
            $data['user'] = $this->User_model->get(array('id' => $this->session->userdata('user_id_admin')));
            $data['role'] = $this->User_model->get_role();
            $data['title'] = $data['operation'] . ' User';
            $data['main'] = 'profile/edit';
            $this->load->view('admin/layout', $data);
        }
    }

    // Change Password Manage
    function cpw() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_password', 'Password', 'required|matches[passconf]|min_length[6]|');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]|');
        $this->form_validation->set_rules('user_current_password', 'Old Password', 'required|callback_check_current_password|');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $old_password = $this->input->post('user_current_password');

            $params['user_password'] = sha1($this->input->post('user_password'));
            $status = $this->User_model->change_password($this->session->userdata('user_id_admin'), $params);

            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Pengguna',
                        'activity_log_action' => 'Ganti Password',
                        'activity_log_info' => 'ID:null;Title:' . $this->input->post('user_name')
                    )
            );
            $this->session->set_flashdata('success', 'Ubah password pengguna berhasil');
            redirect('gadmin/profile');
        } else {
            if ($this->User_model->get(array('id' => $this->session->userdata('user_id_admin'))) == NULL) {
                redirect('manage');
            }
            $data['title'] = 'Ganti Password Pengguna';
            $data['main'] = 'profile/change_pass';
            $this->load->view('admin/layout', $data);
        }
    }

    function check_current_password() {

        $pass = $this->input->post('user_current_password');
        $user = $this->User_model->get(array('id' => $this->session->userdata('user_id_admin')));
        if (sha1($pass) == $user['user_password']) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_current_password', 'The Password did not same with the current password');
            return FALSE;
        }
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */
