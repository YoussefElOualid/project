<section class="panel">
        <div class="panel-heading">
        <h4>Pin Retournés</h4>

        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                                      </hr>
                    <br />
                    <div class="margin-bottom-50">
                        <table class="table table-hover nowrap" id="example1" width="100%">
                            <thead>
                            <tr>
                                <th>Pan</th>
                                <th>Nom Porteur</th>
                                <th>Num Traitment</th>
                                 <th>Flag</th>
                                 <th>Motif</th>
                               
                            </tr>
                            </thead>


                            
                            <tbody>
                            <tr>
                            <?php  foreach ($DataToPage as $key => $u) { ?>
                                <td><?=$u->card_number?></td>
                                <td><?=$u->holder_address1?></td>
                                <td><?=$u->import_key?></td>
                                <td><?=$u->type?></td>
                                 <td><?=$u->line_comment?></td>
                            
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>