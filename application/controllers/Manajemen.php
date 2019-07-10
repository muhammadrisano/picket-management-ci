<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('mpiket');
		if(!isset($_SESSION['usernmae']) AND !isset($_SESSION['password'])){
			redirect('piket/index');
			exit;
		}
	}

	public function tp()
	{
		$tahun = date('Y');
		$semester = "";
		$tp ="";
		$bulan_skr= date('m');
		$semester ="";
		if($bulan_skr >= 7){
			$tp = $tahun;
			$semester = "GANJI";
		}else{
			$tp=$tahun-1;
			$semester ="GENAP";
		}
		$data = array('tp'=>$tp,
						'semester'=>$semester);
		return $data;	

	}
	public function index()
	{
		$halaman = array('content'=>$this->content(),
							'header'=>$this->header(),
							'navigator'=>$this->navigator()
			);	
		$this->load->view('dasboard/index',$halaman);

	}

	public function content()
	{
		$ts = $this->tp();
		$alfa = $this->mpiket->getJumlahAbsen('ALFA')->num_rows();
		$izin = $this->mpiket->getJumlahAbsen('IZIN')->num_rows();
		$sakit = $this->mpiket->getJumlahAbsen('SAKIT')->num_rows();
		$terlambat = $this->mpiket->getJumlahAbsen('TERLAMBAT')->num_rows();


		return $this->load->view('dasboard/content',array('alfa'=>$alfa,'izin'=>$izin, 'sakit'=>$sakit,'terlambat'=>$terlambat,'ts'=>$ts),true);
	}

	public function header()
	{
		return $this->load->view('dasboard/header',array(),true);
	}
	public function navigator()
	{
		$foto = "images.jpeg";
		return $this->load->view('dasboard/navigator',array('foto'=>$foto),true);
	}

	public function manajemen_absensi()
	{
		$data['data']=$this->mpiket->getManajemenAbsensi($this->tp())->result();
		$halaman = array('content'=>$this->load->view('dasboard/isi/manajemen_absensi',$data,true),
							'header'=>$this->header(),
							'navigator'=>$this->navigator()
			);	
		$this->load->view('dasboard/index',$halaman);
	}
	
	public function absen_add(){

		
		$nis = $this->input->post('nis');
		$aist = $this->input->post('aist');
		$tanggal = $this->input->post('tanggal');
		if($nis == ""){
			$result['pesan'] = "Nis Harus diisi";
		}elseif($aist == ""){
			$result['pesan'] = "AIST Harus diisi";
		}elseif($tanggal ==""){
			$result['pesan'] = "Tanggal Harus diisi";
		}else{
		$data = array('id_absensi'=>$this->input->post('id_absensi'),
						'nis'=>$nis,
						'aist'=>$aist,
						'keterangan'=>$this->input->post('keterangan'),
						'tanggal'=>$tanggal,
						'tahun_pelajaran'=>$this->tp()['tp'],
						'semester'=>$this->tp()['semester']
			);
			$insert = $this->mpiket->add_absen($data);
			$result['pesan']="";
		}
			echo json_encode($result);
		
	}


	

	public function ajaxeditdata($id)
	{
		$data = $this->mpiket->get_id_absensi($id);
		echo json_encode($data);
	}

	public function ajaxnisname($nis)
	{
	
		$get = $this->mpiket->get_nis_nama($nis);
		echo json_encode($get);
	}

	public function absensi_delete($where)
	{
		$this->mpiket->delete_absensi($where);
		echo json_encode(array("status"=>true));
	}

	public function kehadiransiswa()
	{


		if($_POST){
			$kelas = $this->input->post('kelas');
			$nk = $this->mpiket->getKelas($kelas)->row_array();
			$namakelas = $nk['nama_kelas'];
			$res = $this->mpiket->getSiswaPerkelas($kelas,$this->tp());
			$jumlah = $res->num_rows();
			$proses = $res->result_array();
			for($i=0;$i<$jumlah;$i++){
				$jmlalfa = $this->mpiket->jumlahAbsensi($proses[$i]['nis'],$this->tp(),'ALFA');
				$proses[$i]['alfa']=$jmlalfa;
				$jmlizin = $this->mpiket->jumlahAbsensi($proses[$i]['nis'],$this->tp(),'IZIN');
				$proses[$i]['izin']=$jmlizin;
				$jmlsakit = $this->mpiket->jumlahAbsensi($proses[$i]['nis'],$this->tp(),'SAKIT');
				$proses[$i]['sakit']=$jmlsakit;
				$jmlterlambat = $this->mpiket->jumlahAbsensi($proses[$i]['nis'],$this->tp(),'TERLAMBAT');
				$proses[$i]['terlambat']=$jmlterlambat;
			}
	

		}else{
			$namakelas ="";
			$proses = null;
		}

		$halaman = array('content'=>$this->load->view('dasboard/isi/kehadiran_siswa',array('data'=>$proses,'kelas'=>$namakelas),true),
							'header'=>$this->header(),
							'navigator'=>$this->navigator()
			);	
		$this->load->view('dasboard/index',$halaman);
	}

	
	public function getsiswakelas()
	{	


	}


}

