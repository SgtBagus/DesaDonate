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
		$data['donasi'] = $this->mymodel->selectWithQuery("SELECT SUM(donasi.nominalDonasi) as total
		FROM donasi");
		$data['donatur'] = $this->mymodel->selectWithQuery("SELECT COUNT(idUser) as jumlah
		FROM tbl_user");
		$data['listgalang'] = $this->mymodel->selectWithQuery("SELECT * FROM galang_dana LEFT JOIN file
		on galang_dana.idGalang = file.table_id
		where file.table = 'galang_dana'");

		$data['admin_url'] = $this->admin_url;

		// print_r($data['admin_url']);
		// die();
        $this->template->load('template/template','index',$data);
	}
	
}