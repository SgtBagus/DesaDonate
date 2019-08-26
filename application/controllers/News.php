<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data['page_name'] = "News";
        $this->template->load('template/template','news/index',$data);
	}

	public function view($id)
	{
        $data['page_name'] = "News";
        $this->template->load('template/template','news/view',$data);
	}
	
}