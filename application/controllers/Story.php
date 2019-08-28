<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Story extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page_name'] = "Story";
        $this->template->load('template/template','story/index', $data);
    }
		
}