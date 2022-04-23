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

	// ========================== customer ============================
	public function customer(){
		$kode = substr(str_shuffle('0123456789'),1,8);
		$id_customer = 'R-'. $kode;

		$customer = $this->admin_model->customer();
		$data_kelas = $this->admin_model->kelas();

		$data = array('title' => 'Data Produk',
						'id_customer' => $id_customer,
						'kelas' => $data_kelas,
						'customer' => $customer,
                        'isi' => 'admin/data_customer' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
	public function add_customer(){
		$this->form_validation->set_rules('id_customer', 'id_customer', 'required');
		$this->form_validation->set_rules('nik', 'nik', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
		$this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
		$this->form_validation->set_rules('umur', 'umur', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'id_customer' => $i->post('id_customer'),
							'nik'	=> $i->post('nik'),
							'id_kelas' => $i->post('id_kelas'),
							'nama_pasien' => $i->post('nama_pasien'),
							'jenis_kelamin'	=> $i->post('jenis_kelamin'),
							'no_hp' => $i->post('no_hp'),
							'alamat'	=> $i->post('alamat'),
							'tempat_lahir' => $i->post('tempat_lahir'),
							'tanggal_lahir'	=> $i->post('tanggal_lahir'),
							'umur'	=> $i->post('umur'),
							'agama' => $i->post('agama'),
							'pekerjaan'	=> $i->post('pekerjaan'),
						);
			//echo json_encode($data);
			$this->admin_model->add_customer($data);
			echo json_encode('sukses');
		}
	}

	// menampilkan data produk berdasarkan id
	public function detail_customer(){
		$id_customer 	= $this->input->post('id_customer');
		$customer = $this->admin_model->get_customer($id_customer);

		echo json_encode($customer);
	}

	public function edit_customer(){
		$this->form_validation->set_rules('id_customer', 'id_customer', 'required');
		$this->form_validation->set_rules('nik', 'nik', 'required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas', 'required');
		$this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
		$this->form_validation->set_rules('umur', 'umur', 'required');
		$this->form_validation->set_rules('agama', 'agama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$i 	= $this->input;
			$data = array(	'id_customer' => $i->post('id_customer'),
							'nik'	=> $i->post('nik'),
							'id_kelas' => $i->post('id_kelas'),
							'nama_pasien' => $i->post('nama_pasien'),
							'jenis_kelamin'	=> $i->post('jenis_kelamin'),
							'no_hp' => $i->post('no_hp'),
							'alamat'	=> $i->post('alamat'),
							'tempat_lahir' => $i->post('tempat_lahir'),
							'tanggal_lahir'	=> $i->post('tanggal_lahir'),
							'umur'	=> $i->post('umur'),
							'agama' => $i->post('agama'),
							'pekerjaan'	=> $i->post('pekerjaan'),
						);
			//echo json_encode($data);
			$this->admin_model->edit_customer($data);
			echo json_encode('sukses');
		}
	}

	public function del_customer($id){
		$this->admin_model->del_customer($id);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/customer'), 'refresh');
	}
}