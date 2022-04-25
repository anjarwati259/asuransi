<?php 

/**
 * 
 */
class Kasir_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// =========================== kelas =====================
	public function get_detail($id_produk,$id_kelas){
		$this->db->select('*');
		$this->db->from('tb_detail_produk');
		$this->db->where('id_produk',$id_produk);
		$this->db->where('id_kelas',$id_kelas);
		$query = $this->db->get();
		return $query->row();
	}
}