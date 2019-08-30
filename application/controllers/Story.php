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
			master_kategoricreita.value as kategori, cerita.views, cerita.sinopsisCerita
			FROM cerita
			LEFT JOIN tbl_user on cerita.idUser = tbl_user.idUser
			LEFT JOIN master_kategoricreita on cerita.idKategori = master_kategoricreita.idKategoriC
			LEFT JOIN file on cerita.idCerita = file.table_id
			WHERE cerita.status = 'ENABLE' AND cerita.publish = 'ENABLE' AND file.table = 'cerita'");
		
		$data['admin_url'] = $this->admin_url;
		$data['page_name'] = "Story";
		$this->template->load('template/template','story/index', $data);
	}


	public function view($id)
	{
		
		$data['admin_url'] = $this->admin_url;

		$data['cerita'] = $this->mymodel->selectDataone('cerita', array('idCerita' => $id, 'status' => 'ENABLE'));
		
		$data['cerita_image'] = $this->mymodel->selectDataone('file', array('table' => 'cerita', 'table_id' => $data['cerita']['idCerita']));

		$data['kategori'] = $this->mymodel->selectDataone('master_kategoricreita', array('idKategoriC' => $data['cerita']['idKategori']));

		$data['user'] = $this->mymodel->selectDataone('tbl_user', array('idUser' => $data['cerita']['idUser']));
		
		$data['page_name'] = "Story";
		
		if($data['cerita']){
			$view = $data['cerita']['views'] + 1;
			$this->db->set('views', $view);
			$this->db->where('idCerita', $id);
			$this->db->update('cerita');
			// var_dump($update);
			// die();
			$this->template->load('template/template','story/view', $data);
		}else{
			$this->load->view('errors/html/error_404');
		}
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
			
		$dt = $_POST['dt'];
		$dt['created_at'] = date('Y-m-d H:i:s');
		$dt['status'] = "ENABLE";
		$dt['publish'] = "DISABLE";
		$dt['idUser'] = $this->session->userdata('id');
		// var_dump($dt);
		// die();
		$str = $this->db->insert('cerita', $dt);
		$last_id = $this->db->insert_id();	    
			
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/story/";
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
								   'id' => '',
								   'name'=> $file['file_name'],
								   'mime'=> $file['file_type'],
								   'dir'=> $dir.$file['file_name'],
								   'table'=> 'cerita',
								   'table_id'=> $last_id,
								   'status'=>'ENABLE',
								   'created_at'=>date('Y-m-d H:i:s')
								);
					   $str = $this->db->insert('file', $data);
					$this->alert->alertsuccess('Success Send Data');    
				} 
			}else{
				$data = array(
							   'id' => '',
							   'name'=> '',
							   'mime'=> '',
							   'dir'=> '',
							   'table'=> 'cerita',
							   'table_id'=> $last_id,
							   'status'=>'ENABLE',
							   'created_at'=>date('Y-m-d H:i:s')
							);
				   $str = $this->db->insert('file', $data);
				$this->alert->alertsuccess('Success Send Data');
			}

			header("Location:".base_url('story/edit/'.$last_id));
	}


	public function edit($id){

		$data['admin_url'] = $this->admin_url;

		$data['cerita'] = $this->mymodel->selectDataone('cerita', array('idCerita' => $id, 'status' => 'ENABLE'));
		
		$data['cerita_image'] = $this->mymodel->selectDataone('file', array('table' => 'cerita', 'table_id' => $data['cerita']['idCerita']));

		$data['kategori'] = $this->mymodel->selectDataone('master_kategoricreita', array('idKategoriC' => $data['cerita']['idKategori']));

		$data['user'] = $this->mymodel->selectDataone('tbl_user', array('idUser' => $data['cerita']['idUser']));
		
		$data['page_name'] = "Story";
		
		if($data['cerita']){
			$this->template->load('template/template','story/edit', $data);
		}else{
			$this->load->view('errors/html/error_404');
		}
	}

	
	public function update(){

			$id = $this->input->post('idCerita', TRUE);
			
			if (!empty($_FILES['file']['name'])){
				$dir  = "webfile/";
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
								   'name'=> $file['file_name'],
								   'mime'=> $file['file_type'],
								   // 'size'=> $file['file_size'],
								   'dir'=> $dir.$file['file_name'],
								   'table'=> 'cerita',
								   'table_id'=> $id,
								   'updated_at'=>date('Y-m-d H:i:s')
								);
					$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'cerita'));
					@unlink($file['dir']);
					if($file==""){
						$this->mymodel->insertData('file', $data);
					}else{
						$this->mymodel->updateData('file', $data , array('id'=>$file['id']));
					}
					
					$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('cerita', $dt , array('idCerita'=>$id));
					$this->alert->alertsuccess('Success Update Data');  
				}
			}else{
				$dt = $_POST['dt'];
				$dt['updated_at'] = date("Y-m-d H:i:s");
				var_dump($dt);
				// die();
				$this->mymodel->updateData('cerita', $dt , array('idCerita'=>$id));
				$this->alert->alertsuccess('Success Update Data');  
			}
	header("Location:".base_url('story/view/'.$id));
	}

	public function publish($id){

		$dt['publish'] = 'ENABLE';
		$this->mymodel->updateData('cerita', $dt , array('idCerita'=>$id));

		header("Location:".base_url('story/edit/'.$id));
	}

	public function hide($id){

		$dt['publish'] = 'DISABLE';
		$this->mymodel->updateData('cerita', $dt , array('idCerita'=>$id));

		header("Location:".base_url('story/edit/'.$id));
	}
}