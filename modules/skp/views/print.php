<!-- Modal -->
<div class="modal fade" id="pilih_pegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pilih Pegawai</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="<?php echo base_url();?>skp/pembuatan/cetak" method="post">
        <select name="select_peg_id" width="350px" class="pegawai-select col-sm-12">
        <?php
          foreach ($list_pegawai->result() as $list_pegawai_result) {  ?>
            <option name="select_peg_id" value="<?php echo $list_pegawai_result->peg_id ?>"><?php echo $list_pegawai_result->peg_nama ?> (<?php echo $list_pegawai_result->peg_nip_baru ?>)</option>
          <?php } ?>
        </select>
        <script charset="utf-8">
        $(window).load(function(){
           $(".pegawai-select").chosen();
         });
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Pilih Pegawai</button>
      	</form>
      </div>
    </div>
  </div>
</div>


<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        Cetak SKP
    </li>
</ul>
<div class="row">
	<form role="form" enctype='multipart/form-data'  action="<?php echo base_url();?>skp/pembuatan/tambahKegiatan" method="post">
	<div class="col-sm-12">
	    <h3>
	    	Cetak Formulir Sasaran Kinerja Pegawai (SKP)
	    	<button type="button" data-toggle="modal" data-target="#pilih_pegawai" class="btn btn-md btn-primary pull-right"><i class="glyphicon glyphicon-user"></i> Pilih Pegawai Yang Akan Dinilai</button>
	    </h3><br>
	    	<div class='col-sm-6'>
	    		<?php $user = $this->ion_auth->get_data_user_by_id();
	    			  $listuser = $this->ion_auth->get_user_name_all();
	    		?>
	    		<table class="col-sm-12 table table-bordered" id="tblPenilai">
	    			<tr>
	    			   	<th width="10%">No</th>
	    			   	<th colspan="2">I. Pejabat Penilai</th>
	    			</tr>
	    			<tr>
	    				<td>1</td>
	    			    <td width="20%">Nama</td>
	    			    <td><?php echo $user->peg_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>2</td>
	    			    <td>NIK</td>
	    			    <td><?php echo $user->peg_nip_baru; ?><input type="hidden" name="nikAtasan" value="<?php echo $user->peg_nip_baru; ?>"></td>
	    			</tr>
	    			<tr>
	    			    <td>3</td>
	    			    <td>Jabatan</td>
	    			    <td><?php echo $user->jabatan_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>4</td>
	    			    <td>Pangkat</td>
	    			    <td></td>
	    			</tr>
	    			<tr>
	    			    <td>5</td>
	    			    <td>Unit Kerja</td>
	    			    <td><?php echo $user->unit_kerja_nama; ?></td>
	    			</tr>
	    		</table>
	    	</div>
	    	<div class='col-sm-6'>

          <?php if($this->input->post('select_peg_id')) {
            $pegawai_result = $pegawai->row();
            ?>
	    		<table class="col-sm-12 table table-bordered" id="tblDinilai">
	    			<tr>
	    			   	<th width="10%">No</th>
	    			   	<th colspan="2">II. Pegawai Negeri Sipil Yang Dinilai</th>

	    			</tr>
	    			<tr>
	    				<td>1</td>
	    			    <td width="20%">Nama</td>
	    			    <td id="dinilaiName"><?php echo $pegawai_result->peg_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>2</td>
	    			    <td>NIK</td>
	    			    <td id="dinilaiNik"><?php echo $pegawai_result->peg_nip_baru; ?><input type="hidden" name="nikPegawai" value="<?php echo $pegawai_result->peg_nip_baru; ?>"></td>
	    			</tr>
	    			<tr>
	    			    <td>3</td>
	    			    <td>Jabatan</td>
	    			    <td id="dinilaiJab"><?php echo $pegawai_result->jabatan_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>4</td>
	    			    <td>Pangkat</td>
	    			    <td id="dinilaiPan"></td>
	    			</tr>
	    			<tr>
	    			    <td>5</td>
	    			    <td>Unit Kerja</td>
	    			    <td id="dinilaiUK"><?php echo $pegawai_result->unit_kerja_nama; ?></td>
	    			</tr>
	    		</table>
          <?php } else { ?>
            <table class="col-sm-12 table table-bordered" id="tblDinilai">
              <tr>
                   <th width="10%">No</th>
                   <th colspan="2">II. Pegawai Negeri Sipil Yang Dinilai</th>

              </tr>
              <tr>
                <td>1</td>
                <td width="20%">Nama</td>
                <td rowspan="5">
                  <i>Pilih Pegawai Terlebih dahulu</i>
                </td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>NIK</td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>Jabatan</td>
              </tr>
              <tr>
                  <td>4</td>
                  <td>Pangkat</td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>Unit Kerja</td>
              </tr>
            </table>
          <?php } ?>
	   		</div>
	</div>
