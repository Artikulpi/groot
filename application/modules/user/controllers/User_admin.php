<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** 
* User controllers class
 *
 * @package     GROOT
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class User_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL)
            redirect('user/auth/login');
        $this->load->model('User_model');
        $this->load->model('Activity_log_model');
        $this->load->helper(array('form', 'url'));
    }

    // User_customer view in list
    public function index($offset = NULL) {

        $this->load->library('pagination');

        $data['user'] = $this->User_model->get(array('limit' => 10, 'offset' => $offset));
        $data['title'] = 'Pengguna';
        $data['main'] = 'user/user_list';
        $config['base_url'] = site_url('user/index');
        $config['total_rows'] = count($this->User_model->get());
        $this->pagination->initialize($config);

        $this->load->view('admin/layout', $data);
    }

    // Add User_customer and Update
    public function add($id = NULL) {
        $this->load->library('form_validation');

        if (!$this->input->post('user_id')) {
            $this->form_validation->set_rules('user_password', 'password', 'required|matches[passconf]|min_length[6]|');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]|max_length[20]|');
            $this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[g_user.user_name]');
        }

        $this->form_validation->set_rules('user_full_name', 'Name', 'required');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        $data['operation'] = is_null($id) ? 'Tambah' : 'Sunting';

        if ($_POST AND $this->form_validation->run() == TRUE) {

            if ($this->input->post('user_id')) {
                $params['user_id'] = $this->input->post('user_id');
            } else {
                $params['user_name'] = $this->input->post('user_name');
                $params['user_input_date'] = date('Y-m-d H:i:s');
                $params['user_password'] = sha1($this->input->post('user_password'));
            }
            $params['user_role'] = $this->input->post('role_id');
            $params['user_last_update'] = date('Y-m-d H:i:s');
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
                        'activity_log_info' => 'ID:null;Title:' . $this->input->post('user_name')
                    )
            );

            $this->session->set_flashdata('success', $data['operation'] . ' Pengguna berhasil');
            redirect('gadmin/user');
        } else {
            if ($this->input->post('user_id')) {
                redirect('gadmin/user/edit/' . $this->input->post('user_id'));
            }

            // Edit mode
            if (!is_null($id)) {
                if ($this->User_model->get(array('id' => $id)) == NULL) {
                    redirect('gadmin/user');
                } else {
                    $data['user'] = $this->User_model->get(array('id' => $id));
                }
            }
            $data['role'] = $this->User_model->get_role();
            $data['button'] = ($id == $this->session->userdata('user_id_admin')) ? 'Ubah' : 'Reset';
            $data['title'] = $data['operation'] . ' Pengguna';
            $data['main'] = 'user/user_add';
            $this->load->view('admin/layout', $data);
        }
    }

    function detail($id = NULL) {
        if ($this->User_model->get(array('id' => $id)) == NULL) {
            redirect('gadmin/user');
        }
        $data['user'] = $this->User_model->get(array('id' => $id));
        $data['title'] = 'Detail pengguna';
        $data['main'] = 'user/user_detail';
        $this->load->view('admin/layout', $data);
    }

    function rpw($id = NULL) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_password', 'Password', 'required|matches[passconf]|min_length[6]|');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]|');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        if ($_POST AND $this->form_validation->run() == TRUE) {
            $id = $this->input->post('user_id');
            $params['user_password'] = sha1($this->input->post('user_password'));
            $status = $this->User_model->change_password($id, $params);

            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Pengguna',
                        'activity_log_action' => 'Reset Password',
                        'activity_log_info' => 'ID:null;Title:' . $this->input->post('user_name')
                    )
            );
            $this->session->set_flashdata('success', 'Reset password pengguna berhasil');
            redirect('gadmin/user');
        } else {
            if ($this->User_model->get(array('id' => $id)) == NULL) {
                redirect('gadmin/user');
            }
            $data['user'] = $this->User_model->get(array('id' => $id));
            $data['title'] = 'Ganti Password Pengguna';
            $data['main'] = 'user/change_pass';
            $this->load->view('admin/layout', $data);
        }
    }

    // Delete User
    public function delete($id = NULL) {
        if ($this->User_model->get(array('id' => $id)) == NULL) {
            redirect('gadmin/user');
        }
        if ($_POST) {

            $this->User_model->delete($this->input->post('del_id'));
            // activity log
            $this->Activity_log_model->add(
                    array(
                        'activity_log_date' => date('Y-m-d H:i:s'),
                        'user_id' => $this->session->userdata('user_id_admin'),
                        'activity_log_module' => 'Pengguna',
                        'activity_log_action' => 'Hapus',
                        'activity_log_info' => 'ID:' . $this->input->post('del_id') . ';Title:' . $this->input->post('del_name')
                    )
            );
            $this->session->set_flashdata('success', 'Hapus pengguna berhasil');
            redirect('gadmin/user');
        } elseif (!$_POST) {
            $this->session->set_flashdata('delete', 'Delete');
            redirect('gadmin/user/edit/' . $id);
        }
    }

}

/* End of file user.php */
/* Location: ./application/controllers/ccp/user.php */
