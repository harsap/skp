<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Jabatancontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->ion_auth->check_uri_permissions();
        $this->load->model('Jabatanmodel', 'jabatanmodel');
        $this->load->model('personil/Personilmodel', 'personilmodel');
    }

    public function index() {

        $data['listeselon'] = $this->personilmodel->geteselon();
        $this->template->load('mainlayout', 'index', $data);
    }

    public function listjenisjabatanjson($jabatan_id = null, $jabatan_nama = null, $jabatan_jenis = null, $satker = null) {
        $jabatan_nama = $this->input->post('nama');
        //$jabatan_jenis = $_GET['jabjenis'];
        $eselon =  $this->input->post('eselon');
        $offset = $this->input->post('iDisplayStart');
        $limit = $this->input->post('iDisplayLength');
        $struk = $this->input->post('struk');
        $fu = $this->input->post('fu');
        $ft = $this->input->post('ft');
        $banyak = $this->jabatanmodel->getbanyakjenisjabatan($jabatan_id, $jabatan_nama, $struk, $fu, $ft, $satker, $eselon);
        $arr["sEcho"] = intval($this->input->post('sEcho'));
        $arr["iTotalRecords"] = $banyak;
        $arr["iTotalDisplayRecords"] = $banyak;
        $arr["aaData"] = $this->jabatanmodel->getjenisjabatan($jabatan_id, $jabatan_nama, $struk, $fu, $ft, $satker, $limit, $offset, $this->input->post('iSortCol_0'), $this->input->post('sSortDir_0'), $eselon);
        echo json_encode($arr);
    }

}
