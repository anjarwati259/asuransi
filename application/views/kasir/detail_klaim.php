<style type="text/css">
	.header p{
		font-weight: 700;
		line-height: 20px;
		font-size: 20px;
	}
	.header-name p{
		font-weight: 400;
		line-height: 10px;
		font-size: 17px;
	}
</style>
<div class="content">
  <div class="container">
  	<div class="row justify-content-center">
  		<div class="col-md-12">
  			<div class="card" style="width: 50%;">
              <div class="card-header text-center header">
                <p>PT. Arsmedika Sehat Berdikari</p>
                <p>Terdepan dalam mutu dan pelayanan</p>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="header-name">
                	<p><b>Klaim Jaminan Kesehatan</b></p>
                	<p>Nama : <?php echo $klaim->nama_pasien ?></p>
                	<p>Nomor Peserta : <?php echo $klaim->id_customer ?></p>
                	<p>Kelas : <?php echo $klaim->nama_kelas ?></p>
                </div>

                <table class="table" id="table">
            <thead>
              <tr>
                <th>Rincian</th>
                <th>Total</th>
                <th>Ditanggung</th>
                <th>Bayar Sendiri</th>
              </tr>
            </thead>
            <tbody>
            	<?php 
            	$total_ditanggung = 0;
            	$total_sendiri = 0;
            	foreach ($detail_klaim as $key => $value) {

            		$data = array('id_kelas' => $value->id_kelas,
            						'id_produk' => $value->id_produk,
            						'subtotal' => $value->sub_total,
            						'jumlah' => $value->jumlah
            						 );
            		$hasil = ditanggung($data);
            		$total_ditanggung +=$hasil['ditanggung'];
            		$total_sendiri +=$hasil['byr_sendiri'];
            		?>
            		<tr>
            			<td style="max-width: 100px;"><?php echo $value->nama_produk ?></td>
            			<td><?php echo rupiah($value->sub_total) ?></td>
            			<td><?php echo rupiah($hasil['ditanggung']); ?></td>
            			<td><?php echo rupiah($hasil['byr_sendiri']); ?></td>
            		</tr>
            	<?php } ?>
            	<tr>
            		<th colspan="3" class="text-right">Total Ditanggung :</th>
            		<td><?php echo rupiah($total_ditanggung); ?></td>
            	</tr>
            	<tr>
            		<th colspan="3" class="text-right">Dibayar Sendiri :</th>
            		<td><?php echo rupiah($total_sendiri) ?></td>
            	</tr>
            	<!-- save database -->
            	<?php 
            		$data_hasil = array('id_klaim' => $klaim->id_klaim,
            							'total_ditanggung' => $total_ditanggung,
            							'bayar_sendiri' => $total_sendiri
            					);
            	save_hasil($data_hasil); ?>
            </tbody>
          </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  		</div>
  	</div>
  </div>
</div>