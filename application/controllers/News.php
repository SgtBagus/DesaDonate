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

		$data['desa'] = $this->mymodel->selectWithQuery("SELECT * FROM master_desa WHERE status = 'ENABLE'");
		$data['kategori'] = $this->mymodel->selectWithQuery("SELECT * FROM master_kategoriberita WHERE status = 'ENABLE'");

		$kategori_query = "";
		if($kategori){
			$kategori_query = "AND berita.idKategori = ".$kategori;
		}

		$desa_query = "";
		if($desa){
			$desa_query = "AND user.idDesa = ".$desa;
		}

		$data['listberita'] = $this->mymodel->selectWithQuery("SELECT berita.idBerita as id, file.dir, 
			berita.judulberita, SUBSTR(berita.isiBerita, 1, 250) as isiBerita,
			date_format(berita.created_at, '%d %M %Y') as tanggal, user.name, master_desa.value as namadesa, 
			master_kategori.value as kategori, berita.views
			FROM berita
			LEFT JOIN user on berita.idUser = user.id
			LEFT JOIN master_desa on user.idDesa = master_desa.idDesa
			LEFT JOIN master_kategori on berita.idKategori = master_kategori.idKategori
			LEFT JOIN file on berita.idBerita = file.table_id
			WHERE berita.status = 'ENABLE' 
			AND file.table = 'berita'"
			.$kategori_query."
			".$desa_query);

		$data['admin_url'] = $this->admin_url;
		$data['page_name'] = "News";
		$this->template->load('template/template','news/index',$data);
	}

	public function view($id)
	{
		$data['berita'] = $this->mymodel->selectDataone('berita', array('idBerita' => $id, 'status' => 'ENABLE'));
		
		if(count($data['berita'])==0){
			redirect(base_url());
		}

		$data['berita_image'] = $this->mymodel->selectDataone('file', array('table' => 'berita', 'table_id' => $data['berita']['idBerita']));

		$data['kategori'] = $this->mymodel->selectDataone('master_kategoriberita', array('idKategoriB' => $data['berita']['idKategori']));

		$data['user'] = $this->mymodel->selectDataone('user', array('id' => $data['berita']['idUser']));

		$data['user_image'] = $this->mymodel->selectDataone('file', array('table' => 'user', 'table_id' => $data['user']['id']));

		$data['userDesa'] = $this->mymodel->selectDataone('master_desa', array('idDesa' => $data['user']['idDesa']));

		$data['admin_url'] = $this->admin_url;
		if($data['berita']){
			$view = $data['berita']['views'] + 1;
			$this->db->set('views', $view);
			$this->db->where('idBerita', $id);
			$this->db->update('berita');
			// var_dump($update);
			// die();
			$this->template->load('template/template','news/view',$data);
		}else{
			$this->load->view('errors/html/error_404');
		}
	}
	
}