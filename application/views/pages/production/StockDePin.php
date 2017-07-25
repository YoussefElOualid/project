<section class="panel">
        <div class="panel-heading">
            <h3>
                Table Stock Pin
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
                                <th>Nom</th>
                                <th>Qte_stock</th>
                                <th>Seuil</th>
                                <th>Qte Rejtées</th>
                                <th>Qte Testées</th>
                            </tr>
                            </thead>



                            
                            <tbody>
                            <tr>
                            <?php  foreach ($DataToPage as $key => $u) { ?>
                                <td><?=$u->label?></td>
                                <td><?=$u->alert?></td>
                                <td><?=$u->reject?></td>
                                <td><?=$u->tested?></td>
                                <td></td>
                            
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>