<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mlogin extends CI_Model {
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }
  
  
  public function login($email)
  {
    $email_special = htmlspecialchars($this->db->escape($email));
    // $password_password = htmlspecialchars($this->db->escape($password));
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where("emailUser = $email_special"); 
    $query = $this->db->get();
    return $query->num_rows();
  }
  
  
  public function data($email)
  {
   $email_special = htmlspecialchars($this->db->escape($email));    
   $this->db->select('*');
   $this->db->where("emailUser = $email_special"); 
   
   $query = $this->db->get('tbl_user');
   
   return $query->row();
  }

  public function userAddProcess($data){
		$query = $this->db->insert('master_user', $data);
		return $query;
	}

  
}  

?>
