<?php
class home extends CI_Controller{

	function __construct()
	{
		 parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
     $this->load->library('session');
	}

 function view($page = 'home'){
   $this->load->helper('url');

	 if ($this->session->userdata('cp_admin_login') == 1)
		{
			 redirect(base_url().'getPages/getAccueil', 'refresh');
		}

 if (!file_exists('application/views/pages/'.$page.'.php')) {
 	show_404();
 }

$data['title']=$page;

$this->load->view('intro/home',$data);


}
}
?>