<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_request_finacards extends CI_Model {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
	   $this->load->library('session');
       $this->load->config('finacards');
	   $this->load->helper('url');
	} 
	function isuserBank($p,$isWhere = false){
					if($this->session->userdata('code_bank') !== "0"){
					return ($isWhere?"where ":' and ').$p.".bank_code = ".$this->session->userdata('code_bank');
					}else{
					return "";    
					}
	}



	# example get data from db

	function getUsersById($id){
		if($id == "null")
		$res = $this->db->select('*')->from('finausers');
		 else
		$res = $this->db->select('*')->from('finausers')->where('userId',$id);
		return $res->get()->result();
	}
    // prod carte lwala 
    function getEtatProd(){
         $isuserbank = str_replace('%p', "b", $this->session->userdata('isUserBank'));
    	$query =  $this->config->item('querys')['etatprod'] ."  ".$isuserbank;
     

    	$res = $this->db->query($query);
   
		return $res->result();
    }
    // prod  
 
    function getSubProdById(){
    $data     = $this->getEtatProd();
    $subdata  = [];
      foreach ($data as $key => $value) {
      $query =  str_replace('%rowid', $value->rowid, $this->config->item('querys')['subetatprod']);
       $sub = $this->db->query($query);
       $subdata[$value->rowid][] = $sub->result();
      }    
      return [
              'data'=>$data,
              'subdata'=>$subdata
              ];
    }


      function getEtatDeRejectyId($id){
        $isuserbank = str_replace('%p', "a", $this->session->userdata('isUserBank'));
    	$query =  $this->config->item('querys')['etatreject']."  ".$isuserbank;
      

  	    	$res = $this->db->query($query);
		return $res->result();
    }
   function getStockCarteyId($id){
    	$query = $this->config->item('querys')['stockcarte'];
    	    	$res = $this->db->query($query);
		return $res->result();
    }


   //Pin

     function getProdPinById($id){
   
         // $isuserbank = str_replace(['%p','and'], ["llx_command_filedet",$where], $this->session->userdata('isUserBank'));
          $isuserbank = str_replace('%p', "llx_command_filedet", $this->session->userdata('isUserBank'));
    	$query = $this->config->item('querys')['ProdPin']."  ".$isuserbank;
    	$res = $this->db->query($query);

       return $res->result();
    }
    function getProdPinRetourneById($id){
          $isuserbank = str_replace('%p', "llx_command_filedet", $this->session->userdata('isUserBank'));
    	$query = $this->config->item('querys')['ProdPinRetourne']."  ".$isuserbank;
    	    	$res = $this->db->query($query);
		return $res->result();
    }


// agence
  function getAgenceById($id){
      $isuserbank = str_replace(['%p', 'and'],['llx_branches','where'], $this->session->userdata('isUserBank'));
        $query = $this->config->item('querys')['listagence']."  ".$isuserbank;
                $res = $this->db->query($query);
        return ['agence'=>$res->result(),'banks'=>$this->getBank()];
    }

 

// get users

 function getUtlisateureById($id){
      // $isuserbank = str_replace('%p', "finausers", $this->session->userdata('isUserBank'));
        $query = $this->config->item('querys')['getusers'];
                $res = $this->db->query($query);
       return ['agence'=>$res->result(),'banks'=>$this->getBank()];
    }




	public function getBank (  ) {
		return $this->db->query('select * from llx_bank_list')->result();
	}

     function getTrakingCarteById($id){
      // $isuserbank = str_replace('%p', "llx_command_filedet", $this->session->userdata('isUserBank'));


        $query = $this->config->item('querys')['TrakingCarte'];
                $res = $this->db->query($query);
        return $res->result();
    }


    function getDemUrg($id){
      $isuserbank = str_replace('%p', "llx_branches", $this->session->userdata('isUserBank'));
     $query = str_replace('%reche', $id,$this->config->item('querys')['demendurgence']);
     $res = $this->db->query($query);
     return $res->result();
    }
    

   function getStockPinById($id){
      $isuserbank = str_replace('%p', "llx_extranet_product", $this->session->userdata('isUserBank'));
        $query = $this->config->item('querys')['stockpin']."  ".$isuserbank;
                $res = $this->db->query($query);
        return $res->result();
    }

    function getStockDiversById($id){
         $isuserbank = str_replace('%p', "llx_extranet_product", $this->session->userdata('isUserBank'));
        $query = $this->config->item('querys')['stockdivers']."  ".$isuserbank;
                $res = $this->db->query($query);
        return $res->result();
    }




  //Affichage demande d urgence
      function getDemendeUrgeById($id){
        $query = str_replace('%reche', $id,$this->config->item('querys')['affdemandeurg']);
        echo $query;
                $res = $this->db->query($query);
        return $res->result();
    }

