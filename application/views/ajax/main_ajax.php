<?php if($this->session->flashdata('sukses')) { ?>
  <script type="text/javascript">
    var pesan = '<?php echo $this->session->flashdata('sukses') ?>'
    toastr.success(pesan);
  </script>
<?php }else if($this->session->flashdata('error')){ ?>
  <script type="text/javascript">
    var pesan = '<?php echo $this->session->flashdata('error') ?>'
    toastr.error(pesan);
  </script>
<?php }; ?>
<script type="text/javascript">
	$(document).ready(function(){
	    if(localStorage.getItem("sukses"))
	    {
	        toastr.success("Data Berhasil Ditambah");
	        localStorage.clear();
	    }else if(localStorage.getItem("edit")){
	      toastr.success("Data Berhasil Diedit");
	        localStorage.clear();
	    }else if(localStorage.getItem("approve")){
	    	toastr.success("Cuti Berhasil di Approve");
	        localStorage.clear();
	    }else if(localStorage.getItem("error")){
	    	toastr.error("Data ada yang Kosong!!");
	        localStorage.clear();
	    }

	    // ====================== kelas ===================
	    // add data Kelas
	    $("body").on("click","#input-kelas",function(){
	    	// console.log('bisa');
	    	var nama_kelas = $("#nama_kelas").val();
	    	var data = {nama_kelas:nama_kelas}

	    	// console.log(data);
	    	$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/add_kelas'); ?>",
	            data:data,
	            dataType : 'json',
	            success: function(data) {
	              // console.log(data);
	              if (data=='sukses') {
	                localStorage.setItem("sukses",data)
	                window.location.reload(); 
	              }else if(data=='error'){
	                $('#modal-input').modal('hide');
	                toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
	              }
	            }
	        });
	    });

	    //set data kelas
	    $("body").on("click",".edit-kelas",function(){
	      var id_kelas = $(this).data('id');
	      $.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/detail_kelas'); ?>",
	            data:{id_kelas:id_kelas},
	            dataType : 'json',
	            success: function(hasil) {
	              $("#id_kelas").val(hasil.id_kelas);
	              $("#nama_kelas_edit").val(hasil.nama_kelas);

	              console.log(hasil);
	            }
	        });
	  	});

	  	// edit kelas
	  	$("body").on("click","#edit-kelas",function(){
	  		var id_kelas = $("#id_kelas").val();
	  		var nama_kelas = $("#nama_kelas_edit").val();
	  		var data = {id_kelas:id_kelas,
	  					nama_kelas:nama_kelas
	  		}
	  		$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/edit_kelas'); ?>",
	            data:data,
	            dataType : 'json',
	            success: function(data) {
	              // console.log(data);
	              if (data=='sukses') {
	                localStorage.setItem("edit",data)
	                window.location.reload(); 
	              }else if(data=='error'){
	                $('#modal-edit').modal('hide');
	                toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
	              }
	            }
	        });
	  	});

	  	// ========================= produk ==============
	  	// add data Produk
	    $("body").on("click","#input-produk",function(){
	    	// console.log('bisa');
	    	var id_produk = $("#id_produk").val();
	    	var nama_produk = $("#nama_produk").val();
	    	var data = {nama_produk:nama_produk,
	    				id_produk:id_produk}

	    	// console.log(data);
	    	$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/add_produk'); ?>",
	            data:data,
	            dataType : 'json',
	            success: function(data) {
	              // console.log(data);
	              if (data=='sukses') {
	                localStorage.setItem("sukses",data)
	                window.location.reload(); 
	              }else if(data=='error'){
	                $('#modal-input').modal('hide');
	                toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
	              }
	            }
	        });
	    });

	    //set data produk
	    $("body").on("click",".edit-produk",function(){
	      var id_produk = $(this).data('id');
	      $.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/produk_detail'); ?>",
	            data:{id_produk:id_produk},
	            dataType : 'json',
	            success: function(hasil) {
	              $("#id_produk_edit").val(hasil.id_produk);
	              $("#nama_produk_edit").val(hasil.nama_produk);

	              console.log(hasil);
	            }
	        });
	  	});

	  	// edit Produk
	  	$("body").on("click","#edit-produk",function(){
	  		var id_produk = $("#id_produk_edit").val();
	  		var nama_produk = $("#nama_produk_edit").val();
	  		var data = {id_produk:id_produk,
	  					nama_produk:nama_produk
	  		}
	  		$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/edit_produk'); ?>",
	            data:data,
	            dataType : 'json',
	            success: function(data) {
	              // console.log(data);
	              if (data=='sukses') {
	                localStorage.setItem("edit",data)
	                window.location.reload(); 
	              }else if(data=='error'){
	                $('#modal-edit').modal('hide');
	                toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
	              }
	            }
	        });
	  	});

	  	// ======================== Detail Produk =======================
	  	$("body").on("click","#input-detail",function(){
	    	// console.log('bisa');
	    	var id_produk = $("#id_produk").val();
	    	var id_kelas = $("#id_kelas").val();
	    	var harga = $("#harga").val();
	    	var status = $("#status").val();

	    	var data = {id_kelas:id_kelas,
	    				id_produk:id_produk,
	    				harga:harga,
	    				status:status,
	    			}

	    	// console.log(data);
	    	$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/add_detail_produk'); ?>",
	            data:data,
	            dataType : 'json',
	            success: function(data) {
	              // console.log(data);
	              if (data=='sukses') {
	                localStorage.setItem("sukses",data)
	                window.location.reload(); 
	              }else if(data=='error'){
	                $('#modal-input').modal('hide');
	                toastr.error("Data Ada yg belum diisi, Silahkan lengkapi!!!");
	              }
	            }
	        });
	    });
	    //set data produk
	    $("body").on("click",".edit-detail",function(){
	      var id_produk = $(this).data('id');
	      $.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/get_detail_produk'); ?>",
	            data:{id_produk:id_produk},
	            dataType : 'json',
	            success: function(hasil) {
	              $("#id_produk_edit").val(hasil.id_produk);
	              $("#nama_produk_edit").val(hasil.nama_produk);

	              console.log(hasil);
	            }
	        });
	  	});
	});
</script>