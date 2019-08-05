

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report_customer','rCustomer');
  }

  public function index()
  {
      $data['page_name'] = "Report Customer";
      $this->template->load('template/template','report/customer/all',$data);
    
  }
 

  function ajaxAll()
  {
    $list = $this->rCustomer->get_datatables();
    $data = array();
    $i=1;
    foreach ($list as $u) {
      $row = array();

      $row[] = $i;
  $row[] = $u->nama;
$row[] = $u->email;
$row[] = $u->telp;
$row[] = $u->alamat;
$row[] = $u->status;
$row[] = $u->dir;
$row[] = "<button type='button' class='btn btn-info btn-flat' onclick='detail()'><i class='fa fa-edit'></i>Detail</button>";
      $data[] = $row;
    $i++;
    }
    


    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->rCustomer->count_all(),
      "recordsFiltered" => $this->rCustomer->count_filtered(),
      "data" => $data
    );

    echo json_encode($output);
  }


  function getExcel(){
    $list = $this->rCustomer->get_data();
    $data = array();
    $i=1;
    foreach ($list as $u) {


  
    $data[] = array($i,$u->nama,$u->email,$u->telp,$u->alamat,$u->status,$u->dir);
  
    $i++;
    }

    $judul = "Report Customer";

    $head = array('No','nama','email','telp','alamat','status','dir');

    $json = [
      'judul'=>$judul,
      'head'=>$head,
      'data'=>$data
    ];

    $this->session->set_flashdata('report',$json);
    redirect('fitur/exportreport');


  }
  

}

/* End of file  */
/* Location: ./application/controllers/ */
 ?> 