<html>
  <head>
    <title>Cetak Data "Kegiatan Tugas Pokok Jabatan"</title>
    <link rel="stylesheet" href="<?php echo base_url();?>static/assets/plugins/bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body onload="window.print()">
    <div class="container">
      <?php $pegawai_result = $pegawai->row(); ?>
      <h1>Pegawai Negeri Sipil Yang Dinilai</h1>
      <table class="col-sm-12 table table-bordered" id="tblDinilai">
        <tr>
            <td width="20%">Nama</td>
            <td id="dinilaiName">: <?php echo $pegawai_result->peg_nama; ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td id="dinilaiNik">: <?php echo $pegawai_result->peg_nip_baru; ?><input type="hidden" name="nikPegawai" value="<?php echo $pegawai_result->peg_nip_baru; ?>"></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td id="dinilaiJab">: <?php echo $pegawai_result->jabatan_nama; ?></td>
        </tr>
        <tr>
            <td>Pangkat</td>
            <td id="dinilaiPan">: -</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td id="dinilaiUK">: <?php echo $pegawai_result->unit_kerja_nama; ?></td>
        </tr>
      </table>

    <h3>Kegiatan Tugas Pokok Jabatan</h3>
      <table class="table table-bordered table-stripped" border="1">
        <tr>
          <th width="1%" rowspan="2">No.</th>
          <th rowspan="2" width="50%">Kegiatan Tugas Pokok Jabatan</th>
          <th rowspan="2">AK</th>
          <th colspan="4">Target</th>
        </tr>
        <tr>
          <td>Kuant / Output</td>
          <td>Kual / Mutu</td>
          <td>Waktu</td>
          <td>Biaya</td>
        </tr>
        <?php foreach ($skp_pokok->result() as $kegiatan_result) {?>
          <tr>
            <td><?php echo $kegiatan_result->nomor_kegiatan; ?></td>
            <td><?php echo $kegiatan_result->deskripsi_kegiatan; ?></td>
            <td><?php echo $kegiatan_result->nilai_angka_kredit; ?></td>
            <td><?php echo $kegiatan_result->target_kuantitatif; ?></td>
            <td><?php echo $kegiatan_result->target_kualitas; ?></td>
            <td><?php echo $kegiatan_result->waktu; ?></td>
            <td><?php echo $kegiatan_result->biaya; ?></td>
          </tr>
        <?php } ?>
      </table>
      <?php if ($skp_tambahan->num_rows > 0) { ?>
      <h3>Kegiatan Tugas Pokok Tambahan</h3>
      <table class="table table-bordered table-stripped" border="1">
        <tr>
          <th width="1%" rowspan="2">No.</th>
          <th rowspan="2" width="50%">Kegiatan Tugas Pokok Tambahan</th>
          <th rowspan="2">AK</th>
          <th colspan="4">Target</th>
        </tr>
        <tr>
          <td>Kuant / Output</td>
          <td>Kual / Mutu</td>
          <td>Waktu</td>
          <td>Biaya</td>
        </tr>
        <?php foreach ($skp_tambahan->result() as $kegiatan_result) {?>
          <tr>
            <td><?php echo $kegiatan_result->nomor_kegiatan; ?></td>
            <td><?php echo $kegiatan_result->deskripsi_kegiatan; ?></td>
            <td><?php echo $kegiatan_result->nilai_angka_kredit; ?></td>
            <td><?php echo $kegiatan_result->target_kuantitatif; ?></td>
            <td><?php echo $kegiatan_result->target_kualitas; ?></td>
            <td><?php echo $kegiatan_result->waktu; ?></td>
            <td><?php echo $kegiatan_result->biaya; ?></td>
          </tr>
        <?php }?>
      </table>
      <?php }?>
    </div>
  </body>
</html>
