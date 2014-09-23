<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Description of pembuatan
 *
 * @author hari
 */
class cetak extends CI_Controller{
   public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('skp_model', 'skp_model');
    }

    public function index() {
      $data['list_pegawai'] = $this->skp_model->get_all_pegawai();
      $peg_id = $this->input->post('select_peg_id');
      $data['pegawai'] = $this->skp_model->get_pegawai($peg_id);
        // $data['listgol'] = $this->personilmodel->getallgolongan();
        // $data['listeselon'] = $this->personilmodel->geteselon();
        $this->template->load('mainlayout', 'print', $data);
    }

}
