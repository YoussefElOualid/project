<?php

class Main_model extends CI_Model
{

  function test_main(){

  	echo "this is model fnction";
  }


  function insert_data(){

  	$this->db->insert('llx_command_extractions',$data);
  }

}

?>