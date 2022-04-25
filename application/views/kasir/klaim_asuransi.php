<div class="content">
  <div class="container">
  	<div class="row">
  		<div class="col-md-12">
  			<?php echo $id_klaim; ?>
  			<div class="card card-outline card-primary">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
		          <div class="col-md-6">
		            <div class="form-group">
		                <label class="control-label">ID Customer</label>
		                <div class="row">
		                	<div class="col-md-10">
		                		<input type="text" id="id_customer" class="form-control" readonly/>
		                	</div>
		                	<div class="col-md-2">
		                		<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-customer">Cari</button>
		                	</div>
		                </div>
		                
		            </div>
		            <div class="form-group">
		                <label class="control-label">NIK</label>
		                <input type="text" id="nik" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label" >Kelas</label>
		                <input type="text" id="kelas" class="form-control" readonly/>
		                <input type="hidden" id="id_kelas" class="form-control"/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Nama Cutomer</label>
		                <input type="text" id="nama_pasien" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">No.HP</label>
		                <input type="text" id="no_hp" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Alamat</label>
		                <textarea class="form-control" id="alamat" readonly></textarea>
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		                <label class="control-label">Tempat Lahir</label>
		                <input type="text" id="tempat_lahir" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Tanggal Lahir</label>
		                <input type="text" id="tanggal_lahir" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Jenis Kelamin</label>
		                <input type="text" id="jenis_kelamin" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Umur</label>
		                <input type="text" id="umur" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Agama</label>
		                <input type="text" id="agama" class="form-control" readonly/>
		            </div>
		            <div class="form-group">
		                <label class="control-label">Pekerjaan</label>
		                <input type="text" id="pekerjaan" class="form-control" readonly/>
		            </div>
		          </div>
		        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  		</div>

  		<div class="col-md-12">
  			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Layanan</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table class="table" id="table">
		            <thead>
		              <tr>
		                <th>Pilih Layanan</th>
		                <th>Hari</th>
		                <th>Saldo</th>
		                <th>Kejadian</th>
		                <th>harga Satuan</th>
		                <th>Action</th>
		              </tr>
		            </thead>
		            <tbody id="transaksi-item">
		            	<tr>
		            		<td>
		            			<select class="form-control" id="produk">
		            				<option selected="selected" disabled>Pilih Produk</option>
		            				<?php foreach ($produk as $key => $value) { ?>
		            					<option value="<?php echo $value->id_produk ?>"><?php echo $value->nama_produk ?></option>
		            				<?php } ?>
		            			</select>
		            		</td>
		            		<td ><input type="number" class="form-control" id="hari" disabled></td>
		            		<td><input type="number" class="form-control" id="saldo" disabled></td>
		            		<td><input type="number" class="form-control" id="kejadian" disabled></td>
		            		<td><input type="number" class="form-control" id="harga" required></td>
		            		<td><button class="btn btn-sm btn-primary" id="input">Input</button></td>
		            	</tr>
		            	<tr>
		                    <th>Nama</th>
		                    <th>QTY</th>
		                    <th>Harga</th>
		                    <th>Subtotal</th>
		                    <th></th>
		                </tr>
		                <?php if(!empty($carts) && is_array($carts)){?>
                            <?php foreach($carts['data'] as $k => $cart){
                            	$sub = $cart['qty'] * $cart['price'];
                            	?>

		                <tr id="<?php echo $k;?>" class="cart-value">
		                  	<td><?php echo $cart['name'];?></td>
		                  	<td><?php echo $cart['qty'];?></td>
		                  	<td><?php echo $cart['price'];?></td>
		                  	<td><?php echo $sub ?></td>
		                  	<td></td>
		                </tr>
		            <?php }} ?>
		            </tbody>
		            <tfoot>
	                  <tr>
	                  	<th colspan="4" style="text-align: right;">Total: </th>
	                  	<td id="total">Rp. 0</td>
	                  </tr>
	                </tfoot>
		        </table>
		        <input type="hidden" id="status">
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
              	<button class="btn btn-info" id="btn-simpan">Simpan</button>
			  </div>
            </div>
            <!-- /.card -->
  		</div>
  	</div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-customer">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cari Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="table">
            <thead>
              <tr>
                <th>ID Customer</th>
                <th>NIK</th>
                <th>Kelas</th>
                <th>Nama</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	<?php foreach ($customer as $key => $value) {?>
            		<tr>
            			<td><?php echo $value->id_customer ?></td>
            			<td><?php echo $value->NIK ?></td>
            			<td><?php echo $value->nama_kelas ?></td>
            			<td><?php echo $value->nama_pasien ?></td>
            			<td>
            				<button class="btn btn-sm btn-primary" id="pilih-customer" data-id="<?php echo $value->id_customer ?>">Pilih</button>
            			</td>
            		</tr>
            	<?php } ?>
            	
            </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>