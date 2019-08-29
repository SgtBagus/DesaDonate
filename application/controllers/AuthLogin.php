<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AuthLogin extends MY_Controller {
	public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta"); 
        $this->dateToday = date("Y-m-d H:i:s");
	}

	public function logout(){
		$this->session->sess_destroy();
		header("Location: ".base_url());
	}

	public function loginProcess(){

		$google_data = $this->google->validate();
        $data = $google_data;
		$email = $data['email'];		$cek = $this->mlogin->login($email);
        $session = $this->mlogin->data($email);
        
		if ($cek > 0) {
			$this->session->set_userdata('session_sop', true);
			$this->session->set_userdata('id', $session->idUser);
			$this->session->set_userdata('email', $session->emailUser);
			$this->session->set_userdata('nama', $session->namaUser);
			$this->session->set_userdata('alamat', $session->alamatUser);
			$this->session->set_userdata('telepon', $session->teleponUser);
			$this->session->set_userdata('desc', $session->desc);
			$this->session->set_userdata('foto', $session->fotoUser);
			echo "success";
			header("Location:".base_url());
		}else {
			$data = array(
				'namaUser' => $data['name'],
				'emailUser' => $data['email'],
				'alamatUser' => '',
				'teleponUser' => '',
				'desc' => '',
				'fotoUser' => 'webfile/Default.png',
				'status' => 'ENABLE',
				'created_at' => $this->dateToday,
				'updated_at' => $this->dateToday,
			);
			$check = 0; 
			$check = $this->mlogin->userAddProcess($data);
			if($check > 0){
				$this->session->set_userdata('session_sop', true);
                $this->session->set_userdata('id', $session->idUser);
                $this->session->set_userdata('email', $session->emailUser);
                $this->session->set_userdata('nama', $session->namaUser);
                $this->session->set_userdata('alamat', $session->alamatUser);
                $this->session->set_userdata('telepon', $session->teleponUser);
				$this->session->set_userdata('desc', $session->desc);
				$this->session->set_userdata('foto', $session->fotoUser);
                echo "success";
				header("Location:".base_url());
			}
		}
        
    }
}