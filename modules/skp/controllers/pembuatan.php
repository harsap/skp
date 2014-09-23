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

    public function cetak(){
      $data['list_pegawai'] = $this->skp_model->get_all_pegawai();
      $penilai_id = $this->input->post('nikAtasan');
      $peg_id = $this->input->post('select_peg_id');
      $data['pegawai'] = $this->skp_model->get_pegawai($peg_id);
      $data['kegiatan'] = $this->skp_model->get_kegiatan_to_cetak($penilai_id, $peg_id);
        // $data['listgol'] = $this->personilmodel->getallgolongan();
        // $data['listeselon'] = $this->personilmodel->geteselon();
        $this->template->load('mainlayout', 'print', $data);        
    }

    public function tambahKegiatan(){

      foreach($_POST['pokok'] as $pokok)
      {
          $this->db->insert('public.tminputskp',$pokok);
      }

      if($_POST['tambahan'][1]['deskripsi_kegiatan']!=null){

        foreach($_POST['tambahan'] as $tambahan)
        {
            $this->db->insert('public.tminputskp_tmbhn',$tambahan);
        }

      }

      // debug
      var_dump($_POST['pokok']);

        // OLD CODE
        //
        // $count = count($_POST['pokok']);
        // $data =array();
        // for($i=0; $i<$count; $i++) {
        // $data[$i] = array(
        //         'c_nik_pgw'=>$this->input->post('nikPegawai'),
        //         'c_nik_pgw_atasan'=>$this->input->post('nikAtasan'),
        //         'nomor_kegiatan'=>$_POST['pokok'][$i]['nomor_kegiatan'],
        //         'deskripsi_kegiatan'=>$_POST['pokok'][$i]['deskripsi_kegiatan'],
        //         'nilai_angka_kredit'=>$_POST['pokok'][$i]['nilai_angka_kredit'],
        //         'target_kuantitatif'=>$_POST['pokok'][$i]['target_kuantitatif'],
        //         'target_kualitas'=>$_POST['pokok'][$i]['target_kualitas'],
        //         'waktu'=>$_POST['pokok'][$i]['waktu'],
        //         'biaya'=>$_POST['pokok'][$i]['biaya'],
        //         'tgl_pengajuan'=>date('Y-m-d')
        //         );
        // }
        //
        //   if($_POST['tambahan'][1]['deskripsi_kegiatan']!=null){
        //     $count2 = count($_POST['tambahan']);
        //     $data2 = array();
        //     for($i2=0; $i2<$count2; $i2++) {
        //     $data2[$i2] = array(
        //             'c_nik_pgw'=>$this->input->post('nikPegawai'),
        //             'c_nik_pgw_atasan'=>$this->input->post('nikAtasan'),
        //             'nomor_kegiatan'=>$_POST['tambahan'][$i2]['nomor_kegiatan'],
        //             'deskripsi_kegiatan'=>$_POST['tambahan'][$i2]['deskripsi_kegiatan'],
        //             'nilai_angka_kredit'=>$_POST['tambahan'][$i2]['nilai_angka_kredit'],
        //             'target_kuantitatif'=>$_POST['tambahan'][$i2]['target_kuantitatif'],
        //             'target_kualitas'=>$_POST['tambahan'][$i2]['target_kualitas'],
        //             'waktu'=>$_POST['tambahan'][$i2]['waktu'],
        //             'biaya'=>$_POST['tambahan'][$i2]['biaya']
        //             );
        //   }
        // }
        //   $this->skp_model->tambah_kegiatan($data,$data2);

      }
}
