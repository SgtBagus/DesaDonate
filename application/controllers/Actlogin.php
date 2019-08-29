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

	public function loginProcess(){
		$google_data = $this->google->validate();
		$data = $google_data;
		
		$email = $data['email'];

		// $cek = $this->UserModel->userData($email)->num_rows();
		$cek = $this->mlogin->login($email);

		$data_session = array(
			'authUser' => false
		);
		if ($cek > 0) {
			$data_session = array(
				'authUser' => true,
				'idUser' => $this->UserModel->userData($email)->row('id_user'),
			);
			$this->session->set_userdata($data_session);
			redirect(base_url()."dashboard/");
		}else {
			$data = array(
				'nama_lengkap' => $data['name'],
				'email' => $data['email'],
				'rule' => 'Pendaftar',
				'foto_profil' => 'Default.png',
				'created_at' => $this->dateToday,
				'updated_at' => $this->dateToday,
				'status_user' => 'ENABLE',
			);
			$check = 0; 
			$check = $this->UserModel->userAddProcess($data);
			if($check > 0){
				$data_session = array(
					'authUser' => true,
					'idUser' => $this->UserModel->userData($email)->row('id_user'),
				);
				$this->session->set_userdata($data_session);
				redirect(base_url()."dashboard/");
			}else{
				redirect(base_url());
			}
		}
        
    }
}