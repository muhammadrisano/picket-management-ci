<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpiket extends CI_Model {

	var $table = "manajemen_absensi";

	public function getManajemenPiket($where="")
	{
		$data = $this->db->query("SELECT * FROM manajemen_absensi".$where);
		return $data;

	}

	public function getDataAbsen($where="")
	{
		$this->db->select('manajemen_absensi.*,account_siswa.nama_lengkap');
		$this->db->from('manajemen_absensi');
		$this->db->join('account_siswa','account_siswa.nis = manajemen_absensi.nis');
		$query = $this->db->get();
		return $query;
	}

	public function add_absen($data){
		$res = $this->db->insert($this->table,$data);
		return $res;
	}
	public function getJumlahAbsen($where="")
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('aist',$where);
		$query = $this->db->get();
		return $query;

	}
	public function getManajemenAbsensi($where="")
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join("account_siswa","account_siswa.nis = $this->table.nis");
		$this->db->where('tahun_pelajaran',$where['tp']);
		$this->db->where('semester',$where['semester']);
		$this->db->order_by('id_absensi','DESC');
		$query = $this->db->get();
		return $query;
	}

	public function get_id_absensi($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_absensi',$id);
		$query =  $this->db->get();
		return $query->row();
	}

	public function get_nis_nama($nis)
	{
		$this->db->select('nama_lengkap');
		$this->db->from('account_siswa');
		$this->db->where('nis',$nis);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete_absensi($where)
	{
		$this->db->where('id_absensi',$where);
		$this->db->delete($this->table);
	}

	public function getSiswaPerkelas($where="",$tp="")
	{
		$this->db->select('*');
		$this->db->from('manajemen_kelas');
		$this->db->join("account_siswa","account_siswa.nis = manajemen_kelas.nis");

		$this->db->where('kode_kelas',$where);
		$this->db->where('tahun_pelajaran',$tp['tp']);
		$query = $this->db->get();
		return $query;


	}
	public function jumlahAbsensi($where="",$tp="",$ket="")
	{
		
		$this->db->select('*');
		$this->db->from('manajemen_absensi');
		$this->db->where('nis',$where);
		$this->db->where('tahun_pelajaran',$tp['tp']);
		$this->db->where('semester',$tp['semester']);
		$this->db->where('aist',$ket);

		$query = $this->db->get();
		return $query->num_rows();

	}

	public function getKelas($where){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('kode_kelas',$where);
		$query = $this->db->get();
		return $query;
	}
}
