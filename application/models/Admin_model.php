<?php 

/**
 * 
 */
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	// =========================== kelas =====================
	public function kelas(){
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->order_by('id_kelas','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_kelas($data){
		$this->db->insert('tb_kelas', $data);
	}
	public function get_kelas($id){
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->where('id_kelas',$id);
		$query = $this->db->get();
		return $query->row();
	}
	public function edit_kelas($data){
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->update('tb_kelas',$data);
	}
	public function del_kelas($id){
		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_kelas');
	}

	// =========================== Produk =====================
	public function produk(){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->order_by('id_produk','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_produk($data){
		$this->db->insert('tb_produk', $data);
	}
	public function get_produk($id){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('id_produk',$id);
		$query = $this->db->get();
		return $query->row();
	}
	public function edit_produk($data){
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('tb_produk',$data);
	}
	public function del_produk($id){
		$this->db->where('id_produk', $id);
		$this->db->delete('tb_produk');
	}

	// ==================== Detail produk ===================
	public function detail_produk(){
		$this->db->select('*');
		$this->db->from('tb_detail_produk');
		$this->db->order_by('id_detail_produk','asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_harga($produk,$kelas){
		$this->db->select('harga');
        $this->db->from('tb_detail_produk');
        $this->db->where('id_produk', $produk);
        $this->db->where('id_kelas', $kelas);
        $query = $this->db->get();
		return $query->row();
	}

	public function add_detail_produk($data){
		$this->db->insert('tb_detail_produk', $data);
	}
}