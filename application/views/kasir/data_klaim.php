<div class="content">
  <div class="container">
    <!-- tabel data jabatan -->
    <div class="card card-outline card-primary">
      <!-- /.card-header -->
      <div class="card-body pt-1">
        <div class="scrollmenu">
          <table class="table" id="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama Customer</th>
                <th>Total</th>
                <th>Ditanggung</th>
                <th>Bayar Sendiri</th>
              </tr>
            </thead>
            <tbody>
            	<?php $no=1; foreach ($detail_klaim as $key => $value) {?>
            	<tr>
            		<td><a href="<?php echo base_url('kasir/hasil/'.$value->id_klaim) ?>"><?php echo $value->id_klaim ?></a></td>
                <td><?php echo tanggal(date('Y-m-d',strtotime($value->tgl_klaim)));?></td>
            		<td><?php echo $value->nama_pasien ?></td>
                <td><?php echo rupiah($value->total) ?></td>
                <td><?php echo rupiah($value->total) ?></td>
                <td><?php echo rupiah($value->bayar_sendiri) ?></td>
            	</tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>