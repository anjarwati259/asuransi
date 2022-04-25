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
	public function add_klaim($data){
		$this->db->insert('tb_klaim', $data);
	}
	public function add_detail($data){
		$this->db->insert('tb_detail_klaim', $data);
	}
	public function update_saldo($data){
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('tb_detail_produk',$data);
	}

	public function klaim_by_id($id){
		$this->db->select('tb_klaim.*,tb_customer.nama_pasien, tb_kelas.nama_kelas');
		$this->db->from('tb_klaim');
		$this->db->join('tb_customer','tb_customer.id_customer = tb_klaim.id_customer','left');
		$this->db->join('tb_kelas','tb_kelas.id_kelas = tb_customer.id_kelas','left');
		$this->db->where('tb_klaim.id_klaim',$id);
		$query = $this->db->get();
		return $query->row();
	}
	public function detail_klaim($id){
		$this->db->select('tb_detail_klaim.*,tb_produk.nama_produk');
		$this->db->from('tb_detail_klaim');
		$this->db->join('tb_produk','tb_produk.id_produk = tb_detail_klaim.id_produk','left');
		$this->db->where('tb_detail_klaim.id_klaim',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_harga($data){
		$this->db->select('*');
		$this->db->from('tb_detail_produk');
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->where('id_kelas',$data['id_kelas']);
		$query = $this->db->get();
		return $query->row();
	}

	public function save_hasil($data){
		$this->db->where('id_klaim', $data['id_klaim']);
		$this->db->update('tb_klaim',$data);
	}

	public function list_klaim(){
		$this->db->select('tb_klaim.*,tb_customer.nama_pasien, tb_kelas.nama_kelas');
		$this->db->from('tb_klaim');
		$this->db->join('tb_customer','tb_customer.id_customer = tb_klaim.id_customer','left');
		$this->db->join('tb_kelas','tb_kelas.id_kelas = tb_customer.id_kelas','left');
		$this->db->order_by('tb_klaim.tgl_klaim','asc');
		$query = $this->db->get();
		return $query->result();
	}
}