//insertion DEMANDE  D URGENCE
    function insertDemandeUrgnce($data){
          $query = $this->config->item('querys')['inserturgence'];
          $query = str_replace(['%id','%date_reception','%card_number','%type'],
                               $data, $query); 
          $res = $this->db->query($query);
          return $this->db->insert_id();
    }

//insert demande urgence version  2
     function insertDemandeUrgnceVers($data){
          $query = $this->config->item('querys')['inserturgenceNewV'];
          if(substr_count($data['action'],'Center')>0 or substr_count($data['action'],'Agence') > 0)
             {
              $data['place'] = "";
          $query = str_replace(['%card_number','%nom_poretur','%type','%action','%place'],
                               $data, $query);
              
        } else{
                        $data['place'] = $data['action'] ;
                        $data['action'] = "";
           $query = str_replace(['%card_number','%nom_poretur','%type','%action','%place'],
                               $data, $query);
         
        }
          $res = $this->db->query($query);
          return  $res;
    }




  function updateurgence($id,$section){
	  $query = $this->config->item('querys')['updateurgence'];
	        if(substr_count($section,'Center')>0 or substr_count($section,'Agence') > 0)
             {
	             $query = str_replace(['%id','%type','%place'],
		             [$id,$section,""], $query);
             }else
             {
	             $query = str_replace(['%id','%type','%place'],
		             [$id,"",$section], $query);
             }
          $res = $this->db->query($query);
          return $res;    
  }
  
  public function listeAgence(){
    
      $query = $this->config->item('querys')['getlistagence'];
                $reslt = $this->db->query($query);
        return $reslt->result();
  }

//insert agence

    public function insertAgence($data){

          if($data['rowid'] == null){
	          $query = $this->config->item('querys')['InsertAgence'];
	          $query = str_replace(['%nomAge', '%codebank' , '%adress1' ,'%adress2', '%adress3' ,'%codeAge','%codeVille', '%codePays'],
                               $data, $query);
          }else{
	          $query = $this->config->item('querys')['updateAgence'];
	          $query = str_replace(
		          ['%nomAge', '%codebank' , '%adress1' ,'%adress2', '%adress3' ,'%codeAge','%codeVille', '%codePays','%rowid'],
		          $data, $query);
          }

          $res = $this->db->query($query);
    }
// insert Utlisateur  

public function InsertUtlisateur($data){
          if($data['rowid'] == null){
//userName, userEmail  ,userPass,userLogin,idbank,type_user
            $query = $this->config->item('querys')['UtlisateurInsert'];
            $query = str_replace(['%nomuser', '%mail' , '%passuser','%passcrypted','%loginuser',
              '%bank', '%typeuser','%label'], $data, $query);
                              
          }else{
            $query = $this->config->item('querys')['updateutlisateur'];
            $query = str_replace(
              ['%nomuser', '%mail' , '%passuser','%passcrypted','%loginuser',
              '%bank', '%typeuser','%label' ,'%rowid'],
              $data, $query);
          }

          $res = $this->db->query($query);
    }




  public function getchPan($id){ 
    $isuserbank = str_replace('%p', "llx_command_filedet", $this->session->userdata('isUserBank'));

  $query = str_replace('%rech',$id,$this->config->item('querys')['recpan']."  ".$isuserbank);
      $res = $this->db->query($query);

     return $res->result();

  }

  public function getdemandeUrgencev3($id){

$isuserbank = str_replace('%p', "llx_command_filedet", $this->session->userdata('isUserBank'));

  $query = str_replace('%reche',$id,$this->config->item('querys')['geturgecne']."  ".$isuserbank);
      $res = $this->db->query($query);

     return $res->result();

  }


}

