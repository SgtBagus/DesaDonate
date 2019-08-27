<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $arr = array(
			'idKategori' => $this->input->post('idKategori'),
			'idDesa' => $this->input->post('idDesa'),
		  );
		  
		$this->session->set_userdata($arr);

		$kategori = $this->session->userdata('idKategori');

		$desa = $this->session->userdata('idDesa');

		// var_dump($kategori);
		// var_dump($desa);
		// die();
		$data['desa'] = $this->mymodel->selectWithQuery("SELECT * FROM master_desa WHERE status = 'ENABLE'");
		$data['kategori'] = $this->mymodel->selectWithQuery("SELECT * FROM master_kategori WHERE status = 'ENABLE'");

		if($kategori == ''){
			$data['listberita'] = $this->mymodel->selectWithQuery("SELECT berita.idBerita as id, file.dir, 
			berita.judulberita, berita.isiBerita,
			berita.created_at, user.name, master_desa.value as namadesa, 
			master_kategori.value as kategori
			FROM berita
			LEFT JOIN user on berita.idUser = user.id
			LEFT JOIN master_desa on user.idDesa = master_desa.idDesa
			LEFT JOIN master_kategori on berita.idKategori = master_kategori.idKategori
			LEFT JOIN file on berita.idBerita = file.table_id
			WHERE berita.status = 'ENABLE' AND file.table = 'berita'");
		}else{
			$data['listberita'] = $this->mymodel->selectWithQuery("SELECT berita.idBerita as id, file.dir, berita.judulberita, berita.isiBerita,
			berita.created_at, user.name, master_desa.value as namadesa, 
			master_kategori.value as kategori
			FROM berita
			LEFT JOIN user on berita.idUser = user.id
			LEFT JOIN master_desa on user.idDesa = master_desa.idDesa
			LEFT JOIN master_kategori on berita.idKategori = master_kategori.idKategori
			LEFT JOIN file on berita.idBerita = file.table_id
			WHERE berita.status = 'ENABLE' AND berita.idKategori = '$kategori' AND user.idDesa = '$desa'
			AND file.table = 'berita'");
		}
		$data['admin_url'] = $this->admin_url;
        $data['page_name'] = "News";
        $this->template->load('template/template','news/index',$data);
	}

	public function view($id)
	{
        $data['page_name'] = "News";
        $this->template->load('template/template','news/view',$data);
	}
	
}