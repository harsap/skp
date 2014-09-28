<?php

class Jabatanmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbanyakjenisjabatan($jabatan_id = null, $jabatan_nama = null, $struk = null, $fu = null, $ft = null, $satker = null, $eselon = null) {
        $sql = " SELECT count(DISTINCT( a.jabatan_id)) as banyak
FROM public.m_spg_jabatan a
     left join m_spg_jabatan_kategori b on b.jabkat_id = a.jabkat_id
     left join m_spg_jabatan_rumpun c on c.rumpun_id = a.rumpun_id 
	 left join m_spg_satuan_kerja k on  k.satuan_kerja_id =  a.satuan_kerja_id  and  k.status = 1
                    where 1=1  ";

        $jabatan_nama = rawurldecode($jabatan_nama);
        if (isset($jabatan_nama) && $jabatan_nama != '-') {
            $sql .= " and  upper(a.jabatan_nama)  like '%'||upper('$jabatan_nama')||'%'  ";
        }

        if (isset($jabatan_id) && $jabatan_id != '-') {
            $sql .= " and  a.jabatan_id = '" . $jabatan_id . "'  ";
        }
        if (isset($eselon) && $eselon != '') {
            $sql .= " and   a.eselon_id in ($eselon)  ";
        }

        if ($struk == '2' || $fu == '4' || $ft == '3') {
            $sql .= "  and   cast( a.jabatan_jenis as char) in ('$struk','$fu','$ft')    ";
        }

//echo $sql;

        $query = $this->db->query($sql);
        return $query->row()->banyak;
    }

    function getjenisjabatan($jabatan_id = null, $jabatan_nama = null, $struk = null, $fu = null, $ft = null, $satker = null, $limit = null, $offset = null, $orderby = null, $jenisorder = 'ASC', $eselon = null) {
        $sql = " SELECT a.jabatan_id,
       a.gol_id_awal,
       a.eselon_id, 
       a.rumpun_id,
       a.jabkat_id,
       a.gol_id_akhir,
       a.jabatan_nama,
       b.jabkat_nm,
       c.rumpun_nm, 
       (case
       when a.jabatan_jenis = '1' then 'Politik'
       when a.jabatan_jenis = '2' then 'Struktural'
       when a.jabatan_jenis = '3' then 'Fungsional Tertentu'
       when a.jabatan_jenis = '4' then 'Fungsional Umum'
       end) as jabatan_jenis,a.jabatan_jenis as id_jabatan_jenis,
       a.jabatan_type,
       a.jabatan_bup,f.eselon_nm,count(g.peg_id) as jumlah_rill,mx.kebutuhan as kebutuhan,mx.peta_jabatan_id
       FROM public.m_spg_jabatan a
     left join spg_pegawai g on g.jabatan_id = a.jabatan_id
     left join m_spg_jabatan_kategori b on b.jabkat_id = a.jabkat_id
     left join m_spg_jabatan_rumpun c on c.rumpun_id = a.rumpun_id 
     left join m_spg_eselon f on f.eselon_id = a.eselon_id
     left join mx_spg_peta_jabatan mx  
	 on mx.jabatan_id = a.jabatan_id
	  left join m_spg_satuan_kerja k on  k.satuan_kerja_id =  g.satuan_kerja_id  and  k.status = 1
	 
                    where 1=1   ";

        $jabatan_nama = rawurldecode($jabatan_nama);
        if (isset($jabatan_nama) && $jabatan_nama != '-' && $jabatan_nama != '') {
            $sql .= " and  upper(a.jabatan_nama)  like '%'||upper('$jabatan_nama')||'%'  ";
        }

        if (isset($jabatan_id) && $jabatan_id != '-') {
            $sql .= " and  a.jabatan_id = '" . $jabatan_id . "'  ";
        }
        if ($struk == '2' || $fu == '4' || $ft == '3') {
            $sql .= "  and   cast( a.jabatan_jenis as char) in ('$struk','$fu','$ft')    ";
        }

        if (isset($eselon) && $eselon != '') {
            $sql .= " and   a.eselon_id in ($eselon)  ";
        }

        $sql .= "   group by a.jabatan_id,
       a.gol_id_awal,
       a.eselon_id, 
       a.rumpun_id,
       a.jabkat_id,
       a.gol_id_akhir,
       a.jabatan_nama,
       b.jabkat_nm,
       c.rumpun_nm, a.jabatan_jenis ,
       a.jabatan_type,
       a.jabatan_bup,f.eselon_nm,mx.kebutuhan,mx.peta_jabatan_id ";
        if (isset($orderby) && $orderby != '') {
            switch ($orderby) {
                case 0:
                    $orderby = 'jabatan_nama';
                    break;
                case 1:
                    $orderby = 'jabatan_jenis';
                    break;
                case 2:
                    $orderby = 'a.eselon_id';
                    break;
                case 3:
                    $orderby = 'a.jabatan_bup';
                    break;
                case 4:
                    $orderby = 'jumlah_rill';
                    break;
            }
            $sql .= "   order by $orderby  $jenisorder    ";
        }

        if (isset($limit) && isset($offset)) {
            $sql .= "  limit $limit offset  $offset   ";
        }
//echo $sql;

        $query = $this->db->query($sql);
        // print_r( $query->result());
        return $query->result();
    }

}
