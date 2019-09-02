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
		// $data['admin_url'] = $this->admin_url;
		$this->template->load('invoice/template','invoice/html', $data); 
        // $this->load->view('invoice/index');
		// $this->template->load('invoice/template','invoice/invoice', $data);
    }
		
	public function index(){
        $data = 'aa';
        $this->template->load('template/template','invoice/html', $data); 
	}
	
	function cronjob_to_expired(){
		$data = $this->db->query("SELECT a.idDonasi, a.created_at, DATE_ADD(a.created_at, INTERVAL 1 DAY) as tanggal_kadaluarsa FROM donasi a
		WHERE a.statusPembayaran = 'Belum Terbayar' AND NOW() >  DATE_ADD(a.created_at, INTERVAL 1 DAY)")->result();
		print_r($data);	
		foreach($data as $d){
			$data = array(
				'tanggalKadaluarsa' => date('Y-m-d H:i:s'),
				'statusPembayaran' => 'Kadaluarsa',
			);
			
			$this->db->where('idDonasi', $d->idDonasi);
			$this->db->update('donasi', $data);
		}
	}

}