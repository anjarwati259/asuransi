<script type="text/javascript">
	$(document).ready(function(){
		$("body").on("click","#pilih-customer",function(){
		//set data kelas
	    var id_customer = $(this).data('id');
	      	$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('admin/detail_customer'); ?>",
	            data:{id_customer:id_customer},
	            dataType : 'json',
	            success: function(hasil) {
	              $("#nama_pasien").val(hasil.nama_pasien);
	              $("#id_customer").val(hasil.id_customer);
	              $("#nik").val(hasil.NIK);
	              $("#kelas").val(hasil.nama_kelas);
	              $("#id_kelas").val(hasil.id_kelas)
	              $("#no_hp").val(hasil.no_hp);
	              $("#alamat").val(hasil.alamat);
	              $("#tempat_lahir").val(hasil.tempat_lahir);
	              $("#tanggal_lahir").val(hasil.tanggal_lahir);
	              $("#jenis_kelamin").val(hasil.jenis_kelamin)
	              $("#umur").val(hasil.umur);
	              $("#agama").val(hasil.agama);
	              $("#pekerjaan").val(hasil.pekerjaan);

	              // console.log(hasil);
	              $('#modal-customer').modal('hide');
	            }
	        });
	    });

	    // ambil data harga
      $('body').on("change","#produk",function(){
      	var id_produk = $(this).val();
      	var id_kelas = $("#id_kelas").val();
      	if(id_kelas){
      		$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('kasir/get_status'); ?>",
	            data:{id_produk:id_produk,
	            		id_kelas: id_kelas},
	            dataType : 'json',
	            success: function(hasil) {
	            	$("#status").val(hasil.status);
	              if(hasil.status==1){
	              	$("#hari").val(1);
	              	$("#kejadian").val(0);
	              	$("#saldo").val(0);
	              	$('#hari').removeAttr('disabled');
	              	$('#saldo').attr('disabled', 'disabled');
	              	$('#kejadian').attr('disabled', 'disabled');
	              }else if(hasil.status==2){
	              	$("#saldo").val(hasil.harga);
	              	$("#hari").val(0);
	              	$("#kejadian").val(0);
	              	$('#saldo').attr('disabled', 'disabled');
	              	$('#kejadian').attr('disabled', 'disabled');
	              	$('#hari').attr('disabled', 'disabled');
	              }else if(hasil.status==0){
	              	$("#kejadian").val(1);
	              	$("#hari").val(0);
	              	$("#saldo").val(0);
	              	$('#kejadian').removeAttr('disabled');
	              	$('#saldo').attr('disabled', 'disabled');
	              	$('#hari').attr('disabled', 'disabled');
	              }
	            }
	        });
      	}else{
      		toastr.error('Silahkan pilih customer terlebih dahulu!!');
      	}
      	
      });

      $("body").on("click","#input",function(){
      	var id_produk = $("#produk").val();
      	var id_kelas = $("#id_kelas").val();
      	var id_customer = $("#id_customer").val();
      	var hari = $("#hari").val();
      	var kejadian = $("#kejadian").val();
      	var harga = $("#harga").val();
      	var status = $("#status").val();
      	var data = {id_produk:id_produk,
      				id_kelas:id_kelas,
      				id_customer:id_customer,
      				hari:hari,
      				kejadian:kejadian,
      				harga:harga,
      				status:status,
      			}
      	// console.log(data);
      	$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('kasir/add_item'); ?>",
	            data:data,
	            // dataType : 'json',
	            success: function(data) {
	            var res = $.parseJSON(data);
	            $(".cart-value").remove();
                    $.each(res.data, function(key,value) {
                        var row_2 = "1";
                        var sub = parseInt(value.qty) * parseInt(value.price);
                        //total_pot = value.potongan;
                        var display = '<tr class="cart-value" id="'+ key +'">' +
                                    '<td>'+ value.name +'</td>' +
                                    '<td>'+ value.qty +'</td>' +
                                    '<td>'+ 'Rp. '+price(parseInt(value.price)) +'</td>'+
                                    '<th>Rp. '+ price(sub) +'</th>' +
                                    '<td><span class="btn btn-danger btn-sm transaksi-delete-item" data-cart="'+ key +'">x</span></td>' +
                                    '</tr>';
                        $("#transaksi-item tr:last").after(display);
                    });
                $("#total").text(price(res.total_price));
	        }
	        });
      });

	      $(document).on("click",".transaksi-delete-item",function(e){
	        var rowid = $(this).attr("data-cart");
	        //$el.faLoading();
	        $.get('<?php echo base_url('kasir/delete_cart/'); ?>'+rowid,
	            function(data,status){
	                if(status == 'success'  && data != 'false'){
	                    $("#"+rowid).remove();
	                    console.log(data);
	                    $("#total").text('Rp. '+data);
	                    //$el.faLoading(false);
	                }                
	            }
	        );
	    });

	    $(document).on("click","#btn-simpan",function(e){
	        var id_kelas = $("#id_kelas").val();
	        var id_customer = $("#id_customer").val();
	        var status = $("#status").val();

	        var data = {id_kelas:id_kelas,
      					id_customer:id_customer,
      					status:status
      			}
      		$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url('kasir/simpan_klaim'); ?>",
	            data:data,
	            dataType : 'json',
	            success: function(data) {
	              if(data.status=='sukses'){
	              	window.location.href = "<?php echo base_url('kasir/hasil/') ?>"+data.id_klaim;
	              }else{
	              	toastr.error('data tidak lengkap silahkan lengkapi terlebih dahulu')
	              }
	            }
	        });
	      
	    });
	});

function price(input){
      return (input).formatMoney(0, '.', '.');
  }
  Number.prototype.formatMoney = function(c, d, t){
      var n = this,
          c = isNaN(c = Math.abs(c)) ? 2 : c,
          d = d == undefined ? "." : d,
          t = t == undefined ? "," : t,
          s = n < 0 ? "-" : "",
          i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
          j = (j = i.length) > 3 ? j % 3 : 0;
      return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  };
</script>