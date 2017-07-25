<section class="panel">
        <div class="panel-heading">
           <h4>Production Pin</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    
                   
                    <br />
                    <div class="margin-bottom-50">
                        <table class="table table-hover nowrap" id="example1" width="100%">
                            <thead>
                            <tr>
                                <th>Num Traitment</th>
                                <th>Qte_Pin</th>
                                <th>date d'envoi</th>
                               
                            </tr>
                            </thead>


                            
                            <tbody>
                            <tr>
                            <?php  foreach ($DataToPage as $key => $u) { ?>
                                <td><?=$u->import_key?></td>
                                <td><?=$u->total_pin?></td>
                                <td><?=$u->file_reception_start?></td>
                              
                            
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>