<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

Class Mlogin Extends CI_Model{

	public function getAccountSiswa($where)
	{
		$data = $this->db->query("SELECT * FROM account_piket WHERE username = '$where'");
		return $data;
	}





}