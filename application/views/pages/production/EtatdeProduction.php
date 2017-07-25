<?php


//var_dump($DataToPage['subdata']);
//exit();

?>
<section class="panel">
        <div class="panel-heading">
            <h3>  
                <h4>Table Etat de production</h4>
               
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
               
                    <div class="margin-bottom-50">
                        <table class="table table-hover nowrap" id="example1" width="100%">
                            <thead>
                            <tr>
                                <th>+</th>
                                <th>Num Traitment</th>
                                <th>Totale Carte</th>
                                <th>Totale Pin</th>
                                <th>Date de Réception</th>
                                <th>Date de Passage</th>
                                <th>Date D'Envoi </th>
                                 <th>Type </th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                            <?php  foreach ($DataToPage['data'] as $key => $u) { ?>
                            <tr data-toggle="collapse" data-target="#table<?=$u->rowid ?>" class="accordion-toggle">
                              <td><a href="#" class="mybtn btn btn-default btn-sm"><span class="fa fa-plus-square"></span></a></td>
                             <td><?=$u->clt_reference?></td>
                                <td><?=$u->total_card?></td>
                                <td><?=$u->total_pin?></td>
                                <td><?=$u->file_reception_end?></td>
                                <td><?=$u->card_perso_start?></td>
                                <td><?=$u->card_delivery_start?></td>
                                <td><?=$u->perso_code?></td>
                                <td></td>
                               
                            </tr>
<td colspan='12' class='hiddenRow'><div class='accordian-body collapse' id='table<?=$u->rowid?>'> 
                                          <table class='table table-striped'>
                                           <thead>
                                            <tr>    
                                                <th>Nom</th>
                                                <th>Stock</th>
                                                <th>Nombre</th>
                                                <th>Reject</th>
                                                
                                            </tr>
                                          </thead>
                                          <tbody>
            <?php  foreach ($DataToPage['subdata'][$u->rowid] as $iey => $c) { 
                        foreach ($c as $i => $x) { 
                
                ?>
                                                <tr>
                                                    <td><?=$x->label?></td>
                                                    <td><?=$x->stock?></td>
                                                    <td><?=$x->nombre?></td>
                                                    <td><?=$x->reject?></td>
                                                    
                                                  </tr>
                            <?php 
                                }
                            } ?>

                                            </tbody> </table> </div> </td> </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
             <script>
            $(document).ready(function(){                
                $(".accordion-toggle").on("click", function(){
                $(".btn btn-default btn-default").toggle(300);
                $(this).find('span').toggleClass('fa fa-minus-squar-o');
                });
            })
                </script>