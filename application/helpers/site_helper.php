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