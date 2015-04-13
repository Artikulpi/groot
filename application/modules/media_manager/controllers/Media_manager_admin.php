<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/** 
* Media manager controllers class
 *
 * @package     GROOT
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

ini_set('display_errors', true);

class Media_manager_admin extends CI_Controller {

    private $_select = '*';

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged_admin') == NULL) redirect('gadmin/auth/login');

        $this->load->model('Mediamanager_model');
        $this->load->model('Activity_log_model');
    }

    public function index($offset = 0) {

        $this->load->library('pagination');

        $data['images'] = $this->Mediamanager_model->getImage(array('limit' => 16, 'offset' => $offset));
        $data['total_images'] = $this->Mediamanager_model->count();

        $config['base_url'] = site_url('gadmin/media_manager/index/');
        $config['total_rows'] = $data['total_images'];
        $config['per_page'] = 16;

        $this->pagination->initialize($config);
        $data['title'] = 'Media manager';
        $data['main'] = 'media_manager/list';

        // list album
        $this->load->model('Mediaalbum_model');
        $data['albums'] = $this->Mediaalbum_model->gets($offset);

        $this->load->view('admin/layout', $data);
    }

    public function album($album_id, $offset = 0) {

        $this->load->library('pagination');

        $images = $this->Mediamanager_model->getFromAlbum($album_id, $offset);

        $data['images'] = $images['data'];
        $data['total_images'] = $images['count']; //$this->Mediamanager_model->count();

        $config['base_url'] = site_url('gadmin/media_album/index/');
        $config['total_rows'] = $data['total_images'];
        $config['per_page'] = $this->Mediamanager_model->limit;

        $this->pagination->initialize($config);
        $data['id'] = $album_id;
        $data['main'] = 'media_manager/list';

        // list album
        $this->load->model('Mediaalbum_model');
        $data['albums'] = $this->Mediaalbum_model->gets($offset);

        $this->load->view('admin/layout', $data);
    }

    public function add($id) {

        $id = (int) $id;

        $image = $this->Mediamanager_model->get($id);

        if ($image) {
            $imgInfo = unserialize($image['info']);
            $exists = is_file($imgInfo['full_path']);
        } else {
            $exists = false;
        }

        if ($exists) {
            if (isset($_POST['id'])) {
                $this->load->library('ImageProcessor', array($imgInfo['full_path']));
                $ok = true;

                $width = $this->input->post('width', false);
                $height = $this->input->post('height', false);
                $x = $this->input->post('x', false);
                $y = $this->input->post('y', false);

                switch ($_POST['action']) {
                    case 'crop':
                        $ok = $width and $height and $x and $y;
                        if ($ok) {
                            $this->imageprocessor->crop($width, $height, $x, $y);
                        } else {
                            $this->session->set_flashdata('error', 'Invalid data post.');
                        }
                        break;
                    case 'resize':
                        $ok = $width and $height;
                        if ($ok) {
                            $this->imageprocessor->resize($width, $height);
                        } else {
                            $this->session->set_flashdata('error', 'Invalid data post.');
                        }
                        break;
                    case 'rotate':
                    // $this->imageprocessor->rotate(new ImagickPixel('none'), $degrees);
                    default:
                        $ok = false;
                        break;
                }

                if ($ok) {
                    // create backup
                    $this->_createBackup($imgInfo['file_path'], $image['name']);
                    $this->imageprocessor->save();

                    $this->session->set_flashdata('success', 'Success editing file.');

                    redirect('gadmin/media_manager/');
                } else {
                    $this->session->set_flashdata('error', 'Failed to save image.');
                }
            }
        } else {
            redirect('gadmin/media_manager');
        }


        $data['image'] = $image;

        $data['main'] = 'media_manager/edit';

        $this->load->view('admin/layout', $data);
    }

    public function restore($id) {

        $id = (int) $id;

        $image = $this->Mediamanager_model->get($id);
        $message = array(
            'type' => 'danger',
            'data' => 'Image not found.'
        );

        if ($image) {
            $backupName = FCPATH . 'uploads/bak/' . $image['name'];
            $restoreName = FCPATH . 'uploads/' . $image['name'];

            if (@rename($backupName, $restoreName)) {
                $message = array(
                    'type' => 'success',
                    'data' => 'Success restoring file.'
                );
            } else {
                $message['data'] = 'Failed to restoring file.';
            }
        }

        $this->session->set_flashdata('message', $message);

        redirect('gadmin/media_manager');
    }

    public function upload() {
        $config['upload_path'] = FCPATH . './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx';
        //$config['file_name'] = 'mediamanager-'.date('Y-m-d_His');
        //~ $config['max_size']	= '100';
        //~ $config['max_width']  = '1024';
        //~ $config['max_height']  = '768';

        $this->load->library('upload', $config);
        $label = $this->input->post('img_label');
        $album_id = $this->input->post('album_id');


        if (strlen($label) > 0) {

            if (!$this->upload->do_upload('fn')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {

                $info = $this->upload->data();
                $now = new Datetime('now');

                $isfile = 0;
                $ftype = explode('/', $info['file_type']);
                if (count($ftype) > 0) {
                    if ($ftype[0] != 'image')
                        $isfile = 1;
                }


                $data = array(
                    'label' => $label,
                    'name' => $info['file_name'],
                    'type' => $info['file_type'],
                    'isfile' => $isfile,
                    'album_id' => $album_id,
                    'info' => serialize($info),
                    'upload_at' => $now->format('Y-m-d H:i:s')
                );

                $this->Mediamanager_model->add($data);
                $this->session->set_flashdata('success', 'Success upload file.');
            }
        }
        else {
            $this->session->set_flashdata('error', 'Silahkan isi kolom label');
        }
        if ($this->input->post('id')) {
            redirect('gadmin/media_manager/album/' . $this->input->post('id'));
        } else {
            redirect('gadmin/media_manager');
        }
    }

    public function uploadAjax() {

        $data = array();
        $error = 1;
        $files = array();

        $config['upload_path'] = FCPATH . './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx';
        //$config['file_name'] = 'mediamanager-'.date('Y-m-d_His');
        //~ $config['max_size']	= '100';
        //~ $config['max_width']  = '1024';
        //~ $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if (isset($_GET['files'])) {

            $ok = $this->upload->do_upload('files');

            if ($ok) {
                $info = $this->upload->data();
                $now = new Datetime('now');

                $isfile = 0;
                $ftype = explode('/', $info['file_type']);
                if (count($ftype) > 0) {
                    if ($ftype[0] != 'image')
                        $isfile = 1;
                }

                $data = array(
                    'album_id' => '0',
                    'label' => '',
                    'name' => $info['file_name'],
                    'type' => $info['file_type'],
                    'isfile' => $isfile,
                    'info' => serialize($info),
                    'upload_at' => $now->format('Y-m-d H:i:s')
                );

                $this->Mediamanager_model->add($data);
                $data = array('files' => $this->upload->data());
            }
            else {
                $data = array('error' => $this->upload->display_errors());
            }
        } else {
            $data = array('success' => 'Form was submitted', 'formData' => $this->upload->data());
        }

        echo json_encode($data);
    }

    public function popup($keyword = '', $offset = 0) {
        /* if (! isset ($_SERVER['HTTP_REFERER'])) {
          redirect('gadmin/media_manager');
          } */

        /* $images = $this->Mediamanager_model->gets(null);
          $data = [
          'images' => $images,
          'total' => $this->Mediamanager_model->count(),
          ]; */

        //$this->load->view('gadmin/media_manager/popup', $data);
        /*
         * Rewrite
         */
        $data = array();

        $this->load->view('media_manager/popupex', $data);
    }

    public function viewapp($id) {
        $image = $this->Mediamanager_model->get($id);

        $filename = $image['name'];
        $file = upload_url($filename);

        //header('Content-type: application/pdf');
        header('Content-type: ' . $image['type']);
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        @readfile($file);
    }

    public function listAjax($offset = 1, $isfile = 0) {

        $this->load->library('pagination');
        $keyword = '';
        $this->Mediamanager_model->limit = $limit = 15;
        $offset_ex = ($offset - 1) * $limit;
        $params['isfile'] = $isfile;

        $images = $this->Mediamanager_model->gets($offset_ex, $keyword, $params);
        if ($images['count'] > 0) {
            foreach ($images['data'] as $index => $value) {
                if ($value['info'] != '0')
                    $images['data'][$index]['info_ex'] = unserialize($value['info']);
            }
        }

        $data['images'] = $images['data'];
        $data['total_images'] = $total = $this->Mediamanager_model->count($isfile);
        $data['pages'] = $this->Mediamanager_model->createPage($offset, $this->Mediamanager_model->limit, $total);

        //if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");

        $config['base_url'] = site_url('gadmin/media_manager/popup/');
        $config['total_rows'] = $data['total_images'];
        $config['per_page'] = $this->Mediamanager_model->limit;

        $this->pagination->initialize($config);
        $data['main'] = 'media_manager/list';

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
    }

    private function _createBackup($path, $image) {

        $backupPath = $path . '/bak';
        if (!is_dir($backupPath)) {
            mkdir($backupPath);
        }

        $backupName = $path . 'bak/' . $image;
        return copy($path . $image, $backupName);
    }

    public function tmp() {
        $this->Mediamanager_model->tempCreateTable();
    }

    public function delete($id = NULL) {

        $image = $this->Mediamanager_model->get($id);
        $this->Mediamanager_model->delete($id);
        // activity log
        $this->Activity_log_model->add(
                array(
                    'activity_log_date' => date('Y-m-d H:i'),
                    'user_id' => $this->session->userdata('user_id_admin'),
                    'activity_log_module' => 'Media manager',
                    'activity_log_action' => 'Hapus',
                    'activity_log_info' => 'ID:' . $id . ';Title:' . $id
                )
        );

        $this->session->set_flashdata('success', 'Hapus data berhasil');
        redirect('gadmin/media_manager');
    }

}
