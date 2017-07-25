<section class="panel">
        <div class="panel-heading">
            <h3>
                Demande d'urgence
                <!-- <sup>
                    <small><a href="https://datatables.net/" target="_blank" class="link-underlined">Official Documentation</a></small>
                </sup> -->
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="margin-bottom-50">
                        <table class="table table-hover nowrap" id="example1" width="100%">
                            <thead>
                            <tr>
                                <th>Pan</th>
                                <th>type</th>
                                <th>type de livraison</th>             
                                 <th>adresse de livraison</th>
                            </tr>
                            </thead>



                            
                            <tbody>
                            <tr>
                            <?php  foreach ($DataToPage as $key => $u) { ?>
                                <td><?=$u->card_number?></td>
                                <td><?=$u->type?></td>
                                <td><?=$u->delivery_type?></td>
                                <td><?=$u->delivery_place?></td>
                                <td></td>
                            
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            