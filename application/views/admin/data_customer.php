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
                <th>ID Customer</th>
                <th>NIK</th>
                <th>Kelas</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	<?php foreach ($customer as $key => $value) {?>
            	<tr>
            		<td><a href="#" id="detail" data-id="<?php echo $value->id_customer ?>" data-toggle="modal" data-target="#modal-detail"><?php echo $value->id_customer ?></a></td>
                <td><?php echo $value->NIK ?></td>
            		<td><?php echo $value->nama_kelas ?></td>
                <td><?php echo $value->nama_pasien ?></td>
                <td><?php echo $value->no_hp ?></td>
                <td><?php echo $value->umur ?></td>
                <td><?php echo $value->alamat ?></td>
            		<td style="min-width: 100px;">
            			<button class="btn btn-info edit-customer" data-id="<?php echo $value->id_customer ?>" data-toggle="modal" data-target="#modal-edit">Edit</button>
                    	<a href="<?php echo base_url('admin/del_customer/'.$value->id_customer)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">ID Customer</label>
                <input type="text" id="id_customer" value="<?php echo $id_customer; ?>" class="form-control" readonly/>
            </div>
            <div class="form-group">
                <label class="control-label">NIK</label>
                <input type="text" id="nik" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label" >Kelas</label>
                <select class="form-control" id="id_kelas">
                  <?php foreach ($kelas as $key => $value) {?>
                  <option value="<?php echo $value->id_kelas ?>"> <?php echo $value->nama_kelas ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Nama Cutomer</label>
                <input type="text" id="nama_pasien" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">No.HP</label>
                <input type="text" id="no_hp" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Alamat</label>
                <textarea class="form-control" id="alamat"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Tanggal Lahir</label>
                <input type="text" id="tanggal_lahir" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Umur</label>
                <input type="text" id="umur" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Agama</label>
                <input type="text" id="agama" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Pekerjaan</label>
                <input type="text" id="pekerjaan" class="form-control"/>
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="input-customer">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">ID Customer</label>
                <input type="text" id="id_customer_edit" value="<?php echo $id_customer; ?>" class="form-control" readonly/>
            </div>
            <div class="form-group">
                <label class="control-label">NIK</label>
                <input type="text" id="nik_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label" >Kelas</label>
                <select class="form-control" id="id_kelas_edit">
                  <?php foreach ($kelas as $key => $value) {?>
                  <option value="<?php echo $value->id_kelas ?>"> <?php echo $value->nama_kelas ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Nama Cutomer</label>
                <input type="text" id="nama_pasien_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">No.HP</label>
                <input type="text" id="no_hp_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Alamat</label>
                <textarea class="form-control" id="alamat_edit"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tempat Lahir</label>
                <input type="text" id="tempat_lahir_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Tanggal Lahir</label>
                <input type="text" id="tanggal_lahir_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin_edit">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Umur</label>
                <input type="text" id="umur_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Agama</label>
                <input type="text" id="agama_edit" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label">Pekerjaan</label>
                <input type="text" id="pekerjaan_edit" class="form-control"/>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" id="edit-customer">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal Detail -->
<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-default">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="<?php echo base_url() ?>assets/dist/img/user7-128x128.jpg" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username nama_pasien">Nadia Carmichael</h3>
                <h5 class="widget-user-desc id_customer">Lead Developer</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <span class="nav-link nik">coba</span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link kelas">coba</span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link no_hp">coba</span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link alamat"></span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link tempat_lahir"></span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link tanggal_lahir"></span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link umur"></span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link jenis_kelamin"></span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link agama"></span>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link pekerjaan"></span>
                  </li>
                </ul>
              </div>
            </div>
        
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>