<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Actlogin extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function logout(){
		$this->session->sess_destroy();
		header("Location: ".base_url());
	}
	
	public function login(){

		$username = $this->input->post('email');
		$cek     = $this->mlogin->login($username);
		$session = $this->mlogin->data($username);

		if ($cek > 0) {
			$this->session->set_userdata('session_sop', true);
			$this->session->set_userdata('id', $session->idUser);
			$this->session->set_userdata('email', $session->emailUser);
			$this->session->set_userdata('nama', $session->namaUser);
			$this->session->set_userdata('alamat', $session->alamatUser);
			$this->session->set_userdata('telepon', $session->teleponUser);
			echo "success";
		} else {
			$this->alert->alertdanger("Email tidak terdaftar mohon cek kembali email anda");
			return FALSE;
		}

	}
}