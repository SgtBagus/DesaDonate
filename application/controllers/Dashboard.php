<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$data['page_name'] = "Penggalangan";
		$data['content'] = "overview";
		$data['admin_url'] = $this->admin_url;
		
		$data['biodata'] = $this->mymodel->selectWithQuery("SELECT tbl_user.*, 
		date_format(tbl_user.created_at, '%d %M %Y') as tanggal
		FROM tbl_user
		WHERE tbl_user.idUser = '$id'");

		$data['jumlahgalang'] = $this->mymodel->selectWithQuery("SELECT idGalang, 
		COUNT(idDonasi) as jumlahdonasi
		FROM donasi
		WHERE idUser = '$id' AND statusPembayaran = 'Terbayar' AND status = 'ENABLE'
		GROUP BY idGalang");

		$data['jumlahdonasi'] = $this->mymodel->selectWithQuery("SELECT count(idDonasi) as jumlah
		FROM donasi
		WHERE statusPembayaran = 'Terbayar' AND status = 'ENABLE' AND idUser = '$id'");

		$data['totaldonasi'] = $this->mymodel->selectWithQuery("SELECT SUM(nominalDonasi) as total
		FROM donasi
		WHERE statusPembayaran = 'Terbayar' AND status = 'ENABLE' AND idUser = '$id'");
		
		$this->template->load('template/template','dashboard/index', $data);
    }
		
	public function penggalangan()
	{
		$data['page_name'] = "Penggalangan";
		$data['content'] = "penggalangan";
		$data['admin_url'] = $this->admin_url;
        $this->template->load('template/template','dashboard/index', $data);
	}
	
	public function donasi()
	{
		$id = $this->session->userdata('id');

		$data['biodata'] = $this->mymodel->selectWithQuery("SELECT tbl_user.*, 
		date_format(tbl_user.created_at, '%d %M %Y') as tanggal
		FROM tbl_user
		WHERE tbl_user.idUser = '$id'");
		
		$data['page_name'] = "Penggalangan";
		$data['content'] = "donasi";
		$data['admin_url'] = $this->admin_url;
        $this->template->load('template/template','dashboard/index', $data);
	}
	
	public function account()
	{
		$id = $this->session->userdata('id');
		
		$data['biodata'] = $this->mymodel->selectWithQuery("SELECT tbl_user.*, 
		date_format(tbl_user.created_at, '%d %M %Y') as tanggal
		FROM tbl_user
		WHERE tbl_user.idUser = '$id'");

		$data['page_name'] = "Penggalangan";
		$data['content'] = "account";
		$data['admin_url'] = $this->admin_url;
        $this->template->load('template/template','dashboard/index', $data);
	}
	
	public function editaccount()
	{
		$dt = $_POST['dt'];

		$dt['nominalDonasi'] = str_replace( ',', '', $dt['nominalDonasi'] );
		
		if($dt['statusDonatur']){
			$dt['statusDonatur'] = '1';
		}else{
			$dt['statusDonatur'] = '0';
		}

		$dt['statusPembayaran'] = "Belum Terbayar";
		
		$dt['created_at'] = date('Y-m-d H:i:s');

		$dt['status'] = "ENABLE";
		
		var_dump($dt);
		die();
		

		$str = $this->db->insert('donasi', $dt);

		header("Location:".base_url('dashboard/account'));
    }
}