<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data['page_name'] = "home";
        $this->template->load('login/template','login/login',$data);
	}

	public function lupapassword()
	{
        $data['page_name'] = "home";
        $this->template->load('login/template','login/lupapassword',$data);
	}

	public function daftar()
	{
        $data['page_name'] = "home";
        $this->template->load('login/template','login/daftar',$data);
	}
	
}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */