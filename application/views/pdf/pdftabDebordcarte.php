<?php
 require_once APPPATH.'third_party/dompdf/autoload.inc.php';

if(!function_exists('isuserBank'))
	{
			function isuserBank($p){
				if (session_status() == PHP_SESSION_NONE) {
				session_start();
				}
				
				if($_SESSION['code_bank'] !== "0"){
				return "and ".$p.".bank_code = ".$_SESSION['code_bank'];
				}else{
				return "";    
				}
			  }
	}
$date1=$deb;
$date2=$fin;
$code = $label;
// $date2=$_POST["date2"];


use Dompdf\Dompdf;

$document = new Dompdf();

//$document->loadHtml($page);
//$coonect = mysqli_connect("localhost","root","root","lastdb");
//$query="select llx_product.label ,llx_command_files.total_card  ,'testtype' as type from llx_product inner join llx_command_files on llx_product.rowid = llx_command_files.rowid";
 //$query="select llx_product.label ,llx_command_files.import_key,llx_command_files.file_reception_start,llx_command_files.file_reception_end,llx_command_files.total_card from llx_product inner join llx_command_files on llx_product.rowid = llx_command_files.fk_object";
 //$query="select * from llx_extranet_product";//.isuserBankCountry('llx_extranet_product');
 //$query="select llx_command_filedet.card_type, count(1) as Qte, llx_command_filedet.perso_code ,llx_command_filedet.`import_key`, llx_command_files.`file_reception_start`, llx_command_files.`card_delivery_start`from llx_command_filedet inner join llx_command_files on llx_command_filedet.fk_object = llx_command_files.`rowid` ".isuserBank('llx_command_filedet').'  group by card_type  limit 30';


//   $query="select llx_command_filedet.card_type, count(1) as Qte, llx_command_filedet.perso_code ,llx_command_filedet.`import_key`, llx_command_files.`file_reception_start`, llx_command_files.`card_delivery_start`from llx_command_filedet inner join llx_command_files on llx_command_filedet.fk_object = llx_command_files.`rowid` and bank_code='011' group by card_type limit 30";
// $result= mysqli_query($coonect,$query);

$output = "

 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}


td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
img{
width:20%;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.info{
		position: absolute;top: -5%;right: 5%;width: 50%
}
.info *{
	background-color:#fff;
}
#nameCompany{
	color:blue
}
</style>  
<img  src='data:image/png;base64,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
'   />
<table class='info' >
	<tr>
	<td rowspan='3'><h3>De:<span id='nameCompany'>Finacards </span></h3>".(!empty($this->session->userdata("isUserBank"))?"<h3>A : ".$code."</h3>":"")."</td><td align='right'>le: ".date('d/m/Y')."</td>
	</tr>
	<tr>
	<td align='right'>Du: ".$date1."</td>
	</tr>
	<tr>
	<td align='right'>Au: ".$date2."</td>
	</tr>
</table>

<h1>Tableau de Bord Production Carte  </h1> 
<table>
 <tr>
  <th>type carte</th>
  <th>n° Traitmet</th>

  <th>Date</th>
  <th>Date D'envoi</th>
  <th>code</th>
  <th>Qte</th>
 </tr>
";

$row= $dataRes->result();


//$document->loadHtml($html);



  foreach ($row as $key => $u) { 
                                 
                 
         $output.= '<tr>
                <td>'.$u->card_type.'</td>
                <td>'.$u->import_key.'</td>
                <td>'.$u->file_reception_start.'</td>
				<td>'.$u->card_delivery_start.'</td>
				<td>'.$u->perso_code.'</td>
				
             
                   </tr>';  
}   


$output .= '</table>';
// echo $output;
 $document->loadHtml($output);
  $document->setPaper('A4', 'landscape');


 $document->render();
  $document->stream("pdf",array("Attachment"=>0));


?>
