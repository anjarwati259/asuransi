<?php

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman
		// $this->simple_login->cek_login();
		$this->load->model('admin_model');
	}
	public function index(){
		$data = array('title' => 'Dashboard Admin',
                        'isi' => 'admin/dashboard' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
	// ====================== kelas =============
	public function kelas(){
		$data_kelas = $this->admin_model->kelas();
		$data = array('title' => 'Data Kelas',
						'kelas' => $data_kelas,
                        'isi' => 'admin/data_kelas' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
	// menambah data kelas
	public function add_kelas(){
		$this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'nama_kelas' => $i->post('nama_kelas'),
						);
			//echo json_encode($data);
			$this->admin_model->add_kelas($data);
			echo json_encode('sukses');
		}
	}

	// menampilkan data kelas berdasarkan id
	public function detail_kelas(){
		$id_kelas 	= $this->input->post('id_kelas');
		$kelas = $this->admin_model->get_kelas($id_kelas);

		echo json_encode($kelas);
	}
	// edit data kelas
	public function edit_kelas(){
		$this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'required');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'id_kelas' => $i->post('id_kelas'),
							'nama_kelas' => $i->post('nama_kelas')
						);
			//echo json_encode($data);
			$this->admin_model->edit_kelas($data);
			echo json_encode('sukses');
		}
	}
	// delete Kelas
	public function del_kelas($id){
		$this->admin_model->del_kelas($id);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kelas'), 'refresh');
	}

	// ====================== produk =============
	public function produk(){
		$data_produk = $this->admin_model->produk();
		$data = array('title' => 'Data Produk',
						'produk' => $data_produk,
                        'isi' => 'admin/data_produk' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
	// menambah data produk
	public function add_produk(){
		$this->form_validation->set_rules('id_produk', 'id_produk', 'required');
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'nama_produk' => $i->post('nama_produk'),
							'id_produk'	=> $i->post('id_produk'),
						);
			//echo json_encode($data);
			$this->admin_model->add_produk($data);
			echo json_encode('sukses');
		}
	}
	// menampilkan data produk berdasarkan id
	public function produk_detail(){
		$id_produk 	= $this->input->post('id_produk');
		$produk = $this->admin_model->get_produk($id_produk);

		echo json_encode($produk);
	}

	// menambah data produk
	public function edit_produk(){
		$this->form_validation->set_rules('id_produk', 'id_produk', 'required');
		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'nama_produk' => $i->post('nama_produk'),
							'id_produk'	=> $i->post('id_produk'),
						);
			//echo json_encode($data);
			$this->admin_model->edit_produk($data);
			echo json_encode('sukses');
		}
	}
	// delete produk
	public function del_produk($id){
		$this->admin_model->del_produk($id);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'), 'refresh');
	}

	// ========================== detail produk ============================
	public function detail_produk(){
		$data_produk = $this->admin_model->produk();
		$data_kelas = $this->admin_model->kelas();
		$data = array('title' => 'Data Produk',
						'detail' => $data_produk,
						'kelas' => $data_kelas,
                        'isi' => 'admin/data_detail_produk' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}

	public function add_detail_produk(){
		$this->form_validation->set_rules('id_produk', 'id_produk', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('status', 'status', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'id_kelas' => $i->post('id_kelas'),
							'id_produk'	=> $i->post('id_produk'),
							'harga' => $i->post('harga'),
							'status'	=> $i->post('status'),
						);
			//echo json_encode($data);
			$this->admin_model->add_detail_produk($data);
			echo json_encode('sukses');
		}
	}
}