<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penggalangan extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
	
		$arr = array(
			'idKategori' => $this->input->post('idKategori'),
		  );
		  
		$this->session->set_userdata($arr);

		$kategori = $this->session->userdata('idKategori');

		// var_dump($kategori);
		// die();
		$data['kategori'] = $this->mymodel->selectWithQuery("SELECT * FROM master_kategori WHERE status = 'ENABLE'");

		if($kategori == ''){
			$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT a.idGalang as id, 
			a.tittleGalang as tittleGalang, desa.value as desa_value, a.targetDonasi as targetDonasi, 
			file.dir as file_dir, a.status as status, kate.value as kategori, 
			COALESCE(SUM(donasi.nominalDonasi), 0) as terkumpul, 
			COALESCE(SUM(update_galang_dana.nominalterpakai), 0) as terpakai,
			a.deskripsiGalang as deskripsi
			FROM galang_dana a 
			LEFT JOIN file on a.idGalang = file.table_id 
			LEFT JOIN user u on a.idUser = u.id 
			LEFT JOIN donasi on a.idGalang = donasi.idGalang
			LEFT JOIN update_galang_dana on a.idGalang = update_galang_dana.idGalang
			LEFT JOIN master_desa desa on u.idDesa = desa.idDesa 
			LEFT JOIN master_kategori kate on a.idKategori = kate.idKategori
			where file.table = 'galang_dana' AND a.status = 'ENABLE'
			GROUP BY a.idGalang
			ORDER BY a.created_at desc");
		}else{
			$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT a.idGalang as id, 
			a.tittleGalang as tittleGalang, desa.value as desa_value, a.targetDonasi as targetDonasi, 
			file.dir as file_dir, a.status as status, kate.value as kategori, 
			COALESCE(SUM(donasi.nominalDonasi), 0) as terkumpul, 
			COALESCE(SUM(update_galang_dana.nominalterpakai), 0) as terpakai,
			a.deskripsiGalang as deskripsi
			FROM galang_dana a 
			LEFT JOIN file on a.idGalang = file.table_id 
			LEFT JOIN user u on a.idUser = u.id 
			LEFT JOIN donasi on a.idGalang = donasi.idGalang
			LEFT JOIN update_galang_dana on a.idGalang = update_galang_dana.idGalang
			LEFT JOIN master_desa desa on u.idDesa = desa.idDesa 
			LEFT JOIN master_kategori kate on a.idKategori = kate.idKategori
			where file.table = 'galang_dana' AND a.status = 'ENABLE' AND a.idKategori = '$kategori'
			GROUP BY a.idGalang
			ORDER BY a.created_at desc");
		}
		$data['admin_url'] = $this->admin_url;
        $data['page_name'] = "Penggalangan";
        $this->template->load('template/template','penggalangan/index',$data);
	}

	public function view($id)
	{
		$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT a.idGalang as id, 
			a.tittleGalang as tittleGalang, desa.value as desa_value, a.targetDonasi as targetDonasi, 
			file.dir as file_dir, a.status as status, kate.value as kategori, 
			COALESCE(SUM(donasi.nominalDonasi), 0) as terkumpul, 
			COALESCE(SUM(update_galang_dana.nominalterpakai), 0) as terpakai,
			a.deskripsiGalang as deskripsi,
			u.name as namaPenggalang,
			date_format(a.created_at, '%d %M %Y') as dibuat,
			date_format(u.created_at, '%d %M %Y') as userdibuat,
			a.deskripsiGalang
			FROM galang_dana a 
			LEFT JOIN file on a.idGalang = file.table_id 
			LEFT JOIN user u on a.idUser = u.id 
			LEFT JOIN donasi on a.idGalang = donasi.idGalang
			LEFT JOIN update_galang_dana on a.idGalang = update_galang_dana.idGalang
			LEFT JOIN master_desa desa on u.idDesa = desa.idDesa 
			LEFT JOIN master_kategori kate on a.idKategori = kate.idKategori
			where file.table = 'galang_dana' AND a.status = 'ENABLE' AND a.idGalang = '$id'
			GROUP BY a.idGalang");

			$data['updategalang'] = $this->mymodel->selectWithQuery("SELECT update_galang_dana.deskripsiUpdate, 
			update_galang_dana.nominalterpakai, user.name, date_format(update_galang_dana.created_at, '%d %M %Y') as tglupdate
			FROM update_galang_dana
			LEFT JOIN galang_dana on update_galang_dana.idGalang = galang_dana.idGalang
			LEFT join user on update_galang_dana.idUser = user.id
			WHERE update_galang_dana.idGalang = '$id' AND update_galang_dana.status = 'ENABLE'");
			
			$data['donaturwaktu'] = $this->mymodel->selectWithQuery("SELECT donasi.idUser as id, tbl_user.namaUser, 
			donasi.nominalDonasi, donasi.statusDonatur, donasi.tanggalPembayaran
			FROM donasi
			LEFT JOIN tbl_user on donasi.idUser = tbl_user.idUser
			WHERE donasi.status = 'ENABLE'
			AND donasi.idGalang = '$id' ORDER BY donasi.tanggalPembayaran desc");

		$data['admin_url'] = $this->admin_url;
        $data['page_name'] = "Penggalangan";
        $this->template->load('template/template','penggalangan/view',$data);
	}
	
}