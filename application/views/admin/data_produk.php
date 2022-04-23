<div class="content">
  <div class="container">
    <!-- tabel data jabatan -->
    <div class="card card-outline card-primary">
      <div class="card-header">
        <!-- <h3 class="card-title">Data Jabatan</h3> -->
        <div class="">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-input">
            Tambah
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body pt-1">
        <div class="scrollmenu">
          <table class="table" id="table">
            <thead>
              <tr>
                <th>Ko</th>
                <th>Kode Produk</th>
                <th>Produk</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	<?php $no=1; foreach ($produk as $key => $value) {?>
            	<tr>
            		<td><?php echo $no++ ?></td>
                <td><?php echo $value->id_produk ?></td>
            		<td><?php echo $value->nama_produk ?></td>
            		<td style="max-width: 100px;">
            			<button class="btn btn-info edit-produk" data-id="<?php echo $value->id_produk ?>" data-toggle="modal" data-target="#modal-edit">Edit</button>
                    	<a href="<?php echo base_url('admin/del_produk/'.$value->id_produk)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            		</td>
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

<!-- modal tambah -->
<div class="modal fade" id="modal-input">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label">Kode produk</label>
            <input type="text" id="id_produk" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label">Nama produk</label>
            <input type="text" id="nama_produk" class="form-control"/>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="input-produk">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label">Kode</label>
            <input type="text" id="id_produk_edit" class="form-control" disabled />
        </div>
        <div class="form-group">
            <label class="control-label">Nama produk</label>
            <input type="text" id="nama_produk_edit" class="form-control"/>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="edit-produk">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>