<section class="panel">
    <div class="panel-heading">
        <h3>
            <h4>Liste D'agence</h4>
        </h3>
    </div>
    <div class="panel-body">
        <div align="right">
            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="add btn btn-warning">Ajouter</button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4>Liste D'agence</h4>
                <br />
                <div class="margin-bottom-50">
                    <table class="table table-hover nowrap" id="example1" width="100%">
                        <thead>
                        <tr>
                            <th>Nom Agence</th>
                            <th>Code Agence</th>
                            <th>Code Ville</th>
                            <th>Code Pays</th>
                            <th>Modifier</th>
                        </tr>
                        </thead>




                        <tbody>
                        <tr>
							<?php  foreach ($DataToPage["agence"] as $key => $u) { ?>
                            <td><?=$u->branch_label?></td>
                            <td><?=$u->branch_code?></td>
                            <td><?=$u->city_code?></td>
                            <td><?=$u->country_code?></td>
                            <td><input type="button" name="edit" value="Modifier" data-edit='<?=json_encode($u)?>' id="<?=$u->rowid?>" class="btn btn-info btn-xs edit_data" /></td>


                        </tr>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <div id="add_data_Modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Liste Agence</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="insert_form" onsubmit="return GO(this);">
                            <input type="hidden" id="rowid" name="rowid" value="" />
                            <label>Nom Agence</label>
                            <input type="text" name="label" id="label" class="form-control" required />
                            <br />
                            <label>Code Agence</label>
                            <input name="codeAg" type="text"  id="codeAg" class="form-control" required maxlength="3" />
                            <br />
                            <label>Code ville</label>
                            <input name="codeV" type="text" id="codeV" class="form-control" required maxlength="3"/>
                            <br />

                            <label>adresse n°1</label>
                            <input name="addres1" id="addres1" class="form-control" required />
                            <br />

                            <label>adresse n°2</label>
                            <input name="addres2" id="addres2" class="form-control"  />
                            <br />

                            <label>adresse n°3</label>
                            <input name="addres3" id="addres3" class="form-control"  />
                            <br />

							<?php if(empty($this->session->userdata("isUserBank"))){ ?>
                                <label>Banque</label>
                                <select class="form-control" id="sel" name="bank_code_country" required>
                                    <option value="">sélectionner une banque:</option>
									<?php foreach($DataToPage["banks"] as $row):; ?>
                                        <option value="<?=$row->bank_code.'|'.$row->bank_country?>"><?php echo $row->bank_label; ?></option>
									<?php endforeach; ?>

                                </select>
							<?php } else { ?>
                                <input type="hidden" name="bank_code_country" value="<?=$this->session->set_userdata('code_bank', $data[0]->bank_code).'|'.$_SESSION['code_pays']?>" />
							<?php }?>
                            <br />
                            <input type="hidden" name="bank_id" id="bank_id" />
                            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                            <input type="reset" name="insert" id="" value="reset" class="btn btn-success hide" />

                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <script>
            function GO($ele) {
                $.ajax({
                    url:"<?= base_url()?>getinsertAgence",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Inserting");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        location.reload();
                        $('#add_data_Modal').modal('hide');
                        $('#dataTables-example').html(data);
                        $('#dataTables-example').DataTable().clear().destroy();
                        $('#dataTables-example').DataTable({
                            responsive: true,
                            language: {
                                "url": "../content/French.json"
                            }
                        });
                    }
                });
                return false;
            }

            var data ;
            $(document).ready(function(){



                $('body').on('click', '.add', function(){
                    $('[type="reset"]').click()
                   
                })
                $(document).on('click', '.edit_data', function(){
                    $('#add_data_Modal').modal()
                    data = JSON.parse($(this).attr('data-edit'))
                    console.log()
                    $('#rowid').val(data.rowid);
                    $('#label').val(data.branch_label);
                    $('#codeAg').val(data.branch_code);
                    $('#codeV').val(data.city_code);
                    $('#addres1').val(data.branch_address1);
                    $('#addres2').val(data.branch_address2);
                    $('#addres3').val(data.branch_address3);
                    $('[name="bank_code_country"]').val(data.bank_code+'|'+data.country_code);

                    $('#insert').val("Modifier").removeClass('btn-success').addClass('btn-primary');

                    // var bank_id = $(this).attr("id");
                    // $.ajax({
                    // url:"UpdateListBank.php",
                    // method:"POST",
                    // data:{},
                    // dataType:"json",
                    // success:function(data){
                    // $('#label').val(data.label);
                    // $('#codeAg').val(data.codeAg);
                    // $('#codeV').val(data.codeV);
                    // $('#country_code').val(data.country_code);

                    // $('#bank_id').val(data.id);
                    // $('#insert').val("Update");
                    // $('#add_data_Modal').modal('show');
                    // }
                    // });
                });
            });




        </script>

