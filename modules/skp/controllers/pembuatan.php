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

    public function index() {
      $data['list_pegawai'] = $this->skp_model->get_all_pegawai();
      $peg_id = $this->input->post('select_peg_id');
      $data['pegawai'] = $this->skp_model->get_pegawai($peg_id);
        // $data['listgol'] = $this->personilmodel->getallgolongan();
        // $data['listeselon'] = $this->personilmodel->geteselon();
        $this->template->load('mainlayout', 'index', $data);
    }

    public function tambahKegiatan(){

     // echo $_POST['pokok'][0]['deskripsi_kegiatan'];
     // echo $_POST['pokok'][1]['deskripsi_kegiatan'];
     // echo $_POST['pokok'][2]['deskripsi_kegiatan'];
     
      $i = 1;
      foreach($_POST['pokok'] as $pokok)
      {
          $pokok = array(
            'c_nik_pgw'=>$this->input->post('nikPegawai'),
            'c_nik_pgw_atasan'=>$this->input->post('nikAtasan'),
            'nomor_kegiatan'=>$_POST['pokok'][$i]['nomor_kegiatan'],
            'deskripsi_kegiatan'=>$_POST['pokok'][$i]['deskripsi_kegiatan'],
            'nilai_angka_kredit'=>$_POST['pokok'][$i]['nilai_angka_kredit'],
            'target_kuantitatif'=>$_POST['pokok'][$i]['target_kuantitatif'],
            'target_kualitas'=>$_POST['pokok'][$i]['target_kualitas'],
            'waktu'=>$_POST['pokok'][$i]['waktu'],
            'biaya'=>$_POST['pokok'][$i]['biaya'],
            'tgl_pengajuan' =>date('Y-m-d'));
          //$this->db->insert('public.tminputskp',$pokok);
          $i++;
      }

      if($_POST['tambahan'][1]['deskripsi_kegiatan']!=null){
        $i = 1;
        foreach($_POST['tambahan'] as $tambahan)
        {
            $tambahan = array(
              'c_nik_pgw'=>$this->input->post('nikPegawai'),
              'c_nik_pgw_atasan'=>$this->input->post('nikAtasan'),
              'nomor_kegiatan'=>$_POST['tambahan'][$i]['nomor_kegiatan'],
              'deskripsi_kegiatan'=>$_POST['tambahan'][$i]['deskripsi_kegiatan'],
              'nilai_angka_kredit'=>$_POST['tambahan'][$i]['nilai_angka_kredit'],
              'target_kuantitatif'=>$_POST['tambahan'][$i]['target_kuantitatif'],
              'target_kualitas'=>$_POST['tambahan'][$i]['target_kualitas'],
              'waktu'=>$_POST['tambahan'][$i]['waktu'],
              'biaya'=>$_POST['tambahan'][$i]['biaya']
              );
            $this->db->insert('public.tminputskp_tmbhn',$tambahan);
            $i++;
        }

      }

      //redirect('/skp/cetak/print_data/' . $this->input->post('nikPegawai'));

      }
}
