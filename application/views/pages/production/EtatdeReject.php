<section class="panel">
        <div class="panel-heading">
           <h4>Table Etat de Rejet</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                
                    <div class="margin-bottom-50">
                        <table class="table table-hover nowrap" id="example1" width="100%">
                            <thead>
                            <tr>
                                <th>Pan</th>
                                <th>Code Produit</th>
                                <th>Code Agence</th>
                                <th>Num Traitment</th>
                                <th>Date de Réception</th>
                                <th>Motif</th>
                                 
                            </tr>
                            </thead>



                            <tr>
                            <?php  foreach ($DataToPage as $key => $u) { ?>
                                <td><?=$u->card_number?></td>
                                <td><?=$u->card_type?></td>
                                <td><?=$u->branch_code?></td>
                                <td><?=$u->import_key?></td>
                                <td><?=$u->file_reception_start?></td>
                                 <td><?=$u->line_comment?></td>

                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>