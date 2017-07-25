<?php
 require_once APPPATH.'third_party/dompdf/autoload.inc.php';


if(!function_exists('isuserBank'))
	{
			function isuserBank($p){
				if (session_status() == PHP_SESSION_NONE) {
				session_start();
				}
				
				if($_SESSION['code_bank'] !== "0"){
				return "where ".$p.".bank_code = ".$_SESSION['code_bank'];
				}else{
				return "";    
				}
			  }
	}
	


$date1=$deb;
$date2=$fin;
$code = $label ;

   use Dompdf\Dompdf;

   $document = new Dompdf();

//$document->loadHtml($page);
//$coonect = mysqli_connect("localhost","root","root","lastdb");
//$query="select llx_product.label ,llx_command_files.total_card  ,'testtype' as type from llx_product inner join llx_command_files on llx_product.rowid = llx_command_files.rowid";
 //$query="select llx_product.label ,llx_command_files.import_key,llx_command_files.file_reception_start,llx_command_files.file_reception_end,llx_command_files.total_card from llx_product inner join llx_command_files on llx_product.rowid = llx_command_files.fk_object";
//$query="select * from llx_extranet_product ".isuserBank('llx_extranet_product');

$res= $dataRes->result();

	$data = [];

	foreach ($res as $key => $u) {
		$data[] = (array)$u;
	}
	
	$headTable = array_keys($data[0]);
	unset($headTable[0]);
	unset($headTable[count($headTable)]);

$line = "";

foreach($data as $i=>$u){
				$line .= '<tr><th align="center">'.$u['label'].'</th>';
			       foreach($u as $x=>$v){
					if(!in_array(strtolower($x),['label','tot']))
					$line.= "<td align='center'>".$v."</th>";	
				}
			$line  .= "<td align='center'>".$u['TOT']."</td></tr>";
		}
$output = '


<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
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

img{
width:20%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<img src="../../img/18.jpg" />

<table class="info" >
	<tr>
	<td rowspan="3"><h3>De:<span id="nameCompany">Finacards </span></h3>'.(!empty($this->session->userdata("isUserBank"))?'<h3>A : '.$code.'</h3>':"")."</td><td align='right'>le: ".date('d/m/Y')."</td>
	</tr>
	<tr>
	<td align='right'>Du: ".$date1."</td>
	</tr>
	<tr>
	<td align='right'>Au: ".$date2."</td>
	</tr>
</table>

<table class='table' width='100%''  border='1'>
<thead>
<tr>
	<th align='center' rowspan='2'>type carte</th>
	<th align='center' colspan=".(count($headTable)+1).'" >num traitment</th>
</tr>

<tr>
	<th>'.implode('</th><th align="center">',$headTable).'</th>
	<th> Total </th>
</tr>
</thead>
<tbody>'.$line.'</tbody>

';









$output .= '</table>';
 $document->loadHtml($output);
//echo $output;
$document->setPaper('A4', 'landscape');



$document->render();
$document->stream("pdf",array("Attachment"=>0));


?>
