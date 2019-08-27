<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['page_name'] = "home";
		$data['terdanai'] = $this->mymodel->selectWithQuery("SELECT COUNT(a.idGalang) as jumlah
		FROM
			(SELECT galang_dana.idGalang, galang_dana.targetDonasi, SUM(donasi.nominalDonasi) as total
			FROM galang_dana
			LEFT JOIN donasi on galang_dana.idGalang = donasi.idGalang
			GROUP BY galang_dana.idGalang ) as a
		WHERE a.total < a.targetDonasi");

		$data['total_desa'] = $this->mymodel->selectWithQuery("SELECT COUNT(idDesa) as jumlah FROM master_desa WHERE status = 'ENABLE' ");

		$data['total_galang'] = $this->mymodel->selectWithQuery("SELECT COUNT(idGalang) as jumlah FROM galang_dana WHERE status = 'ENABLE' ");

		$data['donasi'] = $this->mymodel->selectWithQuery("SELECT SUM(donasi.nominalDonasi) as total
		FROM donasi WHERE status = 'ENABLE'");

		$data['donatur'] = $this->mymodel->selectWithQuery("SELECT COUNT(idUser) as jumlah
		FROM tbl_user WHERE status = 'ENABLE'");
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
		ORDER BY a.created_at desc
		LIMIT 4");

		
		$data['admin_url'] = $this->admin_url;

        $this->template->load('template/template','index',$data); 
	}

	public function profil($name)
	{
		$data['page_name'] = "profl";
        $this->template->load('template/template','profil',$data);
	}
	
}