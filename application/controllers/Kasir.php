<?php

class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('admin_model');
		$this->load->model('kasir_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		

		$data = array('title' => 'Dashboard Kasir',
                        'isi' => 'kasir/dashboard' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
	public function klaim(){
		$kode = substr(str_shuffle('0123456789'),1,5);
		$id_klaim = 'KL-'. $kode;

		$customer = $this->admin_model->customer();
		$data_produk = $this->admin_model->produk();
		$data = array('title' => 'Klaim Asuransi',
						'produk' => $data_produk,
						'id_klaim' => $id_klaim,
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

	public function simpan_klaim(){
		$id_kelas = $this->input->post('id_kelas');
		$id_customer= $this->input->post('id_customer');
		$status= $this->input->post('status');

		$kode = substr(str_shuffle('0123456789'),1,5);
		$id_klaim = 'KL-'. $kode;

		$carts =  $this->cart->contents();

		if(!empty($carts) && is_array($carts)){
			$data = array(
							'id_customer' => $id_customer,
							'id_klaim' => $id_klaim,
							'total' => $this->cart->total(),
							'tgl_klaim' => date('Y-m-d H:i:s'),
			 	);
			$this->kasir_model->add_klaim($data);

			foreach($carts as $key => $cart){
				$sub_total = $cart['qty'] * $cart['price'];
				$detail_data = array('id_klaim' => $id_klaim,
										'id_kelas' => $id_kelas,
										'id_produk' => $cart['id'],
										'jumlah' => $cart['qty'],
										'harga_satuan' => $cart['price'],
										'sub_total' => $sub_total,
										'tgl_klaim' => date('Y-m-d H:i:s')
					);
				$this->kasir_model->add_detail($detail_data);
			}

			if($status==2){
				$this->update_saldo($cart,$id_kelas);
			}
			$this->cart->destroy();
			echo json_encode(array('status' => 'sukses', 'id_klaim' => $id_klaim ));
		}else{
			echo json_encode(array('status'=> 'error'));
		}
		// echo json_encode($data);
	}

	private function update_saldo($cart,$id_kelas){
		foreach ($cart as $key => $value) {
			$get_detail = $this->kasir_model->get_detail($cart['id'], $id_kelas);

			$harga = $get_detail->harga;
			$sub = $cart['qty'] * $cart['price'];
			if($harga !=0 && $harga>=$cart['price']){
				$update = $harga-$sub;
				$data = array('id_produk' => $cart['id'],
				 				'id_kelas' => $id_kelas,
				 				'harga'		=> $update
				 			);
				$this->kasir_model->update_saldo($data);
				// return $update;

			}
			//return($id_kelas)
		}
	}

	public function hasil($id_klaim){
		$klaim = $this->kasir_model->klaim_by_id($id_klaim);
		$detail_klaim = $this->kasir_model->detail_klaim($id_klaim);
		$data = array('title' => 'Detail Klaim',
						'klaim' => $klaim,
						'detail_klaim' => $detail_klaim,
                        'isi' => 'kasir/detail_klaim' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}

	public function detail_klaim(){
		$detail_klaim = $this->kasir_model->list_klaim();
		$data = array('title' => 'Data Klaim',
						'detail_klaim' => $detail_klaim,
                        'isi' => 'kasir/data_klaim' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}

}