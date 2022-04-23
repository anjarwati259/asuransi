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
                <th>No</th>
                <th>Kode Produk</th>
                <th>Item</th>
                <?php foreach ($kelas as $key => $value) {?>
                <th><?php echo $value->nama_kelas ?></th>
              <?php } ?>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	<?php $no=1; foreach ($detail as $key => $value) {
                $id_produk = $value->id_produk;
                ?>
            	<tr>
            		<td><?php echo $no++ ?></td>
                <td><?php echo $value->id_produk ?></td>
            		<td><?php echo $value->nama_produk ?></td>
                <?php foreach ($kelas as $key => $value1) {
                  $id_kelas = $value1->id_kelas; ?>
                <td><?php echo get_harga($id_produk, $id_kelas); ?></td>
              <?php } ?>
            		<td style="min-width: 100px;">
            			<button class="btn btn-info edit-detail" data-id="<?php echo $value->id_produk ?>" data-toggle="modal" data-target="#modal-edit">Edit</button>
                  <a href="<?php echo base_url('admin/del_harga/'.$value->id_produk)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
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
        <h4 class="modal-title">Tambah Harga Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label">Produk</label>
            <select class="form-control" id="id_produk">
              <?php foreach ($detail as $key => $value) { ?>
              <option value="<?php echo $value->id_produk ?>"><?php echo $value->id_produk ?> - <?php echo $value->nama_produk ?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Kelas</label>
            <select class="form-control" id="id_kelas">
              <?php foreach ($kelas as $key => $value) { ?>
                <option value="<?php echo $value->id_kelas ?>"><?php echo $value->nama_kelas ?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Harga</label>
            <input type="number" id="harga" class="form-control"/>
        </div>
        <div class="form-group">
            <label class="control-label" >Status</label>
            <select class="form-control" id="status">
              <option value="1">Per-Hari</option>
              <option value="2">Per-Tahun</option>
              <option value="0">Per-Kasus</option>
            </select>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="input-detail">Simpan</button>
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