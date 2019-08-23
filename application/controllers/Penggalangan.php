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
        $this->template->load('template/template','penggalangan/index',$data);
	}

	public function view($id)
	{
        $data['page_name'] = "Penggalangan";
        $this->template->load('template/template','penggalangan/view',$data);
	}
	
}