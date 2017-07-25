<?php
$output="";
$rows =$dataRes;

 if( count($rows) >0)
{
 $output .= '
  <div class="table-responsive">
   <table width="100%" class="table table-striped table-bordered table-hover">
    <tr>
      <th>Numéro de carte</th>
      <th>Nom du Porteur </th>
      <th>Num Traitment</th>
	    <th>Date de Réception</th>
	  
    </tr>
 ';
  foreach ($rows as $key => $u) { 
 { 
  $output .= '
   <tr>
    <td>'.$u->card_number.'</td>
    <td>'.$u->holder_name.'</td>
    <td>'.$u->import_key.'</td>
    <td>'.$u->file_reception_start.'</td>
   </tr>
  '; 
 }
echo $output."</table>";

//
 }

}

 else{


echo "Numero de Carte Introuvable";
}