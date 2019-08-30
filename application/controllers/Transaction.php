<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Transaction extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $params = array(
            'server_key' => 'SB-Mid-server-sbVLZhZJsLJeg4yXMbZNJM35',
            'production' => false
        );
        $this->load->library('veritrans');
        $this->veritrans->config($params);
        $this->load->helper('url');
    }
    public function index() {
        $this->load->view('transaction');
    }
    public function process() {
        $order_id = $this->input->post('order_id');
        $action   = $this->input->post('action');
        switch ($action) {
            case 'status':
                $this->status($order_id);
                break;
            case 'approve':
                $this->approve($order_id);
                break;
            case 'expire':
                $this->expire($order_id);
                break;
            case 'cancel':
                $this->cancel($order_id);
                break;
        }
    }
    public function status($order_id) {
        echo 'test get status </br>';
        print_r($this->veritrans->status($order_id));
    }
    public function cancel($order_id) {
        echo 'test cancel trx </br>';
        echo $this->veritrans->cancel($order_id);
    }
    public function approve($order_id) {
        echo 'test get approve </br>';
        print_r($this->veritrans->approve($order_id));
    }
    public function expire($order_id) {
        echo 'test get expire </br>';
        print_r($this->veritrans->expire($order_id));
    }
}
?>