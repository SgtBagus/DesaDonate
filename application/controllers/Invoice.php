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
		$this->load->view('invoice/index', $data);
    }
		
}