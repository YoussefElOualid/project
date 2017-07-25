<?php
class Querys extends CI_Model{


public function getCurrPassword($userid){
	$query = $this->db->where(['userId'=>$userid])
	->get('finausers');

	if ($query->num_rows()> 0) {
		
		return $query->row();
	}

 }


 public function updatePassword( $new_password,$userid) {

$data = array(
   'userPass'=> hash('sha256',$new_password),
   'pass_native'=>$new_password	
	);
return $this->db->where('userId',$userid)->update('finausers',$data);


  } 



}

?>