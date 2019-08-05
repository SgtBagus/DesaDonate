
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Barang_jadi extends MY_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['page_name'] = "barang_jadi";
			$this->template->load('template/template','master/barang_jadi/all-barang_jadi',$data);
		}

		public function create()
		{
			$data['page_name'] = "barang_jadi";
			$this->template->load('template/template','master/barang_jadi/add-barang_jadi',$data);
		}


		public function validate()
		{
			$this->form_validation->set_error_delimiters('<li>', '</li>');
	$this->form_validation->set_rules('dt[id_badi]', '<strong>Id Badi</strong>', 'required');
$this->form_validation->set_rules('dt[badi_no]', '<strong>Badi No</strong>', 'required');
$this->form_validation->set_rules('dt[badi_namaserah]', '<strong>Badi Namaserah</strong>', 'required');
$this->form_validation->set_rules('dt[badi_namatrima]', '<strong>Badi Namatrima</strong>', 'required');
	}

		public function store()
		{
			$this->validate();
	    	if ($this->form_validation->run() == FALSE){
				$this->alert->alertdanger(validation_errors());     
	        }else{
	        	$dt = $_POST['dt'];
				$dt['created_at'] = date('Y-m-d H:i:s');
				$dt['status'] = "ENABLE";
				$str = $this->db->insert('barang_jadi', $dt);
				$last_id = $this->db->insert_id();	    if (!empty($_FILES['file']['name'])){
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
					   				'id' => '',
					   				'name'=> $file['file_name'],
					   				'mime'=> $file['file_type'],
					   				'dir'=> $dir.$file['file_name'],
					   				'table'=> 'barang_jadi',
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
				   				'table'=> 'barang_jadi',
				   				'table_id'=> $last_id,
				   				'status'=>'ENABLE',
				   				'created_at'=>date('Y-m-d H:i:s')
				   	 		);

				   	$str = $this->db->insert('file', $data);
					$this->alert->alertsuccess('Success Send Data');

					}
					    
					
			}
		}

		public function json()
		{
			$status = $_GET['status'];
			if($status==''){
				$status = 'ENABLE';
			}
			header('Content-Type: application/json');
	        $this->datatables->select(',id_badi,badi_no,badi_namaserah,badi_namatrima,status');
	        $this->datatables->where('status',$status);
	        $this->datatables->from('barang_jadi');
	        if($status=="ENABLE"){
	        $this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button></div>', '');

	    	}else{
	        $this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button><button type="button" onclick="hapus($1)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</button></div>', '');

	    	}
	        echo $this->datatables->generate();
		}
		public function edit($id)
		{
			$data['barang_jadi'] = $this->mymodel->selectDataone('barang_jadi',array(''=>$id));$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'barang_jadi'));$data['page_name'] = "barang_jadi";
			$this->template->load('template/template','master/barang_jadi/edit-barang_jadi',$data);
		}

		public function update()
		{
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			$this->validate();
			

	    	if ($this->form_validation->run() == FALSE){
				$this->alert->alertdanger(validation_errors());     
	        }else{
				$id = $this->input->post('', TRUE);
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
					   				'table'=> 'barang_jadi',
					   				'table_id'=> $id,
					   				'updated_at'=>date('Y-m-d H:i:s')
					   	 		);
						$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'barang_jadi'));
						@unlink($file['dir']);
						if($file==""){
							$this->mymodel->insertData('file', $data);
						}else{
							$this->mymodel->updateData('file', $data , array('id'=>$file['id']));
						}
						

						$dt = $_POST['dt'];
						$dt['updated_at'] = date("Y-m-d H:i:s");
						$this->mymodel->updateData('barang_jadi', $dt , array(''=>$id));

						$this->alert->alertsuccess('Success Update Data');  
					}
				}else{
					$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('barang_jadi', $dt , array(''=>$id));
					$this->alert->alertsuccess('Success Update Data');  
				}}
		}

		public function delete()
		{
				$id = $this->input->post('', TRUE);$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'barang_jadi'));
				@unlink($file['dir']);
				$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'barang_jadi'));

				$this->mymodel->deleteData('barang_jadi',  array(''=>$id));$this->alert->alertdanger('Success Delete Data');     
		}

		public function status($id,$status)
		{
			$this->mymodel->updateData('barang_jadi',array('status'=>$status),array(''=>$id));
			redirect('master/Barang_jadi');
		}


	}
?>