<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li><a href="#">Referensi Jabatan</a></li>
</ul>
<h5 class="text-center title">Daftar Jabatan Pemerintah Kabupaten Bandung</h5>
<div class="row ">
    <table id='jabatantable' class="table table-bordered table-striped table-condensed flip-content"   >
        <thead class="flip-content"  >
            <tr  >
                <th><input class="noborder" id="namajabatanfilter" /></th>
                <th><select id="jenisjabatanfilter"  class="noborder" multiple="true" onchange="tampil()">
                        <option value="2">Struktural</option>
                        <option value="4">Fungsional Umum</option>
                        <option value="3">Fungsional Khusus</option>
                    </select></th>
                <th><select  id="eselonfilter" class="noborder" multiple="true" onchange="tampil()" >
                        <?php foreach ($listeselon as $es) {
                            ?>
                            <option value="<?php echo $es->eselon_id; ?>"><?php echo $es->eselon_nm; ?></option>
                        <?php } ?>
                    </select></th>
                <th><input class="noborder" id="bupfilter"  style="display: none" /></th>
                <th><input class="noborder" id="riilfilter" style="display: none" /></th>
            </tr>
            <tr  >
                <th>Nama Jabatan</th> 
                <th>Jenis Jabatan</th>
                <th>Eselon</th>
                <th>BUP</th>
                <th>Eksisting</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" class="dataTables_empty">Loading data dari server</td>
            </tr>
        </tbody>
    </table>
</div>

<script src="<?php echo base_url(); ?>/static/js/jabatan/jabatanscript.js" type="text/javascript"></script>
<script type="text/javascript">
                    $(document).ready(function() {
                        tampil();
                        cari();
                    });
                    $(document).keypress(function(e) {
                        if (e.which == 13) {
                            tampil();
                        }
                    });
                    function tampil() {
                        gridjabatan('<?php echo base_url(); ?>index.php/jabatan/jabatancontroller/listjenisjabatanjson',"<?php echo base_url(); ?>");
                    }
</script>