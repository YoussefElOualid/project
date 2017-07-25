<?php



class  pdfmaker extends CI_Model{

public function  __construct(){

	parent::__construct();
	$this->load->database();
	$this->load->library('session');
}

	public function getDataTopdf(){
	
	 $query='select c.label, SUM(IF(a.clt_reference="E2909200",1,0)) as "200",SUM(IF(a.clt_reference="E2909310",1,0))  as "310",SUM(IF(a.clt_reference="E2910254",1,0)) as "254",
SUM(IF(a.clt_reference="27050133",1,0)) as "133",
SUM(IF(a.clt_reference="E2913534",1,0)) as "534",
SUM(IF(a.clt_reference="E2618012",1,0)) as "012",
COUNT(1) as "TOT"
from llx_command_files a, llx_command_filedet b, llx_extranet_product c
where a.rowid = b.fk_object
and b.card_type = c.card_type
and b.bank_code = c.bank_code
'.str_replace('%p',"b",$this->session->userdata('isUserBank')).'
and (file_reception_start and file_reception_end and file_control_start
and file_control_end and file_dataprep_start and file_dataprep_end
and card_perso_start and card_perso_end and card_condit_start and card_condit_end
and card_exped_start and card_exped_end and card_delivery_start and card_delivery_end) is NULL
and a.clt_reference in ("E2909200","E2909310","E2910254","27050133","E2913534","E2618012") group by a.clt_reference, c.label
limit 150';
   echo $query;
exit();
    $res =  $this->db->query($query);
    var_dump($res->result()); 

    return $res->result();
	}


  public function getDataTpTBPC(){

$query=str_replace('%p',"llx_command_filedet",'select llx_command_filedet.card_type, count(1) as Qte, llx_command_filedet.perso_code ,llx_command_filedet.`import_key`, llx_command_files.`file_reception_start`, llx_command_files.`card_delivery_start`from llx_command_filedet inner join llx_command_files on llx_command_filedet.fk_object = llx_command_files.`rowid` 
  '.$this->session->userdata('isUserBank').'
  group by card_type    limit 30');
return $this->db->query($query);


}

//tableu de brod PIn
  public function getDataTpTBPIN(){

$query=str_replace('%p',"llx_command_filedet",'select   llx_command_filedet.card_type, count(1) as Qte, llx_command_filedet.perso_code ,llx_command_filedet.`import_key`, llx_command_files.`file_reception_start`, llx_command_files.`card_delivery_start`from llx_command_filedet inner join llx_command_files on llx_command_filedet.fk_object = llx_command_files.`rowid` '.$this->session->userdata('isUserBank').' 
  group by card_type limit 50');
  return $this->db->query($query);

}
  public function getDataTpTBPINCroise(){

$query=str_replace('%p',"llx_command_filedet",'select llx_command_filedet.perso_code ,llx_command_filedet.card_type,llx_command_filedet.`import_key`, llx_command_files.`file_reception_start`, llx_command_files.`card_delivery_start`from llx_command_filedet inner join llx_command_files on llx_command_filedet.fk_object = llx_command_files.`rowid`'.$this->session->userdata('isUserBank').'  limit 40');
return $this->db->query($query);

}







 public function getDataControleFabriRejets(){

$query=str_replace('%p',"a",'SELECT a.card_number,a.card_type, a.branch_code, a.line_comment FROM llx_command_filedet a, llx_command_files b WHERE a.fk_object = b.rowid 
    '.$this->session->userdata('isUserBank').'
  limit 40');
return $this->db->query($query);

}


public function getDataEtatDuStock(){

$query=str_replace('%p',"b",'select b.card_type, c.label, c.stock+count(1) as stock_int, count(1) as consomme, c.stock as stock_act, SUM(IF(b.line_status>100,1,0)) as reject, c.tested from llx_command_files a, llx_command_filedet b, llx_extranet_product c where a.rowid = b.fk_object
 group by a.clt_reference, c.label  '.$this->session->userdata('isUserBank').' limit 80');// .isuserBank('llx_command_filedet').';  and file_reception_start
 //between '2017/05/01' and '2017/05/31' 
return $this->db->query($query);

}












}
?>