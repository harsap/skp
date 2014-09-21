<?php

class skp_model extends CI_Model {

  function __construct() {
      parent::__construct();
  }

  function get_all_pegawai(){

    $this->db->select('peg_id, peg_nama, peg_nip_baru');
    $this->db->from('spg_pegawai');
    $this->db->order_by('peg_nip_baru','desc');
    $this->db->limit('10');
    $query = $this->db->get();

    return $query;
  }


}
