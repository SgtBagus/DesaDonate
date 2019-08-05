<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bss extends MY_Controller {

//============================================================================================================

	public function index()
	{
		$this->data['page_name'] = 'bss';
		$this->template->load('template/template','master/bss/test',$this->data);
	}
}
