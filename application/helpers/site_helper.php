<?php 
function get_harga($produk,$kelas){
    $CI = get_instance();
    $CI->load->model('admin_model');

    $data_harga = $CI->admin_model->get_harga($produk,$kelas);
    if($data_harga){
    	$harga = $data_harga->harga;
    }else{
    	$harga = 0;
    }
    return $harga;
}
function ditanggung($data){
    $CI = get_instance();
    $CI->load->model('kasir_model');
    $data_harga = $CI->kasir_model->get_harga($data);

    $status = $data_harga->status;
    $harga = $data_harga->harga;

    if($status == 1 | $status == 0){
    	$tanggung = $data['jumlah'] * $harga;
    	if($tanggung>=$data['subtotal']){
    		$ditanggung = $data['subtotal'];
    		$byr_sendiri = 0;
    	}else{
    		$ditanggung = $tanggung;
    		$byr_sendiri = $data['subtotal'] - $ditanggung;
    	}
    }else{
    	if($data['subtotal']<=$harga){
    		$ditanggung = $data['subtotal'];
    		$byr_sendiri = 0;
    	}else{
    		$ditanggung = $harga;
    		$byr_sendiri = $data['subtotal'] - $ditanggung;
    	}
    }
    $hasil = array('ditanggung' => $ditanggung,
					'byr_sendiri' => $byr_sendiri);
    return $hasil;
}

function save_hasil($data){
    $CI = get_instance();
    $CI->load->model('kasir_model');
    $CI->kasir_model->save_hasil($data);
}

function rupiah($angka){
    if ($angka==''||$angka==null||$angka=='-') {
       $rupiah = 0;
   }else{
    $rupiah=number_format($angka,0,',','.');
}
return "Rp ".$rupiah;
}

function tanggal($tanggal){
  $bulan = array (1 =>   'Jan',
        'Feb',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agus',
        'Sept',
        'Okt',
        'Nov',
        'Des'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  return $tgl_indo;
}
