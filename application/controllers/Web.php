<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Web extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$slug = $this->uri->segment(2);

		$data['data'] = $this->db->query("SELECT * FROM webpage WHERE slug='$slug'")->result();
		if(count($data['data'])==0){
			redirect(base_url());
		  }
		  
		$data['admin_url'] = $this->admin_url;
        $data['page_name'] = "Ayo Bangun Desa - ".($data['data'][0]->title);
        $this->template->load('template/template','web/index',$data);
	}
	
}