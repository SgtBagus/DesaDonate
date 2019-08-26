<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!$this->session->userdata('session_sop')){
			$this->template->load('login/template','login/login');
		} else{
			header("Location:".base_url());
		}
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
	
	public function logout()

	{

		# code...

        $this->session->sess_destroy();

		redirect('login');

	}
	
	public function act_login()

    {

            $username = $this->input->post('email');
            
            // $password = $this->input->post('password');
            // print_r('username'.$username.'<br>');
            // print_r('password'.$password);
            // die();

            // $acak = "!@#$%^&*()_+SMARTSOFT+_()*&^%$#@!";

            //  $pass = md5($password);



            $cek     = $this->mlogin->login($username);

            $session = $this->mlogin->data($username);

            if ($cek > 0) {

                $this->session->set_userdata('session_sop', true);

                $this->session->set_userdata('id', $session->idUser);

				$this->session->set_userdata('email', $session->emailUser);
				
                $this->session->set_userdata('nama', $session->namaUser);

                

                $this->session->set_userdata('alamat', $session->alamatUser);

                $this->session->set_userdata('telepon', $session->teleponUser);





                echo "oke";

                header("Location:".base_url()."home");

            } else {

                $this->alert->alertdanger('Check again your username and password');

                return FALSE;

            }

    }
	
}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */