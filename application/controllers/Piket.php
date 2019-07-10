<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piket extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
	}
	public function index()
	{
		$this->load->view('login');

	}

	public function login()
	{
		if($_POST['btn_submit']){
			
		$username=$_POST['username'];
		$password=$_POST['password'];
		$result = $this->mlogin->getAccountSiswa($username);
		$jmlresult = $result->num_rows();

			//cek username
			if($jmlresult ===1){
				//cek password
				$d = $result->row_array();
				if(password_verify($password,$d['password'])){

					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					redirect('manajemen/index');
				}else{
					$this->session->set_flashdata('pesanlogin','Username dan Password Anda Salah');
					redirect('piket/index');

				}
			}else{
				$this->session->set_flashdata('pesanlogin','Username dan Password Anda Salah');
				redirect('piket/index');
			}
		}
	}


	


}
