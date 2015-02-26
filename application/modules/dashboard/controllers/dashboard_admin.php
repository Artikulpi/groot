<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
* Dashboard controllers class
 *
 * @package     GROOT
 * @subpackage  Controllers
 * @category    Controllers
 * @author      Sistiandy Syahbana nugraha <sistiandy.web.id>
 */

class Dashboard_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_admin') == NULL) redirect('gadmin/auth/login');
    }

    // Dashboard View
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['main'] = 'dashboard/dashboard';
        $this->load->view('admin/layout', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
