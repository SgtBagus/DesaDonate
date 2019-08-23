<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penggalangan extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data['page_name'] = "Penggalangan";
        $this->template->load('template/template','penggalangan',$data);
	}
	
}