<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of pembuatan
 *
 * @author hari
 */
class pembuatan extends CI_Controller{
   public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('skp_model', 'skp_model');
    }
    public function index($peg_id = null) {
      $data['list_pegawai'] = $this->skp_model->get_all_pegawai();
      $data['pegawai'] = $this->skp_model->get_pegawai($peg_id);
      $data['peg_id'] = $this->uri->segment(4);
        // $data['listgol'] = $this->personilmodel->getallgolongan();
        // $data['listeselon'] = $this->personilmodel->geteselon();
        $this->template->load('mainlayout', 'index', $data);
    }

}
