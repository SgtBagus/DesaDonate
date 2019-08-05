
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Currency extends MY_Controller {

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['page_name'] = "currency";
			$this->template->load('template/template','master/currency/all-currency',$data);
		}

		public function create()
		{
			$data['page_name'] = "currency";
			$this->template->load('template/template','master/currency/add-currency',$data);
		}


		public function validate()
		{
			$this->form_validation->set_error_delimiters('<li>', '</li>');
	$this->form_validation->set_rules('dt[cu_name]', '<strong>Cu Name</strong>', 'required');
$this->form_validation->set_rules('dt[cu_rate]', '<strong>Cu Rate</strong>', 'required');
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
				$str = $this->db->insert('currency', $dt);
				$last_id = $this->db->insert_id();$this->alert->alertsuccess('Success Send Data');   
					
			}
		}

		public function json()
		{
			$status = $_GET['status'];
			if($status==''){
				$status = 'ENABLE';
			}
			header('Content-Type: application/json');
	        $this->datatables->select('cu_id,cu_name,cu_rate,status');
	        $this->datatables->where('status',$status);
	        $this->datatables->from('currency');
	        if($status=="ENABLE"){
	        $this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button></div>', 'cu_id');

	    	}else{
	        $this->datatables->add_column('view', '<div class="btn-group"><button type="button" class="btn btn-sm btn-primary" onclick="edit($1)"><i class="fa fa-pencil"></i> Edit</button><button type="button" onclick="hapus($1)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</button></div>', 'cu_id');

	    	}
	        echo $this->datatables->generate();
		}
		public function edit($id)
		{
			$data['currency'] = $this->mymodel->selectDataone('currency',array('cu_id'=>$id));$data['page_name'] = "currency";
			$this->template->load('template/template','master/currency/edit-currency',$data);
		}

		public function update()
		{
			$this->form_validation->set_error_delimiters('<li>', '</li>');
			
			$this->validate();
			

	    	if ($this->form_validation->run() == FALSE){
				$this->alert->alertdanger(validation_errors());     
	        }else{
				$id = $this->input->post('cu_id', TRUE);		$dt = $_POST['dt'];
					$dt['updated_at'] = date("Y-m-d H:i:s");
					$this->mymodel->updateData('currency', $dt , array('cu_id'=>$id));
					$this->alert->alertsuccess('Success Update Data');  }
		}

		public function delete()
		{
				$id = $this->input->post('cu_id', TRUE);$this->alert->alertdanger('Success Delete Data');     
		}

		public function status($id,$status)
		{
			$this->mymodel->updateData('currency',array('status'=>$status),array('cu_id'=>$id));
			redirect('master/Currency');
		}


	}
?>