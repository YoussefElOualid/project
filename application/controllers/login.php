<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
	   $this->load->library('session');
	   $this->load->helper('url');
        /*cache control*/

    }



	public function index()
	{
		  if ($this->session->userdata('cp_admin_login') == 1)
		{
			 redirect(base_url().'getPages/getAccueil', 'refresh');
		}else
		{
		$this->load->view('login/index');
		}
	}

	
	function UpdateAccount(){
	
	$list  = array(
						"Logisn"=>$this->input->post('user'),
						"Psw"=> $this->encrypt->encode($this->input->post('pass'))
						);
		$this->db->where(array("id_Emp"=>$this->input->post("idemp")));
		$this->db->update('compte_utilisateur',$list);
	 
	}
	
	// function getAccueil()
	// {
	// 	if ($this->session->userdata('cp_admin_login') == 1)
	// 	{
	// 	$config_page = [
	// 		'path'=>"pages",// hada dossier li fih les pages
	// 		'page'=>"dashboard",
	// 		 // hadii page li ghadi naffiche
	// 		'title_page_current'=>"Dashboard FinaCards" // hada title dyal page lfoo9 
	// 	];
	// 	$this->load->view('index',$config_page);

	// 	}else{
	// 		// go to login  
	// 		redirect(base_url(),'refresh');
	// 	}
	// }

	function ajax_login()
	{
		$response = array();

		//Recieving post input of email, password from ajax request
		$email 		= $this->input->post("resu_xxx");
		$password 	= $this->input->post("ssap_xxx");
		$response['submitted_data'] = $_POST;

		//Validating login
		$login_status = $this->validate_login( $email ,  $password );
		$response['login_status'] = $login_status;
		if ($login_status == 'success') {
			$response['redirect_url'] = base_url()."getPages/getAccueil";
		}else{
			$response['redirect_url']  = base_url()."login/index/error";
		}

		//Replying ajax request with validation response
		//echo json_encode($response);
		redirect($response['redirect_url'],'refresh');
	}


	function validate_login($email	=	'' , $password	 =  '')
    {
    			$pass = hash('sha256',$password);
			$query = "Select * From finausers Where userEmail='".$email."' and userPass='".$pass."'";
				$get = $this->db->query($query);
				if($get->num_rows()> 0){
					$row = $get->row();
				
					$this->session->set_userdata('cp_admin_login', '1');
				  	$this->session->set_userdata('user_id', $row->userId);
				  	$this->session->set_userdata('user_name', $row->userName);
				  	$this->session->set_userdata('user_email', $row->userEmail);
				  	$this->session->set_userdata('user_type', $row->type_user);
				  	$this->session->set_userdata('pwd_native', $row->pass_native);

					$this->getInfoBank($row->idbank);
			 	  	return 'success';
		 		}
	}
	function getInfoBank($id){
		 $sql="SELECT  bank_code,bank_country,bank_label FROM llx_bank_list WHERE rowid='".$id."'";
					$bank = $this->db->query($sql);
					$data = $bank->result();
					if($bank->num_rows()){
					$this->session->set_userdata('code_bank', $data[0]->bank_code);
					$this->session->set_userdata('code_pays',$data[0]->bank_country);
				    $this->session->set_userdata('label',$data[0]->bank_label);
					if($data[0]->bank_code !== "0"){
						$this->session->set_userdata("isUserBank","and %p.bank_code = ".$data[0]->bank_code);
						}else{
						$this->session->set_userdata("isUserBank","");
						}
					}else{
					$this->session->set_userdata('code_bank', 0);	
					$this->session->set_userdata("isUserBank","");
					}
		}


	 function logout()
    {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url() , 'refresh');
    }

}
