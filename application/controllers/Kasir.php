<?php

class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('admin_model');
		$this->load->model('kasir_model');
	}
	public function index(){
		$data = array('title' => 'Dashboard Kasir',
                        'isi' => 'kasir/dashboard' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
	public function klaim(){
		$customer = $this->admin_model->customer();
		$data_produk = $this->admin_model->produk();
		$data = array('title' => 'Klaim Asuransi',
						'produk' => $data_produk,
						'customer' => $customer,
                        'isi' => 'kasir/klaim_asuransi' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}

	public function get_status(){
		$id_produk 	= $this->input->post('id_produk');
		$id_kelas 	= $this->input->post('id_kelas');
		$detail_produk = $this->kasir_model->get_detail($id_produk,$id_kelas);

		echo json_encode($detail_produk);
	}
	public function add_item(){
		$id_produk = $this->input->post('id_produk');
		$hari = $this->input->post('hari');
		$kejadian= $this->input->post('kejadian');
		$harga = $this->input->post('harga');
		$status = $this->input->post('status');

		$get_produk = $this->admin_model->get_produk($id_produk);
		$nama_produk = $get_produk->nama_produk;

		if($status==1){
			$qty = $hari;
		}else if($status==2){
			$qty = 1;
		}else{
			$qty = $kejadian;
		}
		
		$data = array(
		        'id'      => $id_produk,
		        'qty'     => $qty,
		        'price'   => $harga,
		        'name'    => $nama_produk,
		);
		// $this->cart->destroy();
		$this->cart->insert($data);
		echo json_encode(array('status' => 'ok',
						'data' => $this->cart->contents(),
						'total_item' => $this->cart->total_items(),
						'total_price' => $this->cart->total(),
					)
			);
		// echo json_encode($nama_produk);
	}
	//untuk delete shopping cart
	public function delete_cart($rowid){
		if($this->cart->remove($rowid)) {
			echo number_format($this->cart->total());
		}else{
			echo "false";
		}
	}

}