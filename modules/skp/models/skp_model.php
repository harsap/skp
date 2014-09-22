<?php

class skp_model extends CI_Model {

  function __construct() {
      parent::__construct();
  }

  function get_all_pegawai(){

    $this->db->select('peg_id, peg_nama, peg_nip_baru');
    $this->db->from('spg_pegawai');
    $this->db->order_by('peg_nip_baru','desc');
    // $this->db->limit('10');
    $query = $this->db->get();

    return $query;
  }

  function get_pegawai($peg_id){
    $this->db->select('*');
    $this->db->from('spg_pegawai');
    $this->db->join('m_spg_jabatan','m_spg_jabatan.jabatan_id = spg_pegawai.jabatan_id');
    $this->db->join('m_spg_unit_kerja','m_spg_unit_kerja.unit_kerja_id = spg_pegawai.unit_kerja_id');
    $this->db->where('peg_id',$peg_id);
    $query = $this->db->get();

    return $query;
    }

  function tambah_kegiatan(){
    $data = array(
            'c_nik_pgw'=>$this->input->post('nikPegawai'),
            'c_nik_pgw_atasan'=>$this->input->post('nikAtasan'),
            'nomor_kegiatan'=>$this->input->post('nomor_kegiatan_1'),
            'deskripsi_kegiatan'=>$this->input->post('ketTugasJab'),
            'nilai_angka_kredit'=>$this->input->post('akJab'),
            'target_kuantitatif'=>$this->input->post('kuantJab'),
            'target_kualitas'=>$this->input->post('kualJab'),
            'waktu'=>$this->input->post('wakJab'),
            'biaya'=>$this->input->post('biaJab'),
            'tgl_pengajuan'=>date('Y-m-d')
            );
    $this->db->insert('public.tminputskp',$data);

    if($this->input->post('ketTugasTam')!=null){
      $data2 = array(
              'c_nik_pgw'=>$this->input->post('nikPegawai'),
              'c_nik_pgw_atasan'=>$this->input->post('nikAtasan'),
              'nomor_kegiatan'=>$this->input->post('nomor_kegiatan_tambahan_1'),
              'deskripsi_kegiatan'=>$this->input->post('ketTugasTam'),
              'nilai_angka_kredit'=>$this->input->post('akTam'),
              'target_kuantitatif'=>$this->input->post('kuantTam'),
              'target_kualitas'=>$this->input->post('kualTam'),
              'waktu'=>$this->input->post('wakTam'),
              'biaya'=>$this->input->post('biaTam')
              );
      $this->db->insert('public.tminputskp_tmbhn',$data2);
    }
  }

}
