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

}
