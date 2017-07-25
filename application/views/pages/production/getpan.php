<?php
$output="";
$rows =$dataRes;

 if( count($rows) >0)
{
 $output .= '


 <div class="row"></br>

 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Recherceh Par Pan
                        </div>


  <div class="panel-body">

 <div width="100%" class="table table-striped table-bordered table-hover">
 
   <table class="table table bordered"  >
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


echo '

 <div class="alert alert-danger" role="alert">
                            
            <strong>Numero de Carte Introuvable!</strong> 
  </div></div></div>';



}