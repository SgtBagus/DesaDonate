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

		$data['donasi'] = $this->mymodel->selectWithQuery("SELECT donasi.*, galang_dana.tittleGalang from donasi
		LEFT JOIN galang_dana on donasi.idGalang = galang_dana.idGalang
		WHERE donasi.idUser = '$id' AND donasi.statusPembayaran = 'Terbayar'
		ORDER BY donasi.created_at desc");
		
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

		$data['donasi'] = $this->mymodel->selectWithQuery("SELECT donasi.*, galang_dana.tittleGalang from donasi
		LEFT JOIN galang_dana on donasi.idGalang = galang_dana.idGalang
		WHERE donasi.idUser = '$id'
		ORDER BY donasi.created_at desc");
		
		$data['page_name'] = "Penggalangan";
		$data['content'] = "donasi";
		$data['admin_url'] = $this->admin_url;
        $this->template->load('template/template','dashboard/index', $data);
	}

	public function cerita()
	{
		$id = $this->session->userdata('id');

		$data['biodata'] = $this->mymodel->selectWithQuery("SELECT tbl_user.*, 
		date_format(tbl_user.created_at, '%d %M %Y') as tanggal
		FROM tbl_user
		WHERE tbl_user.idUser = '$id'");

		$data['listcerita'] = $this->mymodel->selectWithQuery("SELECT cerita.idCerita as id, file.dir, 
		cerita.judulCerita, SUBSTR(cerita.isiCerita, 1, 380) as isiCerita,
		date_format(cerita.created_at, '%d %M %Y') as tanggal, tbl_user.namaUser, 
		master_kategoricreita.value as kategori, cerita.views, cerita.sinopsisCerita, cerita.likes
		FROM cerita
		LEFT JOIN tbl_user on cerita.idUser = tbl_user.idUser
		LEFT JOIN master_kategoricreita on cerita.idKategori = master_kategoricreita.idKategoriC
		LEFT JOIN file on cerita.idCerita = file.table_id
		WHERE cerita.status = 'ENABLE' AND file.table = 'cerita' AND cerita.idUser = '$id'");

		$data['content'] = "cerita";
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
			$id = $this->session->userdata('id');
			
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/profile/";
				$config['upload_path']          = $dir;
				$config['allowed_types']        = '*';
				$config['file_name']           = md5('smartsoftstudio').rand(1000,100000);
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('file')){
					$error = $this->upload->display_errors();
					$this->alert->alertdanger($error);		
				}else{
					$file = $this->upload->data();
					$data = array(
						'fotoUser'=> $dir.$file['file_name'],
					);
						
					
					$this->mymodel->updateData('tbl_user', $data , array('idUser'=>$id));
					
					$this->session->set_userdata('foto', $data['fotoUser']);
					// var_dump($s);
					// die();
					$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('tbl_user', $dt , array('idUser'=>$id));
					$this->alert->alertsuccess('Success Update Data');  
				}
			}else{
				$dt = $_POST['dt'];
				$dt['updated_at'] = date("Y-m-d H:i:s");
					
				$this->mymodel->updateData('tbl_user', $dt , array('idUser'=>$id));
				$this->alert->alertsuccess('Success Update Data');  
			}

		header("Location:".base_url('dashboard/account'));
    }
}