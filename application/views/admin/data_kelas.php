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
                <th>No.</th>
                <th>Kelas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	<?php $no=1; foreach ($kelas as $key => $value) {?>
            	<tr>
            		<td><?php echo $no++ ?></td>
            		<td><?php echo $value->nama_kelas ?></td>
            		<td style="max-width: 60px;">
            			<button class="btn btn-info edit-kelas" data-id="<?php echo $value->id_kelas ?>" data-toggle="modal" data-target="#modal-edit">Edit</button>
                    	<a href="<?php echo base_url('admin/del_kelas/'.$value->id_kelas)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
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
        <h4 class="modal-title">Tambah Kelas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label">Nama Kelas</label>
            <input type="text" id="nama_kelas" class="form-control"/>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="input-kelas">Simpan</button>
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
        <h4 class="modal-title">Edit Kelas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label">Kode</label>
            <input type="text" id="id_kelas" class="form-control" disabled />
        </div>
        <div class="form-group">
            <label class="control-label">Nama Kelas</label>
            <input type="text" id="nama_kelas_edit" class="form-control"/>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="edit-kelas">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>