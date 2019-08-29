<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Story extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['listcerita'] = $this->mymodel->selectWithQuery("SELECT cerita.idCerita as id, file.dir, 
		cerita.judulCerita, SUBSTR(cerita.isiCerita, 1, 200) as isiCerita,
		date_format(cerita.created_at, '%d %M %Y') as tanggal, tbl_user.namaUser, 
		master_kategoricreita.value as kategori, cerita.views
		FROM cerita
		LEFT JOIN tbl_user on cerita.idUser = tbl_user.idUser
		LEFT JOIN master_kategoricreita on cerita.idKategori = master_kategoricreita.idKategoriC
		LEFT JOIN file on cerita.idCerita = file.table_id
		WHERE cerita.status = 'ENABLE' AND file.table = 'cerita'");
		
		$data['admin_url'] = $this->admin_url;
		$data['page_name'] = "Story";
        $this->template->load('template/template','story/index', $data);
    }
		
}