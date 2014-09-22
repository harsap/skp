<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        Pembuatan SKP
    </li>
</ul>
<div class="row">
	<form action="#" method="post">
	<div class="col-sm-12">
	    <h3>
	    	Form Entry Formulir Sasaran Kinerja Pegawai (SKP)
	    	<button type="button" data-toggle="modal" data-target="#pilih_pegawai" class="btn btn-md btn-primary pull-right"><i class="glyphicon glyphicon-user"></i> Pilih Pegawai Yang Akan Dinilai</button>
	    </h3><br>
            <!-- Modal -->
            <div class="modal fade" id="pilih_pegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pilih Pegawai</h4>
                  </div>
                  <div class="modal-body">
                    <select name="select_pegawai_dropdown" width="350px" class="pegawai-select col-sm-12">
                    <?php
                      foreach ($list_pegawai->result() as $list_pegawai_result) {  ?>
                        <option value="<?php echo $list_pegawai_result->peg_nip_baru ?>"><?php echo $list_pegawai_result->peg_nama ?> (<?php echo $list_pegawai_result->peg_nip_baru ?>)</option>
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
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>


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
	    			    <td><?php echo $user->peg_nip_baru; ?></td>
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
	    		<table class="col-sm-12 table table-bordered" id="tblDinilai">
	    			<tr>
	    			   	<th width="10%">No</th>
	    			   	<th colspan="2">II. Pegawai Negeri Sipil Yang Dinilai</th>

	    			</tr>
	    			<tr>
	    				<td>1</td>
	    			    <td width="20%">Nama</td>
	    			    <td id="dinilaiName"></td>
	    			</tr>
	    			<tr>
	    			    <td>2</td>
	    			    <td>NIK</td>
	    			    <td id="dinilaiNik"></td>
	    			</tr>
	    			<tr>
	    			    <td>3</td>
	    			    <td>Jabatan</td>
	    			    <td id="dinilaiJab"></td>
	    			</tr>
	    			<tr>
	    			    <td>4</td>
	    			    <td>Pangkat</td>
	    			    <td id="dinilaiPan"></td>
	    			</tr>
	    			<tr>
	    			    <td>5</td>
	    			    <td>Unit Kerja</td>
	    			    <td id="dinilaiUK"></td>
	    			</tr>
	    		</table>
	   		</div>
	</div>
</div>
<div class='row'>
	<div class='col-sm-12'>
	    <h3>
	    	Kegiatan Tugas Pokok Jabatan
	    </h3>
	    <hr>
			<table class="table table-bordered table-stripped" id="tblJabatan">
			  <tr>
			 	<th colspan="7">
			 		<div class='form-group pull-right'>
				 		<button onclick="addRowToTable();" type="reset" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-plus"></i> Tambah Baris Baru</button>
				 		<a onclick="removeRowFromTable();" type="reset" class="btn btn-warning btn-sm "><i class="glyphicon glyphicon-minus"></i> Hapus Baris</a>
			 		</div>
			 	</th>
			  </tr>
			  <tr>
			    <th width="1%" rowspan="2">No.</th>
			    <th rowspan="2" width="50%">Kegiatan Tugaas Pokok Jabatan</th>
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
			    <td>1</td>
			    <td><input type="text" name="" class="form-control col-sm-12"></td>
			    <td><input type="text" name="" class="form-control col-sm-12"></td>
			    <td><input type="text" name="" class="form-control col-sm-12"></td>
			    <td><input type="text" name="" class="form-control col-sm-12"></td>
			    <td><input type="text" name="" class="form-control col-sm-12"></td>
			    <td><input type="text" name="" class="form-control col-sm-12"></td>
			  </tr>
			</table>
	</div>
	<div class="col-sm-12">
	    <h3>Kegiatan Tugas Pokok Tambahan</h3>
	    <hr>
			<table class="table table-bordered table-stripped" id="tblTambahan">
			<tr>
			 	<th colspan="7">
			 		<div class='form-group pull-right'>
				 		<button onclick="addRowToTable2();" type="reset" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-plus"></i> Tambah Baris Baru</button>
				 		<a onclick="removeRowFromTable2();" type="reset" class="btn btn-warning btn-sm "><i class="glyphicon glyphicon-minus"></i> Hapus Baris</a>
			 		</div>
			 	</th>
			  </tr>
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
			    <td><input type="text" class="form-control col-sm-12" name="nomor_kegiatan_1" value="1"></td>
			    <td><input type="text" class="form-control col-sm-12"></td>
			    <td><input type="text" class="form-control col-sm-12"></td>
			    <td><input type="text" class="form-control col-sm-12"></td>
			    <td><input type="text" class="form-control col-sm-12"></td>
			    <td><input type="text" class="form-control col-sm-12"></td>
			    <td><input type="text" class="form-control col-sm-12"></td>
			  </tr>
			</table>
	</div>
		<div class="col-sm-12">
			<div class="form-group pull-right">
				<a href="#" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan Data</a>
				<button type="reset" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-trash"></i> Ulangi</button>
			</div>
		</div>
	</form>
</div>

<script type='text/javascript'>


	function addRowToTable()
	{
	  var tbl = document.getElementById('tblJabatan');
	  var lastRow = tbl.rows.length;
	  // if there's no header row in the table, then iteration = lastRow + 1
	  var iteration = lastRow - 2;
	  var row = tbl.insertRow(lastRow);

	  // left cell
	  var cellOne = row.insertCell(0);
    var el = document.createElement('input');
    el.type = 'text';
    el.name = 'nomor_kegiatan_' + iteration;
    el.value = iteration;
    el.id = 'txtRow';

	  cellOne.appendChild(el);

	  // right cell
	  var cellTwo = row.insertCell(1);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellTwo.appendChild(el);

	  var cellThree = row.insertCell(2);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellThree.appendChild(el);


	  var cellFour = row.insertCell(3);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellFour.appendChild(el);


	  var cellFive = row.insertCell(4);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellFive.appendChild(el);


	  var cellSix = row.insertCell(5);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellSix.appendChild(el);


	  var cellSeven = row.insertCell(6);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellSeven.appendChild(el);


	}

	function removeRowFromTable()
	{
	  var tbl = document.getElementById('tblJabatan');
	  var lastRow = tbl.rows.length;
	  if (lastRow > 4) tbl.deleteRow(lastRow - 1);
	}

	function addRowToTable2()
	{
	  var tbl = document.getElementById('tblTambahan');
	  var lastRow = tbl.rows.length;
	  // if there's no header row in the table, then iteration = lastRow + 1
	  var iteration = lastRow - 2;
	  var row = tbl.insertRow(lastRow);

	  // left cell
    var cellOne = row.insertCell(0);
    var el = document.createElement('input');
    el.type = 'text';
    el.name = 'nomor_kegiatan_' + iteration;
    el.value = iteration;
    el.id = 'txtRow';

    cellOne.appendChild(el);

	  // right cell
	  var cellTwo = row.insertCell(1);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellTwo.appendChild(el);

	  var cellThree = row.insertCell(2);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellThree.appendChild(el);


	  var cellFour = row.insertCell(3);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellFour.appendChild(el);


	  var cellFive = row.insertCell(4);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellFive.appendChild(el);


	  var cellSix = row.insertCell(5);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellSix.appendChild(el);


	  var cellSeven = row.insertCell(6);
	  var el = document.createElement('input');
	  el.type = 'text';
	  el.name = 'txtRow' + iteration;
	  el.id = 'txtRow';

	  cellSeven.appendChild(el);


	}

	function removeRowFromTable2()
	{
	  var tbl = document.getElementById('tblTambahan');
	  var lastRow = tbl.rows.length;
	  if (lastRow > 4) tbl.deleteRow(lastRow - 1);
	}
</script>

<script src="../static/assets/plugins/bootstrap/js/bootstrap2-typeahead.js"></script>
