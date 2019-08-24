<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page_name'] = "Penggalangan";
		$data['content'] = "overview";
        $this->template->load('template/template','dashboard/index', $data);
    }
		
	public function penggalangan()
	{
		$data['page_name'] = "Penggalangan";
		$data['content'] = "penggalangan";
        $this->template->load('template/template','dashboard/index', $data);
	}
	
	public function donasi()
	{
		$data['page_name'] = "Penggalangan";
		$data['content'] = "donasi";
        $this->template->load('template/template','dashboard/index', $data);
	}
	
	public function account()
	{
		$data['page_name'] = "Penggalangan";
		$data['content'] = "account";
        $this->template->load('template/template','dashboard/index', $data);
    }
}