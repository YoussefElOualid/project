<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Updatepasse extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
	   $this->load->library('session');
	   
        /*cache control*/

    }   

public function indxeuser()
    {
      
        $this->load->view('users/changepasse');
        
    }

}