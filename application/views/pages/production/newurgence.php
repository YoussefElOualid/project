<?php
$output="";
$rows =$dataRes;

$num_card = $_POST['numcarte'];
$method = $_POST['action'];
$pin_cart = $_POST['option'];
$nom_new = $_POST['nom'];


 if( count($rows) >0)
{

 $output .= '
  <div class="table-responsive">
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
	 $nom_new  = $u->holder_name;

 }
echo $output.'</table>'.'
<br>
  <form method="post" action="'.base_url().'getinsertdUrgenceNew">
	<div class="alert alert-warning"><h4> tu veux bien validie cet demande d urgence </div>
	
	<input type="hidden" value="'.$num_card.'" name="numcarte">
	<input type="hidden" value="'.$nom_new.'" name="nom">
	<input type="hidden" value="'.$method.'" name="action">
	<input type="hidden" value="'.$pin_cart.'" name="option">
	
	<input type="submit" class="btn btn-primary" value="oui">
	<input type="reset" class="btn btn-danger" value="non">
	</form>';
 }

}

 else{

echo '<form method="post" action="'.base_url().'getinsertdUrgenceNew">
			<input type="hidden" value="'.$num_card.'" name="numcarte">
			<input type="hidden" value="'.$nom_new.'" name="nom">
			<input type="hidden" value="'.$method.'" name="action">
			<input type="hidden" value="'.$pin_cart.'" name="option">
		<div class="alert alert-warning text-center"><h4>Numero de Carte Introuvable dans aucun fichier tu veux bien enregiste cette demande urgence </h4></div>
		<input type="submit" value="oui" class="btn btn-primary" />  
		<input type="reset" value="Non" class="btn btn-primary" />
		</form>';
}