<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoice extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function invoice($id)
	{
        $data = 'aa';
        $this->load->view('invoice/index');
		// $this->template->load('invoice/template','invoice/invoice', $data);
    }
		
	public function index(){
        $data = 'aa';
        $this->template->load('invoice/template','invoice/html', $data); 
    }

}