
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Service extends MY_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['page_name'] = "service";
			$this->template->load('template/template','master/service/all-service',$data);
		}

		public function create()
		{
			$data['page_name'] = "service";
			$this->template->load('template/template','master/service/add-service',$data);
		}


		public function validate()
		{
			$this->form_validation->set_error_delimiters('<li>', '</li>');
	$this->form_validation->set_rules('dt[srv_nama]', '<strong>Srv Nama</strong>', 'required');
$this->form_validation->set_rules('dt[srv_ketarangan]', '<strong>Srv Ketarangan</strong>', 'required');
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
				$str = $this->db->insert('service', $dt);
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
					   				'table'=> 'service',
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
				   				'table'=> 'service',
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
	        $this->datatables->select('srv_id,srv_nama,srv_ketarangan,status');
	        $this->datatables->where('status',$status);
	        $this->datatables->from('service');
	        if($status=="ENABLE"){
	        $this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button></div>', 'srv_id');

	    	}else{
	        $this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button><button type="button" onclick="hapus($1)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</button></div>', 'srv_id');

	    	}
	        echo $this->datatables->generate();
		}
		public function edit($id)
		{
			$data['service'] = $this->mymodel->selectDataone('service',array('srv_id'=>$id));$data['file'] = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'service'));$data['page_name'] = "service";
			$this->template->load('template/template','master/service/edit-service',$data);
		}

		public function update()
		{
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			$this->validate();
			

	    	if ($this->form_validation->run() == FALSE){
				$this->alert->alertdanger(validation_errors());     
	        }else{
				$id = $this->input->post('srv_id', TRUE);
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
					   				'table'=> 'service',
					   				'table_id'=> $id,
					   				'updated_at'=>date('Y-m-d H:i:s')
					   	 		);
						$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'service'));
						@unlink($file['dir']);
						if($file==""){
							$this->mymodel->insertData('file', $data);
						}else{
							$this->mymodel->updateData('file', $data , array('id'=>$file['id']));
						}
						

						$dt = $_POST['dt'];
						$dt['updated_at'] = date("Y-m-d H:i:s");
						$this->mymodel->updateData('service', $dt , array('srv_id'=>$id));

						$this->alert->alertsuccess('Success Update Data');  
					}
				}else{
					$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('service', $dt , array('srv_id'=>$id));
					$this->alert->alertsuccess('Success Update Data');  
				}}
		}

		public function delete()
		{
				$id = $this->input->post('srv_id', TRUE);$file = $this->mymodel->selectDataone('file',array('table_id'=>$id,'table'=>'service'));
				@unlink($file['dir']);
				$this->mymodel->deleteData('file',  array('table_id'=>$id,'table'=>'service'));

				$this->mymodel->deleteData('service',  array('srv_id'=>$id));$this->alert->alertdanger('Success Delete Data');     
		}

		public function status($id,$status)
		{
			$this->mymodel->updateData('service',array('status'=>$status),array('srv_id'=>$id));
			redirect('master/Service');
		}


	}
?>