</div>
<div class='row'>
	<div class='col-sm-12'>
	    <h3>
	    	Kegiatan Tugas Pokok Jabatan
	    </h3>
	    <hr>
      <?php if($this->input->post('select_peg_id')) { ?>
			<table class="table table-bordered table-stripped" id="tblJabatan">
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
			 <tr>
		<?php foreach ($kegiatan->result as $kegiatan_result) { ?>
          <td><input type="text" class="form-control col-sm-12" name="pokok[1][nomor_kegiatan]" value="1"><?php echo $kegiatan_result->$nomor_kegiatan ?></td>
          <td><input type="text" name="pokok[1][deskripsi_kegiatan]" class="form-control col-sm-12" required></td>
          <td><input type="text" name="pokok[1][nilai_angka_kredit]" class="form-control col-sm-12"></td>
          <td><input type="text" name="pokok[1][target_kuantitatif]" class="form-control col-sm-12"></td>
          <td><input type="text" name="pokok[1][target_kualitas]" class="form-control col-sm-12"></td>
          <td><input type="text" name="pokok[1][waktu]" class="form-control col-sm-12"></td>
          <td><input type="text" name="pokok[1][biaya]" class="form-control col-sm-12"></td>
        </tr>
			</table>
    <?php } } else { ?>
      <i>Silahkan pilih pegawai terlebih dahulu</i>
    <?php } ?>
  	</div>
	<div class="col-sm-12">
	    <h3>Kegiatan Tugas Pokok Tambahan</h3>
	    <hr>
      <?php if($this->input->post('select_peg_id')) { ?>
			<table class="table table-bordered table-stripped" id="tblTambahan">
			  <tr>
			    <th width="20px" rowspan="2">No.</th>
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
			  <tr>
			    <td><input type="text" class="form-control col-sm-12" name="tambahan[1][nomor_kegiatan]" value="1"></td>
			    <td><input type="text" name="tambahan[1][deskripsi_kegiatan]" class="form-control col-sm-12"></td>
			    <td><input type="text" name="tambahan[1][nilai_angka_kredit]" class="form-control col-sm-12"></td>
			    <td><input type="text" name="tambahan[1][target_kuantitatif]" class="form-control col-sm-12"></td>
			    <td><input type="text" name="tambahan[1][target_kualitas]" class="form-control col-sm-12"></td>
			    <td><input type="text" name="tambahan[1][waktu]" class="form-control col-sm-12"></td>
			    <td><input type="text" name="tambahan[1][biaya]" class="form-control col-sm-12"></td>
			  </tr>
			</table>
	</div>
		<div class="col-sm-12">
			<div class="form-group pull-right">
				<button class="btn btn-success btn-lg"><i class="glyphicon glyphicon-print"></i> Cetak</button>
				<!--button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan Data</button>
				<button type="reset" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-trash"></i> Ulangi</button-->
			</div>
		</div>
    <?php } else { ?>
      <i>Silahkan pilih pegawai terlebih dahulu</i>
    <?php } ?>
	</form>
</div>

<script src="../static/assets/plugins/bootstrap/js/bootstrap2-typeahead.js"></script>
