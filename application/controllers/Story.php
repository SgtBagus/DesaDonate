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


	public function view($id)
	{
		$data['page_name'] = "Story";
		$this->template->load('template/template','story/view', $data);
	}


	public function validate()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[judul]', '<strong>Judul Cerita</strong> Tidak Boleh Kosong', 'required');

		$supported_file = array(
			'jpg', 'jpeg'
		);
		$src_file_name = $_FILES['dt']['name']['gambar_cerita'];

		if($src_file_name){
			$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); 

			if (!in_array($ext, $supported_file)) {
				$this->form_validation->set_rules('dt[gambar_cerita]', '<strong>Gambar</strong> Harus berformat JPG, JPEG', 'required');
			} 	
		}

		$this->form_validation->set_rules('dt[deskripsi]', '<strong>Deskripsi Singkat Cerita </strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function create(){
		$this->validate();

		if ($this->form_validation->run() == FALSE){
			$this->alert->alertdanger(validation_errors());     	        
		}else{
			$this->alert->alertsuccess('Cerita Berhasil Dibuat !');
		}
	}


	public function edit($id){

		$data['page_name'] = "Story";
		$this->template->load('template/template','story/edit', $data);
	}
}