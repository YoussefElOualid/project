<?php
$output="";
$rows =$dataRes;

 if( count($rows) >0)
{
 $output .= '
  <div class="table-responsive">
  <form method="post" action="">
   <table width="100%" class="table table-striped table-bordered table-hover">
    <tr>
      <th>Numéro de carte</th>
      <th>Nom du Porteur </th>
      <th>Cle Refernce</th>
	    <th>Date de Réception</th>
	  
    </tr>
 '; 
 // sat ou hadok les info lwalin li fihoml method ou carte ghadi takhood hum f controller a sat o khod les infos li 3jbook a khona sber mafhemtch wahded la3ba hint nta kenti dayer teste f controlr diyal demande durgence ahnata chof 
  foreach ($rows as $key => $u) { 
 { 
  $output .= '
   <tr>
    <td>'.$u->card_number.'</td>
    <td>'.$u->holder_name.'<input type="hidden" name="nom" value="'.$u->card_number.'"></td>
    <td>'.$u->clt_reference.'</td>
    <td>'.$u->file_reception_start.'</td>
   </tr>
  '; 
 }
echo $output.'</table>'.'t veux bien validie cet demande d urgence'.'<input type="submit" class="btn btn-primary" value="oui">'.'<input type="reset" value="non">'.'</form>';


 }

}

 else{

 
echo '<form method="post" action="salah">Numero de Carte Introuvable dans aucun fichier tu veux bien enregiste cette demande urgence <input type"submit" value="oui" class="btn btn-primary">  <input type"reset" value="Non" class="btn btn-primary"></form>';
}