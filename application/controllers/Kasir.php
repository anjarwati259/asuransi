<?php

class Kasir extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman
		$this->simple_login->cek_login();
		$this->load->model('admin_model');
	}
	public function index(){
		$data = array('title' => 'Dashboard Kasir',
                        'isi' => 'kasir/dashboard' );
        $this->load->view('layout/wrapper',$data, FALSE);
	}
}